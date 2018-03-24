<template>
  <nav class="level">
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Customers</p>
        <p class="title">{{ userCount.actual }}</p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Products</p>
        <p class="title">{{ productCount.actual }}</p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Open Orders</p>
        <p class="title">{{ orderCount.actual }}</p>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data () {
    return {
      productCount: {
        actual: 0,
        requested: 0
      },
      userCount: {
        actual: 0,
        requested: 0
      },
      orderCount: {
        actual: 0,
        requested: 0
      }
    }
  },

  mounted () {
    this.loadProducts()
    this.loadUsers()
    this.loadOrders()
  },

  methods: {
    loadProducts () {
      this.$http.get('/api/products/count')
        .then(({ data }) => {
          this.productCount.requested = data.count
          this.countTo(this.productCount)
        })
    },

    loadUsers () {
      this.$http.get('/api/users/count')
        .then(({ data }) => {
          this.userCount.requested = data.count
          this.countTo(this.userCount)
        })
    },

    loadOrders () {
      this.$http.get('/api/orders/count')
        .then(({ data }) => {
          this.orderCount.requested = data.count
          this.countTo(this.orderCount)
        })
    },

    countTo (numbers) {
      const interval = setInterval(() => {
        if (++numbers.actual === numbers.requested) {
          clearInterval(interval)
        }
      }, 1000 / numbers.requested)
    }
  }
}
</script>
