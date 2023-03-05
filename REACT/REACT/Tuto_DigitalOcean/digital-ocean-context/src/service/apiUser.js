export function getUser() {
    return (
      fetch('http://localhost:5000/user')
      .then( apiUser => apiUser.json()))
  }
  