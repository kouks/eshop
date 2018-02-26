<template>
  <div class="container">
    <div class="columns">
      <product-filters />

      <product-list />
    </div>
  </div>
</template>

<script>
import ProductFilters from './Filters'
import ProductList from './List'

export default {
  components: { ProductFilters, ProductList }
}
</script>
