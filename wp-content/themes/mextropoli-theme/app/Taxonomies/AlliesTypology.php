<?php

namespace App\Taxonomies;

use Illuminate\Taxonomy;

class AlliesTypology extends Taxonomy
{
    const nombre_plural = 'Clasificaciones';
    const nombre_singular = 'clasificación';
    const slug = 'allie-typology';

    protected static $postypes = ['allies'];

    protected static $initialTerms = [
        'institucionales'   => 'Institucionales',
        'comerciales'       => 'Comerciales',
        'creativos'         => 'Creativos',
        'mediaticos'        => 'Mediaticos',
        'medio oficial'     => 'Medio oficial',
    ];
}
