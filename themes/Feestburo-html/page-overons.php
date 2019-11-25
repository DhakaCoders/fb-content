<?php
/*
  Template Name: Overons
*/
get_header(); 

$thisID = get_the_ID();
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
              <strong class="banner-page-title">Over Ons</strong>
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


<section class="hm-service-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-service-wrp clearfix">
          <ul id="HmServiceSlider">
            <li>
              <div class="hm-service-dsc">
                <i><img src="<?php echo THEME_URI; ?>/assets/images/hm-service-map.svg"></i>
                <h5>Centrale ligging</h5>
                <p>Quisque euismod nulla a tortor mattis, in laoreet ex luctus magna commodo.</p>
              </div>
            </li>
            <li>
              <div class="hm-service-dsc">
                <i><img src="<?php echo THEME_URI; ?>/assets/images/hm-service-man.svg"></i>
                <h5>Makkelijk aanspreekpunt</h5>
                <p>Quisque euismod nulla a tortor mattis, in laoreet ex luctus magna commodo.</p>
              </div>
            </li>
            <li>
              <div class="hm-service-dsc">
                <i><img src="<?php echo THEME_URI; ?>/assets/images/hm-service-medal-icon.svg"></i>
                <h5>Uniek en evoluerend aanbod</h5>
                <p>Quisque euismod nulla a tortor mattis, in laoreet ex luctus magna commodo.</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of hm-service-sec-wrp -->

<?php 
$intro = get_field('introsec', $thisID);
$showhide_intro = get_field('showhide_intro', $thisID);
if($showhide_intro){ 
  $introreps = $intro['introrepeat'];
?>
<section class="over-ons-feest-buro-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="over-ons-feest-buro-innr clearfix">
          <?php if($introreps): ?>
          <ul class="ulc">
            <?php 
            foreach($introreps as $intrep):
              if(!empty($intrep['afbeelding'])){
                $introposter = cbv_get_image_src($intrep['afbeelding'], 'introgird');
              }else{
                $introposter = '';
              } 

              if(!empty($intrep['logoafbeelding'])){
                $intropostertag = cbv_get_image_tag($intrep['logoafbeelding'], 'introgird');
              }else{
                $intropostertag = '';
              } 
            ?>
            <li class="clearfix">
              <div class="over-ons-feest-buro-lft">
                <div class="over-ons-feest-buro-lft-bg" style="background:url(<?php echo $introposter; ?>);"></div>
                <i>
                  <?php echo $intropostertag; ?>
                </i>
              </div>
              <div class="over-ons-feest-buro-rgt">
                <?php 
                  if( !empty( $intrep['titel'] ) ) printf( '<h3>%s</h3>', $intrep['titel']); 
                  if( !empty( $intrep['beschrijving'] ) ) echo wpautop( $intrep['beschrijving'], true );; 
                  

                  $knop1 = $intrep['knop_1'];
                  $knop2 = $intrep['knop_2'];

                  if( is_array( $knop1 ) &&  !empty( $knop1['url'] ) ){
                    printf('<a href="%s" target="%s">%s</a>', $knop1['url'], $knop1['target'], $knop1['title']); 
                  }
                  if( is_array( $knop2 ) &&  !empty( $knop2['url'] ) ){
                    printf('<a href="%s" target="%s">%s</a>', $knop2['url'], $knop2['target'], $knop2['title']); 
                  }
                ?>      
              </div>              
            </li>
          <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } 

