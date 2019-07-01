<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!-- E Q U I P O -->
    <section class="equipo">

        <?php get_template_part('views/equipo/banner'); ?>
        
        <?php get_template_part('views/equipo/loop-equipo'); ?>

    </section>

<?php endwhile; endif; ?>

<?php get_footer();