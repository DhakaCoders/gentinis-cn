<?php 
get_header();
$cterm = get_queried_object();
$shopID = 10;
$standaardbanner = get_field('pagebanner', $shopID);
if( empty($standaardbanner) ) $standaardbanner = THEME_URI.'/assets/images/page-bnr.jpg'; 
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
            <?php if( !empty($cterm->name) ) printf('<h1 class="page-banner-title"><span>%s<i>.</i></span></h1>', $cterm->name); ?>
            <div class="page-breadcrumbs">
              <?php cbv_breadcrumbs(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of page-banner -->
<?php 
  $child_terms = get_terms( array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
    'parent' => $cterm->term_id
) );

if ( ! empty( $child_terms ) && ! is_wp_error( $child_terms ) ){
  get_template_part( 'templates/product', 'sub_cat' ); 
} else {
  get_template_part( 'templates/cat-products', 'content' );
} 
?>
<div class="gk-pro-ctlr">
<?php get_template_part( 'templates/footer', 'top' ); ?>
</div>
<?php get_footer(); ?>