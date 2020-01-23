<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
get_header();
get_template_part( 'templates/page', 'banner' );
while ( have_posts() ) :
  the_post();
  $thisID = get_the_ID();
?>

<?php 
$excerpt = get_field('product_excerpt', $thisID); 
$gallery_pro = get_field('producten_galerij', $thisID);
?>
<section class="fl-product-single-wrap">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ref-del-back">
          <a href="javascript: history.go(-1)">terug naar overzicht</a>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="fl-product clearfix">
            <?php if( $gallery_pro OR has_post_thumbnail()): ?>
              <div class="woocommerce-product-gallery">
                <?php if(has_post_thumbnail()): ?>
                <div class="woocommerce-product-gallery__image">
                    <a class="woocommerce-main-image fancybox" href="#">
                      <?php echo wp_get_attachment_image( get_post_thumbnail_id($thisID), 'dfpageg1' ); ?>
                    </a>
                </div>
                  <?php endif; if($gallery_pro): foreach( $gallery_pro as $image ): ?>
                  <div class="woocommerce-product-gallery__image">
                    <a class="woocommerce-main-image fancybox" href="#">
                      <?php echo wp_get_attachment_image( $image['ID'], 'dfpageg1' ); ?>
                    </a>
                  </div>
                  <?php endforeach; endif; ?>              
              </div>
            <?php endif; ?>
              <div class="summary entry-summary">
                <h1 class="product_title entry-title"><?php the_title(); ?></h1>
                <?php 
                    if( !empty( $excerpt ) ) echo wpautop($excerpt);
                  ?>
                <div class="fl-product-summary-btns">
                  <span><a id="go-spacification" href="#">Product Specificaties</a></span>
                  <?php 
                  $knop = get_field('knop', get_the_ID());
                    if( is_array( $knop ) &&  !empty( $knop['url'] ) ){
                      printf('<span><a href="%s" target="%s">%s</a></span>', $knop['url'], $knop['target'], $knop['title']); 
                    }

                  ?>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</section>

<?php $specificaties = get_field('specificaties', $thisID); ?>
<section class="fl-product-specificaties">
  <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="fl-product-specificaties-inr" id="specificaties">
            <?php
             _e('<h2>Specificaties</h2>', THEME_NAME);
             if($specificaties):
            ?>
            <ul class="clearfix ulc">
              <?php
               $array = [1, 2, 5, 6, 9, 10, 13, 14, 17, 18, 21, 22, 25, 26, 29, 30, 33, 34, 37, 38, 41, 42];
               $i = 1; foreach( $specificaties as $specifi ): 
              $addClass = '';
              if( in_array( $i, $array)) $addClass = ' class="specificaties-row-bg"';

              ?>
              <li<?php echo $addClass; ?>>
                <div class="clearfix">
                <?php 
                if( !empty( $specifi['titel'] ) ) printf( '<strong>%s</strong>', $specifi['titel']);
                if( !empty( $specifi['value'] ) ) printf( '<span>%s</span>', $specifi['value']);
                ?>
                </div>
              </li>
              <?php $i++; endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
  </div>    
</section>

<?php 
  get_template_part( 'templates/price', 'request' );
?>

<?php 
$q = cbv_get_related_category_posts();
if ( $q->have_posts() ) {
?>
<section class="subcat-meubilair-grd-sec" id="refDel-subcat-meubilair-grd">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="subcat-meubilair-grd-innr clearfix">
          <div class="subcat-meubilair-grd-head">
            <?php _e('<h2><strong>andere </strong> producten</h2>', THEME_NAME);?>
          </div>
          <div class="subcat-meubilair-grd-main"> 
            <ul class="ulc clearfix"> 
              <?php 
              while ( $q->have_posts() ) { $q->the_post();
                $relexcerpt = get_field('product_excerpt', get_the_ID());
              ?>
              <li>
                <div class="subcat-meubilair-grd">
                  <div class="subcat-meubilair-grd-bg-wrp">
                    <?php echo wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'dfpageg1' ); ?>
                    <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                  </div>
                  <div class="subcat-meubilair-grd-des subcatGrd-matchCol" style="height: 130px;">
                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                    <?php echo wpautop( cbv_excerpt(), true ); ?>
                    <a href="<?php the_permalink(); ?>">meer info</a>
                  </div>
                </div>
              </li> 
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php wp_reset_postdata(); } ?>
<?php 

endwhile;
get_template_part( 'templates/footer', 'newsletter' );

get_footer(); 
?>