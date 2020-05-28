<?php
/*
  Template Name: Referenties
*/
get_header(); 
$thisID = get_the_ID();
get_template_part( 'templates/page', 'banner' );
 
?>
<?php 
  $scategory = $sstyle = '';
  $taxs = array();
  if ( isset($_GET['category']) && !empty($_GET['category'])){
    $taxs[] = array(
      'taxonomy' => 'practice_area',
      'field' => 'slug',
      'terms' => $_GET['category']
    );
    $scategory = $_GET['category'];
  }
  if ( isset($_GET['style']) && !empty($_GET['style'])){
    $taxs[] = array(
      'taxonomy' => 'style',
      'field' => 'slug',
      'terms' => $_GET['style']
    );
    $sstyle = $_GET['style'];
  } 

?>
<section class="gk-ref-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="gk-ref-sec-inr">
          <?php 
            $desc = get_field('beschrijving', $thisID); 
            if( !empty($desc) ):
          ?>
          <div class="gk-ref-entry-hdr">
            <?php echo wpautop( $desc ); ?>
          </div>
          <?php endif; ?>
          <div class="gk-ref-filter clearfix">
            <div class="gk-ref-filter-left hide-sm">
              <span>Filter Op<i>:</i></span>
            </div>
            <div class="gk-ref-filter-mob show-sm">
              <span>Filter<i>.</i></span>
            </div>
            <div class="gk-ref-filter-rgt">
              <?php 
                $rterms = get_terms( array(
                  'taxonomy' => 'referenties_cat',
                  'hide_empty' => false,
                  'parent' => 0
                ) );
              ?>
              <ul class="reset-list clearfix">
                <li>
                  <div class="gk-ref-fil-rgt-opt">
                    <label>Categorie:</label>
                    <?php if ( ! empty( $rterms ) && ! is_wp_error( $rterms ) ){  ?>
                    <form action="" method="get">
                    <div class="gk-ref-fil-rgt-sel">
                      <select name="category" class="selectpicker" onchange="this.form.submit();">
                        <?php foreach ( $rterms as $rterm ) { ?>
                        <option <?php echo ($scategory == $rterm->slug)? 'selected': ''; ?> value="<?php echo $rterm->slug; ?>"><?php echo $rterm->name; ?></option>
                        <?php } ?>
                      </select>
                      <?php if( !empty($sstyle) ): ?>
                      <input type="hidden" name="style" value="<?php echo $sstyle; ?>">
                      <?php endif; ?>
                    </div>
                    </form>
                    <?php } ?>
                  </div>
                </li>
                <?php 
                  $styles = get_terms( array(
                    'taxonomy' => 'style',
                    'hide_empty' => false,
                    'parent' => 0
                  ) );
                ?>
                <li>
                  <div class="gk-ref-fil-rgt-opt">
                    <label>Style:</label>
                    <?php if ( ! empty( $styles ) && ! is_wp_error( $styles ) ){  ?>
                    <form action="" method="get">
                    <div class="gk-ref-fil-rgt-sel">
                      <select name="style" class="selectpicker" onchange="this.form.submit();">
                        <?php foreach ( $styles as $style ) { ?>
                        <option <?php echo ($style == $style->slug)? 'selected': ''; ?> value="<?php echo $style->slug; ?>"><?php echo $style->name; ?></option>
                        <?php } ?>
                      </select>
                      <?php if( !empty($scategory) ): ?>
                      <input type="hidden" name="cateogry" value="<?php echo $scategory; ?>">
                      <?php endif; ?>
                    </div>
                    </form>
                    <?php } ?>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="gk-filters-active clearfix show-sm">
            <div class="gk-filter-show-item">
              <label>Modern</label>
            </div>
            <div class="gk-filter-show-item">
              <label>Keuken</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 

    $taxquery = '';
    if( $taxs ){
      if(count($taxs) > 1){
        $taxquery = array(
        'relation' => 'AND',
        $taxs
        );
      } else{
        $taxquery = array($taxs);
      }
    }
    $query = new WP_Query(array( 
        'post_type'=> 'referentie',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order'=> 'ASC',
        'tax_query' => $taxquery

      ) 
    );
    if($query->have_posts()):
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="gk-ref-grd-ctlr">
          <ul class="reset-list clearfix">
            <?php 
              while($query->have_posts()): $query->the_post();
              $afbeelding = get_field('afbeelding', get_the_ID()); 
              $shortdes = get_field('shbeschrijving', get_the_ID());
            ?>
            <li>
              <div class="gk-ref-grd-item">
                <div class="gk-ref-grd-fea-img-ctlr" style="height: 360px;">
                  <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                  <?php if(!empty( $afbeelding )): ?>
                  <div class="gk-ref-grd-fea-img inline-bg" style="background: url('<?php echo cbv_get_image_src( $afbeelding, 'productgrid' ); ?>');"></div>
                  <?php endif; ?>
                </div>
                <div class="gk-ref-grd-des mHc">
                  <h4 class="gk-rgd-title mHc1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <?php if( !empty($shortdes) ) printf( '<p class="mHc2">%s</p>' ,  $shortdes); ?>
                  <a href="<?php the_permalink(); ?>">Ontdek</a>
                </div>
              </div>
            </li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
    <?php else: ?>
    <div class="row">
      <div class="col-md-12">
        <div class="filter-results-sec-hdr">
          <h3 class="filter-results-sec-hdr-title">GEEN RESULTAAT!</h3>
        </div>
      </div>
    </div>
    <?php endif;  wp_reset_postdata(); ?>
  </div>
</section>
<div class="gk-ref-ctlr">
<?php get_template_part( 'templates/footer', 'top' ); ?>
</div>
<?php get_footer(); ?>