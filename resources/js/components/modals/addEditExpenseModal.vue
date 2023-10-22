<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addEditExpenseModal"
      expense="dialog"
      aria-labelledby="addEditExpenseModalLabel"
      aria-hidden="true"
      data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered modalLarge" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addEditExpenseModalLabel"
              v-if="editMode === false"
            >
              {{ $t("message.CREATE_EXPENSE") }}
            </h5>
            <h5 class="modal-title" id="addEditExpenseModalLabel" v-else>
              {{ $t("message.EDIT_EXPENSE") }}
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
          <form @submit.prevent="editMode ? editExpense() : addExpense()">
              <div class="modal-body">
                <div class="form-group">
                  <label>{{ $t("message.NAME") }}<span class="required-star">*</span></label>
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

                <!-- Payment Method -->
                <div class="form-group">
                  <label
                    >{{ $t("message.PAYMENT_METHOD")
                    }}<span class="required-star"> *</span></label
                  >
                  <v-select
                    v-model="form.payment_method_id"
                    :options="paymentMethods"
                    label="name"
                    :reduce="(paymentMethod) => paymentMethod.id"
                    :selectOnTab="true"
                    :class="{ 'is-invalid': form.errors.has('payment_method_id') }"
                  />
                  <div
                    class="error-message"
                    v-if="form.errors.has('payment_method_id')"
                    v-html="form.errors.get('payment_method_id')"
                  />
                </div>
                <div class="form-group">
                  <label>{{ $t("message.DATE") }}<span> *</span></label>
                  <datetime
                    v-model="form.date"
                    v-bind:placeholder="$t('message.DATE')"
                    type="date"
                    name="date"
                   :input-class="{ 'is-invalid form-control bgwhite': form.errors.has('date'),
                  'form-control bgwhite': !form.errors.has('date') }"
                  ></datetime>
                  <div
                    class="error-message"
                    v-if="form.errors.has('date')"
                    v-html="form.errors.get('date')"
                  />
                </div>

                <div class="form-group">
                  <label
                    >{{ $t("message.AMOUNT") }}<span class="required-star"></span
                  ></label>
                  <input
                    v-model="form.amount"
                    v-bind:placeholder="$t('message.AMOUNT')"
                    type="text"
                    name="amount"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('amount') }"
                  />
                  <div
                    class="error-message"
                    v-if="form.errors.has('amount')"
                    v-html="form.errors.get('amount')"
                  />
                </div>

                <div class="form-group">
                  <label>{{ $t("message.NOTE") }}</label>
                  <textarea
                    v-model="form.notes"
                    v-bind:placeholder="$t('message.NOTE')"
                    type="text"
                    name="notes"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('notes') }"
                  ></textarea>
                  <div
                    class="error-message"
                    v-if="form.errors.has('note')"
                    v-html="form.errors.get('note')"
                  />
                </div>
                <!-- end -->

                <div class="modal-footer">
                  <button
                    @click.prevent="addExpense"
                    v-if="editMode === false"
                    type="submit"
                    class="btn btn-primary"
                  >
                    {{ $t("message.CREATE_EXPENSE") }}
                  </button>
                  <button
                    @click.prevent="editExpense"
                    v-else
                    type="submit"
                    class="btn btn-primary"
                  >
                    {{ $t("message.EDIT_EXPENSE") }}
                  </button>

                  <button type="button" class="btn btn-danger" data-dismiss="modal">
                    {{ $t("message.CLOSE") }}
                  </button>

                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import moment from 'moment';
export default {
  name: "addEditExpenseModal",
  props: ["expenseData"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      expenses: [],
      editMode: "",
      paymentMethods: [],
      // Create a new form instance
      form: new form({
        id: "",
        name: "",
        payment_method_id: "",
        date: new Date().toISOString(),
        amount: "",
        notes: "",
      }),
    };
  },
  methods: {
    addExpense() {
      if (this.is("Super Admin") || (this.can("create_expense"))) {
        this.$Progress.start();
        this.form.date = moment.utc(this.form.date).local().format();
        this.form
          .post("api/expenses")
          .then(() => {
            Fire.$emit("reloadExpenses");
            $("#addEditExpenseModal").modal("hide");
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
        swal.fire({
          text: this.$t("message.UNAUTHORIZED"),
          icon: "warning",
        });
      }
    },
    editExpense() {
      if (this.is("Super Admin") || (this.can("edit_expense"))) {
        this.$Progress.start();
        this.form.date = moment(this.form.date).toISOString(true);
        this.form
          .put("api/expenses/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadExpenses");
            $("#addEditExpenseModal").modal("hide");
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
        swal.fire({
          text: this.$t("message.UNAUTHORIZED"),
          icon: "warning",
        });
      }
    },
  },
  mounted() {

    var form = this.form;
    var that = this;
    $("#addEditExpenseModal").on("show.bs.modal", function (e) {
      
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
        const date = new Date(e.relatedTarget.date);
        form.date = date.toISOString();
      } else {
        form.reset();
        that.editMode = false;
      }

      if(that.is('Super Admin') || that.can('create_expense') || that.can('edit_expense'))
      {
          axios.get("api/getAllPaymentMethods").then((response) => {
            that.paymentMethods = response.data;
          });
      }

    });
  },
};
</script>