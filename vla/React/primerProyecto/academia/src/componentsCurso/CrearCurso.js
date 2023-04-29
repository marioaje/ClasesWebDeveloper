import React from 'react';

class CrearCurso extends React.Component {
    constructor(props) {
        super(props);
    }
    //{"id":"335","nombre":"c","descripcion":"c","tiempo":"c"}
    state = {  
        nombre:"",
        descripcion:"",
        tiempo:"",
        datosCargados:false
    }

    cambiovalor = (e)=>{
        const state = this.state;
        state[e.target.name] = e.target.value;
        this.setState({state});
    };

    enviarDatos= (e)=>{
        e.preventDefault();
        const { nombre, descripcion , tiempo} = this.state;

        var datosEnviar = {
            nombre: nombre,
            descripcion: descripcion,
            tiempo: tiempo,
            usuario:"profesor Mario"
        }

        fetch("https://paginas-web-cr.com/ApiPHP/apis/InsertarCursos.php",
        {
            method:"POST",
            body:JSON.stringify(datosEnviar)
        })//enviamos la url
        .then(respuesta=>respuesta.json())
        .then((datosRepuesta)=>{
            this.setState ({datosCargados:true});
            window.location = '/ListarCurso';

        })
        .catch(console.log);
        
    }


    render() { 
        const { nombre, descripcion , tiempo, datosCargados } = this.state;
        return ( 

            <div className="container">
                <h2>Crear Carrera o Curso</h2>
                <form onSubmit={this.enviarDatos}>
                    <div className="mb-3">
                      <label htmlFor="" className="form-label">Nombre</label>
                      <input type="text"
                        className="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese su nombre"
                        onChange={this.cambiovalor} value={nombre} required
                        >                      
                      </input>
                    </div>
                    <div className="mb-3">
                      <label htmlFor="" className="form-label">Descripcion</label>
                      <input type="text"
                        className="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Ingrese su descripcion"
                        onChange={this.cambiovalor} value={descripcion} required>                      
                      </input>
                    </div>
                    <div className="mb-3">
                      <label htmlFor="" className="form-label">Tiempo</label>
                      <input type="text"
                        className="form-control" name="tiempo" id="tiempo" aria-describedby="helpId" placeholder="Tiempo"
                        onChange={this.cambiovalor} value={tiempo} required>
                      </input>
                    </div>     
                    <div className="mb-3">
                        <button type="reset" className="btn btn-danger">Reset</button>
                        ||
                        <button type="submit" className="btn btn-primary">Save</button>
                    </div>                                   
                </form>
            </div>

         );
    }
}
 
export default CrearCurso;