<?php 
$showhide_cta = get_field('showhide_cta', 'options');
$ctasec = get_field('ctasec', 'options');
if( $showhide_cta ):
  if( $ctasec ):
    $cta_titel = $ctasec['titel'];
    $cta_subtitel = $ctasec['subtitel'];
    $cta_knop = $ctasec['knop'];
?>
<section class="footer-top-sec-wrp mt-none">
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
              <h2 class="footer-top-dsc-title">
                <?php 
                  if( !empty($cta_titel) ) printf('%s', $cta_titel);
                  if( !empty($cta_subtitel) ) printf('<strong>%s</strong>', $cta_subtitel);
                ?>
              </h2>
            </div>
          </div>
          <?php 
            if( is_array( $cta_knop ) &&  !empty( $cta_knop['url'] ) ){
              printf('<div class="footer-top-rgt"><a href="%s" target="%s">%s</a></div>', $cta_knop['url'], $cta_knop['target'], $cta_knop['title']); 
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>