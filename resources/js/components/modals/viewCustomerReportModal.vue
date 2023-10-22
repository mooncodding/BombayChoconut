<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewCustomerReportModal"
      role="dialog"
      aria-labelledby="viewCustomer"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewCustomerReportModal">
              {{ $t("message.VIEW_CUSTOMER_REPORT") }}:
              {{ customerReportData.name }}
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
                  {{ $t("message.VIEW_CUSTOMER_REPORT") }}:
                  {{ customerReportData.name }}
                </div>
              </div>
              <table class="table table-hover table-bordered">
                <tbody>
                    <tr>
                        <th>{{ $t("message.NAME") }}</th>
                        <td v-if="customerReportData.name">{{customerReportData.name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.EMAIL") }}</th>
                        <td v-if="customerReportData.email">{{customerReportData.email}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.USER_NAME") }}</th>
                        <td v-if="customerReportData.username">{{customerReportData.username}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.COMPANY_NAME") }}</th>
                        <td v-if="customerReportData.company_name">{{customerReportData.company_name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.CITY") }}</th>
                        <td v-if="customerReportData.city">{{customerReportData.city.name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.MOBILE_NUMBER") }}</th>
                        <td v-if="customerReportData.mobile_number">{{customerReportData.mobile_number}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.ID_CARD_NUMBER") }}</th>
                        <td v-if="customerReportData.id_card_number">{{customerReportData.id_card_number}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.TELEPHONE") }}</th>
                        <td v-if="customerReportData.telephone">{{customerReportData.telephone}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.ADDRESS") }}</th>
                        <td v-if="customerReportData.address">{{customerReportData.address}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.NIF") }}</th>
                        <td v-if="customerReportData.nif">{{customerReportData.nif}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.STAT") }}</th>
                        <td v-if="customerReportData.stat">{{customerReportData.stat}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.CIF") }}</th>
                        <td v-if="customerReportData.cif">{{customerReportData.cif}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.RCS") }}</th>
                        <td v-if="customerReportData.rcs">{{customerReportData.rcs}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.IS_DISABLED") }}</th>
                        <td v-if="customerReportData.is_disabled == 1">Yes</td>
                        <td v-else>No</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.IS_VISIBLE_PRICE") }}</th>
                        <td v-if="customerReportData.is_visible_price == 1">Yes</td>
                        <td v-else>No</td>
                    </tr>
                     <tr>
                    <th>{{ $t("message.PHOTO") }}</th>
                    <td v-if="customerReportData.photo !=null">
                      <span>
                        &nbsp;
                        <img
                          v-bind:src="
                            'images/users/' + customerReportData.photo
                          "
                          class="mr-3"
                          width="10%"
                          alt="Banner not found"
                        />
                        <a
                          download
                          :href="
                            'images/users/' + customerReportData.photo
                          "
                        >
                          <i class="fa fa-download" aria-hidden="true"></i
                        ></a>
                      </span>
                    </td>
                    <td v-else>-</td>
                  </tr>
                    <tr>
                      <th>{{ $t("message.CREATED_AT") }}</th>
                      <td v-if="customerReportData.created_at">
                        {{ customerReportData.created_at | formatDateTime }}
                      </td>
                      <td v-else>-</td>
                    </tr>
                    <tr>
                      <th>{{ $t("message.UPDATED_AT") }}</th>
                      <td v-if="customerReportData.updated_at">
                        {{ customerReportData.updated_at | formatDateTime }}
                      </td>
                      <td v-else>-</td>
                    </tr>
                </tbody>
              </table>
              <!--  Row of all sales start -->
              <h3>{{$t("message.ORDER_DETAILS")}}</h3>
              <table class="table table-hover table-bordered">
                <tr>
                  <th>{{ $t("message.S_NO") }}</th>
                  <th>{{ $t("message.DATE") }}</th>
                  <th>{{ $t("message.ORDER_NUMBER") }}</th>
                  <th>{{ $t("message.ORDER_STATUS") }}</th>
                  <th>{{ $t("message.TOTAL_AMOUNT") }}</th>
                  <th>{{ $t("message.AMOUNT_PAID") }}</th>
                  <th>{{ $t("message.REMAINING_BALANCE") }}</th>
                  <th>{{ $t("message.PAYMENT_STATUS") }}</th>
                </tr>
                <tbody>
                  <tr
                    v-for="(data, index) in customerReportData.orders"
                    :key="data.id"
                  >
                    <td>
                      {{ index + 1 }}
                    </td>
                    <td>{{ data.order_date | formatDate }}</td>
                    <td class="linkDesign">
                      <a  class="text-blue" @click="viewOrderModal(data.id)">{{
                        data.order_number
                      }}</a>
                    </td>

                    <td>
                      <span v-if="data.order_status">
                        <h6>
                          <span class="badge badge-primary" v-if="data.order_status.id == 1">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-warning" v-else-if="data.order_status.id == 2">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-info" v-else-if="data.order_status.id == 3">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-success" v-else-if="data.order_status.id == 4">
                            {{data.order_status.name}}
                          </span>
                          <span class="badge badge-danger" v-else-if="data.order_status.id == 5">
                            {{data.order_status.name}}
                          </span>
                           <span class="badge badge-secondary" v-else>
                          {{data.order_status.name}}
                        </span>
                        </h6>
                      </span>
                      <span v-else>Pending</span>
                    </td>

                    <td>
                      {{ data.grand_total | currency("Ar", 2, {
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        symbolOnLeft: false,
                        spaceBetweenAmountAndSymbol: true,
                      }) }}
                    </td>
                    <td>
                      {{
                        amountPaid(data.order_payments) | currency("Ar", 2, {
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        symbolOnLeft: false,
                        spaceBetweenAmountAndSymbol: true,
                      })
                      }}
                    </td>
                    <td>
                      {{
                        (data.grand_total -
                          amountPaid(data.order_payments))
                          | currency("Ar", 2, {
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        symbolOnLeft: false,
                        spaceBetweenAmountAndSymbol: true,
                      })
                      }}
                    </td>

                    <td>
                      <h6>
                        <span
                          v-if="data.payment_status == 'paid'"
                          class="badge badge-success"
                          >{{ $t("message.PAID") }}</span
                        >
                        <span
                          v-else-if="data.payment_status == 'unpaid'"
                          class="badge badge-danger"
                          >{{ $t("message.UNPAID") }}</span
                        >
                        <span v-else class="badge badge-warning">{{
                          $t("message.PARTIAL_PAYMENT")
                        }}</span>
                      </h6>
                    </td>
                  </tr>
                  <!-- <tr>
                    <th colspan="4"></th>
                    <th>
                      {{ amount_total | currency() }}
                    </th>
                    <th>
                      {{ amount_paid_total | currency() }}
                    </th>
                    <th>
                      {{ (amount_total - amount_paid_total) | currency() }}
                    </th>
                    <th>

                      total refund amount
                      {{
                        (total_refund_amount ? total_refund_amount : 0) | currency()
                      }}
                    </th>
                    <th></th>
                  </tr> -->
                </tbody>
              </table>
              <!--  Row of all sales end -->
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
      <ViewOrderModal :orderData="orderData"></ViewOrderModal>
    </div>
  </div>
</template>
<script>
import printHeader from "../includes/printHeader.vue";
import ViewOrderModal from "./viewOrderModal.vue";
export default {
  name: "viewCustomerReportModal",
  props: ["customerReportData"],
  data() {
    return {
      orderData:{},
    };
  },
  components: {
    printHeader,
    ViewOrderModal
},
  methods: {
    printSale() {
      this.$htmlToPaper("printData");
    },
    viewOrderModal(orderId) {
      // api to get orders
      axios
          .get("api/getOrdersById/"+orderId)
          .then((response) => {
            this.orderData = response.data;
          });
        // api to get orders
      $("#viewOrderModal").modal("show");
    },
    amountPaid: function (values) {
      return values.reduce((acc, val) => {
        return acc + parseFloat(val.amount);
      }, 0);
    },
  },
};
</script>