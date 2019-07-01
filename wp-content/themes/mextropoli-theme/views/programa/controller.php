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

// Query speakers.
$args = [
    'post_type' => 'edition_speaker',
    'posts_per_page' => -1,
];

$query = new WP_Query($args);

$speakers = array_map(function($post){
    return (new App\EditionSpeaker($post))->removeProperties();
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

// Query tickets.
$args = [
    'post_type' => 'tickets',
    'posts_per_page' => -1,
];

$query = new WP_Query($args);

$tickets = array_map(function($post){
    return (new App\Tickets($post))->removeProperties();
}, $query->posts);

// Query categories

$categories = get_terms([
    'taxonomy'   => 'events_typology',
    'hide_empty' => false,
]);

wp_reset_postdata();
