<?php

/**
 * Class InfinityReduxAdminOptions
 */
class InfinityReduxAdminOptions {
	static function addOptionsSubmenu() {
		add_submenu_page(
			'options-general.php',
			'WPOrg Options',
			'WPOrg Options',
			'manage_options',
			'wporg',
			array( 'InfinityReduxAdminOptions', 'renderOptions' )
		);
	}

	static function renderOptions() {
		// check user capabilities
		if (!current_user_can('manage_options')) {
			return;
		}
		?>
		<!--suppress HtmlUnknownTarget -->
		<div class="wrap">
			<h1><?= esc_html(get_admin_page_title()); ?></h1>
			<form action="options.php" method="post">
				<?php
				// output security fields for the registered setting "wporg_options"
				settings_fields('wporg_options');
				// output setting sections and their fields
				// (sections are registered for "wporg", each field is registered to a specific section)
				do_settings_sections('wporg');
				// output save settings button
				submit_button('Save Settings');
				?>
			</form>
		</div>
		<?php
	}
}