<?php

namespace App\Providers;

class CustomPostTypeServiceProvider
{
    // Los modelos van en singular!!!
    protected $posttypes = [
        \App\Edition::class,        // Ediciones

        \App\Event::class,          // Eventos
        \App\Venues::class,         // Sedes

        \App\Tickets::class,        // Tickets
        \App\Allies::class,         // Aliados
        \App\EditionSpeaker::class, // Speaker
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach($this->posttypes as $file){
            $file::registerPostype();
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
