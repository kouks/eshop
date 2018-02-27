
export default {
  /**
   * Adds an item to the cart.
   *
   * @param {Object} item - The item object.
   * @param {number} quantity - The quantity to be added.
   * @returns {void}
   */
  add (item, quantity) {
    this._write(this._read().concat([
      { item, quantity }
    ]))
  },

  /**
   * Removes an item from the cart.
   *
   * @param {string} slug - The slug to remove by.
   * @returns {void}
   */
  remove (slug) {
    this._write(this._read().filter(data => data.item.slug !== slug))
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

        break
      }
    }

    this._write(cart)
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
   * Reads the json from the local storate.
   *
   * @private
   * @returns {Array} - The items in cart.
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
  }
}
