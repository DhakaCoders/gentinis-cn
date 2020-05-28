<?php
/*
  Template Name: Contact Us
*/
get_header(); 
$thisID = get_the_ID();
get_template_part( 'templates/page', 'banner' );

$intro = get_field('introsec', $thisID); 
$map = get_field('embedded_code', $thisID); 
?>
<section class="contact-form-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="contact-form-cntlr clearfix">
          <?php if( $intro ): ?>
          <div class="contact-form-lft">
            <div class="contact-form-dsc">
            <?php 
              if( !empty($intro['titel']) ) printf('<h2 class="contact-form-dsc-title">%s</h2>', $intro['titel'] );
              if(!empty($intro['beschrijving'])) echo wpautop( $intro['beschrijving'] ); 
            ?>
            </div>
            <div class="contact-form-wrp clearfix">
              <div class="wpforms-container">
                <?php if(!empty($intro['form_shortcode'])) echo do_shortcode( $intro['form_shortcode'] ); ?>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <div class="contact-form-rgt clearfix">
            <div class="contact-form-rgt-btn">
              <a href="#">
               <i>
                <svg class="contact-telephone-svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
                  <use xlink:href="#contact-telephone-svg"></use>
                </svg> 
              </i>
               0475 / 78.16.05
              </a>
              <a href="#">
                <i>
                <svg class="contact-telephone-svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
                  <use xlink:href="#contact-telephone-svg"></use>
                </svg> 
              </i>
               0496 / 51.45.70
              </a>
            </div>
            <div class="contact-info">
              <div class="ftr-col ftr-col-4">
                <h6><span>Contact<b>.</b></span></h6>
                <ul class="ulc">
                  <li><a href="mailto:info@gentinis.be">info@gentinis.be</a></li>
                  <li><a href="#">Nijverheidszone Begijnenmeers 3, <br> 1770 Liedekerke</a></li>
                  <li><span>BE0478242464</span></li>
                </ul>               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>


<section class="contact-map-sec-wrp">
  <?php if( !empty($map) ) printf('%s', $map); ?>
</section>
<?php get_template_part( 'templates/footer', 'top' ); ?>
<?php get_footer(); ?>