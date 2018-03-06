
export default {
  /**
   * The object containing the filters.
   *
   * @private
   * @var {Object}
   */
  _filters: {
    orderby: 'views',
    orderdir: {
      views: -1,
      price: 1
    },
    categories: {
      '1': true,
      '2': true,
      '3': true
    }
  },

  /**
   * The array of filter event listeners.
   *
   * @private
   * @var {Array}
   */
  _listeners: [],

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
   * Returns all current filters.
   *
   * @returns {Object} - The filters.
   */
  get () {
    return this._filters
  },

  /**
   * Updates filters on the instance.
   *
   * @param {Object} filters - The filters to be updated-
   * @returns {void}
   */
  set (filters) {
    this._filters = filters
    this._dispatch('changed', filters)
  },

  /**
   * Transforms the filters to a query string.
   *
   * @returns {string} - The query string.
   */
  toQueryString () {
    let filters = this._filters

    let categories = Object.keys(filters.categories).reduce((carry, item) => {
      return filters.categories[item] ? carry.concat([item]) : carry
    }, [])

    return `orderby=${filters.orderby}&orderdir=${filters.orderdir[filters.orderby]}&categories=${categories.join('|')}`
  },

  /**
   * Dispatches an event on the filter object.
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
