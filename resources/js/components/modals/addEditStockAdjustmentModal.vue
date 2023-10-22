<template>
    <div>
      <!-- Modal -->
      <div
        class="modal fade"
        id="addEditStockAdjustmentModal"
        role="dialog"
        aria-labelledby="addEditStockAdjustmentModalLabel"
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
                id="addEditStockAdjustmentModalLabel"
                @click.prevent="addStockAdjustment"
                v-if="editMode === false"
              >
                {{ $t("message.CREATE_STOCK_ADJUSTMENT") }}
              </h5>
              <h5
                class="modal-title"
                id="addEditStockAdjustmentModalLabel"
                @click.prevent="editStockAdjustment"
                v-else
              >
                {{ $t("message.EDIT_STOCK_ADJUSTMENT") }}
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
            <form @submit.prevent="editMode ? editStockAdjustment() : addStockAdjustment()">
              <div class="modal-body">
                <div class="form-group">
                  <label>{{ $t("message.DATE") }}<span> *</span></label>
                  <datetime
                    v-model="form.date"
                    v-bind:placeholder="$t('message.DATE')"
                    type="date"
                    name="date"
                    :input-class="{
                      'is-invalid form-control bgwhite':
                        form.errors.has('date'),
                      'form-control bgwhite': !form.errors.has('date'),
                    }"
                  ></datetime>
                  <div
                    class="error-message"
                    v-if="form.errors.has('date')"
                    v-html="form.errors.get('date')"
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
                    v-if="form.errors.has('notes')"
                    v-html="form.errors.get('notes')"
                  />
                </div>
                <!-- end -->
                  <hr>
                <!-- Section for headers -->
                <div class="row">
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
                <div class="row form-group" v-if="form.stock_adjustment_details.length > 0">
                  <div class="col-md-12 col-xs-12 col-xl-4 col-lg-4">
                    <label>{{ $t("message.PRODUCT") }}</label>
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-3 col-lg-3">
                    <label>{{ $t("message.QUANTITY") }}</label>
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-4 col-lg-4">
                    <label>{{ $t("message.TYPE") }}</label>
                  </div>
                </div>

                <!-- StockAdjustment Details row -->
                
                <div v-if="form.stock_adjustment_details.length < 1">
                  <h6 class="text-center">
                    <strong>
                      {{$t('message.NO_PRODUCTS_ADDED')}}
                    </strong>
                  </h6>
                </div>
                
                <div
                  class="row form-group"
                  v-for="(stock_adjustment_detail, i) in form.stock_adjustment_details"
                  :key="i"
                >
                  <div class="col-md-12 col-xs-12 col-xl-4 col-lg-4">
                    <v-select
                      @input="assignProduct(i, $event)"
                      :placeholder="$t('message.PRODUCT')"
                      v-model="stock_adjustment_detail.product_id"
                      :options="products"
                      label="name"
                      :reduce="(product) => product.id"
                      :selectOnTab="true"
                      :class="{
                        'is-invalid': form.errors.has(
                          'stock_adjustment_details.' + i + '.product_id'
                        ),
                      }"
                    />
                    <div
                      class="error-message"
                      v-if="
                        form.errors.has('stock_adjustment_details.' + i + '.product_id')
                      "
                      v-html="
                        form.errors.get('stock_adjustment_details.' + i + '.product_id')
                      "
                    />
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-3">
                    <input
                      v-model="stock_adjustment_detail.product_quantity"
                      v-bind:placeholder="$t('message.QUANTITY')"
                      type="text"
                      name="product_quantity"
                      class="form-control"
                      :class="{
                        'is-invalid': form.errors.has(
                          'stock_adjustment_details.' + i + '.product_quantity'
                        ),
                      }"
                    />
                    <div
                      class="error-message"
                      v-if="form.errors.has('stock_adjustment_details.' + i + '.product_quantity')"
                      v-html="
                        form.errors.get('stock_adjustment_details.' + i + '.product_quantity')
                      "
                    />
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-4">
                    <v-select
                      v-model="stock_adjustment_detail.type"
                      :options="items"
                      label="name"
                      :reduce="(item) => item.id"
                      :selectOnTab="true"
                    />
                  </div>
                  <div
                    class="col-md-12 col-xs-12 col-xl-1 col-lg-1"
                    align="center"
                    v-if="form.stock_adjustment_details.length > 1 && i >= 1"
                  >
                    <a
                      class="btn btn-danger text-white"
                      v-on:click.stop="deleteStockAdjustmentDetail(i, stock_adjustment_detail.id)"
                      ><i class="fas fa-trash-alt"></i
                    ></a>
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-1" v-else></div>
                </div>
                <!-- StockAdjustment Details row -->
                <!-- StockAdjustment Details table -->
                
                <table class="table">
                  <tbody>
                    <tr>
                      <td align="center" colspan="5" class="text-center mb-3">
                        <a
                          v-on:click.stop="
                            form.stock_adjustment_details.push({
                              id: '',
                              stock_adjustment_id: '',
                              product_id: '',
                              product_quantity: '',
                              type: 0 
                            })
                          "
                          class="btn btn-success text-white"
                          >{{ $t("message.ADD_ROW") }}</a
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="modal-footer">
                  <button
                    @click.prevent="addStockAdjustment"
                    v-if="editMode === false"
                    :disabled="form.stock_adjustment_details.length < 1"
                    type="submit"
                    class="btn btn-primary"
                  >
                    {{ $t("message.CREATE_STOCK_ADJUSTMENT") }}
                  </button>
                  <button
                    @click.prevent="editStockAdjustment"
                    v-else
                    :disabled="form.stock_adjustment_details.length < 1"
                    type="submit"
                    class="btn btn-primary"
                  >
                    {{ $t("message.EDIT_STOCK_ADJUSTMENT") }}
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
import customAutoComplete from "../customAutoComplete.vue";
export default {
  name: "addEditStockAdjustmentModal",
  props: ["stockAdjustmentData"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      currentDateLanguage: dateLanguage,
      date: new Date().toISOString().slice(0, -1),
      i: 0,
      items: [
        { id: 0, name: this.$t('message.SUBTRACTION') },
        { id: 1, name: this.$t('message.ADDITION') },
      ],
      products: [],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        date: new Date().toISOString().slice(0, -1),
        notes: "",
        stock_adjustment_details: [],
      }),
      productName: "",
    };
  },
  components: {
    autocomplete,
    customAutoComplete
  },
  methods: {
    // logic to show customers based on company id end
    // logic to set customer based product and its price start
    async customerDependantData(event) {
      if (event) {
        // for loop to set product details based on customer selected start
        for (let i = 0; i < this.form.stock_adjustment_details.length; i++) {
          let productId = this.form.stock_adjustment_details[i].product_id;
          let getProduct = this.products.filter(
            (product) => product.id == productId
          )[0];
          this.form.stock_adjustment_details[i].product = getProduct;
          // logic to set price end
        }
        // for loop to set product details based on customer selected end
      }
      // if cross button is pressed on customer empty the product div logic start
      if (!event) {
        // logic to drop all indexed value of array except 0 index start
        this.form.stock_adjustment_details.splice(1);
        // logic to empty all elements of array on customer cancel start
        this.form.stock_adjustment_details[0].product_id = "";
        this.form.stock_adjustment_details[0].product_quantity = "";
        this.form.stock_adjustment_details[0].type = 0;
        // logic to empty all elements of array on customer cancel end
      }
    },

    addStockAdjustment() {
      if (this.is('Super Admin') || this.can("create_stock_adjustment")) {
        this.$Progress.start();
        this.form
          .post("api/stockAdjustments")
          .then(() => {
            Fire.$emit("reloadStockAdjustments");
            $("#addEditStockAdjustmentModal").modal("hide");
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
    editStockAdjustment() {
      if (this.is('Super Admin') || this.can("edit_stock_adjustment") ) {
        this.$Progress.start();
        this.form
          .put("api/stockAdjustments/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadStockAdjustments");
            $("#addEditStockAdjustmentModal").modal("hide");
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
    deleteStockAdjustmentDetail(i, id = null) {
      if (this.is('Super Admin') || this.can("delete_stock_adjustment")) {
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
                    .delete("api/removeStockAdjustmentDetail/" + id)
                    .then(() => {
                      this.form.stock_adjustment_details.splice(i, 1);
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
                  this.form.stock_adjustment_details.splice(i, 1);
                  swal.fire(
                    "Deleted!",
                    this.$t("message.DELETE_MESSAGE_SUCCESS"),
                    "success"
                  );
                }
              }
            });
        } else {
          this.form.stock_adjustment_details.splice(i, 1);
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
      // if a value is selected logic start
      if (event) {
        // let productId=event.target.value;
        let productId = this.form.stock_adjustment_details[i].product_id;
        let getProduct = this.products.filter(
          (product) => product.id == productId
        )[0];

        // add the product object to the stockAdjustment detail
        this.form.stock_adjustment_details[i].product = getProduct;
      }
      if (!event) {
        this.form.stock_adjustment_details[i].product = getProduct;
        this.form.stock_adjustment_details[i].product_quantity = "";
        this.form.stock_adjustment_details[i].type = 0;
      }

    },
    // Add products into stockAdjustment details
    addSearchedProducts() {
      // Filter the products array
      this.products.filter((product) => {
        if (this.productName) {
          if (
            product.name == this.productName ||
            product.code == this.productName
          ) {
            this.form.stock_adjustment_details.push({
              id: "",
              stock_adjustment_id: "",
              product_id: product.id,
              product_quantity: "",
              type: 0,
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
            this.form.stock_adjustment_details.push({
              id: "",
              stock_adjustment_id: "",
              product_id: product.id,
              product_quantity: "",
              type: 0,
            });

            this.assignProduct(this.form.stock_adjustment_details.length-1, true);

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
    $("#addEditStockAdjustmentModal").on("show.bs.modal", function (e) {
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
        // Manually fill stockAdjustment detail 
        const stockAdjustmentDetails = [];
         Array.from(e.relatedTarget.stock_adjustment_details).forEach(data => {
          stockAdjustmentDetails.push(data);
        })
        form.stock_adjustment_details = stockAdjustmentDetails;
      } else {
        form.reset();
        that.editMode = false;
      }
    });
      axios.get("api/getAllProducts").then((response) => {
        this.products = response.data;
      });
    $("#addEditStockAdjustmentModal").on("hidden.bs.modal", function (e) {
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
