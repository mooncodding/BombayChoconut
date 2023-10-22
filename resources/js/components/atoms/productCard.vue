<template>
  <a href="#!" class="menu-item-link">
    <div class="card menu-item"
    :style="isSelected ? 'border: solid 1px #00117E; height: 100% !important' :'height: 100% !important'"
    >
      <img
        v-bind:src="'images/product-images/' + product.photo"
        class="card-img-top product-item-image"
        v-bind:alt="product.name"
        v-if="product.photo"
      />
      <img
        class="card-img-top product-item-image"
        v-bind:alt="product.name"
        v-else
        :src="'images/product-images/11663592807.png'"
      />
      <div class="card-body">
        <div class="product-item-name mx-auto">
          <span>
            {{ product.name && product.name.length > 10 ? `${product.name.slice(0, 10)}...` : product.name  }}
          </span>
        </div>
      </div>
    </div>
    <v-btn class="ma-2" icon style="position: absolute; top: 10px; right: 15px;" v-if="isSelected">
      <img
        v-bind:src="'images/check-icon.png'"
        class="card-img-top product-item-image"
        style="width: 25px;border-radius: 10px; !important"
      />
    </v-btn>
  </a>
</template>

<script>
export default {
  props: ["product", "index", "isSelected"],
};
</script>
