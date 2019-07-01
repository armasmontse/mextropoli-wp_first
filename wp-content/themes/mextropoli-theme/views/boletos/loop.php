<?php

    global $query_args;

    // Query post type 'edition'
    $query_args = array(
        'post_type'         => 'tickets',
        'post_status'       => 'publish',
        // 'posts_per_page'    => !isMobile() ? 9 : 4,
    );

    $query = new WP_Query( $query_args );

?>

<!-- L o o p   b o l e t o s -->
<div class="loop-boletos">
    <div class="grid__container">
        <dic class="loop-boletos__contenedor">

            <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                <div class="loop-boletos__card">
                    
                    <div class="card--half">
                        <div class="loop-boletos__titulo">
                            <?php the_title(); ?>
                        </div>
                        <div class="loop-boletos__contenido">
                            <?php the_content(); ?>
                        </div>

                        <?php $link = get_field('link_compra'); ?>
                        <?php $copy = get_field('link_compra-copy'); ?>

                        <?php if( $link ): ?>

                            <div class="loop-boletos__link">
            
                                <a class="" href="mailto:<?php echo $link; ?>"><?php echo $copy; ?></a>
        
                            </div>

                        <?php endif; ?>

                        <?php
                            if( have_rows('segundo_boton') ):
                                while ( have_rows('segundo_boton') ) : the_row(); ?>
                                    <?php if( have_rows('segundo_boton_grupo') ): 
                                        while( have_rows('segundo_boton_grupo') ): the_row(); ?>
                                            
                                            <?php $link_dinamico = get_sub_field('link_compra_dinamico'); ?>
                                            <?php $copy_dinamico = get_sub_field('link_compra_copy_dinamico'); ?>

                                            <?php if( $link_dinamico ): ?>

                                                <div class="loop-boletos__link mt-minus">
                                
                                                    <a class="" href="<?php echo $link_dinamico; ?>"><?php echo $copy_dinamico; ?></a>
                            
                                                </div>

                                            <?php endif; ?>
                                            
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                <?php 
                                endwhile;
                            endif;
                        ?>
                    </div>
                    
                    <div class="card--half">
                        <div class="loop-boletos__thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </div>
    
                </div>

            <?php endwhile; endif; ?>

        </dic>
    </div>
</div>