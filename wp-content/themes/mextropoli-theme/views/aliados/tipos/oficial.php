<?php

global $query_args;

// Query post type 'edition'
$query_args = array(
    'post_type'         => 'allies',
    'post_status'       => 'publish',
    'tax_query' => array(
        array (
            'taxonomy' => 'allies_typology',
            'field' => 'slug',
            'terms' => 'medio-oficial',
        )
    ),
);

$query = new WP_Query( $query_args );
    
?>

<!-- Oficial -->
<div class="box-tipo">
    <div class="flex-center">
        <h2 class="box-tipo__titulo">Medio oficial</h2>
    </div>

    <div class="loop">
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="loop__card">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php  endwhile; endif; ?>
    </div>
</div>