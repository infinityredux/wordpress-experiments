<?php

/**
 * Class InfinityReduxAdminOptions
 */
class InfinityReduxAdminOptions {
	static function initMenu() {
		add_submenu_page(
			'options-general.php',
			'InfinityRedux Utility',
			'InfinityRedux Util',
			'manage_options',
			'infinityredux',
			array( 'InfinityReduxAdminOptions', 'renderOptions' )
		);
	}

	static function initSettings() {
		register_setting( 'InfinityReduxFrame', 'infinityredux_settings' );

		add_settings_section(
			'InfinityReduxFrameSection',
			__( 'iFrame options', 'infinityredux' ),
			array('InfinityReduxAdminOptionsFrame', 'renderSection'),
			'InfinityReduxFrame'
		);

		add_settings_field(
			'enableShortcode',
			__( 'Enable iFrame shortcode', 'infinityredux' ),
			array('InfinityReduxAdminOptionsFrame', 'renderEnableShortcode'),
			'InfinityReduxFrame',
			'InfinityReduxFrameSection'
		);
		/*
		add_settings_field(
			'ir_text_field_1',
			__( 'Settings field description', 'infinityredux' ),
			'ir_text_field_1_render',
			'InfinityReduxFrame',
			'InfinityReduxFrameSection'
		);
		*/
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
				// output security fields for the registered setting
				settings_fields('InfinityReduxFrame');
				// output setting sections and their fields
				// (sections are registered for "wporg", each field is registered to a specific section)
				do_settings_sections('InfinityReduxFrame');
				// output save settings button
				submit_button(); // 'Save Settings'
				?>
			</form>
		</div>
		<?php
	}
}

class InfinityReduxAdminOptionsFrame {

	static function renderSection() {
		echo __( 'This section description', 'infinityredux' );
	}

	function renderEnableShortcode(  ) {
		$options = get_option( 'infinityredux_settings' );
		?>
        <input type='checkbox' name='infinityredux_settings[enableShortcode]' <?php checked( $options['enableShortcode'], 1 ); ?> value='1'>
		<?php
	}

	/*
	function ir_text_field_1_render(  ) {
		$options = get_option( 'ir_settings' );
		?>
        <input type='text' name='ir_settings[ir_text_field_1]' value='<?php echo $options['ir_text_field_1']; ?>'>
		<?php
	}
	*/
}