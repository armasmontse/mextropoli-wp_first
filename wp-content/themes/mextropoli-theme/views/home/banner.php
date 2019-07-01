<!-- B a n n e r -->
<div class="banner-home">
    <div class="banner-home__slider--desktop">
        <?php
            if( have_rows('contenido_slider') ):
                while ( have_rows('contenido_slider') ) : the_row();
                    if( get_row_layout() == 'imagenes' ):
                        if( have_rows('imagenes') ): 
                            while( have_rows('imagenes') ): the_row(); 

                                $desktop = get_sub_field('desktop'); ?>

                                <div class="desktop">
                                    <div class="box__aspect">
                                        <img class="box__aspect--imagen desktop" src="<?php echo $desktop['url']; ?>" alt="" />
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php endif;
                        
                    elseif( get_row_layout() == 'video' ): 
                        
                        $video = get_sub_field('video'); ?>

                        <div class="">
                            <div class="box__aspect">
                                <div class="box__aspect--video">
                                    <?php echo $video; ?>
                                </div>
                            </div>
                        </div>

                    <?php endif;
                endwhile;
            endif;
        ?>
    </div>

    <div class="banner-home__slider--mobile">
        <?php
            if( have_rows('contenido_slider') ):
                while ( have_rows('contenido_slider') ) : the_row();
                    if( get_row_layout() == 'imagenes' ):
                        if( have_rows('imagenes') ): 
                            while( have_rows('imagenes') ): the_row(); 

                                $mobile = get_sub_field('movil'); ?>
                                
                                <div class="mobile">
                                    <div class="box__aspect">
                                        <img class="box__aspect--imagen mobile" src="<?php echo $mobile['url']; ?>" alt="" />
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php endif;
                        
                    // elseif( get_row_layout() == 'video' ): 

                        //$video = get_sub_field('video'); ?>

                        <!-- <div class="">
                            <div class="box__aspect video">
                                <div class="box__aspect--video">
                                    <?php // echo $video; ?>
                                </div>
                            </div>
                        </div> -->

                    <?php endif;
                endwhile;
            endif;
        ?>
    </div>

    <div class="desktop">
        <div class="galeria-anterior"></div>
        <div class="galeria-siguiente"></div>
    </div>

    <div class="mobile">
        <div class="galeria-prev"></div>
        <div class="galeria-next"></div>
    </div>
</div>