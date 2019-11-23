<?php 
  $logoObj = get_field('logo_footer', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }

  $spacialArry = array(".", "/", "+", " ");$replaceArray = '';
  $adres = get_field('address', 'options');
  $gmapsurl = get_field('google_maps', 'options');
  $e_mailadres = get_field('emailaddress', 'options');
  $show_telefoon = get_field('telephone', 'options');
  $telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));
  $copyright_text = get_field('copyright_text', 'options');
  $gmaplink = !empty($gmapsurl)?$gmapsurl: 'javascript:void()';
  $bwt = get_field('bwt', 'options');

  $fburl = get_field('facebook_url', 'options');
  $insturl = get_field('instagram_url', 'options');
?>

<footer class="footer-wrap">
  <div class="ftr-main-controller" style="background:url(<?php echo THEME_URI; ?>/assets/images/ftr-bg.jpg)" >
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="ftr-main">
            <div class="ftr-head">
              <h3><strong>Offerte</strong> Aanvragen</h3>
              <p>Suspendisse sem dui, blandit eget est ac, ullamcorper pellentesque dolor. Etiam blandit sit amet arcu id egestas.</p>
              <a href="#"><span>Offerte aanvragen</span></a>
            </div>            
            <div class="ftr-col-wrp hide-xs clearfix">
              <div class="ftr-col-1 ftr-col">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php echo $logo_tag; ?>
                </a>
              </div>
              <div class="ftr-col-2 ftr-col">
              <?php 
                $fmenuOptions = array( 
                    'theme_location' => 'cbv_main_menu', 
                    'menu_class' => 'ulc',
                    'container' => 'fnav',
                    'container_class' => 'fnav'
                  );
                wp_nav_menu( $fmenuOptions ); 
              ?>
              </div>
              <div class="ftr-col-3 ftr-col">
                <?php 
                  $fpmenuOptions = array( 
                      'theme_location' => 'cbv_top_menu', 
                      'menu_class' => 'ulc clearfix',
                      'container' => 'spnav',
                      'container_class' => 'spnav'
                    );
                  wp_nav_menu( $fpmenuOptions ); 
                ?>
                <div class="ftr-social">
                  <ul class="ulc clearfix">
                    <?php if(!empty($fburl)): ?>
                    <li>
                      <a href="<?php echo esc_url($fburl); ?>" target="_blank">
                        <i>
                          <svg class="ftr-fb-svg" width="16" height="16" viewBox="0 0 16 16" fill="white">
                            <use xlink:href="#ftr-fb-svg"></use>
                          </svg> 
                        </i>
                      </a>
                    </li>
                    <?php endif; if(!empty($insturl)): ?>
                    <li>
                      <a href="<?php echo esc_url($insturl); ?>" target="_blank">
                        <i>
                          <svg class="ftr-instra-svg" width="16" height="16" viewBox="0 0 16 16" fill="white">
                            <use xlink:href="#ftr-instra-svg"></use>
                          </svg> 
                        </i>
                      </a>
                    </li>
                    <?php endif; ?>
                  </ul>
                </div>              
              </div>
              <div class="ftr-col-4 ftr-col">
                <ul class="ulc">
                <?php 
                  if( !empty( $adres ) ) printf('<li><strong>Feestburo</strong><a href="%s">%s</a></li>', $gmaplink, $adres); 
                  if( !empty( $show_telefoon ) ) printf('<li><a href="tel:%s">%s</a></li>', $telefoon, $show_telefoon); 
                  if( !empty( $e_mailadres ) ) printf('<li><a href="mailto:%s">%s</a></li>', $e_mailadres, $e_mailadres); 
                  if( !empty( $bwt ) ) printf('<li><span>%s</span></li>', $bwt); 
                ?>
                </ul>              
              </div>
            </div>
            <div class="ftr-col-wrp-xs show-xs clearfix">
              <div class="ftr-xs-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php echo $logo_tag; ?>
                </a>
              </div>
              <div class="ftr-xs-links">
                <?php
                _e( '<span>Navigatie</span>', THEME_NAME ); 
                  $mbmenuOptions = array( 
                      'theme_location' => 'cbv_mobile_menu', 
                      'menu_class' => 'ulc',
                      'container' => 'mbnav',
                      'container_class' => 'mbnav'
                    );
                  wp_nav_menu( $mbmenuOptions ); 
                ?>
              </div>
              <div class="ftr-xs-contact">
                <div class="ftr-xs-contact-spn-wrp">
                  <?php _e( '<span>Contact</span>', THEME_NAME ); ?>
                </div>           
                <ul class="ulc">
                <?php 
                  if( !empty( $adres ) ) printf('<li><strong>Feestburo</strong><a href="%s">%s</a></li>', $gmaplink, $adres); 
                  if( !empty( $show_telefoon ) ) printf('<li><a href="tel:%s">%s</a></li>', $telefoon, $show_telefoon); 
                  if( !empty( $e_mailadres ) ) printf('<li><a href="mailto:%s">%s</a></li>', $e_mailadres, $e_mailadres); 
                  if( !empty( $bwt ) ) printf('<li><span>%s</span></li>', $bwt); 
                ?>
                </ul>           
              </div>     
              <div class="ftr-social">
                <?php if(!empty($fburl)): ?>
                <a href="<?php echo esc_url($fburl); ?>" target="_blank">
                  <i>
                    <svg class="ftr-fb-svg" width="16" height="16" viewBox="0 0 16 16" fill="white">
                      <use xlink:href="#ftr-fb-svg"></use>
                    </svg> 
                  </i>
                </a>
                <?php endif; if(!empty($insturl)): ?>
                <a href="<?php echo esc_url($insturl); ?>" target="_blank">
                  <i>
                    <svg class="ftr-instra-svg" width="16" height="16" viewBox="0 0 16 16" fill="white">
                      <use xlink:href="#ftr-instra-svg"></use>
                    </svg> 
                  </i>
                </a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ftr-btm clearfix">
          <div class="ftr-btm-lft">        
            <?php if( !empty( $copyright_text ) ) printf( '<span>%s</span>', $copyright_text); ?>
            <?php 
              $ftmenuOptions = array( 
                  'theme_location' => 'cbv_ftb_menu', 
                  'menu_class' => 'ulc clearfix',
                  'container' => 'ftbnav',
                  'container_class' => 'ftbnav'
                );
              wp_nav_menu( $ftmenuOptions ); 
            ?>  
          </div>
          <div class="sm-ftr-copyright show-sm">
            <?php if( !empty( $copyright_text ) ) printf( '<span>%s</span>', $copyright_text); ?>
          </div>
          <div class="ftr-btm-rgt">
            <a href="#">webdesign by conversal</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>



