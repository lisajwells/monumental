<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

function generatepress_child_enqueue_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'generatepress-rtl', trailingslashit( get_template_directory_uri() ) . 'rtl.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'generatepress_child_enqueue_scripts', 100 );

function wpb_add_google_fonts() {

wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Cabin:700', false );
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


// These are the places the mprm_menu_item_grid_price function with the price conditional is used
// found in /classes/class-hooks.php
// remove_action('mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_price', 75);
remove_action('mprm_page_template_menu_item_grid', 'mon_mprm_menu_item_grid_price', 75);
// remove_action('mprm_widget_menu_item_grid', 'mon_mprm_menu_item_grid_price', 80);
// add_action('mprm_shortcode_menu_item_grid', 'mon_mprm_menu_item_grid_price', 75);
add_action('mprm_page_template_menu_item_grid', 'mon_mprm_menu_item_grid_price', 60);
// add_action('mprm_widget_menu_item_grid', 'mon_mprm_menu_item_grid_price', 80);


/**
 * Menu item Grid price from restaurant-menu-functions.php
 */
// function mprm_menu_item_grid_price() {
//     global $mprm_view_args;
//     $post_options = mprm_get_menu_item_options();
//     if (!empty($post_options['product_price']) && !empty($mprm_view_args['price'])) {
//         mprm_get_template('common/price', array('price' => $post_options['product_price']));
//     }
// }

function mon_mprm_menu_item_grid_price() {
    global $mprm_view_args;
    $post_options = mprm_get_menu_item_options();
    // if (!empty($post_options['product_price']) && !empty($mprm_view_args['price'])) {
        mprm_get_template('common/price', array('price' => $post_options['product_price']));
    // }
}

