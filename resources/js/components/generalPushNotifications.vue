<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('general_push_notifications')">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">
                  {{ $t("message.GENERAL_PUSH_NOTIFICATIONS") }}
                </h1>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <button
                  class="btn btn-success float-right"
                  @click="addGeneralPushNotification"
                  v-if="
                    is('Super Admin') || can('create_general_push_notification')
                  "
                >
                  {{ $t("message.CREATE_GENERAL_PUSH_NOTIFICATION") }}
                  <i class="fas fa-plus fa-fw"></i>
                </button>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-tools">
                      <form @submit.prevent>
                        <v-text-field
                          class="m-0 p-0"
                          v-model="search"
                          append-icon="mdi-magnify"
                          label="Rechercher"
                          single-line
                          hide-details
                        ></v-text-field>
                      </form>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <v-data-table
                      :headers="headers"
                      :items="
                        generalPushNotifications.data
                          ? generalPushNotifications.data
                          : generalPushNotifications
                      "
                      :server-items-length="generalPushNotifications.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [10, 50, 100, 500, -1],
                      }"
                    >
                      <!--Created at Format Status-->
                      <template #item.created_at="{ item }">
                        <span>{{ item.created_at | formatDateTime }}</span>
                      </template>
                      <!--End-->
                      <!--Is Created By-->
                      <template #item.created_by="{ item }">
                        <span v-if="item.created_by">
                          {{ item.created_by.name }}
                        </span>
                      </template>
                      <!--End-->
                      <!--Is Schedule Condition-->
                      <template #item.is_schedule="{ item }">
                        <span v-if="item.is_schedule == 1">Yes</span>
                        <span v-else>No</span>
                      </template>
                      <!--End-->
                      <template v-slot:item.actions="{ item }">
                        <v-icon
                          color="green"
                          class="edit-icon mr-2"
                          small
                          @click="viewGeneralPushNotification(item)"
                        >
                          mdi-eye
                        </v-icon>

                        <v-icon
                          color="blue"
                          class="edit-icon mr-2"
                          small
                          @click="editGeneralPushNotification(item)"
                          v-if="
                            (is('Super Admin') ||
                              can('edit_general_push_notification')) &&
                              item.flag == 0
                          "
                        >
                          mdi-pencil
                        </v-icon>

                        <v-icon
                          color="red"
                          class="delete-icon"
                          small
                          @click="deleteGeneralPushNotification(item.id)"
                          v-if="
                            is('Super Admin') ||
                              can('delete_general_push_notification')
                          "
                        >
                          mdi-delete
                        </v-icon>
                      </template>
                    </v-data-table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.content -->
        <addEditGeneralPushNotificationModal></addEditGeneralPushNotificationModal>
        <viewGeneralPushNotificationModal
          :generalPushNotificationData="generalPushNotificationInfo"
        ></viewGeneralPushNotificationModal>
      </div>
      <div class="unathorized-text" v-else>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 unauthorized">
              <v-alert color="red lighten-2" dark>
                {{ $t("message.UNAUTHORIZED") }}
              </v-alert>
            </div>
          </div>
        </div>
      </div>
    </div>
  </v-app>
</template>

