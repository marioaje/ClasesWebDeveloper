import React from 'react';
import logo from '../logo.svg';

class Dashboard extends React.Component {
    constructor(props) {
        super(props);
    }
    state = {  }
    render() { 
        return ( 
            <div className='m-0 row justify-content-center'>
                <h1>Proyecto Front End 10 M 2022</h1>
                <img src={logo} className="App-logo" alt="logo" />
            </div>
         );
    }
}
 
export default Dashboard;