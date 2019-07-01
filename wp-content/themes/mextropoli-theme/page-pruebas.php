<?php

get_header();

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div class="pruebas">

    <h1>Hola mundo pruebas!</h1>

    <?php

        if( have_rows('flexible') ):

            while ( have_rows('flexible') ) : the_row();

                if( get_row_layout() == 'imagenes' ):

                    if( have_rows('grupo') ): 

                        while( have_rows('grupo') ): the_row(); 

                            $desktop = get_sub_field('desktop');
                            $mobile = get_sub_field('movil');
                            
                            ?>
                            <div id="grupo">
                                <img src="<?php echo $desktop['url']; ?>" alt="" />
                                <img src="<?php echo $mobile['url']; ?>" alt="" />                
                            </div>
                    
                        <?php endwhile; ?>
                    
                    <?php endif;
                    
                elseif( get_row_layout() == 'video' ): 

                    $video = get_sub_field('video');
                    echo $video;

                endif;

            endwhile;

        else :

            // no layouts found

        endif;
        
    ?>

    
            

</div>

<?php endwhile; endif; ?>






<!-- Grupo -->



<?php

get_footer(); ?>