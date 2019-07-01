<!-- V i d e o s -->
<?php if( have_rows('videos') ): ?>
    <div class="videos">
        <div class="videos__contenedor">
            <div class="flex-center">
                <h2 class="videos__titulo">Videos</h2>
            </div>

            <div class="videos__row">

                <?php while( have_rows('videos') ): the_row(); 

                    // get iframe HTML
                    $video = get_sub_field('link_videos');                

                ?>
                    <div class="card">
                        <div class="box-aspect">
                            <?php echo $video; ?>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </div>
<?php endif; ?>