<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewExpenseModal"
      role="dialog"
      aria-labelledby="viewExpense"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewExpenseModal">
              {{ $t("message.VIEW_EXPENSE") }}:
              {{ expenseData.name }}
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
                  {{ $t("message.VIEW_EXPENSE") }}:
                  {{ expenseData.name }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.NAME") }}</th>
                    <td>{{ expenseData.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.PAYMENT_METHOD") }}</th>
                    <td v-if="expenseData.payment_method">
                      {{ expenseData.payment_method.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.AMOUNT") }}</th>
                    <td>
                      <span class="view-text" v-if="expenseData.amount">{{
                        expenseData.amount | currency("Ar", 2, {
                                thousandsSeparator: ".",
                                decimalSeparator: ",",
                                symbolOnLeft: false,
                                spaceBetweenAmountAndSymbol: true,
                              })
                      }}</span
                      ><span class="view-text" v-else>-</span>
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.NOTES") }}</th>
                    <td>
                      <span class="view-text" v-if="expenseData.notes">{{
                        expenseData.notes
                      }}</span
                      ><span class="view-text" v-else>-</span>
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="expenseData.created_by">
                      {{ expenseData.created_by.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="expenseData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td>{{ expenseData.updated_by.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="expenseData.created_at">
                      {{ expenseData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td v-if="expenseData.updated_at">
                      {{ expenseData.updated_at | formatDateTime }}
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
  name: "viewExpenseModal",
  props: ["expenseData"],
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
