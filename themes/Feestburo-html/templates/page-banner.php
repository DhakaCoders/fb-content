<?php
$thisID = get_the_ID();
$pageTitle = get_the_title($thisID);
$standaardbanner = get_field('bannerafbeelding', $thisID);
if( empty($standaardbanner) ) $standaardbanner = THEME_URI.'/assets/images/page-banner-bg.jpg';
/*$custom_page_title = get_field('custom_page_titel', $thisID);
if(!empty(str_replace(' ', '', $custom_page_title))){
  $pageTitle = $custom_page_title;
}*/
 $cproposal = get_field('custom_proposal', 'options');
?>
<section class="page-banner">
  <?php 
  if($cproposal && !empty($cproposal)):  
    $link = $cproposal['knop'];
    if( is_array( $link ) &&  !empty( $link['url'] ) ){
     printf('<a class="main-bnr-rgt-btn" href="%s" target="%s"><span>%s</span></a>', $link['url'], $link['target'], $link['title']);
    }
 endif;
 ?>
  <div class="page-banner-con">
    <div class="page-banner-bg" style="background-image: url(<?php echo $standaardbanner; ?>);"></div>
    <div class="page-banner-des">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-banner-des-innr">
              <?php 
               if( is_product() ) {
                  echo '<strong class="banner-page-title">Producten</strong>';
                  woocommerce_breadcrumb();
                }elseif ( is_single() && 'referentie' == get_post_type() ) {
                   echo '<strong class="banner-page-title">Referenties</strong>';
                   woocommerce_breadcrumb();
                }else{
                  echo '<strong class="banner-page-title">'.$pageTitle.'</strong>';
                  cbv_breadcrumbs();
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>