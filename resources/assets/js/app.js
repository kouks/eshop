import Vue from 'vue'
import axios from 'axios'
import Cookie from 'js-cookie'
import VueAxios from 'vue-axios'
import Cart from '@/components/Cart/Index'
import CartIcon from '@/components/Cart/Icon'
import Shop from '@/components/Products/Index'
import Orders from '@/components/Profile/Orders'
import Profile from '@/components/Profile/Index'
import Product from '@/components/Products/Show'
import Checkout from '@/components/Checkout/Index'
import ProductList from '@/components/Products/List'
import GlobalSearch from '@/components/GlobalSearch'
import Dashboard from '@/components/Admin/Dashboard'
import Suggestions from '@/components/Products/Suggestions'

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
    Cart,
    Orders,
    Product,
    Profile,
    CartIcon,
    Checkout,
    Dashboard,
    ProductList,
    Suggestions,
    GlobalSearch
  }
})
