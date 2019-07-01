<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <!-- F A Q -->
        <section class="faq">

            <div class="banner-festival">
                <div class="grid__container">
                    <div class="banner-festival__contenedor">
                        <div class="flex-center">
                            <h2 class="banner-festival__titulo"><?php echo the_title(); ?></h2>
                        </div>
                
                        <div class="banner-festival__contenido">
                            <div class="banner-festival__contenido--contenedor">
                                <?php the_content(); ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>