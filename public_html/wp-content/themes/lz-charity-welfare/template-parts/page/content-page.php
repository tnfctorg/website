<?php
/**
 * Template part for displaying page content in page.php
 * @package WordPress
 * @subpackage lz-charity-welfare
 * @since 1.0
 * @version 0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header role="banner" class="entry-header">
		<?php esc_html(the_title( '<h1 class="entry-title">', '</h1>' )); ?>
		<?php lz_charity_welfare_edit_link( get_the_ID() ); ?>
	</header>
	<div class="entry-content">
		<?php the_post_thumbnail(); ?>
		<div class="text-content"><?php the_content();?></div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'lz-charity-welfare' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>