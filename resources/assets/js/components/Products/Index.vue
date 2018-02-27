<template>
  <div class="container">
    <div class="columns">
      <product-filters />

      <div class="column is-offset-1-tablet is-8-tablet">
        <product-list />
      </div>
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
