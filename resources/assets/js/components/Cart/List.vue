<template>
  <div>
    <table class="table is-striped is-hoverable is-fullwidth" v-if="products.length > 0">
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
          :key="product.item.slug"
          v-for="product in products"
          @update="loadProducts()"
        />
      </tbody>
    </table>

    <strong v-else>The Cart is Empty</strong>
  </div>
</template>

<script>
import Product from './Product'

export default {
  components: { Product },

  props: ['products']
}
</script>
