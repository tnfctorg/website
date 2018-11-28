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
					printf( __( 'Take advandage of our Full Version of %sCharitas%s.  Use the coupon code charitas-lite in order to get 10 percent off.', 'charitas-lite' ), '<a href="https://wplook.com/product/themes/non-profit/charitas-charity-nonprofit-wordpress-theme/?utm_source=Buy-Full&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' );
				?>
			</p>

			<span class="customize-control-title"><?php _e( 'Looking for more NonProfit Themes', 'charitas-lite' ); ?></span>
			<p>
				<?php
					printf( __( 'Browse our %sWordPress Theme Collection%s', 'charitas-lite' ), '<a href="https://wplook.com/wordpress/themes/?utm_source=Buy-Full&utm_medium=link&utm_campaign=Charitas-Lite">', '</a>' );
				?>
			</p>

			<span class="customize-control-title"><?php _e( 'Need Help?', 'charitas-lite' ); ?></span>
			<p>
				<?php
					printf( __( '%sContact us!%s', 'charitas-lite' ), '<a href="https://wplook.com/docs/">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}

?>