const expect = require('chai').expect
const Cart = require('@/core/Cart').default

describe('Cart driver', () => {
  beforeEach(() => {
    window = {}
    window.localStorage = {}
  })

  it('adds an item to the cart', () => {
    Cart.add({ slug: 'test-item' }, 1)

    expect(JSON.parse(window.localStorage.cart))
      .to.have.lengthOf(1)
      .and.deep.equal([{ item: { slug: 'test-item' }, quantity: 1 }])
  })

  it('adds an increments/decrements a quantity of an item in cart', () => {
    Cart.add({ slug: 'test-item' }, 1)
    Cart.increment('test-item', 1)

    expect(JSON.parse(window.localStorage.cart)[0].quantity).to.equal(2)
    Cart.decrement('test-item', 1)
    expect(JSON.parse(window.localStorage.cart)[0].quantity).to.equal(1)
  })

  it('removes an item from the cart', () => {
    Cart.add({ slug: 'test-item' }, 1)
    Cart.remove('test-item')

    expect(JSON.parse(window.localStorage.cart))
      .to.have.lengthOf(0)
  })

  it('removes an item from the cart upon decrementing its quantity to zero', () => {
    Cart.add({ slug: 'test-item' }, 1)
    Cart.decrement('test-item', 1)

    expect(JSON.parse(window.localStorage.cart))
      .to.have.lengthOf(0)
  })

  it('determines a presence of an item in cart', () => {
    Cart.add({ slug: 'test-item' }, 1)

    expect(Cart.has('test-item')).to.be.true
  })
})
