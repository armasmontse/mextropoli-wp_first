<?php

namespace App;

use Illuminate\CustomPostType;

class Tickets extends CustomPostType
{
    const nombre_plural = 'Boletos';
    const nombre_singular = 'boleto';
    const slug = 'tickets';

    protected static $supports = [
        'title',
        'editor',
        'thumbnail',
    ];
    protected static $menu_icon = 'dashicons-tickets-alt';

    /**
     * Speaker properties.
     */
    public $title;

    public $excerpt;

    public $slug;

    public $content;

    public function setMetas()
    {
        // POST ATTRIBUTES
        $this->title = $this->post->post_title;
        $this->excerpt = $this->post->post_excerpt;
        $this->slug = $this->post->post_name;
        $this->content = $this->post->post_content;
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
            'thumbail_img',
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
