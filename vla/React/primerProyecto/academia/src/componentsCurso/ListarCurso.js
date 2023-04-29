//imr
import React, { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Modal from 'react-bootstrap/Modal';
//ccc

class ListarCurso extends React.Component {
    constructor(props) {
        super(props);
        this.state = {  
            datosCargados:false,
            datosCursos:[],
            modalOpen:false,
            nombre:"",
            descripcion:"",
            tiempo:"",
            id:0
        }
    }

    cargarDatos(){
        fetch("https://paginas-web-cr.com/ApiPHP/apis/ListaCurso.php")//solicitamos la url
        .then(repuesta=>repuesta.json())
        .then((datosRepuesta) =>
            {
                this.setState({ datosCargados: true, datosCursos:datosRepuesta.data })
                console.log(datosRepuesta.data)
            })
        .catch(console.log)
    }

    funcionEliminar=(id)=>{
        alert('eliminando datos:'+id);
        //crear la funcion de fecth
    }

    funcionActualizar=(objeto)=>{
        console.log('objeto',objeto);
        this.setState({ nombre: objeto.nombre});
        this.setState({ modalOpen: true});
        //modal y cargar los datos en los inputs del modal
        //luego de cargar los datos crear una funcion de actualizar datos
    }

    closeModal(){
        this.setState({ modalOpen: false});
    }

    cambiovalor = (e)=>{
        const state = this.state;
        state[e.target.name] = e.target.value;
        this.setState({state});
    };

    componentDidMount(){
        this.cargarDatos();
    }

    render() { 
//Carga los datos en el render
        const{datosCargados, datosCursos, modalOpen, nombre, descripcion , tiempo, id}=this.state


        return ( 
            <div className='container'>
    <Button variant="primary" onClick={() => this.funcionActualizar(1)} >
        Launch demo modal
      </Button>

      <Modal show={ modalOpen }>
        <Modal.Header closeButton onClick={() => this.closeModal()}>
          <Modal.Title>Modal heading</Modal.Title>
        </Modal.Header>
        <Modal.Body>
            <div className='modalPrincipal'>
                    <div className="mb-3">
                      <label htmlFor="" className="form-label">Nombre</label>
                      <input type="text"
                        className="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese su nombre"
                        onChange={this.cambiovalor} value={nombre} required
                        >                      
                      </input>
                    </div>
            </div>

        </Modal.Body>
        <Modal.Footer>
          <Button variant="secondary" onClick={() => this.closeModal()}>
            Close
          </Button>
          <Button variant="primary" >
            Save Changes
          </Button>
        </Modal.Footer>
      </Modal>


                <div className="table-responsive-xxl">
                    <table className="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Tiempo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {
                                datosCursos.map(
                                    (datosCursoExtraidos)=>(
                                        <tr key={datosCursoExtraidos.id}>    
                                            <td>{datosCursoExtraidos.id}</td>
                                            <td>{datosCursoExtraidos.nombre}</td>
                                            <td>{datosCursoExtraidos.descripcion}</td>
                                            <td>{datosCursoExtraidos.tiempo}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-warning" onClick={() => this.funcionActualizar(datosCursoExtraidos)}>Editar</button>
                                                    <button type="button" class="btn btn-danger" onClick={() => this.funcionEliminar(datosCursoExtraidos.id)}>Borrar</button>
                                                </div>
                                            </td>
                                        </tr> 
                                    )
                                )
                            }
                        
                        </tbody>
                    </table>
                </div>
                
            </div>

         );
    }
}
 
export default ListarCurso;

// Compiled with problems:X

// ERROR

// [eslint] 
// src\componentsCurso\ListarCurso.js
//   Line 6:27:  'Component' is not defined  no-undef

// Search for the keywords to learn more about each error.