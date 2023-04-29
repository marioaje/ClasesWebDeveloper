//imr
import React from 'react';
// import Dropdown from 'react-bootstrap/Dropdown';
// import NavItem from 'react-bootstrap/NavItem';
// import NavLink from 'react-bootstrap/NavLink';
//ccc
class MenuPrincipal extends React.Component {
    constructor(props) {
        super(props);
    }
    state = {  }
    render() { 
        return ( 

            <div className="container-fluid">
                <ul className="nav justify-content-center  ">
                    <li className="nav-item">
                        <a className="nav-link" href="/" aria-current="page">Main</a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="/ListarCurso">Listar Curso</a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="/CrearCurso">Crear Curso</a>
                    </li>
                    
                </ul>
            </div>            

         );
    }
}
export default MenuPrincipal;