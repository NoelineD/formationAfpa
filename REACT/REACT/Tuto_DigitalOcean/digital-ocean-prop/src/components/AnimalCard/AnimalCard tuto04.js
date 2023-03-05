import './AnimalCard.css';
import PropTypes from 'prop-types';

export default function AnimalCard({name, scientificName, size, diet, additional, showAdditional}){

    //const { name } = props;

    return (
        <div className='animal-wrapper'>
        <h2>{name}</h2>
        <h3>{scientificName}</h3>
        <h4>{size}kg</h4>
        <div>{diet.join(', ')}</div>
        <button onClick={() => showAdditional(additional)}>Plusd'Info</button>
      </div>
    );
}

AnimalCard.propTypes = {
    additional: PropTypes.shape({
      link: PropTypes.string,
      notes: PropTypes.string
    }),
    diet: PropTypes.arrayOf(PropTypes.string).isRequired,
    name: PropTypes.string.isRequired,
    scientificName: PropTypes.string.isRequired,
    showAdditional: PropTypes.func.isRequired,
    size: PropTypes.number.isRequired,
  }
  
  AnimalCard.defaultProps = {
    additional: {
      notes: 'Pas d\'informations supplémentaires'
    }
  }
   
  