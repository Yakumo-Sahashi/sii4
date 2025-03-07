//$(document).ready(() => {
    let id_img = 400;
    const filtrar_contenido = async (filtro, tipo) => {
        bootstrap.Itma2.start_loader();    
        $(`#tabla_alumno`).html(``);  
        $('#tabla_listado_alumno').DataTable().destroy();
        let datos = new FormData();
        if(filtro != 0){
            datos.append('tipo', `${tipo}`);
            datos.append('filtro', `${filtro}`);
        }
        datos.append('funcion','consultar_alumnos'); 
        const ejecucion = new Consultas("Alumnos", datos);
        let respuesta = await ejecucion.consulta();
        let tabla = ``;
        respuesta.map(alumno => {
            id_img ++;
            let {id_alumno,fk_persona,numero_control,nombre_persona,apellido_paterno,apellido_materno,carrera,semestre,id_usuario} = alumno;
            tabla += `
            <tr> 
                <td class="align-middle"><img loading="lazy" class="thumb" src="public/img/alumno/${id_usuario}/fotografia.webp?img=${id_img}" title="${numero_control}" alt="${numero_control}"></td>
                <td class="align-middle">${numero_control}</td>
                <td class="align-middle">${nombre_persona}</td>
                <td class="align-middle">${apellido_paterno}</td>
                <td class="align-middle">${apellido_materno}</td>
                <td class="align-middle">${carrera}</td>
                <td class="align-middle">${semestre}</td>
                <td class="align-middle"><button type="button" class="btn btn-success rounded-3 mb-2"  onclick="precargar_alumno(${id_alumno})" id="btn_ver"><i class="far fa-edit"></i></button></td>
            </tr>`;
        });
        $(`#tabla_alumno`).html(`${tabla}`);  
        $('#tabla_listado_alumno').DataTable({
            "language": {
                "url": "./json/lenguaje.json"
            }
        });  
        bootstrap.Itma2.end_loader();       
    }

    filtrar_contenido(0);
    $(`[name=carrera]`).on('change', ()=>{
        $(`[name=semestre]`).val(0); 
        $(`[name=control]`).val(0);  
        filtrar_contenido(($(`[name=carrera]`).val()), "carrera");     
    });

    $(`[name=semestre]`).on('change', ()=>{
        $(`[name=carrera]`).val(0);
        $(`[name=control]`).val(0); 
        filtrar_contenido(($(`[name=semestre]`).val()), "semestre");
    });

    $(`[name=control]`).on('change', ()=>{
        $(`[name=carrera]`).val(0);
        $(`[name=semestre]`).val(0);
        filtrar_contenido(($(`[name=control]`).val()), "control");
    });
//});