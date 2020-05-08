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
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="article_content">   
    <div class="article-text">
      <h1><?php esc_html(the_title()); ?></h1>   
      <?php the_post_thumbnail(); ?>  
      <div class="metabox">
       <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span><span class="screen-reader-text"><?php the_time( get_option( 'date_format' ) ); ?></span></a>
        <a href="<?php echo esc_url( get_permalink() );?>"><span class="entry-author"><?php the_author(); ?></span></a>
        <span class="entry-comments"><?php comments_number( __('0 Comments','lz-charity-welfare'), __('0 Comments','lz-charity-welfare'), __('% Comments','lz-charity-welfare') ); ?></span>
      </div>
      <div class="text-content"><p><?php the_content(); ?></p></div>
    </div>
    <div class="clearfix"></div> 
  </div>
</div>