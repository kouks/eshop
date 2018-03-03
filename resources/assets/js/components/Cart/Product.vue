<template>
  <tr>
    <td>
      <figure class="image is-128x128">
        <img :src="product.image">
      </figure>
    </td>
    <th><a :href="`/products/${product.slug}`">{{ product.name }}</a></th>
    <td>&pound;{{ product.price }}&times;{{ quantity }}</td>
    <td>
      <div class="tags has-addons">
        <span class="tag is-danger" @click="Cart.remove(product.slug)"><i class="fa fa-times"></i></span>
        <span class="tag is-primary" @click="Cart.decrement(product.slug, 1)"><i class="fa fa-minus"></i></span>
        <span class="tag"><b>{{ quantity }}</b></span>
        <span class="tag is-primary" @click="Cart.increment(product.slug, 1)"><i class="fa fa-plus"></i></span>
      </div>
    </td>
  </tr>
</template>

<script>
import Cart from '@/core/Cart'

export default {
  props: ['product', 'quantity'],

  data () {
    return { Cart }
  }
}
</script>
