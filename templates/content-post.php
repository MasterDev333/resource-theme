<?php
global $post;
$author_name = get_the_author_meta( 'display_name' );
?>
<article <?php post_class( 'post' ); ?> id="post-<?php the_ID(); ?>">
	<div class="container">
		<h2 class="h1 post-heading a-up"><?php echo esc_html__( 'Blog' ); ?></h2>
		<div class="post-inner">
			<article class="post-card post-card--large a-up a-delay-1">
				<div class="post-card__info">
					<p class="text-small post-card__date"><?php echo get_the_date( 'F d, Y' ); ?></p>
					<!-- <p class="text-small post-card__author"><?php echo esc_html__( 'By' ) . ' ' . esc_html( $author_name ); ?></p> -->
				</div>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="post-card__image bg-stretch">
						<?php the_post_thumbnail( 'post-card' ); ?>
					</div>
				<?php endif; ?>
				<h2 class="post-card__title"><?php the_title(); ?></h2>
				<div class="post-card__content">
					<?php the_content( __( 'Read more', 'am' ) ); ?>
				</div>
				<div class="post-navigation">
					<?php
					$prev_post = get_previous_post();
					if ( ! empty( $prev_post ) ) :
						?>
						<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="btn-post-nav btn-post-prev"><i class="fas fa-chevron-left"></i> back</a>
						<?php
					endif;
					$next_post = get_next_post();
					if ( is_a( $next_post, 'WP_Post' ) ) {
						?>
						<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="btn-post-nav btn-post-next">next <i class="fas fa-chevron-right"></i></a>
					<?php } ?>
				</div>
			</article>
			<div class="post-sidebar a-up a-delay-2">
				<?php
				$next_post = get_next_post();
				if ( $next_post ) :
					?>
					<div class="post-next">
						<h3 class="post-sidebar__title"><?php echo esc_html__( 'Next article' ); ?></h3>
						<?php
						$post = $next_post;
						setup_postdata( $post );
						get_template_part( 'templates/loop', 'post' );
						wp_reset_postdata();
						?>
					</div>
				<?php endif; ?>
				<div class="post-same">
					<h3 class="post-sidebar__title"><?php echo esc_html__( 'More articles' ); ?></h3>
					<?php
					$authors_posts = get_posts(
						array(
							'author'         => $authordata->ID,
							'post__not_in'   => array( $post->ID, $next_post->ID ),
							'posts_per_page' => 1,
						)
					);
					foreach ( $authors_posts as $post ) :
						setup_postdata( $post );
							get_template_part( 'templates/loop', 'post' );
						wp_reset_postdata();
					endforeach;
					?>
				</div>
			</div>
		</div>
	</div>
</article><!-- /post -->
