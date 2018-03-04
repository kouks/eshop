<template>
  <div class="container">
    <div class="columns">
      <div class="column is-3-tablet">
        <figure class="image is-square">
          <img :src="product.image">
        </figure>
      </div>

      <div class="column is-offset-1-tablet is-6-tablet">
        <nav class="breadcrumb" aria-label="breadcrumbs">
          <ul>
            <li><a href="/shop">Products</a></li>
            <li><a href="/shop?category=men">Men</a></li>
            <li class="is-active">
              <a href="#" aria-current="page"><h1 class="title is-3">{{ product.name }}</h1></a>
            </li>
          </ul>
        </nav>

        <p>{{ product.description }}</p>

        <hr>

        <nav class="level">
          <div class="level-item has-text-centered">
            <div>
              <p class="heading">Price</p>
              <p class="title">&pound;{{ product.price }}</p>
            </div>
          </div>

          <div class="level-item has-text-centered">
            <div>
              <p class="heading">Stock</p>
              <p :class="['title', stockClass]">{{ product.stock > 5 ? '5+' : product.stock }}</p>
            </div>
          </div>
        </nav>

        <div class="columns">
          <div class="column is-offset-3-tablet is-6-tablet">
            <form>
              <div class="field has-addons">
                <div class="control is-expanded">
                  <input class="input is-large" type="number" v-model="quantity">
                </div>

                <div class="control">
                  <button type="button" :class="['button', buttonClass, 'is-large']" @click="addToCart()">
                    <i class="fa fa-check" v-show="bought"></i>
                    <span v-show="bought">&nbsp;</span>
                    Add to Cart
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Cart from '@/core/Cart'

export default {
  props: ['slug'],

  data () {
    return {
      bought: false,
      product: {},
      quantity: 1
    }
  },

  computed: {
    stockClass () {
      if (this.product.stock > 5) return 'has-text-success'
      if (this.product.stock > 0) return 'has-text-warning'
      if (this.product.stock === 0) return 'has-text-danger'
    },

    stockCount () {
      return this.product.stock > 5 ? '5+' : this.product.stock
    },

    buttonClass () {
      return this.bought ? 'is-success' : 'is-primary'
    }
  },

  mounted () {
    this.loadProduct()
  },

  methods: {
    loadProduct () {
      this.$http.get(`/api/products/${this.slug}`)
        .then(({ data }) => { this.product = data })
    },

    addToCart () {
      Cart.add(this.product, this.quantity)
      this.bought = true
    }
  }
}
</script>
