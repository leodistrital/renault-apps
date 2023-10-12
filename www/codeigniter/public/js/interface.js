//Interfaz grafica
$(document).ready(function () {
	loadBtnMenu();
	loadMainSlider();
	loadIntSlider();
	loadSCustomer();

	loadGLMenu();

	animateAnchor();
	loadBtnOpenDAv();
	loadSlidersCompa();
	loadFancyForm();
	loadCalendar();
	loadGalIntern();
	loadGScroll();
	loadFancyMulti();
	loadSliderVWork();

	validarFormUsuarioIn();
	// document.getElementById("inputImageUsuario").addEventListener("change", FileSelectHandler, false);
});

// Fancy multimedia
function loadFancyMulti() {
	var openImage = $(".openImage"),
		openVideo = $(".openVideo"),
		openFancy = $(".openFancy"),
		openPdf = $(".openPdf");
	if (openImage.length) {
		openImage.colorbox({
			maxWidth: "100%",
			maxHeight: "100%",
			className: "fImages",
			initialWidth: "100px",
			initialHeight: "100px",
			fixed: true,
			opacity: 0.8,
			transition: "fade",
			speed: 300,
			fadeOut: 300,
			returnFocus: false,
			overlayClose: false,
			escKey: true,
			closeButton: true,
			current: false,
			imgError: "Error al cargar la imagen.",
			rel: getRelFancy,
			title: getTitleFancy,
			onComplete: function () {
				loadBtnsFancy("open");
			},
			onClosed: function () {
				loadBtnsFancy("close");
			},
		});
	}
	if (openVideo.length) {
		openVideo.colorbox({
			iframe: true,
			className: "fVideos",
			width: "790px",
			height: "470px",
			maxWidth: "100%",
			maxHeight: "100%",
			initialWidth: "100px",
			initialHeight: "100px",
			fixed: true,
			opacity: 0.8,
			transition: "fade",
			speed: 300,
			fadeOut: 300,
			returnFocus: false,
			overlayClose: false,
			escKey: true,
			closeButton: true,
			current: false,
			rel: getRelFancy,
			title: getTitleFancy,
			onComplete: function () {
				loadBtnsFancy("open");
			},
			onClosed: function () {
				loadBtnsFancy("close");
			},
		});
	}
	if (openPdf.length) {
		if (isMobileDevice() === false) {
			openPdf.colorbox({
				iframe: true,
				className: "fPdf",
				width: "940px",
				height: "100%",
				maxWidth: "100%",
				initialWidth: "100px",
				initialHeight: "100px",
				fixed: true,
				opacity: 0.8,
				transition: "fade",
				speed: 300,
				fadeOut: 300,
				returnFocus: false,
				overlayClose: false,
				escKey: true,
				closeButton: true,
				current: false,
				rel: false,
				title: getTitleFancy,
				onComplete: function () {
					loadBtnsFancy("open");
				},
				onClosed: function () {
					loadBtnsFancy("close");
				},
			});
		} else {
			openPdf.attr("target", "_blank");
		}
	}
	if (openFancy.length) {
		openFancy.colorbox({
			width: "100%",
			height: "100%",
			className: "fContent",
			initialWidth: "100px",
			initialHeight: "100px",
			fixed: true,
			opacity: 0.8,
			transition: "fade",
			speed: 300,
			fadeOut: 300,
			returnFocus: false,
			overlayClose: false,
			escKey: true,
			closeButton: false,
			current: false,
			rel: false,
			title: false,
			onComplete: function () {
				loadBtnsFancy("open");
				loadGeneralScroll($("#cboxLoadedContent"));
			},
			onClosed: function () {
				loadBtnsFancy("close");
			},
		});
	}
}
function loadBtnsFancy(event) {
	var btnCF = $("#cboxLoadedContent .btnCF"),
		btnClose = $("#cboxClose"),
		classShow = "show";
	if (btnCF.length) {
		btnCF.on("click", function (e) {
			e.preventDefault();
			$.colorbox.close();
		});
	}
	if (event == "open") {
		btnClose.addClass(classShow); /*$('body').css('overflow', 'hidden');*/
	} else {
		btnClose.removeClass(classShow); /*$('body').css('overflow', 'auto');*/
	}
}
function resizeFancy() {
	var fancyContent = $("#colorbox.fContent"),
		fancyVideos = $("#colorbox.fVideos"),
		fancyImages = $("#colorbox.fImages"),
		fancyPdf = $("#colorbox.fPdf");
	if (fancyContent.length) {
		$.colorbox.resize({ width: "100%", height: "100%" });
	}
	if (fancyVideos.length) {
		var widthWindow = $(window).width();
		if (widthWindow < 790) {
			$.colorbox.resize({ width: "100%", height: "100%" });
		} else {
			$.colorbox.resize({ width: "790px", height: "470px" });
		}
	}
	if (fancyPdf.length) {
		var widthWindow = $(window).width();
		if (widthWindow < 940) {
			$.colorbox.resize({ width: "100%", height: "100%" });
		} else {
			$.colorbox.resize({ width: "940px", height: "100%" });
		}
	}
	if (fancyImages.length) {
		$.colorbox.resize();
	}
}
function getRelFancy() {
	var rel = $(this).data("rel");
	if (rel !== undefined) {
		return rel;
	} else {
		return false;
	}
}
function getTitleFancy() {
	var title = $(this).data("title");
	if (title !== undefined) {
		var htmlTitle = '<div class="titleFancy">' + title + "</div>";
		return htmlTitle;
	} else {
		return false;
	}
}

