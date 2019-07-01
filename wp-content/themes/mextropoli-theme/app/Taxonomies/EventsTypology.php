<?php

namespace App\Taxonomies;

use Illuminate\Taxonomy;

class EventsTypology extends Taxonomy
{
    const nombre_plural = 'Categorias';
    const nombre_singular = 'categoria';
    const slug = 'NIGpXpna7zJtwBF5mG7jeodGzjSl8miW'; // Random string for preventing accesing this slug.

    protected static $postypes = ['event'];

    protected static $initialTerms = [];
}
