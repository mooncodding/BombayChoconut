<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewStockReportModal"
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
            <h5 class="modal-title" id="viewStockReportModal">
              {{ $t("message.VIEW_STOCK_REPORT") }}:
              {{ stockReportData.product }}
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
                  {{ $t("message.VIEW_STOCK_REPORT") }}:
                  {{ stockReportData.product }}
                </div>
              </div>
              <table class="table table-hover table-bordered">
                <tr>
                  <th>{{ $t("message.DATE") }}</th>
                  <th>{{ $t("message.REFERENCE") }}</th>
                  <th>{{ $t("message.STOCK_ENTRY") }}</th>
                  <th>{{ $t("message.SOLD") }}</th>
                  <th>{{ $t("message.ADJUSTMENT") }}</th>
                  <th>{{ $t("message.AVAILABLE") }}</th>
                </tr>
                <tbody>
                  <tr v-for="(data, index) in stockDetails" :key="index">
                    <!-- Date -->
                    <td v-if="data.stock_adjustment_id && data.stock_adjustment">
                        {{ data.stock_adjustment.date | formatDate }}
                    </td>
                    <td v-if="data.order_id && data.order">
                        {{ data.order.order_date | formatDate }}
                    </td>
                    <td v-if="data.stock_entry_id && data.entry">
                        {{ data.entry.stock_entry_date | formatDate }}
                    </td>
                    <!-- Date End -->
                    <!-- Reference -->
                    <td v-if="data.stock_adjustment_id  && data.stock_adjustment">
                        {{ data.stock_adjustment.reference }}
                    </td>
                    <td v-if="data.order_id && data.order">
                        {{ data.order.order_number }}
                    </td>
                    <td v-if="data.stock_entry_id && data.entry">
                        {{ data.entry.reference }}
                    </td>
                    <!-- Reference End -->
                    <!-- Stock Entry -->
                    <td v-if="data.stock_entry_id">
                      {{ data.total_quantity }}
                    </td>
                    <td v-else>-</td>
                     <!-- Sold -->
                     <td v-if="data.order_id">
                        {{ data.quantity }}
                    </td>
                    <td v-else>-</td>
                    <!-- Stock Adjustment -->
                    <td v-if="data.stock_adjustment_id && data.type == 1">
                        {{ data.product_quantity }}
                    </td>
                    <td v-else-if="data.stock_adjustment_id && data.type == 0">
                        -{{ data.product_quantity }}
                    </td>
                    <td v-else>-</td>

                    <td>{{data.remaining_quantity}}</td>
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
      <ViewOrderModal :orderData="orderData"></ViewOrderModal>
    </div>
  </div>
</template>
<script>
import moment from "moment";
import printHeader from "../includes/printHeader.vue";
import ViewOrderModal from "./viewOrderModal.vue";
export default {
  name: "viewStockReportModal",
  props: ["stockReportData","from_date","to_date"],
  data() {
    return {
      moment_from_date:"",
      moment_to_date:"",
      orderData:{},
      stockDetails:[],
      stockAvailable:0,
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
    // calculate the available quantity
    calculateRemainingQuantity(){
      if (this.stockDetails && this.stockDetails.length > 0)
      {
        let stockAvailable= 0;
        // Iterate the product report details
        this.stockDetails.map((item, i) => { 
          if (item.stock_entry_id)
          {
            stockAvailable += parseFloat(item.total_quantity ? item.total_quantity : 0);
          }
          if (item.order_id)
          {
            stockAvailable -= parseFloat(item.quantity ? item.quantity : 0);
          }
          if (item.stock_adjustment_id && item.type == 0) {

            stockAvailable -= parseFloat(item.product_quantity ? item.product_quantity : 0);
          }
          if (item.stock_adjustment_id && item.type == 1) {
            stockAvailable += parseFloat(item.product_quantity ? item.product_quantity : 0);
          }
          this.stockDetails[i].remaining_quantity = stockAvailable;
        });
      }
    }
  },
  mounted() {
    var that = this;
    $("#viewStockReportModal").on("show.bs.modal", function (e) {
      Vue.nextTick().then(function () {
        console.log(that.from_date)
        that.moment_from_date = moment(that.from_date).format("YYYY-MM-DD");
        that.moment_to_date = moment(that.to_date).format("YYYY-MM-DD");
        axios
          .get("api/stockDetailReport?product_id="+that.stockReportData.id
              +"&from_date=" +
              that.moment_from_date +
              "&to_date=" +
              that.moment_to_date)
          .then((response) => {
            that.stockDetails = response.data;
            that.calculateRemainingQuantity();
          });
      });
    });
  },
};
</script>