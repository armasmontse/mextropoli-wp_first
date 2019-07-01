<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- F E S T I V A L -->
    <section class="festival">

        <?php get_template_part('views/festival/banner'); ?>

        <?php get_template_part('views/festival/ediciones-anteriores'); ?>

    </section>

<?php endwhile; endif; ?>

<?php get_footer();