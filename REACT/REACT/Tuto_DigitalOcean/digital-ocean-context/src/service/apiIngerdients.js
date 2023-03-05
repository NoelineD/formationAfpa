export function getIngredients() {
    return (
      fetch('http://localhost:5000/ingredients')
      .then( apiUser => apiUser.json()))
  }
  