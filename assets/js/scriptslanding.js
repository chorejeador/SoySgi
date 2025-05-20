/*!
* Start Bootstrap - Agency v7.0.11 (https://startbootstrap.com/theme/agency)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
*/
//
// Scripts
//

$(document).ready(function () {
	// Oculta todas las descripciones por defecto
	$('.descripcion').hide();

	// Click en el nombre para mostrar/ocultar descripción (si existe)
	$('.nombre-documento').on('click', function (e) {
		const descripcion = $(this).closest('.card').find('.descripcion');
		if (descripcion.text().trim() === '' || descripcion.text === null) return;

		e.stopPropagation(); // Evita que el click se propague al card

		descripcion.toggle();

		const icon = $(this).find('.icon-dropdown');
		icon.toggleClass('fa-chevron-down fa-chevron-up');
	});

	// Click en la imagen o cualquier parte general del card
	$('.card-click').on('click', function () {
		const url = $(this).data('url');
		if (url) {
			window.location.href = url;
		}
	});
});

window.addEventListener('DOMContentLoaded', event => {
	new VenoBox({
		selector: '.my-image-links', numeration: true, infinigall: true, spinner: 'rotating-plane', fitView: true,
	});
	// Navbar shrink function
	var navbarShrink = function () {
		const navbarCollapsible = document.body.querySelector('#mainNav');
		if (!navbarCollapsible) {
			return;
		}
		if (window.scrollY === 0) {
			navbarCollapsible.classList.remove('navbar-shrink')
		} else {
			navbarCollapsible.classList.add('navbar-shrink')
		}

	};

	// Shrink the navbar
	navbarShrink();

	// Shrink the navbar when page is scrolled
	document.addEventListener('scroll', navbarShrink);

	// Activate Bootstrap scrollspy on the main nav element
	const mainNav = document.body.querySelector('#mainNav');
	if (mainNav) {
		new bootstrap.ScrollSpy(document.body, {
			target: '#mainNav', offset: 74,
		});
	}


	// Collapse responsive navbar when toggler is visible
	const navbarToggler = document.body.querySelector('.navbar-toggler');
	const responsiveNavItems = [].slice.call(document.querySelectorAll('#navbarResponsive .nav-link'));
	responsiveNavItems.map(function (responsiveNavItem) {
		responsiveNavItem.addEventListener('click', () => {
			if (window.getComputedStyle(navbarToggler).display !== 'none') {
				navbarToggler.click();
			}
		});
	});
	$(".modal-variedad").on("click", function () {
		$("#exampleModal").modal("show");
		let type = $(this).data("type");
		const modalBody = document.querySelector('.modal-body');
		const imgs = modalBody.getElementsByTagName('img');
		const links = modalBody.getElementsByTagName('a');
		for (let i = 0; i < imgs.length; i++) {
			let currentImage = imgs[i].src;
			let partsUrl = currentImage.split('/');
			let currentFolder = partsUrl[7];
			imgs[i].src = currentImage.replace(currentFolder, type);
			links[i].href = currentImage.replace(currentFolder, type);
		}
	});

});
