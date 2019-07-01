<?php 

namespace App;

use Illuminate\CustomPostType;

class Edition extends CustomPostType
{
    const nombre_plural = 'Ediciones';
    const nombre_singular = 'edición';
    // Slug para que coincida con el de la página.
    const slug = 'edition';

    protected static $supports = [
        'title',
        'editor',
        'thumbnail',
        'excerpt',
    ];
    protected static $menu_icon = 'dashicons-star-filled';

    public function setMetas()
    {

    }
}