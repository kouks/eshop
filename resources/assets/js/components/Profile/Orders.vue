<template>
  <div>
    <h1 class="title is-3">Past Orders</h1>

    <table class="table is-fullwidth is-striped is-hoverable" v-if="orders.length">
      <thead>
        <tr>
          <th>#</th>
          <th>Date</th>
          <th>Satus</th>
          <th>Invoice</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="order in orders">
          <td>{{ order.id }}</td>
          <td>{{ order.placed }}</td>
          <td>{{ order.status }}</td>
          <td><a href="#">PDF</a></td>
        </tr>
      </tbody>
    </table>

    <span v-else>No past orders found.</span>
  </div>
</template>

<script>
export default {
  data () {
    return {
      user: {},
      orders: []
    }
  },

  mounted () {
    this.loadUser()
    this.loadOrders()
  },

  methods: {
    loadUser () {
      this.$http.get('/api/user')
        .then(({ data }) => { this.user = data })
    },

    loadOrders () {
      this.$http.get('/api/orders')
        .then(({ data }) => {
          this.orders = data
        })
    }
  }
}
</script>
