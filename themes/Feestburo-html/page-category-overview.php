<?php
/*
  Template Name: Category Overview
*/
get_header(); 

$thisID = get_the_ID();
get_template_part( 'templates/page', 'banner-small' );
?>

<?php 
  $intro = get_field('intro', $thisID);

  $video = $intro['video'];
  $vurl = $video['video_url'];
  $vthumb = '';
  if(!empty($video['poster'])){
    $vthumb = cbv_get_image_src($video['poster'], 'rvposter');
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
<section class="categoty-meubilair-sec">
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
                if( !empty($intcontent['titel']) ) printf('<h1><strong>%s</strong></h1>', $intcontent['titel']);
                if( !empty($intcontent['beschrijving']) ) echo wpautop( $intcontent['beschrijving'] );
              ?>
              <a href="#subcat-meubilair-grd-sec"><span>Alle producten</span></a>
            </div>            
          </div>
        </div>
        <?php
          $gimages = get_field('slider', $thisID);
          if( $gimages ): 
        ?>
        <div class="catMeubilairSlider-wrp" >
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
      </div>
    </div>
  </div>
</section>

<?php 
$pcat = get_field('producten_category', $thisID);
if(!empty($pcat) && $pcat):
?>
<section class="subcat-meubilair-grd-sec subcat-meubilair-grd-sec-new" id="subcat-meubilair-grd-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="subcat-meubilair-grd-innr clearfix">
          <div class="subcat-meubilair-grd-head">
            <h2><strong><?php echo $pcat->name; ?></strong></h2>
            <?php if( !empty($pcat->description) ) echo wpautop( $pcat->description ); ?>
          </div>
          <div class="fb-proover-categories">

            <?php 
              $args = array(
              'type'                     => 'product',
              'parent'                 => $pcat->term_id,
              'orderby'                  => 'name',
              'order'                    => 'ASC',
              'hide_empty'               => FALSE,
              'taxonomy'                 => 'product_cat',
              ); 
              $child_categories = get_categories($args );
              echo '<ul class="class ulc clearfix">';
              foreach($child_categories as $child){
                echo "<li><a href='".get_term_link( $child )."'>{$child->name}</a></li>";
              }
              echo '</ul>';
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