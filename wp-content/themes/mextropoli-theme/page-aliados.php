<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!-- A L I A D O S -->
    <section class="aliados">

        <?php get_template_part('views/aliados/banner'); ?>
        
        <?php get_template_part('views/aliados/tipos-aliados'); ?>

    </section>

<?php endwhile; endif; ?>

<?php get_footer();