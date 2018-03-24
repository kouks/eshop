<template>
  <div class="container">
    <div class="columns is-multiline">
      <div class="column is-5-tablet">
        <h2 class="title is-3 has-text-centered">Personal Details</h2>

        <div class="box content">

          <form>
            <h3 class="title is-5 has-text-centered">General</h3>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label for="name" class="label">Name</label>
              </div>

              <div class="field-body">
                <div class="control">
                  <input
                    id="name"
                    name="name"
                    type="text"
                    v-model="user.name"
                    class="input"
                    placeholder="Jon Doe"
                  >
                </div>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label for="phone" class="label">Phone</label>
              </div>

              <div class="field-body">
                <div class="control">
                  <input
                    id="phone"
                    name="phone"
                    type="text"
                    v-model="user.phone"
                    class="input"
                    placeholder="01234 45678"
                  >
                </div>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Email</label>
              </div>

              <div class="field-body">
                <p class="control">
                  <input
                    type="text"
                    v-model="user.email"
                    class="input"
                    placeholder="jon@doe.com"
                  >
                </p>
              </div>
            </div>

            <hr>

            <h3 class="title is-5 has-text-centered">Address</h3>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label for="street" class="label">Street</label>
              </div>

              <div class="field-body">
                <p class="control">
                  <input
                    id="street"
                    name="street"
                    type="text"
                    v-model="user.address.street"
                    class="input"
                    placeholder="Enter street"
                  >
                </p>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label for="city" class="label">City</label>
              </div>

              <div class="field-body">
                <p class="control">
                  <input
                    id="city"
                    name="city"
                    type="text"
                    v-model="user.address.city"
                    class="input"
                    placeholder="Enter city"
                  >
                </p>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label for="country" class="label">Country</label>
              </div>

              <div class="field-body">
                <p class="control">
                  <input
                    id="country"
                    name="country"
                    type="text"
                    v-model="user.address.country"
                    class="input"
                    placeholder="Enter country"
                  >
                </p>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label for="postcode" class="label">Postcode</label>
              </div>

              <div class="field-body">
                <p class="control">
                  <input
                    id="postcode"
                    name="postcode"
                    type="text"
                    v-model="user.address.postcode"
                    class="input"
                    placeholder="Enter postcode"
                  >
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="column is-5-tablet is-offset-2-tablet">
        <h2 class="title is-3 has-text-centered">Review Cart</h2>

        <div class="box">
          <overview :products="products"></overview>
        </div>
      </div>

      <div class="column is-6-tablet is-offset-3-tablet">
        <div v-for="error in errors" class="notification is-danger">
          {{ error }}
        </div>

        <button :class="['button', error ? 'is-danger' : 'is-primary', 'is-fullwidth', 'is-large']" @click="buy()">
          <i class="fa fa-fw fa-spinner fa-spin" v-show="progress"></i>
          <i class="fa fa-fw fa-times" v-show="error"></i>
          <span v-show="progress || error">&nbsp;</span>
          Buy
        </button>
      </div>
    </div>

    <div :class="['modal', modal ? 'is-active' : '']">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Order Summary</p>
          <button class="delete" aria-label="close" @click="goHome()"></button>
        </header>
        <section class="modal-card-body">
          <strong>Delivery Address</strong><br>
          {{ user.address.street }}<br>
          {{ user.address.city }} {{ user.address.postcode }}<br>
          {{ user.address.country }}<br><br>
          <strong>Email: </strong> {{ user.email }}<br><br>
          <strong>Order ID: </strong> {{ order.id }}
        </section>
        <footer class="modal-card-foot">&nbsp;</footer>
      </div>
    </div>
  </div>
</template>

<script>
  import _ from 'lodash'
  import Cart from '@/core/Cart'
  import Overview from '@/components/Cart/Overview'

  export default {
    components: {Overview},

    data () {
      return {
        user: {address: {}},
        products: [],
        modal: false,
        progress: false,
        error: false,
        errors: [],
        order: { }
      }
    },

    mounted () {
      this.loadUser()
      this.loadProducts()
    },

    methods: {
      loadUser () {
        this.$http.get('/api/user')
          .then(({data}) => {
            this.user = data
          })
          .catch(() => {
          })
      },

      loadProducts () {
        this.products = Cart.all()
      },

      buy () {
        this.progress = true

        this.$http.post('/api/orders', {user: this.user, products: this.products})
          .then(({ data }) => {
            this.error = false
            this.progress = false
            this.modal = true
            this.order = data
            Cart.clear()
          })
          .catch(({response}) => {
            this.error = true
            this.progress = false
            this.errors = _.flatten(Object.values(response.data))
          })
      },

      goHome () {
        window.location.href = '/shop'
      }
    }
  }
</script>
