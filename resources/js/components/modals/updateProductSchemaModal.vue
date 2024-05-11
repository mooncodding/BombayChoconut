<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="updateProductSchemaModal"
      product="dialog"
      aria-labelledby="updateProductSchemaModalLabel"
      aria-hidden="true" data-keyboard="false" data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered modalLarge" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateProductSchemaModalLabel">
              Update Schema
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
          <form @submit.prevent="addProduct()">
            <input type="hidden" name="_token" :value="csrf" />
            <div class="modal-body">
              <!-- Types -->
              <div class="form-group" >
                <label>Schema Type</label>
                <v-select v-model="form.type" :options="schemaTypes"  label="name" :reduce="schemaType => schemaType.name" :selectOnTab="true" 
                  :key="form.type"
                  :class="{ 'is-invalid': form.errors.has('type') }"
                  />
                <div
                  class="error-message"
                  v-if="form.errors.has('type')"
                  v-html="form.errors.get('type')"
                />
              </div>
              <!-- End -->
              <!-- Name -->
              <div v-if="form.type === 'Organisation Schema'">
              <div class="form-group">
                <label
                  >URL<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'URL'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Name<span class="required-star">*</span></label
                >
                <input
                  v-model="form.sd"
                  v-bind:placeholder="'Name'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Logo<span class="required-star">*</span></label
                >
                <input
                  v-model="form.sdf"
                  v-bind:placeholder="'Logo'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Telephone<span class="required-star">*</span></label
                >
                <input
                  v-model="form.ssss"
                  v-bind:placeholder="'Telephone'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Content Type<span class="required-star">*</span></label
                >
                <input
                  v-model="form.tsdfsdfitle"
                  v-bind:placeholder="'Content Type'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address<span class="required-star">*</span></label
                >
                <input
                  v-model="form.tisdfstle"
                  v-bind:placeholder="'Address'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Country<span class="required-star">*</span></label
                >
                <input
                  v-model="form.tisdfsftle"
                  v-bind:placeholder="'Address Country'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Postal Code<span class="required-star">*</span></label
                >
                <input
                  v-model="form.tisdftle"
                  v-bind:placeholder="'Postal Code'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Region<span class="required-star">*</span></label
                >
                <input
                  v-model="form.titsdfsdle"
                  v-bind:placeholder="'Address Region'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Loyalty<span class="required-star">*</span></label
                >
                <input
                  v-model="form.titrrsle"
                  v-bind:placeholder="'Address Loyalty'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>

              </div>
              <div v-if="form.type === 'Sitelink Search Box Schema'">
              <div class="form-group">
                <label
                  >URL<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'URL'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Name<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Name'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Logo<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Logo'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Telephone<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Telephone'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Content Type<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Content Type'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Country<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Country'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Postal Code<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Postal Code'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Region<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Region'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Loyalty<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Loyalty'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>

              </div>
              <div v-if="form.type === 'Blog & Article Schema'">
              <div class="form-group">
                <label
                  >URL<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'URL'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Name<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Name'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Logo<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Logo'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Telephone<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Telephone'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Content Type<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Content Type'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Country<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Country'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Postal Code<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Postal Code'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Region<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Region'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Loyalty<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Loyalty'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>

              </div>
              <div v-if="form.type === 'Review Rating Schema'">
              <div class="form-group">
                <label
                  >URL<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'URL'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Name<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Name'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Logo<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Logo'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Telephone<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Telephone'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Content Type<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Content Type'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Country<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Country'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Postal Code<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Postal Code'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Region<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Region'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Loyalty<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Loyalty'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>

              </div>
              <div v-if="form.type === 'Item List Schema'">
              <div class="form-group">
                <label
                  >URL<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'URL'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Name<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Name'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Logo<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Logo'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Telephone<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Telephone'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Content Type<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Content Type'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Country<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Country'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Postal Code<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Postal Code'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Region<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Region'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Loyalty<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Loyalty'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>

              </div>
              <div v-if="form.type === 'Breadcrumb Schema'">
              <div class="form-group">
                <label
                  >URL<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'URL'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Name<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Name'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Logo<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Logo'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Telephone<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Telephone'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Content Type<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Content Type'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Country<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Country'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Postal Code<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Postal Code'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Region<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Region'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>
              <div class="form-group">
                <label
                  >Address Loyalty<span class="required-star">*</span></label
                >
                <input
                  v-model="form.title"
                  v-bind:placeholder="'Address Loyalty'"
                  type="text"
                  name="title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('title') }"
                />
                <div
                  class="error-message"
                  v-if="form.errors.has('title')"
                  v-html="form.errors.get('title')"
                />
              </div>

              </div>
              <!-- End -->
            </div>
            <div class="modal-footer">
              <button
                @click.prevent="addProduct"
                type="submit"
                class="btn btn-primary"
              >
                Update
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
import Vue from 'vue';
import VueUploadMultipleImage from 'vue-upload-multiple-image';
import { VueEditor } from "vue2-editor";
export default {
  name: "updateProductSchemaModal",
  props: ["productData"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      schemaTypes:[
        {
          id: 1,
          name:"Organisation Schema"
        },
        {
          id: 2,
          name:"Sitelink Search Box Schema"
        },
        {
          id: 3,
          name:"Breadcrumb Schema"
        },
        {
          id: 4,
          name:"Item List Schema"
        },
        {
          id: 5,
          name:"Review Rating Schema"
        },
        {
          id: 6,
          name:"Blog & Article Schema"
        }
      ],
      editMode: "",
      // Create a new form instance
      form: new form({
        id: "",
        type:"Organisation Schema",
      }),
    };
  },
  components: {
    Vue,
    VueUploadMultipleImage,
    VueEditor
  },
  methods: {
    addProduct() {
      if (this.is("Super Admin") || this.can("create_product")) {
        this.$Progress.start();
        $("#updateProductSchemaModal").modal("hide");
        this.$Progress.finish();
        this.form
          // .post("api/products")
          .then(() => {
            Fire.$emit("reloadProducts");
            $("#updateProductSchemaModal").modal("hide");
            toast.fire({
              icon: "success",
              title: this.$t("message.CREATED_MESSAGE_SUCCESS"),
            });
            this.$Progress.finish();
          })
          // .catch((error) => {
          //   this.$Progress.fail();
          //   toast.fire({
          //     icon: "warning",
          //     title: this.$t("message.CREATED_MESSAGE_ERROR"),
          //   });
          // });
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
    $("#updateProductSchemaModal").on("show.bs.modal", function (e) {
      if (e.relatedTarget) {
        that.editMode = true;
        form.fill(e.relatedTarget);
        form.photo = e.relatedTarget.photo;
        const productVariants = [];
        Array.from(e.relatedTarget.product_variants).forEach(item => {
          productVariants.push(item);
        })
        form.product_variants = productVariants; 
        // Manually Fill Images
        form.image_copy = [];
        const image = [];
         Array.from(e.relatedTarget.product_images).forEach(item => {
            image.push(item);
        })
        that.image = image

        // work for child and parent category
        // if(e.relatedTarget.product_category.parent_category)
        // {
        //   that.getChildCategories(e.relatedTarget.product_category.parent_id);
        //   that.form.child_category_id = e.relatedTarget.product_category_id;
        //   that.form.product_category_id = e.relatedTarget.product_category.parent_id;
        // }
        // else
        // {
        //   that.getChildCategories(e.relatedTarget.product_category_id);
        //   that.form.child_category_id = '';
        //   that.childCategories = [];
        // }
      } else {
        form.reset();
        that.editMode = false;
      }
      //get all parent categories
      axios.get('/api/getAllParentCategories')
        .then((response)=>{
            that.parentCategories = response.data;
            //get all product flavours
            axios.get('/api/getProductFlavours')
              .then((response)=>{
                  that.productFlavours = response.data;
                  // get all brands
                   axios.get('/api/getBrands')
                  .then((response)=>{
                      that.brands = response.data;
                  })
              })
        }).catch(() => {
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