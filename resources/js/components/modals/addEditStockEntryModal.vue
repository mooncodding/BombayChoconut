<template>
    <div>
      <!-- Modal -->
      <div
        class="modal fade"
        id="addEditStockEntryModal"
        role="dialog"
        aria-labelledby="addEditStockEntryModalLabel"
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
                id="addEditStockEntryModalLabel"
                @click.prevent="addStockEntry"
                v-if="editMode === false"
              >
                {{ $t("message.CREATE_STOCK_ENTRY") }}
              </h5>
              <h5
                class="modal-title"
                id="addEditStockEntryModalLabel"
                @click.prevent="editStockEntry"
                v-else
              >
                {{ $t("message.EDIT_STOCK_ENTRY") }}
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
            <form @submit.prevent="editMode ? editStockEntry() : addStockEntry()">
              <div class="modal-body">
                <div class="form-group">
                  <label>{{ $t("message.DATE") }}<span> *</span></label>
                  <datetime
                    v-model="form.stock_entry_date"
                    v-bind:placeholder="$t('message.DATE')"
                    type="date"
                    name="stock_entry_date"
                    :input-class="{
                      'is-invalid form-control bgwhite':
                        form.errors.has('stock_entry_date'),
                      'form-control bgwhite': !form.errors.has('stock_entry_date'),
                    }"
                  ></datetime>
                  <div
                    class="error-message"
                    v-if="form.errors.has('stock_entry_date')"
                    v-html="form.errors.get('stock_entry_date')"
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
                <div class="row form-group" v-if="form.stock_entry_details.length > 0">
                  <div class="col-md-12 col-xs-12 col-xl-6 col-lg-6">
                    <label>{{ $t("message.PRODUCT") }}</label>
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-5">
                    <label>{{ $t("message.QUANTITY") }}</label>
                  </div>
                </div>

                <!-- StockEntry Details row -->
                
                <div v-if="form.stock_entry_details.length < 1">
                  <h6 class="text-center">
                    <strong>
                      {{$t('message.NO_PRODUCTS_ADDED')}}
                    </strong>
                  </h6>
                </div>
                
                <div
                  class="row form-group"
                  v-for="(stock_entry_detail, i) in form.stock_entry_details"
                  :key="i"
                >
                  <div class="col-md-12 col-xs-12 col-xl-6 col-lg-6">
                    <v-select
                      @input="assignProduct(i, $event)"
                      :placeholder="$t('message.PRODUCT')"
                      v-model="stock_entry_detail.product_id"
                      :options="products"
                      label="name"
                      :reduce="(product) => product.id"
                      :selectOnTab="true"
                      :class="{
                        'is-invalid': form.errors.has(
                          'stock_entry_details.' + i + '.product_id'
                        ),
                      }"
                    />
                    <div
                      class="error-message"
                      v-if="
                        form.errors.has('stock_entry_details.' + i + '.product_id')
                      "
                      v-html="
                        form.errors.get('stock_entry_details.' + i + '.product_id')
                      "
                    />
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-5">
                    <input
                      v-model="stock_entry_detail.total_quantity"
                      v-bind:placeholder="$t('message.QUANTITY')"
                      type="text"
                      name="total_quantity"
                      class="form-control"
                      :class="{
                        'is-invalid': form.errors.has(
                          'stock_entry_details.' + i + '.total_quantity'
                        ),
                      }"
                    />
                    <div
                      class="error-message"
                      v-if="form.errors.has('stock_entry_details.' + i + '.total_quantity')"
                      v-html="
                        form.errors.get('stock_entry_details.' + i + '.total_quantity')
                      "
                    />
                  </div>
                  <div
                    class="col-md-12 col-xs-12 col-xl-1 col-lg-1"
                    align="center"
                    v-if="form.stock_entry_details.length > 1 && i >= 1"
                  >
                    <a
                      class="btn btn-danger text-white"
                      v-on:click.stop="deleteStockEntryDetail(i, stock_entry_detail.id)"
                      ><i class="fas fa-trash-alt"></i
                    ></a>
                  </div>
                  <div class="col-md-12 col-xs-12 col-xl-1" v-else></div>
                </div>
                <!-- StockEntry Details row -->
                <!-- StockEntry Details table -->
                
                <table class="table">
                  <tbody>
                    <tr>
                      <td align="center" colspan="5" class="text-center mb-3">
                        <a
                          v-on:click.stop="
                            form.stock_entry_details.push({
                              id: '',
                              stock_entry_id: '',
                              product_id: '',
                              total_quantity: '',
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
                  </tbody>
                </table>
                <div class="modal-footer">
                  <button
                    @click.prevent="addStockEntry"
                    v-if="editMode === false"
                    type="submit"
                    class="btn btn-primary"
                  >
                    {{ $t("message.CREATE_STOCK_ENTRY") }}
                  </button>
                  <button
                    @click.prevent="editStockEntry"
                    v-else
                    type="submit"
                    class="btn btn-primary"
                  >
                    {{ $t("message.EDIT_STOCK_ENTRY") }}
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
  name: "addEditStockEntryModal",
  props: ["stockEntryData"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      currentDateLanguage: dateLanguage,
      stock_entry_date: new Date().toISOString().slice(0, -1),
      i: 0,
      products: [],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        stock_entry_date: new Date().toISOString().slice(0, -1),
        notes: "",
        stock_entry_details: [],
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
        for (let i = 0; i < this.form.stock_entry_details.length; i++) {
          let productId = this.form.stock_entry_details[i].product_id;
          let getProduct = this.products.filter(
            (product) => product.id == productId
          )[0];
          this.form.stock_entry_details[i].product = getProduct;
          // logic to set price end
        }
        // for loop to set product details based on customer selected end
      }
      // if cross button is pressed on customer empty the product div logic start
      if (!event) {
        // logic to drop all indexed value of array except 0 index start
        this.form.stock_entry_details.splice(1);
        // logic to empty all elements of array on customer cancel start
        this.form.stock_entry_details[0].product_id = "";
        this.form.stock_entry_details[0].total_quantity = "";
        // logic to empty all elements of array on customer cancel end
      }
    },

    addStockEntry() {
      if (this.is('Super Admin') || this.can("create_stock_entry")) {
        this.$Progress.start();
        this.form
          .post("api/stockEntries")
          .then(() => {
            Fire.$emit("reloadStockEntries");
            $("#addEditStockEntryModal").modal("hide");
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
    editStockEntry() {
      if (this.is('Super Admin') || this.can("edit_stock_entry") ) {
        this.$Progress.start();
        this.form
          .put("api/stockEntries/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadStockEntries");
            $("#addEditStockEntryModal").modal("hide");
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
    deleteStockEntryDetail(i, id = null) {
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
                    .delete("api/removeStockEntryDetail/" + id)
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

    assignProduct(i, event) {
      // if a value is selected logic start
      if (event) {
        // let productId=event.target.value;
        let productId = this.form.stock_entry_details[i].product_id;
        let getProduct = this.products.filter(
          (product) => product.id == productId
        )[0];

        // add the product object to the stockEntry detail
        this.form.stock_entry_details[i].product = getProduct;
      }
      if (!event) {
        this.form.stock_entry_details[i].product = getProduct;
        this.form.stock_entry_details[i].total_quantity = "";
      }

    },
    // Add products into stockEntry details
    addSearchedProducts() {
      // Filter the products array
      this.products.filter((product) => {
        if (this.productName) {
          if (
            product.name == this.productName ||
            product.code == this.productName
          ) {
            this.form.stock_entry_details.push({
              id: "",
              stock_entry_id: "",
              product_id: product.id,
              total_quantity: "",
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
            this.form.stock_entry_details.push({
              id: "",
              stock_entry_id: "",
              product_id: product.id,
              total_quantity: "",
            });

            this.assignProduct(this.form.stock_entry_details.length-1, true);

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
    $("#addEditStockEntryModal").on("show.bs.modal", function (e) {
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
        // Manually fill stockEntry detail 
        const stockEntryDetails = [];
         Array.from(e.relatedTarget.stock_entry_details).forEach(data => {
          stockEntryDetails.push(data);
        })
        form.stock_entry_details = stockEntryDetails;
      } else {
        form.reset();
        that.editMode = false;
      }
    });
      axios.get("api/getAllProducts").then((response) => {
        this.products = response.data;
      });
    $("#addEditStockEntryModal").on("hidden.bs.modal", function (e) {
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
