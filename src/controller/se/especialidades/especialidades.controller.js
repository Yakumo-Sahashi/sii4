let input = ['nombre_especialidad','carrera_reticula','periodo_inicio', 'periodo_liquidacion','creditos_especialidad','creditos_optativos'];
let input2 = ['nombre_especialidad_actualizado','carrera_reticula_actualizado','periodo_inicio_actualizado','periodo_liquidacion_actualizado','creditos_especialidad_actualizado','creditos_optativos_actualizado'];
const obtener_carrera = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera_reticula','codigo_html'); 
    ejecucion.catalogo('carrera_reticula_actualizado','codigo_html');  
}

const mostrar_especialidades = async () => {
    bootstrap.Itma2.start_loader();    
    $(`#tabla_especialidad`).html(``);  
    $('#tabla_listado_especialidad').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_especialidad'); 
    const ejecucion = new Consultas("Especialidad", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(especialidades => {
        let {id_cat_especialidad,especialidad,carrera,periodo_inicio,periodo_fin,creditos_especialidad,creditos_optativos,estatus} = especialidades;
        if(especialidad != 'Sin especialidad'){
            tabla += `
            <tr> 
                <td class="align-middle text-start text-small">${especialidad}</td>
                <td class="align-middle text-small">${carrera}</td>
                <td class="align-middle text-small">${periodo_inicio}</td>
                <td class="align-middle text-small">${periodo_fin}</td>
                <td class="align-middle text-small">${creditos_especialidad}</td>
                <td class="align-middle text-small">${creditos_optativos}</td>
                <td class="align-middle"><button type="button" class="btn btn-primary btn-sm" onclick="precargar_especialidad(${id_cat_especialidad})"><i class="fa-regular fa-pen-to-square"></i></button></td>
                <td class="align-middle">${estatus == 0 ? `<button type="button" class="btn btn-danger btn-sm" onclick="habilitar_especialidad(${id_cat_especialidad})"><i class="fa-regular fa-circle-xmark"></i></button>` : `<button type="button" class="btn btn-success btn-sm" onclick="inhabilitar_especialidad(${id_cat_especialidad})"><i class="fa-solid fa-check"></i></button>`}</td>
            </tr>`;
        }
    });
    $(`#tabla_especialidad`).html(`${tabla}`);  
    $('#tabla_listado_especialidad').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader();       
}

const precargar_especialidad = async (id) => {
    bootstrap.Itma2.start_loader();    
    let datos = new FormData();
    datos.append('funcion','precargar_especialidad');
    datos.append('id',id); 
    const ejecucion = new Consultas("Especialidad", datos);
    let {id_cat_especialidad,especialidad,fk_cat_carrera,periodo_inicio,periodo_fin,creditos_especialidad,creditos_optativos} = await ejecucion.consulta();
    $('[name=id_especialidad_actualizado]').val(id_cat_especialidad);
    $('[name=nombre_especialidad_actualizado]').val(especialidad);
    $('[name=carrera_reticula_actualizado]').val(fk_cat_carrera);
    $('[name=periodo_inicio_actualizado]').val(periodo_inicio);
    $('[name=periodo_liquidacion_actualizado]').val(periodo_fin);
    $('[name=creditos_especialidad_actualizado]').val(creditos_especialidad);
    $('[name=creditos_optativos_actualizado]').val(creditos_optativos);
    $('#exampleModal').modal('show');
    bootstrap.Itma2.end_loader(); 
}

const actualizar_especialidad = () => {
    if (validar_campo(input2,'vacios')) {
        if(limitar_valor('creditos_especialidad_actualizado',0,99,"Los creditos de especialidad deben estar en el rango 1 y 99") && limitar_valor('creditos_optativos_actualizado',0,99,"Los creditos optativos deben estar en el rango 1 y 99")){
            let datos = new FormData($('#frm_actualizar_especialidad')[0]);
            datos.append('funcion', "actualizar_especialidad");
            const ejecucion = new Consultas("Especialidad", datos);
            ejecucion.insercion();
            mostrar_especialidades();
            $('#exampleModal').modal('hide');
        }
    }
}

const inhabilitar_especialidad = (id) => {
    swal({
        title:"Atencion!",
        text:"¿Quieres inhabilitar la especialidad?",
        icon:"warning",
        buttons:true,
        dangerMode:true,
    }).then((accion)=>{
        if(accion){
            let datos = new FormData();
            datos.append('funcion', "actualizar_estatus");
            datos.append('id', id);
            datos.append('estatus', '0');
            const ejecucion = new Consultas("Especialidad", datos);
            ejecucion.insercion();
            mostrar_especialidades();       
        }
    });
    
}

const habilitar_especialidad = (id) => {
    swal({
        title:"Atencion!",
        text:"¿Quieres habilitar la especialidad?",
        icon:"warning",
        buttons:true,
        dangerMode:true,
    }).then((accion)=>{
        if(accion){
            let datos = new FormData();
            datos.append('funcion', "actualizar_estatus");
            datos.append('id', id);
            datos.append('estatus', '1');
            const ejecucion = new Consultas("Especialidad", datos);
            ejecucion.insercion();
            mostrar_especialidades();       
        }
    });
    
}


obtener_carrera();
caracter_numeros('creditos_especialidad');
caracter_numeros('creditos_optativos');
caracter_mayus('nombre_especialidad');
mostrar_especialidades();


$(document).ready(() => {
    $('#frm_crear_especialidad').on('submit', (e) => {
      e.preventDefault();
      if (validar_campo(input,'vacios')) {
        if(limitar_valor('creditos_especialidad',0,99,"Los creditos de especialidad deben estar en el rango 1 y 99") && limitar_valor('creditos_optativos',0,99,"Los creditos optativos deben estar en el rango 1 y 99")){
           if($("#periodo_inicio").val() < $("#periodo_liquidacion").val()){

                let datos = new FormData($('#frm_crear_especialidad')[0]);
                datos.append('funcion', "crear_especialidad");
                const ejecucion = new Consultas("Especialidad", datos);
                ejecucion.insercion();
                $('#frm_crear_especialidad')[0].reset();
            }else{
                msj_error("La fecha de inicio no debe ser mayor o igual a la fecha de liquidacion ");
            }
        }
      }
    });
});

$('#btn_actualizar').on('click', () => {
    actualizar_especialidad();  
});