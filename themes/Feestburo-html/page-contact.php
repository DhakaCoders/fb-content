<?php 
/*
  Template Name: Contact
*/
get_header(); 


  $spacialArry = array(".", "/", "+", " ");$replaceArray = '';
  $adres = get_field('address', 'options');
  $gmapsurl = get_field('google_maps', 'options');
  $e_mailadres = get_field('emailaddress', 'options');
  $show_telefoon = get_field('telephone', 'options');
  $telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));
  $gmaplink = !empty($gmapsurl)?$gmapsurl: 'javascript:void()';

  $titel = get_field('titel');
  $beschrijving = get_field('beschrijving');
  $afbeelding = get_field('afbeelding');
  $google_map = get_field('google_maps');

  if(!empty($afbeelding)){
    $contimg = cbv_get_image_src($afbeelding, 'ref_grid');
  }else{
    $contimg = '';
  }
?>
<section class="page-banner">
  <a class="main-bnr-rgt-btn" href="#">Offerte aanvragen</a>
  <div class="page-banner-con">
    <div class="page-banner-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/page-banner-bg.jpg);"></div>
    <div class="page-banner-des">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-banner-des-innr">
              <strong class="banner-page-title">Contact</strong>
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


<section class="google-map-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="Contact-info-wrp">
          <div class="Contact-info-inr clearfix">
            <div class="Contact-info-img" style="background: url(<?php echo $contimg; ?>)">
            </div>
            <div class="Contact-info-dsc">
              <?php if( !empty( $adres ) ) printf('<h1><strong>Feest</strong>Buro</h1><p>%s</p>', $adres)  ?>
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

<section class="contact-form-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="contact-form-wrp clearfix">
          <div class="contac-form-dsc">
            <?php 
              if( !empty( $titel ) ) printf( '<h2>%s</h2>', $titel); 
              if( !empty( $beschrijving ) ) echo wpautop($beschrijving); 
            ?>
          </div>
          <div class="contact-form">
            <?php echo do_shortcode('[wpforms id="192"]'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="contact-form-offer-btn-wrp">
          <div class="contact-form-offer-btn clearfix">
            <p>Wenst u meteen een offerte aan te vragen?</p>
            <a href="#">Offerte aanvragen</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of contact-form-sec-wrp -->


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