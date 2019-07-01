<?php 

return [

    'providers' => [
        App\Providers\AppServiceProvider::class,
        App\Providers\AjaxServiceProvider::class,
        App\Providers\ControllerServiceProvider::class,
        App\Providers\CustomPostTypeServiceProvider::class,
        App\Providers\FiltersServiceProvider::class,
        App\Providers\ActionsServiceProvider::class,
        App\Providers\MenuServiceProvider::class,
        App\Providers\MetaboxServiceProvider::class,
        App\Providers\ScriptsServiceProvider::class,
        App\Providers\SupportServiceProvider::class,
        App\Providers\TaxonomyServiceProvider::class,
        App\Providers\OptionsServiceProvider::class,
    ],

    'special-pages' => [
        'home' => [
            'Home',
            ''
        ],
        'contacto' => [
            'Contacto',
            ''
        ],
        'festival' => [
            'Festival',
            ''
        ],
        'boletos' => [
            'Boletos',
            ''
        ],
        'equipo' => [
            'Equipo',
            ''
        ],
        'aliados' => [
            'Aliados',
            ''
        ],
        'programa' => [
            'Programa',
            ''
        ],
        'expositores-invitados' => [
            'Expositores - Invitados',
            ''
        ],
        'mapa' => [
            'Mapa',
            ''
        ], 
        'preguntas-frecuentes' => [
            'Preguntas Frecuentes',
            ''
        ],
        'preparate-grupo' => [
            'Prepárate grupo',
            ''
        ],
        'preparate-hospedaje' => [
            'Prepárate hospedaje',
            ''
        ],
        'preparate-visita' => [
            'Prepárate visita',
            ''
        ],
    ],

    'special-categories' => [],

    'special-tags' => [],

];