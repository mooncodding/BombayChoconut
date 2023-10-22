<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewStockAdjustmentReportModal"
      role="dialog"
      aria-labelledby="viewStockAdjustmentReportModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modalLarge" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewStockAdjustmentReportModalLabel">
              {{ $t("message.VIEW_STOCK_ADJUSTMENT_REPORT") }} |
              {{ viewStockAdjustmentReportData | formatDate }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="stockAdjustmentReport">
              <div class="onlyForPrint">
                <printHeader></printHeader>
                <div class="printHeading">
                  <h3>{{ $t("message.VIEW_STOCK_ADJUSTMENT_REPORT") }} |
                  {{ viewStockAdjustmentReportData | formatDate }}</h3>
                </div>
              </div>
              <table class="table table-hover table-bordered dark-border">
                <tr>
                  <th>{{ $t("message.REFERENCE") }}</th>
                  <th>{{ $t("message.PRODUCT") }}</th>
                  <th>{{ $t("message.QUANTITY") }}</th>
                  <th>{{ $t("message.TYPE") }}</th>
                  <th>{{ $t("message.USER") }}</th>
                </tr>
                <tbody>
                  <tr v-for="(stockDetail, index) in stockDetails" :key="index">
                    <td v-if="stockDetail.reference">
                      {{ stockDetail.reference }}
                    </td>
                    <td v-else></td>
                    <td v-if="stockDetail.productName">
                      {{ stockDetail.productName }}
                    </td>
                    <td v-else></td>

                    <td>
                      {{ stockDetail.product_quantity + " " + stockDetail.symbol }}
                    </td>
                    <td>
                      <div>
                        {{
                          stockDetail.type == 1
                            ? $t("message.ADDITION")
                            : $t("message.SUBTRACTION")
                        }}
                      </div>
                    </td>
                    <td v-if="stockDetail.name">
                      {{ stockDetail.name }}
                    </td>
                    <td v-else></td>
                  </tr>
                  <tr>
                    <th colspan="2"><b>{{$t("message.TOTAL")}}</b></th>
                    <th>{{ stock_adjustment_total }}</th>
                    <th colspan="4"></th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button @click.prevent="printStockAdjustment" class="btn btn-primary">
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
  name: "viewStockAdjustmentReportModal",
  props: ["viewStockAdjustmentReportData"],
  data() {
    return {
      currentDateLanguage: dateLanguage,
      stockAdjustmentReportDatas: {},
      stockDetails: {},
    };
  },
  computed: {
    stock_adjustment_total() {
      if (this.stockDetails) {
        if (this.stockDetails.length > 0) {
          return this.stockDetails.reduce((sum, i) => {
            return sum + +i.product_quantity;
          }, 0);
        }
      }
    },
  },
  components: {
    printHeader,
  },
  methods: {
    printStockAdjustment() {
      this.$htmlToPaper("stockAdjustmentReport");
    },
  },
  mounted() {
    var that = this;
    $("#viewStockAdjustmentReportModal").on("show.bs.modal", function (e) {
      Vue.nextTick().then(function () {
        axios
          .get("api/stockAdjustmentDetail?date=" + 
          that.viewStockAdjustmentReportData)
          .then((response) => {
            that.stockDetails = response.data;
          });
      });
    });
  },
};
</script>
