<!-- Preguntas  -->
<div class="preguntas">
    <div class="preguntas__row">
        <a class="preguntas__card" href="<?php echo BLOGURL ?>/preparate-grupo">
            ¿Quieres sumarte a un grupo?
        </a>
        <a class="preguntas__card" href="<?php echo BLOGURL ?>/preparate-hospedaje">
            ¿Dónde hospedarte?
        </a>
        <a class="preguntas__card active" href="<?php echo BLOGURL ?>/preparate-visita">
            ¿Qué visitar?
        </a>
    </div>
</div>

<!-- Loop sedes -->
<div class="tarjetas">

    <?php if( have_rows('sedes_visita') ): ?>
        <?php while( have_rows('sedes_visita') ): the_row(); 
            // vars
            $lugar = get_sub_field('lugar');
            $direccion = get_sub_field('direccion');
            $horario = get_sub_field('horario');
        ?>

            <div class="card">

                <div class="card__titulo">
                    <?php if( $lugar ): ?>
                        <?php echo $lugar; ?>
                    <?php endif; ?>
                </div>

                <div class="card__contacto">
                    <?php if( $direccion ): ?>
                        <?php echo $direccion; ?>
                    <?php endif; ?>                
                </div>

                <div class="card__telefono">
                    <?php if( $horario ): ?>
                        <?php echo $horario; ?>
                    <?php endif; ?>                
                </div>
                
            </div>

        <?php endwhile; ?>
    <?php endif; ?>

</div>