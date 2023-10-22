<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditGeneralPushNotificationModal"
      role="dialog"
      aria-labelledby="addEditGeneralPushNotificationModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered modalLarge" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditGeneralPushNotificationModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_GENERAL_PUSH_NOTIFICATION") }}
            </h5>
            <h5 class="modal-title" id="addEditGeneralPushNotificationModalLabel" v-else>
              {{ $t("message.EDIT_GENERAL_PUSH_NOTIFICATION") }}
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
          <form @submit.prevent="editMode ? editGeneralPushNotification() : addGeneralPushNotification()">
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">
                <!-- Title -->
                <div class="form-group">
                  <label
                    >{{ $t("message.TITLE")
                    }}<span class="required-star">*</span></label
                  >
                  <input
                    v-model="form.title"
                    v-bind:placeholder="$t('message.TITLE')"
                    type="text"
                    name="title"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('title') }"
                  />
                  <div
                    class="error-message"
                    v-if="form.errors.has('title')"
                    v-html="form.errors.get('title')"
                  />
                </div>
                <!-- End -->
                <!--Content-->
                <div class="form-group" >
                  <label
                      >{{ $t("message.CONTENT")
                      }}<span class="required-star">*</span></label
                    >
                    <textarea  v-model="form.content"  v-bind:placeholder="$t('message.CONTENT')" class="form-control"  :class="{ 'is-invalid': form.errors.has('content') }" name="content" id="" rows="3"></textarea>
                    <span class="error-message"></span>
                    <div
                      class="error-message"
                      v-if="form.errors.has('content')"
                      v-html="form.errors.get('content')"/>
                </div>
                <!-- End -->
                <!-- Is Schedule -->
                <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                      <label>{{$t('message.IS_SCHEDULE')}}</label>
                      <input type="checkbox" true-value="1" false-value="0" v-model="form.is_schedule" name="is_schedule" class="form-control" />
                    </div>
                 </div>
                </div>
                 <!-- End -->
                <!-- Date Time -->
                <div class="form-group" v-if="form.is_schedule == 1">
                  <label>{{$t('message.DATE_TIME')}}<span>*</span></label>
                    <datetime
                    v-model="form.date_time"
                    v-bind:placeholder="$t('message.DATE_TIME')"
                    type="datetime"
                    name="date_time"
                    :input-class="{ 'is-invalid form-control bgwhite': form.errors.has('date_time'),
                    'form-control bgwhite': !form.errors.has('date_time') }">
                    </datetime>
                    <div
                      class="error-message"
                      v-if="form.errors.has('date_time')"
                      v-html="form.errors.get('date_time')"/>
                </div>
              </div>
              <div class="modal-footer">
                <button
                  @click.prevent="addGeneralPushNotification"
                  v-if="editMode === false"
                  type="submit"
                  :disabled="disableSubmitButton"
                  class="btn btn-primary"
                >
                  {{  $t(loading ? "Please wait..." :"message.CREATE_GENERAL_PUSH_NOTIFICATION") }}
                </button>
                <button
                  @click.prevent="editGeneralPushNotification"
                  :disabled="disableSubmitButton"
                  v-if="editMode === true"
                  type="submit"
                  class="btn btn-primary"
                >
                  {{ $t(loading ? "Please wait..." :"message.EDIT_GENERAL_PUSH_NOTIFICATION") }}
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                  {{ $t("message.CLOSE") }}
                </button>
                  
              </div>
          </form>
        </div>
      </div>
    </div>
  <div>
  </div>     
  </div>
</template>
</script>
<script>
import Vue from 'vue';
import moment, { isDate } from 'moment';
export default {
  name: "addEditGeneralPushNotificationModal",
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      currentDateLanguage: dateLanguage,
      editMode: "",
      loading: false,
      disableSubmitButton:false,
      fileError: 0,
      // Create a new form instance
      form: new form({
        id: "",
        title:"",
        is_schedule:0,
        date_time: "",
        content:"",
      }), 
    };
  },
  methods: {
    addGeneralPushNotification() {
      this.loading = true;
      this.disableSubmitButton=true;
      if (this.is("Super Admin") || this.can("create_general_push_notification")) {
        if (!this.fileError) {
          this.$Progress.start();
          if (this.form.date_time != "") {
          this.form.date_time = moment.utc(this.form.date_time).local().format();  
          }
          this.form
            .post("api/generalPushNotifications")
            .then(() => {
              this.loading=false;
              this.disableSubmitButton=false,
              Fire.$emit("reloadGeneralPushNotifications");
              $("#addEditGeneralPushNotificationModal").modal("hide");
              toast.fire({
                icon: "success",
                title: this.$t("message.CREATED_MESSAGE_SUCCESS"),
              });
              this.$Progress.finish();
            })
            .catch(() => {
              this.loading=false;
              this.disableSubmitButton=false,
              this.$Progress.fail();
              toast.fire({
                icon: "warning",
                title: this.$t("message.CREATED_MESSAGE_ERROR"),
              });
            });
        } else {
          this.$Progress.fail();
          toast.fire({
            icon: "warning",
            title: this.$t("message.FLIE_SIZE_ERROR"),
          });
        }
      } else {
        swal.fire({
          text: this.$t("message.UNAUTHORIZED"),
          icon: "warning",
        });
      }
    },
    editGeneralPushNotification() {
          this.loading = true;
          this.disableSubmitButton=true;
        if (this.is("Super Admin") || this.can("edit_general_push_notification")) {
        if (!this.fileError) {
          this.$Progress.start();
          if (this.form.date_time != "") {
          this.form.date_time = moment.utc(this.form.date_time).local().format();  
          }
          this.form
            .put("api/generalPushNotifications/" + this.form.id)
            .then(() => {
              this.loading=false;
              this.disableSubmitButton=false,
              Fire.$emit("reloadGeneralPushNotifications");
              $("#addEditGeneralPushNotificationModal").modal("hide");
              toast.fire({
                icon: "success",
                title: this.$t("message.EDIT_MESSAGE_SUCCESS"),
              });
              this.$Progress.finish();
            })
            .catch(() => {
              this.loading=false;
              this.disableSubmitButton=false,
              this.$Progress.fail();
              toast.fire({
                icon: "warning",
                title: this.$t("message.EDIT_MESSAGE_ERROR"),
              });
            });
        } else {
          this.$Progress.fail();
          toast.fire({
            icon: "warning",
            title: this.$t("message.FLIE_SIZE_ERROR"),
          });
        }
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
    $("#addEditGeneralPushNotificationModal").on("show.bs.modal", function (e) {
      Vue.nextTick().then(function () {
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
        const date_time = new Date(e.relatedTarget.date_time);
        form.date_time = date_time.toISOString();
        form.boost_days = e.relatedTarget.boost_days;
      } else {
        form.reset();
        that.editMode = false;
      }
    });
  },
  )},
};
</script>