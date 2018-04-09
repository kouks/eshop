<template>
  <div class="container">
    <div class="columns">
      <div class="column is-4" v-for="product in products">
        <product :product="product" :key="product.slug" />
      </div>
    </div>
  </div>
</template>

<script>
import Product from './Product'

export default {
  props: ['slug'],

  components: { Product },

  data () {
    return {
      products: []
    }
  },

  mounted () {
    this.loadViewedProduct()
      .then(({ data }) => this.loadProducts(data))
  },

  methods: {
    loadViewedProduct () {
      return this.$http.get(`/api/products/${this.slug}`)
    },

    loadProducts (product) {
      this.$http.get(`/api/products?category=${product.category}&orderby=price&orderdir=1`)
        .then(({ data }) => {
          this.products = data.filter(item => item.slug !== product.slug).slice(0, 3)
        })
    }
  }
}
</script>
