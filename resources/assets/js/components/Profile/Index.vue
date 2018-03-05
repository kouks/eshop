<template>
  <div>
    <h1 class="title is-3">Account Settings</h1>

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
              class="input is-subtle"
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
              class="input is-subtle"
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
            <input type="text" v-model="user.email" disabled class="input is-subtle">
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
              class="input is-subtle"
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
              class="input is-subtle"
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
              class="input is-subtle"
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
              class="input is-subtle"
              placeholder="Enter postcode"
            >
          </p>
        </div>
      </div>

      <hr>

      <div class="field">
        <button type="button" class="button is-primary" @click="saveUser()">
          <i class="fa fa-fw fa-spinner fa-spin" v-show="progress"></i>
          <i class="fa fa-fw fa-check" v-show="done"></i>
          <i class="fa fa-fw fa-times" v-show="error"></i>
          <span v-show="done || progress || error">&nbsp;</span>
          Save
        </button>
        <a href="/profile" class="button is-text">Discard</a>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data () {
    return {
      progress: false,
      done: false,
      error: false,
      user: { address: {} }
    }
  },

  mounted () {
    this.loadUser()
  },

  methods: {
    loadUser () {
      this.$http.get('/api/user')
        .then(({ data }) => { this.user = data })
    },

    saveUser () {
      this.progress = true

      this.$http.post('/api/user/update', this.user)
        .then(() => {
          this.progress = false
          this.error = false
          this.done = true
        })
        .catch(() => {
          this.progress = false
          this.done = false
          this.error = true
        })
    }
  }
}
</script>
