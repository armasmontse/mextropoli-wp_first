<?php 

namespace App;

use Illuminate\CustomPostType;

class Allies extends CustomPostType
{
    const nombre_plural = 'Aliados';
    const nombre_singular = 'aliado';
    // Slug para que coincida con el de la página.
    const slug = 'allies';

    protected static $supports = [
        'title',
        'thumbnail',
    ];
    protected static $menu_icon = 'dashicons-universal-access';

    public function setMetas()
    {

    }
}