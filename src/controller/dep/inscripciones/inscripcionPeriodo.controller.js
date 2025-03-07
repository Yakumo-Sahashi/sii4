let input = ['num_ctrl'];
let ex_numeros = /[0-9]$/;

$("#datos_alumno").hide();
$("#tabla_movimientos").hide();
$("#codigo_colores").hide();

const precargar_horario = async(id) => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"precargar_horario");
    datos.append('alumno',id);
    const ejecucion = new Consultas("InscripcionPeriodo",datos);
    let resultado = await ejecucion.consulta();
    let contenido = ``;
    let cr_total = 0;
    if(resultado.length > 0){
        $('#btn_imprimir_horario').removeClass('d-none');
        resultado.map(materia => {
            let {lunes,martes,miercoles,jueves,viernes,sabado,nombre_grupo,nombre,creditos_totales,clave,docente} = materia;    
            contenido += `
                <tr>
                    <th class="text-start align-self-center text-small">
                        ${clave}<br>
                        <b>${nombre}</b><br>
                        ${docente}
                    </th>
                    <th class="align-self-center text-small">${nombre_grupo}</th>
                    <th class="align-self-center text-small">${creditos_totales}</th>
                    <th class="align-self-center text-small">${lunes}</th>
                    <th class="align-self-center text-small">${martes}</th>
                    <th class="align-self-center text-small">${miercoles}</th>
                    <th class="align-self-center text-small">${jueves}</th>
                    <th class="align-self-center text-small">${viernes}</th>
                    <th class="align-self-center text-small">${sabado}</th>
                </tr>
            `;
            cr_total += parseInt(creditos_totales);
        });
        contenido += `
            <tr>
                <th colspan="2" class="text-start bg-primary text-white">Creditos Totales:</th>
                <th>${cr_total}</th>
            </tr>
        `;
    }else{
        $('#btn_imprimir_horario').addClass('d-none');
        contenido += `
            <tr>
                <th colspan="9">SIN MATERIAS SELECCIONADAS</th>
            </tr>
        `;
    }
    $('#horario_alumno').html(contenido);
    $('#materias_selecionadas_modal').modal('show');
    bootstrap.Itma2.end_loader();
}

const obtener_datos_alumno = async() =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData($('#frm_inscripcion_periodo')[0]);
    datos.append('funcion',"obtener_alumno");
    const ejecucion = new Consultas("InscripcionPeriodo",datos);
    let resultado = await ejecucion.consulta();
    if(resultado[0] == 1){
        let {id_usuario,id_alumno,fk_persona,nombre_persona,apellido_paterno,apellido_materno,numero_control,fk_numero_control,semestre,identificacion_corta,fk_cat_carrera,carrera,promedio_aritmetico_acumulado,especialidad} = resultado[1];
        $('[name=nombre_alumno]').val(`${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}`);
        $('[name=numero_control]').val(`${numero_control}`); 
        $('[name=id_hr_alumno]').val(`${fk_numero_control}`);
        $('[name=id_hr_carrera]').val(`${fk_cat_carrera}`);
        $('[name=alumno]').val(`${id_alumno}`);
        $('[name=semestre]').val(`${semestre}`);
        $('[name=periodo_escolar]').val(`${identificacion_corta}`);  
        $('[name=carrera]').val(`${carrera}`);
        $('[name=prom_acumulado]').val(`${promedio_aritmetico_acumulado  == null ? '0' : promedio_aritmetico_acumulado}`);
        $('[name=especialidad]').val(`${especialidad}`);
        $('#img_foto').attr('src',`public/img/alumno/${id_usuario}/fotografia.webp`);
        tabla_materias(fk_cat_carrera,fk_numero_control);
        $("#datos_alumno").show();
        $("#tabla_movimientos").show();
        $("#codigo_colores").show();
        $("#frm_inscripcion_periodo").hide();
    }else{
        msj_error(resultado[1])
    }
    setTimeout(() => {
        bootstrap.Itma2.end_loader();
    },"1500");
}

const precargar_materia = async(id) => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"precargar_materia");
    datos.append('materia',id);
    const ejecucion = new Consultas("InscripcionPeriodo",datos);
    let resultado = await ejecucion.consulta();
    let contenido = ``;
    resultado.map(({id_grupo,lunes,martes,miercoles,jueves,viernes,sabado,nombre_grupo,docente,estatus_grupo} = horarios) => { 
        contenido += `
            <tr>
                <th colspan="6"><br></th>
            </tr>
            <tr class="bg-primary text-white">
                <th colspan="2">Grupo</th>
                <th colspan="2">Profesor</th>
                <th>Estatus</th>
                <th>Seleccionar Grupo</th>
            </tr>
            <tr>
                <th colspan="2" class="align-middle">${nombre_grupo}</th>
                <th colspan="2" class="align-middle">${docente}</th>
                <th colspan="1" class="align-middle">${estatus_grupo == '1' ? "Abierto" : "Cerrado"}</th>
                <th>
                    <input type="radio" class="btn-check" name="id_grupo" id="selecion_grupo${id_grupo}" autocomplete="off" value="${id_grupo}">
                    <label class="btn btn-outline-success" for="selecion_grupo${id_grupo}"><i class="fa-regular fa-circle-check"></i></label>
                </th>
            </tr>
            <tr class="bg-primary text-white">
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
            </tr>
            <tr>
                <th class="align-middle">${lunes}</th>
                <th class="align-middle">${martes}</th>
                <th class="align-middle">${miercoles}</th>
                <th class="align-middle">${jueves}</th>
                <th class="align-middle">${viernes}</th>
                <th class="align-middle">${sabado}</th>
            </tr>
            <tr>
                <th colspan="6"><br></th>
            </tr>
        `;
    });
    $('#nombre_materia').text(resultado[0].nombre);
    //$('[name=id_grupo]').val(id_grupo);
    $('#datos_materia').html(contenido);
    $('#asignar_materia_modal').modal('show');
    bootstrap.Itma2.end_loader();
}

