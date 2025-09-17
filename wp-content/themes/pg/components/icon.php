<?php
/**
 * Displays an icon.
 *
 * Usage example:
 *
 * get_template_part(
 *   'components/icon',
 *   null,
 *   [
 *     'name'       => 'facebook',
 *     'classes'    => [ ],
 *     'modifiers'  => [ ],
 *     'attributes' => [ 'aria-hidden' => 'true' ],
 *   ]
 * );
 * */

$defaults = [
	'name'       => '',
	'classes'    => [],
	'modifiers'  => [],
	'attributes' => [],
];

$args = wp_parse_args( $args, $defaults );

$class_string = [ 'icon', 'icon--' . $args['name'] ];


foreach ( $args['modifiers'] as $index => $mod ) {
	$args['modifiers'][ $index ] = 'icon--' . $mod;
}

$class_string = array_merge( $class_string, $args['classes'], $args['modifiers'] );

if ( ! empty( $args['name'] ) ) {
	?>
	<svg class="<?php echo esc_attr( implode( ' ', $class_string ) ) ?>"
	<?php
	foreach ( $args['attributes'] as $name => $value ) {
		echo esc_attr( $name ) . '="' . esc_attr( $value ) . '" ';
	}
	?>
	>
		<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php echo 'sprite-icon-' . esc_attr( $args['name'] ) ?>"></use>
	</svg>
	<?php
}
