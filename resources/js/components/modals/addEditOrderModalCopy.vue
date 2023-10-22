<template>
    <div>
      <!-- Modal -->
      <div
        class="modal fade"
        id="addEditOrderModal"
        role="dialog"
        aria-labelledby="addEditOrderModalLabel"
        aria-hidden="true"
      >
        <div
          class="modal-dialog modal-dialog-centered modal-xl"
          role="document"
        >
          <div class="modal-content">
            <div class="modal-header">
              <h5
                class="modal-title"
                id="addEditOrderModalLabel"
                @click.prevent="addOrder"
                v-if="editMode === false"
              >
                {{ $t("message.CREATE_ORDER") }}
              </h5>
              <h5
                class="modal-title"
                id="addEditOrderModalLabel"
                @click.prevent="editOrder"
                v-else
              >
                {{ $t("message.EDIT_ORDER") }}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form @submit.prevent="editMode ? editOrder() : addOrder()">
              <div class="modal-body">
                <div class="form-group">
                  <label>{{ $t("message.DATE") }}<span> *</span></label>
                  <datetime
                    v-model="form.order_date"
                    v-bind:placeholder="$t('message.DATE')"
                    type="date"
                    name="order_date"
                    :input-class="{
                      'is-invalid form-control bgwhite':
                        form.errors.has('order_date'),
                      'form-control bgwhite': !form.errors.has('order_date'),
                    }"
                  ></datetime>
                  <div
                    class="error-message"
                    v-if="form.errors.has('date')"
                    v-html="form.errors.get('date')"
                  />
                </div>
                <!-- Order Status -->
                <div class="form-group">
                  <label
                    >{{ $t("message.ORDER_STATUS")
                    }}<span class="required-star"> *</span></label
                  >
                  <v-select
                    v-model="form.order_status_id"
                    :options="orderStatuses"
                    label="name"
                    :disabled="editMode"
                    :reduce="(orderStatus) => orderStatus.id"
                    :selectOnTab="true"
                    :class="{ 'is-invalid': form.errors.has('order_status_id') }"
                  />
                  <div
                    class="error-message"
                    v-if="form.errors.has('order_status_id')"
                    v-html="form.errors.get('order_status_id')"
                  />
                </div>
                <!-- End -->
                <!-- Payment Method -->
                <div class="form-group">
                  <label
                    >{{ $t("message.PAYMENT_METHOD")
                    }}<span class="required-star"> *</span></label
                  >
                  <v-select
                    v-model="form.payment_method_id"
                    :options="paymentMethods"
                    label="name"
                    :reduce="(paymentMethod) => paymentMethod.id"
                    :selectOnTab="true"
                    :class="{ 'is-invalid': form.errors.has('payment_method_id') }"
                  />
                  <div
                    class="error-message"
                    v-if="form.errors.has('payment_method_id')"
                    v-html="form.errors.get('payment_method_id')"
                  />
                </div>
                <!-- End -->
                <div class="form-group">
                  <label
                    >{{ $t("message.CUSTOMER")
                    }}<span class="required-star"> *</span></label
                  >
                  <v-select
                    v-model="form.customer_id"
                    :options="customers"
                    label="name"
                    :reduce="(customer) => customer.id"
                    :selectOnTab="true"
                    :class="{ 'is-invalid': form.errors.has('customer_id') }"
                  />
                  <div
                    class="error-message"
                    v-if="form.errors.has('customer_id')"
                    v-html="form.errors.get('customer_id')"
                  />
                </div>

                <div class="form-group">
                  <label>{{ $t("message.NOTE") }}</label>
                  <textarea
                    v-model="form.notes"
                    v-bind:placeholder="$t('message.NOTE')"
                    type="text"
                    name="notes"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('notes') }"
                  ></textarea>
                  <div
                    class="error-message"
                    v-if="form.errors.has('note')"
                    v-html="form.errors.get('note')"
                  />
                </div>
                <!-- end -->
                  <hr>
                <!-- Section for headers -->
                <div class="row" v-if="form.customer_id != ''">
                  <!-- Search products to add  -->
                  <div class="col-12">
                    <customAutoComplete
                      ref="autocomplete"
                      :source="products"
                      v-model="productName"
                      placeholder="Search Products to Add"
                      :results-display="formattedDisplay"
                      resultsValue="name"
                      @input="addSearchedProducts()"
                    >
                    </customAutoComplete>
                  </div>
                </div>
                <div class="row form-group" v-if="form.customer_id != ''">
                  <div class="col-md-12 col-xs-12 col-xl-3 col-lg-3">
                    <label>{{ $t("message.PRODUCT") }}</label>
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-2">
                    <label>{{ $t("message.QUANTITY") }}</label>
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-2" align="center">
                    <label>{{ $t("message.UNIT_PRICE") }}</label>
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-2">
                    <label>{{ $t("message.DISCOUNT") }}</label>
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-2" align="center">
                    <label>{{ $t("message.SUMMARY") }}</label>
                  </div>
                </div>

                <!-- Order Details row -->
                
                <div v-if="form.order_details.length < 1 && form.customer_id != ''">
                  <h6 class="text-center">
                    <strong>
                      {{$t('message.NO_PRODUCTS_ADDED')}}
                    </strong>
                  </h6>
                </div>
                
                <div
                  class="row form-group"
                  v-if="form.customer_id != ''"
                  v-for="(order_detail, i) in form.order_details"
                  :key="i"
                >
                  <div class="col-md-12 col-xs-12 col-xl-3 col-lg-3">
                    <v-select
                      @input="assignProduct(i, $event),productAmountCalculation()"
                      :placeholder="$t('message.PRODUCT')"
                      v-model="order_detail.product_id"
                      :options="products"
                      label="name"
                      :reduce="(product) => product.id"
                      :selectOnTab="true"
                      :class="{
                        'is-invalid': form.errors.has(
                          'order_details.' + i + '.product_id'
                        ),
                      }"
                    />
                    <div
                      class="error-message"
                      v-if="
                        form.errors.has('order_details.' + i + '.product_id')
                      "
                      v-html="
                        form.errors.get('order_details.' + i + '.product_id')
                      "
                    />
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-2">
                    <input
                      v-model="order_detail.quantity"
                      v-bind:placeholder="$t('message.QUANTITY')"
                      type="text"
                      @keyup="productAmountCalculation()"
                      name="quantity"
                      class="form-control"
                      :class="{
                        'is-invalid': form.errors.has(
                          'order_details.' + i + '.quantity'
                        ),
                      }"
                    />
                    <div
                      class="error-message"
                      v-if="form.errors.has('order_details.' + i + '.quantity')"
                      v-html="
                        form.errors.get('order_details.' + i + '.quantity')
                      "
                    />
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-2" align="center">
                    <h5>
                      <b>{{
                        (order_detail.price)
                              | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })
                      }}</b>
                    </h5>
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-2">
                    <input
                      v-model="order_detail.discount"
                      v-bind:placeholder="$t('message.DISCOUNT')"
                      type="text"
                      name="discount"
                      @keyup="productAmountCalculation()"
                      class="form-control"
                      :class="{
                        'is-invalid': form.errors.has(
                          'order_details.' + i + '.discount'
                        ),
                      }"
                    />
                    <div
                      class="error-message"
                      v-if="form.errors.has('order_details.' + i + '.discount')"
                      v-html="
                        form.errors.get('order_details.' + i + '.discount')
                      "
                    />
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-2" align="center">
                    <small>
                     <label>{{$t("message.SUB_TOTAL") }}</label>:
                      <b>{{
                        isNaN(order_detail.sub_total)
                            ? 0
                            : (order_detail.sub_total)
                                  | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })}}</b>
                     <label>{{$t("message.DISCOUNT") }}</label>: <b v-if="order_detail.discount !=''">
                        {{
                          isNaN(parseFloat(order_detail.discount) * order_detail.quantity)
                            ? 0
                            : (parseFloat(order_detail.discount) * order_detail.quantity)
                                  | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })
                        }}</b
                      >
                      <b v-else>
                        {{
                          0 | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })
                        }}</b
                      >
                     <label>{{$t("message.PRODUCT_TAX") }}</label>: <b>
                        {{
                          isNaN(order_detail.tax_amount * order_detail.quantity)
                            ? 0
                            : (order_detail.tax_amount * order_detail.quantity)
                                  | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })
                        }}</b
                      >
                     <label>{{$t("message.GRAND_TOTAL") }}</label>:
                      <b>{{
                        isNaN(order_detail.grand_total)
                            ? 0
                            : (order_detail.grand_total)
                                  | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })}}</b>
                    </small>
                  </div>
                  <div
                    class="col-md-12 col-xs-12 col-xl-1 col-lg-1"
                    align="center"
                    v-if="form.order_details.length > 1 && i >= 1"
                  >
                    <a
                      class="btn btn-danger text-white"
                      v-on:click.stop="deleteOrderDetail(i, order_detail.id)"
                      ><i class="fas fa-trash-alt"></i
                    ></a>
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-1" v-else></div>
                </div>
                <!-- Order Details row -->
                <!-- Order Details table -->
                
                <table class="table" v-if="form.customer_id != ''">
                  <tbody>
                    <tr>
                      <td align="center" colspan="5" class="text-center mb-3">
                        <a
                          v-on:click.stop="
                            form.order_details.push({
                              id: '',
                              order_id: '',
                              product_id: '',
                              quantity: '',
                              price: 0,
                              tax_amount: 0,
                              discount: 0,
                              grand_total: 0,
                              sub_total: 0,
                            })
                          "
                          class="btn btn-success text-white"
                          >{{ $t("message.ADD_ROW") }}</a
                        >
                      </td>
                    </tr>
                    <tr>
                      <td align="center" colspan="5" class="adminTotal">
                        <b>{{ $t("message.SUB_TOTAL") }}: </b
                        >{{
                          subTotal 
                                | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })
                        }}
                      </td>
                    </tr>
                    <tr>
                      <td align="center" colspan="5" class="adminTotal">
                        <b>{{ $t("message.TOTAL_PRODUCT_TAX") }}: </b
                        >{{
                          totalProductTax
                                | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })
                        }}
                      </td>
                    </tr>
                    <tr>
                      <td align="center" colspan="5" class="adminTotal">
                        <b>{{ $t("message.DISCOUNT") }}: </b
                        >{{
                          totalDiscount 
                                | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })
                        }}
                      </td>
                    </tr>
                    <tr>
                      <td align="center" colspan="5" class="adminTotal">
                        <b>{{ $t("message.GRAND_TOTAL") }}: </b
                        >{{
                          (grandTotal)
                                | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })
                        }}
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="modal-footer">
                  <button
                    @click.prevent="addOrder"
                    v-if="editMode === false"
                    type="submit"
                    class="btn btn-primary"
                  >
                    {{ $t("message.CREATE_ORDER") }}
                  </button>
                  <button
                    @click.prevent="editOrder"
                    v-else
                    type="submit"
                    class="btn btn-primary"
                  >
                    {{ $t("message.EDIT_ORDER") }}
                  </button>

                  <button
                    type="button"
                    class="btn btn-danger"
                    data-dismiss="modal"
                  >
                    {{ $t("message.CLOSE") }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
// vuejs auto complete
import Vue from "vue";
import autocomplete from "vuejs-auto-complete";
import customAutoComplete from ".././customAutoComplete.vue";
export default {
  name: "addEditOrderModal",
  props: ["orderData"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      currentDateLanguage: dateLanguage,
      order_date: new Date().toISOString().slice(0, -1),
      customers: [],
      i: 0,
      products: [],
      orderStatuses:[],
      paymentMethods:[],
      editMode: "",
      isButtonDisabled: false,
      // Create a new form instance
      form: new form({
        id: "",
        customer_id: "",
        order_status_id: "",
        payment_method_id: "",
        order_date: new Date().toISOString().slice(0, -1),
        notes: "",
        discount: 0,
        order_details: [],
      }),
      productName: "",
    };
  },
  // Calculation for Grand Total
  computed: {
    //Grand Total
    grandTotal() {
      var sum = 0;
      var subTotal = 0;
      var discount = 0;
      var totalTaxAmount = 0;
      for (var i = 0; i < this.form.order_details.length; i++) {
        subTotal +=
         parseFloat((this.form.order_details[i].quantity * this.form.order_details[i].price));


          if (this.form.order_details[i].discount) {
              discount += (this.form.order_details[i].discount) * (this.form.order_details[i].quantity);
          }
          if(this.form.order_details[i].tax_amount){
            
              totalTaxAmount += this.form.order_details[i].tax_amount * (this.form.order_details[i].quantity);
          }
        }
      parseFloat(subTotal+=totalTaxAmount);
      sum = parseFloat(subTotal -= discount);
      sum = parseFloat(sum).toFixed(2);
      return sum;
    },
    //sub total
    subTotal() {
      var sum = 0;
      for (var i = 0; i < this.form.order_details.length; i++) {
        sum +=
          this.form.order_details[i].quantity * this.form.order_details[i].price;
      }
      sum = parseFloat(sum).toFixed(2);
      return sum;
    },
    //sub total
    totalDiscount() {
      let sum = 0;
      if(this.form.order_details && this.form.order_details.length > 0)
      {
        this.form.order_details.map((data) => {
          if (data.discount != 0 || data.discount !='') {
             sum += (parseFloat(data.discount) * data.quantity);
          }else{
            sum +=0;
          }
           
        });
      }
      return sum;
    },

    // Total Product Tax
    totalProductTax()
    {
      let sum = 0;
      if(this.form.order_details && this.form.order_details.length > 0)
      {
        this.form.order_details.map((data) => {
            sum += (parseFloat(data.tax_amount ? data.tax_amount : 0) * parseFloat(data.quantity ? data.quantity : 0));
        });
      }
      return sum;
    }
  },
  components: {
    autocomplete,
    customAutoComplete
  },
  methods: {
    //Product Base Calculation
    productAmountCalculation() {
      var sum = 0;
      var subTotal = 0;
      var discount = 0;
      var totalTaxAmount = 0;
      for (var i = 0; i < this.form.order_details.length; i++) {
        subTotal =
          parseFloat((this.form.order_details[i].quantity * this.form.order_details[i].price));
          if (this.form.order_details[i].discount) {
              discount = parseFloat(this.form.order_details[i].discount) * this.form.order_details[i].quantity;
          }
          if(this.form.order_details[i].tax_amount){
            
              totalTaxAmount = this.form.order_details[i].tax_amount * this.form.order_details[i].quantity;
          }
          
          parseFloat(this.form.order_details[i].sub_total = subTotal);
          subTotal+=totalTaxAmount;
          if (this.form.order_details[i].discount != 0) {
             sum = parseFloat(subTotal -= discount);
          }else{
            sum = subTotal;
          }
          parseFloat(this.form.order_details[i].grand_total = sum).toFixed(2);
        }
    },
    // logic to show customers based on company id end
    // logic to set customer based product and its price start
    async customerDependantData(event) {
      if (event) {
        // for loop to set product details based on customer selected start
        for (let i = 0; i < this.form.order_details.length; i++) {
          let customerId = this.form.customer_id;
          let productId = this.form.order_details[i].product_id;
          let getProduct = this.products.filter(
            (product) => product.id == productId
          )[0];
          this.form.order_details[i].product = getProduct;
          this.form.order_details[i].price = getProduct.wholesale_price;
          this.form.order_details[i].tax_amount = getProduct.wholesale_tax_amount;
          this.form.order_details[i].discount = 0;
          this.form.order_details[i].grand_total = 0;
          this.form.order_details[i].sub_total = 0;
          // logic to set price end
        }
        // for loop to set product details based on customer selected end
      }
      // if cross button is pressed on customer empty the product div logic start
      if (!event) {
        // logic to drop all indexed value of array except 0 index start
        this.form.order_details.splice(1);
        // logic to drop all indexed value of array except 0 index end
        // logic to empty all elements of array on customer cancel start
        this.form.order_details[0].product_id = "";
        this.form.order_details[0].price = 0;
        this.form.order_details[0].quantity = "";
        this.form.order_details[0].total = "";
        this.form.order_details[0].tax_amount = 0;
        this.form.order_details[0].discount = 0;
        this.form.order_details[0].grand_total = 0;
        this.form.order_details[0].sub_total = 0;
        // logic to empty all elements of array on customer cancel end
      }
    },

    addOrder() {
      if (this.is('Super Admin') || this.can("create_order")) {
        this.$Progress.start();
        this.form
          .post("api/orders")
          .then(() => {
            Fire.$emit("reloadOrders");
            $("#addEditOrderModal").modal("hide");
            toast.fire({
              type: "success",
              icon: "success",
              title: this.$t("message.CREATED_MESSAGE_SUCCESS"),
            });
            this.$Progress.finish();
          })
          .catch(() => {
            this.$Progress.fail();
            toast.fire({
              type: "warning",
              icon: "warning",
              title: this.$t("message.CREATED_MESSAGE_ERROR"),
            });
          });
      } else {
        this.$Progress.fail();
        toast.fire({
          type: "warning",
          text: this.$t("message.UNAUTHORIZED"),
          icon: "warning",
        });
      }
    },
    editOrder() {
      if (this.is('Super Admin') || this.can("edit_order") ) {
        this.$Progress.start();
        this.form
          .put("api/orders/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadOrders");
            $("#addEditOrderModal").modal("hide");
            toast.fire({
              icon: "success",
              title: this.$t("message.EDIT_MESSAGE_SUCCESS"),
            });
            this.$Progress.finish();
          })
          .catch(() => {
            this.$Progress.fail();
            toast.fire({
              icon: "warning",
              title: this.$t("message.EDIT_MESSAGE_ERROR"),
            });
          });
      } else {
        this.$Progress.fail();
        toast.fire({
          type: "warning",
          text: this.$t("message.UNAUTHORIZED"),
          icon: "warning",
        });
      }
    },
    deleteOrderDetail(i, id = null) {
      if (this.is('Super Admin') || this.can("delete_order")) {
        if (this.editMode) {
          swal
            .fire({
              title: this.$t("message.CONFIRM"),
              text: this.$t("message.DELETE_MESSAGE_REVERT"),
              type: "warning",
              showCancelButton: true,
              cancelButtonText: this.$t('message.CANCEL'),
              confirmButtonColor: "#3085D6",
              cancelButtonColor: "#d33",
              confirmButtonText: this.$t("message.DELETE_BUTTON_TEXT"),
            })
            .then((result) => {
              if (result.value) {
                // Send request to the server
                if (id != "") {
                  axios
                    .delete("api/removeOrderDetail/" + id)
                    .then(() => {
                      this.form.order_details.splice(i, 1);
                      swal.fire(
                        this.$t("message.DELETED"),
                        this.$t("message.DELETE_MESSAGE_SUCCESS"),
                        "success"
                      );
                    })
                    .catch(() => {
                      swal(
                        "Failed!",
                        this.$t("message.FAILED"),
                        this.$t("message.DELETE_MESSAGE_ERROR"),
                        "warning"
                      );
                    });
                } else {
                  this.form.order_details.splice(i, 1);
                  swal.fire(
                    "Deleted!",
                    this.$t("message.DELETE_MESSAGE_SUCCESS"),
                    "success"
                  );
                }
              }
            });
        } else {
          this.form.order_details.splice(i, 1);
        }
      } else {
        swal.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
          type: "warning",
        });
      }
    },

    assignProduct(i, event) {
      // Check Client Id
      this.allowClientChange = 0;
      // if a value is selected logic start
      if (event) {
        // let productId=event.target.value;
        let productId = this.form.order_details[i].product_id;
        let getProduct = this.products.filter(
          (product) => product.id == productId
        )[0];

        // add the product object to the order detail
        this.form.order_details[i].product = getProduct;
        this.form.order_details[i].price = getProduct.wholesale_price;
        this.form.order_details[i].tax_amount = getProduct.wholesale_tax_amount;
        this.form.order_details[i].discount = 0;
        this.form.order_details[i].grand_total = 0;
        this.form.order_details[i].sub_total = 0;
      }
      if (!event) {
        this.form.order_details[i].product = getProduct;
        this.form.order_details[i].price = 0;
        this.form.order_details[i].quantity = "";
        this.form.order_details[i].tax_amount = 0;
        this.form.order_details[i].discount = 0;
        this.form.order_details[i].grand_total = 0;
        this.form.order_details[i].sub_total = 0;
      }

    },
    // Add products into order details
    addSearchedProducts() {
      // Filter the products array
      this.products.filter((product) => {
        if (this.productName) {
          if (
            product.name == this.productName ||
            product.code == this.productName
          ) {
            this.form.order_details.push({
              id: "",
              order_id: "",
              product_id: product.id,
              quantity: "",
              price: product.wholesale_price,
              product:product,
              tax_amount: product.wholesale_tax_amount,
              discount: 0,
              grand_total: 0,
              sub_total: 0,
            });

            // clear the search field
            this.productName = null;
            this.$refs.autocomplete.clear();
          }
        }
      });
    },

    // custom labels for autocomplete
    formattedDisplay(result) {
      return result.name + " (" + result.code + ")";
    },

    // get data from auto complete component
    getDataFromAutoCommplete(value)
    {
      // Filter the products array
      this.products.filter((product) => {
        if (value) {
          if (
            (product.name).toLowerCase().trim() == (value).toLowerCase().trim() || product.code == value
          ) {
            this.form.order_details.push({
              id: "",
              order_id: "",
              product_id: product.id,
              quantity: "",
              price: product.wholesale_price,
              tax_amount: product.wholesale_tax_amount,
              discount: 0,
              grand_total: 0,
              sub_total: 0,
            });

            this.assignProduct(this.form.order_details.length-1, true);

            // clear the search field
            value = null;
            this.$refs.autocomplete.clear();
          }
        }
        else
        {
          // clear the auto complete 
          this.$refs.autocomplete.clear();
        }
      });
    }
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#addEditOrderModal").on("show.bs.modal", function (e) {
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
        form.customer_id = e.relatedTarget.customer_id;
        form.order_status_id = e.relatedTarget.order_status_id;
        form.payment_method_id = e.relatedTarget.payment_method_id;
        // Manually fill order detail 
        const orderDetails = [];
         Array.from(e.relatedTarget.order_details).forEach(data => {
          orderDetails.push(data);
        })
        form.order_details = orderDetails;
      } else {
        form.reset();
        that.editMode = false;
      }
    });
    axios.get("api/getAllCustomers").then((response) => {
      this.customers = response.data;
      axios.get("api/getAllProducts").then((response) => {
        this.products = response.data;
          axios.get("api/getAllOrderStatuses").then((response) => {
          this.orderStatuses = response.data;
           axios.get("api/getAllPaymentMethods").then((response) => {
            this.paymentMethods = response.data;
          });
        });
      });
    });
    $("#addEditOrderModal").on("hidden.bs.modal", function (e) {
      if (that.nested) {
        $("body").addClass("modal-open");
      }
    });
  },

  created() {
    Fire.$on("getDataFromAutoCommplete", (value) => {
      this.getDataFromAutoCommplete(value);
    });
  },
};
</script>
