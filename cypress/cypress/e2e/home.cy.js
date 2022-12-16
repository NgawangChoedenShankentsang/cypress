/// <reference types="Cypress" />

const createRandomString = function () {
  return self?.crypto?.randomUUID() ?? Math.random() * 100000;
}

const createAProduct = () => {
  const name = createRandomString();
  cy.visit('localhost/product.php')
  cy.get('input#name-field').type(name)
  cy.get('input#sku-field').type(name)
  cy.get('input#price-field').type('420.00')
  cy.get('input#stock-field').type('10')
  cy.contains('Save and Close').click()

  return name
}

describe('shop app if signed sign', () => {
  beforeEach(() => {
    cy.visit('http://localhost')
    cy.contains('Categories').click()
    cy.get('input#username-field').type('root')
    cy.get('input#password-field').type('sUP3R53CR3T#')
    cy.get('button[type=submit').click()
    cy.contains('Home').click()
  })

  it('shows the title', () => {
    cy.visit('http://localhost')
    cy.get('body').should('contain.text', 'Welcome to Productive!')
  })
  
  it('lists the products', () => {
    cy.contains('Products').click()
    cy.contains('bread3')
    cy.contains('Frisches Brot')
  })

  it('creates a new product', () => {
    cy.contains('Products').click()
    cy.contains('Create New Product').click()
    cy.get('input#name-field').type('some new product')
    cy.get('input#sku-field').type('A12390esf')
    cy.get('input#price-field').type('420.00')
    cy.get('input#stock-field').type('10')
    cy.contains('Save and Close').click()
  })

  // ! HOMEWORK BELOW:
  // Please complete the following tests by Friday so we can look at the solutions together
  
  it('can update a product', () => {
    // ? how can we check that we have updated the product successfully?
    const randomProductName = self?.crypto?.randomUUID() ?? Math.random() * 100000;
    cy.get('body').should('not.contain.text', randomProductName);
    cy.contains('Products').click()
    cy.contains('Edit').eq(0).click()
    cy.get('input#name-field').clear().type(randomProductName)
    cy.contains('Save and Close').click()
    cy.get('body').should('contain.text', randomProductName)
  })
  
  it('can delete a product', () => {
    // ? what is the issue with this test?
    const productName = createAProduct()
    cy.contains(productName).parent().contains('Delete').click()
    cy.get('body').should('not.contain.text', productName)
  })

  // * These work exactly the same way as the tests for products
  it('lists the categories', () => {})
  it('can create a category', () => {})
  it('can update a category', () => {})
  it('can delete a category', () => {})
})