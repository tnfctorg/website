<?php
/**
 * Template Name: Full Width (no sidebar)
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas Lite 1.0.6
 */
?>

<?php get_header(); ?>
	<div class="item teaser-page-list">
		<div class="container_16">
			<aside class="grid_10">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</aside>
			<?php if ( get_theme_mod('wplook_breadcrumb') != 'no' ){ ?>
				<div class="grid_6">
					<div id="rootline">
						<?php charitas_breadcrumbs(); ?>	
					</div>
				</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</div>
	<div id="main" class="site-main container_16">
		<div class="inner">
			<div id="primary" class="grid_16">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?php get_footer(); ?>