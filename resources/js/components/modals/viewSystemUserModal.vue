<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewSystemUserModal"
      role="dialog"
      aria-labelledby="viewSystemUser"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewSystemUserModal">
              {{ $t("message.VIEW_SYSTEM_USER") }}:
              {{ systemUserData.name }}
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
                  {{ $t("message.VIEW_SYSTEM_USER") }}:
                  {{ systemUserData.name }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>{{ $t("message.NAME") }}</th>
                        <td v-if="systemUserData.name">{{systemUserData.name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.EMAIL") }}</th>
                        <td v-if="systemUserData.email">{{systemUserData.email}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.USER_NAME") }}</th>
                        <td v-if="systemUserData.username">{{systemUserData.username}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.COMPANY_NAME") }}</th>
                        <td v-if="systemUserData.company_name">{{systemUserData.company_name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.CITY") }}</th>
                        <td v-if="systemUserData.city">{{systemUserData.city.name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.TELEPHONE") }}</th>
                        <td v-if="systemUserData.telephone">{{systemUserData.telephone}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.MOBILE_NUMBER") }}</th>
                        <td v-if="systemUserData.mobile_number">{{systemUserData.mobile_number}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                        <th>{{ $t("message.ADDRESS") }}</th>
                        <td v-if="systemUserData.address">{{systemUserData.address}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr>
                    <th>{{ $t("message.PHOTO") }}</th>
                    <td v-if="systemUserData.photo !=null">
                      <span>
                        &nbsp;
                        <img
                          v-bind:src="
                            'images/users/' + systemUserData.photo
                          "
                          class="mr-3"
                          width="10%"
                          alt="Banner not found"
                        />
                        <a
                          download
                          :href="
                            'images/users/' + systemUserData.photo
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
                        <td v-if="systemUserData.created_by">{{systemUserData.created_by.name}}</td>
                        <td v-else>-</td>
                    </tr>
                    <tr v-if="systemUserData.updated_by">
                        <th>{{ $t("message.UPDATED_BY") }}</th>
                        <td>{{systemUserData.updated_by.name}}</td>
                    </tr>
                    <tr>
                      <th>{{ $t("message.CREATED_AT") }}</th>
                      <td v-if="systemUserData.created_at">
                        {{ systemUserData.created_at | formatDateTime }}
                      </td>
                      <td v-else>-</td>
                    </tr>
                    <tr>
                      <th>{{ $t("message.UPDATED_AT") }}</th>
                      <td v-if="systemUserData.updated_at">
                        {{ systemUserData.updated_at | formatDateTime }}
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
  name: "viewSystemUserModal",
  props: ["systemUserData"],
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