import {$, w} from './constants';

w.load(() => {

    // Botón top
    $('#nav_up').click(
        function (e) {
            $('html, body').animate({scrollTop: '0px'}, 2000);
        }
    );

});