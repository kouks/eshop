<template>
  <a class="navbar-item" href="/cart">
    <span class="tag is-light"><i class="fa fa-shopping-cart"></i>&nbsp;({{ countOfProducts }})</span>
  </a>
</template>

<script>
import Cart from '@/core/Cart'

export default {
  data () {
    return {
      products: []
    }
  },

  computed: {
    countOfProducts () {
      return this.products.reduce((carry, item) => carry + parseInt(item.quantity), 0)
    }
  },

  mounted () {
    this.loadProducts()

    this.listenForCartChanges()
  },

  methods: {
    loadProducts () {
      this.products = Cart.all()
    },

    listenForCartChanges () {
      Cart.on('added', this.loadProducts)
      Cart.on('cleared', this.loadProducts)
      Cart.on('removed', this.loadProducts)
      Cart.on('incremented', this.loadProducts)
    }
  }
}
</script>
