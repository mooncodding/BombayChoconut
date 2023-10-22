<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewOrderPaymentReportModal"
      role="dialog"
      aria-labelledby="viewOrderPaymentReportModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modalLarge" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewOrderPaymentReportModalLabel">
              {{ $t("message.VIEW_ORDER_PAYMENT_REPORT") }}
            </h5>
            <button
              type="button"
              class="close"
              onclick="$('#viewOrderPaymentReportModal').modal('hide');"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="printViewOrderPaymentModal">
              <div class="onlyForPrint">
                <printHeader></printHeader>
                <div class="printHeading"><h3>{{ $t("message.VIEW_ORDER_PAYMENT_REPORT") }}</h3></div>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.DATE") }}</th>
                    <td>
                      <span class="view-text">{{ orderPaymentReportData.order_date | formatDate }}</span>
                    </td>
                  </tr>

                  <tr>
                    <th>{{ $t("message.ORDER_NUMBER") }}</th>
                    <td>
                      <span v-if="orderPaymentReportData.order_number" class="view-text">{{
                        orderPaymentReportData.order_number
                      }}</span
                      ><span class="view-text" v-else>-</span>
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CUSTOMER") }}</th>
                    <td>
                      <span class="view-text" v-if="orderPaymentReportData.customer">{{
                        orderPaymentReportData.customer.name
                      }}</span
                      ><span class="view-text" v-else>-</span>
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td>
                      <span class="view-text" v-if="orderPaymentReportData.created_by">{{
                        orderPaymentReportData.created_by.name
                      }}</span
                      ><span class="view-text" v-else>-</span>
                    </td>
                  </tr>
                </tbody>
              </table>

              <h2>{{ $t("message.ORDER_PAYMENT_DETAILS") }}</h2>
              <table class="table table-hover table-bordered dark-border">
                <thead>
                  <tr>
                    <th>{{ $t("message.DATE") }}</th>
                    <th>{{ $t("message.CUSTOMER") }}</th>
                    <th>{{ $t("message.PAYMENT_METHOD") }}</th>
                    <th>{{ $t("message.PAID_AMOUNT") }}</th>
                  </tr>
                </thead>
                <tbody v-if="orderPaymentReportData.order_payments !=''">
                  <tr v-for="(salePayment, index) in orderPaymentReportData.order_payments" :key="index">
                    <td v-if="salePayment.payment_date">
                      {{ salePayment.payment_date | formatDate }}
                    </td>
                    <td v-else> - </td>
                    <td v-if="salePayment.customer">
                      {{
                        salePayment.customer.name
                      }}
                    </td>
                    <td v-else> - </td>
                    <td>
                      <span v-if="salePayment.payment_method">
                        {{ salePayment.payment_method.name }}
                      </span>
                      <span v-else> - </span>
                    </td>
                    <td>
                      {{
                        salePayment.amount
                        | currency("Ar", 2, {
                          thousandsSeparator: ".",
                          decimalSeparator: ",",
                          symbolOnLeft: false,
                          spaceBetweenAmountAndSymbol: true,
                        })
                      }}
                    </td>
                  </tr>
                </tbody>
                <thead v-else>
                  <tr>
                    <td colspan="4" align="center"><i>{{$t('message.SORRY_NO_ORDER_PAYMENT_AVAILABLE')}}</i></td>
                  </tr>
                </thead>
              </table>
              <table class="table table-hover table-bordered dark-border">
                  <tr>
                    <td colspan="5" align="center">
                      <div class="adminTotal">
                        {{ $t("message.TOTAL") }}:
                        {{
                          orderPaymentReportData.grand_total
                          | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })
                        }}
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="5" align="center">
                      <div v-if="orderPaymentReportData">
                        <div v-if="orderPaymentReportData">
                          <h4 v-if="orderPaymentReportData.total_amount_paid">
                            {{ $t("message.AMOUNT_PAID") }}:
                            {{
                              orderPaymentReportData.total_amount_paid
                              | currency("Ar", 2, {
                                thousandsSeparator: ".",
                                decimalSeparator: ",",
                                symbolOnLeft: false,
                                spaceBetweenAmountAndSymbol: true,
                              })
                            }}
                          </h4>
                        </div>
                        <div v-if="orderPaymentReportData">
                          <h4 v-if="!orderPaymentReportData.total_amount_paid">
                            {{ $t("message.AMOUNT_PAID") }}:
                            {{
                              0
                              | currency("Ar", 2, {
                                thousandsSeparator: ".",
                                decimalSeparator: ",",
                                symbolOnLeft: false,
                                spaceBetweenAmountAndSymbol: true,
                              })
                            }}
                          </h4>
                        </div>

                        <div v-if="orderPaymentReportData">
                          <h4 v-if="orderPaymentReportData.total_amount_paid">
                            {{ $t("message.REMAINING_AMOUNT") }}:
                            {{
                              orderPaymentReportData.grand_total - orderPaymentReportData.total_amount_paid
                              | currency("Ar", 2, {
                                thousandsSeparator: ".",
                                decimalSeparator: ",",
                                symbolOnLeft: false,
                                spaceBetweenAmountAndSymbol: true,
                              })
                            }}
                          </h4>
                        </div>
                        <div v-else>
                          <h4>
                            {{ $t("message.REMAINING_AMOUNT") }}:
                            {{
                              orderPaymentReportData.grand_total
                               | currency("Ar", 2, {
                              thousandsSeparator: ".",
                              decimalSeparator: ",",
                              symbolOnLeft: false,
                              spaceBetweenAmountAndSymbol: true,
                            })
                            }}
                          </h4>
                        </div>
                      </div>
                    </td>
                  </tr>
              </table>

            </div>
            <div class="modal-footer">
              <button @click.prevent="printSale" class="btn btn-primary">
                {{ $t("message.PRINT") }}
              </button>
              <button
                type="button"
                class="btn btn-danger"
                onclick="$('#viewOrderPaymentReportModal').modal('hide');"
              >
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
import Vue from "vue";
import printHeader from "../includes/printHeader.vue";
export default {
  name: "viewOrderPaymentReportModal",
  props: ["orderPaymentReportData"],
  data() {
    return {
      currentDateLanguage: dateLanguage,
      customerData: {},
      saleModalData: {},
      form: new form({
        id: "",
        sale_id: "",
      }),
      salePaymentInfo: {},
    };
  },
  components: {
    printHeader,
  },
  mounted() {
    var that = this;
    $("#viewOrderPaymentReportModal").on("show.bs.modal", function (e) {
      Vue.nextTick().then(function () {
      });
    });
  },
  methods: {
    printSale() {
      this.$htmlToPaper("printViewOrderPaymentModal");
    },
  },
};
</script>
