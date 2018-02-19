import Vue from 'vue'
import Hello from '@/components/Hello'

/**
 * Bulma JS utils.
 */
require('./bulma')

export default new Vue({
  el: '#app',
  components: { Hello }
})
