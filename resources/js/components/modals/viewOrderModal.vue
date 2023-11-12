<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewOrderModal"
      role="dialog"
      aria-labelledby="viewOrder"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewOrderModal">
              {{ $t("message.VIEW_ORDER") }}:
              {{ orderData.order_number }}
            </h5>
            <button
              type="button"
              class="close"
              onclick="$('#viewOrderModal').modal('hide');"
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
                  {{ $t("message.VIEW_ORDER") }}:
                  {{ orderData.order_number }}
                </div>
              </div>
              <table class="table table-hover table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.DATE") }}</th>
                    <td v-if="orderData.order_date">
                      {{ orderData.order_date | formatDate }}
                    </td>
                    <td v-else>--</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.ORDER_NUMBER") }}</th>
                    <td>
                      {{
                        orderData.reference ? orderData.reference : "-"
                      }}
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.BILL_NUMBER") }}</th>
                    <td>{{ orderData.bill_no ? orderData.bill_no : "-" }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.ORDER_STATUS") }}</th>
                    <td v-if="orderData.order_status">
                      <span
                        class="badge badge-primary"
                        v-if="orderData.order_status.id == 1"
                      >
                        {{ orderData.order_status.name }}
                      </span>
                      <span
                        class="badge badge-warning"
                        v-else-if="orderData.order_status.id == 2"
                      >
                        {{ orderData.order_status.name }}
                      </span>
                      <span
                        class="badge badge-info"
                        v-else-if="orderData.order_status.id == 3"
                      >
                        {{ orderData.order_status.name }}
                      </span>
                      <span
                        class="badge badge-success"
                        v-else-if="orderData.order_status.id == 4"
                      >
                        {{ orderData.order_status.name }}
                      </span>
                      <span
                        class="badge badge-danger"
                        v-else-if="orderData.order_status.id == 5"
                      >
                        {{ orderData.order_status.name }}
                      </span>
                      <span class="badge badge-secondary" v-else>
                        {{ orderData.order_status.name }}
                      </span>
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{$t('message.PAYMENT_STATUS')}}</th>
                    <td>
                      <span
                        v-if="orderData.payment_status == 'paid'"
                        class="badge badge-success"
                        >{{ $t("message.PAID") }}</span
                      >
                      <span
                        v-else-if="orderData.payment_status == 'unpaid'"
                        class="badge badge-danger"
                        >{{ $t("message.UNPAID") }}</span
                      >
                      <span v-else class="badge badge-warning">{{
                        $t("message.PARTIAL_PAYMENT")
                      }}</span>
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.PAYMENT_METHOD") }}</th>
                    <td v-if="orderData.payment_method">
                      {{ orderData.payment_method.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CUSTOMER") }}</th>
                    <td v-if="orderData.customer">
                      {{ orderData.customer.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.NOTES") }}</th>
                    <td v-if="orderData.notes">{{ orderData.notes }}</td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="orderData.created_by">
                      {{ orderData.created_by.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="orderData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td>{{ orderData.updated_by.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="orderData.created_at">
                      {{ orderData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td v-if="orderData.updated_at">
                      {{ orderData.updated_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                </tbody>
              </table>
              <h2>{{ $t("message.ORDER_DETAILS") }}</h2>
              <table class="table table-hover table-bordered dark-border">
                <tr>
                  <th>
                    <label>{{ $t("message.PRODUCT") }}</label>
                  </th>
                  <th>
                    <label>{{ $t("message.QUANTITY") }}</label>
                  </th>
                  <th>
                    <label>{{ $t("message.SALE_PRICE") }}</label>
                  </th>
                  <th>
                    <label>{{ $t("message.WEIGHT") }}</label>
                  </th>
                  <th>
                    <label>{{ $t("message.SUB_TOTAL") }}</label>
                  </th>
                </tr>
                <tbody>
                  <tr
                    v-for="(data, index) in orderData.order_details"
                    :key="index"
                  >
                    <td v-if="data && data.product">
                      {{ data.product.title }}
                    </td>
                    <td v-else>-</td>
                    <td v-if="data.quantity">
                      {{ data.quantity }}
                    </td>
                    <td v-if="data.sale_price">
                      {{
                        data.sale_price
                          
                      }}
                    </td>
                    <td v-else>0</td>
                    <td v-if="data.weight">
                      {{
                        data.weight
                          
                      }}
                    </td>
                    <td v-else>-</td>
                    <td v-if="data.sub_total">
                      {{
                        data.sub_total
                      }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                </tbody>
              </table>
              <!-- Amount Summary -->
              <span v-if="orderData.sub_total != 0"
                ><h5 class="text-center mt-3">
                  <b
                    >{{ $t("message.SUB_TOTAL") }}:
                    <span class="adminOrderTotal">{{
                      orderData.sub_total
                        | currency("Ar", 2, {
                          thousandsSeparator: ".",
                          decimalSeparator: ",",
                          symbolOnLeft: false,
                          spaceBetweenAmountAndSymbol: true,
                        })
                    }}</span></b
                  >
                </h5></span
              >
              <!-- Amount Summary End -->
            </div>
            <div class="modal-footer">
              <button @click.prevent="printSale" class="btn btn-primary">
                {{ $t("message.PRINT") }}
              </button>
              <button
                type="button"
                class="btn btn-danger"
                onclick="$('#viewOrderModal').modal('hide');"
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
  name: "viewOrderModal",
  props: ["orderData"],
  data() {
    return {
      orderInfo: {},
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      form: new form({
        order_status_id: "",
      }),
    };
  },
  components: {
    printHeader,
  },
  methods: {
    printSale() {
      this.$htmlToPaper("printData");
    },
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#viewOrderModal").on("show.bs.modal", function(e) {
    });
  },
};
</script>
