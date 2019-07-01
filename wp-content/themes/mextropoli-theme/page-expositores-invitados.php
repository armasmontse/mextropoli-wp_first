<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- E X P O S I T O R E S -->
<section class="expositores">

    <?php get_template_part('views/expositores/banner'); ?>
    
    <?php get_template_part('views/expositores/loop-expositores'); ?>
    
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>