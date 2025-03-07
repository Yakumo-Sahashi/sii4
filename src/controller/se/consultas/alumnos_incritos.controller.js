let input_alumnos_incritos = ['carrera','periodo'];
let ex_numeros = /[0-9]$/;
const obtener_periodos = () => {
    let datos = new FormData();
    datos.append('funcion', "obtener_periodos");
    const ejecucion = new Consultas("Examenes", datos);
    ejecucion.catalogo('periodo','codigo_html');  
}

const obtener_carrera = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera','codigo_html');  
}

const precargar_informacion = async (alumno,persona) => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion', 'informacion_general');
    datos.append('alumno', alumno);
    datos.append('persona',persona);
    const ejecucion = new Consultas("AlumnosGenerales", datos);
    let respuesta = await ejecucion.consulta();
    let {numero_control,nombre_carrera,tipo_ingreso,clave_reticula,identificacion_corta,periodos_revalidados,escolaridad,descripcion_estatus,especialidad} = respuesta[1];
    let {apellido_paterno,apellido_materno,nombre_persona,curp,telefono,correo,fecha_nacimiento,lugar_nacimiento,estado_civil,sexo,codigo_postal,entidad_federativa,alcaldia,colonia,calle,numero_interior,numero_exterior,id_usuario} = respuesta[0];
    let contenido = `
        <tr class="bg-claro">
            <td colspan="4">
                <b>DATOS PERSONALES</b>
            </td>
        </tr>
        <tr class="text-small bg-primary text-white text-center">
            <td>Apellido paterno</td>
            <td>Apellido materno</td>
            <td>Nombre</td>
            <td>No. control</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${apellido_paterno}</td>
            <td class="align-middle">${apellido_materno}</td>
            <td class="align-middle">${nombre_persona}</td>
            <td class="align-middle">${numero_control}</td>
        </tr>
        <tr class="text-small bg-primary text-white text-center">
            <td>Lugar nacimiento</td>
            <td>Fecha nacimiento</td>
            <td>Sexo</td>
            <td>Estado civil</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${lugar_nacimiento}</td>
            <td class="align-middle">${fecha_nacimiento}</td>
            <td class="align-middle">${sexo}</td>
            <td class="align-middle">${estado_civil}</td>
        </tr>
        <tr class="text-small bg-primary text-white text-center">
            <td>Domicilio</td>
            <td>Colonia</td>
            <td>C.P</td>
            <td>Alcaldia</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${calle}, No. Ext. ${numero_exterior}, No. Int. ${numero_interior}</td>
            <td class="align-middle">${colonia}</td>
            <td class="align-middle">${codigo_postal}</td>
            <td class="align-middle">${alcaldia}</td>
        </tr>  
        <tr class="text-small bg-primary text-white text-center">
            <td>Estado</td>
            <td>Telefono</td>
            <td>CURP</td>
            <td>Correo electronico</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${entidad_federativa}</td>
            <td class="align-middle">${telefono}</td>
            <td class="align-middle">${curp}</td>
            <td class="align-middle">${correo}</td>
        </tr>   
        <tr>
            <td><br></td>
        <tr/>
        <tr class="bg-claro">
            <td colspan="4">
                <b>DATOS ESCOLARES</b>
            </td>
        </tr>
        <tr class="text-small bg-primary text-white text-center">
            <td>Carrera y Reticula</td>
            <td>Especialidad</td>
            <td>Periodo ingreso</td>
            <td>Periodos revalidados</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${nombre_carrera}</td>
            <td class="align-middle">${especialidad}</td>
            <td class="align-middle">${identificacion_corta}</td>
            <td class="align-middle">${periodos_revalidados}</td>
        </tr>  
        <tr class="text-small bg-primary text-white text-center">
            <td>Tipo de ingreso al plantel</td>
            <td>Plan de estudios</td>
            <td>Nivel escolar</td>
            <td>Estatus alumno</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${tipo_ingreso}</td>
            <td class="align-middle">${clave_reticula}</td>
            <td class="align-middle">Licenciatura</td>
            <td class="align-middle">${descripcion_estatus}</td>
        </tr>   
    `;
    $('#contenido_tabla_datos_alumno').html(contenido);
    $('#img_foto').attr('src',`public/img/alumno/${id_usuario}/fotografia.webp`)
    $('#datos_generales').modal('show');
    bootstrap.Itma2.end_loader();
}

