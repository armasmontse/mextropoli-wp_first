import {$, w} from './constants';
import Masonry from 'masonry-layout';

w.load(() => {

	var cards = $(".cards");
	var list = $(".list");

	var init_masonry = $('#init_masonry');

	var openCards = true;
	var openList = false;

    

	// Si está abierto hay que cerrarlo.
	cards.on("click", function() {
		init_masonry.removeClass('list');
		list.removeClass('order-active');
		cards.addClass('order-active');
	});

	list.on("click", function() {
		init_masonry.addClass('list');
		cards.removeClass('order-active');
		list.addClass('order-active');
	});
		
    

	const masonry = document.querySelectorAll('.masonry');

	if(masonry) {
		masonry.forEach(element => {
			new Masonry(element, {
				itemSelector: '.masonry-item',
				columnWidth: '.masonry-sizer',
				percentPosition: true
			});
		});
	}

});