import './App.css';
import animals from './data';
import AnimalCard from '../AnimalCard/AnimalCard';

function App() {
  return (
    <div className="wrapper">
      <h1>Animals</h1>
      {animals.map(animal => (
        <AnimalCard
          key={animal.name}
          name={animal.name}
          size={animal.size}
          foods={animal.diet}
          scientName={animal.scientificName}
          />
      ))}
    </div>
  );
}

export default App;
