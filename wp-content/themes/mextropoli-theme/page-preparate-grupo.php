<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!-- P R E P A R A T E   G R U P O -->
    <section class="preparate">

        <?php get_template_part('views/preparate/banner'); ?>
        
        <?php get_template_part('views/preparate/grupo'); ?>

    </section>

<?php endwhile; endif; ?>

<?php get_footer();