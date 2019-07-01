<!-- L o o p   e q u i p o -->
<div class="loop-equipo">
    <div class="grid__container">
        <div class="loop-equipo__contenedor">
            <?php
                if( have_rows('equipo_areas') ):
                    while ( have_rows('equipo_areas') ) : the_row(); ?>

                        <div class="loop-equipo__card">
                            <?php
                            if( have_rows('area_info_grupo') ): 
                                while( have_rows('area_info_grupo') ): the_row(); 
                                    
                                    if( have_rows('informacion_por_area') ):
                                        while ( have_rows('informacion_por_area') ) : the_row();

                                            $nombres = get_sub_field('area_integrante_nombre'); ?>
                                            <p class="loop-equipo__nombre"><?php echo $nombres; ?></p>

                                        <?php   
                                        endwhile;
                                    endif;
                                    
                                    $descripcion = get_sub_field('area_descripcion');
                                    $mail = get_sub_field('area_mail'); ?>
                                        <p class="loop-equipo__descripcion"><?php echo $descripcion ?></p>
                                        <a href="mailto:<?php echo $mail ?>" class="loop-equipo__mail"><?php echo $mail ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    <?php 
                    endwhile;
                endif;
            ?>
            <?php $info = get_field('equipo_info_mail'); ?>
            <?php if( $info ): ?>

                <div class="loop-equipo__card">
                    <p class="loop-equipo__info-titulo">Información</p>
                    <p class="loop-equipo__info-mail"><?php echo $info; ?></p>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>