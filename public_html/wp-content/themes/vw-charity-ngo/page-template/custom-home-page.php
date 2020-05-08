<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_charity_ngo_before_slider' ); ?>

  <?php if( get_theme_mod('vw_charity_ngo_slider_hide_show') != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $vw_charity_ngo_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_charity_ngo_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_charity_ngo_slider_pages[] = $mod;
            }
          }
          if( !empty($vw_charity_ngo_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_charity_ngo_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <hr class="head-line">
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_charity_ngo_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_charity_ngo_slider_excerpt_number','30')))); ?></p>
                  <div class="more-btn">              
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','vw-charity-ngo'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','vw-charity-ngo' );?></span></a>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_attr_e( 'Previous','vw-charity-ngo' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_attr_e( 'Next','vw-charity-ngo' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section> 
  <?php }?>

  <?php do_action( 'vw_charity_ngo_after_slider' ); ?>

  <section id="scholarship">
    <div class="container">
      <div class="row scholarship-box">
        <?php $vw_charity_ngo_scholarship_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_charity_ngo_scholarship_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_charity_ngo_scholarship_pages[] = $mod;
            }
          }
          if( !empty($vw_charity_ngo_scholarship_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_charity_ngo_scholarship_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $count = 1;
              while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div class="col-lg-4 col-md-4">
                    <div class="scholarship-text">
                      <div class="row">
                        <div class="col-lg-3 col-md-4 p-0">
                          <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="col-lg-9 col-md-8">
                          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
                          <hr class="scholar">
                          <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_charity_ngo_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_charity_ngo_scholarship_excerpt_number','30')))); ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php $count++; endwhile; 
              wp_reset_postdata();?>
            <?php else : ?>
              <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <div class="clearfix"></div>
      </div>
    </div> 
  </section>

  <?php do_action( 'vw_charity_ngo_after_scholarship' ); ?>

  <?php if( get_theme_mod('vw_charity_ngo_what_title') != ''){ ?>
    <section id="what-do">
      <div class="container">
        <?php if( get_theme_mod('vw_charity_ngo_what_title') != ''){ ?>
          <h3><?php echo esc_html(get_theme_mod('vw_charity_ngo_what_title','')); ?></h3>
          <hr class="title">
        <?php }?>
        <div class="row">
          <?php $vw_charity_ngo_what_do_pages = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'vw_charity_ngo_what_do_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $vw_charity_ngo_what_do_pages[] = $mod;
              }
            }
            if( !empty($vw_charity_ngo_what_do_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $vw_charity_ngo_what_do_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $count = 1;
                while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-lg-4 col-md-4">
                      <div class="what_do_text">
                        <?php the_post_thumbnail(); ?>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                        <hr class="what_do">
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_charity_ngo_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_charity_ngo_what_we_do_excerpt_number','30')))); ?></p>
                      </div>
                    </div>
                <?php $count++; endwhile; 
                wp_reset_postdata();?>
              <?php else : ?>
                <div class="no-postfound"></div>
            <?php endif;
          endif;?>
            <div class="clearfix"></div>
        </div>
      </div> 
    </section>
  <?php }?>

  <?php do_action( 'vw_charity_ngo_after_what_we_do' ); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>