<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewOrderPaymentModal"
      role="dialog"
      aria-labelledby="viewOrderPayment"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewOrderPaymentModal">
              {{ $t("message.VIEW_ORDER_PAYMENT") }}:
              {{ orderPaymentData.reference }}
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
                  {{ $t("message.VIEW_ORDER_PAYMENT") }}:
                  {{ orderPaymentData.reference }}
                </div>
              </div>
              <table class="table table-hover table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.REFERENCE") }}</th>
                    <td>{{ orderPaymentData.reference ? orderPaymentData.reference : "-" }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.DATE") }}</th>
                    <td v-if="orderPaymentData.payment_date">{{ orderPaymentData.payment_date | formatDate}}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CUSTOMER") }}</th>
                    <td v-if="orderPaymentData.customer">{{ orderPaymentData.customer.name}}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.ORDER") }}</th>
                    <td v-if="orderPaymentData.order">{{ orderPaymentData.order.order_number}}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.PAYMENT_METHOD") }}</th>
                    <td v-if="orderPaymentData.payment_method">{{ orderPaymentData.payment_method.name}}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.AMOUNT") }}</th>
                    <td v-if="orderPaymentData.amount">{{ orderPaymentData.amount | currency("Ar", 2, {
                      thousandsSeparator: ".",
                      decimalSeparator: ",",
                      symbolOnLeft: false,
                      spaceBetweenAmountAndSymbol: true,})}}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.NOTES") }}</th>
                    <td v-if="orderPaymentData.notes">{{ orderPaymentData.notes }}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="orderPaymentData.created_by">
                      {{ orderPaymentData.created_by.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="orderPaymentData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td>{{ orderPaymentData.updated_by.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="orderPaymentData.created_at">
                      {{ orderPaymentData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td v-if="orderPaymentData.updated_at">
                      {{ orderPaymentData.updated_at | formatDateTime }}
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
  name: "viewOrderPaymentModal",
  props: ["orderPaymentData"],
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