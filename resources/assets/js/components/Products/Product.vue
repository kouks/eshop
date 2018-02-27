<template>
  <div class="column is-4">
    <a :href="`/products/${product.slug}`" class="product" :style="{ backgroundImage: `url('${product.image}')` }">
      <div class="product-head">
        <h3 class="title is-4">{{ product.name }}</h3>
        <p class="subtitle is-6">&pound;{{ product.price }}</p>
      </div>
    </a>
  </div>
</template>

<script>
export default {
  props: ['product']
}
</script>
