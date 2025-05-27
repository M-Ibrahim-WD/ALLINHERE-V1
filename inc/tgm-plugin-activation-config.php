<?php
/**
 * TGM Plugin Activation configuration.
 *
 * @package ALLINHERE
 */

add_action( 'tgmpa_register', 'allinhere_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function allinhere_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the WordPress official repository, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Elementor',
			'slug'      => 'elementor',
			'required'  => true, // If true, the user will be notified constantly unless it is installed.
		),

		// You can add more plugins here if needed.

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will focus on the theme global when displaying messages if it is defined.
	 */
	$config = array(
		'id'           => 'allinhere',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/* // This is the start of the problematic comment block
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'allinhere' ),
			'menu_title'                      => __( 'Install Plugins', 'allinhere' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'allinhere' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'allinhere' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'allinhere' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'allinhere'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'allinhere'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'allinhere'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for: %1$s.',
				'allinhere'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'allinhere'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'allinhere'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'allinhere'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'allinhere'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'allinhere'
			),
			'return_to_dashboard'             => __( 'Return to the Dashboard', 'allinhere' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'allinhere' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'allinhere' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'allinhere' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_update'             => __( 'Plugin %1$s needs to be updated. Please update the plugin.', 'allinhere' ),
			/* translators: 1: plugin name. * /
			'plugin_updated'                  => __( 'Plugin %1$s updated successfully.', 'allinhere' ),
			/* translators: 1: plugin name. * /
			'plugin_not_installed'            => __( 'Plugin %1$s not installed.', 'allinhere' ),
			/* translators: 1: plugin name. * /
			'plugin_inactive'                 => __( 'Plugin %1$s inactive.', 'allinhere' ),
			/* translators: 1: plugin name. * /
			'plugin_active'                   => __( 'Plugin %1$s active.', 'allinhere' ),
			'install_successful'              => __( 'The following plugin was installed successfully:', 'allinhere' ),
			'update_successful'               => __( 'The following plugin was updated successfully:', 'allinhere' ),
			'plugin_could_not_be_activated'   => __( 'Sorry, but the plugin could not be activated.', 'allinhere' ),
			'actions'                         => __( 'Actions', 'allinhere' ),
			'button_install'                  => __( 'Install %s', 'allinhere' ),
			'button_update'                   => __( 'Update %s', 'allinhere' ),
			'button_activate'                 => __( 'Activate %s', 'allinhere' ),
			'button_deactivate'               => __( 'Deactivate %s', 'allinhere' ),
		),
		*/ // This is the CORRECT closing for the 'strings' array comment block.
	);

	tgmpa( $plugins, $config );
}

?>
