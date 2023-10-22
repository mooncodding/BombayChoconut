<template>
  <v-row
    class="fill-height px-5 py-4 align-items-center justify-content-center"
    align="center"
    justify="center"
  >
    <img
      v-if="index != 0"
      v-bind:src="(type == 'categories' ?'images/product-categories/' : 'images/brands/') + image"
      width="20"
      alt=""
      class="slider-image"
    />
    <h6
      :class=" 
        active
          ? 'text-center text-white'
          : 'text-center text-dark'
      "
      class="slider-name"
    >
      {{ name }}
    </h6>
  </v-row>
</template>

<script>
export default {
  props: ["name", "image", "type", "index", "active"],
};
</script>