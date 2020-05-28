<?php 
  $spacialArry = array(".", "/", "+", " ");$replaceArray = '';
  $contact = get_field('contactinfo', 'options');
  $gmapsurl = $contact['google_maps'];

  $address = $contact['address'];
  $emailadres = $contact['emailaddress'];
  $show_telefoon_1 = $contact['telephone_1'];
  $telefoon_1 = trim(str_replace($spacialArry, $replaceArray, $show_telefoon_1));

  $show_telefoon_2 = $contact['telephone_2'];
  $telefoon_2 = trim(str_replace($spacialArry, $replaceArray, $show_telefoon_2));
  $gmaplink = !empty($gmapsurl)?$gmapsurl: 'javascript:void()';

  $lfooter = get_field('lfooter', 'options');
  $logoObj = $lfooter['ftlogo'];
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
  $copyright_text = get_field('copyright_text', 'options');
?>
<footer class="footer-wrp">
  <div class="ftr-top">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="ftr-col-main clearfix">
            <div class="ftr-col ftr-col-1">
              <div class="ftr-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php echo $logo_tag; ?>
                </a>
                <strong>Gentinis<span>.</span></strong>
              </div>
            </div>
            <div class="ftr-col ftr-col-2 hide-md"> 
              <h6><span><?php _e( 'Navigatie', THEME_NAME );?><b>.</b></span></h6>
              <?php 
                $fmenuOptionsa = array( 
                    'theme_location' => 'cbv_fta_menu', 
                    'menu_class' => 'ulc',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $fmenuOptionsa ); 
              ?>
            </div>
            <div class="ftr-col ftr-col-3">
              <h6><span>OPENINGSUREN<b>.</b></span></h6>
              <ul class="ulc">
                <li>
                  <a>Dinsdag -> vrijdag:</a>
                  <strong>10:00 - 12:00</strong>
                  <strong>14:00 - 18:00</strong>
                </li>
                <li>
                  <a>Zaterdag :</a>
                  <strong>10:00 - 12:00</strong>
                  <strong>14:00 - 17:00</strong>
                </li>
                <li><a>Zondag en maandag gesloten </a></li>
              </ul>              
            </div>
            <div class="ftr-col ftr-col-4">
              <h6><span>Contact<b>.</b></span></h6>
              <ul class="ulc">
                <?php if( !empty($emailadres) ) printf('<li><a href="mailto:%s">%s</a></li>', $emailadres, $emailadres); ?>
                <?php if( !empty($address) ) printf('<li><a href="%s">%s</a></li>', $gmaplink, $address); ?>
                <li><span>BE0478242464</span></li>
              </ul>               
            </div>
            <div class="ftr-col ftr-col-5">
            <?php if( !empty($show_telefoon_1) ) printf('<a href="tel:%s">%s</a>', $telefoon_1, $show_telefoon_1); ?>
            <?php if( !empty($show_telefoon_2) ) printf('<a href="tel:%s">%s</a>', $telefoon_2, $show_telefoon_2); ?>                         
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ftr-btm">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="ftr-btm-innr clearfix">
            <div class="ftr-btm-col-1">
              <?php if( !empty( $copyright_text ) ) printf( '<span>%s</span>', $copyright_text); ?> 
            </div>
            <div class="ftr-btm-col-2">
              <?php 
                $ftmenuOptions = array( 
                    'theme_location' => 'cbv_copyright_menu', 
                    'menu_class' => 'ulc clearfix',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $ftmenuOptions ); 
              ?>
            </div>
            <div class="ftr-btm-col-3 text-right">
              <a href="#">webdesign by conversal</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="<?php echo THEME_URI; ?>/assets/js/jQueryLibrary.js"></script>
<?php wp_footer(); ?>
</body>
</html>