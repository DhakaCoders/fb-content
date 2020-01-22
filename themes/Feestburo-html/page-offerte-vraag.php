<?php 
/*
  Template Name: Offerte Vraag
*/
get_header(); 
$thisID = get_the_ID();
get_template_part( 'templates/page', 'banner' );
?>

<?php 
  $offerte = get_field('offerte', $thisID);
?>
<section class="offter-vraag-content-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="ov-enti-hdr-wrp">
          <div class="ov-enti-hdr-dsc">
            <?php 
              if( !empty( $offerte['titel'] ) ) printf('<h1>%s</h1>', $offerte['titel']); 
              if( !empty( $offerte['beschrijving'] ) ) echo wpautop( $offerte['beschrijving'] );
            ?>
          </div>
        </div>
        <div class="ov-checkmark-box-wrp">
          <h4>Kies wat je wil</h4>
          <div class="ov-checkmark-box-inr clearfix">
          <?php 
          if( !empty( $offerte['form_shortcode'] ) ) echo do_shortcode($offerte['form_shortcode']); 
          ?>
            <ul class="clearfix">
              <li>
                <div class="ov-checkmark-box-grid">
                  <div class="ov-checkmark-box-dsc">
                    <a href="#">
                      <i>
                        <svg class="offer-error-icon-svg" width="18" height="18" viewBox="0 0 18 18" fill="#C4C4C4">
                          <use xlink:href="#offer-error-icon-svg"></use>
                        </svg>
                     </i>
                    </a>
                    <span>
                      <i>
                        <svg class="offer-chair-table-icon-svg" width="41" height="22" viewBox="0 0 41 22" fill="#0C1421">
                          <use xlink:href="#offer-chair-table-icon-svg"></use>
                        </svg>
                     </i>
                    </span>
                    <h5>Meubilair</h5>
                  </div>
                  <div class="inputtype-checkbox-wrp matchHeightCol clearfix">
                    <div class="clearfix">
                      <div class="inputtype-checkbox">
                        <label class="container">Meubilair<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">eestmaterialen<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Decorat<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="ov-checkmark-box-grid">
                  <div class="ov-checkmark-box-dsc">
                    <a href="#">
                      <i>
                        <svg class="offer-error-icon-svg" width="18" height="18" viewBox="0 0 18 18" fill="#C4C4C4">
                          <use xlink:href="#offer-error-icon-svg"></use>
                        </svg>
                     </i>
                    </a>
                    <span>
                      <i>
                        <svg class="offer-camera-icon-svg" width="28" height="24" viewBox="0 0 28 24" fill="#0C1421">
                          <use xlink:href="#offer-camera-icon-svg"></use>
                        </svg>
                      </i>
                    </span>
                    <h5>Fotografie</h5>
                  </div>
                  <div class="inputtype-checkbox-wrp matchHeightCol clearfix">
                    <div class="clearfix">
                      <div class="inputtype-checkbox">
                        <label class="container">Feestflitser<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Feestspiegel<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Feestboomeran<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Feestbabbelaar<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Retro booth<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Limo booth<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="ov-checkmark-box-grid">
                  <div class="ov-checkmark-box-dsc">
                    <a href="#">
                      <i>
                        <svg class="offer-error-icon-svg" width="18" height="18" viewBox="0 0 18 18" fill="#C4C4C4">
                          <use xlink:href="#offer-error-icon-svg"></use>
                        </svg>
                     </i>
                    </a>
                    <span>
                      <i>
                         <svg class="offer-drinks-icon-svg" width="23" height="32" viewBox="0 0 23 32" fill="#0C1421">
                          <use xlink:href="#offer-drinks-icon-svg"></use>
                        </svg>
                     </i>
                   </span>
                    <h5>Drank & Catering</h5>
                  </div>
                  <div class="inputtype-checkbox-wrp matchHeightCol clearfix">
                    <div class="clearfix">
                      <div class="inputtype-checkbox">
                        <label class="container">Cocktailbar<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Feestoesterman<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="ov-checkmark-box-grid">
                  <div class="ov-checkmark-box-dsc">
                    <a href="#">
                      <i>
                        <svg class="offer-error-icon-svg" width="18" height="18" viewBox="0 0 18 18" fill="#C4C4C4">
                          <use xlink:href="#offer-error-icon-svg"></use>
                        </svg>
                     </i>
                    </a>
                    <span>
                      <i>
                        <svg class="offer-birthday-icon-svg" width="34" height="34" viewBox="0 0 34 34" fill="#0C1421">
                          <use xlink:href="#offer-birthday-icon-svg"></use>
                        </svg>
                      </i>
                    </span>
                    <h5>Decoratie</h5>
                  </div>
                  <div class="inputtype-checkbox-wrp matchHeightCol  clearfix">
                    <div class="clearfix">
                      <div class="inputtype-checkbox">
                        <label class="container">Feestlichtbox<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Feestletters <i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Feestballon<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="ov-checkmark-box-grid">
                  <div class="ov-checkmark-box-dsc">
                    <a href="#">
                      <i>
                        <svg class="offer-error-icon-svg" width="18" height="18" viewBox="0 0 18 18" fill="#C4C4C4">
                          <use xlink:href="#offer-error-icon-svg"></use>
                        </svg>
                     </i>
                    </a>
                    <span>
                      <i>
                        <svg class="offer-car-icon-svg" width="60" height="60" viewBox="0 0 60 60" fill="#0C1421">
                          <use xlink:href="#offer-car-icon-svg"></use>
                        </svg>
                     </i>
                   </span>
                    <h5>vervoer</h5>
                  </div>
                  <div class="inputtype-checkbox-wrp matchHeightCol clearfix">
                    <div class="clearfix">
                      <div class="inputtype-checkbox">
                        <label class="container">Bruidswagens<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Volgwagens<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Bussen<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Feestkarretje<i><img src="<?php echo THEME_URI; ?>/assets/images/error-smail-icon.svg"></i> 
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="checkmark-btn">
            <a class="checkmarkbtn" href="#" data-to="#section-2">prijs aanvragen</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of offter-vraag-content-sec-wrp -->



