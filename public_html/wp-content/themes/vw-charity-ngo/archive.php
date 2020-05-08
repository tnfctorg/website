<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package VW Charity NGO
 */

get_header(); ?>

<main id="maincontent" role="main">
  <div class="middle-align container">
    <?php
      $vw_charity_ngo_theme_lay = get_theme_mod( 'vw_charity_ngo_theme_options','Right Sidebar');
      if($vw_charity_ngo_theme_lay == 'Left Sidebar'){ ?>
      <div class="row">
        <div class="col-md-4 col-lg-4 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-md-8 col-lg-8">
          <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>
          <?php if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content',get_post_format());
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <div class="navigation">
            <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                'prev_text' => __( 'Previous page', 'vw-charity-ngo' ),
                'next_text' => __( 'Next page', 'vw-charity-ngo' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-charity-ngo' ) . ' </span>',
              ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    <?php }else if($vw_charity_ngo_theme_lay == 'Right Sidebar'){ ?>
      <div class="row">
        <div id="our-services" class="services col-md-8 col-lg-8">
          <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>
          <?php if ( have_posts() ) :
            /* Start the Loop */  
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content',get_post_format()); 
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <div class="navigation">
            <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                'prev_text' => __( 'Previous page', 'vw-charity-ngo' ),
                'next_text' => __( 'Next page', 'vw-charity-ngo' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-charity-ngo' ) . ' </span>',
              ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-4 col-lg-4 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php }else if($vw_charity_ngo_theme_lay == 'One Column'){ ?>
      <div id="our-services" class="services">
        <?php
          the_archive_title( '<h1 class="page-title">', '</h1>' );
          the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
        <?php if ( have_posts() ) :
          /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content',get_post_format());
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
        ?>
        <div class="navigation">
          <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
              'prev_text' => __( 'Previous page', 'vw-charity-ngo' ),
              'next_text' => __( 'Next page', 'vw-charity-ngo' ),
              'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-charity-ngo' ) . ' </span>',
            ) );
          ?>
          <div class="clearfix"></div>
        </div>
      </div>
    <?php }else if($vw_charity_ngo_theme_lay == 'Three Columns'){ ?>
      <div class="row">
        <div class="col-md-3 col-lg-3 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-md-6 col-lg-6">
          <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>
          <?php if ( have_posts() ) :
            /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content',get_post_format()); 
              endwhile;

              else :
                get_template_part( 'no-results' ); 
              endif; 
          ?>
          <div class="navigation">
            <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                'prev_text' => __( 'Previous page', 'vw-charity-ngo' ),
                'next_text' => __( 'Next page', 'vw-charity-ngo' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-charity-ngo' ) . ' </span>',
              ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-3 col-lg-3 sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
      </div>
    <?php }else if($vw_charity_ngo_theme_lay == 'Four Columns'){ ?>
      <div class="row">
        <div class="col-md-3 col-lg-3 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-md-3 col-lg-3">
          <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>
          <?php if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content',get_post_format()); 

            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <div class="navigation">
            <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                'prev_text' => __( 'Previous page', 'vw-charity-ngo' ),
                'next_text' => __( 'Next page', 'vw-charity-ngo' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-charity-ngo' ) . ' </span>',
              ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-3 col-lg-3 sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
        <div class="col-md-3 col-lg-3 sidebar"><?php dynamic_sidebar('sidebar-3');?></div>
      </div>
    <?php }else if($vw_charity_ngo_theme_lay == 'Grid Layout'){ ?>
      <div class="row">
        <div id="our-services" class="services flipInX col-md-9 col-lg-9">
          <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>
          <div class="row">
            <?php if ( have_posts() ) :
              /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/grid-layout' ); 
              endwhile;

              else :
                get_template_part( 'no-results' ); 
              endif; 
            ?>
          </div>
          <div class="navigation">
            <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                'prev_text' => __( 'Previous page', 'vw-charity-ngo' ),
                'next_text' => __( 'Next page', 'vw-charity-ngo' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-charity-ngo' ) . ' </span>',
              ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-3 col-lg-3 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php }else{?>
      <div class="row">
        <div id="our-services" class="services col-md-8 col-lg-8">
          <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>
          <?php if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content',get_post_format()); 
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <div class="navigation">
            <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                'prev_text' => __( 'Previous page', 'vw-charity-ngo' ),
                'next_text' => __( 'Next page', 'vw-charity-ngo' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-charity-ngo' ) . ' </span>',
              ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-4 col-lg-4 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php } ?>
    <div class="clearfix"></div>
  </div>
</main>

<?php get_footer(); ?>