const mostrar_alumnos_incritos = async () => {
    bootstrap.Itma2.start_loader();
    let periodo_seleccionado = $('[name=periodo]').val();
    $(`#cotenido_tabla_alumnos`).html(``);
    $('#tabla_alumnos').DataTable().destroy();
    let datos = new FormData($('#frm_actas')[0]);
    datos.append('funcion', 'mostrar_alumnos_incritos');
    const ejecucion = new Consultas("AlumnosInscritos", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(alumno => {
        let {id_alumno,fk_persona,numero_control,nombre,semestre,carga,promedio,fk_cat_carrera,fk_numero_control} = alumno;
        let {pro,credit} = promedio;
        tabla += `
        <tr>
            <td class="align-middle text-small">${numero_control}</td>
            <td class="align-middle text-small">${nombre}</td>
            <td class="align-middle text-small">${semestre}</td>
            <td class="align-middle text-small">${credit}</td>
            <td class="align-middle text-small">${carga}</td>
            <td class="align-middle text-small">${pro}</td>
            <td><button type="button" class="btn btn-outline-primary" onclick="precargar_informacion(${id_alumno},${fk_persona})"><i class="fa-solid fa-circle-info"></i></button></td>
            <td class="align-middle"><button type="button" class="btn btn-outline-primary" onclick="reticula_avance(${fk_cat_carrera},${fk_numero_control})"><i class="fa-solid fa-table-list"></i></button></td>
            <td class="align-middle">
                <form action="app/docs/horario_alumno_semestre.doc.php" method="POST" targe="_blank">
                    <input type="text" name="periodo" value="${periodo_seleccionado}" hidden>
                    <input type="text" name="alumno" value="${id_alumno}" hidden>
                    <button type="submit" class="btn btn-outline-primary"><i class="fa-regular fa-calendar-days"></i></butto>
                </form>
            </td>
        </tr>
        `;
    });
    $(`#cotenido_tabla_alumnos`).html(`${tabla}`);
    $('[name=periodo_imp]').val(periodo_seleccionado);
    $('[name=carrera_imp]').val($('[name=carrera]').val());
    $('#tabla_alumnos').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    $('#container_tabla').removeClass('d-none');
    $('#buscador').addClass('d-none');
    bootstrap.Itma2.end_loader();
}

obtener_periodos();
obtener_carrera();

const reticula_avance = async (id_carrera,id_num_control) =>{
    bootstrap.Itma2.start_loader();
    $('#carrera_elegida').text($('select[name="carrera"] option:selected').text());
    let datos = new FormData();
    datos.append('funcion',"obtener_movimientos");
    datos.append('id_carrera',id_carrera);
    datos.append('id_num_control',id_num_control);
    const ejecucion = new Consultas("InscripcionPeriodo",datos);
    let respuesta = await ejecucion.consulta();
    let materias = respuesta[0];
    let calificaciones = respuesta[1];
    let horarios = respuesta[2];
    let cont = 0, temp = 1, posicion = 0;;
    let contenido = ``, texto= '';
    const semestres = [];
    for(let i = 1; i < 10; i++){
        semestres[i] = new Array();
        for(let j = 1 ; j < 9; j++){
            semestres[i][j] = '';
        }
    }
    materias.map(({semestre,renglon} = reticula_carrera) =>{
        semestres[semestre][renglon] = materias[cont];
        cont++;
    });
    cont = 0;
    let impresion = 0;
    semestres.map(materias_plan => {
        if(materias_plan != ''){
            materias_plan.map(({id_cat_materias,clave,nombre_abreviado_materia} = info) =>{
                if(nombre_abreviado_materia != undefined){
                    calificaciones.map(({calificacion,siglas,fk_cat_materias, color} = calf) =>{
                        if(fk_cat_materias == id_cat_materias){
                            contenido += `
                                <div class="p-1 text-center border cuadricula text-small sin-scroll ${color}">
                                    <div class="mt-1">
                                        <b>${clave}<br>
                                        ${nombre_abreviado_materia}</b><br>
                                        ${ex_numeros.test(calificacion) && calificacion != 0 ? calificacion +'  / ' +siglas : ''}                                        
                                    </div>
                                </div>
                            `;
                            impresion = 1;
                        }
                    });
                    if(impresion == 0){
                        horarios.map( ({fk_cat_materias} = horario) => {
                            if(fk_cat_materias == id_cat_materias){
                                texto = 'bg-cuadricula-azul';
                            }
                        });                        
                        contenido += `
                            <div class="p-1 text-center border cuadricula text-small sin-scroll ${texto != '' ? texto : 'bg-cuadricula-none'}">
                                <div class="mt-1">
                                    <b>${clave}<br>
                                    ${nombre_abreviado_materia}</b>
                                </div>
                            </div>
                        `; 
                    }
                    texto = '';
                    impresion = 0;
                }else{
                    contenido += `
                        <div class="p-1 text-center border cuadricula text-small sin-scroll bg-white">
                            <div class="mt-1">
                                <br>
                            </div>
                        </div>
                    `; 
                }
                cont++;
            });
            cont = 0;
            $(`#seccion_materias_${temp}`).html(contenido);
            contenido = ``;
            temp ++;
            posicion++;
        }
    });
    $('#seccion_reticula').removeClass('d-none');
    $('#codigo_colores').removeClass('d-none');
    $('#container_tabla').addClass('d-none');
    bootstrap.Itma2.end_loader();
}

$('#btn_regresar').on('click',() => {
    $('#seccion_reticula').addClass('d-none');
    $('#codigo_colores').addClass('d-none');
    $('#container_tabla').removeClass('d-none');
});

$('#btn_regresa_busqueda').on('click',() => {
    $('#container_tabla').addClass('d-none');
    $('#buscador').removeClass('d-none');
    $('#frm_actas')[0].reset();
});


$(document).ready(()=>{
    $('#frm_actas').on('submit',(e)=>{
        e.preventDefault();
        if(validar_campo(input_alumnos_incritos,'vacios')){
            mostrar_alumnos_incritos();
        }
    });    
});        

