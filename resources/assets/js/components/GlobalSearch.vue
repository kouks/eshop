<template>
  <div class="banner-content">
    <h1 class="title is-main has-color-primary">h&amp;p</h1>
    <h2 class="subtitle is-3">The online store.</h2>

    <form class="global-search" action="/products/search" method="GET">
      <input
        class="global-search-input"
        type="text"
        name="query"
        placeholder="Type anything..."
        autocomplete="off"
        v-model="query"
      ></input>

      <div class="global-search-spinner">
        <i class="fa fa-spinner fa-spin" v-show="loading"></i>
      </div>

      <div class="global-search-results">
        <a :href="`/products/${product.slug}`" v-for="product in results">
          <span v-html="product.name.replace(query, '<strong>' + query + '</strong>')"></span>
          <span class="is-pulled-right has-text-primary">&pound;{{ product.price }}</span>
        </a>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data () {
    return {
      lastTyped: 0,
      loading: false,
      query: '',
      results: [],
      timeout: null
    }
  },

  watch: {
    query () {
      clearTimeout(this.timeout)

      if (this.query.length < 1) {
        this.results = []
        this.loading = false

        return
      }

      this.loading = true
      this.timeout = setTimeout(this.loadProducts, 750)
    }
  },

  methods: {
    loadProducts () {
      this.$http.get(`/api/products?query=${this.query}`)
        .then(({data}) => {
          this.loading = false
          this.results = data
        })
    }
  }
}
</script>
