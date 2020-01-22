<?php
/*
  Template Name: Party Type
*/
get_header(); 

$thisID = get_the_ID();
get_template_part( 'templates/page', 'banner' );
?>

<?php
  $showhide_intro = get_field('showhide_intro', $thisID);
  $intro = get_field('intro', $thisID);
  if( $showhide_intro ):
    $introsrc = '';
    if(!empty($intro['afbeelding']))
      $introsrc = cbv_get_image_src($intro['afbeelding'], 'hovers');

    $introtag = '';
    if( !empty($intro['logo']) ) 
      $introtag = cbv_get_image_tag($intro['logo']);
?>
<section class="party-type-two-grid-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="feest-buro-innr clearfix"> 
          <div class="feest-buro-lft matchHeightCol">
            <div class="feest-buro-lft-bg" style="background:url(<?php echo $introsrc; ?>);"></div>
            <i><?php echo $introtag; ?></i>
          </div>
          <div class="feest-buro-rgt matchHeightCol">  
            <?php
              if( !empty($intro['titel']) ) printf('<h1>%s</h1>', $intro['titel']);
              if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] );
            ?>  
            <a class="scrolltobtn" href="#" data-to="#sec-welcome">onze cases</a>       
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>

<?php
  $ptshowhide_cases = get_field('showhide_cases', $thisID);
  $ptcasesgrp = get_field('cases_in_de_kijker', $thisID);
  $hcasesgrp = get_field('cases_in_de_kijker', HOMEID);
  $ptcasesids = $hcasesgrp['cases'];
  if(is_array($ptcasesgrp['cases']) && !empty($ptcasesgrp['cases'])) $ptcasesids = $ptcasesgrp['cases'];
  if( $ptshowhide_cases ):
