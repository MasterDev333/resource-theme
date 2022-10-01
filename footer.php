<?php
global $post;
$phone = get_field( 'phone', 'options' );
$email = get_field( 'email', 'options' );
?>
			<!-- Client Upload -->
			<section class="client-upload">
				<div class="container">
					<?php
					get_template_part_args(
						'templates/content-modules-text',
						array(
							'v'  => 'upload_heading',
							'o'  => 'o',
							't'  => 'h3',
							'tc' => 'a-up',
						)
					);
					?>
					<div class="file-upload">
						<label for="file-upload" class="btn btn-blue">
							Upload
							<i class="fas fa-chevron-right"></i>
						</label>
						<input type="file" id="file-upload">
					</div>
				</div>
			</section><!-- /Client Upload -->
		</main><!-- /Main -->
		<!-- Footer -->
		<footer class="footer">
			<div class="container">
				<nav class="footer-nav">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
						<?php
						get_template_part_args(
							'templates/content-modules-image',
							array(
								'v'     => 'logo',
								'is'    => false,
								'is_2x' => false,
								'v2x'   => false,
								'c'     => 'footer-logo__img',
								'o'     => 'o',
							)
						);
						?>
					</a>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footermenu',
							'menu_class'     => 'footer-menu',
							'container'      => false,
						)
					);
					?>
				</nav>
				<div class="footer-bottom">
					<?php
					get_template_part_args(
						'templates/content-modules-text',
						array(
							'v'  => 'location',
							't'  => 'p',
							'tc' => 'footer-bottom__location text-small',
							'o'  => 'o',
						)
					);
					?>
					<div class="footer-bottom__right">
						<h3 class="footer-bottom__contact"><?php echo esc_html__( 'Get in touch', 'am' ); ?></h3>
						<?php if ( $phone ) : ?>
							<div>
								<a href="tel:<?php echo esc_attr( $phone ); ?>" class="footer-phone h3">
									<?php echo esc_html( $phone ); ?>
								</a>
							</div>
						<?php endif; ?>
						<?php if ( $email ) : ?>
							<div>
								<a href="mailto:<?php echo esc_attr( $email ); ?>" class="footer-email h3">
									<?php echo esc_html( $email ); ?>
								</a>
							</div>
						<?php endif; ?>
						<?php if ( have_rows( 'social_links', 'options' ) ) : ?>
							<div class="footer-socials">
								<?php
								while ( have_rows( 'social_links', 'options' ) ) :
									the_row();
									$icon = get_sub_field( 'icon' );
									$link = get_sub_field( 'link' );
									?>
									<a href="<?php echo esc_url( $link ); ?>" class="footer-social" target="_blank">
										<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">
									</a>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</footer><!-- /Footer -->
	</div>
<?php wp_footer(); ?>
<script>
	var animation = bodymovin.loadAnimation({
		// animationData: { /* ... */ },
		container: document.getElementById('site-loader'), // required
		path: '<?php echo esc_url( get_template_directory_uri() . '/assets/lottie/loader.json' ); ?>', // required
		renderer: 'svg', // required
		loop: false, // optional
		autoplay: true, // optional
		name: "Page Load Animation", // optional
	});
</script>
</body>
</html>
