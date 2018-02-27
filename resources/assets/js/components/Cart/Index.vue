<template>
  <div class="container">
    <div class="columns">
      <div class="column is-8-tablet">
        <cart-list :products="products" />
      </div>

      <div class="column is-offset-1-tablet is-2-tablet">
        <checkout :products="products" />
      </div>
    </div>
  </div>
</template>

<script>
import CartList from './List'
import Checkout from './Checkout'
import Cart from '@/core/Cart'

export default {
  components: { CartList, Checkout },

  data () {
    return {
      products: []
    }
  },

  mounted () {
    this.loadProducts()
    this.listedForCartChanges()
  },

  methods: {
    loadProducts () {
      this.products = Cart.all()
    },

    listedForCartChanges () {
      Cart.on('cleared', this.loadProducts)
      Cart.on('removed', this.loadProducts)
      Cart.on('incremented', this.loadProducts)
    }
  }
}
</script>
