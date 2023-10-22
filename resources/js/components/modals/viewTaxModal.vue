<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewTaxModal"
      role="dialog"
      aria-labelledby="viewTax"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewTaxModal">
              {{ $t("message.VIEW_TAX") }}:
              {{ taxData.name }}
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
                  {{ $t("message.VIEW_TAX") }}:
                  {{ taxData.name }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>{{ $t("message.NAME") }}</th>
                        <td>{{taxData.name}}</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.TAX_CODE") }}</th>
                        <td v-if="taxData.code">{{taxData.code}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.RATE") }}</th>
                        <td v-if="taxData.rate">
                          {{ hasDecimal(taxData.rate) ? parseFloat(taxData.rate).toFixed(2) : parseFloat(taxData.rate).toFixed() }} {{ taxData.type == 'percentage' ? '%' : '' }}
                        </td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.TYPE") }}</th>
                        <td v-if="taxData.type">{{taxData.type == 'fixed' ? $t('message.FIXED') : $t('message.PERCENTAGE') }}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                      <th>{{ $t("message.CREATED_BY") }}</th>
                      <td v-if="taxData.created_by">{{taxData.created_by.name}}</td>
                      <td v-else>-</td>
                    </tr>
                    <tr v-if="taxData.updated_by">
                        <th>{{ $t("message.UPDATED_BY") }}</th>
                        <td>{{taxData.updated_by.name}}</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.CREATED_AT") }}</th>
                        <td v-if="taxData.created_at">{{taxData.created_at | formatDateTime}}</td>
                        <td v-else>-</td>
                    </tr>
                     <tr>
                        <th>{{ $t("message.UPDATED_AT") }}</th>
                        <td v-if="taxData.updated_at">{{taxData.updated_at | formatDateTime}}</td>
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
  name: "viewTaxModal",
  props: ["taxData"],
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

    hasDecimal(num)
    {
      return !!(num % 1);
    }
  },
};
</script>