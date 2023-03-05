import PropTypes from 'prop-types';
import './AnimalDetails.css';

function convertFood(food) {
  switch(food) {
    case 'insects':
      return '🐜';
    case 'meat':
      return '🍖';
    case 'plants':
    default:
      return '🌱';
  }
}

export default function AnimalDetails({ foods, scientName }) {
  return(
    <div className="details">
      <h4>Détails:</h4>
      <div>
        Nom scientifique : {scientName}
      </div>
      <div>
        Nouritures : {foods.map(food => convertFood(food)).join(' ')}
      </div>
    </div>
  )
}

AnimalDetails.propTypes = {
    foods: PropTypes.arrayOf(PropTypes.string).isRequired,
    scientName: PropTypes.string.isRequired,
  }
   
  