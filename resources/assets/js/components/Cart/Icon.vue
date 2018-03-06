<template>
  <div class="navbar-item is-hoverable has-dropdown">
    <a class="navbar-link" @click="togglePopover()">
      <span class="tag is-light"><i class="fa fa-shopping-cart"></i>&nbsp;({{ countOfProducts }})</span>
    </a>

    <div class="cart-popover" :style="popoverStyles">
      <span class="delete is-pulled-right" @click="togglePopover()"></span>
      <span>Cart &middot; <a href="/cart">Go to Cart</a></span>

      <cart-list :products="products"></cart-list>
    </div>
  </div>
</template>

<script>
import Cart from '@/core/Cart'
import CartList from './List'

export default {
  components: { CartList },

  data () {
    return {
      products: [],
      popoverState: 'hidden'
    }
  },

  computed: {
    countOfProducts () {
      return this.products.reduce((carry, item) => carry + parseInt(item.quantity), 0)
    },

    popoverStyles () {
      return {
        hidden: { display: 'none' },
        shown: { display: 'block' }
      }[this.popoverState]
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
      Cart.on('added', () => {
        this.loadProducts()
        this.popoverState = 'shown'
      })

      Cart.on('cleared', this.loadProducts)
      Cart.on('removed', this.loadProducts)
      Cart.on('incremented', this.loadProducts)
    },

    togglePopover () {
      this.popoverState = this.popoverState === 'hidden' ? 'shown' : 'hidden'
    }
  }
}
</script>
