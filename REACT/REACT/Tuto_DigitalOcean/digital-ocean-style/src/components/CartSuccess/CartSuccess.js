import { createUseStyles } from 'react-jss';
import Alert from '../Alert/Alert';
// import './CartSuccess.css';

const useStyles = createUseStyles({
  item: {},
  wrapper: {
    borderTop: 'black solid 1px',
    display: 'flex',
    flexWrap: 'wrap',
    '& h2': {
      width: '100%'
    },
    '& $item': {
      marginRight: 20
    }
  }

})


export default function CartSuccess() {
  
    const classes = useStyles();

    return (
        <Alert title="Ajouter au panier" type="success">
            <div className={classes.wrapper}>
                <h2>
                    Vous avez 3 produits:
                </h2>
                <div className={classes.item}>
                    <div>Bananes</div>
                    <div>Quantité: 2</div>
                </div>
                <div className={classes.item}>
                    <div>Salade</div>
                    <div>Quantité: 1</div>
                </div>
            </div>
        </Alert>
    )
}

