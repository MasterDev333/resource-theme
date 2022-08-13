<article class="loop-sector">
	<a href="<?php echo esc_url( get_the_permalink() ); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="loop-sector__image bg-stretch">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
		<div class="loop-sector__title">
			<?php echo esc_html( get_the_title() ); ?>
		</div>
	</a>
</article>
