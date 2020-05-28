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
    $query = new WP_Query(array( 
        'post_type'=> 'product',
        'post_status' => 'publish',
        'posts_per_page' =>-1,
        'orderby' => 'date',
        'order'=> 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $cterm->term_id
          )
        )
      ) 
    );
    if($query->have_posts()):
    ?>
    <div class="row">
      <div class="col-md-12">
      <div class="gk-pro-grd-ctlr">
        <ul class="reset-list clearfix">
          <?php 
            while($query->have_posts()): $query->the_post();   
           //$profileimage = get_field('profile_image', get_the_ID()); 
          ?>
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
        <?php endwhile; ?>
        </ul>
      </div>
      </div>
    </div>
    <?php endif;  wp_reset_postdata(); ?>
  </div>
</section>