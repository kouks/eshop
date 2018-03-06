<template>
  <div class="column is-2-tablet">
    <aside class="menu">
      <p class="menu-label">
        Filters
      </p>

      <ul class="menu-list">
        <li>
          <a href="#">Category</a>
          <ul>
            <li><label class="checkbox"><input v-model="filters.categories[1]" type="checkbox" checked> Men</label></li>
            <li><label class="checkbox"><input v-model="filters.categories[2]" type="checkbox" checked> Women</label></li>
            <li><label class="checkbox"><input v-model="filters.categories[3]" type="checkbox" checked> Kids</label></li>
          </ul>
        </li>
        <li><a href="#">Price</a></li>
      </ul>

      <p class="menu-label">
        Sort By
      </p>

      <ul class="menu-list">
        <li>
          <a>
            <input v-model="filters.orderby" value="views" type="radio" id="orderby-popularity" checked>
            <label for="orderby-popularity">Popularity</label>
          </a>
        </li>
        <li>
          <a>
            <input v-model="filters.orderby" value="price" type="radio" id="orderby-price">
            <label for="orderby-price">Price</label>
          </a>
        </li>
      </ul>
    </aside>

    <hr>

    <div class="field">
      <button class="button is-default is-fullwidth">Clear Filters</button>
    </div>
  </div>
</template>

<script>
import Filters from '@/core/Filters'

export default {
  data () {
    return {
      filters: Filters.get()
    }
  },

  watch: {
    filters: {
      handler (value) {
        Filters.set(value)
      },

      deep: true
    }
  }
}
</script>
