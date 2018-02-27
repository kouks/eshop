import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Shop from '@/components/Products/Index'
import Product from '@/components/Products/Show'
import ProductList from '@/components/Products/List'
// import Cart from '@/core/Cart'

// Cart.add({ slug: 'asd' }, 1)
// Cart.increment('asd', -1)
// Cart.remove('asd')

/**
 * Bulma JS utils.
 */

require('./bulma')

/**
 * Vue.js instance
 */

Vue.use(VueAxios, axios)

export default new Vue({
  el: '#app',
  components: {
    Shop,
    Product,
    ProductList
  }
})
