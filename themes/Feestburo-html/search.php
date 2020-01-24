<?php 
get_header(); 
$cproposal = get_field('custom_proposal', 'options');
?>
<section class="page-banner page-banner-small">
  <div class="page-banner-con">
  <?php 
  if($cproposal && !empty($cproposal)):  
    $link = $cproposal['knop'];
    if( is_array( $link ) &&  !empty( $link['url'] ) ){
     printf('<a class="main-bnr-rgt-btn" href="%s" target="%s"><span>%s</span></a>', $link['url'], $link['target'], $link['title']);
    }
  endif;
  ?>
    <div class="page-banner-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/page-banner-bg-small.jpg);"></div>
    <div class="page-banner-des">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-banner-des-innr">
              <?php cbv_breadcrumbs(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <div class="product-overview-grds-wrap">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="product-overview-page-search product-overview-page-search-new">
            <div class="clearfix">
              <form>
                <input type="search" name="" placeholder="Zoek hier">
                <button>
                  <img src="<?php echo THEME_URI; ?>/assets/images/search-white-icon.svg">
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="product-overview-grds-controller">
            <?php
            if(have_posts()): ?>
              <ul class="ulc clearfix">
               <?php while(have_posts()): the_post(); ?>
                    <li>
                      <div class="subcat-meubilair-grd">
                        <span>Populair</span>
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
                    <?php
                endwhile; 
              ?>
            </ul>
            <div class="ref-overview-pagi"> 
            <?php 
              global $wp_query;

              if( $wp_query->max_num_pages > 1 ):
              $big = 999999999; // need an unlikely integer
              echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => $current,
                'total' => $wp_query->max_num_pages,
                'type'  => 'list',
                'show_all' => true,
                'prev_next' => false
              ) );
              else:
                echo '<div class="hasgap"></div>';
              endif; 
            ?>
          </div>
            <?php
            endif;  
             ?>
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