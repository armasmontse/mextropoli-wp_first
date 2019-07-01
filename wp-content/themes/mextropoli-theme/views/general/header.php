<header class="header">
	<div class="grid__container">

		<div class="logo">
			<a href="<?php echo BLOGURL ?>">
				<img class="logo__imagen" src="<?php echo THEMEURL ?>images/logo/logo.svg" alt="">
			</a>
		</div>
		
        <div class="menu">
			<?php
                wp_nav_menu(array(
                    'menu'           => "main",
                    'theme_location' => 'header_menu',
                    'menu_class'     => 'lista',
            	));
                ?>
		</div>
        
        <div class="redes">
            <ul class="redes__lista">
                <li>
                    <a href="https://www.facebook.com/mextropoli/">
                        <img src="<?php echo THEMEURL ?>images/redes/facebook.svg" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/mextropoli/">
                        <img src="<?php echo THEMEURL ?>images/redes/twitter.svg" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/mextropoli/">
                        <img src="<?php echo THEMEURL ?>images/redes/instagram.svg" alt="">
                    </a>
                </li>
            </ul>
        </div>

        <div class="botones-responsive">
            <button class="botones-responsive open">
                Menú
            </button>
            <button class="botones-responsive close">
                Cerrar
            </button>
        </div>
    </div>
    
    <div class="menu-mobile">
        <?php
            wp_nav_menu(array(
                'menu'           => "main",
                'theme_location' => 'header_menu',
                'menu_class'     => 'lista',
            ));
        ?>
    </div>

</header>