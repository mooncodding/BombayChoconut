<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditProductDiscountModal"
      city="dialog"
      aria-labelledby="addEditProductDiscountModalLabel"
      aria-hidden="true"
      data-keyboard="false"
      data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditProductDiscountModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_PRODUCT_DISCOUNT") }}
            </h5>
            <h5
              class="modal-title"
              id="addEditProductDiscountModalLabel"
              v-else
            >
              {{ $t("message.EDIT_PRODUCT_DISCOUNT") }}
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
          <form
            @submit.prevent="
              editMode ? editProductDiscount() : addProductDiscount()
            "
          >
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">
              <!-- Category Slider -->
              <div class="row">
                <!-- Filters -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{ $t("message.FILTER_BY") }}</label>
                    <v-radio-group
                      v-model="filterBy"
                      row
                      class="filter-radio"
                      @change="resetFilteredProducts()"
                    >
                      <v-radio
                        :label="$t('message.CATEGORIES')"
                        value="categories"
                      ></v-radio>
                      <v-radio
                        :label="$t('message.BRANDS')"
                        value="brands"
                      ></v-radio>
                    </v-radio-group>
                  </div>
                </div>

                <!-- Section for headers -->
                <div class="col-md-6">
                  <label
                    >{{ $t("message.SEARCH")
                    }}<span class="required-star"></span
                  ></label>
                  <customAutoComplete
                    ref="autocomplete"
                    :source="products.filter(item => item.id != (form.product_discounts && form.product_discounts.length > 0 && form.product_discounts.find(i => i.product_id == item.id) != undefined ? form.product_discounts.find(i => i.product_id == item.id).product_id : 0))"
                    v-model="productName"
                    :placeholder="$t('message.SEARCH_PRODUCTS_TO_ADD')"
                    :results-display="formattedDisplay"
                    resultsValue="name"
                    @input="addSearchedProducts()"
                  >
                  </customAutoComplete>
                </div>
              </div>
              <div v-if="!loadingData">
                <template>
                  <!-- FILTER BY CATEGORIES -->
                  <v-sheet class="mx-auto" v-if="filterBy == 'categories'">
                    <v-slide-group v-model="activeCategoryIndex" show-arrows>
                      <v-slide-item
                        v-for="(category, index) in categories"
                        :key="index"
                        v-slot="{ active, toggle }"
                      >
                        <v-card
                          :color="active ? '#00117E' : '#FFFFFF'"
                          class="ma-4 px-2 py-2"
                          height="40"
                          @click="
                            toggle();
                            setFilteredProducts(category, 'categories');
                          "
                        >
                          <boxSliderItem
                            :name="category.name"
                            :image="category.image"
                            type="categories"
                            :index="index"
                            :active="active"
                          ></boxSliderItem>
                        </v-card>
                      </v-slide-item>
                    </v-slide-group>

                    <v-expand-transition>
                      <div class="product-grid-container">
                        <div
                          class="row container menu-items col-container"
                          v-if="
                            activeCategoryIndex != null &&
                              filteredProducts &&
                              filteredProducts.length > 0
                          "
                        >
                          <div
                            class="col-md-6 col-xs-12 col-xl-2 col-lg-3"
                            v-for="(product, index) in filteredProducts"
                            :key="product.id"
                            @click="setSelectedProducts(product)"
                          >
                            <div style="height: 90% !important">
                              <productCard
                                :product="product"
                                :index="index"
                                :isSelected="
                                  form.product_discounts &&
                                  form.product_discounts.length > 0 &&
                                  form.product_discounts.find(
                                    (item) => item.product_id == product.id
                                  ) != undefined
                                    ? true
                                    : false
                                "
                              ></productCard>
                            </div>
                          </div>
                        </div>
                        <div v-else-if="activeCategoryIndex != null">
                          <h3 class="text-center mx-3">
                            {{ $t("message.NO_PRODUCTS_MSG") }}
                          </h3>
                        </div>
                      </div>
                    </v-expand-transition>
                  </v-sheet>

                  <!-- FILTER BY BRANDS -->
                  <v-sheet class="mx-auto" v-if="filterBy == 'brands'">
                    <v-slide-group v-model="activeBrandIndex" show-arrows>
                      <v-slide-item
                        v-for="(brand, index) in brands"
                        :key="index"
                        v-slot="{ active, toggle }"
                      >
                        <v-card
                          :color="active ? '#00117E' : '#FFFFFF'"
                          class="ma-4 px-2 py-2"
                          height="40"
                          @click="
                            toggle();
                            setFilteredProducts(brand, 'brands');
                          "
                        >
                          <boxSliderItem
                            :name="brand.name"
                            :image="brand.image"
                            type="brands"
                            :index="index"
                            :active="active"
                          ></boxSliderItem>
                        </v-card>
                      </v-slide-item>
                    </v-slide-group>

                    <v-expand-transition>
                      <div class="product-grid-container">
                        <div
                          class="row container menu-items col-container"
                          v-if="
                            activeCategoryIndex != null &&
                              filteredProducts &&
                              filteredProducts.length > 0
                          "
                        >
                          <div
                            class="col-md-6 col-xs-12 col-xl-2 col-lg-3"
                            v-for="(product, index) in filteredProducts"
                            :key="product.id"
                            @click="setSelectedProducts(product)"
                          >
                            <div style="height: 90% !important">
                              <productCard
                                :product="product"
                                :index="index"
                                :isSelected="
                                  form.product_discounts &&
                                  form.product_discounts.length > 0 &&
                                  form.product_discounts.find(
                                    (item) => item.product_id == product.id
                                  ) != undefined
                                    ? true
                                    : false
                                "
                              ></productCard>
                            </div>
                          </div>
                        </div>
                        <div v-else-if="activeCategoryIndex != null">
                          <h3 class="text-center">
                            No products available in this category
                          </h3>
                        </div>
                      </div>
                    </v-expand-transition>
                  </v-sheet>
                </template>
                <div class="container-fluid">
                  <div
                    class="row form-group align-items-center mt-4"
                    v-if="
                      form.product_discounts &&
                        form.product_discounts.length > 0
                    "
                  >
                    <div
                      class="col-md-12 col-xs-12 col-xl-3 col-lg-3 my-0 py-0"
                    >
                      <label>{{ $t("message.PRODUCT") }}</label>
                    </div>
                    <div
                      class="col-md-12 col-xs-12 col-xl-2 col-lg-2 my-0 py-0"
                    >
                      <label>{{ $t("message.DISCOUNT_TYPE") }}</label>
                    </div>
                    <div
                      class="col-md-12 col-xs-12 col-xl-2 col-lg-2 my-0 py-0"
                    >
                      <label>{{ $t("message.BEFORE_PRICE") }}</label>
                    </div>
                    <div
                      class="col-md-12 col-xs-12 col-xl-2 col-lg-2 my-0 py-0"
                    >
                      <label>{{ `${$t("message.AFTER_PRICE")}` }}</label>
                    </div>
                    <div
                      class="col-md-12 col-xs-12 col-xl-2 col-lg-2 my-0 py-0"
                    >
                      <label>{{ `${$t("message.PERCENTAGE")}` }}</label>
                    </div>
                  </div>
                  <div
                    class="row align-items-center my-0 py-0"
                    v-for="(product_discount, index) in form.product_discounts"
                    :key="index"
                  >
                    <div
                      class="col-md-12 col-xs-12 col-xl-3 col-lg-3 my-0 py-0"
                    >
                      <h6>
                        {{
                          product_discount.product
                            ? product_discount.product.name
                            : ""
                        }}
                      </h6>
                    </div>
                    <div
                      class="col-md-12 col-xs-12 col-xl-2 col-lg-2 my-0 py-0"
                    >
                      <v-select
                        v-model="product_discount.type"
                        :options="discountTypes"
                        label="label"
                        :clearable="false"
                        @input="resetDiscountValue(index)"
                        :reduce="(discountType) => discountType.value"
                        :selectOnTab="true"
                        :key="product_discount.type"
                        :class="{
                          'is-invalid': form.errors.has('type'),
                        }"
                      />
                      <div
                        class="error-message"
                        v-if="form.errors.has('type')"
                        v-html="form.errors.get('type')"
                      />
                    </div>
                    <div
                      class="col-md-12 col-xs-12 col-xl-2 col-lg-2 my-0 py-0"
                    >
                      <h6>
                        {{
                          product_discount.before_price
                            ? product_discount.before_price
                            : 0
                        }}
                      </h6>
                    </div>
                    <div
                      class="col-md-12 col-xs-12 col-xl-2 col-lg-2 my-0 py-0"
                    >
                      <v-text-field
                        :disabled="product_discount.type == 'percentage'"
                        :label="$t('message.AFTER_PRICE')"
                        v-model="product_discount.after_price"
                        @keyup="calculateDiscount(index)"
                        type="number"
                        :class="{
                          'is-invalid': form.errors.has('after_price'),
                        }"
                      ></v-text-field>
                      <div
                        class="error-message"
                        v-if="
                          form.errors.has(
                            'product_discounts.' + index + '.after_price'
                          )
                        "
                        v-html="
                          form.errors.get(
                            'product_discounts.' + index + '.after_price'
                          )
                        "
                      />
                      <small
                        v-if="
                          parseFloat(product_discount.after_price) >
                            parseFloat(
                              product_discount.product
                                ? product_discount.product.wholesale_price
                                : 0
                            )
                        "
                        class="text-danger"
                      >
                        {{ $t("message.AFTER_PRICE_ERROR") }}
                      </small>
                    </div>
                    <div
                      class="col-md-12 col-xs-12 col-xl-2 col-lg-2 my-0 py-0"
                    >
                      <v-text-field
                        :disabled="product_discount.type == 'flat'"
                        :label="$t('message.PERCENTAGE')"
                        @keyup="calculateDiscount(index)"
                        v-model="product_discount.discount_percentage"
                        type="number"
                        :max="
                          product_discount.product
                            ? parseFloat(
                                product_discount.product.wholesale_price
                              )
                            : 0
                        "
                        :class="{
                          'is-invalid': form.errors.has('discount_percentage'),
                        }"
                      ></v-text-field>
                      <div
                        class="error-message"
                        v-if="
                          form.errors.has(
                            'product_discounts.' +
                              index +
                              '.discount_percentage'
                          )
                        "
                        v-html="
                          form.errors.get(
                            'product_discounts.' +
                              index +
                              '.discount_percentage'
                          )
                        "
                      />
                      <small
                        v-if="
                          parseFloat(product_discount.discount_percentage) > 100
                        "
                        class="text-danger"
                      >
                        {{ $t("message.PERCENTAGE_ERROR") }}
                      </small>
                    </div>
                    <div
                      class="col-md-12 col-xs-12 col-xl-1 col-lg-1"
                      align="center"
                    >
                      <a
                        class="btn btn-danger text-white"
                        v-on:click.stop="
                          deleteProductDiscount(
                            index,
                            product_discount.id,
                            product_discount.category_id
                          )
                        "
                        ><i class="fas fa-trash-alt"></i
                      ></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center my-3" v-else>
                <v-progress-circular
                  :size="70"
                  :width="7"
                  color="primary"
                  indeterminate
                ></v-progress-circular>
              </div>
            </div>

            <div class="modal-footer">
              <button
                @click.prevent="addProductDiscount"
                v-if="editMode === false"
                type="submit"
                :disabled="form.product_discounts == 0"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_PRODUCT_DISCOUNT") }}
              </button>
              <button
                @click.prevent="editProductDiscount"
                v-else
                :disabled="form.product_discounts == 0"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_PRODUCT_DISCOUNT") }}
              </button>

              <button type="button" class="btn btn-danger" data-dismiss="modal">
                {{ $t("message.CLOSE") }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import boxSliderItem from "../atoms/boxSliderItem.vue";
import productCard from "../atoms/productCard.vue";
import autocomplete from "vuejs-auto-complete";
import customAutoComplete from ".././customAutoComplete.vue";
export default {
  name: "addEditProductDiscountModal",
  props: ["citydata"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      cities: [],
      editMode: "",
      categories: [],
      products: [],
      brands: [],
      activeCategoryIndex: 0,
      activeBrandIndex: 0,
      filterBy: "categories",
      filteredProducts: [],
      productName: "",
      loadingData: true,
      discountTypes: [
        { label: this.$t("message.FLAT"), value: "flat" },
        { label: this.$t("message.PERCENTAGE"), value: "percentage" },
      ],
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        product_discounts: [],
      }),
    };
  },
  components: {
    boxSliderItem,
    productCard,
    autocomplete,
    customAutoComplete,
  },
  methods: {
    addProductDiscount() {
      if (
        this.is("Super Admin") ||
        this.can("create_campaign") ||
        this.can("edit_campaign")
      ) {
        this.$Progress.start();
        this.form
          .post("api/saveOrUpdateProductDiscount")
          .then(() => {
            Fire.$emit("reloadCampaigns");
            $("#addEditProductDiscountModal").modal("hide");
            toast.fire({
              icon: "success",
              title: this.$t("message.CREATED_MESSAGE_SUCCESS"),
            });
            this.$Progress.finish();
          })
          .catch(() => {
            this.$Progress.fail();
            toast.fire({
              icon: "warning",
              title: this.$t("message.CREATED_MESSAGE_ERROR"),
            });
          });
      } else {
        swal.fire({
          text: this.$t("message.UNAUTHORIZED"),
          icon: "warning",
        });
      }
    },
    editProductDiscount() {
      if (
        this.is("Super Admin") ||
        this.can("create_campaign") ||
        this.can("edit_campaign")
      ) {
        this.$Progress.start();
        this.form
          .post("api/saveOrUpdateProductDiscount")
          .then(() => {
            Fire.$emit("reloadCities");
            $("#addEditProductDiscountModal").modal("hide");
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
        swal.fire({
          text: this.$t("message.UNAUTHORIZED"),
          icon: "warning",
        });
      }
    },

    // set filtered products to display
    setFilteredProducts(object, filterBy) {
      if (object && object.id != undefined) {
        if (object.id == 0) {
          this.filteredProducts = this.products;
        } else {
          if (filterBy == "categories") {
            this.filteredProducts = this.products.filter(
              (product) => product.category_id == object.id
            );
          }
          if (filterBy == "brands") {
            this.filteredProducts = this.products.filter(
              (product) => product.brand_id == object.id
            );
          }
        }
      }
      return [];
    },

    // set selected products
    // it will handle either product needs to be added or deleted
    setSelectedProducts(product) {
      if (product) {
        let productIndex = this.form.product_discounts.findIndex(
          (item) => item.product_id === product.id
        );
        if (productIndex != -1) {
          if (
            this.editMode &&
            this.form.product_discounts[productIndex].id != ""
          ) {
            swal
              .fire({
                title: this.$t("message.CONFIRM"),
                text: this.$t("message.DELETE_MESSAGE_REVERT"),
                type: "warning",
                showCancelButton: true,
                cancelButtonText: this.$t("message.CANCEL"),
                confirmButtonColor: "#3085D6",
                cancelButtonColor: "#d33",
                confirmButtonText: this.$t("message.DELETE_BUTTON_TEXT"),
              })
              .then((result) => {
                if (result.value) {
                  // Send request to the server
                  if (this.form.product_discounts[productIndex].id != "") {
                    axios
                      .delete(
                        "api/deleteProductDiscount/" +
                          this.form.product_discounts[productIndex].id
                      )
                      .then(() => {
                        this.form.product_discounts.splice(productIndex, 1);
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
                    this.form.product_discounts.splice(productIndex, 1);
                    swal.fire(
                      "Deleted!",
                      this.$t("message.DELETE_MESSAGE_SUCCESS"),
                      "success"
                    );
                  }
                }
              });
          } else {
            this.form.product_discounts.splice(productIndex, 1);
          }
        } else {
          this.form.product_discounts.push({
            id: "",
            campaign_id: this.campaignData.id,
            product_id: product.id,
            type: "flat",
            after_price: "",
            discount_percentage: "",
            before_price: product.wholesale_price ? product.wholesale_price : 0,
            product,
          });
        }
      }
    },

    // reset the filtered products
    resetFilteredProducts() {
      this.filteredProducts = this.products;
      this.activeBrandIndex = 0;
      this.activeCategoryIndex = 0;
    },

    // Reset discount values
    resetDiscountValue(index) {
      // if (
      //   index != undefined &&
      //   this.form.product_discounts &&
      //   this.form.product_discounts.length > 0
      // ) {
      //   this.form.product_discounts[index].after_price = "";
      //   this.form.product_discounts[index].discount_percentage = "";
      // }
    },

    // Add products into stockAdjustment details
    addSearchedProducts() {
      // Filter the products array
      this.products.filter((product) => {
        if (this.productName) {
          if (
            product.name == this.productName ||
            product.bar_code == this.productName
          ) {
            if (this.form.product_discounts.find(item => item.product_id == product.id) == undefined) {
            this.form.product_discounts.push({
              id: "",
              campaign_id: this.campaignData.id,
              product_id: product.id,
              type: "flat",
              after_price: "",
              discount_percentage: "",
              before_price: product.wholesale_price
                ? product.wholesale_price
                : 0,
              product,
            });
            }

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

    assignProduct(i, event) {
      // if a value is selected logic start
      if (event) {
        // let productId=event.target.value;
        let productId = this.form.product_discounts[i].product_id;
        let getProduct = this.products.filter(
          (product) => product.id == productId
        )[0];

        // add the product object to the stockAdjustment detail
        this.form.product_discounts[i].product = getProduct;
      }
      if (!event) {
        this.form.product_discounts[i].product = getProduct;
        this.form.product_discounts[i].sku = "";
      }
    },

    // get data from auto complete component
    getDataFromAutoCommplete(value) {
      // Filter the products array
      this.products.filter((product) => {
        if (value) {
          if (
            product.name.toLowerCase().trim() == value.toLowerCase().trim() ||
            product.bar_code == value
          ) {
            if (this.form.product_discounts.find(item => item.product_id == product.id) == undefined) {
              this.form.product_discounts.push({
              id: "",
              campaign_id: this.campaignData.id,
              product_id: product.id,
              type: "flat",
              after_price: "",
              before_price: product.wholesale_price
                ? product.wholesale_price
                : 0,
              discount_percentage: "",
              product,
            });
            }
           

            this.assignProduct(this.form.product_discounts.length - 1, true);

            // clear the search field
            value = null;
            this.$refs.autocomplete.clear();
          }
        } else {
          // clear the auto complete
          this.$refs.autocomplete.clear();
        }
      });
    },

    deleteProductDiscount(i, id = null, product_id) {
      if (
        this.is("Super Admin") ||
        this.can("create_campaign") ||
        this.can("edit_campaign")
      ) {
        if (this.editMode && id != "") {
          swal
            .fire({
              title: this.$t("message.CONFIRM"),
              text: this.$t("message.DELETE_MESSAGE_REVERT"),
              type: "warning",
              showCancelButton: true,
              cancelButtonText: this.$t("message.CANCEL"),
              confirmButtonColor: "#3085D6",
              cancelButtonColor: "#d33",
              confirmButtonText: this.$t("message.DELETE_BUTTON_TEXT"),
            })
            .then((result) => {
              if (result.value) {
                // Send request to the server
                if (id != "") {
                  axios
                    .delete("api/deleteProductDiscount/" + id)
                    .then(() => {
                      this.form.product_discounts.splice(i, 1);
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
                  this.form.product_discounts.splice(i, 1);
                  swal.fire(
                    "Deleted!",
                    this.$t("message.DELETE_MESSAGE_SUCCESS"),
                    "success"
                  );
                }
              }
            });
        } else {
          this.form.product_discounts.splice(i, 1);
        }
      } else {
        swal.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
          type: "warning",
        });
      }
    },

    calculateDiscount(index) {
      if (
        this.form.product_discounts &&
        this.form.product_discounts.length > 0 &&
        index != undefined
      ) {
        if (this.form.product_discounts[index].type == "flat") {
          if (
            !this.form.product_discounts[index].after_price ||
            this.form.product_discounts[index].after_price == ""
          ) {
            this.form.product_discounts[index].discount_percentage = "";
          } else {
            this.form.product_discounts[index].discount_percentage = parseFloat(
              100 -
                parseFloat(
                  this.form.product_discounts[index].after_price /
                    this.form.product_discounts[index].before_price
                ) *
                  100
            );
            this.form.product_discounts[index].discount_percentage = parseFloat(this.form.product_discounts[index].discount_percentage).toFixed(2)
          }
        }

        if (this.form.product_discounts[index].type == "percentage") {
          if (
            !this.form.product_discounts[index].discount_percentage ||
            this.form.product_discounts[index].discount_percentage == ""
          ) {
            this.form.product_discounts[index].after_price = "";
          } else {
            this.form.product_discounts[index].after_price = parseFloat(
              this.form.product_discounts[index].before_price -
                parseFloat(
                  (parseFloat(this.form.product_discounts[index].before_price) *
                    parseFloat(
                      this.form.product_discounts[index].discount_percentage
                    )) /
                    100
                )
            );
            this.form.product_discounts[index].after_price = parseFloat(this.form.product_discounts[index].after_price).toFixed(2)
          }
        }
      }
    },
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#addEditProductDiscountModal").on("show.bs.modal", function(e) {
      that.campaignData = e.relatedTarget;
      if (e.relatedTarget && e.relatedTarget.product_discounts.length > 0) {
        that.editMode = true;
        form.reset();
        form.fill(e.relatedTarget);
      } else {
        form.reset();
        that.editMode = false;
      }
      axios.get("api/getAllCategories").then((response) => {
        that.categories = response.data;
        that.categories.unshift({
          id: 0,
          name: that.$t("message.ALL"),
          category_products: [],
        });
        that.setFilteredProducts(that.categories[0], "categories");
        axios.get("api/getAllProducts").then((response) => {
          that.products = response.data;
          that.filteredProducts = that.products;
          axios.get("api/getAllBrands").then((response) => {
            that.brands = response.data;
            that.brands.unshift({
              id: 0,
              name: that.$t("message.ALL"),
              category_products: [],
            });
            that.loadingData = false;
          });
        });
      });
    });
  },
  created() {
    Fire.$on("getDataFromAutoCommplete", (value) => {
      this.getDataFromAutoCommplete(value);
    });
  },
};
</script>
