<?php 
/*
	Template Name: Products
*/
get_header(); 
?>
<section class="page-banner">
  <div class="page-banner-con">
    <a class="main-bnr-rgt-btn" href="#">Offerte aanvragen</a>
    <div class="page-banner-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/page-banner-bg.jpg);"></div>
    <div class="page-banner-des">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-banner-des-innr">
              <strong class="banner-page-title">Producten</strong>
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

<section class="product-overview-page-entry-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <div class="product-overview-cat-boxes clearfix">
            <ul class="clearfix ulc">
              <li>
                <div class="product-overview-cat-box">
                  <a class="overlay-link" href="#"></a>
                  <div>
                    <div class="pocb-hover-images">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/cat-img-svg-black-01.png">
                      </i>
                      <em><img src="<?php echo THEME_URI; ?>/assets/images/cat-img-svg-white-01.png"></em>
                    </div>
                   <h5>Meubilair</h5>
                  </div>
                </div>
              </li>
              <li>
                <div class="product-overview-cat-box">
                  <a class="overlay-link" href="#"></a>
                  <div>
                    <div class="pocb-hover-images">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/cat-img-svg-black-02.png">
                      </i>
                      <em><img src="<?php echo THEME_URI; ?>/assets/images/cat-img-svg-white-02.png"></em>
                    </div>
                   <h5>Fotografie</h5>
                  </div>
                </div>
              </li>
              <li>
                <div class="product-overview-cat-box">
                  <a class="overlay-link" href="#"></a>
                  <div>
                    <div class="pocb-hover-images">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/cat-img-svg-black-03.png">
                      </i>
                      <em><img src="<?php echo THEME_URI; ?>/assets/images/cat-img-svg-white-03.png"></em>
                    </div>
                   <h5>Drank / Catering</h5>
                  </div>
                </div>
              </li>
              <li>
                <div class="product-overview-cat-box">
                  <a class="overlay-link" href="#"></a>
                  <div>
                    <div class="pocb-hover-images">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/cat-img-svg-black-04.png">
                      </i>
                      <em><img src="<?php echo THEME_URI; ?>/assets/images/cat-img-svg-white-04.png"></em>
                    </div>
                   <h5>Decoratie</h5>
                  </div>
                </div>
              </li>
              <li>
                <div class="product-overview-cat-box">
                  <a class="overlay-link" href="#"></a>
                  <div>
                    <div class="pocb-hover-images">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/cat-img-svg-black-05.png">
                      </i>
                      <em><img src="<?php echo THEME_URI; ?>/assets/images/cat-img-svg-white-05.png"></em>
                    </div>
                   <h5>Vervoer</h5>
                  </div>
                </div>
              </li>
            </ul>
        </div>

        <div class="product-overview-page-search">
          <form>
            <input type="search" name="" placeholder="Zoek hier">
            <button>
              <img src="<?php echo THEME_URI; ?>/assets/images/search-white-icon.svg">
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="product-overview-grd-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="product-overview-grd-sec-hdr">
          <h1><strong>Meubilair</strong> Producten </h1>
          <p>Suspendisse sem dui, blandit eget est ac, ullamcorper pellentesque dolor. Etiam blandit sit amet arcu id egestas. Mauris eleifend nunc in nibh consequat tincidunt. Duis tristique ante vitae ex cursus, in interdum arcu feugiat.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="product-overview-grds-wrap">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="product-overview-grds-controller">
            <?php $current_term = get_queried_object();
            if( isset($current_term) && !empty($current_term->term_id)){
            	echo '<span id="catID" data-id="'.$current_term->term_id.'"></span>';
            }
            echo do_shortcode('[ajax_product_posts]'); ?>
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