<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewGeneralPushNotificationModal"
      role="dialog"
      aria-labelledby="viewGeneralPushNotification"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewGeneralPushNotificationModal">
              {{ $t("message.VIEW_GENERAL_PUSH_NOTIFICATION") }}:
              {{ generalPushNotificationData.title }}
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
                  {{ $t("message.VIEW_GENERAL_PUSH_NOTIFICATION") }}:
                  {{ generalPushNotificationData.title }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <!-- Title -->
                  <tr>
                    <th>{{ $t("message.TITLE") }}</th>
                    <td v-if="generalPushNotificationData.title">
                      {{ generalPushNotificationData.title }}
                    </td>
                  </tr>
                  <!-- Content -->
                  <tr>
                    <th>{{ $t("message.CONTENT") }}</th>
                    <td
                      v-if="generalPushNotificationData.content"
                      class="view-text desc-format"
                    >
                      {{ generalPushNotificationData.content }}
                    </td>
                  </tr>
                  <!-- Is Schedule -->
                  <tr>
                    <th>{{ $t("message.IS_SCHEDULE") }}</th>
                    <td v-if="generalPushNotificationData.is_schedule == 1">
                      Yes
                    </td>
                    <td v-else>No</td>
                  </tr>
                  <!-- Date Time -->
                  <tr>
                    <th>{{ $t("message.DATE_TIME") }}</th>
                    <td v-if="generalPushNotificationData.date_time != null">
                      {{
                        generalPushNotificationData.date_time | formatDateTime
                      }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <!-- Created By -->
                  <tr v-if="generalPushNotificationData.created_by">
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td
                      v-if="
                        generalPushNotificationData.created_by.name"
                    >
                      {{ generalPushNotificationData.created_by.name }}
                    </td>
                  </tr>
                  <!-- Created At -->
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="generalPushNotificationData.created_at">
                      {{
                        generalPushNotificationData.created_at | formatDateTime
                      }}
                    </td>
                  </tr>
                  <!-- Updated By -->
                  <tr v-if="generalPushNotificationData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td
                      v-if="generalPushNotificationData.updated_by.name"
                    >
                      {{ generalPushNotificationData.updated_by.name }}
                    </td>
                  </tr>
                  <!-- Updated At -->
                  <tr v-if="generalPushNotificationData.updated_by">
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td v-if="generalPushNotificationData.updated_at">
                      {{
                        generalPushNotificationData.updated_at | formatDateTime
                      }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
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
</template>
<script>
import printHeader from "../includes/printHeader.vue";
export default {
  name: "viewGeneralPushNotificationModal",
  props: ["generalPushNotificationData"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      form: new form(),
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
};
</script>
