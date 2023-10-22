<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('expenses')">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">{{ $t("message.EXPENSES") }}</h1>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <button class="btn btn-success float-right" @click="addExpense" v-if="(is('Super Admin') || (can('create_expense')))">
                  {{ $t("message.CREATE_EXPENSE") }}
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
                      :items="expenses.data ? expenses.data : expenses"
                      :server-items-length="expenses.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [50, 100, 500, -1],
                      }"
                    >

                     <template v-slot:item.date="{ item }">
                        <span>{{ item.date | formatDate }}</span>
                      </template>


                      <template v-slot:item.amount="{ item }">
                        <span>{{
                          item.amount
                            | currency("Ar", 2, {
                                thousandsSeparator: ".",
                                decimalSeparator: ",",
                                symbolOnLeft: false,
                                spaceBetweenAmountAndSymbol: true,
                              })
                        }}</span>
                      </template>

                      <template v-slot:item.actions="{ item }">
                        <v-icon
                          color="green"
                          class="edit-icon mr-2"
                          small
                          @click="viewExpense(item)"
                        >
                          mdi-eye
                        </v-icon>

                        <v-icon
                          color="blue"
                          class="edit-icon mr-2"
                          small
                          @click="editExpense(item)"
                          v-if="(is('Super Admin') || (can('edit_expense')))"
                        >
                          mdi-pencil
                        </v-icon>

                        <v-icon
                          color="red"
                          class="delete-icon"
                          small
                          @click="deleteExpense(item.id)"
                          v-if="(is('Super Admin') || (can('delete_expense')))"
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
        <addEditExpenseModal></addEditExpenseModal>
        <viewExpenseModal :expenseData="expenseInfo"></viewExpenseModal>
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
import addEditExpenseModal from "./modals/addEditExpenseModal.vue";
import viewExpenseModal from "./modals/viewExpenseModal.vue";
export default {
  data() {
    return {
      form: new form(),
      expenses: [],
      curpage: 1,
      search: "",
      itemsPerPage: 50,
      loading: true,
      options: {},
      sortBy: "",
      sortDesc: "",
      expenseInfo: {},
      headers: [
        { text: this.$t("message.NAME"), value: "name" },
        { text: this.$t("message.PAYMENT_METHOD"), value: "payment_method.name" },
        { text: this.$t("message.DATE"), value: "date" },
        { text: this.$t("message.AMOUNT"), value: "amount" },
        { text: this.$t("message.CREATED_BY"), value: "created_by.name" },
        {
          text: this.$t("message.ACTIONS"),
          value: "actions",
          sortable: false,
        },
      ],
    };
  },
  components: {
    addEditExpenseModal,
    viewExpenseModal
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
    getResults(page = 1, rows = 50, sortBy = null, sortDesc = null) {
      if (this.is('Super Admin') || (this.can('expenses'))) {
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
            "api/expenses?page=" +
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
            this.expenses = response.data;
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
    deleteExpense(id) {
      if (this.is('Super Admin') || (this.can('delete_expense'))) {
        swal
          .fire({
            title: this.$t("message.CONFIRM"),
            text: this.$t("message.DELETE_MESSAGE_REVERT"),
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: this.$t('message.CANCEL'),
            confirmButtonText: this.$t("message.DELETE_BUTTON_TEXT"),
          })
          .then((result) => {
            this.$Progress.start();
            if (result.value) {
              // Send request to the server
              this.form
                .delete("api/expenses/" + id)
                .then(() => {
                  this.expenses.total -= 1;
                  Fire.$emit("reloadExpenses");
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
    addExpense() {
      if (this.is('Super Admin') || (this.can('create_expense'))) {
        $("#addEditExpenseModal").modal("show");
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    editExpense(expense) {
      if (this.is('Super Admin') || (this.can('edit_expense'))) {
        this.expenseInfo = expense;
        $("#addEditExpenseModal").modal("show", expense);
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    viewExpense(expense) {
      this.expenseInfo = expense;
      $("#viewExpenseModal").modal("show", expense);
    },
  },
  created() {
    Fire.$on("reloadExpenses", () => {
      this.getResults(this.curpage);
    });
  },
};
</script>