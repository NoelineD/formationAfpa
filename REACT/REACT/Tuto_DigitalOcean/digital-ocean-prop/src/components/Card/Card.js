import PropTypes from 'prop-types';
import './Card.css';

export default function Card({ children, details, title }) {
  return(
    <div className="card">
      <div className="card-details">
        <h2>{title}</h2>
        {details}
      </div>
      {children}
    </div>
  )
}

Card.propTypes = {
  children: PropTypes.oneOfType([
    PropTypes.arrayOf(PropTypes.element),
    PropTypes.element.isRequired
  ]),
  title: PropTypes.string.isRequired,
  details: PropTypes.element
}

Card.defaultProps = {
    details: null
}
