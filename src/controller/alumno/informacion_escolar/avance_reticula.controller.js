let ex_numeros = /[0-9]$/;

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
                    calificaciones.map(({fk_grupo,calificacion,siglas,fk_cat_materias, color, id_seleccion_materias} = calf) =>{
                        if(fk_cat_materias == id_cat_materias){
                            contenido += `
                                <div class="p-1 text-center border cuadricula text-small sin-scroll align-middle ${color}">
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
                            <div class="p-1 text-center border cuadricula text-small sin-scroll align-middle ${texto != '' ? `${texto}"` : 'bg-cuadricula-none"'}>
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

const obtener_datos_alumno = async() =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"obtener_alumno");
    const ejecucion = new Consultas("AvanceReticula",datos);
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
    }else{
        msj_error(resultado[1])
    }
    setTimeout(() => {
        bootstrap.Itma2.end_loader();
    },"1500");
}

$('#btn_mostrar_horario').on('click',() => {
    precargar_horario($('[name=id_hr_alumno]').val());
});

$(document).ready(() => {
    obtener_datos_alumno();
});