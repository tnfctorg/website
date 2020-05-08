<?php
/**
 * The template part for displaying single post layout
 *
 * @package VW Charity NGO
 * @subpackage vw-charity-ngo
 * @since VW Charity NGO 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="single-post">
        <h1><?php the_title();?></h1>
        <div class="content-vw">
            <?php if( get_theme_mod( 'vw_charity_ngo_toggle_postdate',true) != '' || get_theme_mod( 'vw_charity_ngo_toggle_author',true) != '' || get_theme_mod( 'vw_charity_ngo_toggle_comments',true) != '') { ?>
                <div class="metabox">
                    <?php if(get_theme_mod('vw_charity_ngo_toggle_postdate',true)==1){ ?>
                        <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
                    <?php } ?>

                    <?php if(get_theme_mod('vw_charity_ngo_toggle_author',true)==1){ ?>
                        <span class="entry-author"><i class="far fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
                    <?php } ?>

                    <?php if(get_theme_mod('vw_charity_ngo_toggle_comments',true)==1){ ?>
                        <span class="entry-comments"> <i class="far fa-comments"></i> <?php comments_number( '0 Comments', '0 Comments', '% Comments' ); ?> </span>
                    <?php } ?>
                </div>
            <?php } ?>
        </div> 
         <?php if(has_post_thumbnail()) { ?>
                <div class="feature-box">   
                  <?php the_post_thumbnail(); ?>
                </div>  
                <hr>                 
            <?php } ?> 
            <div class="entry-content">
                <?php the_content(); ?>
                 <?php if(get_theme_mod('vw_charity_ngo_toggle_tags',true)==1){ ?>
                    <div class="tags"><?php the_tags(); ?></div>    
                <?php } ?>
            </div> 
        <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() )
            comments_template();

            if ( is_singular( 'attachment' ) ) {
                // Parent post navigation.
                the_post_navigation( array(
                    'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vw-charity-ngo' ),
                ) );
            } elseif ( is_singular( 'post' ) ) {
                // Previous/next post navigation.
                the_post_navigation( array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'vw-charity-ngo' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Next post:', 'vw-charity-ngo' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'vw-charity-ngo' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-charity-ngo' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                ) );
            }
        ?>
    </div>
    <?php get_template_part('template-parts/related-posts'); ?>
</article>