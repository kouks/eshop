<template>
  <div class="column is-4">
    <div class="card product">
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

        <button class="button is-primary is-fullwidth" @click="Cart.add(product, 1)">
          Buy
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Cart from '@/core/Cart'

export default {
  props: ['product'],

  data () {
    return { Cart }
  }
}
</script>
