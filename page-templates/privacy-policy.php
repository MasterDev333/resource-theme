<?php
/**
 * Template Name: Privacy Policy
 */

get_header();
?>
<section class="privacy">
	<div class="container">
		<?php if ( have_rows( 'blocks' ) ) : ?>
		<div class="privacy-content">
			<h1 class="h2 privacy-title d-sm-only"><?php echo esc_html( get_the_title() ); ?></h1>
			<?php
			while ( have_rows( 'blocks' ) ) :
				the_row();
				?>
				<div class="privacy-block" id="privacy-<?php echo esc_attr( get_row_index() ); ?>">
					<?php
                    get_template_part_args(
                        'templates/content-modules-text',
                        array(
                            'v'  => 'heading',
                            't'  => 'h3',
                            'tc' => 'privacy-block__heading',
                        )
                    );
                    ?>
                    <?php
                    get_template_part_args(
                        'templates/content-modules-text',
                        array(
                            'v'  => 'content',
                            't'  => 'div',
                            'tc' => 'privacy-block__content',
                        )
                    );
                    ?>
				</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
		<div class="privacy-sidebar">
			<h1 class="privacy-title d-md-only"><?php echo esc_html( get_the_title() ); ?></h1>
			<?php if ( have_rows( 'blocks' ) ) : ?>
				<div class="privacy-links d-md-only">
					<?php
					while ( have_rows( 'blocks' ) ) :
						the_row();
						$heading = get_sub_field( 'heading' );
						?>
                        <div>
                            <a href="#privacy-<?php echo esc_attr( get_row_index() ); ?>" class="privacy-link">
                                <?php echo esc_html( $heading ); ?>
                            </a>
                        </div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<?php
			$document = get_field( 'document' );
			if ( $document['file'] ) :
				?>
			<div class="privacy-file">
				<?php if ( $document['heading'] ) : ?>
				<h3 class="h3-large privacy-file__heading"><?php echo esc_html( $document['heading'] ); ?></h3>
				<?php endif; ?>
				<div class="privacy-file__content">
					<?php if ( $document['description'] ) : ?>
						<h4 class="privacy-file__desc">
                            <?php echo $document['description']; // phpcs:ignore ?>
						</h4>
					<?php endif; ?>
					<?php if ( $document['file'] ) : ?>
						<button class="btn btn-green btn-download btn-green--dark">
							download
							<i class="fas fa-download"></i>
						</button>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();
