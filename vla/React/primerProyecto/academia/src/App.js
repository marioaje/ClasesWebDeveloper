//import logo from './logo.svg';
import './App.css';
import 'bootstrap/dist/css/bootstrap.css';

//Seccion de modulos o componentes
import MenuPrincipal from './componetsPlantilla/Menu';
import ListarCurso from './componentsCurso/ListarCurso';
import Dashboard from './componetsPlantilla/Dashboard';
import CrearCurso from './componentsCurso/CrearCurso';

import { Route, BrowserRouter as Router } from 'react-router-dom';

function App() {
  return (
    <div className="App">
      <MenuPrincipal></MenuPrincipal>
      <Router>
        <Route exact path="/" component={Dashboard}></Route>
        <Route path='/ListarCurso' component={ListarCurso}></Route>
        <Route path='/CrearCurso' component={CrearCurso}></Route>
      </Router>      
    </div>
  );
}

export default App;
