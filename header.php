<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<link rel="shortcut icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.png' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="page-wrapper">
		<!-- Header -->
		<?php
		$logo = get_field( 'logo', 'options' );
		?>
		<header class="header">
			<div class="container">
				<nav class="header-nav">
					<?php
					if ( $logo ) :
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo">
							<?php
							get_template_part_args(
								'templates/content-modules-image',
								array(
									'v'     => 'logo',
									'o'     => 'o',
									'is'    => false,
									'v2x'   => false,
									'is_2x' => false,
								)
							);
							?>
						</a>
					<?php endif; ?>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'mainmenu',
								'menu_class'     => 'header-menu',
								'container'      => false,
							)
						)
						?>
					<?php if ( have_rows( 'header_ctas', 'options' ) ) : ?>
						<div class="header-ctas">
							<?php
							while ( have_rows( 'header_ctas', 'options' ) ) :
								the_row();
								$link = get_sub_field( 'link' );
								?>
								<?php if ( $link ) : ?>
									<a href="<?php echo esc_url( $link['url'] ); ?>" 
										class="header-cta" 
										target="<?php echo esc_attr( $link['target'] ?: '_self' ); ?>">
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
									</a>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
					<button class="hamburger">
						<i class="fa-solid fa-bars"></i>
					</button>
				</nav>
			</div>
		</header><!-- /Header -->

		<!-- Main -->
		<main class="main">
