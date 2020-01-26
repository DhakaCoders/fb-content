<?php 
get_header(); 
?>
  
<?php  
  $hshowhide_slide = get_field('showhide_slider', HOMEID);
  $hslides = get_field('home_slider', HOMEID);
  if($hshowhide_slide):
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
<?php endif; ?>


<?php
  $hshowhide_diensten = get_field('showhide_diensten', HOMEID);
  $hdienstens = get_field('home_diensten', HOMEID);
  if($hshowhide_diensten):
  $getCls = cbv_cls_based_on_item( count($hdienstens), 5 );
?>
<section class="hm-catagorys-sec-wrp">
  <?php if($hdienstens){ ?>
  <div class="hm-catagory-wrp">
    <ul class="<?php echo $getCls; ?>">
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
            <?php endif;

             $knop2 = $hdiensten['knop'];
             $knopurl2 = (is_array( $knop ) &&  !empty( $knop['url'] ))?  $knop['url']: 'javascript:void(0)';
              if( !empty($hdiensten['titel']) ) printf(' <h5 class="hide-xs"><a href="%s">%s</a></h5>', $knopurl2, $hdiensten['titel']);
              if( is_array( $knop2 ) &&  !empty( $knop2['url'] ) ){
                  printf('<h5 class="show-xs"><a href="%s" target="%s">%s</a></h5>', $knop2['url'], $knop2['target'], $hdiensten['titel']); 
              }
            ?>
          </div>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div> 
  <?php } ?>     
</section>
<?php endif; ?>


<?php
  $hshowhide_usp = get_field('showhide_usp', HOMEID);
  $husps = get_field('home_usps', HOMEID);
  if( $hshowhide_usp ):
