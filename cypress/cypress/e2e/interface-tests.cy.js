/// <reference types="Cypress" />

const createRandomString = function () {
  return self?.crypto?.randomUUID() ?? Math.random() * 100000;
  }
  


  describe('if not login', () => {
    it('shows active list only in Home Page', () => {
      cy.request('http://my-url').then((response) => {
        console.log(response)

      })
    })
  })
  
  describe('if login', () => {
    it('shows active list only in Home Page', () => {
      cy.request('http://my-url').then((response) => {
       console.log(response)
      })
    })

    it('shows all list in Home Page, no matter active or not', () => {
      cy.request('http://my-url').then((response) => {
       console.log(response)
      })
    })
  })