<script>
import addEditGeneralPushNotificationModal from "./modals/addEditGeneralPushNotificationModal.vue";
import viewGeneralPushNotificationModal from "./modals/viewGeneralPushNotificationModal.vue";
import moment from "moment";
export default {
  data() {
    return {
      dateTime: new Date().toISOString(),
      form: new form(),
      generalPushNotifications: [],
      curpage: 1,
      search: "",
      itemsPerPage: 10,
      loading: true,
      options: {},
      sortBy: "",
      sortDesc: "",
      generalPushNotificationInfo: {},
      headers: [
        { text: this.$t("message.TITLE"), value: "title" },
        { text: this.$t("message.IS_SCHEDULE"), value: "is_schedule" },
        { text: this.$t("message.CREATED_AT"), value: "created_at" },
        { text: this.$t("message.CREATED_BY"), value: "created_by" },
        {
          text: this.$t("message.ACTIONS"),
          value: "actions",
          sortable: false,
        },
      ],
    };
  },
  components: {
    addEditGeneralPushNotificationModal,
    viewGeneralPushNotificationModal,
  },
  watch: {
    //DataTable watcher!
    options: {
      handler() {
        this.getResults(
          this.options.page ? this.options.page : null,
          this.options.itemsPerPage ? this.options.itemsPerPage : null
        );
      },
      deep: true,
    },
    search() {
      this.getResults();
    },
  },
  methods: {
    getResults(page = 1, rows = 10, sortBy = null, sortDesc = null) {
      if (this.is("Super Admin") || this.can("general_push_notifications")) {
        this.$Progress.start();
        this.loading = true;
        this.curpage = page;
        if (this.options.sortBy && this.options.sortBy.length > 0) {
          this.sortBy = this.options.sortBy[0];
        } else {
          this.sortBy = "";
        }
        if (this.options.sortDesc && this.options.sortDesc.length > 0) {
          this.sortDesc = this.options.sortDesc[0];
        } else {
          this.sortDesc = "";
        }
        axios
          .get(
            "api/generalPushNotifications?page=" +
              page +
              "&search=" +
              this.search +
              "&numRows=" +
              rows +
              "&sortBy=" +
              this.sortBy +
              "&sortDesc=" +
              this.sortDesc
          )
          .then((response) => {
            this.generalPushNotifications = response.data;
            this.$Progress.finish();
            this.loading = false;
          })
          .catch(() => {
            this.$Progress.fail();
            this.loading = false;
            toast.fire({
              icon: "error",
              title: this.$t("message.SOMETHING_WENT_WRONG"),
            });
          });
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
        this.$Progress.fail();
        this.loading = false;
      }
    },
    deleteGeneralPushNotification(id) {
      if (
        this.is("Super Admin") ||
        this.can("delete_general_push_notification")
      ) {
        swal
          .fire({
            title: this.$t("message.CONFIRM"),
            text: this.$t("message.DELETE_MESSAGE_REVERT"),
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
cancelButtonText: this.$t("message.CANCEL"),
            confirmButtonText: this.$t("message.DELETE_BUTTON_TEXT"),
          })
          .then((result) => {
            this.$Progress.start();
            if (result.value) {
              // Send request to the server
              this.form
                .delete("api/generalPushNotifications/" + id)
                .then(() => {
                  this.generalPushNotifications.total -= 1;
                  Fire.$emit("reloadGeneralPushNotifications");
                  this.$Progress.finish();
                  swal.fire(
                    this.$t("message.DELETED"),
                    this.$t("message.DELETE_MESSAGE_SUCCESS"),
                    "success"
                  );
                })
                .catch(() => {
                  this.$Progress.fail();
                  swal.fire(
                    this.$t("message.FAILED"),
                    this.$t("message.DELETE_MESSAGE_ERROR"),
                    "warning"
                  );
                });
            }
          });
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
      }
    },
    addGeneralPushNotification() {
      if (
        this.is("Super Admin") ||
        this.can("create_general_push_notification")
      ) {
        $("#addEditGeneralPushNotificationModal").modal("show");
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
      }
    },
    editGeneralPushNotification(generalPushNotification) {
      if (
        this.is("Super Admin") ||
        this.can("edit_general_push_notification")
      ) {
        this.generalPushNotificationInfo = generalPushNotification;
        $("#addEditGeneralPushNotificationModal").modal(
          "show",
          generalPushNotification
        );
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
      }
    },
    viewGeneralPushNotification(generalPushNotification) {
      this.generalPushNotificationInfo = generalPushNotification;
      $("#viewGeneralPushNotificationModal").modal(
        "show",
        generalPushNotification
      );
    },
  },
  created() {
    Fire.$on("reloadGeneralPushNotifications", () => {
      this.getResults(this.curpage);
    });
  },
};
</script>
