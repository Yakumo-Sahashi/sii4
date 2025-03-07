$(()=>{
    const listado_control = async (filtro) => {
        $(`#tabla_listado_num_ctrl`).html(``);  
        $('#table_created_rooms').DataTable().destroy();
        let datos = new FormData();
        datos.append('funcion','mostrar_num_control');
        datos.append('filtro',filtro)
        const ejecucion = new Consultas("CreacionNumerosControl", datos);
        let respuesta = await ejecucion.consulta();
        let tabla = ``;
        if(respuesta == ""){
            tabla += `
            <tr> 
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td class="align-middle text-uppercase"></td>
            </tr>`;
        }else{
            respuesta.map(control => {
                let {numero_control,autorizar,estatus,fecha_autorizacion} = control;
                tabla += `
                <tr> 
                    <td class="align-middle">${numero_control}</td>
                    <td class="align-middle">${estatus == 'disponible' ? `<b class="text-primary">Disponible</b>` : `<b class="text-danger">Asignado</b>`}</td>
                    <td class="align-middle">${fecha_autorizacion}</td>
                    <td class="align-middle text-uppercase">${autorizar}</td>
                </tr>`;
            });
        }
        $(`#tabla_listado_num_ctrl`).html(`${tabla}`);  
        $('#table_created_rooms').DataTable({
            "language": {
                "url": "./json/lenguaje.json"
            }
        });
        
    }
    listado_control("");
    $(`[name=select_estado]`).on('change', ()=>{
        listado_control(($(`[name=select_estado]`).val()));
    });
})