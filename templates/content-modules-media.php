<?php
$video = $args['video'];
$image = $args['image'];
$size  = $args['size'];
if ( $size ) :
	$img_url = $image['sizes'][ $size ];
else :
	$img_url = $image['url'];
endif;
?>
<?php if ( $video ) : ?>
	<video loop autoplay playsinline muted preload="metadata" src="<?php echo esc_url( $video ); ?>" poster="<?php echo esc_url( $img_url ); ?>">
		<source src="<?php echo esc_url( $video ); ?>" type="video/mp4">
	</video>
<?php elseif ( $image ) : ?>
	<img class="lazyload" data-src="<?php echo esc_attr( $img_url ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
<?php endif; ?>
