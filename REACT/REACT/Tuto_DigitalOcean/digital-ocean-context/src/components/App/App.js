import { useState, useEffect } from 'react';
import './App.css';
import Navigation from '../Navigation/Navigation';
import SaladMaker from '../SaladMaker/SaladMaker';
import UserContext from '../User/User';
import { getUser } from '../../service/apiUser';

// const user = {
//   name: 'Dupont',
//   favorites: [
//     'avocado',
//     'carrot'
//   ]
// }

function App() {
  const [user, setUser] = useState({name: '', favorites: []});

  useEffect(() => {
    let charge = false;
    getUser().then((apiUser) => {
      if (!charge){
        setUser(apiUser)
      }
    })
    return () => charge = true;
  }, [])
  
  return (
    <UserContext.Provider value={user}>
      <Navigation />
      <SaladMaker />
    </UserContext.Provider>
  );
}

export default App;
