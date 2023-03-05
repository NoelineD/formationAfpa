import { useState, useEffect } from 'react';
import SaladItem from '../SaladItem/SaladItem';
import { getIngredients } from '../../service/apiIngerdients';
import { createUseStyles } from 'react-jss';

const useStyles = createUseStyles({
  wrapper: {
    display: 'flex',
    flexWrap: 'wrap',
    padding: [10, 50],
    justifyContent: 'center',
  }
});

// const ingredients = [
//     {
//       image: '🍎',
//       name: 'apple',
//     },
//     {
//       image: '🥑',
//       name: 'avocado',
//     },
//     {
//       image: '🥦',
//       name: 'broccoli',
//     },
//     {
//       image: '🥕',
//       name: 'carrot',
//     },
//     {
//       image: '🍷',
//       name: 'red wine dressing',
//     },
//     {
//       image: '🍚',
//       name: 'seasoned rice',
//     },
//   ];
  
  export default function SaladBuilder() {
    const classes = useStyles();
    const [ingredients, setIngredients] = useState([]);

    useEffect(() => {
      let charge = false;
      getIngredients().then((apiIngredients) => {
        if (!charge){
          setIngredients(apiIngredients)
        }
      })
      return () => charge = true;
    }, [])
  

    return(
      <div className={classes.wrapper}>
        {
          ingredients.map(ingredient => (
            <SaladItem
              key={ingredient.name}
              image={ingredient.image}
              name={ingredient.name}
            />
          ))
        }
      </div>
    )
  }
  