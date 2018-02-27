<template>
  <div class="columns is-multiline">
    <product :product="product" :key="product.id" v-for="product in products" />
  </div>
</template>

<script>
import Product from './Product'

export default {
  components: { Product },

  data () {
    return {
      products: []
    }
  },

  mounted () {
    this.loadProducts()
  },

  methods: {
    loadProducts () {
      this.$http.get('/api/products')
        .then(({ data }) => { this.products = data })
    }
  }
}
</script>
