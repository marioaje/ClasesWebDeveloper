import React  from 'react';

class MenuPrincipal extends React.Component {
    constructor(props) {
        super(props);
    }
    state = {  }
    render() { 
        return ( 
            <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
                <ul className="nav navbar-nav">
                    <li className="nav-item">
                        <a className="nav-link" href="/">DashBoard</a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="/ListarCurso">Listar Curso</a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="/CrearCurso">Crear Curso</a>
                    </li>
                </ul>
            </nav>
         );
    }
}
 
export default MenuPrincipal;