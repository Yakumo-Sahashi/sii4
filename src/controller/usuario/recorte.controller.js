let cropper = null;
let fecha_img = 100;

$('#input-file').on('change', () => {
    let image = document.getElementById('img-cropper');
    let input = document.getElementById('input-file');

    let archivos = input.files;
    let extensiones = input.value.substring(input.value.lastIndexOf('.'), input.value.lenght);


    if (!archivos || !archivos.length) {
        image.src = "";
        input.value = "";

    } else if (input.getAttribute('accept').split(',').indexOf(extensiones) < 0) {
        msj_error('Debes seleccionar una imagen');
        input.value = "";

    } else {
        let imagenUrl = URL.createObjectURL(archivos[0]);
        image.src = imagenUrl;

        cropper = new Cropper(image, {
            aspectRatio: 1, // es la proporción en la que queremos que recorte en este caso 1:1
            preview: '.img-sample', // contenedor donde se va a ir viendo en tiempo real la imagen cortada
            zoomable: false, //Para que no haga zoom 
            viewMode: 1, //Para que no estire la imagen al contenedor
            responsive: false, //Para que no reacomode con zoom la imagen al contenedor
            dragMode: 'none', //Para que al arrastrar no haga nada
            ready() { // metodo cuando cropper ya este activo, le ponemos el alto y el ancho del contenedor de cropper al 100%
                document.querySelector('.cropper-container').style.width = '100%'
                document.querySelector('.cropper-container').style.height = '100%'
            }
        })

        $('.modall').addClass('active');
        $('.modall-content').addClass('active');

        $('.modall').removeClass('remove');
        $('.modall-content').removeClass('remove');
    }
})

$('#close').on('click', () => {
    let image = document.getElementById('img-cropper');
    let input = document.getElementById('input-file');

    image.src = "";
    input.value = "";

    cropper.destroy();

    $('.modall').addClass('remove');
    $('.modall-content').addClass('remove');

    $('.modall').removeClass('active');
    $('.modall-content').removeClass('active');
})

$('#cut').on('click', () => {
    let crop_image = document.getElementById('crop-image');
    let canva = cropper.getCroppedCanvas();
    let image = document.getElementById('img-cropper');
    let input = document.getElementById('input-file');

    canva.toBlob((blob) => {
        let url_cut = URL.createObjectURL(blob);
        crop_image.src = url_cut;
        let reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = () => {
            fecha_img ++;
            let base64data  = reader.result;
            let datos = new FormData();
            datos.append('img', base64data);
            let id = $(`[name=usuario]`).val();
            datos.append('funcion','remplazar_foto');
            datos.append('usuario', id);
            const ejecucion = new Consultas("Usuario", datos);
            ejecucion.insercion();
            $(`#cancelar_modal`).addClass(`d-none`);
            $(`#cerrar_modal`).show();
            let img_pre = document.getElementById("img_foto");
            img_pre.style.backgroundImage = `url(public/img/${id}/fotografia.webp?img=${fecha_img1*3})`;
            //console.log(img_pre.src)
        }
    })

    image.src = "";
    input.value = "";

    cropper.destroy();

    $('.modall').addClass('remove');
    $('.modall-content').addClass('remove');

    $('.modall').removeClass('active');
    $('.modall-content').removeClass('active');
});


$(`#ver_img`).click(() => {
    $("#staticBackdrop").modal("show");
    $(`#cerrar_modal`).hide();    
    $(`#cancelar_modal`).removeClass(`d-none`);
});