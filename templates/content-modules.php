<?php
/**
 * Content Modules
 */

?>
<div class="fullpage-sections" id="fullpage">
	<?php
	if ( have_rows( 'modules' ) ) :
		while ( have_rows( 'modules' ) ) :
			the_row();
			$id = get_sub_field( 'anchor_id' );
			?>
			<?php
			if ( 'banner' == get_row_layout() ) :
				$type = get_sub_field( 'type' );
				?>
				<section class="banner banner--<?php echo esc_attr( $type ); ?>">
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
					<?php
					get_template_part_args(
						'templates/content-modules-image',
						array(
							'v'     => 'left_image',
							'is'    => false,
							'is_2x' => false,
							'v2x'   => false,
							'c'     => 'people-bg__left',
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
							'c'     => 'people-bg__right',
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
						<?php if ( 'default' == $style ) : ?>
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
						<?php elseif ( 'inline' == $style ) : ?>
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
                                    'c'     => 'a-up',
                                )
                            );
                            ?>
						<?php endif; ?>
					</div>
					<?php get_template_part( 'templates/content-modules', 'scroll' ); ?>
				</section>
				<?php
			endif;
		endwhile;
	endif;
	?>
</div>
