<section class="product-overview-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="product-overview-sec-inr">
          <div class="product-overview-entry-hdr">
            <p>Etiam a neque at dui porta maximus. Nam convallis orci ligula, ac pharetra nunc ullamcorper in. Etiam facilisis <br> leo sed blandit tristique. Nam nec ultricies diam, ac dictum elit. Ut venenatis imperdiet dolor, id iaculis magna <br> placerat at. Mauris quis mi augue.</p>
          </div>
        </div>
      </div>
    </div>
    <?php 
    $child_terms = get_terms( array(
      'taxonomy' => 'product_cat',
      'hide_empty' => false,
      'parent' => $cterm->term_id
    ) );

    if ( ! empty( $child_terms ) && ! is_wp_error( $child_terms ) ){
    ?>
    <div class="row">
      <div class="col-md-12">
      <div class="gk-pro-grd-ctlr">
        <ul class="reset-list clearfix">
          <li>
            <div class="gk-pro-grd-item">
              <div class="gk-pro-grd-fea-img-ctlr" style="height: 360px;">
                <a href="#" class="overlay-link"></a>
                <div class="gk-pro-grd-fea-img inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/gk-pro-grd-fea-img-1.jpg');">
                  
                </div>
              </div>
              <div class="gk-pro-grd-des mHc">
                <h4 class="gk-pro-grd-des-title mHc1"><a href="#">Modern</a></h4>
                <p class="mHc2">Etiam facilisis leo sed blandit tristique. Nam nec ultricies diam, ac dictum elit.</p>
                <a href="#">meer info</a>
              </div>
            </div>
          </li>
          <li>
            <div class="gk-pro-grd-item">
              <div class="gk-pro-grd-fea-img-ctlr" style="height: 360px;">
                <a href="#" class="overlay-link"></a>
                <div class="gk-pro-grd-fea-img inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/gk-pro-grd-fea-img-2.jpg');">
                  
                </div>
              </div>
              <div class="gk-pro-grd-des mHc">
                <h4 class="gk-pro-grd-des-title mHc1"><a href="#">landelijk</a></h4>
                <p class="mHc2">Etiam facilisis leo sed blandit tristique. Nam nec ultricies diam, ac dictum elit.</p>
                <a href="#">meer info</a>
              </div>
            </div>
          </li>
          <li>
            <div class="gk-pro-grd-item">
              <div class="gk-pro-grd-fea-img-ctlr" style="height: 360px;">
                <a href="#" class="overlay-link"></a>
                <div class="gk-pro-grd-fea-img inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/gk-pro-grd-fea-img-3.jpg');">
                  
                </div>
              </div>
              <div class="gk-pro-grd-des mHc">
                <h4 class="gk-pro-grd-des-title mHc1"><a href="#">urban- streetstyle</a></h4>
                <p class="mHc2">Etiam facilisis leo sed blandit tristique. Nam nec ultricies diam, ac dictum elit.</p>
                <a href="#">meer info</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>