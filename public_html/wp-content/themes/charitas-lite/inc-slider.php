<?php
/**
 * The default template for displaying Flexslider
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */
?>
<?php 
	$header_image = get_header_image();
?>

<?php if ( get_theme_mod('wplook_activate_homepage_slider') == 'yes' ) { ?>
	<div class="flexslider loading">
		<ul class="slides">
				
				<li data-thumb="<?php echo get_theme_mod('wplook_slide1_thumb') ?>">
					<a href="<?php echo esc_html(get_theme_mod('wplook_slide1_url') ); ?>"><img src="<?php echo get_theme_mod('wplook_slide1_image') ?>" alt="<?php echo get_theme_mod('wplook_slide1_title') ?>"></a>
					<div class="flex-caption ">
						<div class="flex-content container_16">
							<div class="grid_16">
								<?php if ( get_theme_mod('wplook_slide1_title') ) { ?>
									<h1><?php echo esc_html(get_theme_mod('wplook_slide1_title')); ?></h1>
								<?php } ?>
								
								<?php if ( get_theme_mod('wplook_slide1_description') ) { ?>
									<h2><?php echo esc_html(get_theme_mod('wplook_slide1_description')); ?></h2>
								<?php } ?>

								<?php if ( get_theme_mod('wplook_slide1_description') ) { ?>
									<div class="flex-button"><a class="radius" href="<?php echo esc_url(get_page_link(get_theme_mod('wplook_contacturl'))); ?>">Learn More <i class="icon-angle-right"></i></a></div>
								<?php } ?>
							</div>	
						</div>
					</div>
				</li>

				<li data-thumb="<?php echo get_theme_mod('wplook_slide2_thumb') ?>">
					<a href="<?php echo esc_html(get_theme_mod('wplook_slide2_url') ); ?>"><img src="<?php echo get_theme_mod('wplook_slide2_image') ?>" alt="<?php echo get_theme_mod('wplook_slide2_title') ?>"></a>
					<div class="flex-caption ">
						<div class="flex-content container_16">
							<div class="grid_16">
								<?php if ( get_theme_mod('wplook_slide2_title') ) { ?>
									<h1><?php echo esc_html(get_theme_mod('wplook_slide2_title')); ?></h1>
								<?php } ?>
								
								<?php if ( get_theme_mod('wplook_slide2_description') ) { ?>
									<h2><?php echo esc_html(get_theme_mod('wplook_slide2_description')); ?></h2>
								<?php } ?>

								<?php if ( get_theme_mod('wplook_slide2_description') ) { ?>
									<div class="flex-button"><a class="radius" href="<?php echo esc_url(get_page_link(get_theme_mod('wplook_contacturl'))); ?>">Learn More <i class="icon-angle-right"></i></a></div>
								<?php } ?>
							</div>	
						</div>
					</div>
				</li>

				<li data-thumb="<?php echo get_theme_mod('wplook_slide3_thumb') ?>">
					<a href="<?php echo esc_html(get_theme_mod('wplook_slide3_url') ); ?>"><img src="<?php echo get_theme_mod('wplook_slide3_image') ?>" alt="<?php echo get_theme_mod('wplook_slide3_title') ?>"></a>
					<div class="flex-caption ">
						<div class="flex-content container_16">
							<div class="grid_16">
								<?php if ( get_theme_mod('wplook_slide3_title') ) { ?>
									<h1><?php echo esc_html(get_theme_mod('wplook_slide3_title')); ?></h1>
								<?php } ?>
								
								<?php if ( get_theme_mod('wplook_slide3_description') ) { ?>
									<h2><?php echo esc_html(get_theme_mod('wplook_slide3_description')); ?></h2>
								<?php } ?>

								<?php if ( get_theme_mod('wplook_slide3_description') ) { ?>
									<div class="flex-button"><a class="radius" href="<?php echo esc_url(get_page_link(get_theme_mod('wplook_contacturl'))); ?>">Learn More <i class="icon-angle-right"></i></a></div>
								<?php } ?>
							</div>	
						</div>
					</div>
				</li>

				<li data-thumb="<?php echo get_theme_mod('wplook_slide4_thumb') ?>">
					<a href="<?php echo esc_html(get_theme_mod('wplook_slide4_url') ); ?>"><img src="<?php echo get_theme_mod('wplook_slide4_image') ?>" alt="<?php echo get_theme_mod('wplook_slide4_title') ?>"></a>
					<div class="flex-caption ">
						<div class="flex-content container_16">
							<div class="grid_16">
								<?php if ( get_theme_mod('wplook_slide4_title') ) { ?>
									<h1><?php echo esc_html(get_theme_mod('wplook_slide4_title')); ?></h1>
								<?php } ?>
								
								<?php if ( get_theme_mod('wplook_slide4_description') ) { ?>
									<h2><?php echo esc_html(get_theme_mod('wplook_slide4_description')); ?></h2>
								<?php } ?>

								<?php if ( get_theme_mod('wplook_slide4_description') ) { ?>
									<div class="flex-button"><a class="radius" href="<?php echo esc_url(get_page_link(get_theme_mod('wplook_contacturl'))); ?>">Learn More <i class="icon-angle-right"></i></a></div>
								<?php } ?>
							</div>	
						</div>
					</div>
				</li>


		</ul>
	</div>

<?php } elseif ( get_theme_mod('wplook_rev_slider') != '' ){ ?>
	<div class="revolution-slider">
		<?php putRevSlider( esc_html(get_theme_mod('wplook_rev_slider') ) ); ?>
	</div>		
<?php } else {
	if (! empty( $header_image ) ) { ?>
		<img class="header-image" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	<?php }
} ?>