<!-- N u m e r a l i a -->
<?php if( have_rows('numeralia') ): ?>
<div class="numeralia">
    <div class="numeralia__contenedor">

        <div class="flex-center">
            <h2 class="banner-edicion__titulo">Numeralia</h2>
        </div>

        <div class="cards__contenedor">
            <ul class="cards__lista">
                <?php while( have_rows('numeralia') ): the_row(); 
                    $total = get_sub_field('total');
                    $descripcion = get_sub_field('descripcion');
                ?>
                    <li class="card">  
                        <span class="card-numero">
                            <?php echo $total ?>
                        </span>

                        <span class="card-texto">
                            <?php echo $descripcion; ?>
                        </span>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
            
    </div>
</div>
<?php endif; ?>