<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header(); 
$cproposal = get_field('custom_proposal', 'options');

$thisID = get_the_ID();

$ccat = get_queried_object();

$cats_root = get_term($ccat->parent, 'product_cat');

if( !empty($cats_root->parent) ){
	$cats_root2 = get_term($cats_root->parent, 'product_cat');
}
$cat_details = $cats_root;
if( !empty($cats_root2) && $cats_root2){
	$cat_details = $cats_root2;
}

?>
<section class="page-banner page-banner-small">
  <div class="page-banner-con">
  <?php 
  if($cproposal && !empty($cproposal)):  
    $link = $cproposal['knop'];
    if( is_array( $link ) &&  !empty( $link['url'] ) ){
     printf('<a class="main-bnr-rgt-btn" href="%s" target="%s"><span>%s</span></a>', $link['url'], $link['target'], $link['title']);
    }
  endif;
  ?>
    <div class="page-banner-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/page-banner-bg-small.jpg);"></div>
    <div class="page-banner-des">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-banner-des-innr">
              <?php woocommerce_breadcrumb(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="product-overview-grd-sec product-overview-grd-sec-new">
  <div class="container">
    <div class="row">
      <?php
      	$termid = !empty($cat_details->term_id)? $cat_details->term_id: $ccat->term_id; 
      	$termname = !empty($cat_details->name)? $cat_details->name: $ccat->name; 
      	$termdesc = !empty($cat_details->description)? $cat_details->description: $ccat->description; 
        $pcat_thumb = ''; 
		$thumbnail_id = get_term_meta ( $termid, 'thumbnail_id', true ); 
		if( !empty($thumbnail_id) ) $pcat_thumb = cbv_get_image_tag( $thumbnail_id );
      ?>
      <div class="col-sm-12">
        <div class="product-overview-grd-sec-hdr">
          <span class="product-entry-hdr-top-icon">
            <?php echo $pcat_thumb; ?>
          </span>
			<?php
			  if( !empty($termname ) ) printf( '<h1>%s</h1>', $termname );
			  if( !empty($termdesc) ) echo wpautop( $termdesc ); 
			?>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="fb-proover-categories">
            <?php 
              $args = array(
              'parent'                 => $termid,
              'orderby'                  => 'name',
              'order'                    => 'ASC',
              'hide_empty'               => FALSE,
              'taxonomy'                 => 'product_cat',
              ); 
              $child_categories = get_categories($args );
              $child3_id = 0;
              echo '<ul class="class ulc clearfix">';
              foreach($child_categories as $child){
              	$activeClass = '';
              	if( $ccat->slug == $child->slug OR (!empty($cats_root->slug) && ($cats_root->slug == $child->slug ))){
              		$activeClass = 'fb-proover-cat-active';
              		$child3_id = $child->term_id;
              	}
                echo "<li class='".$activeClass."'><a href='".get_term_link( $child )."'>{$child->name}</a></li>";
              }
              echo '</ul>';
              
            ?>
        </div>
        <?php 
        if(isset($child3_id) && $child3_id > 0):
		$args = array(
		'parent'                   => $child3_id,
		'orderby'                  => 'name',
		'order'                    => 'ASC',
		'hide_empty'               => FALSE,
		'taxonomy'                 => 'product_cat',
		); 
		$child3_categories = get_categories($args );
        if(!empty((array)$child3_categories) && $child3_categories): 
        	$activeClass2 = '';
        	if( $ccat->term_id == $child3_id ){
          		$activeClass2 = 'fb-proover-sub-cat-active';
          	}
        ?>
        <div class="fb-proover-sub-categories">
          <ul class="clearfix ulc">
            <li class="<?php echo $activeClass2; ?>"><a href="<?php echo get_term_link( $child3_id ); ?>">Alles</a></li>
            <?php 
            	$activeClass3 = '';
				foreach($child3_categories as $child3){
		          	$activeClass3 = '';
		          	if( $ccat->slug == $child3->slug ){
		          		$activeClass3 = 'fb-proover-sub-cat-active';
		          	}
		            echo "<li class='".$activeClass3."'><a href='".get_term_link( $child3 )."'>{$child3->name}</a></li>";
	            }
            ?>
          </ul>
        </div>
    	<?php endif; endif; ?>
      </div>
    </div>
  </div>

  <span style="display: none;" id="catSlug" data-slug="<?php echo $ccat->slug; ?>"></span>
  <?php if( isset($_GET['keyword']) && !empty($_GET['keyword'])): ?>
  <span id="keyWord" data-keyword="<?php echo $_GET['keyword']; ?>"></span>
  <?php endif; ?>
  <div class="product-overview-grds-wrap">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="product-overview-page-search product-overview-page-search-new">
            <div class="clearfix">
              <form action="" method="get">
                <input type="search" name="keyword" placeholder="Zoek hier" value="<?php echo ( isset($_GET['keyword']) && !empty($_GET['keyword']))? $_GET['keyword']: ''; ?>">
                <button type="submit">
                  <img src="<?php echo THEME_URI; ?>/assets/images/search-white-icon.svg">
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="product-overview-grds-controller">
            <?php
             echo do_shortcode('[ajax_product_posts]'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_template_part( 'templates/footer', 'newsletter' );

get_footer(); 
?>