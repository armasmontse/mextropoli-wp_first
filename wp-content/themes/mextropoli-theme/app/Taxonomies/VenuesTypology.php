<?php

namespace App\Taxonomies;

use Illuminate\Taxonomy;

class VenuesTypology extends Taxonomy
{
    const nombre_plural = 'Tipo de sedes';
    const nombre_singular = 'Tipo de sede';
    const slug = 'Mw3a4NMOFlIc6H2TxaYQNGq9j81gYqVn'; // Random string for preventing accesing this slug.

    protected static $postypes = ['venues'];

    protected static $initialTerms = [
        'sedes-principales' => 'Sedes principales',
        'sedes-aliadas'     => 'Sedes aliadas',
        'hoteles'           => 'Hoteles',
        'recomendaciones'   => 'Recomendaciones',
        // 'restaurantes'      => 'Restaurantes',
    ];
}
