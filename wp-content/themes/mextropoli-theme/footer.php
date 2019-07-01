		</div> <!-- Aquí cierra el main-wrap -->

		<?php if(true): ?>

			<footer class="footer">
				<div class="grid__container">
					<div class="footer__contenedor">

						<div class="logo">
							<a href="<?php echo BLOGURL ?>">
								<img class="logo__imagen" src="<?php echo THEMEURL ?>images/logo/logo.svg" alt="">
							</a>
						</div>

						<div class="nav">
							<?php
								wp_nav_menu(array(
									'menu'           => "main",
									'theme_location' => 'footer_menu',
									'menu_class'     => 'lista',
								));
							?>
						</div>

						<div class="redes">
							<div class="redes__titulo">
								¡Síguenos!
							</div>
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

					</div>
				</div>
			</footer>

		<?php endif; ?>

		<?php wp_footer(); ?>

	</body>
</html>
