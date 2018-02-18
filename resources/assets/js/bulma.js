
document.addEventListener('DOMContentLoaded', function () {
  let $burger = document.getElementById('menu-burger')
  if ($burger) {
    $burger.addEventListener('click', function () {
      let $target = document.getElementById(this.dataset.target)
      this.classList.toggle('is-active')
      $target.classList.toggle('is-active')
    })
  }

  let $fileInput = document.getElementById('product-image')
  if ($fileInput) {
    $fileInput.onchange = function () {
      if ($fileInput.files.length > 0) {
        document.getElementById('product-image-name').innerHTML = $fileInput.files[0].name
      }
    }
  }
})

