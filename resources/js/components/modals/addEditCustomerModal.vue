<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditCustomerModal"
      role="dialog"
      aria-labelledby="addEditCustomerModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditCustomerModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_CUSTOMER") }}
            </h5>
            <h5 class="modal-title" id="addEditCustomerModalLabel" v-else>
              {{ $t("message.EDIT_CUSTOMER") }}
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
          <form @submit.prevent="editMode ? editCustomer() : addCustomer()">
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">
              <!--Name -->
              <div class="form-group">
                <label
                  >{{ $t("message.NAME")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.name"
                  v-bind:placeholder="$t('message.NAME')"
                  type="text"
                  name="name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('name')"
                  v-html="form.errors.get('name')"
                />
              </div>
              <!-- End -->
              <!-- Email -->
              <div class="form-group">
                <label
                  >{{ $t("message.EMAIL")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.email"
                  v-bind:placeholder="$t('message.EMAIL')"
                  type="email"
                  name="email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('email')"
                  v-html="form.errors.get('email')"
                />
              </div>
              <!-- End -->
              <!-- User Name -->
              <div class="form-group">
                <label
                  >{{ $t("message.USER_NAME")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.username"
                  v-bind:placeholder="$t('message.USER_NAME')"
                  type="text"
                  name="username"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('username') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('username')"
                  v-html="form.errors.get('username')"
                />
              </div>
              <!-- End -->
              <!-- Company Name -->
              <div class="form-group">
                <label
                  >{{ $t("message.COMPANY_NAME")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.company_name"
                  v-bind:placeholder="$t('message.COMPANY_NAME')"
                  type="text"
                  name="company_name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('company_name') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('company_name')"
                  v-html="form.errors.get('company_name')"
                />
              </div>
              <!-- End -->
              <!-- Password -->
              <div class="form-group">
                <label
                  >{{ $t("message.PASSWORD")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.password"
                  v-bind:placeholder="$t('message.PASSWORD')"
                  type="password"
                  name="password"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('password')"
                  v-html="form.errors.get('password')"
                />
              </div>
              <!-- End -->
              <!-- Mobile Number -->
              <div class="form-group">
                <label
                  >{{ $t("message.MOBILE_NUMBER_1")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.mobile_number"
                  v-bind:placeholder="$t('message.MOBILE_NUMBER_1')"
                  type="text"
                  name="mobile_number"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('mobile_number') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('mobile_number')"
                  v-html="form.errors.get('mobile_number')"
                />
              </div>
              <!-- End -->
              <!-- Mobile Number 2 -->
              <div class="form-group">
                <label
                  >{{ $t("message.MOBILE_NUMBER_2")
                  }}<span class="required-star"></span></label
                >
                <input
                  v-model="form.mobile_number_2"
                  v-bind:placeholder="$t('message.MOBILE_NUMBER_2')"
                  type="text"
                  name="mobile_number_2"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('mobile_number_2') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('mobile_number_2')"
                  v-html="form.errors.get('mobile_number_2')"
                />
              </div>
              <!-- End -->
              <!-- Mobile Number -->
              <div class="form-group">
                <label
                  >{{ $t("message.MOBILE_NUMBER_3")
                  }}<span class="required-star"></span></label
                >
                <input
                  v-model="form.mobile_number_3"
                  v-bind:placeholder="$t('message.MOBILE_NUMBER_3')"
                  type="text"
                  name="mobile_number_3"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('mobile_number_3') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('mobile_number_3')"
                  v-html="form.errors.get('mobile_number_3')"
                />
              </div>
              <!-- End -->
              <!-- Id Card Number -->
              <div class="form-group">
                <label
                  >{{ $t("message.ID_CARD_NUMBER")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.id_card_number"
                  v-bind:placeholder="$t('message.ID_CARD_NUMBER')"
                  type="text"
                  name="id_card_number"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('id_card_number') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('id_card_number')"
                  v-html="form.errors.get('id_card_number')"
                />
              </div>
              <!-- End -->
              <!-- City Dropdown -->
              <div class="form-group">
                <label>{{$t('message.CITY')}}<span class="required-star">*</span></label>
                <v-select v-model="form.city_id" :options="cities"  label="name" :reduce="city => city.id" :selectOnTab="true" 
                  :key="form.city_id"
                  :class="{ 'is-invalid': form.errors.has('city_id') }"
                  />
                <div
                  class="error-message"
                  v-if="form.errors.has('city_id')"
                  v-html="form.errors.get('city_id')"
                />
              </div>
              <!-- End -->
              <!-- Address -->
              <div class="form-group">
                  <label>{{ $t("message.ADDRESS") }}<span class="required-star">*</span></label>
                  <textarea
                    v-model="form.address"
                    v-bind:placeholder="$t('message.ADDRESS')"
                    type="text"
                    name="address"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('address') }"
                  ></textarea>
                  <div
                    class="error-message"
                    v-if="form.errors.has('address')"
                    v-html="form.errors.get('address')"
                  />
              </div>
              <!-- End -->
             
              <!-- Nif -->
              <div class="form-group">
                <label
                  >{{ $t("message.NIF")
                  }}<span class="required-star"></span></label
                >
                <input
                  v-model="form.nif"
                  v-bind:placeholder="$t('message.NIF')"
                  type="text"
                  name="nif"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('nif') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('nif')"
                  v-html="form.errors.get('nif')"
                />
              </div>
              <!-- End -->
              <!-- Stat -->
              <div class="form-group">
                <label
                  >{{ $t("message.STAT")
                  }}<span class="required-star"></span></label
                >
                <input
                  v-model="form.stat"
                  v-bind:placeholder="$t('message.STAT')"
                  type="text"
                  name="stat"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('stat') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('stat')"
                  v-html="form.errors.get('stat')"
                />
              </div>
              <!-- End -->
              <!-- Cif -->
              <div class="form-group">
                <label
                  >{{ $t("message.CIF")
                  }}<span class="required-star"></span></label
                >
                <input
                  v-model="form.cif"
                  v-bind:placeholder="$t('message.CIF')"
                  type="text"
                  name="cif"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('cif') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('cif')"
                  v-html="form.errors.get('cif')"
                />
              </div>
              <!-- End -->
              <!-- Rcs -->
              <div class="form-group">
                <label
                  >{{ $t("message.RCS")
                  }}<span class="required-star"></span></label
                >
                <input
                  v-model="form.rcs"
                  v-bind:placeholder="$t('message.RCS')"
                  type="text"
                  name="rcs"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('rcs') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('rcs')"
                  v-html="form.errors.get('rcs')"
                />
              </div>
              <!-- End -->
              <!-- Is Visible Price -->
              <div class="form-group">
                <label>{{ $t("message.IS_VISIBLE_PRICE") }}</label>
                <input
                  type="checkbox"
                  true-value="1"
                  false-value="0"
                  v-model="form.is_visible_price"
                  name="is_visible_price"
                  class="form-control"
                />
              </div>           
              <!-- End -->
              <!-- Is Disabled -->
              <div class="form-group">
                <label>{{ $t("message.IS_DISABLED") }}</label>
                <input
                  type="checkbox"
                  true-value="1"
                  false-value="0"
                  v-model="form.is_disabled"
                  name="is_disabled"
                  class="form-control"
                />
              </div>           
              <!-- End -->
              <div class="form-group">
                <label>{{ $t("message.PHOTO") }}</label>
                <span v-if="editMode && form.photo!=null"
                  ><img
                    v-bind:src="'images/users/' + form.photo"
                    width="15%"
                    alt="Banner not found"
                /></span>
                <input
                  @change="addPhoto"
                  type="file"
                  name="photo"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('photo') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('photo')"
                  v-html="form.errors.get('photo')"
                />
              </div>
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addCustomer"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_CUSTOMER") }}
              </button>
              <button
                @click.prevent="editCustomer"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_CUSTOMER") }}
              </button>

              <button type="button" class="btn btn-danger" data-dismiss="modal">
                {{ $t("message.CLOSE") }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "addEditCustomerModal",
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      editMode: "",
      fileError: 0,
      cities: [],
      // Create a new form instance
      form: new form({
        id: "",
        id_card_number: "",
        name: "",
        email: "",
        username: "",
        password:"",
        photo:"",
        mobile_number:"",
        mobile_number_2:"",
        mobile_number_3:"",
        address:"",
        company_name:"",
        nif:"",
        stat:"",
        cif:"",
        rcs:"",
        is_disabled:0,
        is_visible_price:1,
        city_id:"",
        photo: "",
      }),
    };
  },
  methods: {
    addCustomer() {
      if (this.is("Super Admin") || this.can("create_customer")) {
        if (!this.fileError) {
          this.$Progress.start();
          this.form
            .post("api/customers")
            .then(() => {
              Fire.$emit("reloadCustomers");
              $("#addEditCustomerModal").modal("hide");
              toast.fire({
                icon: "success",
                title: this.$t("message.CREATED_MESSAGE_SUCCESS"),
              });
              this.$Progress.finish();
            })
            .catch(() => {
              this.$Progress.fail();
              toast.fire({
                icon: "warning",
                title: this.$t("message.CREATED_MESSAGE_ERROR"),
              });
            });
        } else {
          this.$Progress.fail();
          toast.fire({
            icon: "warning",
            title: this.$t("message.FLIE_SIZE_ERROR"),
          });
        }
      } else {
        swal.fire({
          text: this.$t("message.UNAUTHORIZED"),
          icon: "warning",
        });
      }
    },
    editCustomer() {
      if (this.is("Super Admin") || this.can("edit_customer")) {
        if (!this.fileError) {
          this.$Progress.start();
          this.form
            .put("api/customers/" + this.form.id)
            .then(() => {
              Fire.$emit("reloadCustomers");
              $("#addEditCustomerModal").modal("hide");
              toast.fire({
                icon: "success",
                title: this.$t("message.EDIT_MESSAGE_SUCCESS"),
              });
              this.$Progress.finish();
            })
            .catch(() => {
              this.$Progress.fail();
              toast.fire({
                icon: "warning",
                title: this.$t("message.EDIT_MESSAGE_ERROR"),
              });
            });
        } else {
          this.$Progress.fail();
          toast.fire({
            icon: "warning",
            title: this.$t("message.FLIE_SIZE_ERROR"),
          });
        }
      } else {
        swal.fire({
          text: this.$t("message.UNAUTHORIZED"),
          icon: "warning",
        });
      }
    },
    addPhoto(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      reader.onloadend = () => {
        this.form.photo = reader.result;
      };
      reader.readAsDataURL(file);
    },
  },
  mounted() {
    var form = this.form;
    var that = this;
    $("#addEditCustomerModal").on("show.bs.modal", function (e) {
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
      } else {
        form.reset();
        that.editMode = false;
      }
      that.$Progress.start();
      axios
        .get("api/getAllCities")
        .then((response) => {
          that.cities = response.data;
          that.$Progress.finish();
        })
        .catch(() => {
          that.$Progress.fail();
          toast.fire({
            icon: "error",
            title: that.$t("message.SOMETHING_WENT_WRONG"),
          });
        });
    });
  },
};
</script>