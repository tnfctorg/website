<?php
//about theme info
add_action( 'admin_menu', 'lz_charity_welfare_gettingstarted' );
function lz_charity_welfare_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'lz-charity-welfare'), esc_html__('About Theme', 'lz-charity-welfare'), 'edit_theme_options', 'lz_charity_welfare_guide', 'lz_charity_welfare_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function lz_charity_welfare_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'lz_charity_welfare_admin_theme_style');

//guidline for about theme
function lz_charity_welfare_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'lz-charity-welfare' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to LZ Charity Welfare WordPress Theme', 'lz-charity-welfare' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'lz-charity-welfare' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'lz-charity-welfare' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'lz-charity-welfare' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'lz-charity-welfare' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'lz-charity-welfare' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'lz-charity-welfare' ); ?> <a href="<?php echo esc_url( LZ_CHARITY_WELFARE_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'lz-charity-welfare' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'LZ Charity Welfare is an inviting, manageable, creative and beautiful charity WordPress theme with a professional inclination. It is a perfect fit for charity, non-profit organization, NGO, donation camp, fundraising event, political campaign, volunteering organization and welfare committee who are working for some cause. The themes design is thoughtfully made interactive to encourage people and evoke their interest in joining hands for a good cause. It is a responsive theme which will make your website accessible on any device. This charity WP theme is cross-browser compatible and follows standard design pattern for good SEO. It being translation ready and compatible with WPML plugin can build up a website in your local language to make visitors feel like home. Social media icons are integrated with the design to associate maximum people to your charity and fundraising events. LZ Charity Welfare gives you all the power to customize your website to make it look as per your requirements and Bootstrap framework makes this work even easier. Banners and sliders are used to make the site more impactful without losing its modernity. Its clean and secure code ensures a bug-free website. It is feathery light to load fast on all platforms.', 'lz-charity-welfare')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Charity Theme', 'lz-charity-welfare' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'lz-charity-welfare'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( LZ_CHARITY_WELFARE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'lz-charity-welfare'); ?></a>
			<a href="<?php echo esc_url( LZ_CHARITY_WELFARE_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'lz-charity-welfare'); ?></a>
			<a href="<?php echo esc_url( LZ_CHARITY_WELFARE_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'lz-charity-welfare'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/lz-charity-welfare.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'lz-charity-welfare'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'lz-charity-welfare'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'lz-charity-welfare'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'lz-charity-welfare'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'lz-charity-welfare'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'lz-charity-welfare'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'lz-charity-welfare'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'lz-charity-welfare'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'lz-charity-welfare'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'lz-charity-welfare'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'lz-charity-welfare'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'lz-charity-welfare'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'lz-charity-welfare'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>