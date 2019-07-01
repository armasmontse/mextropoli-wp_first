<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!-- P R E P A R A T E   V I S I T A -->
    <section class="preparate">

        <?php get_template_part('views/preparate/banner'); ?>

        <?php get_template_part('views/preparate/visitas'); ?>

    </section>

<?php endwhile; endif; ?>

<?php get_footer();