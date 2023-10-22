<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('stock_adjustments')">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">{{ $t("message.STOCK_ADJUSTMENTS") }}</h1>
              </div>

              <div
                class="col-6"
                v-if="
                  is('Super Admin') ||
                  can('create_stock_adjustment')"
              >
                <button class="btn btn-success float-right" @click="addStockAdjustment">
                  {{ $t("message.CREATE_STOCK_ADJUSTMENT") }}
                  <i class="fas fa-plus fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

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
                  <div class="card-body table-responsive p-0">
                    <v-data-table
                      :headers="headers"
                      :items="
                        stock_adjustments.data
                          ? stock_adjustments.data
                          : stock_adjustments
                      "
                      :server-items-length="stock_adjustments.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [10, 50, 100, 500, -1],
                      }"
                    >
                      <template v-slot:item.date="{ item }">
                        <span>{{ item.date | formatDate }}</span>
                      </template>
                      <template v-slot:item.actions="{ item }">
                        <v-icon
                          color="green"
                          title="View Stock Adjustment"
                          small
                          class="mr-2"
                          @click="viewStockAdjustment(item)"
                          v-if="
                            is('Super Admin') ||
                            can('stock_adjustments')"
                        >
                          mdi-eye
                        </v-icon>

                        <v-icon
                          color="blue"
                          title="Edit Stock Adjustment"
                          small
                          class="mr-2"
                          @click="editStockAdjustment(item)"
                          v-if="
                            is('Super Admin') ||
                            can('edit_stock_adjustment')"
                        >
                          mdi-pencil
                        </v-icon>

                        <v-icon
                          color="red"
                          title="Delete Blocked Payment!"
                          small
                          @click="deleteStockAdjustment(item.id)"
                          v-if="
                            is('Super Admin') ||
                            can('delete_stock_adjustment')"
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
        <addEditStockAdjustmentModal
          :stockAdjustmentData="stockAdjustmentInfo"
        ></addEditStockAdjustmentModal>
        <viewStockAdjustmentModal
          :viewStockAdjustmentData="stockAdjustmentInfo"
        ></viewStockAdjustmentModal>
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
import addEditStockAdjustmentModal from "./modals/addEditStockAdjustmentModal.vue";
import viewStockAdjustmentModal from "./modals/viewStockAdjustmentModal.vue";
export default {
  data() {
    return {
      form: new form(),
      stock_adjustments: [],
      stockAdjustmentInfo: {},
      curpage: 1,
      search: "",
      itemsPerPage: 10,
      loading: true,
      options: {},
      sortBy: "",
      sortDesc: "",
      headers: [
        { text: this.$t("message.REFERENCE"), value: "reference" },
        { text: this.$t("message.DATE"), value: "date" },
        { text: this.$t("message.ACTIONS"), value: "actions", sortable: false },
      ],
    };
  },
  components: {
    addEditStockAdjustmentModal,
    viewStockAdjustmentModal,
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
      if (this.is('Super Admin') || this.can("stock_adjustments")) {
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
            "api/stockAdjustments?page=" +
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
            this.stock_adjustments = response.data;
            this.$Progress.finish();
            this.loading = false;
          })
          .catch(() => {
            this.$Progress.fail();
            this.loading = false;
          });
      }
    },
    deleteStockAdjustment(id) {
      if (
        this.is('Super Admin') ||
        this.can("delete_stock_adjustment")) {
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
            if (result.value) {
              // Send request to the server
              this.$Progress.start();
              this.form
                .delete("api/stockAdjustments/" + id)
                .then(() => {
                  this.stock_adjustments.total -= 1;
                  this.$Progress.finish();
                  Fire.$emit("reloadStockAdjustments");
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
      }
    },
    addStockAdjustment() {
      if (
        this.is('Super Admin') ||
        this.can("create_stock_adjustment")) {
        $("#addEditStockAdjustmentModal").modal("show");
      }
    },
    editStockAdjustment(stock_adjustments) {
      if (
        this.is('Super Admin') ||
        this.can("edit_stock_adjustment") 
      ) {
        this.stockAdjustmentInfo = stock_adjustments;
        $("#addEditStockAdjustmentModal").modal("show", stock_adjustments);
      }
    },
    viewStockAdjustment(stock_adjustments) {
      this.stockAdjustmentInfo = stock_adjustments;
      $("#viewStockAdjustmentModal").modal("show", stock_adjustments);
    },
  },
  created() {
    this.getResults();
    Fire.$on("reloadStockAdjustments", () => {
      this.getResults(this.curpage);
    });
  },
};
</script>
