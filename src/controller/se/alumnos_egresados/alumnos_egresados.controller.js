
const consultar_egresados = async (filtro_periodo,filtro_carrera) =>{
    if(validar_campo(['periodo'],'vacios')){
        bootstrap.Itma2.start_loader(); 
        $('#contenido_egresados').html(``);
        $('#tabla_egresados').DataTable().destroy();
        let datos = new FormData();
        datos.append('filtro_periodo',`${filtro_periodo}`);
        if(filtro_carrera != '0'){
            datos.append('filtro_carrera',`${filtro_carrera}`);
            datos.append('tipo_filtro',"carrera");
        }
        datos.append('funcion','consultar_egresados');
        const mostrar = new Consultas("AlumnosEgresados",datos);
        let respuesta = await mostrar.consulta();
        let tabla = ``;
        respuesta.map(egresados =>{
            let {numero_control,nombre_persona,apellido_paterno,apellido_materno,nombre_carrera,promedio_final_alcanzado} = egresados;
            tabla += `
                <tr>
                    <td class="align-middle">${numero_control}</td>
                    <td class="align-middle">${nombre_persona+' '+apellido_paterno+' '+apellido_materno}</td>
                    <td class="align-middle">${nombre_carrera}</td>
                    <td class="align-middle">${promedio_final_alcanzado}</td>
                </tr>
            `;
        });
        $('#contenido_egresados').html(`${tabla}`);
        $('#tabla_egresados').DataTable({
            "language": {
                "url": "./json/lenguaje.json"
            }
        });
        bootstrap.Itma2.end_loader();
    }
}

const consultar_periodo = () =>{
    let datos = new FormData();
    datos.append('funcion','obtener_periodo');
    let selec = new Consultas("AlumnosEgresados",datos);
    selec.catalogo('periodo','codigo_html');
}

const consultar_carrera = () =>{
    let datos = new FormData();
    datos.append('funcion','obtener_carrera');
    let selec = new Consultas("AlumnosEgresados",datos);
    selec.catalogo('carrera','codigo_html');
}

$("#frm_alumnos_egresados").on('submit',(e)=>{
    e.preventDefault();
    consultar_egresados(($('#periodo').val()),($('#carrera').val()));
});

consultar_periodo();
consultar_carrera();