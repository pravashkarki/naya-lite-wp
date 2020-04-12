<?php

function naya_lite_theme_page() {
	add_theme_page( __( 'About Theme', 'naya-lite' ), __( 'About Theme', 'naya-lite' ), 'edit_theme_options', 'about-naya-lite', 'naya_lite_about_page' );
}

add_action( 'admin_menu', 'naya_lite_theme_page' );

function naya_lite_about_page() {   ?>
	<div class="wrap" style="width:75%">
		<div>
			<h1><?php _e( 'Welcome to Naya Lite - Content focused minimal typographic theme', 'naya-lite' ); ?></h1>
			<p><?php _e( 'We hope you will enjoy using Naya Lite, as much as we enjoyed creating it.', 'naya-lite' ); ?></p>
		</div>
		<div>
			<h2><?php _e( 'Getting started', 'naya-lite' ); ?></h2>
			<h4><?php _e( 'Customize everything from a single place.', 'naya-lite' ); ?></h4>

			<p><?php _e( 'Using the WordPress Theme Customizer you can easily customize the design controls and setup a the style of your website, including typography styles, default color & every aspect of the theme.', 'naya-lite' ); ?></p>
			<p>
				<a class="button button-primary" href="<?php echo esc_url( 'customize.php?return=%2Fwp-admin%2Fthemes.php' ); ?>"><?php _e( 'Go to Customizer', 'naya-lite' ); ?></a>
				<a class="button button-primary" href="<?php echo esc_url( home_url() ); ?>"
				   target="_blank"><?php _e( 'Visit ', 'naya-lite' ); ?><?php bloginfo( 'name' ); ?></a>
				<a target="_blank" class="button button-primary"
				   href="<?php echo esc_url( 'http://www.demo.sampression.com/naya-lite/' ); ?>"><?php _e( 'Live Theme Demo', 'naya-lite' ); ?></a>
			</p>
			<p><?php _e( 'For further help, please visit our support page at:', 'naya-lite' ); ?> <a href="<?php echo esc_url( 'https://www.sampression.com/support' ); ?>" target="_blank"><?php echo esc_url( 'https://www.sampression.com/support' ); ?></a></p>
		</div>
		<div>
			<h2><?php _e( 'Naya Lite Features', 'naya-lite' ); ?></h2>

			<ul class="featurelist">
				<li><strong><?php _e( '- Custom logo', 'naya-lite' ); ?></strong></li>
				<li><strong><?php _e( '- Typography Options', 'naya-lite' ); ?></strong></li>
				<li><strong><?php _e( '- Google Fonts', 'naya-lite' ); ?></strong></li>
				<li><strong><?php _e( '- Font Awesome Icon Set', 'naya-lite' ); ?></strong></li>
				<li><strong><?php _e( '- Responsive Mobile Sites', 'naya-lite' ); ?></strong></li>
				<li><strong><?php _e( '- SEO Friendly', 'naya-lite' ); ?></strong></li>
			</ul>

			<br>
			<h2><?php _e( 'More Themes from Sampression', 'naya-lite' ); ?></h2>

		   <h3 style="margin-bottom: 0;"><?php _e( 'Sampression Lite', 'naya-lite' ); ?></h3>
			<p>Pinterest Style WordPress Theme</p>
				<a target="_blank" class="button"
				   href="<?php echo esc_url( 'https://www.demo.sampression.com/sampression-lite/' ); ?>"><?php _e( 'Live Theme Demo', 'naya-lite' ); ?></a>
			<br><br>

		   <h3 style="margin-bottom: 0;"><?php _e( 'Sampression Pro', 'naya-lite' ); ?></h3>
				<p>Perfect theme for bloggers, artists, photographers and businesses.</p>
				<a target="_blank" class="button"
				   href="<?php echo esc_url( 'https://www.demo.sampression.com/sampression-pro/' ); ?>"><?php _e( 'Live Theme Demo', 'naya-lite' ); ?></a>
		</div>
	</div>
	<?php
}
