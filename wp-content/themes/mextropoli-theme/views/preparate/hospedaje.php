<!-- Preguntas  -->
<div class="preguntas">
    <div class="preguntas__row">
        <a class="preguntas__card" href="<?php echo BLOGURL ?>/preparate-grupo">
            ¿Quieres sumarte a un grupo?
        </a>
        <a class="preguntas__card active" href="<?php echo BLOGURL ?>/preparate-hospedaje">
            ¿Dónde hospedarte?
        </a>
        <a class="preguntas__card" href="<?php echo BLOGURL ?>/preparate-visita">
            ¿Qué visitar?
        </a>
    </div>
</div>

<!-- Loop sedes -->
<div class="tarjetas">

    <?php if( have_rows('sedes_de_hospedaje') ): ?>
        <?php while( have_rows('sedes_de_hospedaje') ): the_row(); 
            // vars
            $lugar = get_sub_field('lugar');
            $contacto = get_sub_field('contacto');
            $telefono = get_sub_field('telefono');
            $codigo = get_sub_field('codigo');
        ?>

            <div class="card">

                <div class="card__titulo">
                    <?php if( $lugar ): ?>
                        <?php echo $lugar; ?>
                    <?php endif; ?>
                </div>

                <div class="card__contacto">
                    <?php if( $contacto ): ?>
                        <?php echo $contacto; ?>
                    <?php endif; ?>                
                </div>

                <div class="card__telefono">
                    <?php if( $telefono ): ?>
                        <?php echo $telefono; ?>
                    <?php endif; ?>                
                </div>

                <div class="card__correo">
                    <?php if( have_rows('correos') ): ?>
                        <?php while( have_rows('correos') ): the_row(); ?>
                            <?php $mail = get_sub_field('correo'); ?>    
                    
                            <ul>
                                <?php if( $mail ): ?>
                                    <a href="mailto:<?php echo $mail; ?>"><?php echo $mail ?></a>
                                <?php endif; ?>             
                            </ul>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div> 

                <div class="card__codigo">
                    <?php if( $codigo ): ?>
                        CÓDIGO: <span><?php echo $codigo; ?></span>
                    <?php endif; ?>
                </div>
            </div>

        <?php endwhile; ?>
    <?php endif; ?>

</div>