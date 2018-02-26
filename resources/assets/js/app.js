import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import ProductList from '@/components/Products/List'

/**
 * Bulma JS utils.
 */
require('./bulma')

Vue.use(VueAxios, axios)

export default new Vue({
  el: '#app',
  components: { ProductList }
})
