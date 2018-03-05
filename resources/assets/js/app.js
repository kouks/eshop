import Vue from 'vue'
import axios from 'axios'
import Cookie from 'js-cookie'
import VueAxios from 'vue-axios'
import Cart from '@/components/Cart/Index'
import CartIcon from '@/components/Cart/Icon'
import Shop from '@/components/Products/Index'
import Profile from '@/components/Profile/Index'
import Product from '@/components/Products/Show'
import ProductList from '@/components/Products/List'
import GlobalSearch from '@/components/GlobalSearch'
import Dashboard from '@/components/Admin/Dashboard'

/**
 * Bulma JS utils.
 */

require('./bulma')

/**
 * Assign the api token to the all outcoming requests.
 */

axios.defaults.headers.common['Authorization'] = Cookie.get('api_token')

/**
 * Vue.js instance
 */

Vue.use(VueAxios, axios)

export default new Vue({
  el: '#app',
  components: {
    Shop,
    Product,
    ProductList,
    Cart,
    CartIcon,
    Profile,
    GlobalSearch,
    Dashboard
  }
})
