<?php

    global $query_args;

    // Query post type 'edition'
    $query_args = array(
        'post_type'         => 'edition',
        'post_status'       => 'publish',
        // 'posts_per_page'    => !isMobile() ? 9 : 4,
    );

    $query = new WP_Query( $query_args );
?>

<!-- E D I C I O N E S   A N T E R I O R E S -->
<div class="loop-ediciones">
    <div class="grid__container">
        <div class="loop-ediciones__contenedor">

            <div class="flex-center">
                <h2 class="loop-ediciones__page">Ediciones anteriores</h2>
            </div>

            <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                <div class="loop-ediciones__card">
                    
                    <div class="card-20" style="background-image: url('<?php echo get_thumbnail_image_url(); ?>');">
                        <h4 clas="loop-ediciones__titulo"><?php the_title(); ?></h4>
                    </div>

                    <div class="card-80">
                        <div class="loop-ediciones__contenido">
                            <?php the_excerpt(); ?>
                        </div>
                
                        <div class="loop-ediciones__link">
                            <a href="<?php the_permalink(); ?>">Conoce más..</a>    
                        </div>
                    </div>
                </div>
        
            <?php endwhile; endif; ?>

        </div>
    </div>
</div>