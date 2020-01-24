<?php 
defined( 'ABSPATH' ) || exit;

/*Remove Archive Woocommerce Hooks & Filters are below*/

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
function woo_hide_page_title() {
    
    return false;
    
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );


/**
 * Add wc custom content wrapper
 */
add_action('woocommerce_before_main_content', 'get_custom_wc_output_content_wrapper', 10);
add_action('woocommerce_after_main_content', 'get_custom_wc_output_content_wrapper_end', 10, 1);

function get_custom_wc_output_content_wrapper(){

    if(is_shop() OR is_product_category()){ $customClass = ' product-cat-sec'; $controlClass = ' product-overview-grds-controller';}elseif(is_product()){$customClass = ' product-des-sec';$controlClass = ' product-overview-grds-controller'; }else{ $customClass = ''; $controlClass = '';}
    echo '<section class="product-overview-grd-sec'.$customClass.'"><div class="product-overview-grds-wrap"><div class="container"><div class="row"><div class="col-sm-12"><div class="main-content-wrp'.$controlClass.' clearfix">';

}

function get_custom_wc_output_content_wrapper_end(){
    echo '</div></div></div></div></div></section>';
}


/*Loop Hooks*/


/**
 * Add loop inner details are below
 */
 
 remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action('woocommerce_shop_loop_item_title', 'add_shorttext_below_title_loop', 5);
if (!function_exists('add_shorttext_below_title_loop')) {
    function add_shorttext_below_title_loop() {
        global $product, $woocommerce, $post;
        echo '<div class="subcat-meubilair-grd"><span>Populair</span>
        <div class="subcat-meubilair-grd-bg-wrp">';
        echo wp_get_attachment_image( get_post_thumbnail_id($product->get_id()), 'pgrid' );
        echo '<a href="'.get_permalink( $product->get_id() ).'" class="overlay-link"></a></div>';
        echo '<div class="subcat-meubilair-grd-des subcatGrd-matchCol">';
        echo '<h6><a href="'.get_permalink( $product->get_id() ).'">'.get_the_title().'</a></h6>';
        echo wpautop( cbv_excerpt(), true );
        echo '<a href="'.get_permalink( $product->get_id() ).'">meer info</a>';
        echo '</div></div>';
        
    }
}

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
    if (is_cart() OR is_checkout() OR is_account_page()):
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    endif;
}
add_action( 'wp', 'woocommerce_disable_shop_page' );