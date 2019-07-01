import {$, w} from './constants';

w.load(() => {

    $('.banner-home__slider--desktop').slick({
    	autoplay: true,
		dots: true,
		prevArrow: $('.galeria-anterior'),
		nextArrow: $('.galeria-siguiente'),
	});
	
	$('.banner-home__slider--mobile').slick({
    	autoplay: false,
		dots: true,
        prevArrow: $('.galeria-prev'),
		nextArrow: $('.galeria-next'),
	});
	
	$('.galeria-expositores-slider').slick({
    	autoplay: false,
		dots: false,
        prevArrow: $('.galeria-prev'),
		nextArrow: $('.galeria-next'),
	});
});