<section class="contact-form-sec-wrp offer-vrg-form-sec-wrp" id="section-2">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="contact-form-wrp clearfix">
          <div class="contact-form">
            <form class="wpforms-form">
              <div class="wpforms-field-container">
                <div class="wpforms-field">
                  <div class="wpforms-field-row">
                    <div class="wpforms-one-half">
                      <label class="wpforms-field-label">naam</label>
                      <input type="text" name="" placeholder="naam" class="wpforms-field-required">
                    </div>
                    <div class="wpforms-one-half">
                      <label class="wpforms-field-label">Adres</label>
                      <input type="text" name="" placeholder="Adres + Gemeente"  class="wpforms-field-required">
                    </div>
                  </div>
                </div>
                <div class="wpforms-field">
                  <div class="wpforms-field-row">
                    <div class="wpforms-one-half">
                      <label class="wpforms-field-label">Telefoon</label>
                      <input type="text" name="" placeholder="Telefoon" class="wpforms-field-required">
                    </div>
                    <div class="wpforms-one-half">
                      <label class="wpforms-field-label">E-mailadres</label>
                      <input type="text" name="" placeholder="E-mailadres" class="wpforms-field-required">
                    </div>
                  </div>
                </div>
                <div class="wpforms-field">
                  <div class="wpforms-field-row">
                    <div class="wpforms-one-half">
                      <label class="wpforms-field-label">Evenement Datum</label>
                      <input type="text" name="" placeholder="De datum van mijn evenement" class="wpforms-field-required">
                    </div>
                    <div class="wpforms-one-half">
                      <label class="wpforms-field-label">Evenement Locatie</label>
                      <input type="text" name="" placeholder="De locatie van mijn evenement (adres + gemeente)" class="wpforms-field-required">
                    </div>
                  </div>
                </div>
                <div class="wpforms-field">
                  <div class="wpforms-field-row">
                    <div class="fullwidth">
                      <label class="wpforms-field-label">Hoe heeft u onze website gevonden?</label>
                      <input type="email" name="" placeholder="Hoe heeft u onze website gevonden?" class="wpforms-field-required">
                    </div>
                  </div>
                </div>
                <div id="wpforms-723-field_1-container" class="wpforms-field wpforms-field-text 1in2col" data-field-id="1">
                 <label class="wpforms-field-label" for="wpforms-723-field_1">Wat voor type evenement organiseert u?</label>
                  <div class="select-box check-box">
                    <select class="round">
                      <option>Wat voor type evenement organiseert u?</option>
                      <option>Wat voor type evenement organiseert u?</option>
                      <option>Wat voor type evenement organiseert u?</option>
                    </select>
                  </div>
                </div>
                <div class="wpforms-field">
                  <div class="wpforms-one-half">
                    <label class="wpforms-field-label">Extra vragen of opmerkingen</label>
                    <textarea placeholder="Extra vragen of opmerkingen"></textarea>
                  </div>
                </div>
              </div>
              <div class="wpforms-submit-container"><input name="wpforms[id]" type="hidden" value="723" />
                <input name="wpforms[author]" type="hidden" value="2" />
                <input name="wpforms[post_id]" type="hidden" value="14" />
                <button id="wpforms-submit-723" class="wpforms-submit " name="wpforms[submit]" type="submit" value="wpforms-submit" data-alt-text="Sending..." data-submit-text="Verzenden">Verstuur</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of contact-form-sec-wrp -->


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