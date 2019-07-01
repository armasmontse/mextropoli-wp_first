import {$, w} from './constants';

$(document).ready(function() {

    // - - - M e n ú   r e s p o n s i v e - - -
	const btnAbrir = $(".botones-responsive.open");
	const btnCerrar = $(".botones-responsive.close");
	const menuMobile = $(".menu-mobile");

	// Abrir menu lateral
	btnAbrir.click(function() {
		btnAbrir.hide();
		btnCerrar.show();
		menuMobile.show();
    });

    // Cerrar menu lateral
	btnCerrar.click(function() {
		btnCerrar.hide();
		btnAbrir.show();
		menuMobile.hide();
	});

});