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
          <?php 
            $spacialArry = array(".", "/", "+", " ");$replaceArray = '';
            $contact = get_field('contactinfo', 'options');
            $gmapsurl = $contact['google_maps'];

            $address = $contact['address'];
            $emailadres = $contact['emailaddress'];
            $btw = $contact['btw'];
            $show_telefoon_1 = $contact['telephone_1'];
            $telefoon_1 = trim(str_replace($spacialArry, $replaceArray, $show_telefoon_1));

            $show_telefoon_2 = $contact['telephone_2'];
            $telefoon_2 = trim(str_replace($spacialArry, $replaceArray, $show_telefoon_2));
            $gmaplink = !empty($gmapsurl)?$gmapsurl: 'javascript:void()';
          ?>
          <div class="contact-form-rgt clearfix">
            <div class="contact-form-rgt-btn">
              <?php if( !empty($show_telefoon_1) ): ?>
              <a href="tel:<?php echo $telefoon_1; ?>">
               <i>
                <svg class="contact-telephone-svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
                  <use xlink:href="#contact-telephone-svg"></use>
                </svg> 
              </i>
               <?php echo $show_telefoon_1; ?>
              </a>
              <?php endif; ?>
              <?php if( !empty($show_telefoon_2) ): ?>
              <a href="tel:<?php echo $telefoon_2; ?>">
                <i>
                <svg class="contact-telephone-svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
                  <use xlink:href="#contact-telephone-svg"></use>
                </svg> 
              </i>
               <?php echo $show_telefoon_2; ?>
              </a>
              <?php endif; ?>
            </div>
            <div class="contact-info">
              <div class="ftr-col ftr-col-4">
                <h6><span>Contact<b>.</b></span></h6>
                <ul class="ulc">
                  <?php if( !empty($emailadres) ) printf('<li><a href="mailto:%s">%s</a></li>', $emailadres, $emailadres); ?>
                  <?php if( !empty($address) ) printf('<li><a href="%s">%s</a></li>', $gmaplink, $address); ?>
                  <?php if( !empty($btw) ) printf('<li><span>%s</span></li>', $btw); ?>
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