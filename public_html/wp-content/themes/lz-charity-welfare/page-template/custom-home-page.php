<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="content" role="main">
	<?php do_action( 'lz_charity_welfare_above_slider' ); ?>

	<?php if( get_theme_mod('lz_charity_welfare_slider_hide_show') != ''){ ?>
		<section id="slider">
		  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $slider_pages = array();
			      	for ( $count = 1; $count <= 4; $count++ ) {
				        $mod = intval( get_theme_mod( 'lz_charity_welfare_slider' . $count ));
				        if ( 'page-none-selected' != $mod ) {
				          $slider_pages[] = $mod;
				        }
			      	}
			      	if( !empty($slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $slider_pages,
			          	'orderby' => 'post__in'
			        );
			        $query = new WP_Query( $args );
			        if ( $query->have_posts() ) :
			          $i = 1;
			    ?>     
			    <div class="carousel-inner" role="listbox">
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
			          	<a href="<?php echo esc_url( get_permalink() );?>"><img src="<?php the_post_thumbnail_url('full'); ?>"/></a>
			          	<div class="carousel-caption">
				            <div class="inner_carousel">
				              	<h1><?php esc_html(the_title());?></h1>
				              	<p><?php $excerpt = get_the_excerpt(); echo esc_html( lz_charity_welfare_string_limit_words( $excerpt,20 ) ); ?></p>
				              	<div class="donate-btn">
						          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Donate More', 'lz-charity-welfare' ); ?>"><?php esc_html_e('Donate More','lz-charity-welfare'); ?>
						          </a>
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
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
			    </a>
		  	</div>  
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('lz_charity_welfare_below_slider'); ?>

	<?php /*--our-services --*/?>

	<?php if( get_theme_mod('lz_charity_welfare_our_services_title') != '' || get_theme_mod('lz_charity_welfare_category_setting') != ''){ ?>
		<section id="our-services">
			<div class="container">			
				<div class="service-box">
					<div class="service-title">
			    		<?php if( get_theme_mod('lz_charity_welfare_our_services_title') != ''){ ?>
		            		<h2><?php echo esc_html(get_theme_mod('lz_charity_welfare_our_services_title','')); ?></h2><hr>
		            	<?php }?>
		            </div>
		            <div class="row">
			      		<?php 
			      		$catData1=  get_theme_mod('lz_charity_welfare_category_setting');
	          			if($catData1){ 
			      			$page_query = new WP_Query(array( 'category_name' => esc_html($catData1 ,'lz-charity-welfare')));?>
			        		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>     	
			          			<div class="col-lg-4 col-md-6 p-0">
			          				<div class="service-section">
			          					<div class="row">
				          					<div class="col-lg-4 col-md-4">
				          						<div class="service-img">
										      		<img src="<?php the_post_thumbnail_url('full'); ?>"/>
										  		</div>
				          					</div>
				          					<div class="col-lg-8 col-md-8 p-0">
				          						<div class="content">
								            		<h3><a href="<?php echo esc_url( get_permalink() );?>"><?php esc_html(the_title()); ?></a></h3><hr>
								            		<p><?php $excerpt = get_the_excerpt(); echo esc_html( lz_charity_welfare_string_limit_words( $excerpt,10 ) ); ?></p>
								            		<div class="learn-btn">
											          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Learn More', 'lz-charity-welfare' ); ?>"><?php esc_html_e('Learn More','lz-charity-welfare'); ?><i class="fas fa-arrow-right"></i>
											          </a>
											      	</div>
					            				</div>
				          					</div>
			          					</div>
			          				</div>
							    </div>    	
			          		<?php endwhile; 
			          	wp_reset_postdata();
			      		} ?>
		      		</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</section>
	<?php }?>

	<?php do_action('lz_charity_welfare_below_our_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	        <?php the_content(); ?>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>