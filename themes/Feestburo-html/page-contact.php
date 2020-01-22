<?php 
/*
  Template Name: Contact
*/
  get_header(); 
  $thisID = get_the_ID();
  get_template_part( 'templates/page', 'banner' );
?>

<?php 
  $spacialArry = array(".", "/", "+", " ");$replaceArray = '';
  $adres = get_field('address', 'options');
  $gmapsurl = get_field('google_maps', 'options');
  $e_mailadres = get_field('emailaddress', 'options');
  $show_telefoon = get_field('telephone', 'options');
  $telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));
  $gmaplink = !empty($gmapsurl)?$gmapsurl: 'javascript:void()';

  $gmap = get_field('google_maps', $thisID);
  $google_map = $gmap['maps'];

  if(!empty($gmap['afbeelding'])){
    $contimg = cbv_get_image_src($gmap['afbeelding'], 'gmimg');
  }else{
    $contimg = '';
  }
?>

<section class="google-map-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="Contact-info-wrp">
          <div class="Contact-info-inr clearfix">
            <div class="Contact-info-img" style="background: url(<?php echo $contimg; ?>)">
            </div>
            <div class="Contact-info-dsc">
              <?php 
                if( !empty( $gmap['titel'] ) ) printf('<h1>%s</h1>', $gmap['titel']); 
                if( !empty( $adres ) ) printf('<p>%s</p>', $adres); 
              ?>
              <?php if( !empty( $show_telefoon ) ): ?>
              <span>
                <i>
                  <svg class="contact-mobil-icon-svg" width="25" height="39" viewBox="0 0 25 39" fill="#000">
                    <use xlink:href="#contact-mobil-icon-svg"></use>
                  </svg> 
               </i>
               <?php printf('<a href="tel:%s">%s</a>', $telefoon, $show_telefoon );  ?>
              </span>
              <?php endif; if( !empty( $e_mailadres ) ): ?>
              <span>
                <i>
                <svg class="contact-mail-icon-svg" width="29" height="29" viewBox="0 0 29 29" fill="#000">
                    <use xlink:href="#contact-mail-icon-svg"></use>
                  </svg> 
                </i>
              
                <?php printf('<a href="mailto:%s">%s</a>', $e_mailadres, $e_mailadres );  ?>
             </span>
           <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div data-homeurl="<?php echo THEME_URI; ?>" id="googlemap" data-latitude="<?php echo $google_map['lat']; ?>" data-longitude="<?php echo $google_map['lng']; ?>"></div>
</section><!-- end of google-map-sec-wrp -->
<?php 
$contacteer = get_field('contacteer_ons', $thisID);
$cta = get_field('cta', $thisID);
?>
<section class="contact-form-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="contact-form-wrp clearfix">
          <div class="contac-form-dsc">
            <?php 
              if( !empty( $contacteer['titel'] ) ) printf( '<h2>%s</h2>', $contacteer['titel']); 
              if( !empty( $contacteer['beschrijving'] ) ) echo wpautop( $contacteer['beschrijving'] ); 
            ?>
          </div>
          <div class="contact-form">
          <?php 
          if( !empty( $contacteer['form_shortcode'] ) ) echo do_shortcode($contacteer['form_shortcode']); 
          ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="contact-form-offer-btn-wrp">
          <div class="contact-form-offer-btn clearfix">
          <?php 
            if( !empty( $cta['titel'] ) ) printf( '<p>%s</p>', $cta['titel']); 
            $knop = $cta['knop'];
            if( is_array( $knop ) &&  !empty( $knop['url'] ) ){
              printf('<a href="%s" target="%s">%s</a>', $knop['url'], $knop['target'], $knop['title']); 
            } 
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of contact-form-sec-wrp -->
<?php
get_template_part( 'templates/footer', 'newsletter' );

get_footer(); 
?>