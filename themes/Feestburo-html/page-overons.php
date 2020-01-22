<?php
/*
  Template Name: Overons
*/
get_header(); 

$thisID = get_the_ID();
get_template_part( 'templates/page', 'banner' );
?>

<?php
  $hshowhide_usp = get_field('showhide_usp', $thisID);
  $husps = get_field('alle_usps', $thisID);
  if( $hshowhide_usp ):
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
<?php endif; ?>

<?php 
$intro = get_field('introsec', $thisID);
$showhide_intro = get_field('showhide_intro', $thisID);
if($showhide_intro):
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
                $introposter = cbv_get_image_src($intrep['afbeelding'], 'vintrogird');
              }else{
                $introposter = '';
              } 

              if(!empty($intrep['logoafbeelding'])){
                $intropostertag = cbv_get_image_tag($intrep['logoafbeelding']);
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
<?php endif; ?>

<?php
$hoe_werken = get_field('hoe_werkensec', $thisID);
$showhide_werken = get_field('showhide_werkensec', $thisID);
if($showhide_werken):
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
                  <?php if( !empty( $werkenrepeat['titel'] ) ) printf( '<h4>%s</h4>', $werkenrepeat['titel']); ?> 
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
<?php endif; ?>

<?php
  $hshowhide_cases = get_field('showhide_cases', HOMEID);
  $hcasesgrp = get_field('cases_in_de_kijker', HOMEID);
  $hcasesids = $hcasesgrp['cases'];
  if( $hshowhide_cases ):
?>
<section class="hm-gallery-post-sec-wrp overOns-gallery-post-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hm-enti-hdr-dsc">
          <?php
            if( !empty($hcasesgrp['titel']) ) printf('<h2>%s</h2>', $hcasesgrp['titel']);
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