?>
<section class="hm-service-sec-wrp">
  <?php if( $husps ){ ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-service-wrp clearfix">
          <ul class="clearfix" id="HmServiceSlider">
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
</section>
<?php endif; ?>


<?php
  $hshowhide_cases = get_field('showhide_cases', HOMEID);
  $hcasesgrp = get_field('cases_in_de_kijker', HOMEID);
  $hcasesids = $hcasesgrp['cases'];
  if( $hshowhide_cases ):
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
        ?>
        <div class="hm-gallery-item-top-wrp clearfix">
          <?php if( $refQuery->have_posts() ){ ?>
          <div class="hm-gallery-item-top-lft">
            <div class="HmGalleryItem">
              <span class="leftArrow"></span>
              <span class="rightArrow"></span>
            </div>
            <ul id="HmGalleryItemTopLft">
              <?php
                //echo $pcount = $refQuery->found_posts;
                $getid = 0;
                $i = 1;
                while($refQuery->have_posts()): $refQuery->the_post(); 
                $refImage = get_post_thumbnail_id(get_the_ID());
                if(!empty($refImage)){
                  $refImgsrc = cbv_get_image_src($refImage);
                }else{
                  $refImgsrc = THEME_URI.'/assets/images/refer-sm-grid.png';
                }      

                $count_posts = $refQuery->current_post + 1;   
              ?>
              <li>
                <div class="hm-gallery-top-lft-item">
                  <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                  <div class="hm-gallery-top-lft-img" style="background: url(<?php echo $refImgsrc; ?>);">
                  </div>
                  <a href="<?php the_permalink(); ?>" class="hm-gallery-small-btn"><?php the_title(); ?></a>
                </div>
              </li>
              <?php if($count_posts == $i) $getid = get_the_ID(); $i++; endwhile; ?>
            </ul>
          </div>
          <?php wp_reset_postdata(); } 
          if( $getid > 0 ){
            $refQuery2 = new WP_Query(array(
              'post_type' => 'referentie',
              'posts_per_page'=> 1,
              'post__in' => array($getid)
            ));
            if( $refQuery2->have_posts() ){
              while($refQuery2->have_posts()): $refQuery2->the_post(); 
                $refImage2 = get_post_thumbnail_id(get_the_ID());
              if(!empty($refImage2)){
                $refImgsrc2 = cbv_get_image_src($refImage2);
              }else{
                $refImgsrc2 = THEME_URI.'/assets/images/refer-big-grid.png';
              }
          ?>
          <div class="hm-gallery-item-top-rgt hide-xs">
            <div class="hm-gallery-rgt-overflow">
              <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
              <div class="hm-gallery-tp-rgt-img" style="background: url(<?php echo $refImgsrc2; ?>);">
              </div>
              <a href="<?php the_permalink(); ?>" class="hm-gallery-big-btn"><?php the_title(); ?></a>
            </div>
          </div>
         <?php endwhile; wp_reset_postdata(); } } ?>
        </div>
        
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<?php
  $hshowhide_feesten = get_field('showhide_feesten', HOMEID);
  $hfeesten = get_field('home_feesten', HOMEID);
  $allfeestens = $hfeesten['all_feesten'];
  if( $hshowhide_feesten ):
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
          <ul class="clearfix">
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
</section>
<?php endif; ?>


<?php
  $hshowhide_producten = get_field('showhide_producten', HOMEID);
  $ptitel = get_field('ptitel', HOMEID);
  $fproducts = get_field('featured_producten', HOMEID);
  if( $hshowhide_producten ):
?>
<section class="hm-gallery-btm-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-post-title">
          <?php if( !empty($ptitel) ) printf('<h3>%s</h3>', $ptitel); ?>
        </div>
        <?php if($fproducts): ?>
        <div class="hm-gallery-btm-wrp clearfix">
          <div class="hm-gallery-btm-lft">
            <div class="HmGalleryBtmPagi">
                <span class="leftArrow"></span>
                <span class="rightArrow"></span>
            </div>
            <div id="HmGalleryBtmLft">
              <?php 
                foreach($fproducts as $fproduct): 
                  $fpimagesrc = '';
                  if(!empty($fproduct['afbeelding']))
                    $fpimagesrc = cbv_get_image_src($fproduct['afbeelding'], 'hovers');
                  $knop6 = $fproduct['knop'];
              ?>
              <div class="hm-gallery-btm-lft-item">
                <?php if( is_array( $knop6 ) &&  !empty( $knop6['url'] ) ){ ?>
                <a href="<?php echo $knop6['url']; ?>" class="overlay-link"></a>
                <?php } ?>
                <div class="hm-gallery-btm-lft-img" style="background: url(<?php echo $fpimagesrc; ?>);">
                </div>
                <?php 
                  if( is_array( $knop5 ) &&  !empty( $knop5['url'] ) ){
                    printf('<a class="hm-gallery-btm-lft-btn" href="%s" target="%s">%s</a>', $knop5['url'], $knop5['target'], $knop5['title']); 
                  }
                ?>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="hm-gallery-btm-rgt">
            <div class="hm-gallery-top-img-wrp">
              <ul>
                <?php 
                  $i = 1;
                  foreach($fproducts as $fproduct): 
                    $fpimagesrc_2 = '';
                    if(!empty($fproduct['afbeelding']))
                      $fpimagesrc_2 = cbv_get_image_src($fproduct['afbeelding'], 'hprod2');
                      $knop_2 = $fproduct['knop'];
                      if(($i == 2) OR $i == 3){
                ?>
                <li>
                  <div class="hm-gallery-top-img-item">
                    <?php if( is_array( $knop_2 ) &&  !empty( $knop_2['url'] ) ){ ?>
                      <a href="<?php echo $knop_2['url']; ?>" class="overlay-link"></a>
                    <?php } ?>
                    <div class="hm-gallery-top-img" style="background: url(<?php echo $fpimagesrc_2; ?>);">
                    </div>
                    <?php 
                      if( is_array( $knop_2 ) &&  !empty( $knop_2['url'] ) ){
                        printf('<a class="hm-gallery-big-btn" href="%s" target="%s">%s</a>', $knop_2['url'], $knop_2['target'], $knop_2['title']); 
                      }
                    ?>
                  </div>
                </li>
                <?php } $i++; endforeach; ?>
              </ul>
            </div>
            <div class="hm-gallery-middel-btn">
              <?php 
                $knop_7 = get_field('producten_btn', HOMEID);
                if( is_array( $knop_7 ) &&  !empty( $knop_7['url'] ) ){
                  printf('<a class="hide-xs" href="%s" target="%s">%s</a>', $knop_7['url'], $knop_7['target'], $knop_7['title']); 
                  printf('<a class="show-xs" href="%s" target="%s">%s</a>', $knop_7['url'], $knop_7['target'], $knop_7['title']); 
                }
              ?>
            </div>
            <?php 
              $i = 1;
              foreach($fproducts as $fproduct): 
                $fpimagesrc_4 = '';
                if(!empty($fproduct['afbeelding']))
                  $fpimagesrc_4 = cbv_get_image_src($fproduct['afbeelding'], 'hprod4');
                  $knop_4 = $fproduct['knop'];
                  if(($i == 4)){
            ?>
            <div class="hm-gallery-btm-img-inr">
              <?php if( is_array( $knop_4 ) &&  !empty( $knop_4['url'] ) ){ ?>
                <a href="<?php echo $knop_4['url']; ?>" class="overlay-link"></a>
              <?php } ?>
              <div class="hm-gallery-btm-img" style="background: url(<?php echo $fpimagesrc_2; ?>);">
              </div>
              <?php 
                if( is_array( $knop_4 ) &&  !empty( $knop_4['url'] ) ){
                  printf('<a class="hm-gallery-big-btn" href="%s" target="%s">%s</a>', $knop_4['url'], $knop_4['target'], $knop_4['title']); 
                }
              ?>
            </div>
            <?php } $i++; endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<?php
  $hshowhide_b2bp = get_field('showhide_b2bp', HOMEID);
  $hb2bp = get_field('home_b2b_partner', HOMEID);
  if( $hshowhide_b2bp ):
    $hb2bsrc = '';
    if(!empty($hb2bp['afbeelding']))
      $hb2bsrc = cbv_get_image_src($hb2bp['afbeelding'], 'hb2b');
?>
<section class="home-b2b-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-b2b-innr clearfix">
          <div class="home-b2b-rgt matchHeightCol" style="background:url(<?php echo $hb2bsrc; ?>);">
          </div> 
          <div class="home-b2b-lft matchHeightCol" style="background:url(<?php echo THEME_URI; ?>/assets/images/b2b-left-bg.jpg);">
            <?php
              if( !empty($hb2bp['titel']) ) printf('<h3>%s</h3>', $hb2bp['titel']);
              if( !empty($hb2bp['beschrijving']) ) echo wpautop( $hb2bp['beschrijving'] );
              $knop8 = $hb2bp['knop'];
              if( is_array( $knop8 ) &&  !empty( $knop8['url'] ) ){
                  printf('<a href="%s" target="%s">%s</a>', $knop8['url'], $knop8['target'], $knop8['title']); 
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>


<?php
  $hshowhide_overons = get_field('showhide_overons', HOMEID);
  $hoverons = get_field('home_overons', HOMEID);
  if( $hshowhide_overons ):
    $hoversrc = '';
    if(!empty($hoverons['afbeelding']))
      $hoversrc = cbv_get_image_src($hoverons['afbeelding'], 'hovers');

    $hovertag = '';
    if( !empty($hoverons['logo']) ) 
      $hovertag = cbv_get_image_tag($hoverons['logo']);
?>
<section class="home-feest-buro-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="feest-buro-innr clearfix"> 
          <div class="feest-buro-lft matchHeightCol">
            <div class="feest-buro-lft-bg" style="background:url(<?php echo $hoversrc; ?>);"></div>
            <i><?php echo $hovertag; ?></i>
          </div>
          <div class="feest-buro-rgt matchHeightCol">
            <?php
              if( !empty($hoverons['titel']) ) printf('<h3>%s</h3>', $hoverons['titel']);
              if( !empty($hoverons['beschrijving']) ) echo wpautop( $hoverons['beschrijving'] );
              $knop9 = $hoverons['knop'];
              if( is_array( $knop9 ) &&  !empty( $knop9['url'] ) ){
                  printf('<a href="%s" target="%s">%s</a>', $knop9['url'], $knop9['target'], $knop9['title']); 
              }
            ?>         
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>

<?php
get_template_part( 'templates/footer', 'newsletter' );

get_footer(); 
?>