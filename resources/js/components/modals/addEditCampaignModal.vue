<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditCampaignModal"
      campaign="dialog"
      aria-labelledby="addEditCampaignModalLabel"
      aria-hidden="true"
      data-keyboard="false"
      data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditCampaignModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_CAMPAIGN") }}
            </h5>
            <h5 class="modal-title" id="addEditCampaignModalLabel" v-else>
              {{ $t("message.EDIT_CAMPAIGN") }}
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
          <form @submit.prevent="editMode ? editCampaign() : addCampaign()">
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">
              <!-- Name -->
              <div class="form-group">
                <label
                  >{{ $t("message.NAME")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.name"
                  v-bind:placeholder="$t('message.NAME')"
                  type="text"
                  name="name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('name')"
                  v-html="form.errors.get('name')"
                />
              </div>

              <!-- Start Datetime -->
              <div class="form-group">
                <label
                  >{{ $t("message.START_DATETIME")
                  }}<span class="required-star">*</span></label
                >
                <datetime
                  :language="activeLang"
                  v-model="form.start_datetime"
                  v-bind:placeholder="$t('message.START_DATETIME')"
                  type="datetime"
                  name="start_datetime"
                  :input-class="{
                    'is-invalid form-control bgwhite': form.errors.has(
                      'start_datetime'
                    ),
                    'form-control bgwhite': !form.errors.has('start_datetime'),
                  }"
                ></datetime>
                <div
                  class="error-message"
                  v-if="form.errors.has('start_datetime')"
                  v-html="form.errors.get('start_datetime')"
                />
              </div>

              <!-- End Datetime -->
              <div class="form-group">
                <label
                  >{{ $t("message.END_DATETIME")
                  }}<span class="required-star">*</span></label
                >
                <datetime
                  :language="activeLang"
                  v-model="form.end_datetime"
                  v-bind:placeholder="$t('message.END_DATETIME')"
                  type="datetime"
                  name="end_datetime"
                  :input-class="{
                    'is-invalid form-control bgwhite': form.errors.has(
                      'end_datetime'
                    ),
                    'form-control bgwhite': !form.errors.has('end_datetime'),
                  }"
                ></datetime>
                <div
                  class="error-message"
                  v-if="form.errors.has('end_datetime')"
                  v-html="form.errors.get('end_datetime')"
                />
              </div>

              <!-- Applicable On Dropdown -->
              <div class="form-group">
                <label
                  >{{ $t("message.APPLICABLE_ON")
                  }}<span class="required-star">*</span></label
                >
                <v-select
                  v-model="form.applicable_on"
                  :options="applicableOn"
                  :disabled="editMode"
                  label="label"
                  :reduce="(applicable) => applicable.value"
                  :selectOnTab="true"
                  :key="form.applicable_on"
                  :class="{ 'is-invalid': form.errors.has('applicable_on') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('applicable_on')"
                  v-html="form.errors.get('applicable_on')"
                />
              </div>

              <!-- Discount Type Dropdown -->
              <div class="form-group" v-if="form.applicable_on == 'storewide'">
                <label>{{ $t("message.DISCOUNT_TYPE") }}</label>
                <v-select
                  v-model="form.discount_type"
                  :options="discountTypes"
                  label="label"
                  :reduce="(discountType) => discountType.value"
                  :selectOnTab="true"
                  :key="form.discount_type"
                  :class="{ 'is-invalid': form.errors.has('discount_type') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('discount_type')"
                  v-html="form.errors.get('discount_type')"
                />
              </div>

              <!-- Discount Value -->
              <div class="form-group" v-if="form.applicable_on == 'storewide'">
                <label>{{ $t("message.DISCOUNT_VALUE") }}</label>
                <input
                  v-model="form.discount_value"
                  v-bind:placeholder="$t('message.DISCOUNT_VALUE')"
                  type="text"
                  name="discount_value"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('discount_value') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('discount_value')"
                  v-html="form.errors.get('discount_value')"
                />
              </div>

              <!-- Notes -->
              <div class="form-group">
                <label>
                  {{ $t("message.NOTES") }}
                </label>
                <textarea
                  autofocus
                  v-model="form.notes"
                  v-bind:placeholder="$t('message.NOTES')"
                  type="text"
                  name="notes"
                  class="form-control"
                ></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addCampaign"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_CAMPAIGN") }}
              </button>
              <button
                @click.prevent="editCampaign"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_CAMPAIGN") }}
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
import moment from "moment";
import { activeLang } from "../../app";
export default {
  name: "addEditCampaignModal",
  data() {
    return {
      activeLang: activeLang,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      campaigns: [],
      editMode: "",
      applicableOn: [
        { label: this.$t("message.PRODUCTS"), value: "products" },
        { label: this.$t("message.CATEGORIES"), value: "categories" },
        { label: this.$t("message.STOREWIDE"), value: "storewide" },
      ],
      discountTypes: [
        { label: this.$t("message.FLAT"), value: "flat" },
        { label: this.$t("message.PERCENTAGE"), value: "percentage" },
      ],
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        start_datetime: new Date().toISOString(),
        end_datetime: "",
        applicable_on: "",
        discount_type: "",
        discount_value: "",
        notes: "",
      }),
    };
  },
  methods: {
    addCampaign() {
      if (this.is("Super Admin") || this.can("create_campaign")) {
        this.$Progress.start();
        this.form.start_datetime = moment
          .utc(this.form.start_datetime)
          .local()
          .format();
        this.form.end_datetime = moment
          .utc(this.form.end_datetime)
          .local()
          .format();
        this.form
          .post("api/campaigns")
          .then(() => {
            Fire.$emit("reloadCampaigns");
            $("#addEditCampaignModal").modal("hide");
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
    editCampaign() {
      if (this.is("Super Admin") || this.can("edit_campaign")) {
        this.$Progress.start();
        this.form.start_datetime = moment
          .utc(this.form.start_datetime)
          .local()
          .format();
        this.form.end_datetime = moment
          .utc(this.form.end_datetime)
          .local()
          .format();
        this.form
          .put("api/campaigns/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadCampaigns");
            $("#addEditCampaignModal").modal("hide");
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
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#addEditCampaignModal").on("show.bs.modal", function(e) {
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
        const start_datetime = new Date(e.relatedTarget.start_datetime);
        form.start_datetime = start_datetime.toISOString();
        const end_datetime = new Date(e.relatedTarget.end_datetime);
        form.end_datetime = end_datetime.toISOString();
      } else {
        form.reset();
        that.editMode = false;
      }
    });
  },
};
</script>
