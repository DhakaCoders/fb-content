<?php get_header(); 
while ( have_posts() ) : the_post();
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
              <strong class="banner-page-title">Referenties</strong>
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

<?php 
$informat = get_field('informatie', $thisID);
?>
<section class="ref-del-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ref-del-innr">
          <div class="ref-del-top"> 
            <div class="ref-del-back">
              <a href="#">terug naar overzicht</a>
            </div>
            <div class="ref-del-head">
              <h1><?php echo get_the_title(); ?></h1>
              <div class="locate-spn">
                <ul class="ulc clearfix">
                  <?php 
                    if( !empty($informat['locatie']) ) printf('<li><span>Locatie: %s</span></li>', $informat['locatie']); 
                    if( !empty($informat['gasten']) ) printf('<li><span>Gasten: %s</span></li>', $informat['gasten']); 
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <?php 
            $rslides = get_field('slider', $thisID);
            if( $rslides ): 
          ?>
          <div class="ref-del-slider-wrp">
            <div class="refDetailsSlider">
              <?php foreach( $rslides as  $rslider): ?>
              <div class="refDetailsSlider-item clearfix">
                <?php 
                  $lftpart = $rslider['left_part']; 
                  $lptype = $lftpart['left_part_type'];
                ?>
                <div class="refDetailsSlider-lft">
                  <?php 
                    $vurl = $lftpart['video_url'];
                    $vposter = $lftpart['video_poster'];
                    $rimages = $lftpart['images'];
                    if( $lptype ): 
                      if(!empty($vposter['url'])){
                        $vthumb = $vposter['sizes']['vposter'];
                      }
                      $vtag = '';
                      if(!empty($vurl)){
                        $vtag .= '<a class="img-zoom" data-fancybox="article" href="'.$vurl.'">';
                        $vtag .= '<i><img src="'.THEME_URI.'/assets/images/play.png" alt="play"></i>';
                        $vtag .= '<span style="background: url('.$vthumb.');"></span>';
                        $vtag .= '</a>';
                      }else{
                        $vtag .= '<a class="img-zoom">';
                        $vtag .= '<span style="background: url('.$vthumb.');"></span>';
                        $vtag .= '</a>';
                      }
                  ?>
                  <div class="video-play-wrap">
                    <div class="video-play-main">
                        <?php echo $vtag; ?>
                    </div>
                  </div>
                  <?php 
                    else: 
                    if( $rimages ):
                      echo '<ul class="ulc clearfix">';
                      foreach( $rimages as $rimage ):
                        $rgimage = '';
                        $rgimagefull = '';
                        if(!empty($rimage)){
                          $rgimage = cbv_get_image_src($rimage, 'hb2b');
                          $rgimagefull = cbv_get_image_src($rimage);
                        }
                  ?>
                      <li>
                      <div class="refDetailsSlider-rgt-grd">
                        <div class="refDetailsSlider-rgt-grd-bg" style="background: url(<?php echo $rgimage; ?>);">
                        </div>
                        <a data-fancybox href="<?php echo $rgimagefull; ?>" class="overlay-link"></a> 
                      </div>
                    </li>
                  <?php 
                      endforeach;
                      echo '<ul>';
                    endif; 
                    endif; 
                  ?>
                </div>
                <?php 
                  $rgtpart = $rslider['right_part']; 
                  $rgptype = $rgtpart['right_part_type'];
                ?>
                <div class="refDetailsSlider-rgt">
                  <?php 
                    $rvurl = $rgtpart['video_url'];
                    $rvposter = $rgtpart['video_poster'];
                    $rrimages = $rgtpart['images'];
                    $rvthumb = '';
                    if( $rgptype ): 
                      
                      if(!empty($rvposter)){
                        $rvthumb = cbv_get_image_src($rvposter, 'vposter');;
                      }
                      $rvtag = '';
                      if(!empty($rvurl)){
                        $rvtag .= '<a class="img-zoom" data-fancybox="article" href="'.$rvurl.'">';
                        $rvtag .= '<i><img src="'.THEME_URI.'/assets/images/play.png" alt="play"></i>';
                        $rvtag .= '<span style="background: url('.$rvthumb.');"></span>';
                        $rvtag .= '</a>';
                      }else{
                        $rvtag .= '<a class="img-zoom">';
                        $rvtag .= '<span style="background: url('.$rvthumb.');"></span>';
                        $rvtag .= '</a>';
                      }
                  ?>
                  <div class="video-play-wrap">
                    <div class="video-play-main">
                        <?php echo $rvtag; ?>
                    </div>
                  </div>
                  <?php 
                    else: 
                    if( $rrimages ):
                      echo '<ul class="ulc clearfix">';
                      foreach( $rrimages as $rrimage ):
                        $rrgimage = '';
                        $rrgimagefull = '';
                        if(!empty($rrimage)){
                          $rrgimage = cbv_get_image_src($rrimage, 'hb2b');
                          $rrgimagefull = cbv_get_image_src($rrimage);
                        }
                  ?>
                      <li>
                      <div class="refDetailsSlider-rgt-grd">
                        <div class="refDetailsSlider-rgt-grd-bg" style="background: url(<?php echo $rrgimage; ?>);">
                        </div>
                        <a data-fancybox href="<?php echo $rrgimagefull; ?>" class="overlay-link"></a> 
                      </div>
                    </li>
                  <?php 
                      endforeach;
                      echo '<ul>';
                    endif; 
                    endif; 
                  ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php 
            $rintro = get_field('intro', $thisID);
            $gegevens = get_field('gegevens', $thisID);
          ?>
          <div class="ref-del-des-two-part clearfix">
            <div class="ref-del-des-two-part-lft">
              <?php
                if( !empty($rintro['titel']) ) printf('<h3>%s</h3>', $rintro['titel']);
                if( !empty($rintro['beschrijving']) ) echo wpautop( $rintro['beschrijving'] );
              ?>
            </div>
            <div class="ref-del-des-two-part-rgt">
              <?php
                if( !empty($gegevens['titel']) ) printf('<h3>%s</h3>', $gegevens['titel']);
                $gegsvns = $gegevens['gegevens'];
                if( $gegsvns ):
              ?>
              <div class="ref-del-data">
                <?php 
                  $i = 1; foreach( $gegsvns as $gegsvn ):
                  $refClass = 'ref-del-data-bdy'; 
                  if( $i % 2 != 0 ) $refClass = 'ref-del-data-hdr'; 
                ?>
                <div class="<?php echo $refClass; ?>">
                  <ul class="ulc clearfix">
                    <li>
                      <?php if(!empty($gegsvn['titel'])) printf('<strong>%s</strong>', $gegsvn['titel']); ?>
                    </li>
                    <li>
                      <?php if(!empty($gegsvn['desc'])) printf('<span>%s</span>', $gegsvn['desc']); ?>
                    </li>
                  </ul>
                </div>
                <?php $i++; endforeach; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="sub-cat-request-price" style="background:url(<?php echo THEME_URI; ?>/assets/images/sub-cat-request-price-bg.jpg)">
            <h3>vraag je prijs aan</h3>
            <p>Pellentesque tincidunt eros lacinia dolor semper tempus. <br /> Etiam quis sapien vitae justo vehicula lacinia.</p>
            <a href="#"><span>vraag je prijs aan</span></a>
          </div>
        </div> 
      </div>
    </div>
  </div>
