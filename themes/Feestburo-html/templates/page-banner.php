<?php
$thisID = get_the_ID();
$pageTitle = get_the_title($thisID);
$standaardbanner = get_field('bannerafbeelding', $thisID);
if( empty($standaardbanner) ) $standaardbanner = THEME_URI.'/assets/images/page-banner-bg.jpg';
/*$custom_page_title = get_field('custom_page_titel', $thisID);
if(!empty(str_replace(' ', '', $custom_page_title))){
  $pageTitle = $custom_page_title;
}*/
?>
<section class="page-banner">
  <div class="page-banner-con">
    <div class="page-banner-bg" style="background-image: url(<?php echo $standaardbanner; ?>);"></div>
    <div class="page-banner-des">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-banner-des-innr">
              <?php 
               if( is_product() OR is_shop() ) {
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