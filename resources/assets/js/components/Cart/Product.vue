<template>
  <tr>
    <td>
      <figure class="image is-128x128">
        <img :src="product.image">
      </figure>
    </td>
    <th>{{ product.name }}</th>
    <td>&pound;{{ product.price }}</td>
    <td>
      <div class="tags has-addons">
        <span class="tag is-danger" @click="removeItem()"><i class="fa fa-times"></i></span>
        <span class="tag is-primary" @click="decrementItem()"><i class="fa fa-minus"></i></span>
        <span class="tag"><b>{{ quantity }}</b></span>
        <span class="tag is-primary" @click="incrementItem()"><i class="fa fa-plus"></i></span>
      </div>
    </td>
  </tr>
</template>

<script>
import Cart from '@/core/Cart'

export default {
  props: ['product', 'quantity'],

  methods: {
    removeItem () {
      Cart.remove(this.product.slug)
    },

    decrementItem () {
      Cart.decrement(this.product.slug, 1)
    },

    incrementItem () {
      Cart.increment(this.product.slug, 1)
    }
  }
}
</script>
