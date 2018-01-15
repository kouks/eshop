import Vue from 'vue'
import Router from 'vue-router'
import routes from '@/router/routes'
import App from '@/components/App'

Vue.use(Router)

export default new Vue({
  el: '#app',
  router: new Router({ routes }),
  template: '<App/>',
  components: { App }
})
