<?php
/**
 * Related posts based on categories and tags.
 * 
 */

$vw_charity_ngo_related_posts_taxonomy = get_theme_mod( 'vw_charity_ngo_related_posts_taxonomy', 'category' );

$vw_charity_ngo_post_args = array(
    'posts_per_page'    => absint( get_theme_mod( 'vw_charity_ngo_related_posts_count', '3' ) ),
    'orderby'           => 'rand',
    'post__not_in'      => array( get_the_ID() ),
);

$vw_charity_ngo_tax_terms = wp_get_post_terms( get_the_ID(), 'category' );
$vw_charity_ngo_terms_ids = array();
foreach( $vw_charity_ngo_tax_terms as $tax_term ) {
	$vw_charity_ngo_terms_ids[] = $tax_term->term_id;
}

$vw_charity_ngo_post_args['category__in'] = $vw_charity_ngo_terms_ids; 

if(get_theme_mod('vw_charity_ngo_related_post',true)==1){

$vw_charity_ngo_related_posts = new WP_Query( $vw_charity_ngo_post_args );

if ( $vw_charity_ngo_related_posts->have_posts() ) : ?>
    <div class="related-post">
        <h3><?php echo esc_html(get_theme_mod('vw_charity_ngo_related_post_title','Related Post'));?></h3>
        <div class="row">
            <?php while ( $vw_charity_ngo_related_posts->have_posts() ) : $vw_charity_ngo_related_posts->the_post(); ?>
                <?php get_template_part('template-parts/grid-layout'); ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata();

}