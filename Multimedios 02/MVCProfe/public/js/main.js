const urlprincipal = "http://localhost/academia40/Multimedios%2002/MVCProfe/";
//const urlprincipal = "https://paginas-web-cr.com/condominio/";


function eliminar(ids){
    var myModal = new bootstrap.Modal(document.getElementById('modelId'));
    myModal.show();
    $("#ids").text(ids);
    $("#idsdelete").val(ids);                 
}

function eliminarDatosGeneral(action){
    const idsdelete = $("#idsdelete").val();            

    httpRequest(urlprincipal+action+idsdelete, function(){                
        const tbody = document.querySelector("#myTable");
        const fila = document.querySelector("#fila-"+idsdelete);                
        tbody.removeChild(fila);
    });    

    var myModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('modelId'));
    myModal.hide();
}

//Search in the table
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});