import {$, w} from './constants'

const renderYoutube = function () {

    console.log('Rendering youtube.')

    const contVideo = $('div.youtube-autoplay');

    contVideo.each(function(){

        let $this = $(this)
        let divs = $this.find('div')

        if(divs.length){
            new YT.Player(divs[0], {
                height: '360',
                width: '640',
                videoId: $this.data('video-id'),
                playerVars: { 'controls': 0, 'showinfo': 0, 'rel': 0 },
                events: {
                    'onReady': (event) => {

                        if ($this.data('autoplay')) {

                            contVideo.mouseenter(function() {
                                event.target.playVideo()
                            })
                            contVideo.mouseleave(function() {
                                event.target.pauseVideo()
                            })

                        }

                    },
                }
            })
        }

    })


    const Iframe = $('div.iframe');



    Iframe.each(function(){
        var widgetIframe = document.getElementById('sc-widget'),
        widget = SC.Widget(widgetIframe);

        widget.bind(SC.Widget.Events.READY, function() {
            widget.setVolume(50);
        });



        $('.close').click(function () {
            console.log('cierra aqui');
            $('#modalIframe').css('display', 'none');

            widget.pause();
        });

        $('#modalIframe').click(function () {
            console.log('cierra aqui');
            $('#modalIframe').css('display', 'none');
            widget.pause();


        });

    });

    const IframeId = $('iframe#sc-widget');





}

export {renderYoutube}
