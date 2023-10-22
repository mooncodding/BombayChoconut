<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('campaigns')">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h1 class="m-0 text-dark">{{ $t("message.CAMPAIGNS") }}</h1>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <button
                  class="btn btn-success float-right"
                  @click="addCampaign"
                  v-if="is('Super Admin') || can('create_campaign')"
                >
                  {{ $t("message.CREATE_CAMPAIGN") }}
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
                      :items="campaigns.data ? campaigns.data : campaigns"
                      :server-items-length="campaigns.total"
                      class="elevation-1"
                      :loading="loading"
                      :options.sync="options"
                      :search="search"
                      :footer-props="{
                        showFirstLastPage: true,
                        'items-per-page-options': [10, 50, 100, 500, -1],
                      }"
                    >
                      <template v-slot:item.start_datetime="{ item }">
                        {{ item.start_datetime | formatDateTime }}
                      </template>

                      <template v-slot:item.end_datetime="{ item }">
                        {{ item.end_datetime | formatDateTime }}
                      </template>

                      <template v-slot:item.applicable_on="{ item }">
                        {{
                          item.applicable_on == "products"
                            ? $t("message.PRODUCTS")
                            : item.applicable_on == "categories"
                            ? $t("message.CATEGORIES")
                            : item.applicable_on == "storewide"
                            ? $t("message.STOREWIDE")
                            : "-"
                        }}
                      </template>

                      <template v-slot:item.actions="{ item }">
                        <v-icon
                          color="green"
                          class="edit-icon mr-2"
                          small
                          @click="viewCampaign(item)"
                        >
                          mdi-eye
                        </v-icon>

                        <v-icon
                          color="blue"
                          class="edit-icon mr-2"
                          small
                          @click="editCampaign(item)"
                          v-if="is('Super Admin') || can('edit_campaign')"
                        >
                          mdi-pencil
                        </v-icon>

                        <v-icon
                          color="red"
                          class="delete-icon mr-2"
                          small
                          @click="deleteCampaign(item.id)"
                          v-if="is('Super Admin') || can('delete_campaign')"
                        >
                          mdi-delete
                        </v-icon>

                        <v-icon
                          color="teal darken-2"
                          class="delete-icon"
                          small
                          @click="handleDiscounts(item)"
                          v-if="(is('Super Admin') || can('create_campaign') || can('edit_campaign')) && item.applicable_on == 'categories'"
                        >
                          fa-solid fa-tags
                        </v-icon>

                        <v-icon
                          color="orange"
                          class="delete-icon"
                          small
                          @click="handleProductDiscount(item)"
                          v-if="(is('Super Admin') || can('create_campaign') || can('edit_campaign')) && item.applicable_on == 'products'"
                        >
                          fa-solid fa-tags
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
        <addEditCampaignModal></addEditCampaignModal>
        <addEditCategoryDiscountModal :campaignData="campaignInfo"></addEditCategoryDiscountModal>
        <addEditProductDiscountModal :campaignData="campaignInfo"></addEditProductDiscountModal>
        <viewCampaignModal :campaignData="campaignInfo"></viewCampaignModal>
      </div>
      <div class="unauthorized-text" v-else>
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
import addEditCampaignModal from "./modals/addEditCampaignModal.vue";
import viewCampaignModal from "./modals/viewCampaignModal.vue";
import addEditCategoryDiscountModal from "./modals/addEditCategoryDiscountModal.vue";
import addEditProductDiscountModal from "./modals/addEditProductDiscountModal.vue";
export default {
  data() {
    return {
      form: new form(),
      campaigns: [],
      curpage: 1,
      search: "",
      itemsPerPage: 10,
      loading: true,
      options: {},
      sortBy: "",
      sortDesc: "",
      campaignInfo: {},
      headers: [
        { text: this.$t("message.NAME"), value: "name" },
        { text: this.$t("message.START_DATETIME"), value: "start_datetime" },
        { text: this.$t("message.END_DATETIME"), value: "end_datetime" },
        { text: this.$t("message.APPLICABLE_ON"), value: "applicable_on" },
        {
          text: this.$t("message.ACTIONS"),
          value: "actions",
          sortable: false,
        },
      ],
    };
  },
  components: {
    addEditCampaignModal,
    viewCampaignModal,
    addEditCategoryDiscountModal,
    addEditProductDiscountModal,
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
      if (this.is("Super Admin") || this.can("campaigns")) {
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
            "api/campaigns?page=" +
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
            this.campaigns = response.data;
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
    deleteCampaign(id) {
      if (this.is("Super Admin") || this.can("delete_campaign")) {
        swal
          .fire({
            title: this.$t("message.CONFIRM"),
            text: this.$t("message.DELETE_MESSAGE_REVERT"),
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: this.$t("message.DELETE_BUTTON_TEXT"),
          })
          .then((result) => {
            this.$Progress.start();
            if (result.value) {
              // Send request to the server
              this.form
                .delete("api/campaigns/" + id)
                .then(() => {
                  this.campaigns.total -= 1;
                  Fire.$emit("reloadCampaigns");
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
    addCampaign() {
      if (this.is("Super Admin") || this.can("create_campaign")) {
        $("#addEditCampaignModal").modal("show");
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
      }
    },
    editCampaign(campaign) {
      if (this.is("Super Admin") || this.can("edit_campaign")) {
        this.campaignInfo = campaign;
        $("#addEditCampaignModal").modal("show", campaign);
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
      }
    },
    viewCampaign(campaign) {
      this.campaignInfo = campaign;
      $("#viewCampaignModal").modal("show", campaign);
    },

    handleDiscounts(campaign) {
      if (
        this.is("Super Admin") ||
        this.can("create_campaign") ||
        this.can("edit_campaign")
      ) {
        this.campaignInfo = campaign;
          if (campaign.applicable_on == "categories") {
          $("#addEditCategoryDiscountModal").modal("show", campaign);
        }
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
      }
    },

    handleProductDiscount(campaign) {
      if (
        this.is("Super Admin") ||
        this.can("create_campaign") ||
        this.can("edit_campaign")
      ) {
        this.campaignInfo = campaign;
          if (campaign.applicable_on == "products") {
          $("#addEditProductDiscountModal").modal("show", campaign);
        }
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
      }
    },
  },
  created() {
    Fire.$on("reloadCampaigns", () => {
      this.getResults(this.curpage);
    });
  },
};
</script>
