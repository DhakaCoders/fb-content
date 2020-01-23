<?php 
defined( 'ABSPATH' ) || exit;

// change a number of the breadcrumb defaults.
add_filter( 'woocommerce_breadcrumb_defaults', 'cbv_woocommerce_breadcrumbs' );
if( !function_exists('cbv_woocommerce_breadcrumbs')):
function cbv_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<div class="breadcrumbs"><ul>',
            'wrap_after'  => '</ul></div>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'home', 'breadcrumb', 'woocommerce' ),
        );
}
endif;

function woocommerce_disable_shop_page() {
    global $post;
    if (is_shop() OR is_cart() OR is_checkout() OR is_account_page()):
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    endif;
}
add_action( 'wp', 'woocommerce_disable_shop_page' );