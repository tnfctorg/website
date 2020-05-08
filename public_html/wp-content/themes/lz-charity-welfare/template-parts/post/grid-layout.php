<?php
/**
 * Template part for displaying posts
 * @package WordPress
 * @subpackage lz-charity-welfare
 * @since 1.0
 * @version 1.4
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<div class="col-lg-4 col-md-4">
	<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="article_content">   
      <div class="article-text">
        <h3><a href="<?php echo esc_url( get_permalink() );?>"><?php esc_html(the_title()); ?></a></h3>
        <?php the_post_thumbnail(); ?>  
        <div class="metabox">
         <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span><span class="screen-reader-text"><?php the_time( get_option( 'date_format' ) ); ?></span></a>
          <a href="<?php echo esc_url( get_permalink() );?>"><span class="entry-author"><?php the_author(); ?></span></a>
          <span class="entry-comments"><?php comments_number( __('0 Comments','lz-charity-welfare'), __('0 Comments','lz-charity-welfare'), __('% Comments','lz-charity-welfare') ); ?></span>
        </div>
        <p><?php $excerpt = get_the_excerpt();echo esc_html( lz_charity_welfare_string_limit_words( $excerpt,30 ) ); ?></p>      
        <div class="read-btn">
          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'READ MORE', 'lz-charity-welfare' ); ?>"><?php esc_html_e('READ MORE','lz-charity-welfare'); ?><i class="fas fa-angle-right"></i>
          </a>
        </div>
      </div>
      <div class="clearfix"></div> 
    </div>
  </div>
</div>