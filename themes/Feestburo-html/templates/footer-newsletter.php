<?php
$newsltr = get_field('newsletter', 'options');
if( $newsltr ):
?>
<section class="ftr-top-newsletter-con"> 
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ftr-top-newsletter-innr-wrp">
          <div class="ftr-top-newsletter-innr"> 
            <div class="ftr-top-newsletter-head">
            <?php
              if( !empty($newsltr['titel']) ) printf('<h3>%s</h3>', $newsltr['titel']);
              if( !empty($newsltr['beschrijving']) ) echo wpautop( $newsltr['beschrijving'] );
            ?>             
            </div>
            <div class="ftr-top-newsletter"> 
            <?php if( !empty( $newsltr['form_shortcode'] ) ) echo do_shortcode($newsltr['form_shortcode']); ?>
            </div>
          </div>            
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>