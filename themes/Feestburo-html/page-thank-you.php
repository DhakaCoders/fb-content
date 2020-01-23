<?php
/*
  Template Name: Thankyou Message
*/
get_header();
$thisID = get_the_ID();
get_template_part( 'templates/page', 'banner' );
?>

<?php 
$intro = get_field('intro', $thisID); 
$pthcases = get_field('cases', $thisID); 
?>
<section class="thank-you-message-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="message-dsc-wrp">
          <div class="message-dsc">
            <?php if( !empty($intro['cases']) ): ?>
            <span><img src="<?php echo $intro['icon']; ?>" alt="<?php echo cbv_get_image_alt($intro['icon']); ?>"></span>
            <?php endif; ?>

          <?php
            if( !empty($intro['titel']) ) printf('<h1>%s</h1>', $intro['titel']);
            if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] );
          ?>
          </div>
          <?php if( $pthcases ): ?>
          <div class="hm-single-post-wrp clearfix">
          <?php 
            if( !empty($pthcases['titel']) ) printf('<h5>%s</h5>', $intro['titel']); 
            $ptcaseids = $pthcases['select_cases'];
            if( is_array( $ptcaseids ) ){
              $refQuery = new WP_Query(array(
                'post_type' => 'referentie',
                'posts_per_page'=> count($ptcaseids),
                'order'=> 'ASC',
                'post__in' => $ptcaseids
              ));
            }else{
              $refQuery = new WP_Query(array(
                'post_type' => 'referentie',
                'posts_per_page'=> 4,
                'order'=> 'DESC',
              ));
            }
             if( $refQuery->have_posts() ){
            ?>
            <ul>
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
                <div class="hm-single-post-img-item">
                  <div class="overlay-hover"></div>
                  <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                  <div class="hm-single-post-img" style="background:url(<?php echo $refImgsrc; ?>);">
                  </div>
                  <div class="ty-hover-btn">
                    <a href="<?php the_permalink(); ?>" class="hm-gallery-single-small-btn"><?php the_title(); ?></a>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata(); } ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of .thank-you-message-sec-wrp -->

<?php

  $spacialArry = array(".", "/", "+", " ");$replaceArray = '';
  $adres = get_field('address', 'options');
  $e_mailadres = get_field('emailaddress', 'options');
  $show_telefoon = get_field('telephone', 'options');
  $telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));

  $gmap = get_field('google_maps', 9);
  if(!empty($gmap['afbeelding'])){
    $contimg = cbv_get_image_src($gmap['afbeelding'], 'gmimg');
  }else{
    $contimg = '';
  }
?>

<section class="thank-message-info-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="thank-message-info-wrp">
          <div class="Contact-info-inr clearfix">
            <div class="Contact-info-img" style="background: url(<?php echo $contimg; ?>)">
            </div>
            <div class="Contact-info-dsc">
              <?php 
                if( !empty( $gmap['titel'] ) ) printf('<h2>%s</h2>', $gmap['titel']);
                if( !empty( $adres ) ) printf('<p>%s</p>', $adres); 
              ?>
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
</section>
<?php
get_template_part( 'templates/footer', 'newsletter' );

get_footer(); 
?>