<template>
  <div class="container">
    <div class="columns">
      <div v-for="product in products" class="column is-4">
        <a href="/products" class="product">
          <div class="product-head">
            <h3 class="title is-4">{{ product.name }}</h3>
            <p class="subtitle is-6">{{ product.price }}</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      products: [
        {
          name: 'asd',
          price: 1
        },
        {
          name: 'asdasdads',
          price: 3
        },
        {
          name: 'adasd',
          price: 64
        }
      ]
    }
  }
}
</script>
