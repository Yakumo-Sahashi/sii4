let contador_lunes = 1,contador_martes = 1,contador_miercoles = 1,contador_jueves = 1,contador_viernes = 1,contador_sabado =1;


const asignar_change = () => {
    const selects = document.querySelectorAll('select');
    selects.forEach(select => {
        select.addEventListener('change', event => {
            if(event.target.name != "seleccion_personal"){
                if(/hora_fin_[a-z]+[0-9]/gm.test(event.target.name)){
                    inicio_hora_add(event.target.value,event.target.name.replace(/hora_fin_/g,"").replace(/[0-9]+/g,"")+(parseInt(event.target.name.replace(/[a-z_]+/g,""))+1));                                                            
                }else{
                    actualizar_hora_final(event.target.value,event.target.name.replace("hora_inicio_",""));
                    inicio_hora_add(parseInt(event.target.value)+1,event.target.name.replace("hora_inicio_","").replace(/[0-9]+/g,"")+(parseInt(event.target.name.replace(/[a-z_]+/g,""))+1));
                }
            }
        });
    });
}

caracter_numeros("id_checador");

const mostrar_personal = async ()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerPersonal');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('seleccion_personal','codigo_html');
}

mostrar_personal();

const eliminar_lunes = hora => $(`#hora_add_lunes${hora}`).remove();
const eliminar_martes = hora => $(`#hora_add_martes${hora}`).remove();
const eliminar_miercoles = hora => $(`#hora_add_martes${hora}`).remove();
const eliminar_jueves = hora => $(`#hora_add_jueves${hora}`).remove();
const eliminar_viernes = hora => $(`#hora_add_viernes${hora}`).remove();
const eliminar_sabado = hora => $(`#hora_add_sabado${hora}`).remove();

const generar_hora = (dia,num) => {
    return `
        <div class="row justify-content-center" id="hora_add_${dia}${num}">
            <div class="col-10 text-end">
                <hr>
                <button type="button" class="btn btn-sm btn-outline-danger rounded-circle border-0" onclick="eliminar_${dia}(${num})"><i class="fa-regular fa-trash-can"></i></button>
            </div>
            <div class="col-md-5">
                <div class="row my-2 justify-content-center">
                    <div class="col-lg-12">
                        <div class="py-2 mb-1">
                            <span class="text-primary"><b><i class="fa-solid fa-hourglass-start me-2"></i>Entrada:</b></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="py-2 mb-1">
                            <span class="text-success"><b><i class="fa-solid fa-hourglass-end me-2"></i>Salida:</b></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 justify-content-center">
                <div class="row my-2">
                    <div class="col-lg-12">
                        <div class="input-group mb-2">
                            <select class="form-select" name="hora_inicio_${dia}${num}" id="hora_inicio_${dia}${num}">
                                <option value="">--:--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-2">
                            <select class="form-select" name="hora_fin_${dia}${num}" id="hora_fin_${dia}${num}" disabled></select>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    `;
}
const actualizar_hora_final = (inicio, fin) => { 
    inicio = parseInt(inicio) + 1;       
    let opciones = ``;
    for (let i = inicio; i < (22); i++) {
        if (i < 10) {
            opciones = opciones + `<option value="0${i}:00">0${i}:00</option>`;
            opciones = opciones + `<option value="0${i}:30">0${i}:30</option>`;
        } else {
            opciones = opciones + `<option value="${i}:00">${i}:00</option>`;
            opciones = opciones + `<option value="${i}:30">${i}:30</option>`;
        }
    }         
    $(`#hora_fin_${fin}`).html(opciones);
    $(`#hora_fin_${fin}`).removeAttr("disabled");
};

const inicio_hora_add = (inicio, fin) => { 
    inicio = parseInt(inicio) + 1;       
    let opciones = ``;
    for (let i = inicio; i < (22); i++) {
        if (i < 10) {
            opciones = opciones + `<option value="0${i}:00">0${i}:00</option>`;
            opciones = opciones + `<option value="0${i}:30">0${i}:30</option>`;
        } else {
            opciones = opciones + `<option value="${i}:00">${i}:00</option>`;
            opciones = opciones + `<option value="${i}:30">${i}:30</option>`;
        }
    }         
    $(`#hora_inicio_${fin}`).html(opciones);
    actualizar_hora_final(inicio,fin);
};


