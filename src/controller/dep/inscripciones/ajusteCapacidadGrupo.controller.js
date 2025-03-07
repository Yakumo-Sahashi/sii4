let input_selec= ['carrera','periodo','semestre'], input_modal = ['nueva_capacidad'];

const consultar_carrera = () =>{
    let datos = new FormData();
    datos.append('funcion',"consultar_carrera");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('carrera','codigo_html');
}

const consultar_periodo = () =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo_full");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('periodo','codigo_html');
}

consultar_carrera();
consultar_periodo();

const filtar_contenido = () =>{
    let datos = new FormData();
}