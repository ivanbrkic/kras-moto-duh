<!doctype html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'templates/head' ); ?>

	<body <?php body_class(); ?>>
		<?php
		/**
		 * Use wp_body_open() so other plugins can hook in to wp_body_open hook.
		 *
		 * @hooked pg_get_sprite()
		 */
		wp_body_open();

		/**
		 * Add get_header hook so other plugins can hook in.
		 * We have to add it manually since we're not using get_header() because of our wrapper.
		 */
		do_action( 'get_header' );
		?>

		<?php get_template_part( 'templates/header' ); ?>

		<main style="overflow: hidden; padding-bottom: 100px;">
			<?php require pg_wrapper_template_path(); ?>
		</main>

		<?php get_template_part( 'templates/footer' ); ?>

			<div class="consent">
				<button class="consent__button" data-cc="show-preferencesModal">
					Postavke privatnosti
				</button>
			</div>

		<?php
		/**
		 * Add get_footer hook so other plugins can hook in.
		 * We have to add it manually since we're not using get_footer() because of our wrapper.
		 */
		do_action( 'get_footer' );

		wp_footer();
		?>
	</body>
</html>
