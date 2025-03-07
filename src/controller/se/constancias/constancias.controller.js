let input_constancias = ['por_semestre','materias_curso','avance','estudios_simple','traslado','lengua_extranjera','imss','kardex','no_incoveniencia'];

caracter_numeros('num_ctrl');
caracter_numeros('no_oficio');

const obtener_periodo_escolar = () => {
    let datos = new FormData();
    datos.append('funcion',"consultar_periodo");
    const selec = new Consultas("HistorialAcademico",datos);
    selec.catalogo('periodo','codigo_html');
}

obtener_periodo_escolar();
let archivo = 0;

$('[name=tipo]').on('change',() => {
    archivo = $('[name=tipo]').val();    
    $('#frm_constancias').attr('action',`app/docs/constancia_${input_constancias[archivo]}_alumno.doc.php`);
    if($('[name=tipo]').val() == 4){
       $('#traslado').html(`
        <div class="col-2 col-md-2">
            <div class="form-floating mb-3">
                <select class="form-select" id="dir" name="dir">
                    <option value="r">Director</option>
                    <option value="ra">Directora</option>
                </select>
                <label for="dir" class="text-primary"><i class="fa-solid fa-venus-mars"></i> Genero</label>
            </div>
        </div>
        <div class="col-5 col-md-5">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombre_director" name="nombre_director" placeholder="Nombre Director/a" value="" required>
                <label for="nombre_director" class="text-primary"><i class="fa-solid fa-signature"></i> Nombre Director/a</label>
            </div>
        </div>
        <div class="col-5 col-md-5">
            <div class="form-floating mb-3">
                <input type="" class="form-control" id="instituto" name="instituto" placeholder="Tecnologíco de" value="">
                <label for="instituto" class="text-primary"><i class="fa-solid fa-building-columns"></i> Tecnologíco de</label>
            </div>
        </div>
       `); 
       caracter_letras('nombre_director');
       caracter_letras('instituto');
       primer_mayuscula('nombre_director');
       primer_mayuscula('instituto');
    }else if($('[name=tipo]').val() == 5){
        $('#traslado').html(`
            <div class="col-3 col-md-4">
                <div class="form-floating mb-3">
                    <select class="form-select" id="opcion" name="opcion">
                        <option value="Examen">Examen</option>
                        <option value="Aprobación de curso">Aprobación de curso</option>
                    </select>
                    <label for="opcion" class="text-primary"><i class="fa-solid fa-filter me-2"></i> Opcion</label>
                </div>
            </div>
            <div class="col-5 col-md-5">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="lengua_extranjera" name="lengua_extranjera" placeholder="Lengua extranjera" value="" required>
                    <label for="lengua_extranjera" class="text-primary"><i class="fa-solid fa-language"></i> Lengua extranjera</label>
                </div>
            </div>
        `);
        caracter_letras('lengua_extranjera');
        caracter_mayus('lengua_extranjera');
    }else if($('[name=tipo]').val() == 6){
        $('#traslado').html(`
            <div class="col-3 col-md-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="clinica" name="clinica" placeholder="Clinica" value="" required>
                    <label for="clinica" class="text-primary"><i class="fa-solid fa-hospital"></i> Clinica</label>
                </div>
            </div>
            <div class="col-5 col-md-5">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="afiliacion" name="afiliacion" placeholder="Afiliacion" value="" required>
                    <label for="afiliacion" class="text-primary"><i class="fa-solid fa-hospital-user"></i> Afiliacion</label>
                </div>
            </div>              
        `);
        primer_mayuscula('clinica');
        primer_mayuscula('afiliacion');
    }else{
        $('#traslado').html(``);
    }
});

$('#btn_limpiar_contenido').on('click',() => {
    $('[name=num_ctrl]').val('');
    $('[name=periodo]').val('');
    $('[name=tipo]').val('');
    $('[name=no_oficio]').val('');
    $('#traslado').html(``);
});