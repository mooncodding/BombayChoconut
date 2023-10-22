<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('order_payments')">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">{{ $t("message.ORDER_PAYMENTS") }}</h1>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <button class="btn btn-success float-right" @click="addOrderPayment" v-if="(is('Super Admin') || can('create_order_payment'))">
                  {{ $t("message.CREATE_ORDER_PAYMENT") }}
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
                      :items="orderPayments.data ? orderPayments.data : orderPayments"
                      :server-items-length="orderPayments.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [10, 50, 100, 500, -1],
                      }"
                    >
                    <!-- Payment Date -->
                      <template v-slot:item.payment_date="{ item }">
                        <span>{{item.payment_date |formatDate}}</span>
                      </template>
                      <!-- End -->

                      <!-- Amount -->
                      <template v-slot:item.amount="{ item }">
                        <span>{{item.amount | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,})}}
                        </span>
                      </template>
                      
                      <!-- Actions -->
                      <template v-slot:item.actions="{ item }">
                        <v-icon
                          color="green"
                          class="edit-icon mr-2"
                          small
                          @click="viewOrderPayment(item)"
                        >
                          mdi-eye
                        </v-icon>

                        <v-icon
                          color="blue"
                          class="edit-icon mr-2"
                          small
                          @click="editOrderPayment(item)"
                          v-if="(is('Super Admin') || can('edit_order_payment'))"
                        >
                          mdi-pencil
                        </v-icon>

                        <v-icon
                          color="red"
                          class="delete-icon"
                          small
                          @click="deleteOrderPayment(item.id)"
                          v-if="(is('Super Admin') || can('delete_order_payment'))"
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
        <addEditOrderPaymentModal></addEditOrderPaymentModal>
        <viewOrderPaymentModal :orderPaymentData="orderPaymentInfo"></viewOrderPaymentModal>
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
import addEditOrderPaymentModal from "./modals/addEditOrderPaymentModal.vue";
import viewOrderPaymentModal from "./modals/viewOrderPaymentModal.vue";
export default {
  data() {
    return {
      form: new form(),
      orderPayments: [],
      curpage: 1,
      search: "",
      itemsPerPage: 10,
      loading: true,
      options: {},
      sortBy: "",
      sortDesc: "",
      orderPaymentInfo: {},
      countOrderPayment: 0,
      orderPaymentsLimit: 0,
      headers: [
        { text: this.$t("message.REFERENCE"), value: "reference" },
        { text: this.$t("message.DATE"), value: "payment_date" },
        { text: this.$t("message.CUSTOMER"), value: "customer.name" },
        { text: this.$t("message.ORDER"), value: "order.order_number" },
        { text: this.$t("message.AMOUNT"), value: "amount" },
        {
          text: this.$t("message.ACTIONS"),
          value: "actions",
          sortable: false,
        },
      ],
    };
  },
  components: {
    addEditOrderPaymentModal,
    viewOrderPaymentModal
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
      if (this.is('Super Admin') || this.can('order_payments')) {
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
            "api/orderPayments?page=" +
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
            this.orderPayments = response.data;
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
    deleteOrderPayment(id) {
      if (this.is('Super Admin') || this.can('delete_order_payment')) {
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
                .delete("api/orderPayments/" + id)
                .then(() => {
                  this.orderPayments.total -= 1;
                  Fire.$emit("reloadOrderPayments");
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
    addOrderPayment() {
      if (this.is('Super Admin') || this.can('create_order_payment')) {
        $("#addEditOrderPaymentModal").modal("show");
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    editOrderPayment(orderPayment) {
      if (this.is('Super Admin') || this.can('edit_order_payment')) {
        this.orderPaymentInfo = orderPayment;
        $("#addEditOrderPaymentModal").modal("show", orderPayment);
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    viewOrderPayment(orderPayment) {
      this.orderPaymentInfo = orderPayment;
      $("#viewOrderPaymentModal").modal("show", orderPayment);
    },
  },
  created() {
    Fire.$on("reloadOrderPayments", () => {
      this.getResults(this.curpage);
    });
  },
};
</script>