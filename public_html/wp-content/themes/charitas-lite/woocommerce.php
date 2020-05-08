<?php
/**
 * The default template for displaying a WooCommerce shop
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0.10
 */
?>

<?php get_header(); ?>

<div class="item teaser-page-list">
	<div class="container_16">
		<aside class="grid_10">
			<h1 class="page-title"><?php _e( 'Shop', 'charitas-lite' ); ?></h1>
		</aside>
		<div class="clear"></div>
	</div>
</div>

<div id="main" class="site-main container_16">
	<div class="inner">
		<div id="primary" class="grid_11 suffix_1">
			<article class="single">
				<div class="entry-content">
					<?php woocommerce_content(); ?>
				<div class="clear"></div>
			</article>
		</div><!-- #content -->
		<?php get_sidebar( 'shop' ); ?>
		<div class="clear"></div>
	</div><!-- #primary -->
</div>

<?php get_footer(); ?>
