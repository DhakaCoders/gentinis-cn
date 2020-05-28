<?php get_header(); 
  $slidersec = get_field('slidersec', HOMEID);
  $hslides = $slidersec['slides'];
  if($hslides):
?>
<div class="hm-black-contents">
  <section class="main-slider-sec">
    <div class="main-slider-angle-xs">
      <div>
        <a href="#">
        <span>Meer ervaring</span> 
        <i>
          <svg class="next-arrow-white-svg" width="18" height="16" viewBox="0 0 18 16" fill="#fff">
            <use xlink:href="#next-arrow-white-svg"></use>
          </svg>
        </i>
      </a>
      </div>
    </div>
    <div class="main-slider-sec-cntlr">
      <div class="main-slide-prev-next">
        <span class="fl-prev">
          <svg class="prev-arrow-white-svg" width="18" height="16" viewBox="0 0 18 16" fill="#fff">
            <use xlink:href="#prev-arrow-white-svg"></use>
          </svg> 
        </span>
        <span class="fl-next">
          <svg class="next-arrow-white-svg" width="18" height="16" viewBox="0 0 18 16" fill="#fff">
            <use xlink:href="#next-arrow-white-svg"></use>
          </svg> 
        </span>
      </div>
      <div class="main-slider mainSlider">
      <?php foreach( $hslides as $hslide ): ?>
        <div class="main-slide-item">
          <div class="main-slide-item-fea-img-img-cntlr">
            <div>
              <div class="main-slide-item-fea-img-overlay">
                <?php if( !empty($hslide['afbeelding']) ): ?>
                <div class="main-slide-item-fea-img inline-bg" style="background: url(<?php echo cbv_get_image_src($hslide['afbeelding'], 'homeslide'); ?>);">
                </div>
                <?php endif; ?>
                <span class="main-slide-item-fea-img-overlay-bg"></span>
              </div>
              <span class="main-slider-angle"><img src="<?php echo THEME_URI; ?>/assets/images/main-slider-angle.png"></span>
            </div>
          </div>
          <div class="main-slide-des">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="main-slide-des-inr">
                    <?php 
                    if( !empty($hslide['titel']) ) printf('<strong class="ms-title">%s<i>.</i></strong>', $hslide['titel']);
                    if( !empty($hslide['beschrijving']) ) echo wpautop( $hslide['beschrijving'] );
                    ?>
                    <div class="main-slide-btns">
                      <div class="msbtn-1 gk-btn gk-btn-red">
                        <a href="#">
                          <span>Meer ervaring
                            <i>
                              <svg class="btn-angle-icon-white-svg" width="14" height="14" viewBox="0 0 14 14" fill="#ffffff">
                                <use xlink:href="#btn-angle-icon-white-svg"></use>
                              </svg> 
                            </i>
                          </span>
                        </a>
                      </div>
                <?php 
                  $knop2 = $hslide['knop_2'];
                  if( is_array( $knop2 ) &&  !empty( $knop2['url'] ) ){
                      printf('<div class="msbtn-2 gk-btn gk-btn-transparent bdr-white"><a href="%s" target="%s"><span>%s<i><svg class="btn-angle-icon-white-svg" width="14" height="14" viewBox="0 0 14 14" fill="#fff">
                                <use xlink:href="#btn-angle-icon-white-svg"></use>
                              </svg></i></span></a></div>', $knop2['url'], $knop2['target'], $knop2['title']); 
                  } 
                ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>
<?php endif; ?>
<?php
  $showhide_promotions = get_field('showhide_promotions', HOMEID);
  $promos = get_field('promotionssec', HOMEID);
  if( $showhide_promotions ):
    if($promos):
?>
  <section class="hm-discounts-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hm-discounts-sec-cntlr">
            <span class="hm-discounts-left-angle">
              <img src="<?php echo THEME_URI; ?>/assets/images/hm-discounts-left-angle.png">
            </span>
            <ul class="reset-list clearfix">
              <li>
                <div class="hm-discount-item hm-discount-item-title">
                  <div class="hm-discount-item-inr mHc">
                    <?php if( !empty($promos['titel']) ) printf('<strong>%s</strong>', $promos['titel']); ?>
                  </div>
                </div>
              </li>
              <?php 
              $hpromos = $promos['promotions']; 
              if($hpromos): 
              foreach( $hpromos as $hpromo ):
              ?>
              <li>
                <div class="hm-discount-item">
                  <div class="hm-discount-item-inr mHc">
                    <strong>
                      <?php if( !empty($hpromo['percentage_waarde']) ) printf('<span>-%s</span> ', $hpromo['percentage_waarde']); ?>
                      <?php if( !empty($hpromo['promo_text']) ) printf('%s', $hpromo['promo_text']); ?>
                    </strong>
                  </div>
                </div>
              </li>
              <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>    
  </section>
  <?php endif; ?>
  <?php endif; ?>
  <?php
  $hshowhide_usp = get_field('showhide_usp', HOMEID);
  $uspssec = get_field('uspssec', HOMEID);
  $husps = $uspssec['alle_usps'];
  if( $hshowhide_usp ):
    if($husps):
?>
  <section class="makes-us-different-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="makes-us-different-sec-hdr">
            <?php if( !empty($uspssec['titel']) ) printf('<h1 class="muds-hdr-title">%s</h1>', $uspssec['titel']); ?>
          </div>
        </div>
        <?php if( $husps ){ ?>
        <div class="col-md-12">
          <div class="makes-us-different-sec-grds-cntlr">
            <ul class="reset-list clearfix">
              <?php foreach( $husps as $husp ): ?>
              <li>
                <div class="dft-responsibility-grd-item">
                  <div class="dft-responsibility-grd-item-inr mHc">
                    <?php if( !empty($husp['icon']) ):  ?>
                    <div class="dftrgi-icon mHc1">
                      <img src="<?php echo THEME_URI; ?>/assets/images/makes-us-different-icon-01.svg">
                      <img src="<?php echo $husp['icon']; ?>" alt="<?php echo cbv_get_image_alt($husp['icon'] ); ?>">
                    </div>
                  <?php endif; ?>
                    <?php if( !empty($husp['titel']) ) printf('<strong class="dftrgi-title mHc2">%s</strong>', $husp['titel']); ?>
                  </div>
                </div>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>    
  </section>
  <?php endif; ?>
  <?php endif; ?>

</div>

<?php
  $showhide_intro2 = get_field('showhide_intro2', HOMEID);
  $introsec2 = get_field('introsec2', HOMEID);
  if( $showhide_intro2 ):
    if($introsec2):
?>

<section class="hm-about-sec">
  <span class="about-sec-angle"><img src="<?php echo THEME_URI; ?>/assets/images/about-sec-angle.jpg"></span>
  <div class="about-sec-img-con">
    <div class="about-sec-img-con-inr">
      <?php if(!empty($introsec2['afbeelding'])): ?>
      <div class="about-sec-fea-img inline-bg" style="background: url(<?php echo cbv_get_image_src($introsec2['afbeelding'], 'overons1'); ?>);"></div>
      <?php endif; ?>

      <div class="about-sec-vdo-img-cntlr">
        <div class="about-sec-vdo-img-cntlr-inr img-div-scale">
          <?php if(!empty($introsec2['video_url'])): ?>
            <?php if(!empty($introsec2['poster'])): ?>
            <div class="about-sec-vdo-img img-div inline-bg" style="background-image: url(<?php echo cbv_get_image_src($introsec2['poster'], 'overons1'); ?>);"></div>
            <?php endif; ?>
          <a href="<?php echo $introsec2['video_url']; ?>" data-fancybox="gallery" class="overlay-link"></a>
          <i>
            <svg class="play-icon-white-svg" width="85" height="85" viewBox="0 0 85 85" fill="#ffffff">
              <use xlink:href="#play-icon-white-svg"></use>
            </svg> 
          </i>
          <?php else: ?>
            <?php if(!empty($introsec2['poster'])): ?>
            <div class="about-sec-vdo-img img-div inline-bg" style="background-image: url(<?php echo cbv_get_image_src($introsec2['poster'], 'overons1'); ?>);"></div>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>  
  <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="hm-about-sec-des">
            <?php 
            echo '<h2 class="hmasd-title">';
              if(!empty($introsec2['titel'])) printf('%s<i>.</i>', $introsec2['titel']);
              if(!empty($introsec2['subtitel'])) printf('<span class="rwsd-sub-title">%s</span>', $introsec2['subtitel']);
            echo '</h2>';
              if(!empty($introsec2['beschrijving'])) echo wpautop( $introsec2['beschrijving'], true );

              $link_8 = $introsec2['knop_1'];
              $link_9 = $introsec2['knop_2'];
              
            ?>
            <div class="hmasd-btn">
              <?php 
                if( is_array( $link_8 ) &&  !empty( $link_8['url'] ) ){
                  printf('<a href="%s" target="%s"><span class="xlg-txt">%s</span></a>', $link_8['url'], $link_8['target'], $link_8['title']); 
                }
                if( is_array( $link_9 ) &&  !empty( $link_9['url'] ) ){
                  printf('<a href="%s" target="%s"><span class="xs-txt">%s</span></a>', $link_9['url'], $link_9['target'], $link_9['title']); 
                }
              ?>
            </div>
          </div>
        </div>
      </div>
  </div> 
  
</section>
<?php endif; ?>
<?php endif; ?>


<?php
  $showhide_cats = get_field('showhide_cats', HOMEID);
  $cats = get_field('categories', HOMEID);
  if( $showhide_cats ):
    if($cats):
?>
<section class="hm-service-cat-section">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hm-service-cat-sec-hdr">
          <?php 
            if(!empty($cats['titel'])) printf('<h2 class="hmscshdr-title">%s</h2>', $cats['titel']);
            if(!empty($cats['beschrijving'])) echo wpautop( $cats['beschrijving'], true );
          ?>
          </div>
        </div>
        <?php 
          $termIDS = $cats['categories'];
          if( isset($termIDS) && ! empty( $termIDS ) && ! is_wp_error( $termIDS ) ){
            $terms = get_terms( array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'include' => $termIDS
            ) );
          }else{
            $terms = get_terms( array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'parent' => 0,
            'orderby' => 'term_id',
            'order' => 'ASC', // or ASC
            ) );
          }
        ?>
        <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
        <div class="col-md-12">
          <div class="hm-service-cat-grd-cntlr">
            <ul class="reset-list">
              <?php 
                $catimg_src = '';
                foreach ( $terms as $term ) { 
                $img_id = get_field('image', $term, false); 
                if( !empty($img_id) ) $catimg_src = cbv_get_image_src( $img_id );
              ?>
              <li>
                <div class="hm-ser-cat-grd-item inline-bg" style="background: url(<?php echo $catimg_src; ?>);">
                  <div class="hm-ser-cat-item-des">
                    <div>
                      <?php 
                        $icon_id = get_field('icon', $term, false); 
                        if( !empty($icon_id) ):
                      ?>
                      <i class="mHc"><?php echo cbv_get_image_tag( $icon_id ); ?></i>
                      <?php endif; ?>
                      <?php printf('<strong>%s</strong>', $term->name); ?>
                    </div>
                  </div>
                  <div class="hm-ser-cat-item-des-hover">
                    <div class="hm-ser-cat-item-des-inr">
                      <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="overlay-link"></a>
                      <div>
                        <?php 
                          $icon_id = get_field('icon', $term, false); 
                          if( !empty($icon_id) ):
                        ?>
                          <i><?php echo cbv_get_image_tag( $icon_id ); ?></i>
                        <?php endif; ?>
                        <?php printf('<strong>%s</strong>', $term->name); ?>
                        <?php if( !empty($term->description) ) echo wpautop($term->description); ?>
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                          <svg class="next-arrow-black-svg" width="18" height="18" viewBox="0 0 18 18" fill="#FF2021">
                            <use xlink:href="#next-arrow-black-svg"></use>
                          </svg> 
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <?php } ?>
      </div>
  </div>    
