<?php get_header(); 
get_template_part( 'templates/page', 'banner-small' );
while ( have_posts() ) : the_post();
$thisID = get_the_ID();
?>

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
              <a href="<?php echo esc_url( home_url('Referenties') );?>">terug naar overzicht</a>
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
                        $vthumb = $vposter['sizes']['rvposter'];
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
                          $rgimage = cbv_get_image_src($rimage, 'rvgalerij');
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
                        $rvthumb = cbv_get_image_src($rvposter, 'rvposter');;
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
                          $rrgimage = cbv_get_image_src($rrimage, 'rvgalerij');
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
          <?php
            $reqprice = get_field('request_price', 'options');
            if( $reqprice ):
          ?>
          <div class="sub-cat-request-price" style="background:url(<?php echo THEME_URI; ?>/assets/images/sub-cat-request-price-bg.jpg)">
            <?php 
            if(!empty($reqprice['titel'])) printf('<h3>%s</h3>', $reqprice['titel']);
            if(!empty($reqprice['beschrijving'])) echo wpautop( $reqprice['beschrijving'], true );
            $knop = $reqprice['knop'];
            if( is_array( $knop ) &&  !empty( $knop['url'] ) ){
             printf('<a href="%s" target="%s"><span>%s</span></a>', $knop['url'], $knop['target'], $knop['title']);
            }
          ?>
          </div>
          <?php endif; ?>
        </div> 
      </div>
    </div>
  </div>
</section>

<?php 
  $gprod = get_field('gebruikte_producten', $thisID);
  $pdids = $gprod['producten_ids'];
  if(isset($pdids) && !empty($pdids) && $pdids > 0){
    $pquery = new WP_Query(array( 
        'post_type'=> 'product',
        'post_status' => 'publish',
        'posts_per_page' => count($pdids),
        'orderby' => 'date',
        'order'=> 'DESC',
        'post__in' => $pdids
      ) 
    );
    }else{
    $pquery = new WP_Query(array( 
        'post_type'=> 'product',
        'post_status' => 'publish',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order'=> 'DESC'
      ) 
    );
  } 
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
          <?php if($pquery->have_posts()): ?>
          <div class="subcat-meubilair-grd-main"> 
            <ul class="ulc clearfix">
            <?php 
              while($pquery->have_posts()): $pquery->the_post();
            ?> 
              <li>
                <div class="subcat-meubilair-grd">
                  <div class="subcat-meubilair-grd-bg-wrp">
                     <?php echo wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'pgrid' ); ?>
                    <a href="<?php the_permalink();?>" class="overlay-link"></a>
                  </div>
                  <div class="subcat-meubilair-grd-des subcatGrd-matchCol">
                    <h6><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h6>
                    <?php echo wpautop( cbv_excerpt(), true ); ?>
                    <a href="<?php the_permalink();?>">meer info</a>
                  </div>
                </div>
              </li> 
              <?php endwhile; ?>
            </ul>
          </div>
          <?php wp_reset_postdata(); endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
endwhile; 
get_template_part( 'templates/footer', 'newsletter' );
get_footer(); 
?>