?>
<section class="party-type-gallery-post-sec-wrp" id="sec-welcome">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-enti-hdr-dsc">
          <?php
            if( !empty($ptcasesgrp['titel']) ) printf('<h2>%s</h2>', $ptcasesgrp['titel']);
            if( !empty($ptcasesgrp['beschrijving']) ) echo wpautop( $ptcasesgrp['beschrijving'] );
            $knop = $ptcasesgrp['knop'];
            if( is_array( $knop ) &&  !empty( $knop['url'] ) ){
                printf('<a href="%s" target="%s">%s</a>', $knop['url'], $knop['target'], $knop['title']); 
            }
          ?>
        </div>
        <?php 
        if( is_array( $ptcasesids ) ){
          $refQuery = new WP_Query(array(
            'post_type' => 'referentie',
            'posts_per_page'=> count($ptcasesids),
            'order'=> 'ASC',
            'post__in' => $ptcasesids
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
                $pcount = $refQuery->found_posts;
                $getid = 0;
                $i = 1;
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
              <?php if($pcount == $i) $getid = get_the_ID(); $i++; endwhile; ?>
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
                $refImgsrc2 = THEME_URI.'/assets/images/hm-tp-gallery-small-img-1.png';
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
</section><!-- end of hm-gallery-post-sec-wrp -->
<?php endif; ?>

<?php
  $galerijs = get_field('galerij', $thisID);
  if( $galerijs ):
?>
<section class="pt-slider-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="catMeubilairSlider-wrp">
          <div class="clearfix catMeubilairSlider">
            <?php foreach( $galerijs as $galerij ): ?>
            <div class="catMeubilairSlider-item">
              <div class="catMeubilairSlider-bg-wrp">
                <div class="catMeubilairSlider-bg" style="background:url(<?php echo $galerij['sizes']['galerij']; ?>)">
                  <a data-fancybox href="<?php echo $galerij['url']; ?>" class="overlay-link"></a>                  
                </div>
              </div>
            </div>
            <?php endforeach;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of pt-slider-sec-wrp -->
<?php endif; ?>

<?php
  $producten = get_field('producten', $thisID);
  if( $producten ):
?>
<section class="pt-btm-slider-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="pt-meets-title">
          <?php if( !empty($producten['titel']) ) printf('<h3>%s</h3>', $producten['titel']); ?>
        </div>
        <div class="pt-btm-slider-wrp clearfix">
          <div class="PtBtmSliderArrow">
             <span class="leftArrow"></span>
             <span class="rightArrow"></span>
          </div>
          <ul id="PtBtmSlider">
            <li>
              <div class="pt-btm-slide-item">
                <span>Populair</span>
                <div class="pt-btm-slide-item-img">
                  <a href="#"><span><img src="<?php echo THEME_URI; ?>/assets/images/pt-btm-slide-item-img-1.png"></span></a>
                </div>
                <div class="pt-btm-slide-item-dsc">
                  <h5><a href="#">Arco Circular Special Color Copa Low</a></h5>
                  <p>Salon in kleur op aanvraag leder bestaande uit 4 Arco met salontafel Copa Low.</p>
                  <a href="#">meer info</a>
                </div>
              </div>
            </li>
            <li>
              <div class="pt-btm-slide-item">
                <span>Populair</span>
                <div class="pt-btm-slide-item-img">
                  <a href="#"><span><img src="<?php echo THEME_URI; ?>/assets/images/pt-btm-slide-item-img-2.png"></span></a>
                </div>
                <div class="pt-btm-slide-item-dsc">
                  <h5><a href="#">Plato Buffet Shafing dish</a></h5>
                  <p>Salon in kleur op aanvraag leder bestaande uit 4 Arco met salontafel Copa Low.</p>
                  <a href="#">meer info</a>
                </div>
              </div>
            </li>
            <li>
              <div class="pt-btm-slide-item">
                <span>Populair</span>
                <div class="pt-btm-slide-item-img">
                  <a href="#"><span><img src="<?php echo THEME_URI; ?>/assets/images/pt-btm-slide-item-img-3.png"></span></a>
                </div>
                <div class="pt-btm-slide-item-dsc">
                  <h5><a href="#">Wireless Speakers</a></h5>
                  <p>Salon in kleur op aanvraag leder bestaande uit 4 Arco met salontafel Copa Low.</p>
                  <a href="#">meer info</a>
                </div>
              </div>
            </li>
            <li>
              <div class="pt-btm-slide-item">
                <span>Populair</span>
                <div class="pt-btm-slide-item-img">
                  <a href="#"><span><img src="<?php echo THEME_URI; ?>/assets/images/pt-btm-slide-item-img-4.png"></span></a>
                </div>
                <div class="pt-btm-slide-item-dsc">
                  <h5><a href="#">Carpet</a></h5>
                  <p>Salon in kleur op aanvraag leder bestaande uit 4 Arco met salontafel Copa Low.</p>
                  <a href="#">meer info</a>
                </div>
              </div>
            </li>
            <li>
              <div class="pt-btm-slide-item">
                <span>Populair</span>
                <div class="pt-btm-slide-item-img">
                  <a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/pt-btm-slide-item-img-1.png"></a>
                </div>
                <div class="pt-btm-slide-item-dsc">
                  <h5><a href="#">Arco Circular Special Color Copa Low</a></h5>
                  <p>Salon in kleur op aanvraag leder bestaande uit 4 Arco met salontafel Copa Low.</p>
                  <a href="#">meer info</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <?php 
          $pknop = $producten['knop'];
          if( is_array( $pknop ) &&  !empty( $pknop['url'] ) ){
              printf('<div class="pt-btm-slider-btn"><a href="%s" target="%s">%s</a></div>', $pknop['url'], $pknop['target'], $pknop['title']); 
          }
        ?>
      </div>
    </div>
  </div>
</section><!--end of  pt-btm-slider-sec-wrp-->
<?php endif; ?>

<?php
  $hshowhide_b2bp = get_field('showhide_b2bp', HOMEID);
  $hb2bp = get_field('home_b2b_partner', HOMEID);
  if( $hshowhide_b2bp ):
    $hb2bsrc = '';
    if(!empty($hb2bp['afbeelding']))
      $hb2bsrc = cbv_get_image_src($hb2bp['afbeelding'], 'hb2b');
?>
<section class="home-b2b-sec party-b2b-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-b2b-innr clearfix">
          <div class="home-b2b-rgt matchHeightCol" style="background:url(<?php echo $hb2bsrc; ?>);">
          </div> 
          <div class="home-b2b-lft pt-b2b-lft matchHeightCol" style="background:url(<?php echo THEME_URI; ?>/assets/images/b2b-left-bg.jpg);">
            <?php
              if( !empty($hb2bp['titel']) ) printf('<h3>%s</h3>', $hb2bp['titel']);
              if( !empty($hb2bp['beschrijving']) ) echo wpautop( $hb2bp['beschrijving'] );
              $knop5 = $hb2bp['knop'];
              if( is_array( $knop5 ) &&  !empty( $knop5['url'] ) ){
                  printf('<a href="%s" target="%s">%s</a>', $knop5['url'], $knop5['target'], $knop5['title']); 
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>


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