<?php 
get_header(); 
?>
<section class="page-banner">
  <div class="page-bnr-black-bg">
    <div class="page-banner-inr">
      <div class="page-banner-img-cntlr">
        <div class="page-back-btn-cntlr">
          <div>
            <a href="#"><i><img src="<?php echo THEME_URI; ?>/assets/images/back-btn-arrow.png"></i> Terug</a>
          </div>
        </div>
        <div class="page-banner-img-cntlr-inr">
          <span class="page-banner-overlay-bg"></span>
          <div class="page-banner-bg-cntlr">
            <div class="page-banner-bg inline-bg" style="background-image:url(<?php echo THEME_URI; ?>/assets/images/page-bnr.jpg);">
            </div>
          </div>
          <span class="page-bnr-angle"><img src="<?php echo THEME_URI; ?>/assets/images/page-bnr-angle.png"></span>
        </div>
      </div>
      <div class="page-banner-des">
        <div class="page-banner-des-inr">
          <div>
            <h1 class="page-banner-title"><span>Keukens<i>.</i></span></h1>
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
  get_template_part( 'templates/products', 'content' );
?>
<div class="gk-pro-ctlr">
  <section class="footer-top-sec-wrp">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="footer-top-wrp clearfix">
            <div class="footer-top-lft">
              <div class="footer-top-dsc">
                <span>
                <i>
                  <svg class="ftr-top-mail-icon-svg" width="74" height="74" viewBox="0 0 74 74" fill="#ffffff">
                    <use xlink:href="#ftr-top-mail-icon-svg"></use>
                  </svg> 
                </i>
              </span>
                <h2 class="footer-top-dsc-title">Interesse in <strong>een gesprek met ons?</strong></h2>
              </div>
            </div>
            <div class="footer-top-rgt">
              <a href="#">Contacteer ons</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>