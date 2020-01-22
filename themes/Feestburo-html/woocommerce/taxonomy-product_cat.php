<?php
get_header(); 

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
    <a class="main-bnr-rgt-btn" href="#">Offerte aanvragen</a>
    <div class="page-banner-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/page-banner-bg-small.jpg);"></div>
    <div class="page-banner-des">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-banner-des-innr">
              <div class="breadcrumbs">
                <ul>           
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Binnenpagina</a></li>
                  <li><a href="#">Binnenpagina</a></li>
                </ul>
              </div>
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
        $pcat_thumb = ''; 
		$thumbnail_id = get_term_meta ( $cat_details->term_id, 'thumbnail_id', true ); 
		if( !empty($thumbnail_id) ) $pcat_thumb = cbv_get_image_tag( $thumbnail_id );
      ?>
      <div class="col-sm-12">
        <div class="product-overview-grd-sec-hdr">
          <span class="product-entry-hdr-top-icon">
            <?php echo $pcat_thumb; ?>
          </span>
			<?php
			  if( !empty($cat_details->name) ) printf('<h1>%s</h1>', $cat_details->name);
			  if( !empty($cat_details->description) ) echo wpautop( $cat_details->description ); 
			?>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="fb-proover-categories">
            <?php 
              $args = array(
              'parent'                 => $cat_details->term_id,
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
              	if( $ccat->slug == $child->slug OR $cats_root->slug == $child->slug){
              		$activeClass = 'fb-proover-cat-active';
              		$child3_id = $child->term_id;
              	}
                echo "<li class='".$activeClass."'><a href='".get_term_link( $child )."'>{$child->name}</a></li>";
              }
              echo '</ul>';
              if($ccat->slug){

              }
              $args = array(
              'parent'                   => $child3_id,
              'orderby'                  => 'name',
              'order'                    => 'ASC',
              'hide_empty'               => FALSE,
              'taxonomy'                 => 'product_cat',
              ); 
              $child3_categories = get_categories($args );

            ?>
        </div>
        <?php 
        if(!empty($child3_categories) && $child3_categories): 
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
    	<?php endif; ?>
      </div>
    </div>
  </div>
  <?php ?>
  <span style="display: none;" id="catSlug" data-slug="<?php echo $ccat->slug; ?>"></span>
  <div class="product-overview-grds-wrap">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="product-overview-page-search product-overview-page-search-new">
            <div class="clearfix">
              <form>
                <input type="search" name="" placeholder="Zoek hier">
                <button>
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


<section class="ftr-top-newsletter-con"> 
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ftr-top-newsletter-innr-wrp">
          <div class="ftr-top-newsletter-innr"> 
            <div class="ftr-top-newsletter-head">
              <h3>nieuwsbrief</h3>
              <p>Blijf op de hoogte van ons evoluerend assortiment. Je ontvangt 3 keer per jaar onze nieuwsbrief.</p>              
            </div>
            <div class="ftr-top-newsletter"> 
              <form action="">
                <div class="from-group-wrp clearfix"> 
                  <div class="from-group">
                    <input placeholder="Namm" type="text">
                  </div>
                  <div class="from-group">
                    <input placeholder="E-mailadres" type="email"> 
                  </div>
                  <div class="from-group">
                    <button>Inschrijven</button> 
                  </div>
                </div>
              </form>
            </div>
          </div>            
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>