<?php
/**
 * Yoast SEO: Local for WooCommerce plugin file.
 *
 * @package YoastSEO_Local_WooCommerce
 */

/**
 * Class: Yoast_WCSEO_Local_Post_Types.
 *
 * @deprecated 15.4
 * @codeCoverageIgnore
 */
class Yoast_WCSEO_Local_Post_Types {

	/**
	 * Default arguments for the post statuses.
	 *
	 * @var array
	 */
	protected $default_post_status_args = [
		'label'                     => '',
		'public'                    => false,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => '',
	];

	/**
	 * @return void
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function init() {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
	}

	/**
	 * @return void
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function register_post_status() {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
		$post_status_args          = $this->default_post_status_args;
		$post_status_args['label'] = _x( 'Transporting', 'Order status', 'yoast-local-seo' );
		/* translators: %d translates to the number or orders in transport. */
		$post_status_args['label_count'] = _n_noop( 'Transporting <span class="count">(%d)</span>', 'Transporting <span class="count">(%d)</span>', 'yoast-local-seo' );
		register_post_status( 'wc-transporting', $post_status_args );

		$post_status_args          = $this->default_post_status_args;
		$post_status_args['label'] = _x( 'Ready for pickup', 'Order status', 'yoast-local-seo' );
		/* translators: %d translates to the number or orders ready for pickup. */
		$post_status_args['label_count'] = _n_noop( 'Ready for pickup <span class="count">(%d)</span>', 'Ready for pickup <span class="count">(%d)</span>', 'yoast-local-seo' );
		register_post_status( 'wc-ready-for-pickup', $post_status_args );
	}

	/**
	 * @deprecated 15.4
	 * @codeCoverageIgnore
	 */
	public function wc_append_post_statusus( $order_statuses ) {
		_deprecated_function( __METHOD__, 'Yoast Local SEO 15.4' );
		$new_order_statuses = [];

		// Add new order status after processing.
		foreach ( $order_statuses as $key => $status ) {

			$new_order_statuses[ $key ] = $status;

			if ( $key === 'wc-processing' ) {
				$new_order_statuses['wc-transporting']     = _x( 'Transporting', 'Order status', 'yoast-local-seo' );
				$new_order_statuses['wc-ready-for-pickup'] = _x( 'Ready for pickup', 'Order status', 'yoast-local-seo' );
			}
		}

		return $new_order_statuses;
	}
}
