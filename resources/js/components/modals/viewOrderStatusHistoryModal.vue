<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewOrderStatusHistoryModal"
      role="dialog"
      aria-labelledby="viewGameHistory"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewOrderStatusHistoryModal">
              {{ $t("message.VIEW_ORDER_HISTORY") }}:
              {{ orderStatusHistoryData.order_number }}
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
            <div id="printMe">
              <div class="onlyForPrint">
                <printHeader></printHeader>
                <div class="printHeading">
                  {{ $t("message.VIEW_ORDER_HISTORY") }}:
                  {{ orderStatusHistoryData.order_number }}
                </div>
              </div>
              <table
                class="table table-hover table-bordered dark-border"
                v-if="orderStatusHistory != ''"
              >
                <thead>
                  <tr>
                    <th>
                      <label>{{ $t("message.ORDER_NUMBER") }}</label>
                    </th>
                    <th>
                      <label>{{ $t("message.CUSTOMER") }}</label>
                    </th>
                    <th>
                      <label>{{ $t("message.ORDER_STATUS") }}</label>
                    </th>
                    <th>
                      <label>{{ $t("message.UPDATED_BY") }}</label>
                    </th>
                    <th>
                      <label>{{ $t("message.UPDATED_AT") }}</label>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="data in orderStatusHistory" :key="data.id">
                    <td v-if="data.order">{{ data.order.order_number }}</td>
                    <td v-else>-</td>
                    <td v-if="data.customer">{{  data.customer.name }} </td>
                    <td v-else>-</td>
                    <td v-if="data.order_status">
                      <span
                        class="badge badge-primary"
                        v-if="data.order_status.id == 1"
                      >
                        {{ data.order_status.name }}
                      </span>
                      <span
                        class="badge badge-warning"
                        v-else-if="data.order_status.id == 2"
                      >
                        {{ data.order_status.name }}
                      </span>
                      <span
                        class="badge badge-info"
                        v-else-if="data.order_status.id == 3"
                      >
                        {{ data.order_status.name }}
                      </span>
                      <span
                        class="badge badge-success"
                        v-else-if="data.order_status.id == 4"
                      >
                        {{ data.order_status.name }}
                      </span>
                      <span
                        class="badge badge-danger"
                        v-else-if="data.order_status.id == 5"
                      >
                        {{ data.order_status.name }}
                      </span>
                      <span class="badge badge-secondary" v-else>
                        {{ data.order_status.name }}
                      </span>
                    </td>
                    <td v-else>-</td>
                    <td v-if="data.updated_by">
                      {{ data.updated_by.name}}
                    </td>
                    <td v-else>-</td>
                    <td v-if="data.order_status_updated_at">
                      {{ data.order_status_updated_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                </tbody>
              </table>
              <table
                class="table table-hover table-bordered dark-border"
                v-else
              >
                <thead>
                  <tr>
                    <th>
                      <label>{{ $t("message.ORDER_NUMBER") }}</label>
                    </th>
                    <th>
                      <label>{{ $t("message.CUSTOMER") }}</label>
                    </th>
                    <th>
                      <label>{{ $t("message.ORDER_STATUS") }}</label>
                    </th>
                    <th>
                      <label>{{ $t("message.UPDATED_BY") }}</label>
                    </th>
                    <th>
                      <label>{{ $t("message.UPDATED_AT") }}</label>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="6" align="center">
                      <i>{{ $t("message.SORRY_NO_HISTORY_FOUND") }}</i>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button @click.prevent="print" class="btn btn-primary">
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
  name: "viewOrderStatusHistoryModal",
  props: ["orderStatusHistoryData"],
  data() {
    return {
      orderStatusHistory: [],
    };
  },
  components: {
    printHeader,
  },
  methods: {
    print() {
      this.$htmlToPaper("printMe");
    },
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#viewOrderStatusHistoryModal").on("show.bs.modal", function(e) {
      that.$Progress.start();
      Vue.nextTick().then(function() {
        axios
          .get("api/orderStatusHistory/" + that.orderStatusHistoryData.id)
          .then((response) => {
            that.orderStatusHistory = response.data;
            that.$Progress.finish();
          });
      });
    });
  },
};
</script>
