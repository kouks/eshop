
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

// File input name
var file = document.getElementById('product-image')

if (file) {
  file.onchange = function () {
    if (file.files.length > 0) {
      document.getElementById('product-image-name').innerHTML = file.files[0].name
    }
  }
}
