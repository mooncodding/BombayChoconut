<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewUnitModal"
      role="dialog"
      aria-labelledby="viewUnit"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewUnitModal">
              {{ $t("message.VIEW_UNIT") }}:
              {{ unitData.name }}
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
                  {{ $t("message.VIEW_UNIT") }}:
                  {{ unitData.name }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>{{ $t("message.NAME") }}</th>
                        <td>{{unitData.name}}</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.SYMBOL") }}</th>
                        <td>{{unitData.symbol}}</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.CREATED_BY") }}</th>
                        <td v-if="unitData.created_by">{{unitData.created_by.name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr v-if="unitData.updated_by">
                        <th>{{ $t("message.UPDATED_BY") }}</th>
                        <td>{{unitData.updated_by.name}}</td>
                    </tr>
                     <tr>
                        <th>{{ $t("message.CREATED_AT") }}</th>
                        <td v-if="unitData.created_at">{{unitData.created_at | formatDateTime}}</td>
                        <td v-else>-</td>
                    </tr>
                     <tr>
                        <th>{{ $t("message.UPDATED_AT") }}</th>
                        <td v-if="unitData.updated_at">{{unitData.updated_at | formatDateTime}}</td>
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
  name: "viewUnitModal",
  props: ["unitData"],
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