<?php 
/*
  Template Name: Referenties
*/
get_header(); 
get_template_part( 'templates/page', 'banner' );

$type_taxs = get_terms( array(
    'taxonomy' => 'referenties_type',
    'hide_empty' => false
) );
$terms = get_terms( array(
    'taxonomy' => 'referenties_cat',
    'hide_empty' => false
) );
?>
<section class="ref-overview-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ref-overview-innr">
          <div class="ref-overview-filter-wrp">
            <div class="ref-overview-filter-main">
              <form action="" method="get">
                <ul class="ulc clearfix">
                  <li>
                    <div class="ref-overview-slct">
                      
                      <label>Feesttype</label> 
                       <?php if ( ! empty( $type_taxs ) && ! is_wp_error( $type_taxs ) ){ ?>
                      <div class="select-input">
                        <div class="select-dep">
                          <select name="type" class="selectpicker">
                            <option value="">Kiezen Feesttype</option>
                            <?php foreach ( $type_taxs as $type_tax ) { ?>
                            <option value="<?php echo $type_tax->slug; ?>"><?php echo $type_tax->name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                  </li>
                  <li>
                    <div class="ref-overview-slct">
                      <label>Producten gehuurd</label> 
                      <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
                      <div class="select-input">
                        <div class="select-dep">
                          <select name="rented" class="selectpicker">
                            <option value="">Kiezen gehuurd</option>
                            <?php foreach ( $terms as $term ) { ?>
                            <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                  </li>
                  <li>
                    <button type="submits">Filter</button>
                  </li>
                </ul>                
              </form>
            </div>
          </div>
          <?php 
            $typeslug = $rentedslug = '';
            if(isset($_GET['type']) && empty($_GET['type']) && isset($_GET['rented']) && empty($_GET['rented'])):
              echo '<script>alert("Select at least one.");</script>';
            endif;

            if( isset($_GET['type']) && !empty($_GET['type']) ){
              $typeslug = $_GET['type'];
            }
            if( isset($_GET['rented']) && !empty($_GET['rented']) ){
              $rentedslug = $_GET['rented'];
            }

          
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            if( !empty($typeslug) && empty($rentedslug) ):
              $args = array( 
                'post_type'=> 'referentie',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'paged' => $paged,
                'order'=> 'DESC',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'referenties_type',
                    'field' => 'slug',
                    'terms' => $typeslug
                  )
                )
              ); 
            elseif( !empty($rentedslug) && empty($typeslug) ):
              $args = array( 
                'post_type'=> 'referentie',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'paged' => $paged,
                'order'=> 'DESC',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'referenties_cat',
                    'field' => 'slug',
                    'terms' => $rentedslug
                  )
                )
              ); 
            elseif( !empty($rentedslug) && !empty($typeslug) ):
              $args = array( 
                'post_type'=> 'referentie',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'paged' => $paged,
                'order'=> 'DESC',
                'tax_query' => array(
                  'relation' => 'AND',
                  array(
                    'taxonomy' => 'referenties_type',
                    'field' => 'slug',
                    'terms' => $typeslug
                  ),
                  array(
                    'taxonomy' => 'referenties_cat',
                    'field' => 'slug',
                    'terms' => $rentedslug
                  ),
                )
              ); 
            elseif( empty($rentedslug) && empty($typeslug) ):
              $args = array( 
                'post_type'=> 'referentie',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'paged' => $paged,
                'order'=> 'DESC'
              ); 
            endif;

            $refQuery = new WP_Query($args);

            if( $refQuery->have_posts() ):
          ?>
          <div class="ref-overview-grd-wrp">
            
            <ul class="ulc clearfix">
            <?php $i = 1; 
              while($refQuery->have_posts()): $refQuery->the_post(); 
              $gridImage = get_post_thumbnail_id(get_the_ID());
              if(!empty($gridImage)){
                $refImgsrc = cbv_get_image_src($gridImage, 'refgrid');
              }else{
                $refImgsrc = THEME_URI.'/assets/images/refer-sm-grid.png';;
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
          <?php else: ?>
            <div class="hasgap"></div>
          <?php endif;wp_reset_postdata(); ?>
        </div> 
      </div>
    </div>
  </div>
</section>

<?php 
get_template_part( 'templates/footer', 'newsletter' );

get_footer(); 
?>