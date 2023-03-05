// import './App.css';
import { createUseStyles } from 'react-jss';
import Alert from '../Alert/Alert';
import CartSuccess from '../CartSuccess/CartSuccess';

const useStyles = createUseStyles({
  wrapper: {
    padding: 20,
  }
});


function App() {
 
// const wrapper = {
//   padding: 20
// };
  const classes = useStyles();

  return (
    <div className={classes.wrapper}>
      <Alert title="Produits non ajoutés" type="error">
        <div>Votre produit n'est pas dans le stock</div>
      </Alert>
      <CartSuccess />
    </div>
  );
}

export default App;