$hoe_werken = get_field('hoe_werkensec', $thisID);
$showhide_werken = get_field('showhide_werkensec', $thisID);
if($showhide_werken){ 
  $werkenrepeats = $hoe_werken['hoe_werkenrepeat'];
?>
<section class="overOns-howWeWork-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="overOns-howWeWork-innr">
          <div class="overOns-howWeWork-head">
            <?php 
              if( !empty( $hoe_werken['titel'] ) ) printf( '<h1>%s</h1>', $hoe_werken['titel']); 
              if( !empty( $hoe_werken['beschrijving'] ) ) echo wpautop( $hoe_werken['beschrijving'], true );
            ?>
          </div>
          <div class="overOns-howWeWork-bloc-wrp">
            <?php if($werkenrepeats): ?>
            <ul class="ulc clearfix">
              <?php $i = 1; foreach($werkenrepeats as $werkenrepeat): ?>
              <li>
                <div class="overOns-howWeWork-bloc">
                  <div class="overOns-howWeWork-no">
                    <span><?php echo $i; ?>.</span>
                  </div>
                  <div class="overOns-howWeWork-bloc-head">
                  <?php if( !empty( $hoe_werken['titel'] ) ) printf( '<h4>%s</h4>', $hoe_werken['titel']); ?> 
                  </div>
                  <div class="overOns-howWeWork-bloc-pera">
                  <?php if( !empty( $werkenrepeat['beschrijving'] ) ) echo wpautop( $werkenrepeat['beschrijving'], true );?>
                  </div>                     
                </div>
              </li>
              <?php $i++; endforeach; ?>
            </ul>  
            <?php endif; ?>        
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php } ?>


<section class="hm-gallery-post-sec-wrp overOns-gallery-post-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-enti-hdr-dsc">
          <h2><strong>Onze</strong> Cases</h2>
          <p>Suspendisse sem dui, blandit eget est ac, ullamcorper pellentesque dolor. Etiam blandit sit amet arcu id egestas. Mauris eleifend nunc in nibh consequat tincidunt. Duis tristique ante vitae ex cursus, in interdum arcu feugiat.</p>
          <a href="#">Catalogus</a>
        </div>
        <div class="hm-gallery-item-top-wrp clearfix">
          <div class="hm-gallery-item-top-lft">
            <div class="HmGalleryItem">
              <span class="leftArrow"></span>
              <span class="rightArrow"></span>
            </div>
            <ul id="HmGalleryItemTopLft">
              <li>
                <div class="hm-gallery-top-lft-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="hm-gallery-top-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-tp-gallery-small-img-1.png);">
                  </div>
                  <a href="#" class="hm-gallery-small-btn">Lorem ipsum</a>
                </div>
              </li>
              <li>
                <div class="hm-gallery-top-lft-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="hm-gallery-top-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-tp-gallery-small-img-2.png);">
                  </div>
                   <a href="#" class="hm-gallery-small-btn">Lorem ipsum</a>
                </div>
              </li>
              <li>
                <div class="hm-gallery-top-lft-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="hm-gallery-top-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-tp-gallery-small-img-3.png);">
                  </div>
                   <a href="#" class="hm-gallery-small-btn">Lorem ipsum</a>
                </div>
              </li>
              <li>
                <div class="hm-gallery-top-lft-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="hm-gallery-top-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-tp-gallery-small-img-4.png);">
                  </div>
                   <a href="#" class="hm-gallery-small-btn">Lorem ipsum</a>
                </div>
              </li>
              <li>
                <div class="hm-gallery-top-lft-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="hm-gallery-top-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-tp-gallery-small-img-5.png);">
                  </div>
                   <a href="#" class="hm-gallery-small-btn">Lorem ipsum</a>
                </div>
              </li>
              <li>
                <div class="hm-gallery-top-lft-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="hm-gallery-top-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-tp-gallery-small-img-6.png);">
                  </div>
                  <a href="#" class="hm-gallery-small-btn">Lorem ipsum</a>
                </div>
              </li>
            </ul>
          </div>
          <div class="hm-gallery-item-top-rgt hide-xs">
            <div class="hm-gallery-rgt-overflow">
              <a href="#" class="overlay-link"></a>
              <div class="hm-gallery-tp-rgt-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-gallery-tp-rgt-img.png);">
              </div>
              <a href="#" class="hm-gallery-big-btn">Lorem ipsum</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of hm-gallery-post-sec-wrp -->


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