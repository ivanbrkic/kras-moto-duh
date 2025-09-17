<?php
/**
 * Pg_Walker Class (BEM style walker).
 */
class Pg_Walker extends Walker_Nav_Menu {
	/**
	 * Pg_Walker Constructor.
	 *
	 * @param string $css_class_prefix
	 */
	public function __construct( $css_class_prefix ) {
		$this->css_class_prefix = $css_class_prefix;
	}

	/**
	 * Display element method.
	 *
	 * @param object $element
	 * @param array $children_elements
	 * @param int $max_depth
	 * @param int $depth
	 * @param array $args
	 * @param string $output
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements [ $element->$id_field ] );
		}
		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	/**
	 * Start level method.
	 *
	 * @param string $output
	 * @param int $depth
	 * @param array $args
	 */
	public function start_lvl( &$output, $depth = 1, $args = [] ) {
		$real_depth  = $depth + 1;
		$indent      = str_repeat( "\t", $real_depth );
		$prefix      = $this->css_class_prefix;
		$classes     = [ $prefix . '__sub-menu' ];
		$class_names = implode( ' ', $classes );
		$output     .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	/**
	 * Start element method.
	 *
	 * @param string $output
	 * @param WP_Post $item
	 * @param int $depth
	 * @param stdClass $args
	 * @param int $id
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		global $wp_query;
		$indent       = ( $depth > 0 ? str_repeat( '', $depth ) : '' ); /** Code indent */
		$prefix       = $this->css_class_prefix;
		$item_classes = [
			'item_class'          => $prefix . '__item',
			'parent_class'        => $args->has_children ? $parent_class = $prefix . '__item--is-parent' : '',
			'active_page_class'   => in_array( 'current-menu-item', $item->classes, true ) ? $prefix . '__item--is-active' : '',
			'active_parent_class' => in_array( 'current-menu-parent', $item->classes, true ) ? $prefix . '__item--is-parent-of-active' : '',
		];
		$class_string = implode( '  ', array_filter( $item_classes ) );
		$output      .= $indent . '<li class="' . $class_string . '">';
		$link_classes = [
			'item_link' => $prefix . '__link',
		];

		$link_class_string = implode( '  ', array_filter( $link_classes ) );
		$link_class_output = 'class="' . $link_class_string . '"';

		$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . ' ' . $link_class_output . '>';
		$item_output .= $args->link_before;
		$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $args->link_after;
		$item_output .= $args->after;
		$item_output .= '</a>';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