<!-- <div class="home-bnr-xs-nav-bar-controller show-xs">
  <div class="xs-menu-btn-bar clearfix">
      <div class="xs-menu-btn-contact">
        <a href="#">
          <i><img src="<?php echo THEME_URI; ?>/assets/images/cart-xs-icon.svg"></i>
        </a>
      </div>
      <div class="nav-opener">
       <div class="nav-opener-btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <strong>MENU</strong>
     </div>
  </div>
</div>

<div class="xs-popup-main-menu-controller">
    <div class="xs-popup-logo">
      <a href="#"><img src="<?php echo THEME_URI; ?>/assets/images/logo.svg"></a>
    </div>
    <div class="hdr-btm-nav">
      <ul class="clearfix ulc">
        <li><a href="#">products</a></li>
        <li><a href="#">Wi-Fi / LAN</a></li>
      </ul>
    </div>
    <nav class="xs-popup-main-nav clearfix">
      <ul class="clearfix ulc">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us </a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
    <div class="hdr-search">
      <form>
        <input type="search" name="" placeholder="Search">
        <button>
          <em><img src="<?php echo THEME_URI; ?>/assets/images/search-icon.svg"></em>
        </button>
      </form>
    </div>
    <div class="hdr-cart-btn">
      <em><img src="<?php echo THEME_URI; ?>/assets/images/cart-icon-white.svg">Shopping Cart</em>
    </div>
    <div class="nw-lang">
      <ul class="ulc">
        <li class="lag-active"><a href="#">EN </a></li>
        <li><a href="#">ES</a></li>
      </ul>
    </div>
    <div class="xs-menu-btn-bar-popup">
      <div class="xs-menu-btn-bar clearfix">
        <div class="xs-menu-btn-contact">
          <a href="#">
            <i><img src="<?php echo THEME_URI; ?>/assets/images/cart-xs-icon.svg"></i>
          </a>
        </div>
        <div class="nav-opener">
         <div class="nav-opener-btn">
            <img src="<?php echo THEME_URI; ?>/assets/images/close-icon.svg">
          </div>
          <strong>CLOSE</strong>
       </div>
      </div>
    </div>
</div> -->

<div class="xs-ftr-btm-red-lnc-wrp show-xs">
  <div class="ftr-btm-xs-gap-con" style="display: none;">
    <div class="xs-ftr-btm-red-lnc">
      <a href="#">OFFERTE AANVRAGEN</a>
    </div> 
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>