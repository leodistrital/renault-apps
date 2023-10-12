//Formularios

//Formulario contacto
// function validateFormContacto(){
// 	var formContacto = $('#formContacto');
// 	if(formContacto.length){
// 		formContacto.validate({
// 			rules:{
// 				nom:"required",
// 				ape:"required",
// 				mail:{required:true,email:true},
// 				tel:{required:true,number:true},
// 				carg:"required",
// 				emp:"required",
// 				mens:"required",
// 				text_captcha:{required:true, remote:'captcha/validar.php'}
// 			},
// 			submitHandler:function(){
// 				alert('ok');
// 			}
// 		});
// 	}
// }

//Form Cotizacion
// function validateFormCotizar(){
// 	var formCotizar = $('#formCotizar');
// 	if(formCotizar.length){
// 		formCotizar.validate({
// 			rules:{
// 				desde:"required",
// 				hasta:"required",
// 				fecsal:"required",
// 				dateto:"required",
// 				fecreg:"required",
// 				numpas:"required",
// 				nom:"required",
// 				ape:"required",
// 				mail:{required:true,email:true},
// 				tel:{required:true,number:true},
// 				text_captcha:{required:true, remote:'captcha/validar.php'}
// 			},
// 			submitHandler:function(){
// 				alert('ok');
// 			}
// 		});
// 	}
// }

function validarFormUsuarioIn() {
	var formUsarioIn = $("#formUsuarioIn");
	if (formUsarioIn.length) {
		formUsarioIn.validate({
			rules: {
				nombre: "required",
				identificacion: { required: false, number: true },
				email: { required: false, email: true },
				termsUsuarioIn: "required",
				password: {
					minlength: 6,
				},
				password_confirm: {
					minlength: 6,
					equalTo: '[name="password"]',
				},
				inputImageUsuario: {
					required: false,
					extension: "jpeg,png,jpg",
					uploadFile: true,
				},
			},

			messages: {
				inputImageUsuario: "File must be JPG or PNG, less than 1MB",
			},

			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "ajax/submitUserIn.php",
					data: $(form).serialize(),
					success: function (data) {
						if (data == "ok") {
							recargarNombreUsuario();
							recargarImagenUsuario();
							alert("Datos guardados correctamente.");
							closeForm();
						} else {
							alert(
								"El email ingresado ya existe en nuestros registros.  No se pudo actualizar el usuario."
							);
						}
					},
				});
			},
		});
	}
}

function recargarImagenUsuario() {
	var json = { mode: "recargarImagenUsuario" };
	$.ajax({
		type: "POST",
		url: "ajax/submitUserIn.php",
		data: json,
		success: function (result) {
			respuesta = JSON.parse(result);
			if (respuesta.url != "") {
				document.getElementById("imagenUsuario").innerHTML =
					'<img class="usuario_img" src="' + respuesta.url + '">';
				document.getElementById("imagenUsuarioForm").innerHTML =
					'<img src="' +
					respuesta.url +
					'" width="60"><a href="#" onclick="javascript:borrarImagenUsuario()">Borrar imagen</a>';
				document.getElementById("divInputImageUsuario").style.display =
					"none";
				document.getElementById("imagenUsuarioForm").style.display =
					"block";
			}
		},
	});
}

function recargarNombreUsuario() {
	var json = { mode: "recargarNombreUsuario" };
	$.ajax({
		type: "POST",
		url: "ajax/submitUserIn.php",
		data: json,
		success: function (result) {
			respuesta = JSON.parse(result);
			console.log(respuesta);
			document.getElementById("nombreUsuario").innerHTML =
				"<b>" + respuesta.nombre + "</b><br>" + respuesta.concesionario;
		},
	});
}

function borrarImagenUsuario() {
	var json = { mode: "borrarImagenUsuario" };
	$.ajax({
		type: "POST",
		url: "ajax/submitUserIn.php",
		data: json,
		success: function (result) {
			document.getElementById("imagenUsuario").innerHTML =
				'<img class="usuario_img" src="images/site/fotos/foto.jpg">';
			document.getElementById("divInputImageUsuario").style.display =
				"block";
			document.getElementById("imagenUsuarioForm").style.display = "none";
		},
	});
}

