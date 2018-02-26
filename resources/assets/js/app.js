import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Shop from '@/components/Products/Index'
import Product from '@/components/Products/Show'

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
    Product
  }
})
