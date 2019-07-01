<?php

include_once get_stylesheet_directory() . '/views/mapa/controller.php';

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    include get_stylesheet_directory() . '/views/mapa/index.php';

endwhile; endif;

get_footer();
