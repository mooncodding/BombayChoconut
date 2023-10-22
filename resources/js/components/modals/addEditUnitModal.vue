<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditUnitModal"
      unit="dialog"
      aria-labelledby="addEditUnitModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditUnitModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_UNIT") }}
            </h5>
            <h5 class="modal-title" id="addEditUnitModalLabel" v-else>
              {{ $t("message.EDIT_UNIT") }}
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
          <form @submit.prevent="editMode ? editUnit() : addUnit()">
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

              <!-- Symbol -->
              <div class="form-group">
                <label
                  >{{ $t("message.SYMBOL")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.symbol"
                  v-bind:placeholder="$t('message.SYMBOL')"
                  type="text"
                  name="symbol"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('symbol') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('symbol')"
                  v-html="form.errors.get('symbol')"
                />
              </div>

            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addUnit"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_UNIT") }}
              </button>
              <button
                @click.prevent="editUnit"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_UNIT") }}
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
  name: "addEditUnitModal",
  props: ["unitdata"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      units: [],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        symbol: "",
      }),
    };
  },
  methods: {
    addUnit() {
      if (this.is("Super Admin") || (this.can("create_unit"))) {
        this.$Progress.start();
        this.form
          .post("api/units")
          .then(() => {
            Fire.$emit("reloadUnits");
            $("#addEditUnitModal").modal("hide");
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
    editUnit() {
      if (this.is("Super Admin") || (this.can("edit_unit"))) {
        this.$Progress.start();
        this.form
          .put("api/units/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadUnits");
            $("#addEditUnitModal").modal("hide");
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
    $("#addEditUnitModal").on("show.bs.modal", function (e) {
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