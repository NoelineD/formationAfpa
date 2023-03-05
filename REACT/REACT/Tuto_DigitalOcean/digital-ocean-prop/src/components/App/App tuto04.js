import './App.css';
import data from './data';
import AnimalCard from '../AnimalCard/AnimalCard';

function showAdditional(additional) {
  console.log(additional);
  const alertInformation = Object.entries(additional);
  console.log(alertInformation);
    alertInformation.map(information => `${information[0]}: ${information[1]}`)
    .join('\n');
  alert(alertInformation)
};


function App() {
  return (
    <div className="wrapper">
      <h1>Animals</h1>
      {data.map(animal => (
        <AnimalCard
          key={animal.name}
          name={animal.name}
          scientificName={animal.scientificName}
          size={animal.size}
          diet={animal.diet}
          additional={animal.additional}
          showAdditional={showAdditional}
          />
      ))}
    </div>
  );
}

export default App;
