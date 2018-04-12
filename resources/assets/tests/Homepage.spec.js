const chai = require('chai')
const expect = require('chai').expect
const { By } = require('selenium-webdriver')
const Selenium = require('selenium-webdriver')
const chaiAsPromised = require('chai-as-promised')
const driver = new Selenium.Builder()
    .forBrowser('chrome')
    .build()

chai.use(chaiAsPromised)

describe('Homepage', () => {
  before(() => {
    driver.get('http://eshop.io:8000')
  })

  beforeEach(() => {
    window = {}
    window.localStorage = {}
  })

  after(() => {
    driver.quit()
  })

  it('has the right title', async () => {
    await expect(driver.getTitle()).to.eventually.equal('h&p—The online store.')
  }).timeout(10000)

  it('has proper h1', async () => {
    let el = await driver.findElement(By.css('.title.is-main'))

    await expect(el.getText()).to.eventually.equal('h&p')
  })

  it('has a global search bar', async () => {
    await expect(driver.findElement(By.name('query'))).to.eventually.be.fulfilled
  })

  it('shows trending products', async () => {
    let el = driver.findElement(By.css('.title.is-3'))

    await expect(el.getText()).to.eventually.equal('Trending Products')
  })

  it('shows category tabs', async () => {
    let el = driver.findElement(By.css('.tabs.is-centered.is-boxed.is-medium'))

    await expect(el.getText()).to.eventually.equal('Men\nWomen\nKids')
  })
})
