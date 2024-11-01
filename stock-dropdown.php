<?php

/**
 * Plugin Name: Stock Dropdown for WooCommerce
 * Plugin URI: https://codecanyon.net/user/wpshowcase/portfolio?ref=WPShowCase
 * Description: Changes the quantity field on the product page to a dropdown where the maximum value is the number of items that are in stock. Simply activate this plugin to see it working.
 * Author: WPShowCase
 * Version: 1.0
 * Author URI: http://www.codecanyon.net/user/WPShowCase?ref=WPShowCase
 * WC tested up to: 3.3.2
 */
class Stock_Dropdown {

    /**
     * Adds filter
     */
    function __construct() {
        add_filter( 'wc_get_template', array( $this, 'wc_get_template' ), 10, 2 );
    }

    /**
     * Overrides theme template
     */
    function wc_get_template( $located, $template_name ) {
        if ( $template_name == 'global/quantity-input.php' ) {
            global $post;
            $manage_stock = get_post_meta( $post->ID, '_manage_stock', true );
            if ( $manage_stock == 'yes' ) {
                return dirname( __FILE__ ) . '/quantity-input.php';
            }
        }
        return $located;
    }

}

$stock_dropdown = new Stock_Dropdown();
