<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Quotelist
 * @subpackage Quotelist/shared
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Quotelist
 * @subpackage Quotelist/shared
 * @author     James Kemp <me@jckemp.com>
 */
class Quotelist_Shared {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $quotelist    The ID of this plugin.
	 */
	private $quotelist;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $quotelist       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $quotelist, $version ) {

		$this->plugin_name = $quotelist;
		$this->version = $version;

	}

	/**
	 * Register post types.
	 *
	 * @since 1.0.0
	 */
    public function register_post_types() {

        Quotelist_Post_Types::add(array(
            'plural' => apply_filters( 'quotelist_products_plural_label', __('Products', 'quotelist') ),
            'singular' => apply_filters( 'quotelist_products_singular_label', __('Product', 'quotelist') ),
            'key' => __('quotelist_catalog', 'quotelist'),
            'rewrite_slug' => apply_filters( 'quotelist_products_rewrite_slug', __('catalog', 'quotelist') )
        ));

        Quotelist_Post_Types::add(array(
            'plural' => apply_filters( 'quotelist_quotes_plural_label', __('Quotes', 'quotelist') ),
            'singular' => apply_filters( 'quotelist_quotes_plural_label', __('Quote', 'quotelist') ),
            'key' => __('quotelist_quote', 'quotelist'),
            'public' => false,
            'has_archive' => false
        ));

    }

}