</section>
<?php endif; ?>
<?php endif; ?>


<?php
  $showhide_quotes = get_field('showhide_quotes', HOMEID);
  $quote = get_field('quotessec', HOMEID);
  if( $showhide_quotes ):
    if( $quote ):
      if( !empty($quote['afbeelding']) ){
        $quote_src = cbv_get_image_src( $quote['afbeelding'] );
      }else{
        $quote_src = '';
      }
?>
<section class="hm-testi-section inline-bg" style="background: url(<?php echo $quote_src; ?>);">
  <?php if( !empty($quote['afbeelding']) ){ ?>
  <div class="xs-hm-testi-sec-fea-img">
    <?php cbv_get_image_tag( $quote['afbeelding'] ); ?>
  </div>
  <?php } ?>
  <?php 
    $quoteIDs = $quote['quotesselecteren'];
    if( !empty($quoteIDs) ): 
      $fQuery = new WP_Query(array(
      'post_type' => 'quotes',
      'posts_per_page'=> count($quoteIDs),
      'post__in' => $quoteIDs
    ));
    if( $fQuery->have_posts() ):
  ?>
  <div class="container">
      <div class="row">
        <div class="col-md-12 clearfix">
          <div class="hm-testi-slider-area">
            <i>
              <svg class="quote-white-icon-svg" width="44" height="44" viewBox="0 0 44 44" fill="#ffff">
                <use xlink:href="#quote-white-icon-svg"></use>
              </svg> 
            </i>
            <div class="hm-testi-slider-cntlr">
              <div class="testi-prev-nxt">
                <span class="testi-prev">
                    <svg class="prev-arrow-black-svg" width="18" height="18" viewBox="0 0 18 18" fill="#191A1E">
                      <use xlink:href="#prev-arrow-black-svg"></use>
                    </svg> 
                </span>
                <span class="testi-next">
                    <svg class="next-arrow-black-svg" width="18" height="18" viewBox="0 0 18 18" fill="#191A1E">
                      <use xlink:href="#next-arrow-black-svg"></use>
                    </svg> 
                </span>
              </div>
              <div class="hm-testi-slider hmTestiSLider">
                <?php 
                  while($fQuery->have_posts()): $fQuery->the_post();
                  $fc_diensten = get_field('beschrijving');
                  $naam = get_field('naam');
                  $positie = get_field('positie');
                ?>
                <div class="hmTestiSLideItem">
                  <blockquote>
                    <?php printf('%s', $fc_diensten); ?>
                    <?php printf('<span>-%s, %s</span>', $naam, $positie); ?>
                  </blockquote>
                </div>
               <?php endwhile; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>  
  <?php endif; wp_reset_postdata(); endif;?>  
</section>
<?php endif; ?>
<?php endif; ?>

<?php get_template_part( 'templates/footer', 'top' ); ?>
<?php get_footer(); ?>