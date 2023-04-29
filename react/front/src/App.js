import logo from './logo.svg';
import './App.css';
import MenuPrincipal from './componentsPlantilla/Menu';
import Menus from './componentsPlantilla/Menu';
import MenusMario from './componentsPlantilla/Menu';


function App() {
  return (
    <div className="App">
      <MenuPrincipal></MenuPrincipal>
      <Menus></Menus>
      <MenusMario></MenusMario>
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
          Mensaje de bienvenida
        </p>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>
    </div>
  );
}

export default App;
