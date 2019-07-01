<?php

namespace App;

use Illuminate\CustomPostType;

class Event extends CustomPostType
{
    const nombre_plural = 'Programa';
    const nombre_singular = 'evento';
    // Slug para que coincida con el de la página.
    const slug = 'jlmwQX4KrvUmBNp8ujFImNL5oAqP8jiE';  // Random string for preventing accesing this slug.

    protected static $supports = [
        'title',
        'editor',
        'excerpt'
    ];

    protected static $menu_icon = 'dashicons-clipboard';

    /**
     * Event properties.
     */
    public $event_speaker;

    public $venue_id;

    public $date;

    public $time;

    public $ticket_id;

    public $price;

    public $url;

    public $title;

    public $excerpt;

    public $slug;

    public $content;

    public $categories;

    public function setMetas()
    {
        // ACF ATTRIBUTES
        $this->event_speaker = get_field('event_speaker', $this->ID);
        $this->venue_id = get_field('venue_id', $this->ID);
        $this->date = get_field('date', $this->ID, false);
        $this->time = get_field('time', $this->ID);
        $this->ticket_id = get_field('ticket_id', $this->ID);
        $this->price = get_field('price', $this->ID);
        $this->url = get_field('url', $this->ID);

        // POST ATTRIBUTES
        $this->title = $this->post->post_title;
        $this->excerpt = $this->post->post_excerpt;
        $this->slug = $this->post->post_name;
        $this->content = $this->post->post_content;

        // TAXONOMIES IDS.
        $this->categories = [];

        $event_categories = get_the_terms($this->ID, 'events_typology');

        if($event_categories){
            $this->categories = array_map(function($term) {
                return $term->term_id;
            }, $event_categories);
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
