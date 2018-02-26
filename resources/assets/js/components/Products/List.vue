<template>
  <div class="columns is-multiline">
    <div class="column is-4" v-for="product in products">
      <a :href="`/products/${product.slug}`" class="product" :style="{ backgroundImage: `url('${product.image}')` }">
        <div class="product-head">
          <h3 class="title is-4">{{ product.name }}</h3>
          <p class="subtitle is-6">&pound;{{ product.price }}</p>
        </div>
      </a>
    </div>

    <button class="button is-primary" @click="loadProducts(1)">Men</button>
    <button class="button is-primary" @click="loadProducts(2)">Women</button>
    <button class="button is-primary" @click="loadProducts(3)">Kids</button>
  </div>
</template>

<script>
export default {
  data () {
    return {
      products: []
    }
  },

  mounted () {
    this.loadProducts(1)
  },

  methods: {
    loadProducts (category) {
      this.$http.get('/api/products?category=' + category)
        .then(({ data }) => { this.products = data })
    }
  }
}
</script>
