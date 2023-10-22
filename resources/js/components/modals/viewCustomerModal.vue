<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewCustomerModal"
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
            <h5 class="modal-title" id="viewCustomerModal">
              {{ $t("message.VIEW_CUSTOMER") }}:
              {{ customerData.name }}
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
                  {{ $t("message.VIEW_CUSTOMER") }}:
                  {{ customerData.name }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>{{ $t("message.NAME") }}</th>
                        <td v-if="customerData.name">{{customerData.name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.EMAIL") }}</th>
                        <td v-if="customerData.email">{{customerData.email}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.USER_NAME") }}</th>
                        <td v-if="customerData.username">{{customerData.username}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.COMPANY_NAME") }}</th>
                        <td v-if="customerData.company_name">{{customerData.company_name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.CITY") }}</th>
                        <td v-if="customerData.city">{{customerData.city.name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.MOBILE_NUMBER_1") }}</th>
                        <td v-if="customerData.mobile_number">{{customerData.mobile_number}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.MOBILE_NUMBER_2") }}</th>
                        <td v-if="customerData.mobile_number_2">{{customerData.mobile_number_2}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.MOBILE_NUMBER_3") }}</th>
                        <td v-if="customerData.mobile_number_3">{{customerData.mobile_number_3}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.ID_CARD_NUMBER") }}</th>
                        <td v-if="customerData.id_card_number">{{customerData.id_card_number}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.ADDRESS") }}</th>
                        <td v-if="customerData.address">{{customerData.address}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.NIF") }}</th>
                        <td v-if="customerData.nif">{{customerData.nif}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.STAT") }}</th>
                        <td v-if="customerData.stat">{{customerData.stat}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.CIF") }}</th>
                        <td v-if="customerData.cif">{{customerData.cif}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.RCS") }}</th>
                        <td v-if="customerData.rcs">{{customerData.rcs}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.IS_DISABLED") }}</th>
                        <td v-if="customerData.is_disabled == 1">Yes</td>
                        <td v-else>No</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.IS_VISIBLE_PRICE") }}</th>
                        <td v-if="customerData.is_visible_price == 1">Yes</td>
                        <td v-else>No</td>
                    </tr>
                    <tr>
                    <th>{{ $t("message.PHOTO") }}</th>
                    <td v-if="customerData.photo !=null">
                      <span>
                        &nbsp;
                        <img
                          v-bind:src="
                            'images/users/' + customerData.photo
                          "
                          class="mr-3"
                          width="10%"
                          alt="Banner not found"
                        />
                        <a
                          download
                          :href="
                            'images/users/' + customerData.photo
                          "
                        >
                          <i class="fa fa-download" aria-hidden="true"></i
                        ></a>
                      </span>
                    </td>
                    <td v-else>-</td>
                  </tr>
                    <tr>
                        <th>{{ $t("message.CREATED_BY") }}</th>
                        <td v-if="customerData.created_by">{{customerData.created_by.name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr v-if="customerData.updated_by">
                        <th>{{ $t("message.UPDATED_BY") }}</th>
                        <td>{{customerData.updated_by.name}}</td>
                    </tr>
                    <tr>
                      <th>{{ $t("message.CREATED_AT") }}</th>
                      <td v-if="customerData.created_at">
                        {{ customerData.created_at | formatDateTime }}
                      </td>
                      <td v-else>-</td>
                    </tr>
                    <tr>
                      <th>{{ $t("message.UPDATED_AT") }}</th>
                      <td v-if="customerData.updated_at">
                        {{ customerData.updated_at | formatDateTime }}
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
  name: "viewCustomerModal",
  props: ["customerData"],
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