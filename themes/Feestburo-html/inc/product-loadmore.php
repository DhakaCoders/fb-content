

<?php
/*
 * initial posts dispaly
 */

function product_script_load_more($args = array()) {
  echo '<ul class="ulc clearfix" id="ajax-content">';
      ajax_product_script_load_more($args);
  echo '</ul>';
 
  echo '<div class="nba-mlb-grid-btm-lnc">
  <div class="ajaxloading" id="ajxaloader" style="display:none"><img src="'.THEME_URI.'/assets/images/loading.gif" alt="loader"></div>
   <div class="po-more-btn"><a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" >meer laden</a></div>';
   echo '</div>';

}
/*
 * create short code.
 */
add_shortcode('ajax_product_posts', 'product_script_load_more');


/*
 * load more script call back
 */
function ajax_product_script_load_more($args, $termID = '') {
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }
    //number of posts per page default
    $num =1;
    //page number
    $paged = 1;
    if(isset($_POST['catid']) && !empty($_POST['catid'])){
        $termID = $_POST['catid'];
    }
    
    if(isset($_POST['page']) && !empty($_POST['page'])){
        $paged = $_POST['page'] + $paged;
    }
     if(!empty($termID)){
        $query = new WP_Query(array( 
            'post_type'=> 'product',
            'post_status' => 'publish',
            'posts_per_page' =>$num,
            'paged'=>$paged,
            'orderby' => 'date',
            'order'=> 'DESC',
            'tax_query' => array(
              array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $termID
              )
            ),
          ) 
        );
     }else{
       $query = new WP_Query(array( 
            'post_type'=> 'product',
            'post_status' => 'publish',
            'posts_per_page' =>$num,
            'paged'=>$paged,
            'orderby' => 'date',
            'order'=> 'DESC'
          ) 
        );
     }

    if($query->have_posts()):

    while($query->have_posts()): $query->the_post();
     $relexcerpt = get_field('product_excerpt', get_the_ID()); 
        ?>
        <li>
          <div class="subcat-meubilair-grd">
            <span>Populair</span>
            <div class="subcat-meubilair-grd-bg-wrp">
             <?php echo wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'dfpageg1' ); ?>
              <a href="<?php the_permalink();?>" class="overlay-link"></a>
            </div>
            <div class="subcat-meubilair-grd-des subcatGrd-matchCol">
              <h6><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h6>
              <?php echo wpautop( cbv_excerpt(), true ); ?>
              <a href="<?php the_permalink();?>">meer info</a>
            </div>
          </div>
        </li>
        <?php
    endwhile; 
    endif;  
    
    wp_reset_postdata();
    //check ajax call
    if($ajax) wp_die();
}

/*
 * load more script ajax hooks
 */
add_action('wp_ajax_nopriv_ajax_product_script_load_more', 'ajax_product_script_load_more');
add_action('wp_ajax_ajax_product_script_load_more', 'ajax_product_script_load_more');