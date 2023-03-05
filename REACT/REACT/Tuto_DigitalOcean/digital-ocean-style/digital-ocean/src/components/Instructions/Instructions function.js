import logo from './logo.svg';
import './Instructions.css';

export default function Instructions()
{

        return (
            <div className='instructions'>
                <img alt="logo" src={logo} />
                <p>Cliquez sur emoji</p>
            </div>
        )

}