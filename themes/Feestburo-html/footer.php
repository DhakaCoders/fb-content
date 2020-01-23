<?php 
  $cproposal = get_field('custom_proposal', 'options');
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
  $smedias = get_field('sociale_media', 'options');
?>

<footer class="footer-wrap">
  <div class="ftr-main-controller" style="background:url(<?php echo THEME_URI; ?>/assets/images/ftr-bg.jpg)" >
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="ftr-main">
            <?php if($cproposal && !empty($cproposal)): ?>
            <div class="ftr-head">
              <?php 
              if(!empty($cproposal['titel'])) printf('<h3>%s</h3>', $cproposal['titel']);
              if(!empty($cproposal['beschrijving'])) echo wpautop( $cproposal['beschrijving'], true );
              $link = $cproposal['knop'];
              if( is_array( $link ) &&  !empty( $link['url'] ) ){
               printf('<a class="requestbtn" href="%s" target="%s"><span>%s</span></a>', $link['url'], $link['target'], $link['title']);
              }
              ?>
            </div>  
            <?php endif; ?>          
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
                <?php if($smedias): ?>
                <div class="ftr-social">
                  <ul class="ulc clearfix">
                    <?php foreach($smedias as $smedia): ?>
                    <li>
                      <a target="_blank" href="<?php echo $smedia['url']; ?>">
                        <?php echo $smedia['icon']; ?>
                      </a>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </div>              
              </div>
              <?php endif; ?>
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
              <div class="ftr-social ftsm">
                <?php 
                  if(!empty($smedias)): 
                  foreach($smedias as $smedia): ?>
                  <a target="_blank" href="<?php echo $smedia['url']; ?>">
                    <?php echo $smedia['icon']; ?>
                  </a>
                <?php 
                  endforeach; 
                  endif; 
                ?>
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
<?php if($cproposal && !empty($cproposal)): ?>
<div class="xs-ftr-btm-red-lnc-wrp show-xs">
  <div class="ftr-btm-xs-gap-con">
    <div class="xs-ftr-btm-red-lnc">
      <?php 
        $link = $cproposal['knop'];
        if( is_array( $link ) &&  !empty( $link['url'] ) ){
         printf('<a href="%s" target="%s"><span>%s</span></a>', $link['url'], $link['target'], $link['title']);
        }
      ?>
    </div> 
  </div>
</div>
<?php endif;?>
<?php wp_footer(); ?>
</body>
</html>