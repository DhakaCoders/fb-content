<?php
/*
 * initial posts dispaly
 */

function product_script_load_more($args = array()) {
  $keyword = '';
  $ccat = get_queried_object();
  if( isset($_GET['keyword']) && !empty($_GET['keyword'])) $keyword = $_GET['keyword'];
       if(!empty($ccat->slug) && empty($keyword)){
        $query = new WP_Query(array( 'post_type'=> 'product','post_status' => 'publish','tax_query' =>array(array('taxonomy' => 'product_cat','field' => 'slug','terms' => $ccat->slug))));
     }elseif(!empty($ccat->slug) && !empty($keyword)){
        $query = new WP_Query(array( 'post_type'=> 'product','post_status' => 'publish','s' => $keyword,'tax_query' => array(array('taxonomy' => 'product_cat','field' => 'slug','terms' => $ccat->slug))));
     }else{
       $query = new WP_Query(array( 'post_type'=> 'product','post_status' => 'publish',) );
     }
  if($query->have_posts()):
  echo '<ul class="ulc clearfix" id="ajax-content">';
      ajax_product_script_load_more($args, $ccat->slug, $keyword);
  echo '</ul>';
 
  echo '<div class="nba-mlb-grid-btm-lnc">
  <div class="ajaxloading" id="ajxaloader" style="display:none"><img src="'.THEME_URI.'/assets/images/loading.gif" alt="loader"></div>
   <div class="po-more-btn"><a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" >meer laden</a></div>';
   echo '</div>';
  else:
echo '<div class="postnot-found">Geen resultaten!</div>';
  endif;

}
/*
 * create short code.
 */
add_shortcode('ajax_product_posts', 'product_script_load_more');


/*
 * load more script call back
 */
function ajax_product_script_load_more($args, $term_slug='', $keyword = '') {
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }
    //number of posts per page default
    $num =4;
    //page number
    $paged = 1;
    if(isset($_POST['cat_slug']) && !empty($_POST['cat_slug'])){
        $term_slug = $_POST['cat_slug'];
    }
    if(isset($_POST['key_word']) && !empty($_POST['key_word'])){
        $keyword = $_POST['key_word'];
    }
    if(isset($_POST['page']) && !empty($_POST['page'])){
        $paged = $_POST['page'] + $paged;
    }
     if(!empty($term_slug) && empty($keyword)){
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
                'field' => 'slug',
                'terms' => $term_slug
              )
            )
          ) 
        );
     }elseif(!empty($term_slug) && !empty($keyword)){
        $query = new WP_Query(array( 
            'post_type'=> 'product',
            'post_status' => 'publish',
            's' => $keyword,
            'posts_per_page' =>$num,
            'paged'=>$paged,
            'orderby' => 'date',
            'order'=> 'DESC',
            'tax_query' => array(
              array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $term_slug
              )
            )
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
    $pcount = $query->found_posts;
    if($query->have_posts()):
   
    while($query->have_posts()): $query->the_post(); 
        ?>
        <li>
          <div class="subcat-meubilair-grd">
            <span>Populair</span>
            <div class="subcat-meubilair-grd-bg-wrp">
             <?php echo wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'pgrid' ); ?>
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



/*
 * enqueue js script
 */
add_action( 'wp_enqueue_scripts', 'ajax_enqueue_script' );
/*
 * enqueue js script call back
 */
function ajax_enqueue_script() {
    wp_enqueue_script( 'script_ajax', get_theme_file_uri( '/assets/js/ajax-script.js' ), array( 'jquery' ), '1.0', true );
}