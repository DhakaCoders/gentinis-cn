<?php 
get_header();
$thisID = get_the_ID();

$shopID = 10;
$standaardbanner = get_field('pagebanner', $shopID);
if( empty($standaardbanner) ) $standaardbanner = THEME_URI.'/assets/images/page-bnr.jpg';

$categories = get_the_terms( $thisID, 'product_cat' );
$term_name = '';
if ( ! empty( $categories ) ) {
    foreach( $categories as $category ) {
       $term_name = $category->name; 
    }
}
?>
<section class="page-banner">
  <div class="page-bnr-black-bg">
    <div class="page-banner-inr">
      <div class="page-banner-img-cntlr">
        <div class="page-back-btn-cntlr">
          <div>
            <a href="javascript:history.go(-1)"><i><img src="<?php echo THEME_URI; ?>/assets/images/back-btn-arrow.png"></i> Terug</a>
          </div>
        </div>
        <div class="page-banner-img-cntlr-inr">
          <span class="page-banner-overlay-bg"></span>
          <div class="page-banner-bg-cntlr">
            <div class="page-banner-bg inline-bg" style="background-image:url(<?php echo $standaardbanner; ?>);">
            </div>
          </div>
          <span class="page-bnr-angle"><img src="<?php echo THEME_URI; ?>/assets/images/page-bnr-angle.png"></span>
        </div>
      </div>
      <div class="page-banner-des">
        <div class="page-banner-des-inr">
          <div>
            <?php if( !empty($term_name) ) printf('<h1 class="page-banner-title"><span>%s<i>.</i></span></h1>', $term_name); ?>
            <div class="page-breadcrumbs">
              <?php cbv_breadcrumbs(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of page-banner -->

<section class="gk-backlink-sec">
  <div class="container-sm">
    <div class="row">
      <div class="col-md-12">
        <div class="gk-backlink-sec-inr">
          <a href="javascript:history.go(-1)">
          Terug
            <i>
              <svg class="gk-back-link-svg" width="12" height="10" viewBox="0 0 12 10" fill="#9A9A9A">
                <use xlink:href="#gk-back-link-svg"></use>
              </svg> 
            </i>
          </a>
          <h2 class="gk-backlink-title"><?php the_title(); ?><i>.</i></h2>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
$desc = get_field('descriptionsec', $thisID); 
$galleries = get_field('galerij', $thisID); 
if( $galleries ):
?>
<section class="gk-prod-slider-sec">
  <div class="gk-prod-slider-sec-inr">
    <div class="gk-prod-mainslider">
      <span class="mainslider-leftarrow"></span>
      <span class="mainslider-rightarrow"></span>
    </div>
    <div class="gk-prod-slider">
      <?php foreach( $galleries as $gallery ): ?>
      <div class="gk-prod-slider-item">
        <?php if( !empty($gallery['id']) ): ?>
        <div class="gk-prod-slider-item-fea-img inline-bg" style="background: url(<?php echo cbv_get_image_src($gallery['id'], 'gallerygird'); ?>);"></div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
<section class="gk-prod-des-sec">
  <div class="container-sm">
    <div class="row">
      <div class="col-md-12">
        <div class="gk-prod-des-sec-inr clearfix">
          <div class="gk-prod-des-left">
          <?php 
          if( $desc ): 
            if( !empty($desc['titel']) ) printf('<h3 class="gk-prod-des-left-title">%s<i>.</i></h3>', $desc['titel'] );
            if(!empty($desc['beschrijving'])) echo wpautop( $desc['beschrijving'] ); 

            $knop = $desc['knop'];
            if( is_array( $knop ) &&  !empty( $knop['url'] ) ){
                printf('<a href="%s" target="%s">%s</a>', $knop['url'], $knop['target'], $knop['title']); 
            }
          endif;
          ?>
          </div>
          
          <div class="gk-prod-des-rgtsiderbar">
            <h4 class="gk-prod-rgtsidebar-title">Catalogus<i>.</i></h4>
            <?php 
              $sidebar = get_field('psidebarsec', $thisID); 
              if( $sidebar ):
            ?>
            <?php 
              if( !empty($sidebar['titel']) ) printf('<p></p>', $sidebar['titel']);
              $downloads = $sidebar['downloads']; 
              if( $downloads ):
              foreach( $downloads as $download  ):
                if( !empty($download['file']) ): 
            ?>
            <a href="<?php echo $download['file']; ?>" download><?php if( !empty($download['titel']) ) printf( '%s', $download['titel'] ); ?><i><img src="<?php echo THEME_URI; ?>/assets/images/gk-prod-category.svg"></i></a>
            <?php endif; endforeach; ?>
            <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php 
      $videosec = get_field('videosec', $thisID); 
      if( $videosec ):
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="gk-prod-fancy-sec">
          <div class="gk-prod-fancy-video img-div-scale" style="height: 400px;">
            <?php if( !empty($videosec['video_url']) ): ?>
              <?php if(!empty( $videosec['poster'] )): ?>
              <div class="gk-prod-fancy-video-inr img-div inline-bg" style="background: url('<?php echo cbv_get_image_src( $videosec['poster'], 'videogrid'); ?>');"></div>
              <?php endif; ?>
            <a href="https://youtu.be/9No-FiEInLA" data-fancybox="gallery" class="overlay-link"></a>
            <i>
              <svg class="play-icon-svg" width="85" height="85" viewBox="0 0 85 85" fill="#ffffff">
                <use xlink:href="#play-icon-svg"></use>
              </svg> 
            </i>
            <?php else: ?>
              <?php if(!empty( $videosec['poster'] )): ?>
              <div class="gk-prod-fancy-video-inr img-div inline-bg" style="background: url('<?php echo cbv_get_image_src( $videosec['poster'], 'videogrid'); ?>');"></div>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>


<?php 
$showhide_prefer = get_field( 'showhide_preferenties', $thisID );
$prefer = get_field( 'preferentiessec', $thisID );
$referIDs = $prefer['selecteer_referentie'];
if($referIDs){
  $query = new WP_Query(array( 
      'post_type'=> 'referentie',
      'post_status' => 'publish',
      'posts_per_page' => 3,
      'orderby' => 'date',
      'order'=> 'ASC',
      'post__in' => $referIDs

    ) 
  );
}else{
  $query = new WP_Query(array( 
      'post_type'=> 'referentie',
      'post_status' => 'publish',
      'posts_per_page' => 3,
      'orderby' => 'date',
      'order'=> 'ASC'

    ) 
  );
}

if($query->have_posts() && $showhide_prefer):
?>
<section class="gk-referenties-details-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="gk-referenties-details-sec-inr">
          <div class="gkrds-entry-hdr"> 
            <h4 class="gkrds-title">
            <?php 
              if( !empty($prefer['titel']) OR $prefer['subtitel']): ?>
                <?php printf('<span>%s</span>', $prefer['titel']); ?>
                <?php printf('%s', $prefer['subtitel']); ?><i>.</i>
              <?php 
              else: ?>
              <span>Keukens</span>Referenties<i>.</i>
            <?php endif; ?>
            </h4>
            <?php if(!empty($prefer['beschrijving'])) echo wpautop( $prefer['beschrijving'] ); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="gk-ref-det-ctlr">
          <div class="reset-list clearfix gkRefGrdSlider">
            <?php 
              while($query->have_posts()): $query->the_post();
              $afbeelding = get_field('afbeelding', get_the_ID()); 
              $shortdes = get_field('shbeschrijving', get_the_ID());
            ?>
            <div class="gk-ref-grd-slide">
              <div class="gk-ref-det-grd-item">
                <div class="gk-ref-det-grd-fea-img-ctlr" style="height: 360px;">
                  <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                  <?php if(!empty( $afbeelding )): ?>
                  <div class="gk-ref-det-grd-fea-img inline-bg" style="background: url('<?php echo cbv_get_image_src( $afbeelding, 'productgrid' ); ?>')"></div>
                  <?php endif; ?>
                </div>
                <div class="gk-ref-det-grd-des mHc">
                  <h4 class="gk-ref-det-grd-des-title mHc1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <?php if( !empty($shortdes) ) printf( '<p class="mHc2">%s</p>' ,  $shortdes); ?>
                  <a href="<?php the_permalink(); ?>">meer info</a>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
          <!-- <div class="mainslider">
            <span class="gk-ref-det-leftarrow"></span>
            <span class="gk-ref-det-rightarrow"></span>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif;  wp_reset_postdata(); ?>
<?php get_template_part( 'templates/footer', 'top' ); ?>
<?php get_footer(); ?>