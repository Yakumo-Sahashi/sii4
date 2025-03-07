const msj_error = (msj) => {
	swal({
		title: `Error!`,
		text: msj,
		icon: `warning`,
		button: `Aceptar`,
	});
}

const msj_exito = (msj) => {
	swal({
		title: `Correcto!`,
		text: msj,
		icon: `success`,
		button: `Aceptar`,
	});
}

const msj_ = (titulo, conty) => {
	swal({
		icon: `success`,
		title: `Credenciales de acceso validas!`,
		html: true,
		text: `\n\n Estas siendo redirigido automaticamente...`,
		closeOnClickOutside: false,
		closeOnEsc: false,
		value: true,
		buttons: false,
		timer: 1500
	}).then((value) => {
		window.location = `home`;
	});
}

const restriccion = {
	"vacios": {
		"expresion": /(?!(^$))/,
		"msj": "No puedes dejar vacio el campo "
	},
	"letras": {
		"expresion": /^([a-zA-Záéíóú]+[\s]?)/i,
		"msj": "Solo puedes ingresar letras en el campo "
	},
	"numeros": {
		"expresion": /^([0-9])+$/,
		"msj": "Solo puedes ingresar numeros en el campo "
	},
	"email": {
		"expresion": /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/,
		"msj": "Estructura de correo no valida! en campo "
	},
	"curp": {
		"expresion": /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
		"msj": "Estructura de CURP no valida! en campo "
	},"rfc": {
		"expresion": /^[A-ZÑ&]{4}[0-9]{6}[A-Z0-9]{3}$/,
		"msj": "Estructura de RFC no valida! en campo "
		/* ^[A-ZÑ&]{4}[0-9]{6}[A-Z0-9]{3}$ */
		/* ^([A-ZÑ&]{3,4})\d{2}((01|03|05|07|08|10|12)(0[1-9]|1[0-2])|02(0[1-9]|1[0-9]|2[0-8])|(04|06|09|11)(0[1-9]|1[0-2]))[A-Z\d]{2}[0-9A]$ */
	},
	"calificacion": {
		"expresion": /^(?:100|[0-9]{1,2})$/,
		"msj": "Las calificaciones validas estan en el rango de 0 y 100"
	},
	"password":{
		"expresion": /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!\.\-_%*?&])([A-Za-z\d$@$\.\-_!%*?&]|[^ ]){8,15}$/,
		"msj": "Estructura de Contraseña no valida! en campo Nueva contraseña!\n\nRequisitos para una contraseña:\n-Minimo 8 caracteres\n-Maximo 15 caracteres\n-Al menos una letra mayuscula\n-Al menos una letra minuscula\n-Al menos un dígito\n-No espacios en blanco\n-Al menos 1 caracter especial : @ $ ! % * ? &"
	}
};

const limpiar_cadena = (cadena, caracter_busqueda, caracter_remplazo) =>  {
	return cadena.replace(`${caracter_busqueda}`, `${caracter_remplazo}`);
}

const caracter = {
	"numeros": {
		"expresion": /[^0-9]/g,
		"msj": "No puedes dejar vacio el campo "
	},
	"letras": {
		"expresion": /^([a-zA-Záéíóú]+[\s]?)/i,
		"msj": "Solo puedes ingresar letras en el campo "
	},
};

/**
 * 
 * @param {string[]||String} input lista de input a validar
 * @param {String[]||String} tipo_validacion nombre de la validacion a realizar
 * @param {String} msj texto que se mostrara en caso de no cumplirse la valicion en caso de no ingresar alguno se generara de manera automatica
 * @returns {boolean} devuelve un false en caso de cumplirse la condicion en alguno de los inputs
 */
