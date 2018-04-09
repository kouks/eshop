<template>
  <div class="container">
    <div class="columns">
      <div class="column is-8-tablet">
        <cart-list :products="products"></cart-list>
      </div>

      <div class="column is-offset-1-tablet is-2-tablet" v-show="products.length > 0">
        <overview :products="products"></overview>

        <a href="/checkout" class="button is-primary is-large is-fullwidth">Checkout</a>
      </div>
    </div>
  </div>
</template>

<script>
import CartList from './List'
import Cart from '@/core/Cart'
import Overview from './Overview'

export default {
  components: { CartList, Overview },

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
