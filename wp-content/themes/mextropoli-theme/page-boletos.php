<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!-- B O L E T O S -->
    <section class="boletos">

        <?php get_template_part('views/boletos/banner'); ?>
        
        <?php get_template_part('views/boletos/loop'); ?>

    </section>

<?php endwhile; endif; ?>

<?php get_footer();