// Slider videos trabajos
function loadSliderVWork() {
	var sliderVWork = $(".sliderVWork");
	if (sliderVWork.length) {
		sliderVWork.slick({
			slide: ".gSlide",
			slidesToShow: 3,
			slidesToScroll: 3,
			arrows: true,
			dots: false,
			speed: 500,
			responsive: [
				{
					breakpoint: 1024,
					settings: { slidesToShow: 2, slidesToScroll: 2 },
				},
				{
					breakpoint: 568,
					settings: { slidesToShow: 1, slidesToScroll: 1 },
				},
			],
		});
	}
}

// Type device
function isMobileDevice() {
	var wrapper = $("#mainWrapper");
	if (wrapper.hasClass("isMobile")) {
		return true;
	} else {
		return false;
	}
}

$(window).on({
	load: function () {
		loadingPage();
	},
	scroll: function () {
		changeSizeMenu();
	},
	resize: function () {
		resizeFancy();
	},
});

//General scroll
function loadGScroll() {
	var gScroll = $(".gScroll");
	if (gScroll.length) {
		gScroll.mCustomScrollbar({
			axis: "y",
			theme: "minimal-dark",
			scrollInertia: 0.5,
		});
	}
}

//Galeria interna
function loadGalIntern() {
	var galIntern = $(".galIntern");
	if (galIntern.length) {
		galIntern.slick({
			slide: "figure",
			speed: 1000,
			dots: true,
			autoplay: true,
			autoplaySpeed: 3500,
			fade: true,
		});
	}
}

//Datepicker
function loadCalendar() {
	var datepicker = $(".datepicker");
	if (datepicker.length) {
		datepicker.each(function () {
			if ($(this).hasClass("hours")) {
				$(this).datetimepicker({
					dayNames: [
						"Domingo",
						"Lunes",
						"Martes",
						"Miércoles",
						"Jueves",
						"Viernes",
						"Sábado",
					],
					dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
					monthNames: [
						"Enero",
						"Febrero",
						"Marzo",
						"Abril",
						"Mayo",
						"Junio",
						"Julio",
						"Agosto",
						"Septiembre",
						"Octubre",
						"Noviembre",
						"Diciembre",
					],
					monthNamesShort: [
						"Ene",
						"Feb",
						"Mar",
						"Abr",
						"May",
						"Jun",
						"Jul",
						"Ago",
						"Sep",
						"Oct",
						"Nov",
						"Dic",
					],
					changeMonth: true,
					showButtonPanel: true,
					controlType: "select",
					onClose: function () {
						$(this).blur();
					},
				});
			} else {
				$(this).datepicker({
					dayNames: [
						"Domingo",
						"Lunes",
						"Martes",
						"Miércoles",
						"Jueves",
						"Viernes",
						"Sábado",
					],
					dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
					monthNames: [
						"Enero",
						"Febrero",
						"Marzo",
						"Abril",
						"Mayo",
						"Junio",
						"Julio",
						"Agosto",
						"Septiembre",
						"Octubre",
						"Noviembre",
						"Diciembre",
					],
					monthNamesShort: [
						"Ene",
						"Feb",
						"Mar",
						"Abr",
						"May",
						"Jun",
						"Jul",
						"Ago",
						"Sep",
						"Oct",
						"Nov",
						"Dic",
					],
					changeMonth: true,
					onClose: function () {
						$(this).blur();
					},
				});
			}
			$(this).on("focus", function () {
				$(this).blur();
			});
		});
		$("#date-from").datepicker("option", "onClose", function (
			selectedDate
		) {
			$("#date-to").datepicker("option", "minDate", selectedDate);
			$(this).blur();
		});
		$("#date-to").datepicker("option", "onClose", function (selectedDate) {
			$("#date-from").datepicker("option", "maxDate", selectedDate);
			$(this).blur();
		});
	}
}

