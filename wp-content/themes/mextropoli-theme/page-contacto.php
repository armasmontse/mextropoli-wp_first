<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!-- C O N T A C T O -->
    <div class="contacto">
        <div class="grid__container">
            <div class="contacto__contenedor">

                <div class="col__info">
                    <h3 class="contacto__titulo">Contacto</h3>

                    <div class="card">
                        <label>Dirección</label>
                        <p>Arquine</p>
                        <p>Amsterdan 163 A</p>
                        <p>Colonia Hipódromo</p>
                        <p>C.P. 06100</p>
                        <p>Ciudad de México</p>
                    </div>

                    <div class="card">
                        <label>Correo electrónico</label>
                        <p>
                            <a href="mailto:hola@mextropoli.mx">
                                hola@mextropoli.mx
                            </a>
                        </p>

                    </div>
                
                </div>

                <div class="col__form">

                    <!-- Local -->
                    <?php //echo do_shortcode( '[contact-form-7 id="160" title="Formulario de contacto"]' ); ?>

                    <!-- Desarrollo -->
                    <?php echo do_shortcode( '[contact-form-7 id="214" title="Formulario de contacto"]' ); ?>

                </div>

            </div>
        </div>
    </div>

<?php endwhile; endif; ?>

<?php get_footer();