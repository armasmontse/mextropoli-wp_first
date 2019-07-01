<?php

    global $query_args;
    
    // Query post type 'expositores'
    $query_args = array(
        'post_type'         => 'edition_speaker',   
        'post_status'       => 'publish',
    );

    $query = new WP_Query( $query_args );

    // Vars    
    $link = get_field('link_web_expositor');
    $empresa = get_field('empresa_expositor');
    
?>

<!-- L o o p   e x p o s i t o r e s -->
<div class="loop-expositores">
    <div class="grid__container">
        <div class="loop-expositores__contenedor">
            <?php $i = 0; ?>
            <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); $i++; ?>
                <div class="loop-expositores__card modalOpen" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" data-index="modal-<?php echo $i;?>">
                    <h4 class="loop-expositores__nombre">
                        <?php the_title(); ?>
                    </h4>
                </div>

                <!-- Modal Expositores -->
                <div id="modal-<?php echo $i ?>" class="modal">
                    <span class="close">&times;</span>
                
                    <div class="modal-content">
                        <div class="col-20">

                            <div class="box-aspect">
                                <img class="" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                            </div>
                            
                            <h4 class="nombre"><?php the_title(); ?></h4>

                            <?php $premios = get_field('reconocimientos_expositor'); ?>
                            <?php if( $premios ): ?>
                                <p class="premios"><?php echo $premios ?></p>
                            <?php endif; ?>

                            <!-- <a class="boton" href="">Ir a actividades con este expositor</a> -->
                            <!-- <a class="boton" href="">Ir a programa</a>  -->
                            <a class="boton" href="<?php echo BLOGURL ?>/expositores">Ir a expositores</a>
                            <!-- <a class="boton" href="">Ver imágenes</a> -->

                        </div>

                        <div class="col-80">

                            <?php $descripcion = get_field('descripcion_expositor'); ?>
                            <?php if( $descripcion ): ?>
                                <div class="descripcion">
                                    <?php echo $descripcion; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="galeria">
                                <div id ="slide<?php echo $i ?>" class="galeria-expositores-slider idSlider" >
                                        
                                    <?php $images = get_field('galeria_expositor'); ?>
                                    <?php //  var_dump($images) ?>
                                    <?php if ($images) : foreach( $images as $key=>$image ): ?>

                                        <div class="slide">
                                            <div class="box-aspect">
                                                <img class="box-aspect--imagen" src="<?php echo $image['sizes']['large']; ?>" alt=" " />                        
                                            </div>
                                        
                                        </div>
                                        
                                        <?php endforeach; endif; ?> 
                                    </div>
                                    
                                    <div id="prev<?php echo $i ?>" class="arrows galeria-prev"></div>
                                    <div id="next<?php echo $i ?>" class="arrows galeria-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>