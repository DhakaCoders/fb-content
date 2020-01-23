<?php
$reqprice = get_field('request_price', 'options');
if( $reqprice ):
  if(!empty($reqprice['afbeelding'])){
    $rqpimg = cbv_get_image_src($reqprice['afbeelding']);
  }else{
    $rqpimg = '';
  }
?>
<section class="pd-request-price-sec">
  <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="sub-cat-request-price" style="background:url(<?php echo $rqpimg; ?>)">
            <?php 
              if(!empty($reqprice['titel'])) printf('<h3>%s</h3>', $reqprice['titel']);
              if(!empty($reqprice['beschrijving'])) echo wpautop( $reqprice['beschrijving'], true );
              $knop = $reqprice['knop'];
              if( is_array( $knop ) &&  !empty( $knop['url'] ) ){
               printf('<a href="%s" target="%s"><span>%s</span></a>', $knop['url'], $knop['target'], $knop['title']);
              }
            ?>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php endif; ?>