import { useState, useReducer } from 'react';
import './Product.css';

const products = [
    {
        emoji: '🍦',
        name: 'ice cream',
        price: 5
    },
    {
        emoji: '🍩',
        name: 'donuts',
        price: 2.5,
    },
    {
        emoji: '🍉',
        name: 'watermelon',
        price: 4
    }
];

const currencyOptions = {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
}
// function getTotal(prix) {
//     return prix.toLocaleString(undefined, currencyOptions)
// }
function getTotal(cart) {
    const total = cart.reduce((totalCost, item) => totalCost + item.price, 0);
    return total.toLocaleString(undefined, currencyOptions)
  }
  
  
export default function Product() {

    const [cart, setCart] = useReducer(cartReducer, []);
//    const [total, setTotal] = useReducer(totalReducer, 0);

    // function cartReducer(state, action) {
    //     switch(action.type) {
    //       case 'add':
    //         return [...state, action.name];
    //       case 'remove':
    //         const update = [...state];
    //         update.splice(update.indexOf(action.name), 1);
    //         return update;
    //       default:
    //         return state;
    //     }
    //   }
    function cartReducer(state, action) {
        switch(action.type) {
          case 'add':
            return [...state, action.product];
          case 'remove':
            const productIndex = state.findIndex(item => item.name === action.product.name);
            if(productIndex < 0) {
              return state;
            }
            const update = [...state];
            update.splice(productIndex, 1)
            return update
          default:
            return state;
        }
      }
      
    //   function totalReducer(state, action) {
    //     if (action.type === 'add'){
    //         return state + action.price;
    //     }
    //     return state - action.price;
    //   }
        

    function add(product) {
    //    const { name, price } = product;
    //    setCart({name, type: 'add'});
        setCart({product, type: 'add'});
    //    setTotal({price: price, type: 'add'});
      }

    function remove(product) {
    //    const { name, price } = product;
    //    setCart({ name, type: 'remove' });
        setCart({ product, type: 'remove' });
    //    setTotal({ price, type: 'remove' });
      }
    
    return (
        <div className="wrapper">
            <div>
                Achat panier : {cart.length} produits.
            </div>
            {/* <div>Total: {getTotal(total)} €</div> */}
            <div>Total: {getTotal(cart)} €</div>

            <div className="product">
                {products.map(product => (
                    <div key={product.name}>
                        <div className="product">
                            <span role="img" aria-label={product.name}>{product.emoji}</span>
                        </div>
                        <button onClick={() => add(product)}>Ajouter</button>
                        <button onClick={() => remove(product)}>Supprimer</button>
                    </div>
                ))}
            </div>
        </div>
    )
}