jQuery.validator.addMethod(
	"uploadFile",
	function (val, element) {
		if (typeof element.files[0] !== "undefined") {
			var size = element.files[0].size;
			console.log(size);

			if (size > 1048576) {
				// checks the file more than 1 MB
				console.log("returning false");
				return false;
			} else {
				console.log("returning true");
				return true;
			}
		} else return true;
	},
	"File type error"
);

//Formato general errores
$.validator.setDefaults({
	errorElement: "span",
	errorPlacement: function (error, element) {
		error.appendTo(element.parents("p"));
	},
});

//Mensajes generales
$.extend($.validator.messages, {
	required: "* Campo obligatorio.",
	remote: "* Captcha no válido.",
	email: "* E-mail no válido.",
	url: "* URL no válida.",
	date: "* Fecha no válida.",
	dateISO: "* Fecha (ISO) válida.",
	number: "* Sólo números.",
	digits: "* Sólo dígitos.",
	creditcard: "Por favor, escribe un número de tarjeta válido.",
	equalTo: "Por favor, escribe el mismo valor de nuevo.",
	extension: "Por favor, escribe un valor con una extensión aceptada.",
	maxlength: $.validator.format(
		"Por favor, no escribas más de {0} caracteres."
	),
	minlength: $.validator.format(
		"Por favor, no escribas menos de {0} caracteres."
	),
	rangelength: $.validator.format(
		"Por favor, escribe un valor entre {0} y {1} caracteres."
	),
	range: $.validator.format("Por favor, escribe un valor entre {0} y {1}."),
	max: $.validator.format("Por favor, escribe un valor menor o igual a {0}."),
	min: $.validator.format("Por favor, escribe un valor mayor o igual a {0}."),
	nifES: "Por favor, escribe un NIF válido.",
	nieES: "Por favor, escribe un NIE válido.",
	cifES: "Por favor, escribe un CIF válido.",
});

function FileSelectHandler(e) {
	// fetch FileList object
	var files = e.target.files || e.dataTransfer.files;
	//console.log(files);

	// process all File objects
	for (var i = 0, f; (f = files[i]); i++) {
		ParseFile(f);
	}
}

// output file information
function ParseFile(file) {
	console.log(
		"File information: " +
			file.name +
			" type: " +
			file.type +
			" size: " +
			file.size +
			" bytes"
	);
	// display an image
	if (file.type.indexOf("image") == 0) {
		var reader = new FileReader();
		reader.onload = function (e) {
			var image = new Image();
			image.setAttribute("crossOrigin", "anonymous");
			image.onload = function () {
				//console.log(this.width);
				var canvas = document.createElement("canvas");
				var width = this.width;
				var height = this.height;
				var maxWidth = 160;

				if (width > maxWidth) {
					height *= maxWidth / width;
					width = maxWidth;
				}

				canvas.width = width;
				canvas.height = height;
				canvas.getContext("2d").drawImage(image, 0, 0, width, height);

				var url = canvas.toDataURL("image/jpeg");
				var size = ((4 * url.length) / 3 + 3) & ~3;
				//document.getElementById("inputImageUsuario").value = "";

				document.formUsuarioIn.fileImagenUsuario.value = url;
				document.formUsuarioIn.fileImagenUsuario_type.value = file.type;
				document.formUsuarioIn.fileImagenUsuario_name.value = file.name;
			};
			image.src = e.target.result;
		};
		reader.readAsDataURL(file);
	}
}

function recargatercernivel(url) {
	let newurl = "http://localhost/panel/iframe/files/" + url;
	console.log(newurl);
	//'http://localhost/panel/iframe/files/VN@@@Campa%C3%B1as%20car%20model@@@KWID'
	document.querySelector("#iframedropbox").src = newurl;
}
