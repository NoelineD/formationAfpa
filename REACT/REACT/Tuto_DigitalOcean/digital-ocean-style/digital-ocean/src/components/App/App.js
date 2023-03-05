// import logo from './logo.svg';
import './App.css';
import Instructions from '../Instructions/Instructions';

const displayEmojiName = event => alert(event.target.id);
//const displayEmojiName = function (event) { alert(event.target.id)};

const emojis = [
  {
    emoji: "😀",
    name: "grinning face"
  },
  {
    emoji: "🎉",
    name: "party popper"
  },
  {
    emoji: "💃",
    name: "woman dancing"
  }
];

function App() {

  const greeting = 'idGreeting';
  const displayAction = true;

  return (
    <div className='container'>
      <h1 id={greeting}>Bonjour le monde</h1>
      {displayAction && <p>Je fais du React</p>}
      <Instructions />
      <ul>
      {
          emojis.map(emoji => (
            <li key={emoji.name}>
              <button
                onClick={displayEmojiName}
              >
                <span role="img" aria-label={emoji.name} 
                                    id={emoji.name}>{emoji.emoji}
                </span>
              </button>
            </li>
          ))
        }
      </ul>

    </div>
  );
}

export default App;
