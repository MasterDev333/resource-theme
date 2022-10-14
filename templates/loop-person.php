<article class="loop-person">
	<?php get_template_part_args(
		'templates/content-modules-text',
		array(
			'v'  => 'bio',
			't'  => 'p',
			'c'  => 'text-small loop-person__bio',
			'w'  => 'div',
			'wc' => 'loop-person__left',
			'o'  => 'f',
		)
	); ?>
	<div class="loop-person__right">
		<h3 class="loop-person__title"><?php echo esc_html( get_the_title() ); ?></h3>
		<?php
		get_template_part_args(
			'templates/content-modules-text',
			array(
				'v'  => 'role',
				'o'  => 'f',
				't'  => 'h3',
				'tc' => 'loop-person__role',
			)
		);
		?>
		<?php if ( have_rows( 'social_links' ) ) : ?>
			<div class="loop-person__socials">
				<?php
				while ( have_rows( 'social_links' ) ) :
					the_row();
					$icon = get_sub_field( 'icon' );
					$link = get_sub_field( 'link' );
					?>
					<a href="<?php echo esc_url( $link ); ?>" class="loop-person__social" target="_blank">
						<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_url( $icon['alt'] ); ?>">						
					</a>
					<?php
				endwhile;
				?>
			</div>
		<?php endif; ?>
	</div>
</article>