const tabla_materias = async (id_carrera,id_num_control) =>{
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
                    calificaciones.map(({fk_grupo,calificacion,siglas,fk_cat_materias, color, id_seleccion_materias,fk_numero_control} = calf) =>{
                        if(fk_cat_materias == id_cat_materias){
                            contenido += `
                                <div class="p-1 text-center border cuadricula text-small sin-scroll align-middle ${color}" ${color == 'bg-cuadricula-morado' ? `onclick="retirar_materia(${id_seleccion_materias},${fk_grupo},${fk_numero_control})"` : ''}>
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
                            <div class="p-1 text-center border cuadricula text-small sin-scroll align-middle ${texto != '' ? `${texto}" onclick="precargar_materia(${id_cat_materias})"` : 'bg-cuadricula-none"'}>
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
                        <div class="p-1 text-center border cuadricula text-small sin-scroll bg-white align-middle">
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
}

const asignar_materia = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData($('#frm_asignar_materia')[0]);
    datos.append('funcion',"asignar_materia");
    const ejecucion = new Consultas("InscripcionPeriodo",datos);
    let respuesta = await ejecucion.insertar();
    bootstrap.Itma2.end_loader();
    if (respuesta[0] == "1") {
        tabla_materias($('[name=id_hr_carrera]').val(),$('[name=id_hr_alumno]').val());
        $('#asignar_materia_modal').modal('hide');
        msj_exito(`Proceso finalizado correctamente!\n${respuesta[1]}`);					
    } else {
        msj_error(`Se ha prensentado un error:\n${respuesta[1]}\nPor favor intentalo de nuevo.`);
    }
}

const retirar_materia = (id,id_grupo,control) => {
    swal({
        title: "Desea retirar la materia seleccionada?",
        text: `Una vez retirada no se podra recuperar`,
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        dangerMode: true,
    }).then(borrar => {
        if(borrar){
            let datos = new FormData();
            datos.append('funcion',"retirar_materia");
            datos.append('materia',id);
            datos.append('id_grupo',id_grupo);
            datos.append('control',control);
            const ejecucion = new Consultas("InscripcionPeriodo",datos);
            ejecucion.insercion();
            tabla_materias($('[name=id_hr_carrera]').val(),$('[name=id_hr_alumno]').val());
        }
    });
} 

const comprobacion_inscripcion_autorizada = async(num) =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"consultar_reinscripcion_alumno");
    datos.append('num_ctrl',num);
    const ejecucion = new Consultas("AutorizacionesAcademicas",datos);
    let resultado = await ejecucion.consulta();
    bootstrap.Itma2.end_loader();
    if(resultado != null){
        obtener_datos_alumno();
    }else{
        $('[name=num_ctrl]').val('');
        msj_error("El alumno no tiene autorización de servicios escolares para seleccionar materias!");        
    }
}

const comprobacion_alumno = async(num) =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"consultar_adeudos");
    datos.append('num_ctrl',num);
    const ejecucion = new Consultas("Adeudos",datos);
    let resultado = await ejecucion.consulta();
    bootstrap.Itma2.end_loader();
    if(!resultado.length){
        comprobacion_inscripcion_autorizada(num);
    }else{
        $('[name=num_ctrl]').val('');
        msj_error("El alumno tiene adeudos pendientes!\nNo tiene autorizacion para seleccionar materias.");        
    }
}

$("#frm_inscripcion_periodo").on('submit',(e) =>{
    e.preventDefault();
    if(validar_campo(input,'vacios')){
        comprobacion_alumno($('[name=num_ctrl]').val());
    }
});

$('#btn_asignar').on('click',() => {
    if(!document.querySelector('input[name="id_grupo"]:checked')) {
        msj_error("Debes seleccionar un grupo para asignar!");
    }else{
        asignar_materia();
    }
});

$('#btn_mostrar_horario').on('click',() => {
    precargar_horario($('[name=id_hr_alumno]').val());
});

$("#atras").on('click',() =>{
    $("#datos_alumno").hide();
    $("#tabla_movimientos").hide();
    $("#codigo_colores").hide();
    $("#frm_inscripcion_periodo").show();
    $("#frm_inscripcion_periodo")[0].reset();
});