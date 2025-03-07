let input_plazas = [];

const mostrar_personal = async ()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerPersonal');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('seleccion_personal','codigo_html');
}
const mostrar_categoria = async ()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerCategoria');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('selecccion_categoria','codigo_html');
}
const mostrar_estatus=()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerEstatus');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('seleccion_estatus','codigo_html');
}

mostrar_personal();
mostrar_categoria();    
mostrar_estatus();