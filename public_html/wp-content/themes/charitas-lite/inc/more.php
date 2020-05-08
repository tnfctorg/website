<?php

/*-----------------------------------------------------------------------------------*/
/*  Add More Option for Customizer
/*-----------------------------------------------------------------------------------*/

class Wplook_Customize_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<p>
				<?php
					printf( __( 'Take advandage of our Full Version of %s<strong>Charitas</strong>%s. Use the coupon code <strong>"charitas-lite"</strong> in order to get <strong>20 percent off</strong>.', 'charitas-lite' ), '<a href="https://wplook.com/product/themes/non-profit/charitas-charity-nonprofit-wordpress-theme/?utm_source=Buy-Full&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' );
				?>
			</p>

			<p>
				<?php printf( __( '<strong>The full Version is coming with:</strong>', 'charitas-lite' ) ); ?>
			</p>

			<ul>
				<li><?php printf( __( '- Great Support', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- Child Theme', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- Demo Content', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- Custom Post Type Projects', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- Custom Post Type Staff', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- Custom Post Type Causes', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- Custom Post Type Events', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- Custom Post Type Documents', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- Custom Post Type Galleries', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- Dashboard Widget for Donations', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- 18 Widgets Areas', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- WooCommerce Integration', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- Online Donations', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- Automatic Progress Bar', 'charitas-lite' ) ); ?></li>
				<li><?php printf( __( '- %sand much more...%s', 'charitas-lite' ), '<a href="https://wplook.com/product/themes/non-profit/charitas-charity-nonprofit-wordpress-theme/?utm_source=view_more&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></li>
			</ul>


			<span class="customize-control-title"><?php _e( 'Looking for more Premium NonProfit Themes?', 'charitas-lite' ); ?></span>

			<p>
				<span class="customize-control-title"><?php printf( __( 'Benevolence WordPress Theme - %sRead More%s', 'charitas-lite' ) , '<a href="https://wplook.com/product/themes/non-profit/benevolence-church-wordpress-theme/?utm_source=view_benevolence&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/images/benevolence.jpg" alt="Benevolence">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Biosphere WordPress Theme - %sRead More%s', 'charitas-lite' ) , '<a href="https://wplook.com/product/themes/non-profit/biosphere-environmental-wordpress-theme/?utm_source=view_biosphere&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/images/biosphere.jpg" alt="Biosphere">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Charitas WordPress Theme - %sRead More%s', 'charitas-lite' ) , '<a href="https://wplook.com/product/themes/non-profit/charitas-charity-nonprofit-wordpress-theme/?utm_source=view_charitas&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/images/charitas.jpg" alt="Charitas">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Charity Life WordPress Theme - %sRead More%s', 'charitas-lite' ) , '<a href="https://wplook.com/product/themes/non-profit/charity-fundraising-wordpress-theme/?utm_source=view_charity_life&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/images/charitylife.jpg" alt="Charity Life">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Charity WordPress Theme - %sRead More%s', 'charitas-lite' ) , '<a href="https://wplook.com/product/themes/non-profit/charity-nonprofit-wordpress-theme/?utm_source=view_charity&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/images/charity.jpg" alt="Charity">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Makenzie WordPress Theme - %sRead More%s', 'charitas-lite' ) , '<a href="https://wplook.com/product/themes/magazines/makenzie-lifestyle-blog-magazine-wordpress-theme/?utm_source=view_makenzie&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/images/makenzie.jpg" alt="Makenzie">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Studio 8 WordPress Theme - %sRead More%s', 'charitas-lite' ) , '<a href="https://wplook.com/product/themes/business/studio-8-agency-wordpress-theme/?utm_source=view_studio8&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/images/studio8.jpg" alt="Studio 8">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Event WordPress Theme - %sRead More%s', 'charitas-lite' ) , '<a href="https://wplook.com/product/themes/conference-events/event-wordpress-theme/?utm_source=view_event&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/images/event.jpg" alt="Event">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Health & Medical WordPress Theme - %sRead More%s', 'charitas-lite' ) , '<a href="https://wplook.com/product/themes/business/medical-wordpress-theme/?utm_source=view_medical&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/images/medical.jpg" alt="Health & Medical ">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'StereoClub WordPress Theme - %sRead More%s', 'charitas-lite' ) , '<a href="https://wplook.com/product/themes/music-band/stereoclub-nightclub-band-wordpress-theme/?utm_source=view_stereo_club&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/images/stereoclub.jpg" alt="StereoClub ">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'The Architect WordPress Theme - %sRead More%s', 'charitas-lite' ) , '<a href="https://wplook.com/product/themes/business/architect-wordpress-theme/?utm_source=view_the_architect&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo get_template_directory_uri(); ?>/images/thearchitect.jpg" alt="The Architect ">
			<br />


			<p>
				<?php
					printf( __( 'Browse more %sWordPress Themes%s', 'charitas-lite' ), '<a href="https://wplook.com/wordpress/themes/?utm_source=browse_more&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' );
				?>
			</p>

			<span class="customize-control-title"><?php _e( 'Need Help?', 'charitas-lite' ); ?></span>
			<p>
				<?php
					printf( __( '%sContact us!%s', 'charitas-lite' ), '<a href="https://wplook.com/help/?utm_source=help&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}

?>