//Fancy formularios
function loadFancyForm() {
	var openForm = $(".openForm");
	if (openForm.length) {
		openForm.colorbox({
			opacity: 0.75,
			overlayClose: false,
			closeButton: false,
			initialWidth: "100px",
			initialHeight: "100px",
			width: "100%",
			height: "100%",
			className: "fContent",
			onOpen: function () {
				$("body").css("overflow", "hidden");
			},
			onClosed: function () {
				$("body").css("overflow", "auto");
			},
			onComplete: function () {
				loadBtnCF();
				loadCalendar();
				validateFormCotizar();
				validateFormContacto();
			},
		});
	}
}
function resizeFancy() {
	var fancy = $("#colorbox.fContent");
	if (fancy.length) {
		$.colorbox.resize({ width: "100%", height: "100%" });
	}
}
function loadBtnCF() {
	var btnCF = $("#cboxLoadedContent #btnCF");
	if (btnCF.length) {
		btnCF.on("click", function (e) {
			e.preventDefault();
			$.colorbox.close();
		});
	}
}

//Comparacion Vuelos
function loadSlidersCompa() {
	var sTitComp = $("#sTitComp"),
		sDescComp = $("#sDescComp");
	if (sTitComp.length && sDescComp.length) {
		sTitComp.slick({
			slide: ".slide",
			centerMode: true,
			centerPadding: "50px",
			slidesToShow: 3,
			focusOnSelect: true,
			asNavFor: "#sDescComp",
			responsive: [{ breakpoint: 800, settings: { slidesToShow: 1 } }],
		});
		sDescComp.slick({
			slide: ".slide",
			fade: true,
			arrows: false,
			speed: 0,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			asNavFor: "#sTitComp",
		});
	}
}

//Tipos de aviones
function loadBtnOpenDAv() {
	var openDAv = $(".openDAv");
	if (openDAv.length) {
		openDAv.on("click", function (e) {
			e.preventDefault();
			toggleDetailAirplane($(this));
		});
	}
}
function toggleDetailAirplane(btn) {
	var element = btn.parents("article"),
		clase = "dOpen",
		textBtn;
	if (element.hasClass(clase)) {
		textBtn = btn.data("text1");
		element.removeClass(clase);
	} else {
		textBtn = btn.data("text2");
		element.addClass(clase);
	}
	btn.text(textBtn);
}

//Banner Principal
function loadMainSlider() {
	var mainSlider = $("#mainSlider");
	if (mainSlider.length) {
		mainSlider.slick({
			slide: "article",
			speed: 1000,
			dots: true,
			autoplay: false,
			autoplaySpeed: 5000,
			fade: true,
		});
	}
}

//Banner Inerno
function loadIntSlider() {
	var intSlider = $("#intSlider");
	if (intSlider.length) {
		intSlider.slick({
			slide: "article",
			speed: 1000,
			dots: true,
			autoplay: false,
			autoplaySpeed: 5000,
			fade: true,
		});
	}
}

//Slider Clientes
function loadSCustomer() {
	var sCustomer = $("#sCustomer");
	if (sCustomer.length) {
		sCustomer.slick({
			slide: "article",
			adaptiveHeight: true,
			speed: 500,
		});
	}
}

//anclas animadas
function animateAnchor() {
	var anchorA = $(".anchorA");
	if (anchorA.length) {
		anchorA.on("click", function (e) {
			e.preventDefault();
			var div = $($(this).attr("href"));
			toggleMMenu($("#btnMMenu"), "close");
			$("html,body").animate({ scrollTop: div.offset().top }, "slow");
		});
	}
}

//Menu mobile
function loadBtnMenu() {
	var btnMMenu = $("#btnMMenu");
	if (btnMMenu.length) {
		btnMMenu.on("click", function (e) {
			e.preventDefault();
			toggleMMenu($(this), "");
		});
	}
}
function toggleMMenu(btn, evento) {
	var wrapper = $("#mainWrapper");
	if (evento == "close") {
		wrapper.removeClass("menuOpen");
		btn.removeClass("open");
	} else {
		wrapper.toggleClass("menuOpen");
		btn.toggleClass("open");
	}
}

//Menu thin
function changeSizeMenu() {
	var wrapper = $("#mainWrapper"),
		ventana = $(window),
		clase = "menuThin";
	var scrollT = ventana.scrollTop();
	if (scrollT > 150) {
		wrapper.addClass(clase);
	} else {
		wrapper.removeClass(clase);
	}
}

//Loading page
function loadingPage() {
	var gLPage = $(".gLPage");
	if (gLPage.length) {
		gLPage.fadeOut(200);
	}
}

// Prueba menu desplegable-------------------------------------------------------
// Lateral menu
function loadGLMenu() {
	var gLMenu = $(".gLMenu");
	if (gLMenu.length) {
		var mActive = gLMenu.find("a.active"),
			statusActive = false;
		if (mActive.length) {
			var index = mActive.parents(".contLMenu").index(".contLMenu");
			statusActive = index;
		}
		gLMenu.accordion({
			heightStyle: "content",
			collapsible: true,
			animate: 100,
			active: statusActive,
		});
	}
}

// Accordion events
function loadGEAccor() {
	var gEAccor = $(".gEAccor");
	if (gEAccor.length) {
		gEAccor.accordion({
			active: false,
			collapsible: true,
			heightStyle: "content",
			animate: 250,
		});
	}
}
