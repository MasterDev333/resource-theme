<?php $category = get_the_category(); ?>
<article class="work-tile work-tile--<?php echo esc_attr( $category[0]->slug ); ?> a-up">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="work-tile__img bg-stretch">
			<?php the_post_thumbnail( 'work-grid' ); ?>
		</div>
	<?php endif; ?>
	<div class="work-tile__content">
		<h4 class="work-tile__category">
			<i class="fas fa-chevron-left"></i>
			<?php echo esc_html( $category[0]->name ); ?>
		</h4>
		<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="work-tile__link">
			<h3 class="work-tile__title"><?php echo esc_html( get_the_title() ); ?></h3>
		</a>
	</div>
</article>
