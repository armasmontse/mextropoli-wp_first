import {$, w} from './constants';

w.load(() => {

    // Modal que abre una galería
    const modalGallery = $('.modal-gallery')

    if(modalGallery.length) {

        modalGallery.slick({
            autoplay: true,
            arrows: true,
            dots: false,
            prevArrow: $('.galeria-prev'),
            nextArrow: $('.galeria-next'),
        })

        const modal = $('#modal')

        $('.modalOpen').click(function() {
            modal.css('display', 'flex')
            modalGallery.slick('setPosition', 0)
        });

        $('.close').click(function() {
            modal.css('display', 'none')
        })

        modalGallery.click(function () {
            modal.css('display', 'none')
        })
    }

    //Modal de Iframe de Single  -- No se ocupa aquí --
    const modalCont = $('.modal-iframe');
    const modalIframe = $('#modalIframe');
    const video = $('.galeria__video');

    video.click(function () {
        modalIframe.css('display', 'flex')
        modalCont.slick('setPosition', 0)
    });

    $('.close').click(function () {
        modalIframe.css('display', 'none');
    })

    modalIframe.click(function () {
        modalIframe.css('display', 'none');
    })

    //Modal que abre el order de Search -- No se ocupa aquí --
    const abrirSearch = $('#search-order');
    const close = $('.search__close');
    const modalSearch = $('.search');
    const abrirFilter = $('#search-filter');
    const modalFilter = $('.filter');

    abrirSearch.click(function() {
        modalSearch.addClass('view');
    });

    close.click(function() {
        modalSearch.removeClass('view');
    })

    abrirFilter.click(function() {
        modalFilter.addClass('view');
    });

    close.click(function() {
        modalFilter.removeClass('view');
    });

    const modal = $('.modal')

    $('.modalOpen').click(function() {
        // console.log(this)
        var dataIndex = $(this).attr('data-index')
        $('#' + dataIndex).css('display', 'flex')
        
        $('.galeria-expositores-slider').slick('unslick');
        var modal=$(this).data("index");
        
        var prev=$("#"+modal).find(".galeria-prev");
        var next=$("#"+modal).find(".galeria-next");
        var slider=$("#"+modal).find(".galeria-expositores-slider").attr("id");
        console.log($(this).data("index"));
        console.log(slider);

        $('#'+slider).slick({
            autoplay: false,
            dots: false,
            prevArrow: $("#"+$(prev).attr("id")),
		    nextArrow: $("#"+$(next).attr("id")),
        });
    });

    $('.close').click(function() {
        modal.css('display', 'none')
    });

    $('.modalOpenSedes').click(function() {
        console.log(this)
        var dataIndex = $(this).attr('data-index')

        console.log(dataIndex)
        // console.log($(this).data("index"));

        $('#' + dataIndex).css('display', 'flex')
        $('#' + dataIndex).css('width', '100%')

        console.log($('#' + dataIndex));
        

    });

});