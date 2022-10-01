<?php
$categories = get_the_category();
$cat_name   = $categories[0]->name;
$cat_slug   = $categories[0]->slug;
$cta        = get_field( 'job_cta', 'options' );
?>
<div class="card loop-job theme--<?php echo esc_attr( $cat_slug ); ?>">
	<h4 class="loop-job__category"><?php echo esc_html( $cat_name ); ?></h4>
	<h2 class="loop-job__title"><?php echo esc_html( get_the_title() ); ?></h2>
	<?php
	get_template_part_args(
		'templates/content-modules-text',
		array(
			'v'  => 'price',
			't'  => 'h4',
			'tc' => 'loop-job__price',
			'o'  => 'f',
		)
	);
	?>
	<?php
	get_template_part_args(
		'templates/content-modules-text',
		array(
			'v'  => 'details',
			't'  => 'p',
			'tc' => 'loop-job__details',
			'o'  => 'f',
		)
	);
	?>
	<?php if ( $cta ) : ?>
	<a href="<?php echo esc_url( $cta['url'] ); ?>" class="btn btn-theme loop-job__cta">
		<?php echo esc_html( $cta['title'] ); ?>
		<i class="fas fa-chevron-right"></i>
	</a>
	<?php endif; ?>
</div>
