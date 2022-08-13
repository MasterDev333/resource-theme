<?php extract( $template_args ); ?>
<?php $val = isset( $v ) && ! empty( $v ) ? $v : 'cta_button'; ?>
<?php $class = isset( $c ) && ! empty( $c ) ? $c : ''; ?>
<?php $link = get_sub_field( $val ); ?>
<?php $option = isset( $o ) && ! empty( $o ) ? $o : false; ?>

<?php $ww = isset( $w ) && ! empty( $w ) ? $w : false; ?>
<?php $wclass = isset( $wc ) && ! empty( $wc ) ? $wc : ''; ?>

<?php $disable_icon = isset( $di ) && ! empty( $di ) ? $di : false; ?>

<?php
if ( 'o' == $option ) {
	$link = get_field( $val, 'option' );
} elseif ( 'f' == $option ) {
	$link = get_field( $val );
} else {
	$link = get_sub_field( $val );
}
?>

<?php if ( $link ) : ?>
	<?php if ( $ww ) : ?>
		<<?php echo esc_attr( $ww ); ?> <?php
		if ( $wclass ) {
			echo 'class="' . esc_attr( $wclass ) . '"'; }
		?>
		>
	<?php endif ?>
	<?php
		$link_url    = $link['url'];
		$link_title  = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';
	?>
		<a class="<?php echo esc_attr( $class ); ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
			<?php echo esc_html( $link_title ); ?>
			<?php if ( ! $disable_icon ) : ?>
			<i class="fas fa-chevron-right"></i>
			<?php endif; ?>
		</a>
	<?php if ( $ww ) : ?>
		</<?php echo esc_attr( $ww ); ?>>
	<?php endif; ?>
<?php endif; ?>
