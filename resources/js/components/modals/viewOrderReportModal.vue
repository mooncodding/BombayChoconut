<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewOrderReportModal"
      role="dialog"
      aria-labelledby="viewOrderReportModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewOrderReportModalLabel">
              {{ $t("message.VIEW_ORDER_REPORT") }} : {{saleData.order_date | formatDate}}
            </h5>
            <button
              type="button"
              class="close"
              onclick="$('#viewOrderReportModal').modal('hide');"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="printViewOrderReportModal">
              <div class="onlyForPrint">
                <printHeader></printHeader>
                <div class="printHeading"><h3>{{ $t("message.VIEW_ORDER_REPORT") }} : {{saleData.order_date | formatDate}}</h3></div>
              </div>
              <table class="table table-hover table-bordered dark-border">
                <tr>
                  <th>{{ $t("message.ORDER_NUMBER") }}</th>
                  <th>{{ $t("message.ORDER_STATUS") }}</th>
                  <th>{{ $t("message.CUSTOMER") }}</th>
                  <th>{{ $t("message.PAYMENT_METHOD") }}</th>
                  <th>{{ $t("message.TOTAL_AMOUNT") }}</th>
                  <th>{{ $t("message.PAID_AMOUNT") }}</th>
                  <th>{{ $t("message.REMAINING_BALANCE") }}</th>
                </tr>
                <tbody>
                  <tr v-for="(data, index) in orderDetailData" :key="index">
                    <td v-if="data.order_number">
                      <a class="text-blue" @click="viewOrderPayment(data)"> {{ data.order_number }}</a>
                    </td>
                    <td v-else> - </td>
                    <td>
                      <span v-if="data.order_status">
                        <h6>
                          <span class="badge badge-primary" v-if="data.order_status.name == 'Order Confirmed'">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-warning" v-else-if="data.order_status.name == 'Order Placed'">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-orange" v-else-if="data.order_status.name == 'Order Shipped'">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-success" v-else-if="data.order_status.name == 'Order Delivered'">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-danger" v-else-if="data.order_status.name == 'Order Cancelled'">
                            {{data.order_status.name}}
                          </span>
                        </h6>
                      </span>
                      <span v-else>Pending</span>
                    </td>
                    <td v-if="data.customer">
                      {{
                        data.customer.name
                      }}
                    </td>
                    <td v-else> - </td>
                    <td v-if="data.payment_method">
                        {{ data.payment_method.name }}
                    </td>
                    <td v-else> - </td>
                    <td>
                      {{
                        data.grand_total
                        | currency("Ar", 2, {
                          thousandsSeparator: ".",
                          decimalSeparator: ",",
                          symbolOnLeft: false,
                          spaceBetweenAmountAndSymbol: true,
                        })
                      }}
                    </td>
                    <td v-if="data.total_amount_paid">
                      {{
                        data.total_amount_paid
                        | currency("Ar", 2, {
                          thousandsSeparator: ".",
                          decimalSeparator: ",",
                          symbolOnLeft: false,
                          spaceBetweenAmountAndSymbol: true,
                        })
                      }}
                    </td>
                    <td v-else> {{
                      0| currency("Ar", 2, {
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        symbolOnLeft: false,
                        spaceBetweenAmountAndSymbol: true,
                      })  
                    }}</td>
                    <td v-if="data.total_amount_paid">
                      {{
                        data.grand_total - data.total_amount_paid
                        | currency("Ar", 2, {
                          thousandsSeparator: ".",
                          decimalSeparator: ",",
                          symbolOnLeft: false,
                          spaceBetweenAmountAndSymbol: true,
                        })
                      }}
                    </td>
                    <td v-else> {{
                      data.grand_total | currency("Ar", 2, {
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        symbolOnLeft: false,
                        spaceBetweenAmountAndSymbol: true,
                      })  
                    }}</td>
                  </tr>
                  <tr>
                    <th colspan="4"><b>{{$t("message.TOTAL")}}</b></th>
                    <th>
                      {{ totalAmount | currency("Ar", 2, {
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        symbolOnLeft: false,
                        spaceBetweenAmountAndSymbol: true,
                      }) }}
                    </th>
                    <th>
                      {{ totalPaidAmount | currency("Ar", 2, {
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        symbolOnLeft: false,
                        spaceBetweenAmountAndSymbol: true,
                      }) }}
                    </th>
                    <th>
                      {{ totalRemainingAmount | currency("Ar", 2, {
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        symbolOnLeft: false,
                        spaceBetweenAmountAndSymbol: true,
                      }) }}
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button @click.prevent="printSale" class="btn btn-primary">
                {{ $t("message.PRINT") }}
              </button>
              <button
                type="button"
                class="btn btn-danger"
                onclick="$('#viewOrderReportModal').modal('hide');"
              >
                {{ $t("message.CLOSE") }}
              </button>
            </div>
          </div>
        </div>
        <ViewOrderPaymentReportModal :orderPaymentReportData="orderPaymentInfo"></ViewOrderPaymentReportModal>
      </div>
    </div>
  </div>
</template>
<script>
import Vue from "vue";
import printHeader from "../includes/printHeader.vue";
import ViewOrderPaymentReportModal from "./viewOrderPaymentReportModal.vue";
export default {
name: "viewOrderReportModal",
props: ["saleData"],
data() {
  return {
    currentDateLanguage: dateLanguage,
    customerData: {},
    orderDetailData: {},
    orderPaymentInfo: [],
    form: new form(),
  };
},
components: {
    printHeader,
    ViewOrderPaymentReportModal
},
computed: {
    totalAmount() {
      if (this.orderDetailData) {
        if (this.orderDetailData.length > 0) {
          return this.orderDetailData.reduce((sum, i) => {
            return sum + +i.grand_total;
          }, 0);
        }
      }
    },
    totalPaidAmount() {
      if (this.orderDetailData) {
        if (this.orderDetailData.length > 0) {
          return this.orderDetailData.reduce((sum, i) => {
            return sum + +i.total_amount_paid;
          }, 0);
        }
      }
    },
    totalRemainingAmount() {
      let sum = 0;
      if (this.orderDetailData) {
        if (this.orderDetailData.length > 0) {
          this.orderDetailData.map((item) => {
            sum += parseFloat(
              parseFloat(item.grand_total ? item.grand_total : 0) -
                parseFloat(item.total_amount_paid ? item.total_amount_paid : 0)
            );
          });
        }
      }
      return sum;
    },
  },
  methods: {
    printSale() {
      this.$htmlToPaper("printViewOrderReportModal");
    },
   viewOrderPayment(orderPayment) {
        this.orderPaymentInfo = orderPayment;
        $("#viewOrderPaymentReportModal").modal("show", orderPayment);
    },
  },
  mounted() {
    var that = this;
    $("#viewOrderReportModal").on("show.bs.modal", function (e) {
      Vue.nextTick().then(function () {
        axios
          .get("api/orderDetailReport?order_date=" + that.saleData.order_date)
          .then((response) => {
            that.orderDetailData = response.data;
          });
      });
    });
  },
};
</script>
