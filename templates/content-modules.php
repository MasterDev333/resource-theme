<?php
/**
 * Content Modules
 */

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
								<img class="a-up a-delay-1" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/solutions.png' ); ?>" alt="">
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
			<section class="service-banner" id="<?php echo esc_attr( $id ); ?>">
				<?php
				get_template_part_args(
					'templates/content-modules-image',
					array(
						'v'     => 'image',
						'is'    => false,
						'v2x'   => false,
						'is_2x' => false,
						'c'     => 'service-banner__bg h1 a-up',
					)
				);
				?>
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
				</div>
			</section>
			<section class="service-content">
				<div class="container">
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
							?>
							<div class="service-item a-up a-delay-<?php echo esc_attr( get_row_index() ); ?>">
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
					get_template_part_args(
						'templates/content-modules-image',
						array(
							'v'     => 'left_image',
							'is'    => false,
							'is_2x' => false,
							'v2x'   => false,
							'c'     => 'people-bg__left d-md-only',
						)
					);
					?>
					<?php
					get_template_part_args(
						'templates/content-modules-image',
						array(
							'v'     => 'left_image_mobile',
							'is'    => false,
							'is_2x' => false,
							'v2x'   => false,
							'c'     => 'people-bg__left d-sm-only',
						)
					);
					?>
					<?php
					get_template_part_args(
						'templates/content-modules-image',
						array(
							'v'     => 'right_image',
							'is'    => false,
							'is_2x' => false,
							'v2x'   => false,
							'c'     => 'people-bg__right d-md-only',
						)
					);
					?>
					<?php
					get_template_part_args(
						'templates/content-modules-image',
						array(
							'v'     => 'right_image_mobile',
							'is'    => false,
							'is_2x' => false,
							'v2x'   => false,
							'c'     => 'people-bg__right d-sm-only',
						)
					);
					?>
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
						<div class="content-image__right">
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
			?>
			<section class="sectors" id="<?php echo esc_attr( $id ); ?>">
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
					<?php if ( $sectors ) : ?>
						<div class="sectors-grid">
							<?php
							foreach ( $sectors as $post ) :
								setup_postdata( $post );
								get_template_part( 'templates/loop', 'sector' );
							endforeach;
							?>
						</div>
					<?php endif; ?>
				</div>
				<?php get_template_part( 'templates/content-modules', 'scroll' ); ?>
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
			$color = get_sub_field( 'color' );
			?>
			<section class="section-cta bg-<?php echo esc_attr( $color ); ?>" id="<?php echo esc_attr( $id ); ?>">
				<div class="container">
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
			<?php
		endif;
	endwhile;
endif;
?>