const validar_campo = (input, tipo_validacion, mensaje = "") => {
	let resultado = true;
	let error = "";
	let msj_final = "";
	const incorrecto = (nombre, msj) => { error = (error == "") ? nombre : error; msj_final = (msj_final == "") ? msj : msj_final; return false }
	if (Array.isArray(input)) {	
		if(Array.isArray(tipo_validacion)){
			tipo_validacion.map( validacion => {
				let {expresion} = restriccion[`${validacion}`];
				let {msj} = restriccion[`${validacion}`];
				input.map( nombre => { 
					resultado =  expresion.test( $(`[name=${nombre}]`).val() ) ? resultado : incorrecto($(`[for=${nombre}]`).text(), msj);
				});
			});			
		} else {
			const {expresion} = restriccion[`${tipo_validacion}`];
			const {msj} = restriccion[`${tipo_validacion}`];
			input.map( nombre => { 
				resultado =  expresion.test( $(`[name=${nombre}]`).val() ) ? resultado : incorrecto($(`[for=${nombre}]`).text(), msj);
			});
		}	
	} else {
		if(Array.isArray(tipo_validacion)){
			tipo_validacion.map( validacion => {
				let {expresion} = restriccion[`${validacion}`];
				let {msj} = restriccion[`${validacion}`];
				resultado = expresion.test( $(`[name=${input}]`).val() ) ?  resultado : incorrecto($(`[for=${nombre}]`).text(), msj);
			});			
		}else{
			const {expresion} = restriccion[`${tipo_validacion}`];
			const {msj} = restriccion[`${tipo_validacion}`];
			resultado = expresion.test( $(`[name=${input}]`).val() ) ?  resultado : incorrecto($(`[for=${input}]`).text(), msj);
		}
	}
	error != "" ? msj_error(mensaje != "" ? mensaje :  `${msj_final} ${error}`) : error;
	return resultado;
}
/**
 * 
 * @param {String} input recibe el nombre del input a convertir su contenido a mayusculas 
 */
const caracter_mayus = (input) => {
	$(`[name=${input}]`).on('input', () => {
		$(`[name=${input}]`).val($(`[name=${input}]`).val().toUpperCase());
	});
}
/**
 * 
 * @param {String} input recibe el nombre del input a convertir su contenido a minusculas
 */
const caracter_minus = (input) => {
	$(`[name=${input}]`).on('input', () => {
		$(`[name=${input}]`).val($(`[name=${input}]`).val().toLowerCase());
	});
}
/**
 * 
 * @param {String} input recibe el nombre del input para admitir solo caracteres numericos
 */
const caracter_numeros = (input) => {
	$(`[name=${input}]`).on('input', () => {
		$(`[name=${input}]`).val($(`[name=${input}]`).val().replace(/[^0-9]/g, ''));
	});
}
/**
 * 
 * @param {String} input recibe el nombre del input para admitir solo letras
 */
const caracter_letras = (input) => {
	$(`[name=${input}]`).on('input', () => {
		$(`[name=${input}]`).val($(`[name=${input}]`).val().replace(/([^a-zA-Záéíóú\s])/i, ''));
	});
}

const caracter_varios = (input) => {
	$(`[name=${input}]`).on('input', () => {
		$(`[name=${input}]`).val($(`[name=${input}]`).val().replace(/([^A-Za-z0-9ñÑ])/g, ''));
	});
}

const primer_mayuscula = (input) => {
	$(`[name=${input}]`).on('input', ()=> {
		$(`[name=${input}]`).val($(`[name=${input}]`).val().charAt(0).toUpperCase() + $(`[name=${input}]`).val().slice(1));
	});
}

const limitar_valor = (input, inicio, fin, msj) => {
	return $(`[name=${input}]`).val() > inicio && $(`[name=${input}]`).val() < fin ? true : msj_error(msj) ;
}

const longitud_campo = (input, inicio, fin, msj) => {
	let campo = $(`[name=${input}]`).val();
	return campo.length > inicio && campo.lenght < fin ? true : msj_error(msj) ;
}

const longitud_campo_exacta = (input, longitud, msj) => {
	let campo = $(`[name=${input}]`).val();
	return campo.length == longitud ? true : msj_error(msj) ;
}

const funciones = {
	"codigo_html": (input, codigo) =>{
		$(`[name=${input}]`).html(`${codigo}`);
	},
	"valor_input": (input, valor) =>{
		$(`[name=${input}]`).val(`${valor}`);
	},
	"valor_inputs": (input, valor) =>{
		input.map(()=>{
			
		});
	}
	
};

class Consultas {
	/**
	 * @param {String} modelo nombre del modelo al que se le enviaran los datos
	 * @param {FormData} formulario objeto con la informacion del formulario correspondiente
	 * @param {String} tipo de metodo que se usara para el envio de informacion POST o GET por defecto se insertara POST
	 */
	constructor(modelo, formulario, metodo = 'POST') {
		this.modelo = modelo;
		this.formulario = formulario;
		this.metodo = metodo;
	}

