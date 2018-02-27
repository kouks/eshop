<template>
  <table class="table is-striped is-hoverable is-fullwidth">
    <thead>
      <tr>
        <th colspan="2">Product</th>
        <th>Price</th>
        <th>Manage</th>
      </tr>
    </thead>

    <tbody>
      <product
        :product="product.item"
        :quantity="product.quantity"
        :key="product.item._id.$oid"
        v-for="product in products"
        @update="loadProducts()"
      />
    </tbody>
  </table>
</template>

<script>
import Product from './Product'

export default {
  components: { Product },

  props: ['products']
}
</script>
