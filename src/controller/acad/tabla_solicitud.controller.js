//$(document).ready(function () {
    const mostrar_contenido = async () => {
        $(`#tabla_datos`).html(``);  
        $('#tabla_solicitud_datos').DataTable().destroy();
        let datos = new FormData();
        datos.append('funcion','mostrarDatos');
        const ejecucion = new Consultas("NumerosControlAcad", datos);
        let respuesta = await ejecucion.consulta();
        let tabla = ``;
        respuesta.map(aux =>{
            let {descripcion_solicitud,solicitud,estado_solicitud} = aux;
            if(estado_solicitud == 1){
                estado_solicitud = '<span class="text-success">Aprobada</span>';
            }else if(estado_solicitud == 2){
                estado_solicitud = '<span class="text-danger">Rechazada</span>';
            }else{
                estado_solicitud = '<span class="text-primary">En espera</span>';
            }
            let {fecha_realizo_solicitud,fecha_atencion_solicitud} = aux;
            if(fecha_atencion_solicitud == null){
                fecha_atencion_solicitud =  '<span class="text-primary">En espera</span>';
            }
            tabla+= `
            <tr>
                <td>${descripcion_solicitud}</td>
                <td>${solicitud}</td>
                <td>${estado_solicitud}</td>
                <td>${fecha_realizo_solicitud}</td>
                <td>${fecha_atencion_solicitud}</td>
            </tr>`;
        });
        $(`#tabla_datos`).html(`${tabla}`);
        $(`#tabla_solicitud_datos`).DataTable({
            "language": {
                "url": "./json/lenguaje.json"
            }
        });
        bootstrap.Itma2.end_loader();       
    }
    mostrar_contenido();
    // Esto genera la ventanita que marca un error
    // $('#btn_generar').click(()=>{
    //     mostrar_contenido();
    // });
//});