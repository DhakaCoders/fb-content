<?php 
/*
  Template Name: Referenties
*/
get_header(); ?>
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


<section class="ref-overview-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ref-overview-innr">
          <div class="ref-overview-filter-wrp">
            <div class="ref-overview-filter-main">
              <form action="">
                <ul class="ulc clearfix">
                  <li>
                    <div class="ref-overview-slct">
                      <label>Feesttype</label>  
                      <div class="select-input">
                        <div class="select-dep">
                          <select class="selectpicker">
                            <option value="1">Huwelijk</option>
                            <option value="2">Huwelijk 2</option>
                            <option value="3">Huwelijk 3</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="ref-overview-slct">
                      <label>Producten gehuurd</label> 
                      <div class="select-input">
                        <div class="select-dep">
                          <select class="selectpicker">
                            <option value="1">Meubilair, Drank / Catering, Decoratie</option>
                            <option value="2">Meubilair, Drank / Catering, Decoratie 2</option>
                            <option value="3">Meubilair, Drank / Catering, Decoratie 3</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <button>Filter</button>
                  </li>
                </ul>                
              </form>
            </div>
          </div>
          <?php 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $refQuery = new WP_Query(array( 
                    'post_type'=> 'referentie',
                    'post_status' => 'publish',
                    'posts_per_page' => 6,
                    'paged' => $paged,
                    'order'=> 'DESC'
                  ) 
                );

            if( $refQuery->have_posts() ):
          ?>
          <div class="ref-overview-grd-wrp">
            
            <ul class="ulc clearfix">
            <?php $i = 1; 
              while($refQuery->have_posts()): $refQuery->the_post(); 
              $gridImage = get_post_thumbnail_id(get_the_ID());
              if(!empty($gridImage)){
                $refImgsrc = cbv_get_image_src($gridImage, 'ref_grid');
              }else{
                $refImgsrc = '';
              }         
            ?>
              <li>
                <div class="ref-overview-grd">
                  <div class="ref-overview-grd-bg-wrp">
                    <div class="ref-overview-grd-bg" style="background: url(<?php echo $refImgsrc; ?>);"></div>
                    <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                  </div>
                  <div class="ref-overview-grd-des refOvrGrd-matchCol">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>"><span>meer info</span></a>
                  </div>
                </div>
              </li>
              <?php endwhile; ?>
            </ul>
          </div>
          <div class="ref-overview-pagi"> 
            <?php 
              if( $refQuery->max_num_pages > 1 ):
              $big = 999999999; // need an unlikely integer
              echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $refQuery->max_num_pages,
                'type'  => 'list',
                'show_all' => true,
                'prev_next' => false
              ) );
              else:
                echo '<div class="hasgap"></div>';
              endif; 
            ?>
          </div>
          <?php endif;wp_reset_postdata(); ?>
        </div> 
      </div>
    </div>
  </div>
</section>


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