<?php

// Query events.
$args = [
    'post_type' => 'event',
    'posts_per_page' => -1,
];

$query = new WP_Query($args);

$events = array_map(function($post){
    return (new App\Event($post))->removeProperties();
}, $query->posts);

// Query venues.
$args = [
    'post_type' => 'venues',
    'posts_per_page' => -1,
];

$query = new WP_Query($args);

$venues = array_map(function($post){
    return (new App\Venues($post))->removeProperties();
}, $query->posts);

// Query types
$types = array_map(function($type){
    $type->color = get_field('color', 'term_' . $type->term_id);
    $type->order = (int) get_field('order', 'term_' . $type->term_id);
    return $type;
}, get_terms([
    'taxonomy'   => 'venues_typology',
    'hide_empty' => false,
]));

wp_reset_postdata();