</section>

<?php 
  $gprod = get_field('gebruikte_producten', $thisID);
?>
<section class="subcat-meubilair-grd-sec" id="refDel-subcat-meubilair-grd">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="subcat-meubilair-grd-innr clearfix">
          <div class="subcat-meubilair-grd-head">
            <?php
              if( !empty($gprod['titel']) ) printf('<h2>%s</h2>', $gprod['titel']);
            ?>
          </div>
          <div class="subcat-meubilair-grd-main"> 
            <ul class="ulc clearfix"> 
              <li>
                <div class="subcat-meubilair-grd">
                  <div class="subcat-meubilair-grd-bg-wrp">
                    <img src="<?php echo THEME_URI; ?>/assets/images/subcategoty-meubilair-img005.jpg" alt="">
                    <a href="#" class="overlay-link"></a>
                  </div>
                  <div class="subcat-meubilair-grd-des subcatGrd-matchCol">
                    <h6><a href="#">Arco Circular Special Color Copa Low</a></h6>
                    <p>Salon in kleur op aanvraag leder bestaande uit 4 Arco met salontafel Copa Low.</p>
                    <a href="#">meer info</a>
                  </div>
                </div>
              </li> 
              <li>
                <div class="subcat-meubilair-grd">
                  <div class="subcat-meubilair-grd-bg-wrp">
                    <img src="<?php echo THEME_URI; ?>/assets/images/subcategoty-meubilair-img002.jpg" alt="">
                    <a href="#" class="overlay-link"></a>
                  </div>
                  <div class="subcat-meubilair-grd-des subcatGrd-matchCol">
                    <h6><a href="#">Plato Buffet shafing dish</a></h6>
                    <p>Barelement met zwart bovenblad. Front te kiezen.</p>
                    <a href="#">meer info</a>
                  </div>
                </div>
              </li> 
              <li>
                <div class="subcat-meubilair-grd">
                  <div class="subcat-meubilair-grd-bg-wrp">
                    <img src="<?php echo THEME_URI; ?>/assets/images/subcategoty-meubilair-img003.jpg" alt="">
                    <a href="#" class="overlay-link"></a>
                  </div>
                  <div class="subcat-meubilair-grd-des subcatGrd-matchCol">
                    <h6><a href="#">Multi Bar // Black Top</a></h6>
                    <p>Barelement met zwart bovenblad. Front te kiezen.</p>
                    <a href="#">meer info</a>
                  </div>
                </div>
              </li> 
              <li>
                <div class="subcat-meubilair-grd">
                  <div class="subcat-meubilair-grd-bg-wrp">
                    <img src="<?php echo THEME_URI; ?>/assets/images/subcategoty-meubilair-img004.jpg" alt="">
                    <a href="#" class="overlay-link"></a>
                  </div>
                  <div class="subcat-meubilair-grd-des subcatGrd-matchCol">
                    <h6><a href="#">Rotondo Set Low Copper</a></h6>
                    <p>Set van 3 koperen, ronde salontafels met mangoblad.</p>
                    <a href="#">meer info</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftr-top-newsletter-con ref-del-newsletter"> 
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

<?php 
endwhile; 
get_footer(); 
?>