$('#btn_add_horario1').on('click',() => {
    if($("#hora_inicio_lunes1").val() != "" &&  $("#hora_fin_lunes1").val() != ""){
        ++contador_lunes;
        $("#add_lunes1").append(generar_hora("lunes",contador_lunes));
        inicio_hora_add($("#hora_fin_lunes1").val(),"lunes"+contador_lunes);
        setTimeout(() =>{
            asignar_change();
        },500);
    }
});
$('#btn_add_horario2').on('click',() => {
    if($("#hora_inicio_martes1").val() != "" &&  $("#hora_fin_martes1").val() != ""){
        ++contador_martes;
        $("#add_martes1").append(generar_hora("martes",contador_martes));
        inicio_hora_add($("#hora_fin_martes1").val(),"martes"+contador_martes);
        setTimeout(() =>{
            asignar_change();
        },500);
    }
});
$('#btn_add_horario3').on('click',() => {
    if($("#hora_inicio_miercoles1").val() != "" &&  $("#hora_fin_miercoles1").val() != ""){
        ++contador_miercoles;
        $("#add_miercoles1").append(generar_hora("miercoles",contador_miercoles));
        inicio_hora_add($("#hora_fin_miercoles1").val(),"miercoles"+contador_miercoles);
        setTimeout(() =>{
            asignar_change();
        },500);
    }
});
$('#btn_add_horario4').on('click',() => {
    if($("#hora_inicio_jueves1").val() != "" &&  $("#hora_fin_jueves1").val() != ""){
        ++contador_jueves;
        $("#add_jueves1").append(generar_hora("jueves",contador_jueves));
        inicio_hora_add($("#hora_fin_jueves1").val(),"jueves"+contador_jueves);
        setTimeout(() =>{
            asignar_change();
        },500);
    }
});
$('#btn_add_horario5').on('click',() => {
    if($("#hora_inicio_viernes1").val() != "" &&  $("#hora_fin_viernes1").val() != ""){
        ++contador_viernes;
        $("#add_viernes1").append(generar_hora("viernes",contador_viernes));
        inicio_hora_add($("#hora_fin_viernes1").val(),"viernes"+contador_viernes);
        setTimeout(() =>{
            asignar_change();
        },500);
    }
});
$('#btn_add_horario6').on('click',() => {
    if($("#hora_inicio_sabado1").val() != "" &&  $("#hora_fin_sabado1").val() != ""){
        ++contador_sabado;
        $("#add_sabado1").append(generar_hora("sabado",contador_sabado));
        inicio_hora_add($("#hora_fin_sabado1").val(),"sabado"+contador_sabado);
        setTimeout(() =>{
            asignar_change();
        },500);
    }
});

asignar_change();


$('#frm_registro_horario').on('submit', (e) => {
    e.preventDefault();
    const selects = document.querySelectorAll('select');
    let horarios = 0;
    selects.forEach(select => {
        if(select.value != ""){
            horarios++;
        }
    });
    if(validar_campo(["seleccion_personal","id_checador"],"vacios")){
        if(horarios > 1){
            let datos = new FormData($('#frm_registro_horario')[0]);
            datos.append("funcion","insercion_horario");    
            const ejecucion = new Consultas("RhHorarios", datos);
            ejecucion.insercion();
            $('#frm_registro_horario')[0].reset();
            $("#add_lunes1").html("");
            $("#add_martes1").html("");
            $("#add_miercoles1").html("");
            $("#add_jueves1").html("");
            $("#add_viernes1").html("");
            $("#add_sabado1").html("");
            contador_lunes = 1;
            contador_martes = 1;
            contador_miercoles = 1;
            contador_jueves = 1;
            contador_viernes = 1;
            contador_sabado =1;
        }else{
            msj_error("Debes asignar al menos un horario.");
        }
    }
});