<?php
/**
 * The default Sidebar. It will appear on contact page
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0.10
 */
?>
<?php if ( is_active_sidebar( 'shop' ) ) : ?>
	<div id="secondary" class="grid_4 widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'shop' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div>
<?php endif; ?>
