import {$, w} from './constants';
import './slider'
import './menu'
import './masonry'
import './modal'
import './page-top'
//import './read-more'

import { renderYoutube } from './video'
//import './scrollit'
w.load(() => {

    renderYoutube()

});

$(document).ready(function() {
    console.log('Hello world from El Cultivo!')

    // Enviar formulario.
    $("#contactForm").validate({
        submitHandler: function(form, event) {
            event.preventDefault()
            let submit = $('#sendContactForm')
            submit.prop('disabled', true)
            $.post(cltvo_js_vars.ajax_url, $(form).serializeArray()).done(() => {
                form.reset()
                submit.prop('disabled', false)
                alert('Hemos recibido tu mensaje, gracias por contactarnos.')
            });
        }
    })


    // Botón Biografía
    function menuFixed() {
        var $fixed = $('#boton-fixed');
        var $submenu = $('.submenu-hover');

        if ($(window).scrollTop() > 430)
            $fixed.css({
                'position': 'fixed',
                'top': '0px',
            });

        else
            $fixed.css({
                'position': 'relative',
                'top': 'auto'
            });
    }

    $(window).scroll(menuFixed);

    // Prueba Zoom Arbol

    //CRONOLOGIA
    var dropdown = $(".boton");
    var lista = $(".listado-hover");
    var open = false;

    dropdown.on("click", function() {

        // Si está abierto hay que cerrarlo.
        if(open) {
            lista.removeClass('opacidad');
            console.log('REMOVE OPACCITY')
            open = false;
        }else {
            lista.addClass('opacidad');
            console.log('ADD OPACCITY')
            open = true;
        }

    });


})
