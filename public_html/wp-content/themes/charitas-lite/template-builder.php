<?php
/**
 * Template Name: Clean (No Columns, sidebar)
 * The tempalte have to be used for Page Builders.
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas Lite 1.0.6
 */
?>

<?php get_header(); ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>