<?php 
get_header(); 
while ( have_posts() ) :
  the_post();
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
              <strong class="banner-page-title">Meubilair</strong>
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


<section class="innerpage-con-wrap">
  <?php if(have_rows('inhoud')){  ?>
  <div class="container-sm">
    <div class="row">
      <div class="col-sm-12">
        <article class="default-page-con">
          <?php 
            while ( have_rows('inhoud') ) : the_row(); 
          if( get_row_layout() == 'introductietekst' ){
              $title = get_sub_field('titel');
              $subtitel = get_sub_field('subtitel');
              $afbeelding = get_sub_field('afbeelding');
              echo '<div class="dfp-promo-module clearfix">';
                if( !empty($title) ) printf('<h1>%s</h1>', $title);
                if( !empty($afbeelding) ){
                  echo '<div class="dfp-plate-one-img-bx">', cbv_get_image_tag($afbeelding), '</div>';
                }
                if( !empty($subtitel) ) printf('<strong>%s</strong>', $subtitel);
              echo '</div>';    
          }elseif( get_row_layout() == 'teksteditor' ){
              $beschrijving = get_sub_field('fc_teksteditor');
              echo '<div class="dfp-text-module clearfix">';
                if( !empty( $beschrijving ) ) echo wpautop($beschrijving);
              echo '</div>';    
            }elseif( get_row_layout() == 'afbeelding_tekst' ){
              $fc_afbeelding = get_sub_field('fc_afbeelding');
              $imgsrc = cbv_get_image_src($fc_afbeelding, 'dfpageg1');
              $fc_tekst = get_sub_field('fc_tekst');
              $positie_afbeelding = get_sub_field('positie_afbeelding');
              $imgposcls = ( $positie_afbeelding == 'right' ) ? 'fl-dft-rgtimg-lftdes' : '';
              echo '<div class="fl-dft-overflow-controller">
                <div class="fl-dft-lftimg-rgtdes clearfix equalHeight '.$imgposcls.'">';
                      echo '<div class="fl-dft-lftimg-rgtdes-lft matchHeightCol" style="background: url('.$imgsrc.');"></div>';
                      echo '<div class="fl-dft-lftimg-rgtdes-rgt matchHeightCol">';
                        echo wpautop($fc_tekst);
                      echo '</div>';
              echo '</div></div>';      
            }elseif( get_row_layout() == 'galerij' ){
              $gallery_cn = get_sub_field('afbeeldingen');
              $lightbox = get_sub_field('lightbox');
              $kolom = get_sub_field('kolom');
              if( $gallery_cn ):
              echo "<div class='gallery-wrap clearfix'><div class='gallery gallery-columns-{$kolom}'>";
                foreach( $gallery_cn as $image ):
                $imgsrc = cbv_get_image_src($image['ID'], 'dfpageg1');  
                echo "<figure class='gallery-item'><div class='gallery-icon portrait'>";
                if( $lightbox ) echo "<a data-fancybox='gallery' href='{$image['url']}'>";
                    //echo '<div class="dfpagegalleryitem" style="background: url('.$imgsrc.');"></div>';
                    echo wp_get_attachment_image( $image['ID'], 'dfpageg1' );
                if( $lightbox ) echo "</a>";
                echo "</div></figure>";
                endforeach;
              echo "</div></div>";
              endif;      
            }elseif( get_row_layout() == 'usps' ){
              $fc_usps = get_sub_field('fc_usps');
              echo "<div class='dft-img-title-grd-controller clearfix dftImgTitleGrdSlider'>";
                foreach( $fc_usps as $usp ):
                  echo "<div class='dft-img-title-grd-col'><div class='dft-img-title-grd-col-inner'>";
                    echo "<span>";
                    echo wp_get_attachment_image( $usp['icon'] );
                    echo "</span>";
                    printf('<div><h5>%s</h5>', $usp['titel']);
                    if( !empty( $usp['beschrijving'] ) ) echo wpautop($usp['beschrijving']).'</div>';
                  echo "</div></div>";
                endforeach;
              echo "</div>";
            }elseif( get_row_layout() == 'quote' ){
              $fc_diensten = get_sub_field('fc_quote');
              $achtergrond_links = get_sub_field('achtergrond_links');
              $achtergrond_rechts = get_sub_field('achtergrond_rechts');
              $bglinks = cbv_get_image_src($achtergrond_links, 'dfpageg1');
              $bgrechts = cbv_get_image_src($achtergrond_rechts, 'dfpageg1');
              echo "<div class='dft-blockquote-module clearfix'>";
              echo '<div class="dft-blockquote-img matchHeightCol" style="background-image: url('.$bgrechts.');"></div>';
              echo '<div class="dft-blockquote matchHeightCol" style="background-image: url('.$bglinks.');">';
              printf('<blockquote>%s</blockquote>', $fc_diensten);
              echo "</div></div>";
            }elseif( get_row_layout() == 'promo' ){
              $fc_title = get_sub_field('fc_title');
              $fc_beschrijving = get_sub_field('fc_beschrijving');
              $fc_knop = get_sub_field('fc_knop');
              $achtergrond = get_sub_field('achtergrond');
              echo "<div class='dft-bnr-con' style='background-image: url({$achtergrond});'>";
              printf('<h3>%s</h3>', $fc_title);
              echo wpautop( $beschrijving );
              printf('<a target="%s" href="%s">%s</a>', $fc_knop['target'], $fc_knop['url'], $fc_knop['title']);
              echo "</div>";
            }elseif( get_row_layout() == 'table' ){
              $fc_table = get_sub_field('fc_table');
              cbv_table($fc_table);
            }elseif( get_row_layout() == 'product' ){
              $fc_product = get_sub_field('fc_product');
              $memQuery = new WP_Query(array(
                'post_type' => 'product',
                'posts_per_page'=> -1,
                'post__in' => $fc_product
              ));
              if( $memQuery->have_posts() ):
                echo '<div class="dft-2grd-img-content clearfix"><div class="dft2grdImgConSlider">';
                        while($memQuery->have_posts()): $memQuery->the_post();
                        $gridImage = get_post_thumbnail_id(get_the_ID());
                        if(!empty($gridImage)){
                          $pimgScr = cbv_get_image_src($gridImage, 'pgprodgrid');
                        }else{
                          $pimgScr = '';
                        }  
                        $term_obj_list = get_the_terms( get_the_ID(), 'product_cat' );
                        echo '<div class="dft-2grd-img-con-item-col">';
                        echo '<div class="dft-img-col-hover-scale">
                          <a class="overlay-link" href="'.get_the_permalink().'"></a>';
                        echo '<div class="dft-2grd-img-con-item-img" style="background-image: url('.$pimgScr.');"></div></div>';
                        echo '<div class="dft-2grd-img-con-item-des">';
                        if ( $term_obj_list && ! is_wp_error( $term_obj_list ) ) : 
                          printf('<strong>%s</strong>', join(', ', wp_list_pluck($term_obj_list, 'name')));
                        endif;
                        printf('<h4><a href="%s">%s</a></h4>', get_the_permalink(), get_the_title());
                        echo wpautop( get_the_excerpt(), true );;
                        echo '<a href="'.get_the_permalink().'">More Info <em><img src="'.THEME_URI.'/assets/images/list-icon.svg"></em></a>';
                        echo '</div>';
                        echo '</div>';
                    endwhile;

                echo '</div></div> <div class="dft-2grd-img-content-separetor"></div>';
              endif; wp_reset_postdata();
            }elseif( get_row_layout() == 'horizontal_rule' ){
              $fc_horizontal_rule = get_sub_field('fc_horizontal_rule');
              echo '<div class="dft-2grd-img-content-separetor" style="height:'.$fc_horizontal_rule.'px"></div>';
            }elseif( get_row_layout() == 'afbeelding' ){
              $fc_afbeelding = get_sub_field('fc_afbeelding');
              if( !empty( $fc_afbeelding ) ){
                printf('<div class="df-page-simage">%s</div>', cbv_get_image_tag($fc_afbeelding));
              }
            }elseif( get_row_layout() == 'horizontal_rule' ){
              $rheight = get_sub_field('fc_horizontal_rule');
              printf('<div class="dfhrule clearfix" style="height: %spx;"></div>', $rheight);
          
            }elseif( get_row_layout() == 'gap' ){
             $gap = get_sub_field('fc_gap');
             printf('<div class="gap clearfix" data-value="20" data-md="20" data-sm="20" data-xs="10" data-xxs="10"></div>', $rheight);
            }
          
           endwhile;?>
        </article>

      </div>
    </div>
  </div>
<?php } ?>
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
<?php endwhile; get_footer(); ?>