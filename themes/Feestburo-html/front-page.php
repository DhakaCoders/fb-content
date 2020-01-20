<?php get_header(); 
  $hshowhide_slide = get_field('showhide_slider', HOMEID);
  $hslides = get_field('home_slider', HOMEID);
  if($hshowhide_slide){
?>
<section class="main-banner">
  <?php if($hslides){ ?>
  <div class="bannerSlider">
    <?php 
      foreach( $hslides as $hslide ): 
      $slideposter = !empty($hslide['afbeelding'])? $hslide['afbeelding']: '';
    ?>
    <div class="bannerSliderItem">
      <div class="main-bnr-bg" style="background: url(<?php echo $slideposter; ?>);"></div>
      <div class="main-bnr-des-controller">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="main-bnr-des">
                <?php 
                  if( !empty($hslide['titel']) ) printf('<span>%s</span>', $hslide['titel']);
                  if( !empty($hslide['subtitel']) ) printf('<p>%s</p>', $hslide['subtitel']);
                  $knop = $hslide['knop'];
                  if( is_array( $knop ) &&  !empty( $knop['url'] ) ){
                      printf('<a href="%s" target="%s">%s</a>', $knop['url'], $knop['target'], $knop['title']); 
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>    
    </div> 
    <?php endforeach; ?>
  </div>  
  <?php } ?>    
</section>
<?php } 
  $hshowhide_diensten = get_field('showhide_diensten', HOMEID);
  $hdienstens = get_field('home_diensten', HOMEID);
  if($hshowhide_diensten){
?>
<section class="hm-catagorys-sec-wrp">
  <?php if($hdienstens){ ?>
  <div class="hm-catagory-wrp">
    <ul>
    <?php 
      foreach( $hdienstens as $hdiensten ): 
      $hdienposter = !empty($hdiensten['afbeelding'])? $hdiensten['afbeelding']: '';
    ?>
      <li>
        <div class="hm-catagory-innr clearfix">
          <a href="#" class="overlay-link"></a>
          <div class="hm-catagory-img-controller">
            <div class="hm-catagory-img" style="background: url(<?php echo $hdienposter; ?>);"></div>
          </div>
          <div class="hm-catagory-dsc">
            <?php if( !empty($hdiensten['icon']) ): ?>
            <span><i><img src="<?php echo $hdiensten['icon']; ?>" alt="<?php echo cbv_get_image_alt($hdiensten['icon']); ?>"></i></span>
            <span><em><img src="<?php echo THEME_URI; ?>/assets/images/chair-table-icon-hover.svg"></em></span>
            <?php 
            endif;
             $knop2 = $hdiensten['knop'];
             $knopurl2= (is_array( $knop ) &&  !empty( $knop['url'] ))?  $knop['url']: '#';
              if( !empty($hdiensten['titel']) ) printf(' <h5 class="hide-xs"><a href="%s">%s</a></h5>', $knopurl2, $hdiensten['titel']);
              if( is_array( $knop2 ) &&  !empty( $knop2['url'] ) ){
                  printf('<h5 class="show-xs"><a href="%s" target="%s">%s</a></h5>', $knop2['url'], $knop2['target'], $knop2['title']); 
              }
            ?>
          </div>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div> 
  <?php } ?>     
</section><!-- end of hm-catagorys-sec-wrp-->
<?php } 
  $hshowhide_usp = get_field('showhide_usp', HOMEID);
  $husps = get_field('home_usps', HOMEID);
  if( $hshowhide_usp ){
?>
<section class="hm-service-sec-wrp">
  <?php if( $husps ){ ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-service-wrp clearfix">
          <ul id="HmServiceSlider">
            <?php foreach( $husps as $husp ): ?>
            <li>
              <div class="hm-service-dsc">
                <?php if( !empty($husp['icon']) ): ?>
                <i><img src="<?php echo $husp['icon']; ?>" alt="<?php echo cbv_get_image_alt( $husp['icon'] ); ?>"></i>
                <?php endif; 
                  if( !empty($husp['titel']) ) printf('<h5>%s</h5>', $husp['titel']);
                  if( !empty($husp['beschrijving']) ) echo wpautop( $husp['beschrijving'] );
                ?>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</section><!-- end of hm-service-sec-wrp -->
<?php } 
  $hshowhide_cases = get_field('showhide_cases', HOMEID);
  $hcasesgrp = get_field('cases_in_de_kijker', HOMEID);
  $hcasesids = $hcasesgrp['cases'];
  if( $hshowhide_cases ){
?>
<section class="hm-gallery-post-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-enti-hdr-dsc">
          <?php
            if( !empty($hcasesgrp['titel']) ) printf('<h1>%s</h1>', $hcasesgrp['titel']);
            if( !empty($hcasesgrp['beschrijving']) ) echo wpautop( $hcasesgrp['beschrijving'] );
            $knop3 = $hcasesgrp['knop'];
            if( is_array( $knop3 ) &&  !empty( $knop3['url'] ) ){
                printf('<a href="%s" target="%s">%s</a>', $knop3['url'], $knop3['target'], $knop3['title']); 
            }
          ?>
        </div>
        <?php 
        if( is_array( $hcasesids ) ){
          $refQuery = new WP_Query(array(
            'post_type' => 'referentie',
            'posts_per_page'=> count($hcasesids),
            'order'=> 'ASC',
            'post__in' => $hcasesids
          ));
        }else{
          $refQuery = new WP_Query(array(
            'post_type' => 'referentie',
            'posts_per_page'=> 7,
            'order'=> 'DESC',
          ));
        }
        if( $refQuery->have_posts() ):

        ?>
        <div class="hm-gallery-item-top-wrp clearfix">
          <div class="hm-gallery-item-top-lft">
            <div class="HmGalleryItem">
              <span class="leftArrow"></span>
              <span class="rightArrow"></span>
            </div>
            <ul id="HmGalleryItemTopLft">
              <?php
                while($refQuery->have_posts()): $refQuery->the_post(); 
                $refImage = get_post_thumbnail_id(get_the_ID());
                if(!empty($refImage)){
                  $refImgsrc = cbv_get_image_src($refImage);
                }else{
                  $refImgsrc = THEME_URI.'/assets/images/hm-tp-gallery-small-img-1.png';
                }        
              ?>
              <li>
                <div class="hm-gallery-top-lft-item">
                  <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                  <div class="hm-gallery-top-lft-img" style="background: url(<?php echo $refImgsrc; ?>);">
                  </div>
                  <a href="<?php the_permalink(); ?>" class="hm-gallery-small-btn"><?php the_title(); ?></a>
                </div>
              </li>
              <?php endwhile; ?>
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
        <?php wp_reset_postdata(); endif; ?>
      </div>
    </div>
  </div>
</section><!-- end of hm-gallery-post-sec-wrp -->
<?php } 
  $hshowhide_feesten = get_field('showhide_feesten', HOMEID);
  $hfeesten = get_field('home_feesten', HOMEID);
  $allfeestens = $hfeesten['all_feesten'];
  if( $hshowhide_feesten ){
?>
<section class="hm-single-post-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-post-title">
          <?php if( !empty($hfeesten['titel']) ) printf('<h3>%s</h3>', $hfeesten['titel']); ?>
        </div>
        <?php if( $allfeestens ): ?>
        <div class="hm-single-post-wrp clearfix">
          <ul>
            <?php 
              foreach( $allfeestens as $afeestens ): 
                $feeImgsrc = '';
                if(!empty($afeestens['afbeelding'])){
                  $feeImgsrc = cbv_get_image_src($afeestens['afbeelding'], 'feestengrid');
                }
                $knop5 = $afeestens['knop'];
            ?>
            <li>
              <div class="hm-single-post-img-item">
                <?php if( is_array( $knop5 ) &&  !empty( $knop5['url'] ) ){ ?>
                  <a href="<?php echo $knop5['url']; ?>" class="overlay-link"></a>
                <?php } ?>
                <div class="hm-single-post-img" style="background:url(<?php echo $feeImgsrc; ?>);">
                </div>
                <?php 
                  if( is_array( $knop5 ) &&  !empty( $knop5['url'] ) ){
                      printf('<a class="hm-gallery-single-small-btn" href="%s" target="%s">%s</a>', $knop5['url'], $knop5['target'], $knop5['title']); 
                  }
                ?>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section><!-- end of hm-single-post-sec-wrp -->
<?php } ?>



<section class="hm-gallery-btm-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-post-title">
          <h3><strong>Producten</strong> Spotlight</h3>
        </div>
        <div class="hm-gallery-btm-wrp clearfix">
          <div class="hm-gallery-btm-lft">
            <div class="HmGalleryBtmPagi">
                <span class="leftArrow"></span>
                <span class="rightArrow"></span>
            </div>
            <div id="HmGalleryBtmLft">
              <div class="hm-gallery-btm-lft-item">
                <a href="#" class="overlay-link"></a>
                <div class="hm-gallery-btm-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-gallery-btm-lft-img.png);">
                </div>
                <a href="#" class="hm-gallery-btm-lft-btn">feestmeubilair</a>
              </div>
              <div class="hm-gallery-btm-lft-item">
                <a href="#" class="overlay-link"></a>
                <div class="hm-gallery-btm-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-gallery-btm-lft-img.png);">
                </div>
                <a href="#" class="hm-gallery-btm-lft-btn">feestmeubilair</a>
              </div>
              <div class="hm-gallery-btm-lft-item">
                <a href="#" class="overlay-link"></a>
                <div class="hm-gallery-btm-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-gallery-btm-lft-img.png);">
                </div>
                <a href="#" class="hm-gallery-btm-lft-btn">feestmeubilair</a>
              </div>
              <div class="hm-gallery-btm-lft-item">
                <a href="#" class="overlay-link"></a>
                <div class="hm-gallery-btm-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-gallery-btm-lft-img.png);">
                </div>
                <a href="#" class="hm-gallery-btm-lft-btn">feestmeubilair</a>
              </div>
              <div class="hm-gallery-btm-lft-item">
                <a href="#" class="overlay-link"></a>
                <div class="hm-gallery-btm-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-gallery-btm-lft-img.png);">
                </div>
                <a href="#" class="hm-gallery-btm-lft-btn">feestmeubilair</a>
              </div>
              <div class="hm-gallery-btm-lft-item show-xs">
                <a href="#" class="overlay-link"></a>
                <div class="hm-gallery-btm-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/gallery-btm-tp-img-1.png);">
                </div>
                <a href="#" class="hm-gallery-btm-lft-btn">feestmeubilair</a>
              </div>
              <div class="hm-gallery-btm-lft-item show-xs">
                <a href="#" class="overlay-link"></a>
                <div class="hm-gallery-btm-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/gallery-btm-tp-img-2.png);">
                </div>
                <a href="#" class="hm-gallery-btm-lft-btn">feestmeubilair</a>
              </div>
              <div class="hm-gallery-btm-lft-item show-xs">
                <a href="#" class="overlay-link"></a>
                <div class="hm-gallery-btm-lft-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-gallery-btm-img.png);">
                </div>
                <a href="#" class="hm-gallery-btm-lft-btn">feestmeubilair</a>
              </div>
            </div>
          </div>
          <div class="hm-gallery-btm-rgt">
            <div class="hm-gallery-top-img-wrp">
              <ul>
                <li>
                  <div class="hm-gallery-top-img-item">
                    <a href="#" class="overlay-link"></a>
                    <div class="hm-gallery-top-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/gallery-btm-tp-img-1.png);">
                    </div>
                    <a href="#" class="hm-gallery-big-btn">Feestbusje</a>
                  </div>
                </li>
                <li>
                  <div class="hm-gallery-top-img-item">
                    <a href="#" class="overlay-link"></a>
                    <div class="hm-gallery-top-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/gallery-btm-tp-img-2.png);">
                    </div>
                    <a href="#" class="hm-gallery-big-btn">Feestinstabox</a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="hm-gallery-middel-btn">
              <a href="#" class="hide-xs">Bekijk onze online catalogus voor feestmaterialen</a>
              <a href="#" class="show-xs">Bekijk de product catalogus</a>
            </div>
            <div class="hm-gallery-btm-img-inr">
              <a href="#" class="overlay-link"></a>
              <div class="hm-gallery-btm-img" style="background: url(<?php echo THEME_URI; ?>/assets/images/hm-gallery-btm-img.png);">
              </div>
              <a href="#" class="hm-gallery-big-btn">Feestlichtbox</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!--end of hm-gallery-btm-sec-wrp -->


<section class="home-b2b-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-b2b-innr clearfix">
          <div class="home-b2b-rgt matchHeightCol" style="background:url(<?php echo THEME_URI; ?>/assets/images/b2b-rgt-img.jpg);">
          </div> 
          <div class="home-b2b-lft matchHeightCol" style="background:url(<?php echo THEME_URI; ?>/assets/images/b2b-left-bg.jpg);">
            <h3><strong>b2b</strong> partner</h3>
            <p>Bent je event- of weddingplanner, heb je een feestzaal of evenementenhal en nog op zoek naar een partner? <br/>Neem dan hier contact op en ontdek onze pattneroplossingen</p>
            <a href="#">Contacteer ons</a>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>


<section class="home-feest-buro-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="feest-buro-innr clearfix"> 
          <div class="feest-buro-lft matchHeightCol">
            <div class="feest-buro-lft-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/feest-buro-img.jpg);"></div>
            <i>
              <img src="<?php echo THEME_URI; ?>/assets/images/logo-fb-icon.png" alt="">
            </i>
          </div>
          <div class="feest-buro-rgt matchHeightCol">
            <h3><strong>Feest</strong>buro</h3>
            <p>Suspendisse sem dui, blandit eget est ac, ullamcorper pellentesque dolor. Etiam blandit sit amet arcu id egestas. Mauris eleifend nunc in nibh consequat tincidunt. Duis tristique ante vitae ex cursus, in interdum arcu feugiat. </p>
            <p>Nulla in arcu vel neque lobortis aliquet sit amet at nibh. Sed ut dui et tortor finibus sagittis. Nam interdum lacus a leo tempor porta. Nam finibus elementum tortor non sodales. Vivamus tincidunt urna vitae diam venenatis, non rhoncus ex lobortis.</p>
            <a href="#">Over Ons</a>           
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