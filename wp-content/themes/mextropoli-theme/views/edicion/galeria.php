<!-- G a l e r i a -->
<?php $images = get_field('galeria'); ?>
<?php if( $images ): ?>
    <div class="galeria">
        <div class="galeria__contenedor">
            <div class="flex-center">
                <h2 class="galeria__titulo">Galeria de fotos</h2>
            </div>

            <div class="galeria__row">
                <?php foreach( $images as $image ): ?>
                    
                    <div class="card">
                        <div class="box-aspect modalOpen">
                            <img class="box-aspect--imagen" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />                        
                        </div>
                    </div>
                
                <?php endforeach; ?>    
            </div>
        </div>
    </div>
<?php endif; ?>
    
<!-- Modal Galery-->
<div id="modal" class="modal">
    <span class="close">&times;</span>

    <h4 class="modal__titulo">Mextrópoli <?php echo the_title(); ?></h4>
    <p>Galeria de fotos</p>

    <div class="modal-content">
        <div class="modal-gallery">
            <?php foreach( $images as $image ): ?>
                <div class="slide">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                </div>
            <?php endforeach; ?>
        </div>
        <div class="galeria-prev"></div>
        <div class="galeria-next"></div>
    </div>
</div> 