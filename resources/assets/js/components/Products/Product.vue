<template>
  <div class="card product" :style="{ opacity }">
    <div class="card-image">
      <a :href="`/products/${product.slug}`">
        <figure class="image is-4by3">
          <img :src="product.image" alt="Placeholder image">
        </figure>

        <div class="product-image-cover">
          <button class="button is-outlined is-large is-white">View Details</button>
        </div>
      </a>
    </div>
    <div class="card-content">
      <div class="columns">
        <div class="column">
          <p class="title is-4">{{ product.name.substr(0, 15) }}</p>
          <p class="subtitle is-6">{{ product.description.substr(0, 25) }}</p>
        </div>
        <div class="column is-narrow">
          <p class="title is-4 has-text-primary">
            &pound;{{ product.price }}
          </p>
        </div>
      </div>

      <hr>

      <button :class="['button', buttonClass, 'is-fullwidth']" @click="buy()">
        <i class="fa fa-check" v-show="bought"></i>
        <span v-show="bought">&nbsp;</span>
        Buy
      </button>
    </div>
  </div>
</template>

<script>
import Cart from '@/core/Cart'

export default {
  props: ['product'],

  data () {
    return {
      bought: false,
      opacity: 0,
      Cart
    }
  },

  mounted () {
    this.$nextTick(() => {
      this.opacity = 1
    })
  },

  computed: {
    buttonClass () {
      return this.bought ? 'is-success' : 'is-primary'
    }
  },

  methods: {
    buy () {
      Cart.add(this.product, 1)
      this.bought = true
      setInterval(() => { this.bought = false }, 3000)
    }
  }
}
</script>
