<!-- Preguntas  -->
<div class="preguntas">
    <div class="preguntas__row">
        <a class="preguntas__card active" href="<?php echo BLOGURL ?>/preparate-grupo">
            ¿Quieres sumarte a un grupo?
        </a>
        <a class="preguntas__card" href="<?php echo BLOGURL ?>/preparate-hospedaje">
            ¿Dónde hospedarte?
        </a>
        <a class="preguntas__card" href="<?php echo BLOGURL ?>/preparate-visita">
            ¿Qué visitar?
        </a>
    </div>
</div>

<!-- Loop sedes -->
<div class="tarjetas">

    <?php if( have_rows('grupos') ): ?>
        <?php while( have_rows('grupos') ): the_row(); 
            // vars
            $estado = get_sub_field('estado');
            $contacto = get_sub_field('contacto');
            $institucion = get_sub_field('institucion');
            $telefono = get_sub_field('telefono');
            $correo = get_sub_field('correo');
        ?>

            <div class="card">

                <div class="card__titulo">
                    <?php if( $estado ): ?>
                        <?php echo $estado; ?>
                    <?php endif; ?>
                </div>
                
                <div class="card__contacto">
                    <?php if( $contacto ): ?>
                        <?php echo $contacto; ?>
                    <?php endif; ?>                
                </div>

                <div class="card__telefono">
                    <?php if( $institucion ): ?>
                        <?php echo $institucion; ?>
                    <?php endif; ?>                
                </div>

                <div class="card__telefono">
                    <?php if( $telefono ): ?>
                        <?php echo $telefono; ?>
                    <?php endif; ?>                
                </div>

                <div class="card__correo">
                    <?php if( $correo ): ?>
                        <a href="mailto:<?php echo $correo; ?>"><?php echo $correo; ?></a>
                        
                    <?php endif; ?>
                </div>

            </div>

        <?php endwhile; ?>
    <?php endif; ?>

</div>

<div class="mail-contacto">

    Si vienes de otro lugar o necesitas información, puedes escribir a <a href="mailto:grupos@mextropoli.mx">grupos@mextropoli.mx</a>

</div>