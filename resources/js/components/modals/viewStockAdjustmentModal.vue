<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewStockAdjustmentModal"
      role="dialog"
      aria-labelledby="viewStockAdjustmentModalLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewStockAdjustmentModalLabel">
              {{ $t("message.VIEW_STOCK_ADJUSTMENT") }}:
              {{ viewStockAdjustmentData.reference }}
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
            <div id="printMe">
              <div class="onlyForPrint">
                <printHeader></printHeader>
                <h2 class="printHeading">
                  {{ $t("message.STOCK_ADJUSTMENT") }}:
              {{ viewStockAdjustmentData.reference }}
                </h2>
              </div>

              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.DATE") }}</th>
                    <td>
                      <span class="view-text">{{
                        viewStockAdjustmentData.date | formatDate
                      }}</span>
                    </td>
                  </tr>

                  <tr>
                    <th>{{ $t("message.REFERENCE") }}</th>
                    <td>
                      <span
                        v-if="viewStockAdjustmentData.reference"
                        class="view-text"
                        >{{ viewStockAdjustmentData.reference }}</span
                      ><span class="view-text" v-else>-</span>
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.NOTES") }}</th>
                    <td>
                      <span
                        class="view-text"
                        v-if="viewStockAdjustmentData.notes"
                        >{{ viewStockAdjustmentData.notes }}</span
                      ><span class="view-text" v-else>-</span>
                    </td>
                  </tr>
                 <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="viewStockAdjustmentData.created_by">
                      {{ viewStockAdjustmentData.created_by.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="viewStockAdjustmentData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td>{{ viewStockAdjustmentData.updated_by.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="viewStockAdjustmentData.created_at">
                      {{ viewStockAdjustmentData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td v-if="viewStockAdjustmentData.updated_at">
                      {{ viewStockAdjustmentData.updated_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                </tbody>
              </table>

              <h2>{{ $t("message.STOCK_ADJUSTMENT_DETAILS") }}</h2>
              <table class="table table-hover table-bordered dark-border">
                <tr>
                  <th>{{ $t("message.PRODUCT") }}</th>
                  <th>{{ $t("message.QUANTITY") }}</th>
                  <th>{{ $t("message.TYPE") }}</th>
                </tr>
                <tbody>
                  <tr
                    v-for="(
                      stock_detail, index
                    ) in viewStockAdjustmentData.stock_adjustment_details"
                    :key="index"
                  >
                    <td v-if="stock_detail.product">
                      {{ stock_detail.product.name }}
                    </td>
                    <td v-else></td>
                    <td>
                      {{ stock_detail.product_quantity }}
                    </td>
                    <td>
                      <!-- {{stock_detail.type}} -->
                      <div>
                        {{
                          stock_detail.type == 1
                            ? $t("message.ADDITION")
                            : $t("message.SUBTRACTION")
                        }}
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="printStockAdjustment"
                class="btn btn-primary"
              >
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
  name: "viewStockAdjustmentModal",
  props: ["viewStockAdjustmentData"],
  data() {
    return {
      currentDateLanguage: dateLanguage,
    };
  },
  components: {
    printHeader,
  },
  mounted() {},
  methods: {
    printStockAdjustment() {
      this.$htmlToPaper("printMe");
    },
  },
};
</script>