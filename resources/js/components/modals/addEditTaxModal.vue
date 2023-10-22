<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditTaxModal"
      taxRate="dialog"
      aria-labelledby="addEditTaxModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditTaxModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_TAX") }}
            </h5>
            <h5 class="modal-title" id="addEditTaxModalLabel" v-else>
              {{ $t("message.EDIT_TAX") }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editMode ? editTax() : addTax()">
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">
              <!-- Name -->
              <div class="form-group">
                <label
                  >{{ $t("message.NAME") }}<span class="required-star">*</span></label
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

              <!-- Code -->
              <div class="form-group">
                <label
                  >{{ $t("message.TAX_CODE")
                  }}</label
                >
                <input
                  v-model="form.code"
                  v-bind:placeholder="$t('message.TAX_CODE')"
                  type="text"
                  name="code"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('code') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('code')"
                  v-html="form.errors.get('code')"
                />
              </div>

              
              <!-- Rate -->
              <div class="form-group">
                <label
                  >{{ $t("message.RATE")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.rate"
                  v-bind:placeholder="$t('message.RATE')"
                  type="text"
                  name="rate"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('rate') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('rate')"
                  v-html="form.errors.get('rate')"
                />
              </div>


              <!-- Tax Rate Types -->
              <div class="form-group">
                <label>{{$t('message.TYPE')}}<span class="required-star">*</span></label>
                <v-select v-model="form.type" :options="types"  label="label" :reduce="type => type.value" :selectOnTab="true" 
                  :key="form.type"
                  :class="{ 'is-invalid': form.errors.has('type') }"
                  />
                <div
                  class="error-message"
                  v-if="form.errors.has('type')"
                  v-html="form.errors.get('type')"
                />
              </div>

            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addTax"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_TAX") }}
              </button>
              <button
                @click.prevent="editTax"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_TAX") }}
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
export default {
  name: "addEditTaxModal",
  props: ["taxData"],
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      taxes: [],
      editMode: "",
      types: [
        // {
        //   label: this.$t('message.FIXED'),
        //   value: 'fixed',
        // },
        {
          label: this.$t('message.PERCENTAGE'),
          value: 'percentage',
        },
      ],
      
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        code: "",
        rate: "",
        type: "",
      }),
    };
  },
  methods: {
    addTax() {
      if (
        this.is("Super Admin") ||
        (this.can("create_tax"))
      ) {
        this.$Progress.start();
        this.form
          .post("api/taxes")
          .then(() => {
            Fire.$emit("reloadTaxes");
            $("#addEditTaxModal").modal("hide");
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
    editTax() {
      if (
        this.is("Super Admin") ||
        (this.can("edit_tax"))
      ) {
        this.$Progress.start();
        this.form
          .put("api/taxes/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadTaxes");
            $("#addEditTaxModal").modal("hide");
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
    $("#addEditTaxModal").on("show.bs.modal", function (e) {
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
      } else {
        form.reset();
        that.editMode = false;
      }
    });
  },
};
</script>