	reiniciarSesion(formulario) {
		bootstrap.Itma2.start_loader();
		formulario.append('funcion', 'cerrar_sesion_dispositivo');
		fetch(`app/Controllers/Login.php`, {
				method: `POST`,
				body: formulario
			}).then(respuesta => respuesta.json())
			.then(respuesta => {
				bootstrap.Itma2.end_loader();
				if (respuesta[0] === "1") {
					swal({
						icon: "success",
						title: "Por favor espere",
						html: true,
						text: '\n\n Cerrando sesion en otros dispositivos...',
						closeOnClickOutside: false,
						closeOnEsc: false,
						value: true,
						buttons: false,
						timer: 5000
					  }).then((value) => {
						let info = formulario;
						info.append('funcion', 'iniciar_sesion');
						const ejecucion = new Consultas("login", info);
						ejecucion.sesion();
					  });											
				}else {
					msj_error(`Se ha producido un error!\n${respuesta[1]}`);
				}
			}).catch(error => {
				bootstrap.Itma2.end_loader();
				console.log(`${error}`);
			});
	}

	sesion() {
		bootstrap.Itma2.start_loader();
		fetch(`app/Controllers/Login.php`, {
				method: `${this.metodo}`,
				body: this.formulario
			}).then(respuesta => respuesta.json())
			.then(respuesta => {
				bootstrap.Itma2.end_loader();
				if (respuesta[0] === "1") {
					swal({
						icon: `success`,
						title: `${respuesta[1]}`,
						html: true,
						text: `\n\n Estas siendo redirigido automaticamente...`,
						closeOnClickOutside: false,
						closeOnEsc: false,
						value: true,
						buttons: false,
						timer: 1500
					}).then((value) => {
						window.location = `${respuesta[2]}`;
					});				
				} else if (respuesta[0] === "2") {
					swal({
						title: "No se ha podido iniciar sesion!",
						text: `${respuesta[1]}`,
						icon: "warning",
						buttons: ["Cancelar", "Aceptar"],
						dangerMode: true,
					}).then(cerrar => {
						if (cerrar) {
							this.reiniciarSesion(this.formulario);
						} else {
							swal("Se ha conservado la sesion anterior!");
						}
					});								
				}else {
					msj_error(`Se ha producido un error!\n${respuesta[1]}`);
				}
			}).catch(error => {
				bootstrap.Itma2.end_loader();
				console.log(`${error}`);
			});
	}

	insercion() {
		bootstrap.Itma2.start_loader();
		fetch(`app/Controllers/${this.modelo}.php`, {
				method: `${this.metodo}`,
				body: this.formulario
			}).then(respuesta => respuesta.json())
			.then(respuesta => {
				bootstrap.Itma2.end_loader();
				if (respuesta[0] == "1") {
					msj_exito(`Proceso finalizado correctamente!\n${respuesta[1]}`);					
				} else {
					msj_error(`Se ha prensentado un error:\n${respuesta[1]}\nPor favor intentalo de nuevo.`);
				}
			}).catch(error => {
				bootstrap.Itma2.end_loader();
				console.log(`${error}`);
			});
	}

	insertar = async () => {
		try {
			const respuesta = await fetch(`app/Controllers/${this.modelo}.php`, {
				method: `${this.metodo}`,
				body: this.formulario
			});
			const datos = await respuesta.json();
			return await datos;
		}catch(error){
			console.log(error);
		}
	}

	consulta = async () => {
		try {
			const respuesta = await fetch(`app/Controllers/${this.modelo}.php`, {
				method: `${this.metodo}`,
				body: this.formulario
			});
			const datos = await respuesta.json();
			return await datos;
		}catch(error){
			console.log(error);
		}		
	}

	texto = async () => {
		try {
			const respuesta = await fetch(`app/Controllers/${this.modelo}.php`, {
				method: `${this.metodo}`,
				body: this.formulario
			});
			const datos = await respuesta.text();
			return await datos;
		}catch(error){
			console.log(error);
		}		
	}
	catalogo(input, accion) {
		fetch(`app/Controllers/${this.modelo}.php`, {
				method: `${this.metodo}`,
				body: this.formulario
			}).then(respuesta => respuesta.text())
			.then(respuesta => {
				funciones[`${accion}`](input,respuesta);
			}).catch(error => {
				console.log(error);
			});
	}
}