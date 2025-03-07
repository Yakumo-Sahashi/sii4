let input_jefes = [];
const mostrar_personal = async ()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerPersonal');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('seleccion_personal','codigo_html');
}
const mostrar_area = async ()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerOrganigrama');
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('seleccion_area','codigo_html');
}
$('#btn_actualizar_jefe').on('click',()=>{
    if(validar_campo(['seleccion_area','seleccion_personal'],'vacios')){
        let datos = new FormData($('#frm_actualizar_jefe')[0])
        datos.append('funcion','actualizarJefe');
        console.log(datos);
        const ejecucion = new Consultas('RhPersonal',datos);
        ejecucion.insercion();
        $('#frm_actualizar_jefe')[0].reset();
    }

})
mostrar_personal();
mostrar_area();