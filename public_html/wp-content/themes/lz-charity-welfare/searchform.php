<?php
/**
 * Template for displaying search forms in lz-charity-welfare
 *
 * @package WordPress
 * @subpackage lz-charity-welfare
 * @since 1.0
 * @version 0.1
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label >
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'lz-charity-welfare' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'lz-charity-welfare' ); ?>" value="<?php echo esc_attr(get_search_query() ); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit" role="tab"><?php echo esc_attr_x( 'Search', 'submit button', 'lz-charity-welfare' ); ?></button>
</form>