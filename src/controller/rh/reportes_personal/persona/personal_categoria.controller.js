let input_personal_categoria = [];
const mostrarCategoria = async()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerCategoria');
    const ejecucion = new Consultas("RhReportesPersonal", datos);
    ejecucion.catalogo('seleccion_categoria_personal','codigo_html');
}
mostrarCategoria();

