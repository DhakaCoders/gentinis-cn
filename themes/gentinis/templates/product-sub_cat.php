<?php $cterm = get_queried_object(); ?>
<section class="product-overview-sec">
  <div class="container">
    <?php if ( ! empty( $cterm ) && ! is_wp_error( $cterm ) ){ ?>
    <div class="row">
      <div class="col-md-12">
        <div class="product-overview-sec-inr">
          <div class="product-overview-entry-hdr">
            <?php if( !empty($cterm->description) ) echo wpautop($cterm->description); ?>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
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
          <?php 
            foreach ( $child_terms as $child_term ) { 
            $img_id = get_field('image', $child_term, false);
          ?>
          <li>
            <div class="gk-pro-grd-item">
              <div class="gk-pro-grd-fea-img-ctlr" style="height: 360px;">
                <a href="<?php echo esc_url( get_term_link( $child_term ) ); ?>" class="overlay-link"></a>
                <?php if( !empty($img_id) ):  ?>
                <div class="gk-pro-grd-fea-img inline-bg" style="background: url('<?php echo cbv_get_image_src( $img_id ); ?>');">
                </div>
                <?php endif; ?>
              </div>
              <div class="gk-pro-grd-des mHc">
                <h4 class="gk-pro-grd-des-title mHc1">
                  <a href="<?php echo esc_url( get_term_link( $child_term ) ); ?>">
                  <?php printf('%s', $child_term->name); ?>
                  </a>
                </h4>
                <?php if( !empty($child_term->description) ) printf( '<p class="mHc2">%s</p>' ,  $child_term->description); ?>
                <a href="<?php echo esc_url( get_term_link( $child_term ) ); ?>">meer info</a>
              </div>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>