import React, { Component } from 'react';
import logo from './logo.svg';
import './Instructions.css';

export default class Instructions extends Component
{

    render(){
        return (
            <div className='instructions'>
                <img alt="logo" src={logo} />
                <p>Cliquez sur emoji</p>
            </div>
        )
    }

}