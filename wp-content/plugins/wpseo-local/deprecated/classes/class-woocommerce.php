<?php
/**
 * Yoast SEO: Local plugin file.
 *
 * @package WPSEO_Local
 */

use Automattic\WooCommerce\Utilities\FeaturesUtil;

/**
 * Class: WPSEO_Local_WooCommerce.
 *
 * @deprecated 15.4
 * @codeCoverageIgnore
 */
class WPSEO_Local_WooCommerce {

	/**
	 * Minimum supported WooCommerce version.
	 *
	 * @var string
	 */
	private $min_woocommerce_version = '2.6';

	/**
	 * Constructor.
	 *
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function __construct() {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
	}

	/**
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function woocommerce_locate_template( $template, $template_name, $template_path ) {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
		global $woocommerce;

		$_template = $template;

		if ( ! $template_path ) {
			$template_path = $woocommerce->template_url;
		}

		// Look within passed path within the theme - this is priority.
		$template = locate_template(
			[
				$template_path . $template_name,
				$template_name,
			]
		);

		// Get the template from this plugin, if it exists.
		$plugin_path = WPSEO_LOCAL_PATH . 'woocommerce/templates/';
		if ( ! $template && file_exists( $plugin_path . $template_name ) ) {
			$template = $plugin_path . $template_name;
		}

		// Use default template.
		if ( ! $template ) {
			$template = $_template;
		}

		// Return what we found.
		return $template;
	}

	/**
	 *
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function alter_shipping_method_description( $method_description, $instance ) {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
		if (
			is_a( $instance, 'WC_Shipping_Local_Pickup' )
			|| is_a( $instance, 'WC_Shipping_Legacy_Local_Pickup' )
			|| is_a( $instance, 'WC_Shipping_Legacy_Local_Delivery' )
		) {
			/* translators: %s expands to "Yoast SEO: Local SEO for WooCommerce". */
			$method_description .= sprintf( __( '%s disabled this shipping method. To configure local pickup, go to the Local Store Pickup settings.', 'yoast-local-seo' ), 'Yoast SEO: Local SEO for WooCommerce' );
		}

		return $method_description;
	}

	/**
	 *
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function shipping_zone_shipping_methods( $methods ) {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
		$local_pickup_found = false;

		if ( is_array( $methods ) && ( ! empty( $methods ) ) ) {
			foreach ( $methods as $index => $method ) {

				// Woo's Local Pickup has been found, issue a warning for the user.
				if ( is_a( $method, 'WC_Shipping_Local_Pickup' ) ) {
					$local_pickup_found = true;
					/* translators: %s expands to "Yoast SEO: Local SEO for WooCommerce". */
					$method->method_description .= sprintf( __( '%s disabled this shipping method. To configure local pickup, go to the Local Store Pickup settings.', 'yoast-local-seo' ), 'Yoast SEO: Local SEO for WooCommerce' );
					$method->enabled             = 'no';

					$methods[ $index ] = $method;
				}
			}
		}

		// Woo'c local pickup has not been found,... so deactivate it before someone decides to use it.
		if ( ! $local_pickup_found ) {
			add_filter( 'woocommerce_shipping_methods', [ $this, 'hide_woos_local_pickup' ], 10, 1 );
		}

		return $methods;
	}

	/**
	 *
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function hide_woos_local_pickup( $available_methods ) {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
		unset( $available_methods['local_pickup'] );

		return $available_methods;
	}

	/**
	 * @return void
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function flush_transient_cache_for_shipping_methods() {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
		global $wpdb;
		$wpdb->query( 'DELETE FROM ' . $wpdb->prefix . "options WHERE option_name LIKE '_transient_wc_ship%'" );

		delete_option( 'wordpress-seo-local-deactivated' );
	}

	/**
	 * Load the plugin text domain.
	 *
	 * @return void
	 *
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function load_textdomain_local_seo_woocommerce() {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
		load_plugin_textdomain( 'yoast-local-seo', false, dirname( plugin_basename( WPSEO_LOCAL_FILE ) ) . '/languages' );
	}

	/**
	 * Initialize the WooCommerce specific classes.
	 *
	 * @return void
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function init_local_seo_woocommerce() {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
		// Check if WooCommerce is active.
		$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
		if ( in_array( 'woocommerce/woocommerce.php', $active_plugins, true ) ) {

			$version = $this->get_woocommerce_version_number();

			if ( version_compare( $version, $this->min_woocommerce_version, '>=' ) ) {
				/*
				 * We have the right WooCommerce version, go gadget go...
				 * @todo: We can do better than all these 'requires' <= +1 from JRF.
				 * @todo: Refactor this to auto loading.
				 */
				require_once WPSEO_LOCAL_PATH . 'woocommerce/includes/class-wc-post-types.php';
				$wpseo_local_woocommerce_post_types = new Yoast_WCSEO_Local_Post_Types();
				$wpseo_local_woocommerce_post_types->init();

				require_once WPSEO_LOCAL_PATH . 'woocommerce/emails/class-wc-emails.php';
				require_once WPSEO_LOCAL_PATH . 'woocommerce/includes/wpseo-local-woocommerce-functions.php';

				require_once WPSEO_LOCAL_PATH . 'woocommerce/admin/class-woocommerce-settings.php';
				new WPSEO_Local_Admin_Woocommerce_Settings();
			}
			else {
				// User has an old WooCommerce version.
				add_action( 'all_admin_notices', [ $this, 'error_outdated_woocommerce' ] );
			}
		}
	}

	/**
	 * Declares compatibility with the WooCommerce HPOS feature.
	 *
	 * @return void
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function declare_custom_order_tables_compatibility() {
		if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			FeaturesUtil::declare_compatibility( 'custom_order_tables', WPSEO_LOCAL_FILE, true );
		}
	}

	/**
	 * Retrieves the version number of the active WooCommerce plugin.
	 *
	 * @return string|null The version number or null if it couldn't be determined.
	 */
	private function get_woocommerce_version_number() {

		// If get_plugins() isn't available, require it.
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		// Create the plugins folder and file variables.
		$plugin_folder = get_plugins( '/woocommerce' );
		$plugin_file   = 'woocommerce.php';

		// If the plugin version number is set, return it.
		if ( isset( $plugin_folder[ $plugin_file ]['Version'] ) ) {
			return $plugin_folder[ $plugin_file ]['Version'];
		}
		else {
			// Otherwise return null.
			return null;
		}
	}

	/**
	 * Throw an error if WooCommerce is out of date.
	 *
	 * @return void
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function error_outdated_woocommerce() {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
	}
}
