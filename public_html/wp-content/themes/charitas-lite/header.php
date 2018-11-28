<?php
/**
 * The header template file
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!--  Basic Page Needs -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page">

		<!-- Toolbar -->
		<div id="toolbar">
			<div class="container_16">

				<div class="grid_16">
					
					
						<?php
							if ( has_nav_menu( 'language' ) ) { 
								wp_nav_menu( array('depth' => '3', 'theme_location' => 'language' ));
						} ?> 

					<ul class="tb-list">

						<?php if ( get_theme_mod('wplook_phonenr') ){  ?>
							<li class="phone"><a href="tel:<?php echo esc_html(get_theme_mod('wplook_phonenr') ); ?>" ><?php _e('Tel.:', 'charitas-lite'); ?><?php echo esc_html(get_theme_mod('wplook_phonenr') ); ?></a></li>
						<?php } ?>

						<?php if ( get_theme_mod('wplook_rssurl') ){  ?>
							<li class="rss"><a href="<?php echo esc_html(get_theme_mod('wplook_rssurl') ); ?>"><i class="icon-feed2"></i></a></li>
						<?php } ?>
						
						<?php if ( get_theme_mod('wplook_contacturl') ){  ?>
							<li class="contact"><a href="<?php echo esc_url( get_page_link(get_theme_mod('wplook_contacturl')) ); ?>"><i class="icon-envelope"></i></a></li>
						<?php } ?>
						
						<?php if ( get_theme_mod('wplook_facebookurl') ){  ?>
							<li class="share-item-icon-facebook mt"><a target="_blank" title="Facebook" href="<?php echo esc_url(get_theme_mod('wplook_facebookurl') ); ?>"><i class="icon-facebook"></i></a></li>
						<?php } ?>

						<?php if ( get_theme_mod('wplook_twitterurl') ){  ?>
							<li class="share-item-icon-twitter mt"><a target="_blank" title="Twitter" href="<?php echo esc_url(get_theme_mod('wplook_twitterurl') ); ?>"><i class="icon-twitter"></i></a></li>
						<?php } ?>


						<?php if ( get_theme_mod('wplook_Search_button') == 'yes' ){  ?>
							<li class="search"><a href="#"><i class="icon-search"></i></a>
								<ul class="search-items radius-bottom">
									<li>
										<div class="search-form">
											<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
												<div>
													<input type="text" value="<?php _e('Search for...', 'charitas-lite'); ?>" name="s" id="s" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
													<input type="submit" id="searchsubmit" value="Search" />
												</div>
											</form>
										</div>
									</li>
								</ul>
							</li>
						<?php } ?>

						<?php if ( get_theme_mod('wplook_donateurl') ){  ?>
							<li class="donate"><a href="<?php echo esc_url(get_theme_mod('wplook_donateurl') ); ?>"><?php _e('Donate', 'charitas-lite'); ?> <i class="icon-heart"></i></a></li>
						<?php } ?>

					</ul>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- /#toolbar -->

		<header id="branding" class="site-header" role="banner">
			<div id="sticky_navigation">
				<div class="container_16">
					<hgroup class="fleft grid_5">
							<h1 id="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo('description'); ?>" rel="home">
								<?php if ( get_theme_mod('wplook_logo') ){ ?>
									<img src="<?php echo get_theme_mod('wplook_logo') ?>">
								<?php } else {
									bloginfo('name');
								}?>
								</a>
							</h1>
								<h2 id="site-description"><?php bloginfo('description'); ?></h2>
					</hgroup>

					<nav role="navigation" class="site-navigation main-navigation grid_11" id="site-navigation">
						<?php wp_nav_menu( array('menu_class' => 'nav-menu',  'theme_location' => 'primary' )); ?>
					</nav>
					
					<!-- Mobile navigation -->
					
					<div class="grid_16 mob-nav"></div>

					<!-- .site-navigation .main-navigation -->
					<div class="clear"></div>
				</div>
			</div>
		</header>
		<!-- #masthead .site-header -->