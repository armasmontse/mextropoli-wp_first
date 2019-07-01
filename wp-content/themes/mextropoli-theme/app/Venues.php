<?php

namespace App;

use Illuminate\CustomPostType;

class Venues extends CustomPostType
{
    const nombre_plural = 'Sedes';
    const nombre_singular = 'sede';
    // Slug para que coincida con el de la página.
    const slug = 'JTHOcVzUxJdORIXBfhu3dGqn0nbI8UFv';  // Random string for preventing accesing this slug.

    protected static $supports = [
        'title',
        'editor',
        'thumbnail',
    ];

    protected static $menu_icon = 'dashicons-location-alt';

    /**
     * Speaker properties.
     */
    public $title;

    public $excerpt;

    public $slug;

    public $content;

    public $address;

    public $coords;

    public $type_id;

    public $color;

    public function setMetas()
    {
        // ACF ATTRIBUTES
        $this->address = get_field('address', $this->ID);

        $this->coords = explode(',', get_field('coordinates', $this->ID));

        // POST ATTRIBUTES
        $this->title = $this->post->post_title;
        $this->excerpt = $this->post->post_excerpt;
        $this->slug = $this->post->post_name;
        $this->content = $this->post->post_content;

        // TAXONOMIES

        $types = get_the_terms($this->ID, 'venues_typology') ;

        if($types){
            $this->type_id = array_map(function($term) {
                return $term->term_id;
            }, $types)[0];
            $this->color = get_field('color', 'term_' . $this->type_id);
        }
    }


    /**
     *
     * Function that allow us to create simple JSON objects.
     *
     */
    public function removeProperties()
    {
        $properties = [
            'post',
            'permalink',
            // 'thumbail_img',
            'thumbail_img_id',
            'images',
            'terms'
        ];

        foreach ($properties as $property) {
            unset($this->$property);
        }

        return $this;
    }
}
