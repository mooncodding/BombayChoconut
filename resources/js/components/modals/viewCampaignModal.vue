<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="viewCampaignModal"
      role="dialog"
      aria-labelledby="viewCampaign"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modalLarge"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewCampaignModal">
              {{ $t("message.VIEW_CAMPAIGN") }}:
              {{ campaignData.name }}
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
                  {{ $t("message.VIEW_CAMPAIGN") }}:
                  {{ campaignData.name }}
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>{{ $t("message.NAME") }}</th>
                    <td>{{ campaignData.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.START_DATETIME") }}</th>
                    <td>{{ campaignData.start_datetime | formatDateTime }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.END_DATETIME") }}</th>
                    <td>{{ campaignData.end_datetime | formatDateTime }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.APPLICABLE_ON") }}</th>
                    <td>
                      {{
                        campaignData.applicable_on == "products"
                          ? $t("message.PRODUCTS")
                          : campaignData.applicable_on == "categories"
                          ? $t("message.CATEGORIES")
                          : campaignData.applicable_on == "storewide"
                          ? $t("message.STOREWIDE")
                          : "-"
                      }}
                    </td>
                  </tr>
                  <tr v-if="campaignData.applicable_on == 'storewide'">
                    <th>{{ $t("message.DISCOUNT_TYPE") }}</th>
                    <td>
                      {{
                        campaignData.discount_type == "flat"
                          ? $t("message.FLAT")
                          : campaignData.discount_type == "percentage"
                          ? $t("message.PERCENTAGE")
                          : "-"
                      }}
                    </td>
                  </tr>
                  <tr v-if="campaignData.applicable_on == 'storewide'">
                    <th>{{ $t("message.DISCOUNT_VALUE") }}</th>
                    <td
                      v-if="
                        campaignData.discount_type &&
                          campaignData.discount_type == 'percentage'
                      "
                    >
                      {{ `${campaignData.discount_value}%` }}
                    </td>

                    <td
                      v-if="
                        campaignData.discount_type &&
                          campaignData.discount_type == 'flat'
                      "
                    >
                      {{
                        campaignData.discount_value
                          | currency("Ar", 2, {
                            thousandsSeparator: ".",
                            decimalSeparator: ",",
                            symbolOnLeft: false,
                            spaceBetweenAmountAndSymbol: true,
                          })
                      }}
                    </td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.NOTES") }}</th>
                    <td>{{ campaignData.notes ? campaignData.notes : "-" }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_BY") }}</th>
                    <td v-if="campaignData.created_by">
                      {{ campaignData.created_by.name }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="campaignData.updated_by">
                    <th>{{ $t("message.UPDATED_BY") }}</th>
                    <td>{{ campaignData.updated_by.name }}</td>
                  </tr>
                  <tr>
                    <th>{{ $t("message.CREATED_AT") }}</th>
                    <td v-if="campaignData.created_at">
                      {{ campaignData.created_at | formatDateTime }}
                    </td>
                    <td v-else>-</td>
                  </tr>
                  <tr v-if="campaignData.updated_at">
                    <th>{{ $t("message.UPDATED_AT") }}</th>
                    <td>{{ campaignData.updated_at | formatDateTime }}</td>
                  </tr>
                </tbody>
              </table>

              <!-- Category Discount Details -->
              <div
                class="container-fluid"
                v-if="
                  campaignData.category_discounts &&
                    campaignData.category_discounts.length > 0
                "
              >
                <div class="row">
                  <div class="col-12 px-0">
                    <template>
                      <v-expansion-panels>
                        <v-expansion-panel>
                          <v-expansion-panel-header>
                            <h4>
                              {{ $t("message.CATEGORY_DISCOUNT_DETAILS") }}
                            </h4>
                          </v-expansion-panel-header>
                          <v-expansion-panel-content>
                            <table class="table table-bordered">
                              <tr>
                                <th>
                                  <label>{{ $t("message.CATEGORY") }}</label>
                                </th>
                                <th>
                                  <label>{{
                                    $t("message.DISCOUNT_TYPE")
                                  }}</label>
                                </th>
                                <th>
                                  <label>{{
                                    $t("message.DISCOUNT_VALUE")
                                  }}</label>
                                </th>
                              </tr>
                              <tr
                                v-for="(category_discount,
                                index) in campaignData.category_discounts"
                                :key="index"
                              >
                                <td>
                                  {{
                                    category_discount.category
                                      ? category_discount.category.name
                                      : "-"
                                  }}
                                </td>
                                <td>
                                  {{
                                    category_discount.type == "flat"
                                      ? $t("message.FLAT")
                                      : category_discount.type == "percentage"
                                      ? $t("message.PERCENTAGE")
                                      : "-"
                                  }}
                                </td>
                                <td
                                  v-if="
                                    category_discount.discount_percentage &&
                                      category_discount.discount_percentage > 0
                                  "
                                >
                                  {{ category_discount.discount_percentage+'%' }}
                                </td>
                                <td v-else>
                                  {{
                                    category_discount.discount_price
                                      | currency("Ar", 2, {
                                        thousandsSeparator: ".",
                                        decimalSeparator: ",",
                                        symbolOnLeft: false,
                                        spaceBetweenAmountAndSymbol: true,
                                      })
                                  }}
                                </td>
                              </tr>
                            </table>
                          </v-expansion-panel-content>
                        </v-expansion-panel>
                      </v-expansion-panels>
                    </template>
                  </div>
                </div>
              </div>

              <!-- Product Discount Details -->
              <div
                class="container-fluid"
                v-if="
                  campaignData.product_discounts &&
                    campaignData.product_discounts.length > 0
                "
              >
                <div class="row">
                  <div class="col-12 px-0">
                    <template>
                      <v-expansion-panels>
                        <v-expansion-panel>
                          <v-expansion-panel-header>
                            <h4>
                              {{ $t("message.PRODUCT_DISCOUNT_DETAILS") }}
                            </h4>
                          </v-expansion-panel-header>
                          <v-expansion-panel-content>
                            <table class="table table-bordered">
                              <tr>
                                <th>
                                  <label>{{ $t("message.PRODUCT") }}</label>
                                </th>
                                <th>
                                  <label>{{
                                    $t("message.BEFORE_PRICE")
                                  }}</label>
                                </th>
                                <th>
                                  <label>{{
                                    $t("message.DISCOUNT_TYPE")
                                  }}</label>
                                </th>
                                <th>
                                  <label>{{
                                    $t("message.PERCENTAGE")
                                  }}</label>
                                </th>
                                <th>
                                  <label>{{ $t("message.AFTER_PRICE") }}</label>
                                </th>
                              </tr>
                              <tr
                                v-for="(product_discount,
                                index) in campaignData.product_discounts"
                                :key="index"
                              >
                                <td>
                                  {{
                                    product_discount.product
                                      ? product_discount.product.name
                                      : "-"
                                  }}
                                </td>
                                <td>
                                  {{
                                    (product_discount.before_price
                                      ? product_discount.before_price
                                      : 0)
                                      | currency("Ar", 2, {
                                        thousandsSeparator: ".",
                                        decimalSeparator: ",",
                                        symbolOnLeft: false,
                                        spaceBetweenAmountAndSymbol: true,
                                      })
                                  }}
                                </td>
                                <td>
                                  {{
                                    product_discount.type == "flat"
                                      ? $t("message.FLAT")
                                      : product_discount.type == "percentage"
                                      ? $t("message.PERCENTAGE")
                                      : "-"
                                  }}
                                </td>
                                <td>
                                  {{
                                    product_discount.discount_percentage
                                      ? `${product_discount.discount_percentage}%`
                                      : 0
                                  }}
                                </td>
                                <td>
                                  {{
                                    (product_discount.after_price
                                      ? product_discount.after_price
                                      : 0)
                                      | currency("Ar", 2, {
                                        thousandsSeparator: ".",
                                        decimalSeparator: ",",
                                        symbolOnLeft: false,
                                        spaceBetweenAmountAndSymbol: true,
                                      })
                                  }}
                                </td>
                              </tr>
                            </table>
                          </v-expansion-panel-content>
                        </v-expansion-panel>
                      </v-expansion-panels>
                    </template>
                  </div>
                </div>
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
  </div>
</template>
<script>
import printHeader from "../includes/printHeader.vue";
export default {
  name: "viewCampaignModal",
  props: ["campaignData"],
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
