<?php
$author_name = get_the_author_meta( 'display_name' );
?>
<article class="post-card">
	<div class="post-card__info">
		<p class="text-small post-card__date"><?php echo get_the_date( 'F d, Y' ); ?></p>
		<!-- <p class="text-small post-card__author"><?php echo esc_html__( 'By' ) . ' ' . esc_html( $author_name ); ?></p> -->
	</div>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-card__image bg-stretch">
			<?php the_post_thumbnail( 'post-card' ); ?>
		</div>
	<?php endif; ?>
	<h3 class="post-card__title"><?php the_title(); ?></h3>
	<?php if ( has_excerpt() ) : ?>
	<p class="text-small post-card__excerpt d-md-only">
		<?php echo esc_html( get_the_excerpt() ); ?>
	</p>
	<?php endif; ?>
	<div class="post-card__cta">
		<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="btn btn-green btn-green--dark">
			<?php echo esc_html__( 'More', 'am' ); ?>
			<i class="fas fa-chevron-right"></i>
		</a>
	</div>
</article>
