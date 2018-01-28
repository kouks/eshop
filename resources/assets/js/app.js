import Vue from 'vue'
import Hello from '@/components/Hello'

export default new Vue({
  el: '#app',
  components: { Hello }
})

// Navbar Burger
document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('menu-burger').addEventListener('click', function () {
    // Get the target from the "data-target" attribute
    let $target = document.getElementById(this.dataset.target)

    // Toggle the class on both the "navbar-burger" and the "navbar-menu"
    this.classList.toggle('is-active')
    $target.classList.toggle('is-active')
  })
})
