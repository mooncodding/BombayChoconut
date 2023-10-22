<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('orders')">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">{{ $t("message.ORDERS") }}</h1>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <button class="btn btn-success float-right" @click="addOrder" v-if="(is('Super Admin') || can('create_order'))">
                  {{ $t("message.CREATE_ORDER") }}
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
                          label="Search"
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
                      :items="orders.data ? orders.data : orders"
                      :server-items-length="orders.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [10, 50, 100, 500, -1],
                      }"
                    >
                    <!-- Payment Status -->
                    <template v-slot:item.payment_status="{ item }">
                      <h6>
                        <span
                          v-if="item.payment_status == 'paid'"
                          class="badge badge-success"
                          >{{ $t("message.PAID") }}</span
                        >
                        <span
                          v-else-if="item.payment_status == 'unpaid'"
                          class="badge badge-danger"
                          >{{ $t("message.UNPAID") }}</span
                        >
                        <span v-else class="badge badge-warning">{{
                          $t("message.PARTIAL_PAYMENT")
                        }}</span>
                      </h6>
                    </template>
                     <!-- Grand Total with tax -->
                      <template v-slot:item.grand_total="{ item }">
                        <span>{{item.grand_total | currency("Ar", 2, {
                                thousandsSeparator: ".",
                                decimalSeparator: ",",
                                symbolOnLeft: false,
                                spaceBetweenAmountAndSymbol: true,
                              })}}</span>
                      </template>
                      <!-- Order Date -->
                      <template v-slot:item.order_date="{ item }">
                        <span>{{item.order_date|formatDate}}</span>
                      </template>
                      <!-- Tax Method -->
                      <template v-slot:item.order_status.name="{ item }">
                        <span v-if="item.order_status && item.order_status.name">
                          <span class="badge badge-primary" v-if="item.order_status.id == 1">
                            {{item.order_status.name}}
                          </span>
                          <span class="badge badge-warning" v-else-if="item.order_status.id == 2">
                            {{item.order_status.name}}
                          </span>
                          <span class="badge badge-info" v-else-if="item.order_status.id == 3">
                            {{item.order_status.name}}
                          </span>
                          <span class="badge badge-success" v-else-if="item.order_status.id == 4">
                            {{item.order_status.name}}
                          </span>
                          <span class="badge badge-danger" v-else-if="item.order_status.id == 5">
                            {{item.order_status.name}}
                          </span>
                          <span class="badge badge-secondary" v-else>
                            {{item.order_status.name}}
                          </span>
                        </span>
                        <span v-else>-</span>
                      </template>
                      <!-- Actions -->
                      <template v-slot:item.actions="{ item }">
                        <v-icon
                          color="green"
                          class="edit-icon mr-2"
                          small
                          @click="viewOrder(item)"
                        >
                          mdi-eye
                        </v-icon>

                        <v-icon
                          color="blue"
                          class="edit-icon mr-2"
                          small
                          @click="editOrder(item)"
                          v-if="(is('Super Admin') || can('edit_order')) && item.order_status_id != 4"
                        >
                          mdi-pencil
                        </v-icon>

                        <v-icon
                          color="red"
                          class="delete-icon mr-2"
                          small
                          @click="deleteOrder(item.id)"
                          v-if="(is('Super Admin') || can('delete_order'))"
                        >
                          mdi-delete
                        </v-icon>

                        <v-icon
                          color="orange"
                          class="edit-icon"
                          small
                          @click="viewOrderStatusHistory(item)"
                        >
                          mdi-history
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
        <viewOrderStatusHistoryModal
          :orderStatusHistoryData="orderStatusHistoryInfo"
        ></viewOrderStatusHistoryModal>
        <addEditOrderModal></addEditOrderModal>
        <viewOrderModal :orderData="orderInfo"></viewOrderModal>
      </div>
      <div class="unathorized-text" v-else>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 unauthorized">
              <v-alert
                color="red lighten-2"
                dark
              >
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
import viewOrderStatusHistoryModal from "./modals/viewOrderStatusHistoryModal.vue";
import addEditOrderModal from "./modals/addEditOrderModal.vue";
import viewOrderModal from "./modals/viewOrderModal.vue";
export default {
  data() {
    return {
      form: new form(),
      orders: [],
      curpage: 1,
      search: "",
      itemsPerPage: 10,
      loading: true,
      options: {},
      sortBy: "",
      sortDesc: "",
      orderInfo: {},
      countOrder: 0,
      ordersLimit: 0,
      orderStatusHistoryInfo: {},
      headers: [
        { text: this.$t("message.DATE"), value: "order_date" },
        { text: this.$t("message.ORDER_NUMBER"), value: "order_number" },
        { text: this.$t("message.CUSTOMER"), value: "customer.name" },
        { text: this.$t("message.GRAND_TOTAL"), value: "grand_total" },
        { text: this.$t("message.ORDER_STATUS"), value: "order_status.name" },
        { text: this.$t("message.PAYMENT_STATUS"), value: "payment_status" },
        {
          text: this.$t("message.ACTIONS"),
          value: "actions",
          sortable: false,
        },
      ],
    };
  },
  components: {
    addEditOrderModal,
    viewOrderStatusHistoryModal,
    viewOrderModal
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
      if (this.is('Super Admin') || this.can('orders')) {
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
            "api/orders?page=" +
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
            this.orders = response.data;
            this.$Progress.finish();
            this.loading = false;
          })
          .catch(() => {
            this.$Progress.fail();
            this.loading = false;
            toast.fire({
              icon: "error",
              title: this.$t("message.SOMETHING_WENT_WRONG")
            });
          });
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
        this.$Progress.fail();
        this.loading = false;
      }
    },
    deleteOrder(id) {
      if (this.is('Super Admin') || this.can('delete_order')) {
        swal
          .fire({
            title: this.$t("message.CONFIRM"),
            text: this.$t("message.DELETE_MESSAGE_REVERT"),
            type: "warning",
            showCancelButton: true,
          cancelButtonText: this.$t('message.CANCEL'),
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: this.$t("message.DELETE_BUTTON_TEXT"),
          })
          .then((result) => {
            this.$Progress.start();
            if (result.value) {
              // Send request to the server
              this.form
                .delete("api/orders/" + id)
                .then(() => {
                  this.orders.total -= 1;
                  Fire.$emit("reloadOrders");
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
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    addOrder() {
      if (this.is('Super Admin') || this.can('create_order')) {
        $("#addEditOrderModal").modal("show");
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    editOrder(order) {
      if (this.is('Super Admin') || this.can('edit_order')) {
        this.orderInfo = order;
        $("#addEditOrderModal").modal("show", order);
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    viewOrder(order) {
      this.orderInfo = order;
      $("#viewOrderModal").modal("show", order);
    },
    //View Order Status History
    viewOrderStatusHistory(orderStatusHistory) {
      this.orderStatusHistoryInfo = orderStatusHistory;
      $("#viewOrderStatusHistoryModal").modal("show", orderStatusHistory);
    },
  },
  created() {
    Fire.$on("reloadOrders", () => {
      this.getResults(this.curpage);
    });
  },
};
</script>