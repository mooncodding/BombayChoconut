<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewStockEntryModal"
      role="dialog"
      aria-labelledby="viewStockEntry"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewStockEntryModal">
              {{ $t("message.VIEW_STOCK_ENTRY") }}:
              {{ stockEntryData.reference }}
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
          <div class="modal-body">
            <!-- Print Data -->
            <div id="printData">
              <div class="onlyForPrint">
                <printHeader></printHeader>
                <div class="printHeading">
                  {{ $t("message.VIEW_STOCK_ENTRY") }}:
                  {{ stockEntryData.reference }}
                </div>
              </div>
              <table class="table table-hover table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.REFERENCE") }}</th>
                    <td>{{ stockEntryData.reference ? stockEntryData.reference : "-" }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.DATE") }}</th>
                    <td v-if="stockEntryData.stock_entry_date">{{ stockEntryData.stock_entry_date | formatDate}}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.NOTES") }}</th>
                    <td v-if="stockEntryData.notes">{{ stockEntryData.notes }}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="stockEntryData.created_by">
                      {{ stockEntryData.created_by.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="stockEntryData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td>{{ stockEntryData.updated_by.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="stockEntryData.created_at">
                      {{ stockEntryData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td v-if="stockEntryData.updated_at">
                      {{ stockEntryData.updated_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                </tbody>
              </table>
              <h2>{{ $t("message.STOCK_ENTRY_DETAILS") }}</h2>
              <table class="table table-hover table-bordered">
              <tr>
                <th>
                  <label>{{ $t("message.PRODUCT") }}</label>
                </th>
                <th>
                  <label>{{ $t("message.QUANTITY") }}</label>
                </th>
              </tr>
              <tbody>
                <tr v-for="(data,index) in stockEntryData.stock_entry_details" :key="index">
                  <td v-if="data && data.product">
                    {{ data.product.name }}
                  </td>
                  <td v-else>-</td>
                  <td v-if="data.total_quantity">
                    {{ data.total_quantity }}
                  </td>
                  <td v-else>-</td>
                </tr>
              </tbody>
            </table>
            </div>
            <div class="modal-footer">
              <button @click.prevent="printSale" class="btn btn-primary">
                {{ $t("message.PRINT") }}
              </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                {{ $t("message.CLOSE") }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import printHeader from "../includes/printHeader.vue";
export default {
  name: "viewStockEntryModal",
  props: ["stockEntryData"],
  data() {
    return {};
  },
  components: {
    printHeader,
  },
  methods: {
    printSale() {
      this.$htmlToPaper("printData");
    },
  },
};
</script>