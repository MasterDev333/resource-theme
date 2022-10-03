<?php
/**
 * Content Modules
 */

global $post;
$color_theme = get_field( 'color_theme' );
?>
<?php
if ( have_rows( 'modules' ) ) :
	while ( have_rows( 'modules' ) ) :
		the_row();
		$id = get_sub_field( 'anchor_id' );
		?>
		<?php
		if ( 'banner' == get_row_layout() ) :
			$type  = get_sub_field( 'type' );
			$image = get_sub_field( 'image' );
			$video = get_sub_field( 'video' );
			?>
			<section class="banner banner--<?php echo esc_attr( $type ); ?>">
				<?php if ( 'home' == $type ) : ?>
					<div class="container banner-inner">
						<div class="banner-image">
							<?php
							get_template_part_args(
								'templates/content-modules-image',
								array(
									'v'     => 'image',
									'is'    => false,
									'is_2x' => false,
									'v2x'   => false,
								)
							);
							?>
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'heading',
									't'  => 'h1',
									'tc' => 'a-up',
									'w'  => 'div',
									'wc' => 'banner-heading',
								)
							);
							?>
						</div>
						<div class="banner-content">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'copy',
									't'  => 'div',
									'tc' => 'banner-copy a-up a-delay-1',
								)
							);
							?>
							<?php
							get_template_part_args(
								'templates/content-modules-cta',
								array(
									'v' => 'cta',
									'c' => 'btn btn-green a-up a-delay-2',
								)
							);
							?>
						</div>
					</div>
					<?php get_template_part( 'templates/content-modules', 'scroll' ); ?>
				<?php elseif ( 'resource' == $type ) : ?>
					<div class="banner-image bg-stretch">
						<?php
						get_template_part_args(
							'templates/content-modules-image',
							array(
								'v'     => 'image',
								'is'    => false,
								'is_2x' => false,
								'v2x'   => false,
							)
						);
						?>
					</div>
					<div class="container">
						<div class="banner-content">
							<div class="banner-content__top">
								<div class="banner-logo">
									<?php
									get_template_part_args(
										'templates/content-modules-image',
										array(
											'v'     => 'logo',
											'is'    => false,
											'v2x'   => false,
											'is_2x' => false,
											'c'     => 'a-up',
										)
									);
									?>
									<?php
									get_template_part_args(
										'templates/content-modules-text',
										array(
											'v'  => 'logo_text',
											't'  => 'h3',
											'tc' => 'banner-logo__heading a-up a-delay-1',
										)
									);
									?>
								</div>
							</div>
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'heading',
									't'  => 'h1',
									'tc' => 'banner-heading a-up a-delay-2',
								)
							);
							?>
						</div> 
					</div>
				<?php elseif ( 'single-resource' == $type ) : ?>
					<img class="banner-solutions__img" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/solutions.png' ); ?>" alt="">
					<div class="container">
						<div class="banner-image">
							<?php
							get_template_part_args(
								'templates/content-modules-image',
								array(
									'v'     => 'image',
									'is'    => false,
									'is_2x' => false,
									'v2x'   => false,
									'c'     => 'banner-image__bg',
								)
							);
							?>
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'heading',
									't'  => 'h1',
									'tc' => 'a-up',
									'w'  => 'div',
									'wc' => 'banner-heading',
								)
							);
							?>
						</div>
						<div class="banner-testimonial">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'testimonial_content',
									't'  => 'h3',
									'tc' => 'banner-testimonial__content a-up',
								)
							);
							?>
							<?php
							get_template_part_args(
								'templates/content-modules-image',
								array(
									'v'     => 'testimonial_avatar',
									'is'    => false,
									'v2x'   => false,
									'is_2x' => false,
									'w'     => 'div',
									'wc'    => 'banner-testimonial__avatar a-up',
								)
							);
							?>
							<div class="banner-testimonial__info__content">
								<?php
								get_template_part_args(
									'templates/content-modules-text',
									array(
										'v'  => 'testimonial_name',
										't'  => 'p',
										'tc' => 'banner-testimonial__name a-up a-delay-1',
									)
								);
								?>
								<?php
								get_template_part_args(
									'templates/content-modules-text',
									array(
										'v'  => 'testimonial_role',
										't'  => 'p',
										'tc' => 'banner-testimonial__role a-up a-delay-1',
									)
								);
								?>
							</div>
						</div>
					</div>
				<?php elseif ( 'team' == $type ) : ?>
					<div class="container banner-inner">
						<div class="banner-content">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'heading',
									't'  => 'h1',
									'tc' => 'banner-heading a-up',
								)
							);
							?>
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'copy',
									't'  => 'div',
									'tc' => 'banner-copy a-up a-delay-1',
								)
							);
							?>
						</div>
						<div class="banner-person bg-stretch">
							<?php
							get_template_part_args(
								'templates/content-modules-image',
								array(
									'v'     => 'person_avatar',
									'is'    => false,
									'v2x'   => false,
									'is_2x' => false,
									'w'     => 'div',
									'wc'    => 'banner-person__image',
								)
							);
							?>
							<div class="banner-person__info">
								<?php
								get_template_part_args(
									'templates/content-modules-text',
									array(
										'v'  => 'person_name',
										't'  => 'h4',
										'tc' => 'banner-person__name text-green a-up',
									)
								);
								?>
								<?php
								get_template_part_args(
									'templates/content-modules-text',
									array(
										'v'  => 'person_role',
										't'  => 'h4',
										'tc' => 'banner-person__role a-up',
									)
								);
								?>
							</div>
						</div>
					</div>
				<?php else : ?>
					<div class="container-fluid">
						<div class="banner-video bg-stretch">
							<?php
							get_template_part(
								'templates/content-modules',
								'media',
								array(
									'image' => $image,
									'video' => $video,
								)
							);
							?>
						</div>
						<div class="container banner-content">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'heading',
									't'  => 'h3',
									'tc' => 'banner-heading a-up',
								)
							);
							?>
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'copy',
									't'  => 'div',
									'tc' => 'banner-copy a-up a-delay-1',
								)
							);
							?>
						</div>
					</div>
				<?php endif; ?>
			</section>
		<?php elseif ( 'services' == get_row_layout() ) : ?>
			<section class="service-content">
				<div class="container">
					<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h2',
								'tc' => 'service-banner__heading a-up',
							)
						);
						?>
					<?php
					get_template_part_args(
						'templates/content-modules-text',
						array(
							'v'  => 'copy',
							't'  => 'div',
							'tc' => 'service-copy a-up',
						)
					);
					?>
					<?php if ( have_rows( 'items' ) ) : ?>
					<div class="service-items">
						<?php
						while ( have_rows( 'items' ) ) :
							the_row();
							$lottie = get_sub_field( 'lottie' );
							?>
							<div class="service-item a-up a-delay-<?php echo esc_attr( get_row_index() ); ?>">
								<div class="service-item__lottie lottie-play" 
									id="service-item--<?php echo esc_attr( get_row_index() ); ?>"
									data-name="service-item--<?php echo esc_attr( get_row_index() ); ?>">
								</div>
								<?php
								get_template_part_args(
									'templates/content-modules-cta',
									array(
										'v'  => 'name',
										'c'  => 'service-item__link',
										'di' => true,
									)
								);
								?>
								<script>
									var animation = bodymovin.loadAnimation({
										// animationData: { /* ... */ },
										container: document.getElementById('service-item--<?php echo esc_attr( get_row_index() ); ?>'), // required
										path: '<?php echo esc_url( $lottie ); ?>', // required
										renderer: 'svg', // required
										loop: false, // optional
										autoplay: false, // optional,
										name: 'service-item--<?php echo esc_attr( get_row_index() ); ?>' // optional,
									});
								</script>
							</div>
						<?php endwhile; ?> 
					</div>
					<?php endif; ?>
					<?php
					get_template_part_args(
						'templates/content-modules-cta',
						array(
							'v' => 'cta',
							'c' => 'btn btn-green a-up a-delay-2',
						)
					);
					?>
				</div>
				<?php get_template_part( 'templates/content-modules', 'scroll' ); ?>
			</section>
		<?php elseif ( 'people' == get_row_layout() ) : ?>
			<section class="people" id="<?php echo esc_attr( $id ); ?>">
				<div class="container-fluid">
					<?php
					$images = get_sub_field( 'left_part' );
					if ( $images ) :
						?>
					<div class="people-left">
						<?php foreach ( $images as $key=>$image ) : ?>
							<div class="people-img bg-stretch">
								<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
							</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<?php
					$images = get_sub_field( 'right_part' );
					if ( $images ) :
						?>
					<div class="people-right">
						<?php foreach ( $images as $image ) : ?>
							<div class="people-img bg-stretch">
								<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
							</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<div class="container">
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h2',
								'tc' => 'people-heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'copy',
								't'  => 'div',
								'tc' => 'people-copy a-up a-delay-1',
							)
						);
						?>
						<div class="people-join a-up a-delay-2">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'sub_heading',
									't'  => 'h2',
									'tc' => 'people-join__heading',
								)
							);
							?>
							<?php
							get_template_part_args(
								'templates/content-modules-cta',
								array(
									'v' => 'cta',
									'c' => 'btn btn-pink',
								)
							);
							?>
						</div>
					</div>
				</div>
				<?php get_template_part( 'templates/content-modules', 'scroll' ); ?>
			</section>
			<?php
		elseif ( 'content_image' == get_row_layout() ) :
			$bg_color   = get_sub_field( 'background_color' );
			$text_color = get_sub_field( 'text_color' );
			$style      = get_sub_field( 'style' );
			$type       = get_sub_field( 'media_type' );
			?>
			<section 
				class="content-image content-image--<?php echo esc_attr( $style ); ?>"
				id="<?php echo esc_attr( $id ); ?>" 
				style="background-color: <?php echo esc_attr( $bg_color ); ?>; color: <?php echo esc_attr( $text_color ); ?>">
				<div class="container content-image__inner">
					<?php if ( 'inline' == $style ) : ?>
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h3',
								'tc' => 'content-image__heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'copy',
								't'  => 'div',
								'tc' => 'content-image__copy a-up a-delay-1',
							)
						);
						?>
						<?php
						if ( 'lottie' == $type ) :
							$lottie = get_sub_field( 'lottie' );
							?>
							<div class="content-image__image lottie-play" 
								id="content-image-<?php echo esc_attr( get_row_index() ); ?>"
								data-name="content-image-<?php echo esc_attr( get_row_index() ); ?>">
								<script>
									var animation = bodymovin.loadAnimation({
										// animationData: { /* ... */ },
										container: document.getElementById('content-image-<?php echo esc_attr( get_row_index() ); ?>'), // required
										path: '<?php echo esc_url( $lottie ); ?>', // required
										renderer: 'svg', // required
										loop: false, // optional
										autoplay: false, // optional,
										name: 'content-image-<?php echo esc_attr( get_row_index() ); ?>' // optional,
									});
								</script>
							</div>
						<?php else : ?>
							<?php
							get_template_part_args(
								'templates/content-modules-image',
								array(
									'v'     => 'image',
									'is'    => false,
									'v2x'   => false,
									'is_2x' => false,
									'c'     => 'content-image__image a-up',
								)
							);
							?>
						<?php endif; ?>
					<?php else : ?>
						<div class="content-image__left">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'copy',
									't'  => 'div',
									'tc' => 'content-image__copy a-up',
								)
							);
							?>
							<?php
							get_template_part_args(
								'templates/content-modules-cta',
								array(
									'v' => 'cta',
									'c' => 'btn btn-green a-up a-delay-1',
								)
							);
							?>
						</div>
						<div class="content-image__right lottie-play"
							id="content-image-<?php echo esc_attr( get_row_index() ); ?>"
							data-name="content-image-<?php echo esc_attr( get_row_index() ); ?>">
							<?php
							if ( 'lottie' == $type ) :
								$lottie = get_sub_field( 'lottie' );
								?>
								<script>
									var animation = bodymovin.loadAnimation({
										// animationData: { /* ... */ },
										container: document.getElementById('content-image-<?php echo esc_attr( get_row_index() ); ?>'), // required
										path: '<?php echo esc_url( $lottie ); ?>', // required
										renderer: 'svg', // required
										loop: false, // optional
										autoplay: false, // optional,
										name: 'content-image-<?php echo esc_attr( get_row_index() ); ?>' // optional,
									});
								</script>
							<?php else : ?>
								<?php
								get_template_part_args(
									'templates/content-modules-image',
									array(
										'v'     => 'image',
										'is'    => false,
										'v2x'   => false,
										'is_2x' => false,
										'c'     => 'a-up',
									)
								);
								?>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if ( 'default' == $style ) : ?>
					<?php get_template_part( 'templates/content-modules', 'scroll' ); ?>
				<?php endif; ?>
			</section>
			<?php
		elseif ( 'sectors' == get_row_layout() ) :
			$sectors = get_sub_field( 'sectors' );
			$type    = get_sub_field( 'type' );
			?>
			<section class="sectors sectors--<?php echo esc_attr( $type ); ?>" id="<?php echo esc_attr( $id ); ?>">
				<div class="container-fluid">
					<div class="container">
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h2',
								'tc' => 'sectors-heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'copy',
								't'  => 'p',
								'tc' => 'sectors-copy text-medium a-up a-delay-1',
							)
						);
						?>
					</div>
					<?php if ( 'all' == $type ) : ?>
						<?php
						$args  = array(
							'post_type'      => 'sector',
							'posts_per_page' => -1,
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) :
							?>
						<div class="sectors-grid">
							<?php
							while ( $query->have_posts() ) :
								$query->the_post();
								get_template_part( 'templates/loop', 'sector' );
							endwhile;
							?>
							<article class="loop-sector loop-sector--contact">
								<?php
								get_template_part_args(
									'templates/content-modules-text',
									array(
										'v'  => 'contact_heading',
										't'  => 'h2',
										'tc' => 'loop-sector--contact__heading',
									)
								);
								get_template_part_args(
									'templates/content-modules-text',
									array(
										'v'  => 'contact_content',
										't'  => 'p',
										'tc' => 'loop-sector--contact__content',
									)
								);
								get_template_part_args(
									'templates/content-modules-cta',
									array(
										'v' => 'contact_cta',
										'c' => 'btn btn-white loop-sector--contact__cta',
									)
								);
								?>
							</article>
						</div>
							<?php
						endif;
						wp_reset_postdata();
						?>
					<?php else : ?>
						<?php if ( $sectors ) : ?>
							<div class="sectors-grid">
								<?php
								foreach ( $sectors as $post ) :
									setup_postdata( $post );
									get_template_part( 'templates/loop', 'sector' );
								endforeach;
								wp_reset_postdata();
								?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<?php if ( 'all' != $type ) : ?>
					<?php get_template_part( 'templates/content-modules', 'scroll' ); ?>
				<?php endif; ?>
			</section>
		<?php elseif ( 'testimonial' == get_row_layout() ) : ?>
			<section class="testimonial" id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
					<?php
					get_template_part_args(
						'templates/content-modules-text',
						array(
							'v'  => 'heading',
							't'  => 'h2',
							'tc' => 'testimonial-heading a-up',
						)
					);
					?>
					<div class="testimonial-inner">
						<div class="testimonial-inner__left">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'copy',
									't'  => 'div',
									'tc' => 'testimonial-copy a-up a-delay-1',
								)
							);
							?>
							<div class="testimonial-box a-up a-delay-2">
								<?php
								get_template_part_args(
									'templates/content-modules-text',
									array(
										'v'  => 'box_sub_heading',
										't'  => 'h4',
										'tc' => 'testimonial-box__subheading',
									)
								);
								?>
								<?php
								get_template_part_args(
									'templates/content-modules-text',
									array(
										'v'  => 'box_heading',
										't'  => 'h2',
										'tc' => 'testimonial-box__heading',
									)
								);
								?>
								<?php
								get_template_part_args(
									'templates/content-modules-text',
									array(
										'v'  => 'box_content',
										't'  => 'h2',
										'tc' => 'testimonial-box__content',
									)
								);
								?>
							</div>
						</div>
						<div class="testimonial-inner__right">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'testimonial_content',
									't'  => 'p',
									'tc' => 'testimonial-content a-up',
								)
							);
							?>
							<div class="testimonial-info">
								<div class="testimonial-info__content">
									<?php
									get_template_part_args(
										'templates/content-modules-text',
										array(
											'v'  => 'testimonial_name',
											't'  => 'p',
											'tc' => 'testimonial-name text-green text-medium a-up a-delay-1',
										)
									);
									get_template_part_args(
										'templates/content-modules-text',
										array(
											'v'  => 'testimonial_role',
											't'  => 'p',
											'tc' => 'testimonial-role text-medium a-up a-delay-2',
										)
									);
									?>
								</div>
								<?php
								get_template_part_args(
									'templates/content-modules-image',
									array(
										'v'     => 'testimonial_avatar',
										'is'    => false,
										'is_2x' => false,
										'v2x'   => false,
										'c'     => 'testimonial-avatar',
									)
								);
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php elseif ( 'circle_content' == get_row_layout() ) : ?>
			<section class="circle-content">
				<div class="container-fluid">
					<div class="circle-content__left">
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h2',
								'tc' => 'circle-content__title',
							)
						);
						?>
						<?php if ( have_rows( 'circles' ) ) : ?>
							<div class="circles">
							<?php
							while ( have_rows( 'circles' ) ) :
								the_row();
								get_template_part_args(
									'templates/content-modules-text',
									array(
										'v'  => 'name',
										't'  => 'div',
										'tc' => 'circle',
									)
								);
							endwhile;
							?>
							</div>
						<?php endif; ?>
					</div>
					<div class="circle-content__right">
						<?php
						if ( have_rows( 'circles' ) ) :
							while ( have_rows( 'circles' ) ) :
								the_row();
								?>
								<div class="circle-content__content<?php echo get_row_index() == 1 ? ' active' : ''; ?>">
									<?php
									get_template_part_args(
										'templates/content-modules-text',
										array(
											'v'  => 'heading',
											't'  => 'h3',
											'tc' => 'circle-content__heading',
										)
									);
									?>
									<?php
									get_template_part_args(
										'templates/content-modules-text',
										array(
											'v'  => 'content',
											't'  => 'div',
											'tc' => 'circle-content__copy',
										)
									);
									?>
								</div>
								<?php
							endwhile;
						endif;
						?>
					</div>
				</div>
			</section>
			<?php
		elseif ( 'cta' == get_row_layout() ) :
			$color  = get_sub_field( 'color' );
			$type   = get_sub_field( 'type' ) ?: 'global';
			$images = get_field( 'cta_images', 'options' );
			?>
			<section class="section-cta section-cta--<?php echo esc_attr( $type ); ?> bg-<?php echo esc_attr( $color ); ?>" id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
					<?php if ( 'custom' == $type ) : ?>
						<div class="section-cta__image bg-stretch">
							<?php
							get_template_part_args(
								'templates/content-modules-image',
								array(
									'v'     => 'image',
									'is'    => false,
									'v2x'   => false,
									'is_2x' => false,
								)
							);
							?>
						</div>
						<div class="section-cta__content">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'heading',
									't'  => 'h2',
									'tc' => 'section-cta__heading a-up',
								)
							);
							?>
							<?php
							get_template_part_args(
								'templates/content-modules-cta',
								array(
									'v' => 'cta',
									'c' => 'btn btn-white a-up',
								)
							);
							?>
						</div>
					<?php else : ?>
						<?php if ( $images ) : ?>
						<div class="section-cta__image bg-stretch">
							<?php foreach ( $images as $image ) : ?>
								<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
						<div class="section-cta__content">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'cta_heading',
									'o'  => 'o',
									't'  => 'h2',
									'tc' => 'section-cta__heading a-up',
								)
							);
							?>
							<?php
							get_template_part_args(
								'templates/content-modules-cta',
								array(
									'v' => 'cta_link',
									'o' => 'o',
									'c' => 'btn btn-white a-up',
								)
							);
							?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php elseif ( 'resource_info' == get_row_layout() ) : ?>
			<section class="resource-info bg-white" id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
					<div class="resource-info__content">
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h3',
								'tc' => 'resource-info__heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'copy',
								't'  => 'div',
								'tc' => 'resource-info__copy a-up',
							)
						);
						?>
						<div class="resource-info__testimonial">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'testimonial_content',
									't'  => 'p',
									'tc' => 'resource-info__testimonial__content a-up',
								)
							);
							?>
							<div class="resource-info__testimonial__info">
								<div>
									<?php
									get_template_part_args(
										'templates/content-modules-text',
										array(
											'v'  => 'testimonial_name',
											't'  => 'p',
											'tc' => 'resource-info__testimonial__name text-medium a-up a-delay-1',
										)
									);
									get_template_part_args(
										'templates/content-modules-text',
										array(
											'v'  => 'testimonial_role',
											't'  => 'p',
											'tc' => 'resource-info__testimonial__role text-medium a-up a-delay-2',
										)
									);
									?>
								</div>
								<?php
								get_template_part_args(
									'templates/content-modules-image',
									array(
										'v'     => 'testimonial_avatar',
										'is'    => false,
										'is_2x' => false,
										'v2x'   => false,
										'c'     => 'resource-info__testimonial__avatar',
									)
								);
								?>
							</div>
						</div>
					</div>
					<?php
					get_template_part_args(
						'templates/content-modules-image',
						array(
							'v'     => 'image',
							'is'    => false,
							'v2x'   => false,
							'is_2x' => false,
							'c'     => 'a-up',
							'w'     => 'div',
							'wc'    => 'resource-info__image bg-stretch',
						)
					);
					?>
				</div>
			</section>
			<?php
		elseif ( 'image_slider' == get_row_layout() ) :
			$images = get_sub_field( 'images' );
			if ( $images ) :
				?>
			<section class="image-slider" id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
					<div class="image-carousel">
						<?php foreach ( $images as $image ) : ?>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
						<?php endforeach; ?>
					</div>
				</div>
			</section>
			<?php endif; ?>
			<?php
		elseif ( 'icons_grid' == get_row_layout() ) :
			?>
			<section class="icons-grid bg-white" id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
					<?php
					get_template_part_args(
						'templates/content-modules-text',
						array(
							'v'  => 'heading',
							't'  => 'h2',
							'tc' => 'icons-grid__heading a-up',
						)
					);
					?>
					<?php if ( have_rows( 'items' ) ) : ?>
						<div class="icons-grid__items">
							<?php
							while ( have_rows( 'items' ) ) :
								the_row();
								?>
								<div class="icons-grid__item a-up a-delay-<?php echo esc_attr( get_row_index() ); ?>">
									<?php
									get_template_part_args(
										'templates/content-modules-image',
										array(
											'v'     => 'icon',
											'is'    => false,
											'v2x'   => false,
											'is_2x' => false,
											'w'     => 'span',
											'wc'    => 'icons-grid__item__image',
										)
									);
									?>
									<div class="icons-grid__item__content">
										<?php
										get_template_part_args(
											'templates/content-modules-text',
											array(
												'v'  => 'heading',
												't'  => 'p',
												'tc' => 'icons-grid__item__title text-medium',
											)
										);
										?>
										<?php
										get_template_part_args(
											'templates/content-modules-text',
											array(
												'v'  => 'content',
												't'  => 'p',
												'tc' => 'icons-grid__item__content text-medium',
											)
										);
										?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php elseif ( 'service_blocks' == get_row_layout() ) : ?>
			<section class="service-blocks-section" id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
					<?php
					if ( have_rows( 'blocks' ) ) :
						?>
						<div class="service-blocks">
							<?php
							while ( have_rows( 'blocks' ) ) :
								the_row();
								?>
								<div class="service-block">
									<?php
									get_template_part_args(
										'templates/content-modules-image',
										array(
											'v'     => 'image',
											'is'    => false,
											'is_2x' => false,
											'v2x'   => false,
											'w'     => 'div',
											'wc'    => 'service-block__img',
										)
									);
									?>
									<div class="service-block__content">
										<?php
										get_template_part_args(
											'templates/content-modules-text',
											array(
												'v'  => 'heading',
												't'  => 'h3',
												'tc' => 'service-block__title a-up',
											)
										);
										?>
										<?php
										get_template_part_args(
											'templates/content-modules-text',
											array(
												'v'  => 'content',
												't'  => 'div',
												'tc' => 'service-block__copy a-up a-delay-1',
											)
										);
										?>
										<?php
										get_template_part_args(
											'templates/content-modules-cta',
											array(
												'v' => 'cta',
												'c' => 'btn btn-' . $color_theme . ' a-up a-delay-2',
											)
										);
										?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php elseif ( 'works' == get_row_layout() ) : ?>
			<section class="work-grid" id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
					<?php
					get_template_part_args(
						'templates/content-modules-text',
						array(
							'v'  => 'heading',
							't'  => 'h2',
							'tc' => 'section-heading a-up',
						)
					);
					?>
					<?php
					if ( 'default' === $color_theme ) :
						$btn_color = 'green';
					else :
						$btn_color = $color_theme;
					endif;
					get_template_part_args(
						'templates/content-modules-cta',
						array(
							'v' => 'cta',
							'c' => 'btn btn-' . $btn_color . ' a-up a-delay-1',
						)
					);
					?>
				</div>
				<div class="container-fluid">
					<?php
					$works = get_sub_field( 'posts' );
					if ( $works ) :
						?>
						<div class="works">
							<?php
							foreach ( $works as $post ) :
								setup_postdata( $post );
								get_template_part( 'templates/loop', 'work-tile' );
							endforeach;
							?>
						</div>
						<?php
						wp_reset_postdata();
						endif;
					?>
				</div>
			</section>
			<?php
		elseif ( 'team_slider' == get_row_layout() ) :
			$category = get_sub_field( 'category' );
			?>
			<section 
				class="team-slider theme--<?php echo esc_attr( $category->slug ); ?>" 
				id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
					<div class="team-slider__header">
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h2',
								'tc' => 'team-slider__heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'description',
								't'  => 'p',
								'tc' => 'team-slider__description text-medium a-up a-delay-1',
							)
						);
						?>
					</div>
					<?php
					$args  = array(
						'post_type' => 'person',
						'cat'       => $category->term_id,
					);
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) :
						?>
						<div class="team-carousel">
							<?php
							while ( $query->have_posts() ) :
								$query->the_post();
								?>
								<div class="team-image bg-stretch" data-id="<?php echo esc_attr( get_the_ID() ); ?>">
									<?php
									if ( has_post_thumbnail() ) :
										the_post_thumbnail();
									endif;
									?>
								</div>
								<?php
							endwhile;
							?>
						</div>
						<div class="person-info">
							<!-- Dynamic person info goes here -->
						</div>
						<?php
					endif;
					wp_reset_postdata();
					?>
				</div>
			</section>
			<?php
		elseif ( 'jobs_grid' == get_row_layout() ) :
			$type = get_sub_field( 'type' );
			?>
			<section class="jobs jobs--<?php echo esc_attr( $type ); ?>  bg-white" id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
					<div class="jobs-header">
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h2',
								'tc' => 'a-up',
							)
						);
						?>
						<?php
						if ( 'all' == $type ) :
							$categories = get_categories();
							?>
							<div class="jobs-filters a-up a-delay-1">
								<button class="btn-job-filter theme--all active" data-filter="-1"><?php echo esc_html__( 'All', 'am' ); ?></button>
								<?php foreach ( $categories as $category ) : ?>
									<button class="btn-job-filter theme--<?php echo esc_attr( $category->slug ); ?>" data-filter="<?php echo esc_attr( $category->term_id ); ?>">
										<?php echo esc_html( $category->name ); ?>
									</button>
								<?php endforeach; ?>
							</div>
						<?php else : ?>
							<?php
							get_template_part_args(
								'templates/content-modules-cta',
								array(
									'v' => 'cta',
									'c' => 'btn btn-green a-up a-delay-1',
								)
							);
							?>
						<?php endif; ?>
					</div>
					<?php
					if ( 'all' == $type ) :
						$paged = get_query_var( 'paged' ) ?: 1;
						$args  = array(
							'post_type'      => 'job',
							'posts_per_page' => 9,
							'paged'          => $paged,
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) :
							?>
						<div class="jobs-grid cpt-grid a-up a-delay-2" 
							data-type="job"
							data-paged="1"
							data-filter="-1"
							data-posts-per-page="9">
							<?php
							while ( $query->have_posts() ) :
								$query->the_post();
								get_template_part( 'templates/loop', 'job' );
							endwhile;
							?>
						</div>
							<?php
						endif;
						if ( $query->max_num_pages > 1 ) :
							?>
							<div class="pagination a-up a-delay-2">
								<?php
								// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								echo paginate_links(
									array(
										'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
										'total'        => $query->max_num_pages,
										'current'      => max( 1, $paged ),
										'format'       => '?paged=%#%',
										'show_all'     => false,
										'type'         => 'plain',
										'end_size'     => 1,
										'mid_size'     => 2,
										'prev_text'    => '<i class="fas fa-chevron-left"></i> back',
										'next_text'    => 'next <i class="fas fa-chevron-right"></i>',
										'add_args'     => false,
										'add_fragment' => '',
									)
								);
								?>
							</div>
							<?php
						endif;
						wp_reset_postdata();
					else :
						$jobs = get_sub_field( 'jobs' );
						if ( $jobs ) :
							?>
						<div class="jobs-grid jobs-slider a-up a-delay-2">
							<?php
							foreach ( $jobs as $post ) :
								setup_postdata( $post );
								get_template_part( 'templates/loop', 'job' );
							endforeach;
							?>
						</div>
							<?php
						endif;
						wp_reset_postdata();
						?>
					<?php endif; ?>
				</div>
			</section>
		<?php elseif ( 'sector_details' == get_row_layout() ) : ?>
			<section class="sector-details" id="<?php echo esc_attr( $id ); ?>">
				<div class="sector-details__info container">
					<?php
					get_template_part_args(
						'templates/content-modules-text',
						array(
							'v'  => 'heading',
							't'  => 'h1',
							'tc' => 'sector-details__heading a-up',
						)
					);
					?>
					<?php if ( have_rows( 'partners' ) ) : ?>
						<div class="sector-details__logos a-up a-delay-1">
							<?php
							while ( have_rows( 'partners' ) ) :
								the_row();
								?>
								<a href="javascript:;" class="sector-details__logo">
									<?php
									get_template_part_args(
										'templates/content-modules-image',
										array(
											'v'     => 'icon',
											'is'    => false,
											'is_2x' => false,
											'v2x'   => false,
										)
									);
									?>
								</a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if ( have_rows( 'partners' ) ) : ?>
				<div class="sector-details__images image-slider" id="<?php echo esc_attr( $id ); ?>">
					<div class="container">
						<div class="image-carousel">
							<?php
							while ( have_rows( 'partners' ) ) :
								the_row();
								?>
								<?php
									get_template_part_args(
										'templates/content-modules-image',
										array(
											'v'     => 'image',
											'is'    => false,
											'is_2x' => false,
											'v2x'   => false,
										)
									);
								?>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</section>
		<?php elseif ( 'contact' == get_row_layout() ) :
			$images = get_field( 'cta_images', 'options' );
			?>
			<section class="contact" id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
					<?php
					get_template_part_args(
						'templates/content-modules-text',
						array(
							'v'  => 'title',
							't'  => 'h1',
							'tc' => 'contact-heading a-up',
						)
					);
					?>
				</div>
				<div class="section-cta bg-green">
					<div class="container">
						<?php if ( $images ) : ?>
							<div class="section-cta__image bg-stretch">
								<?php foreach ( $images as $image ) : ?>
									<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<div class="section-cta__content">
							<?php
							get_template_part_args(
								'templates/content-modules-text',
								array(
									'v'  => 'content',
									't'  => 'div',
									'tc' => 'section-cta__content a-up',
								)
							);
							?>
						</div>
					</div>
				</div>
				<div class="contact-body container">
					<div class="contact-form">
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'contact_heading',
								't'  => 'h2',
								'tc' => 'contact-body__title a-up',
							)
						);
						?>
						<?php
						$form = get_sub_field( 'contact_form' );
						if ( $form ) :
							?>
							<div class="contact-form__form">
								<?php echo do_shortcode( $form ); ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="contact-map">
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'map_heading',
								't'  => 'h2',
								'tc' => 'contact-body__title a-up',
							)
						);
						?>
						<?php
						$location = get_sub_field( 'location' );
						if ( $location ) :
							?>
							<div class="acf-map" data-zoom="16">
								<div class="marker" 
									data-lat="<?php echo esc_attr( $location['lat'] ); ?>" 
									data-lng="<?php echo esc_attr( $location['lng'] ); ?>"></div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<?php
		elseif ( 'blog' == get_row_layout() ) :
			$type = get_sub_field( 'type' );
			?>
			<section class="blog bg-grey blog--<?php echo esc_attr( $type ); ?>" id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
					<div class="blog-header">
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h1',
								'tc' => 'blog-heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'content',
								't'  => 'p',
								'tc' => 'd-md-only blog-copy a-up a-delay-1',
							)
						);
						?>
					</div>
					<?php
					if ( 'custom' == $type ) :
						$posts = get_sub_field( 'posts' );
						if ( $posts ) :
							?>
						<div class="blog-grid cpt-grid a-up a-delay-2">
							<?php
							foreach ( $posts as $post ) :
								setup_postdata( $post );
								get_template_part( 'templates/loop', 'post' );
							endforeach;
							?>
						</div>
							<?php
							endif;
							wp_reset_postdata();
						?>
					<?php else : ?>
						<?php
							$paged = get_query_var( 'paged' ) ?: 1;
						if ( 'recent' == $type ) :
							$posts_per_page = 3;
							else :
								$posts_per_page = 6;
							endif;
							$args  = array(
								'post_type'      => 'post',
								'posts_per_page' => $posts_per_page,
								'paged'          => $paged,
							);
							$query = new WP_Query( $args );
							if ( $query->have_posts() ) :
								?>
								<div class="blog-grid cpt-grid a-up a-delay-2">
									<?php
									while ( $query->have_posts() ) :
										$query->the_post();
										get_template_part( 'templates/loop', 'post' );
									endwhile;
									?>
								</div>
								<?php
							endif;
							if ( $query->max_num_pages > 1 && 'all' == $type ) :
								?>
								<div class="pagination a-up a-delay-2">
									<?php
									// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									echo paginate_links(
										array(
											'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
											'total'        => $query->max_num_pages,
											'current'      => max( 1, $paged ),
											'format'       => '?paged=%#%',
											'show_all'     => false,
											'type'         => 'plain',
											'end_size'     => 1,
											'mid_size'     => 2,
											'prev_text'    => '<i class="fas fa-chevron-left"></i> back',
											'next_text'    => 'next <i class="fas fa-chevron-right"></i>',
											'add_args'     => false,
											'add_fragment' => '',
										)
									);
									?>
								</div>
								<?php
							endif;
							wp_reset_postdata();
							?>
					<?php endif; ?>
				</div>
			</section>
			<?php
		elseif ( 'tabs' == get_row_layout() ) :
			?>
			<section class="tabs">
				<div class="container">
					<?php
					get_template_part_args(
						'templates/content-modules-text',
						array(
							'v'  => 'heading',
							't'  => 'h1',
							'tc' => 'tabs-heading',
						)
					);
					?>
					<?php if ( have_rows( 'tabs' ) ) : ?>
						<div class="tab">
							<div class="tab-links">
								<?php
								while ( have_rows( 'tabs' ) ) :
									the_row();
									$link = get_sub_field( 'anchor_link' );
									?>
									<a href="#tab-<?php echo esc_attr( get_row_index() ); ?>"
										class="tab-link<?php echo get_row_index() == 1 ? ' active' : ''; ?>">
										<?php echo esc_html( $link ); ?>
									</a>
								<?php endwhile; ?>
							</div>
							<div class="tab-contents">
								<?php
								while ( have_rows( 'tabs' ) ) :
									the_row();
									$link = get_sub_field( 'anchor_link' );
									?>
									<div class="tab-content<?php echo get_row_index() == 1 ? ' active' : ''; ?>" id="tab-<?php echo esc_attr( get_row_index() ); ?>">
										<?php
										get_template_part_args(
											'templates/content-modules-text',
											array(
												'v'  => 'content',
												't'  => 'div',
												'tc' => 'tab-content__content',
											)
										);
										?>
										<?php
										get_template_part_args(
											'templates/content-modules-image',
											array(
												'v'     => 'image',
												'is'    => false,
												'v2x'   => false,
												'is_2x' => false,
												'w'     => 'div',
												'wc'    => 'tab-content__image bg-stretch',
											)
										);
										?>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					<?php endif; ?>
					<div class="files">
						<?php
						get_template_part_args(
							'templates/content-modules-text',
							array(
								'v'  => 'document_heading',
								't'  => 'h3',
								'tc' => 'h3-large files-heading',
							)
						);
						?>
						<?php
						if ( have_rows( 'files' ) ) :
							while ( have_rows( 'files' ) ) :
								the_row();
								$file = get_sub_field( 'file' );
								?>
								<div class="file">
									<?php
									get_template_part_args(
										'templates/content-modules-text',
										array(
											'v'  => 'description',
											't'  => 'h4',
											'tc' => 'file-desc',
										)
									);
									?>
									<?php if ( $file ) : ?>
									<a href="<?php echo esc_url( $file ); ?>" class="btn btn-green btn-green--dark btn-download" download="">
										download
										<i class="fas fa-download"></i>
									</a>
									<?php endif; ?>
								</div>
								<?php
							endwhile;
						endif;
						?>
					</div>
				</div>
			</section>
			<?php
		endif;
	endwhile;
endif;
?>
