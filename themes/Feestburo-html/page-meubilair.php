<?php
/*
  Template Name: Meubilair
*/
get_header(); 

$thisID = get_the_ID();
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


<section class="categoty-meubilair-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="categoty-meubilair-innr clearfix">
          <div class="categoty-meubilair-two-part">
            <div class="categoty-meubilair-rgt-vdo">
              <div class="video-play-wrap">
                <div class="video-play-main">
                    <a class="img-zoom" data-fancybox="article" href="https://www.youtube.com/watch?v=b4Yx9eHfsuc">
                      <i><img src="<?php echo THEME_URI; ?>/assets/images/play.png"></i>
                      <span style="background: url(<?php echo THEME_URI; ?>/assets/images/category-video-bg.jpg);"></span>
                    </a>
                </div>
              </div>
            </div>
            <div class="categoty-meubilair-lft-des">
              <h1><strong>Meubilair</strong></h1>
              <p>Suspendisse sem dui, blandit eget est ac, ullamcorper pellentesque dolor. Etiam blandit sit amet arcu id egestas. Mauris eleifend nunc in nibh consequat tincidunt. Duis tristique ante vitae ex cursus, in interdum arcu feugiat. </p>
              <p>Nulla in arcu vel neque lobortis aliquet sit amet at nibh. Sed ut dui et tortor finibus sagittis. Nam interdum lacus a leo tempor porta. Nam finibus elementum tortor non sodales. Vivamus tincidunt urna vitae diam venenatis, non rhoncus ex lobortis.</p>
              <a href="#subcat-meubilair-grd-sec"><span>Alle producten</span></a>
            </div>            
          </div>
        </div>
        <div class="catMeubilairSlider-wrp" >
          <div class="clearfix catMeubilairSlider">
            <div class="catMeubilairSlider-item">
              <div class="catMeubilairSlider-bg-wrp">
                <div class="catMeubilairSlider-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/catMeubilairSlider-img-001.jpg)">
                  <a href="" class="overlay-link"></a>                      
                </div>
              </div>
            </div>
            <div class="catMeubilairSlider-item">
              <div class="catMeubilairSlider-bg-wrp">
                <div class="catMeubilairSlider-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/catMeubilairSlider-img-002.jpg)">
                  <a href="" class="overlay-link"></a>                      
                </div>
              </div>
            </div>
            <div class="catMeubilairSlider-item">
              <div class="catMeubilairSlider-bg-wrp">
                <div class="catMeubilairSlider-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/catMeubilairSlider-img-003.jpg)">
                  <a href="" class="overlay-link"></a>                      
                </div>
              </div>
            </div>
            <div class="catMeubilairSlider-item">
              <div class="catMeubilairSlider-bg-wrp">
                <div class="catMeubilairSlider-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/catMeubilairSlider-img-004.jpg)">
                  <a href="" class="overlay-link"></a>                      
                </div>
              </div>
            </div>
            <div class="catMeubilairSlider-item">
              <div class="catMeubilairSlider-bg-wrp">
                <div class="catMeubilairSlider-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/catMeubilairSlider-img-003.jpg)">
                  <a href="" class="overlay-link"></a>                      
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="subcat-meubilair-grd-sec subcat-meubilair-grd-sec-new" id="subcat-meubilair-grd-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="subcat-meubilair-grd-innr clearfix">
          <div class="subcat-meubilair-grd-head">
            <h2><strong>Meubilair</strong></h2>
            <p> Suspendisse sem dui, blandit eget est ac, ullamcorper pellentesque dolor. Etiam blandit sit amet arcu id egestas. Mauris eleifend nunc in nibh consequat tincidunt. Duis tristique ante vitae ex cursus, in interdum arcu feugiat.</p>
          </div>
          <div class="fb-proover-categories">

            <?php 
              $category = get_term_by('slug', 'meubilair', 'product_cat');
               

              $args = array(
              'type'                     => 'product',
              'parent'                 => $category->term_id,
              'orderby'                  => 'name',
              'order'                    => 'ASC',
              'hide_empty'               => FALSE,
              'hierarchical'             => 0,
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