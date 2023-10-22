<template>
    <div>
      <!-- Modal -->
      <div
        class="modal fade"
        id="addEditOrderPaymentModal"
        role="dialog"
        aria-labelledby="addEditOrderPaymentModalLabel"
        aria-hidden="true" data-keyboard="false" data-backdrop="static"
      >
        <div
          class="modal-dialog modal-dialog-centered modal-xl"
          role="document"
        >
          <div class="modal-content">
            <div class="modal-header">
              <h5
                class="modal-title"
                id="addEditOrderPaymentModalLabel"
                @click.prevent="addOrderPayment"
                v-if="editMode === false"
              >
                {{ $t("message.CREATE_ORDER_PAYMENT") }}
              </h5>
              <h5
                class="modal-title"
                id="addEditOrderPaymentModalLabel"
                @click.prevent="editOrderPayment"
                v-else
              >
                {{ $t("message.EDIT_ORDER_PAYMENT") }}
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
            <form @submit.prevent="editMode ? editOrderPayment() : addOrderPayment()">
              <div class="modal-body">
                <!-- Date -->
                <div class="form-group">
                  <label>{{ $t("message.DATE") }}<span> *</span></label>
                  <datetime
                    v-model="form.payment_date"
                    v-bind:placeholder="$t('message.DATE')"
                    type="date"
                    name="payment_date"
                    :input-class="{
                      'is-invalid form-control bgwhite':
                        form.errors.has('payment_date'),
                      'form-control bgwhite': !form.errors.has('payment_date'),
                    }"
                  ></datetime>
                  <div
                    class="error-message"
                    v-if="form.errors.has('payment_date')"
                    v-html="form.errors.get('payment_date')"
                  />
                </div>
                <!-- End -->
                <!-- Customer -->
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
                    @input="getOrderByCustomerId($event)"
                    :selectOnTab="true"
                    :class="{ 'is-invalid': form.errors.has('customer_id') }"
                  />
                  <div
                    class="error-message"
                    v-if="form.errors.has('customer_id')"
                    v-html="form.errors.get('customer_id')"
                  />
                </div>
                <!-- End -->
                <!-- Order-->
                <div class="form-group" v-if="form.customer_id">
                  <label
                    >{{ $t("message.ORDER")
                    }}<span class="required-star"> *</span></label
                  >
                  <v-select
                    v-model="form.order_id"
                    :options="orders"
                    label="order_number"
                    @input="paymentAmount($event)"
                    :reduce="(order) => order.id"
                    :selectOnTab="true"
                    :class="{ 'is-invalid': form.errors.has('order_id') }"
                  />
                  <div
                    class="error-message"
                    v-if="form.errors.has('order_id')"
                    v-html="form.errors.get('order_id')"
                  />
                  <div v-if="getOrderPaymentData">
                    <br>
                    <div  v-if="form.order_id && getOrderPaymentData"><small v-if="this.getOrderPaymentData.orderTotalAmount">{{$t('message.ORDER_AMOUNT')}}: {{getOrderPaymentData.orderTotalAmount | currency('Ar', 2, { thousandsSeparator: '.', decimalSeparator: ',', symbolOnLeft: false, spaceBetweenAmountAndSymbol: true })}}</small></div>
                    <div  v-if="form.order_id && getOrderPaymentData"><small v-if="!this.getOrderPaymentData.orderTotalAmount">{{$t('message.ORDER_AMOUNT')}}: {{0 | currency('Ar', 2, { thousandsSeparator: '.', decimalSeparator: ',', symbolOnLeft: false, spaceBetweenAmountAndSymbol: true })}}</small></div>
  
                    <div  v-if="form.order_id && getOrderPaymentData"><small v-if="this.getOrderPaymentData.paidAmount">{{$t('message.PAID_AMOUNT')}}: {{getOrderPaymentData.paidAmount | currency('Ar', 2, { thousandsSeparator: '.', decimalSeparator: ',', symbolOnLeft: false, spaceBetweenAmountAndSymbol: true })}}</small></div>
                    <div  v-if="form.order_id && getOrderPaymentData"><small v-if="!this.getOrderPaymentData.paidAmount">{{$t('message.PAID_AMOUNT')}}: {{0 | currency('Ar', 2, { thousandsSeparator: '.', decimalSeparator: ',', symbolOnLeft: false, spaceBetweenAmountAndSymbol: true })}}</small></div>
  
                     <div  v-if="form.order_id && getOrderPaymentData"><small v-if="this.getOrderPaymentData.remainingBalance">{{$t('message.REMAINING_AMOUNT')}}: {{getOrderPaymentData.remainingBalance | currency('Ar', 2, { thousandsSeparator: '.', decimalSeparator: ',', symbolOnLeft: false, spaceBetweenAmountAndSymbol: true })}}</small></div>
                     <div  v-if="form.order_id && getOrderPaymentData"><small v-if="!this.getOrderPaymentData.remainingBalance">{{$t('message.REMAINING_AMOUNT')}}: {{0 | currency('Ar', 2, { thousandsSeparator: '.', decimalSeparator: ',', symbolOnLeft: false, spaceBetweenAmountAndSymbol: true })}}</small></div>
                  </div>
                </div>
                <!-- End -->
                <!-- Amount -->
                <div class="form-group">
                  <label>{{ $t("message.AMOUNT") }}*</label>
                  <input
                    v-model="form.amount"
                    v-bind:placeholder="$t('message.AMOUNT')"
                    type="text"
                    name="amount"
                    @input="paidAmount(form.amount, getOrderPaymentData.remainingBalance)"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('amount') }"
                  />
                  <div class="text-danger">{{form.paid_amount_error}}</div>
                  <div
                    class="error-message"
                    v-if="form.errors.has('amount')"
                    v-html="form.errors.get('amount')"
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
                    v-if="form.errors.has('notes')"
                    v-html="form.errors.get('notes')"
                  />
                </div>
                <!-- End -->
                <div class="modal-footer">
                  <button
                    @click.prevent="addOrderPayment"
                    v-if="editMode === false"
                    :disabled='form.amount>getOrderPaymentData.remainingBalance'
                    type="submit"
                    class="btn btn-primary"
                  >
                    {{ $t("message.CREATE_ORDER_PAYMENT") }}
                  </button>
                  <button
                    @click.prevent="editOrderPayment"
                    v-else
                    :disabled='form.amount>getOrderPaymentData.remainingBalance'
                    type="submit"
                    class="btn btn-primary"
                  >
                    {{ $t("message.EDIT_ORDER_PAYMENT") }}
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
export default {
  name: "addEditOrderPaymentModal",
  props: ["orderPaymentData"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      currentDateLanguage: dateLanguage,
      i: 0,
      orders: [],
      customers: [],
      paymentMethods: [],
      getOrderPaymentData:[],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        payment_date: new Date().toISOString(),
        customer_id:"",
        order_id:"",
        payment_method_id:"",
        amount:"",
        notes: "",
        paid_amount_error:"",
      }),
    };
  },
  methods: {
    addOrderPayment() {
      if (this.is('Super Admin') || this.can("create_stock_entry")) {
        this.$Progress.start();
        this.form
          .post("api/orderPayments")
          .then(() => {
            Fire.$emit("reloadOrderPayments");
            $("#addEditOrderPaymentModal").modal("hide");
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
    editOrderPayment() {
      if (this.is('Super Admin') || this.can("edit_stock_entry") ) {
        this.$Progress.start();
        this.form
          .put("api/orderPayments/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadOrderPayments");
            $("#addEditOrderPaymentModal").modal("hide");
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
    deleteOrderPaymentDetail(i, id = null) {
      if (this.is('Super Admin') || this.can("delete_stock_entry")) {
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
                    .delete("api/removeOrderPaymentDetail/" + id)
                    .then(() => {
                      this.form.stock_entry_details.splice(i, 1);
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
                  this.form.stock_entry_details.splice(i, 1);
                  swal.fire(
                    "Deleted!",
                    this.$t("message.DELETE_MESSAGE_SUCCESS"),
                    "success"
                  );
                }
              }
            });
        } else {
          this.form.stock_entry_details.splice(i, 1);
        }
      } else {
        swal.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
          type: "warning",
        });
      }
    },
    // Get Order By Customer ID
    getOrderByCustomerId(id){
      axios.get("api/getOrderByCustomerId/"+id).then((response) => {
        this.orders = response.data;
      }).catch(() => {
        this.$Progress.fail();
        swal.fire(
          that.$t("message.FAILED"),
          that.$t("message.DELETE_MESSAGE_ERROR"),
          "warning"
        );
      });
    },
    // Get Payment Amount Summary
    paymentAmount(){
      	axios.get('api/getOrderPaymentByOrderId/'+ this.form.order_id)
				.then(response => {
          this.getOrderPaymentData=response.data;
        }).catch(() => {
        this.$Progress.fail();
        swal.fire(
          that.$t("message.FAILED"),
          that.$t("message.DELETE_MESSAGE_ERROR"),
          "warning"
        );
      });
    },
    // when paid amount is grater than to grand total
    paidAmount(amount,remainingBalance){
      if(amount<=remainingBalance){
        this.form.paid_amount_error= "";
      }else{
        this.form.paid_amount_error = this.$t('message.PLEASE_ENTER_VALID_AMOUNT');
      }
    },
    // Check if sales not exist push into the array 
    updateOrder(id)
    {
      let isExist = this.orders.find(i => i.id == id);
      if (isExist == undefined)
        {
          axios.get('api/getAllOrders')
            .then((response) => {
              let orders = response.data;
              this.orders.push(orders.find(i => i.id == id))
            })
        }
    }
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#addEditOrderPaymentModal").on("show.bs.modal", function (e) {
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
        that.paymentAmount();
        that.updateOrder(that.form.order_id);
      } else {
        form.reset();
        that.editMode = false;
      }
    });
    axios.get("api/getAllCustomers").then((response) => {
      that.customers = response.data;
      axios.get("api/getAllPaymentMethods").then((response) => {
          that.paymentMethods = response.data;
        })
      }).catch(() => {
      that.$Progress.fail();
      swal.fire(
        that.$t("message.FAILED"),
        that.$t("message.DELETE_MESSAGE_ERROR"),
        "warning"
      );
    });
  },
};
</script>
