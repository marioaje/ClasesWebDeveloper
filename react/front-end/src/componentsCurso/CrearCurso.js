import React from 'react';

class CrearCurso extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
          nombre:"",
          descripcion:"",
          tiempo:"",
          datosCargados:false
        }
    }

    cambioValor = (e) =>{
      const state = this.state;
      state[e.target.name] = e.target.value;
      this.setState({state});
    }

    enviarDatos = (e) =>{
      e.preventDefault();
      
      const { nombre, descripcion, tiempo } = this.state;
  
      var datosEnviar = {
        nombre: nombre,
        descripcion: descripcion,
        tiempo: tiempo,
        usuario:"Prof. Mario J" 
      }
      console.log("Datos enviados", datosEnviar);
      fetch("https://paginas-web-cr.com/ApiPHP/apis/InsertarCursos.php",
      {
        method:"POST",
        body:JSON.stringify(datosEnviar)
      })
      .then(respuesta=>respuesta.json())//Solicitamos el json
      .then((datosRespuesta)=>{
          this.setState ({ datosCargado:true} );
          alert("Datos almacenados");
        //  window.location = '/ListarCurso';
      })
      .catch(console.log)
    }
    state = {  }
    render() { 
        const { nombre, descripcion, tiempo, datosCargado } = this.state;
        return ( 
            <div className='form-control'>
                <form onSubmit={this.enviarDatos}>
                    <div className="mb-3">
                      <label htmlFor="" className="form-label">Nombre</label>
                      <input type="text"
                        className="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre del curso"  onChange={this.cambioValor} value={nombre}></input>
                      <small id="helpId" className="form-text text-muted">Nombre</small>
                    </div>
                    <div className="mb-3">
                      <label htmlFor="" className="form-label">Descripcion</label>
                      <input type="text"
                        className="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Ingrese su descripcion" onChange={this.cambioValor} value={descripcion}></input>
                      <small id="helpId" className="form-text text-muted">Descripcion</small>
                    </div>
                    <div className="mb-3">
                      <label htmlFor="" className="form-label">Tiempo</label>
                      <input type="text"
                        className="form-control" name="tiempo" id="tiempo" aria-describedby="helpId" placeholder="Por Ejmplo 6 Meses" onChange={this.cambioValor} value={tiempo}></input>
                      <small id="helpId" className="form-text text-muted">Tiempo</small>
                    </div>                                                            
                    <div className='mb-3'>
                        <div className="d-grid gap-2">
                          <button type="submit" className="btn btn-primary">Save</button>
                          ||
                          <button type="reset" className="btn btn-danger">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
         );
    }
}
 
export default CrearCurso;