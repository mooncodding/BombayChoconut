<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditCategoryDiscountModal"
      city="dialog"
      aria-labelledby="addEditCategoryDiscountModalLabel"
      aria-hidden="true"
      data-keyboard="false"
      data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addEditCategoryDiscountModalLabel">
              {{
                `${campaignData ? campaignData.name : ""}  -${$t(
                  "message.CATEGORIES_DISCOUNT"
                )}`
              }}
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
          <form @submit.prevent="editMode ? editCity() : addCategoryDiscount()">
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">
              <div class="form-group">
                <label
                  >{{ $t("message.CATEGORIES")
                  }}<span class="required-star">*</span></label
                >
                <treeselect
                  v-model="form.category_ids"
                  :show-count="true"
                  :clearable="true"
                  noChildrenText="Aucune sous-option"
                  noOptionsText="Aucune option disponible"
                  noResultsText="Aucun résultat trouvé"
                  :options="categories"
                  @input="handleDiscountCategory()"
                  @deselect="handleDiscountCategory()"
                  search-nested
                  :multiple="true"
                  :default-expand-level="1"
                  placeholder="Choisir une catégorie."
                >
                  <!-- <div slot="value-label" slot-scope="{ node }">{{ node.raw }}</div> -->
                </treeselect>
                <div
                  class="error-message"
                  v-if="form.errors.has('category_ids')"
                  v-html="form.errors.get('category_ids')"
                />
              </div>
              <div
                class="container-fluid"
                v-if="form.categories && form.categories.length > 0"
              >
                <div class="row align-items-center">
                  <div class="col-3">
                    {{ $t("message.CATEGORY") }}
                  </div>
                  <div class="col-4">
                    {{ $t("message.DISCOUNT_TYPE") }}
                  </div>
                  <div class="col-4">
                    {{ $t("message.PERCENTAGE") + " / " + $t("message.PRICE") }}
                  </div>
                </div>
                <div
                  class="row align-items-center"
                  v-for="(category, index) in this.form.categories"
                  :key="index"
                >
                  <div class="col-3">
                    {{ category.category.name }}
                  </div>
                  <div class="col-4">
                    <v-select
                      v-model="category.type"
                      :options="discountTypes"
                      label="label"
                      :clearable="false"
                      :reduce="(discountType) => discountType.value"
                      :selectOnTab="true"
                      :key="category.type"
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
                  <div class="col-3" v-if="category.type == 'flat'">
                    <v-text-field
                      :label="$t('message.PRICE')"
                      v-model="category.discount_price"
                      type="number"
                      :class="{
                        'is-invalid': form.errors.has('categories.'+index+'.discount_price'),
                      }"
                    ></v-text-field>
                    <div
                      class="error-message"
                      v-if="form.errors.has('categories.'+index+'.discount_price')"
                      v-html="form.errors.get('categories.'+index+'.discount_price')"
                    />
                  </div>
                  <div class="col-3" v-if="category.type == 'percentage'">
                    <v-text-field
                      :label="$t('message.PERCENTAGE')"
                      v-model="category.discount_percentage"
                      type="number"
                      :class="{
                        'is-invalid': form.errors.has('categories.'+index+'.discount_percentage'),
                      }"
                    ></v-text-field>
                    <div
                      class="error-message"
                      v-if="form.errors.has('categories.'+index+'.discount_percentage')"
                      v-html="form.errors.get('categories.'+index+'.discount_percentage')"
                    />
                  </div>
                  <div class="col-2" align="center">
                    <a
                      class="btn btn-danger text-white"
                      v-on:click.stop="
                        deleteCategoryDiscount(
                          index,
                          category.id,
                          category.category_id
                        )
                      "
                      ><i class="fas fa-trash-alt"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addCategoryDiscount"
                v-if="editMode === false"
                type="submit"
                :disabled="form.categories == 0"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_CATEGORY_DISCOUNT") }}
              </button>
              <button
                @click.prevent="editCity"
                v-else
                type="submit"
                :disabled="form.categories == 0"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_CATEGORY_DISCOUNT") }}
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
import Treeselect from "@riophae/vue-treeselect";
export default {
  name: "addEditCategoryDiscountModal",
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      cities: [],
      editMode: "",
      campaignData: {},
      categories: [],
      allCategories: [],
      discountTypes: [
        { label: this.$t("message.FLAT"), value: "flat" },
        { label: this.$t("message.PERCENTAGE"), value: "percentage" },
      ],
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        category_ids: null,
        categories: [],
      }),
    };
  },
  components: {
    Treeselect,
  },
  watch: {
    internalValue(internalValue) {
      if (internalValue) {
        this.value = this.value ? [this.value] : [];
      } else {
        this.value = this.value[0];
      }
    },
  },
  methods: {
    addCategoryDiscount() {
      if (
        this.is("Super Admin") ||
        this.can("create_campaign") ||
        this.can("edit_campaign")
      ) {
        this.$Progress.start();
        this.form
          .post("api/saveOrUpdateCategoryDiscount")
          .then(() => {
            Fire.$emit("reloadCampaigns");
            $("#addEditCategoryDiscountModal").modal("hide");
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
    editCity() {
      if (
        this.is("Super Admin") ||
        this.can("create_campaign") ||
        this.can("edit_campaign")) {
        this.$Progress.start();
        this.form
          .post("api/saveOrUpdateCategoryDiscount")
          .then(() => {
            Fire.$emit("reloadCampaigns");
            $("#addEditCategoryDiscountModal").modal("hide");
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

    handleDiscountCategory() {
      if (this.form.category_ids && this.form.category_ids.length > 0) {
        this.form.category_ids.map((id) => {
          let isExists = this.form.categories.find((item) => item.category_id === id);
          let category = this.allCategories.find((item) => item.id == id);
          if (isExists == undefined) {
            this.form.categories.push({
              id: "",
              campaign_id: this.campaignData.id,
              category_id: category.id,
              category: category,
              type: "flat",
              discount_percentage: "",
              discount_price: "",
            });
          }
        });
        this.form.categories && this.form.categories.map((item, index) => {
          let isFound = this.form.category_ids.find((i) => i == item.category_id)
          if (isFound == undefined) {
            this.form.categories.splice(index, 1)
          }
         })
        return this.form.categories;
      }
      this.form.categories && this.form.categories.map((item, index) => {
          let isFound = this.form.category_ids.find((i) => i == item.category_id)
          if (isFound == undefined) {
            this.form.categories.splice(index, 1)
          }
         })
      return [];
    },

    deleteCategoryDiscount(i, id = null, category_id) {
      if (
        this.is("Super Admin") ||
        this.can("create_campaign") ||
        this.can("edit_campaign")
      ) {
        if (this.editMode) {
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
                    .delete("api/deleteCategoryDiscount/" + id)
                    .then(() => {
                      this.form.categories.splice(i, 1);
                      let index = this.form.category_ids.findIndex(
                        (cat) => cat == category_id
                      );
                      if (index != -1) {
                        this.form.category_ids.splice(index, 1);
                      }
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
                  let index = this.form.category_ids.findIndex(
                    (cat) => cat == category_id
                  );
                  if (index != -1) {
                    this.form.category_ids.splice(index, 1);
                  }
                  swal.fire(
                    "Deleted!",
                    this.$t("message.DELETE_MESSAGE_SUCCESS"),
                    "success"
                  );
                }
              }
            });
        } else {
          this.form.categories.splice(i, 1);
          let index = this.form.category_ids.findIndex(
            (cat) => cat == category_id
          );
          if (index != -1) {
            this.form.category_ids.splice(index, 1);
          }
        }
      } else {
        swal.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
          type: "warning",
        });
      }
    },
  },

  computed: {},

  mounted() {
    var form = this.form;
    var that = this;
    $("#addEditCategoryDiscountModal").on("show.bs.modal", function(e) {
      that.campaignData = e.relatedTarget;
      if (e.relatedTarget && e.relatedTarget.category_discounts.length > 0) {
        that.editMode = true;
        form.reset();
        form.fill(e.relatedTarget);
        form.categories = e.relatedTarget.category_discounts;
        form.category_ids = form.categories.map((value) => value.category_id);
      } else {
        form.reset();
        that.editMode = false;
      }
      axios.get("api/getAllCategoriesWithChild").then((response) => {
        that.categories = response.data;
        axios.get("api/getAllCategories").then((response) => {
          that.allCategories = response.data;
        });
      });
    });
  },
};
</script>
