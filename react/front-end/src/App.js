//import logo from './logo.svg';
import MenuPrincipal from './componetLayout/Menu';
import ListarCurso from './componentsCurso/ListarCurso';
import Dashboard from './componetLayout/Dashboard';
import CrearCurso from './componentsCurso/CrearCurso';


import './App.css';
import 'bootstrap/dist/css/bootstrap.css';
import { Route, BrowserRouter as Router } from 'react-router-dom';
import React, { useState } from "react";
import Modal from "./modal/Modal";

function App() {
  const [modalOpen, setModalOpen] = useState(false);

  return (
    <div className="App">
        <h1>Hey, click on the button to open the modal.</h1>
              <button
                className="openModalBtn"
                onClick={() => {
                  setModalOpen(true);
                }}
              >
                Open
              </button>

              {modalOpen && <Modal setOpenModal={setModalOpen} />}
      <MenuPrincipal></MenuPrincipal>
      {/* <img src={logo} className="App-logo" alt="logo" /> */}
      <Router>
        <Route exact path="/" component={Dashboard}></Route>
        <Route path="/ListarCurso" component={ListarCurso}></Route>   
        <Route path="/CrearCurso" component={CrearCurso}></Route>
      </Router>



    </div>
  );
}

export default App;
