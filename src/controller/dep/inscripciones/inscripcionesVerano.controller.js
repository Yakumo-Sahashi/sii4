let input = ['num_ctrl'];

$("#datos_alumno").hide();
$("#tabla_movimientos").hide();

const obtener_datos_alumno = async() =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData($('#frm_inscripcion_verano')[0]);
    datos.append('funcion',"obtener_alumno");
    const ejecucion = new Consultas("InscripcionPeriodo",datos);
    let resultado = await ejecucion.consulta();
    if(resultado[0] == 1){
        let {fk_persona,nombre_persona,apellido_paterno,apellido_materno,numero_control,fk_numero_control,semestre,identificacion_corta,fk_cat_carrera,carrera,promedio_aritmetico_acumulado,especialidad} = resultado[1];
        $('[name=nombre_alumno]').val(`${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}`);
        $('[name=numero_control]').val(`${numero_control}`); 
        // $('[name=fk_numero_control]').val(`${fk_numero_control}`);
        $('[name=semestre]').val(`${semestre}`);
        $('[name=periodo_escolar]').val(`${identificacion_corta}`);  
        $('[name=carrera]').val(`${carrera}`);
        $('[name=prom_acumulado]').val(`${promedio_aritmetico_acumulado  == null ? '0' : promedio_aritmetico_acumulado}`);
        $('[name=especialidad]').val(`${especialidad}`);
        $('#img_foto').attr('src',`public/img/alumno/${fk_persona}/fotografia.webp`);
        $("#datos_alumno").show();
        $("#tabla_movimientos").show();
        $("#frm_inscripcion_verano").hide();
    }else{
        msj_error(resultado[1])
    }
    bootstrap.Itma2.end_loader();
}

$("#frm_inscripcion_verano").on('submit',(e) =>{
    e.preventDefault();
    if(validar_campo(input,'vacios')){
        obtener_datos_alumno();
    }
});

$("#atras").on('click',() =>{
    $("#datos_alumno").hide();
    $("#tabla_movimientos").hide();
    $("#frm_inscripcion_verano").show();
    $("#frm_inscripcion_verano")[0].reset();
});
