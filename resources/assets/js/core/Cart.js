
export default {
  /**
   * The array of cart event listeners.
   *
   * @private
   * @var {Array}
   */
  _listeners: [],

  /**
   * Returns all items in the cart.
   *
   * @returns {Array} - The array of items.
   */
  all () {
    this._dispatch('listed')

    return this._read()
  },

  /**
   * Checks whether the product is present in the cart
   *
   * @param {string} slug - The slug to check by.
   * @returns {bool} - Whether the item is present.
   */
  has (slug) {
    return this._read().filter(data => data.item.slug === slug).length > 0
  },

  /**
   * Adds an item to the cart.
   *
   * @param {Object} item - The item object.
   * @param {number} quantity - The quantity to be added.
   * @returns {void}
   */
  add (item, quantity) {
    quantity = parseInt(quantity)

    if (this.has(item.slug)) {
      return this.increment(item.slug, quantity)
    }

    this._write(this._read().concat([
      { item, quantity }
    ]))

    this._dispatch('added', { item, quantity })
  },

  /**
   * Removes an item from the cart.
   *
   * @param {string} slug - The slug to remove by.
   * @returns {void}
   */
  remove (slug) {
    this._write(this._read().filter(data => data.item.slug !== slug))
    this._dispatch('removed', { slug })
  },

  /**
   * Removes all items from the cart.
   *
   * @returns {void}
   */
  clear () {
    this._write([])
    this._dispatch('cleared')
  },

  /**
   * Increments the amount of a given item in cart.
   *
   * @param {string} slug - The slug to increment.
   * @param {number} count - The amount to increment by.
   * @returns {void}
   */
  increment (slug, count) {
    let cart = this._read()

    for (let key in cart) {
      if (cart[key].item.slug === slug) {
        cart[key].quantity += count

        if (cart[key].quantity === 0) {
          return this.remove(cart[key].item.slug)
        }

        break
      }
    }

    this._write(cart)
    this._dispatch('incremented', { slug, count })
  },

  /**
   * Decrements the amount of a given item in cart.
   *
   * @param {string} slug - The slug to decrement.
   * @param {number} count - The amount to decrement by.
   * @returns {void}
   */
  decrement (slug, count) {
    this.increment(slug, -count)
  },

  /**
   * Adds an event listener to an event.
   *
   * @param {string} event - The event to be assigned to.
   * @param {Closure} callback - The callback.
   * @returns {void}
   */
  on (event, callback) {
    this._listeners.push({ event, callback })
  },

  /**
   * Reads the json from the local storate.
   *
   * @private
   * @returns {Array} - The array of items.
   */
  _read () {
    return window.localStorage.cart === undefined
      ? []
      : JSON.parse(window.localStorage.cart)
  },

  /**
   * Rewrites the items in cart.
   *
   * @private
   * @param {Array} cart - The cart data to be written.
   * @returns {void}
   */
  _write (cart) {
    window.localStorage.cart = JSON.stringify(cart)
  },

  /**
   * Dispatches an event on the cart object.
   *
   * @private
   * @param {string} event - The event to be dispatched.
   * @param {Object} payload - The payload to be sent.
   * @returns {void}
   */
  _dispatch (event, payload) {
    for (let listener of this._listeners) {
      if (event === listener.event) {
        listener.callback(payload)
      }
    }
  }
}
