<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('stock_entries')">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">{{ $t("message.STOCK_ENTRIES") }}</h1>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <button class="btn btn-success float-right" @click="addStockEntry" v-if="(is('Super Admin') || can('create_stock_entry'))">
                  {{ $t("message.CREATE_STOCK_ENTRY") }}
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
                      :items="stockEntries.data ? stockEntries.data : stockEntries"
                      :server-items-length="stockEntries.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [10, 50, 100, 500, -1],
                      }"
                    >
                    <!-- Stock Entry Date -->
                      <template v-slot:item.stock_entry_date="{ item }">
                        <span>{{item.stock_entry_date|formatDate}}</span>
                      </template>
                     <!-- Grand Total with tax -->
                      <!-- <template v-slot:item.grand_total="{ item }">
                        <span>{{item.grand_total | currency("Ar", 2, {
                                thousandsSeparator: ".",
                                decimalSeparator: ",",
                                symbolOnLeft: false,
                                spaceBetweenAmountAndSymbol: true,
                              })}}</span>
                      </template> -->
                      <!-- Tax Method -->
                      <!-- <template v-slot:item.stockEntry_status.name="{ item }">
                        <span v-if="item.stockEntry_status && item.stockEntry_status.name">
                          <span class="badge badge-primary">
                            {{
                              item.stockEntry_status.name
                            }}
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
                          @click="viewStockEntry(item)"
                        >
                          mdi-eye
                        </v-icon>

                        <v-icon
                          color="blue"
                          class="edit-icon mr-2"
                          small
                          @click="editStockEntry(item)"
                          v-if="(is('Super Admin') || can('edit_stock_entry'))"
                        >
                          mdi-pencil
                        </v-icon>

                        <v-icon
                          color="red"
                          class="delete-icon"
                          small
                          @click="deleteStockEntry(item.id)"
                          v-if="(is('Super Admin') || can('delete_stock_entry'))"
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
        <addEditStockEntryModal></addEditStockEntryModal>
        <viewStockEntryModal :stockEntryData="stockEntryInfo"></viewStockEntryModal>
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
import addEditStockEntryModal from "./modals/addEditStockEntryModal.vue";
import viewStockEntryModal from "./modals/viewStockEntryModal.vue";
export default {
  data() {
    return {
      form: new form(),
      stockEntries: [],
      curpage: 1,
      search: "",
      itemsPerPage: 10,
      loading: true,
      options: {},
      sortBy: "",
      sortDesc: "",
      stockEntryInfo: {},
      countStockEntry: 0,
      stockEntriesLimit: 0,
      headers: [
        { text: this.$t("message.REFERENCE"), value: "reference" },
        { text: this.$t("message.DATE"), value: "stock_entry_date" },
        {
          text: this.$t("message.ACTIONS"),
          value: "actions",
          sortable: false,
        },
      ],
    };
  },
  components: {
    addEditStockEntryModal,
    viewStockEntryModal
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
      if (this.is('Super Admin') || this.can('stock_entries')) {
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
            "api/stockEntries?page=" +
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
            this.stockEntries = response.data;
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
    deleteStockEntry(id) {
      if (this.is('Super Admin') || this.can('delete_stock_entry')) {
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
                .delete("api/stockEntries/" + id)
                .then(() => {
                  this.stockEntries.total -= 1;
                  Fire.$emit("reloadStockEntries");
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
    addStockEntry() {
      if (this.is('Super Admin') || this.can('create_stock_entry')) {
        $("#addEditStockEntryModal").modal("show");
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    editStockEntry(stockEntry) {
      if (this.is('Super Admin') || this.can('edit_stock_entry')) {
        this.stockEntryInfo = stockEntry;
        $("#addEditStockEntryModal").modal("show", stockEntry);
      }else{
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED")
        });
      }
    },
    viewStockEntry(stockEntry) {
      this.stockEntryInfo = stockEntry;
      $("#viewStockEntryModal").modal("show", stockEntry);
    },
  },
  created() {
    Fire.$on("reloadStockEntries", () => {
      this.getResults(this.curpage);
    });
  },
};
</script>