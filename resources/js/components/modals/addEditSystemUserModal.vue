<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditSystemUserModal"
      role="dialog"
      aria-labelledby="addEditSystemUserModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditSystemUserModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_SYSTEM_USER") }}
            </h5>
            <h5 class="modal-title" id="addEditSystemUserModalLabel" v-else>
              {{ $t("message.EDIT_SYSTEM_USER") }}
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
          <form @submit.prevent="editMode ? editSystemUser() : addSystemUser()">
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">
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
              <!-- Role Dropdown -->
              <div class="form-group">
                <label>{{ $t("message.ROLE") }}</label>
                <b-form-select
                  v-model="form.role"
                  :options="roles"
                  text-field="name"
                  value-field="id"
                ></b-form-select>
                <div
                  class="error-message"
                  v-if="form.errors.has('role')"
                  v-html="form.errors.get('role')"
                />
              </div>
              <!-- Mobile Number -->
              <div class="form-group">
                <label
                  >{{ $t("message.MOBILE_NUMBER")
                  }}<span class="required-star">*</span></label
                >
                <input
                  v-model="form.mobile_number"
                  v-bind:placeholder="$t('message.MOBILE_NUMBER')"
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
              <!-- Telephone -->
              <div class="form-group">
                <label
                  >{{ $t("message.TELEPHONE")
                  }}<span class="required-star"></span></label
                >
                <input
                  v-model="form.telephone"
                  v-bind:placeholder="$t('message.TELEPHONE')"
                  type="text"
                  name="telephone"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('telephone') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('telephone')"
                  v-html="form.errors.get('telephone')"
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
                @click.prevent="addSystemUser"
                v-if="editMode === false"
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.CREATE_SYSTEM_USER") }}
              </button>
              <button
                @click.prevent="editSystemUser"
                v-else
                type="submit"
                class="btn btn-primary"
              >
                {{ $t("message.EDIT_SYSTEM_USER") }}
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
  name: "addEditSystemUserModal",
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      cities: [],
      editMode: "",
      fileError: 0,
      roles: [],
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        email: "",
        username: "",
        password:"",
        photo:"",
        telephone:"",
        mobile_number:"",
        address:"",
        company_name:"",
        city_id:"",
        role: "",
      }),
    };
  },
  methods: {
    addSystemUser() {
      if (this.is("Super Admin") || this.can("create_system_user")) {
        if (!this.fileError) {
          this.$Progress.start();
          this.form
            .post("api/systemUsers")
            .then(() => {
              Fire.$emit("reloadSystemSystemUsers");
              $("#addEditSystemUserModal").modal("hide");
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
    editSystemUser() {
      if (this.is("Super Admin") || this.can("edit_system_user")) {
        if (!this.fileError) {
          this.$Progress.start();
          this.form
            .put("api/systemUsers/" + this.form.id)
            .then(() => {
              Fire.$emit("reloadSystemSystemUsers");
              $("#addEditSystemUserModal").modal("hide");
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
    $("#addEditSystemUserModal").on("show.bs.modal", function (e) {
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
        form.role = e.relatedTarget.roles[0].id;
      } else {
        form.reset();
        that.editMode = false;
      }
      that.$Progress.start();
      axios
        .get("api/getAllRoles")
        .then((response) => {
          that.roles = response.data;
          axios
          .get("api/getAllCities")
          .then((response) => {
          that.cities = response.data;
        })
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