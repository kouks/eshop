<template>
  <div class="columns is-multiline">
    <div class="column is-12" v-show="products.length === 0">
      <div class="has-text-centered mt-5">
        <i class="fa fa-spinner fa-spin fa-5x has-text-primary"></i>
      </div>
    </div>

    <div class="column is-4" v-for="product in products">
      <product :product="product" :key="product.slug" />
    </div>

    <div class="column is-12" v-show="products.length > 0">
      <div class="has-text-centered mt-3">
        <button class="button is-primary is-outlined is-large" @click="page++; loadProducts()">
          <i class="fa fa-spinner fa-spin" v-show="loading"></i>
          <span v-show="loading">&nbsp;</span>
          Load More
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Product from './Product'
import Filters from '@/core/Filters'

export default {
  components: { Product },

  data () {
    return {
      loading: false,
      page: 1,
      products: []
    }
  },

  mounted () {
    this.loadProducts()
    this.listenForFilterChanges()
  },

  methods: {
    loadProducts () {
      this.loading = true

      this.$http.get(`/api/products?page=${this.page}&${Filters.toQueryString()}`)
        .then(({ data }) => {
          this.products = this.products.concat(data)
          this.loading = false
        })
    },

    listenForFilterChanges () {
      Filters.on('changed', () => {
        this.products = []
        this.page = 1
        this.loadProducts()
      })
    }
  }
}
</script>
