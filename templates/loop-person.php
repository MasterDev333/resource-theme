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
		<?php
		get_template_part_args(
			'templates/content-modules-cta',
			array(
				'v' => 'contact',
				'o' => 'f',
				'c' => 'btn btn-theme',
			)
		);
		?>
	</div>
</article>
