<?php 
/*
  Template Name: Sub-category
*/
get_header(); 
$thisID = get_the_ID();
get_template_part( 'templates/page', 'banner' );
?>

<?php 
  $intro = get_field('intro', $thisID);

  $video = $intro['video'];
  $vurl = $video['video_url'];
  $vthumb = '';
  if(!empty($video['poster'])){
    $vthumb = cbv_get_image_src($video['poster'], 'scatvposter');
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
<section class="categoty-meubilair-sec" id="sub-cat-meubilair-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="categoty-meubilair-innr clearfix">
          <div class="categoty-meubilair-two-part">
            <div class="categoty-meubilair-rgt-vdo">
              <div class="video-play-wrap">
                <div class="video-play-main">
                    <?php echo $vtag; ?>
                </div>
              </div>
            </div>          
            <div class="categoty-meubilair-lft-des">
              <?php
                $intcontent = $intro['content'];
                if( !empty($intcontent['titel']) ) printf('<h1>%s</h1>', $intcontent['titel']);
                if( !empty($intcontent['beschrijving']) ) echo wpautop( $intcontent['beschrijving'] );
              ?>
            </div>
          </div>        
          <div class="categoty-meubilair-full-des">
            <?php
              if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] );
            ?>
          </div>
        </div>
        <?php
          $gimages = get_field('slider', $thisID);
          if( $gimages ): 
        ?>
        <div class="catMeubilairSlider-wrp">
          <div class="clearfix catMeubilairSlider">
            <?php 
              foreach( $gimages as $gimage ):
                $gimagesrc = '';
                $gimagesrcfull = '';
                if(!empty($gimage)){
                  $gimagesrc = cbv_get_image_src($gimage, 'galerij');
                  $gimagesrcfull = cbv_get_image_src($gimage);
                }
            ?>
            <div class="catMeubilairSlider-item">
              <div class="catMeubilairSlider-bg-wrp">
                <div class="catMeubilairSlider-bg" style="background:url(<?php echo $gimagesrc; ?>)">
                  <a data-fancybox href="<?php echo $gimagesrcfull; ?>" class="overlay-link"></a>                      
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
        <div class="sub-cat-request-price" style="background:url(<?php echo THEME_URI; ?>/assets/images/sub-cat-request-price-bg.jpg)">
          <h3>vraag je prijs aan</h3>
          <p>Pellentesque tincidunt eros lacinia dolor semper tempus. <br /> Etiam quis sapien vitae justo vehicula lacinia.</p>
          <a href="#"><span>vraag je prijs aan</span></a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_template_part( 'templates/footer', 'newsletter' );

get_footer(); 
?>