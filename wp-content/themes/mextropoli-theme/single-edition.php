<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <!-- E D I C I Ó N -->
        <section class="edicion">
            <div class="grid__container">
                <div class="edicion__contenedor">

                    <?php get_template_part('views/edicion/banner'); ?>
                    
                    <?php get_template_part('views/edicion/numeralia'); ?>

                    <?php // get_template_part('views/edicion/expositores'); ?>

                    <?php get_template_part('views/edicion/galeria'); ?>

                    <?php get_template_part('views/edicion/videos'); ?>

                </div>
            </div>
        </section>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>