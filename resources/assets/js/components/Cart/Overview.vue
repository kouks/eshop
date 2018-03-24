<template>
  <table class="table is-fullwidth">
    <tbody>
      <tr v-for="product in products">
        <td>{{ product.item.name }}</td>
        <td class="has-text-right">&pound;{{ product.item.price }}&times;{{ product.quantity }}</td>
      </tr>
    </tbody>

    <tfoot>
      <tr>
        <th>Total:</th>
        <th class="has-text-right">&pound;{{ subtotal }}</th>
      </tr>
    </tfoot>
  </table>
</template>

<script>
export default {
  props: ['products'],

  computed: {
    subtotal () {
      return this.products.reduce((carry, { item, quantity }) => carry + item.price * quantity, 0).toFixed(2)
    }
  }
}
</script>
