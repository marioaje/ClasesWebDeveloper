//import React from 'react';
import React, { useState } from "react";
import Modal from "../modal/Modal";



class ListarCurso extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            datosCargado:false,
            datosCurso:[]
        }
       
    }



    cargarDatos(){
        fetch("https://paginas-web-cr.com/ApiPHP/apis/ListaCurso.php")//Url del servicio
        .then(respuesta=>respuesta.json())//Solicitamos el json
        .then((datosRespuesta)=>{
            this.setState ({ datosCargado:true, datosCurso: datosRespuesta.data } )
            //console.trace(datosRespuesta.data)
        })//Cargamos los datos
        .catch(console.log)
    }

    componentDidMount(){
        this.cargarDatos();
    }

    functionEliminar=(id)=>{
        var datosEnviar = {
            id: id
        }
        this.borrarDatos(datosEnviar)
        alert("Eliminando el registro: "+id);
        window.location = '/ListarCurso';
    };

    functionEditar=(datos)=>{
        console.log('datos',datos);
        // var datosEnviar = {
        //     id: id
        // }
        // this.borrarDatos(datosEnviar)
        // alert("Eliminando el registro: "+id);
        // window.location = '/ListarCurso';
    };    

    editarDatos(datos){
        var datosEnviar = {
            id: datos.id,
            nombre: datos.nombre,
            descripcion: datos.descripcion,
            tiempo: datos.tiempo,
            usuario:"Prof. Mario J" 
          }
          console.log("Datos enviados", datosEnviar);
          fetch("https://paginas-web-cr.com/ApiPHP/apis/ActualizarCursos.php",
          {
            method:"POST",
            body:JSON.stringify(datosEnviar)
          })
          .then(respuesta=>respuesta.json())//Solicitamos el json
          .then((datosRespuesta)=>{
              this.setState ({ datosCargado:true} );
              alert("Datos actualizado");
              window.location = '/ListarCurso';
          })
          .catch(console.log)
    }


    borrarDatos(datosEnviar){
        fetch("https://paginas-web-cr.com/ApiPHP/apis/BorrarCursos.php",
        {
          method:"POST",
          body:JSON.stringify(datosEnviar)
        })        //Url del servicio
        .then(respuesta=>respuesta.json())//Solicitamos el json
        .then((datosRespuesta)=>{
           // this.setState ({ datosCargado:true, datosCurso: datosRespuesta.data } )
            //console.trace(datosRespuesta.data)
        })//Cargamos los datos
        .catch(console.log)
    }

    state = {  }
    
    render() { 
        const {datosCargado, datosCurso}= this.state;

        if(!datosCargado){
            return(
                <button className="btn btn-primary" type="button" disabled>
                    <span className="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            )
        }
        else{
           // const [modalOpen, setModalOpen] = useState(false);
            return ( 
                
                <div className="table-responsive">
                    <h1>Hey, click on the button to open the modal.</h1>
                        <button
                            className="openModalBtn"
                        //     onClick={() => {
                        //   //  setModalOpen(true);
                        //     }}
                        >
                            Open
                        </button>

                        {modalOpen && <Modal setOpenModal={setModalOpen} />}
                    <table className="table table-primary">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Tiempo</th> 
                                <th>Acciones</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            {
                            datosCurso.map(
                                (datosCursoExtraido)=>(
                                    <tr key={datosCursoExtraido.id}>
                                        <td> {datosCursoExtraido.id} </td>
                                        <td> {datosCursoExtraido.nombre} </td>
                                        <td> {datosCursoExtraido.descripcion} </td>
                                        <td> {datosCursoExtraido.tiempo} </td>
                                        <td>                                             
                                            <div className="d-grid gap-2">
                                            <button type="button" name="modificar" id="modificar" className="btn btn-success" onClick= {() => this.functionEditar(datosCursoExtraido)}>Editar</button> 
                                            ||
                                            <button type="button" name="eliminar" id="eliminar" className="btn btn-danger" onClick= {() => this.functionEliminar(datosCursoExtraido.id)}>Eliminar</button> 
                                                

                                            </div>
                                        </td>
                                    </tr>
                                )
                            )
                        }
                        </tbody>
                    </table>
                </div>              
    
            );
        }




    }
}
 
export default ListarCurso;