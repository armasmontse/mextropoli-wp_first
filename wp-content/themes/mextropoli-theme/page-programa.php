<?php

include_once get_stylesheet_directory() . '/views/programa/controller.php';

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    include get_stylesheet_directory() . '/views/programa/index.php';

endwhile; endif;

get_footer();
