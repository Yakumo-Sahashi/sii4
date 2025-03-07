import fs from "fs";
class Seiryu {
    constructor(){
        this.comandos = {
            model: (archivo, destino) => {
                let contenido = `<?php\n\tnamespace model;\n\tuse Illuminate\\Database\\Eloquent\\Model;\n\trequire_once '../${destino != '' ? '../' : ''}Config/BaseDatos.php';\n\n\tclass ${archivo} extends Model{\n\t\tpublic $timestamps = false;\n\t\tprotected $table = '';\n\t\tprotected $primaryKey = '';\n\t}\n?>`;
                fs.writeFile(`./app/Models/${(destino != '' ? destino+'/' : '') + archivo}.php`, contenido, error =>{console.log(error ? error : "Creacion de modelo correcta...")});    
            },
            controller: (archivo, destino) => {
                let contenido = `<?php\n\tuse config\\Token;\n\tuse config\\Sesion;\n\tuse model;\n\trequire_once realpath('../../${destino != '' ? '../' : ''}vendor/autoload.php');\n\n\tclass ${archivo} {\n\t\t\n\t}\n\tcall_user_func('${archivo}::'.$_POST['funcion']);\n?>`;          
                fs.writeFile(`./app/Controllers/${(destino != '' ? destino+'/' : '') + archivo}.php`, contenido, error =>{console.log(error ? error : "Creacion de controlador correcta...")});           
            },
            src: (archivo, destino) => {
                let contenido = `let input_${archivo} = [];\n`;          
                fs.writeFile(`./src/controller/${(destino != '' ? destino+'/' : '') + archivo}.controller.js`, contenido, error =>{console.log(error ? error : "Creacion de controlador correcta...")});           
            },
            view: (archivo, destino) => {
                let contenido = `<?php\n\tuse config\\Router;\n\tuse config\\Token;\n\trequire_once realpath('./vendor/autoload.php');\n?>\n<div>\n\t<h1 class="fs-4 fw-bold text-primary">${archivo}</h1>\n\t<nav>\n\t\t<ol class="breadcrumb">\n\t\t\t<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>\n\t\t\t<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">${archivo}</a></li>\n\t\t</ol>\n\t\</nav>\n</div>\n<div class="container p-0">\n\t<div class="row justify-content-around py-5">\n\t\t<div class="col-md-12 text-center">\n\t\t\t<div class="container">\n\t\t\t\t<div class="row align-items-center">\n\t\t\t\t\t<div class="col-md-12 col-small-12 mb-4">\n\t\t\t\t\t\t<form id="frm_${archivo}" method="POST" class="form-grup mb-3 ml-3 mr-3 ">\n\t\t\t\t\t\t\t\n\t\t\t\t\t\t</form>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n<script src="<?= CONTROLLER ?>controlador.js"></script>`;
                fs.writeFile(`./view/${(destino != '' ? destino+'/' : '') + archivo}.view.php`, contenido, error =>{console.log(error ? error : "Creacion de vista correcta...")});           
            }
        }
    }
    directorio(dir,tipo){
        let carpeta = dir.split(':');
        let directorio = `app/${tipo == "model" ? "Models" : tipo == "controller" ? "Controllers": "view"}/${carpeta[1]}`;
        if(tipo == "src"){
            directorio = `src/controller/${carpeta[1]}`;
        }
        if(tipo == "view"){
            directorio = `view/${carpeta[1]}`;
        }
        if(!fs.existsSync(directorio)) {
            fs.mkdir(directorio, error =>{console.log(error ? error : "Directorio creado...")});
        }
        return carpeta[1];
    }
    seiryu = entrada =>{
        let destino = '';
        if(entrada.length == 3){
            destino = this.directorio(entrada[2],entrada[0]);
        }
        let [comando, valor] = entrada;
        this.comandos[comando](valor,destino);
    }
}
const cli = new Seiryu();
cli.seiryu(process.argv.slice(2));