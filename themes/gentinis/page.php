<?php 
get_header();
while ( have_posts() ) :
  the_post();
  get_template_part('templates/page', 'banner');
?>


<section class="innerpage-con-wrap">
  <div class="container-sm">
    <div class="row">
      <div class="col-md-12">
        <article class="default-page-con">
          <?php 
          while ( have_rows('inhoud') ) : the_row(); 
          if( get_row_layout() == 'introductietekst' ){
              $title = get_sub_field('titel');
              $subtitel = get_sub_field('subtitel');
              $subtitel = ( !empty($subtitel) )? $subtitel: '';
              $afbeelding = get_sub_field('afbeelding');
              $teksteditor = get_sub_field('fc_teksteditor');
              echo '<div class="dft-promo-module clearfix">';
                if( !empty($title) ) printf('<div><strong class="dft-promo-module-title"><span>%s</span>%s<i>.</i></strong></div>', $title, $subtitel);
                if( !empty($teksteditor) ){
                  echo '<div class="dft-text-module">', wpautop($teksteditor), '</div>';
                }
                if( !empty($afbeelding) ){
                  echo '<div class="dft-plate-one-img-bx">', cbv_get_image_tag($afbeelding), '</div>';
                }
              echo '</div>';    
          }elseif( get_row_layout() == 'teksteditor' ){
              $beschrijving = get_sub_field('fc_teksteditor');
              echo '<div class="dft-text-module clearfix">';
                if( !empty( $beschrijving ) ) echo wpautop($beschrijving);
              echo '</div>';    
            }elseif( get_row_layout() == 'afbeelding_tekst' ){
              $fc_afbeelding = get_sub_field('fc_afbeelding');
              $imgsrc = cbv_get_image_src($fc_afbeelding, 'dfpageg1');
              $videourl = get_sub_field('video_url');
              $fc_tekst = get_sub_field('fc_tekst');
              $positie_afbeelding = get_sub_field('positie_afbeelding');
              $imgposcls = ( $positie_afbeelding == 'right' ) ? 'fl-dft-rgtimg-lftdes' : '';
              echo '<div class="fl-dft-overflow-controller">
                <div class="fl-dft-lftimg-rgtdes clearfix '.$imgposcls.'">';
                if( !empty($videourl) ):
                echo '<div class="fl-dft-lftimg-rgtdes-lft img-div-scale mHc">';
                echo '<div class="fl-dft-lftimg-rgtdes-lft-img-inr img-div inline-bg" style="background-image: url('.$imgsrc.');"></div>';
                echo '<a href="'.$videourl.'" data-fancybox="gallery" class="overlay-link"></a>';
                echo '<i>
                  <svg class="play-icon-white-svg" width="85" height="85" viewBox="0 0 85 85" fill="#ffffff">
                    <use xlink:href="#play-icon-white-svg"></use>
                  </svg> 
                </i>';
                echo '</div>';
                else:
                  echo '<div class="fl-dft-lftimg-rgtdes-lft fl-dft-lftimg-rgtdes-lft-img-scale  mHc">';
                  echo '<div class="fl-dft-lftimg-rgtdes-lft-img-inr img-div inline-bg" style="background: url('.$imgsrc.');"></div>';
                  echo '</div>';
                endif;
                      echo '<div class="fl-dft-lftimg-rgtdes-rgt mHc">';
                        echo wpautop($fc_tekst);
                      echo '</div>';
              echo '</div></div>';      
            }elseif( get_row_layout() == 'galerij' ){
              $gallery_cn = get_sub_field('afbeeldingen');
              $lightbox = get_sub_field('lightbox');
              $kolom = get_sub_field('kolom');
              if( $gallery_cn ):
              echo "<div class='gallery-wrap clearfix'><div class='gallery gallery-columns-{$kolom}'>";
                foreach( $gallery_cn as $image ):
                $imgsrc = cbv_get_image_src($image['ID'], 'gallerygrid');  
                echo "<figure class='gallery-item'><div class='gallery-icon portrait'>";
                if( $lightbox ) echo "<a data-fancybox='gallery' href='{$image['url']}'>";
                    //echo '<div class="dfpagegalleryitem" style="background: url('.$imgsrc.');"></div>';
                    echo wp_get_attachment_image( $image['ID'], 'gallerygrid' );
                if( $lightbox ) echo "</a>";
                echo "</div></figure>";
                endforeach;
              echo "</div></div>";
              endif;      
            }elseif( get_row_layout() == 'product_categories' ){
              $terms = get_sub_field('fc_productcats');

              if( !empty($terms) && ! is_wp_error( $terms ) ):
              echo "<div class='dft-service-bx-module clearfix'>"; 
                $catimg_src = '';
                foreach ( $terms as $term ) { 
                $img_id = get_field('image', $term, false); 
                if( !empty($img_id) ) $catimg_src = cbv_get_image_src( $img_id );
                  echo '<div class="dft-service-bx-item">
                  <div class="hm-ser-cat-grd-item inline-bg" style="background: url('.$catimg_src.');">
                      <div class="hm-ser-cat-item-des">
                        <div>';
                          $icon_id = get_field('icon', $term, false); 
                          if( !empty($icon_id) ):
                            echo '<i>'.cbv_get_image_tag( $icon_id ).'</i>';
                          endif; 
                          printf('<strong>%s</strong>', $term->name);
                        echo '</div>
                      </div>
                      <div class="hm-ser-cat-item-des-hover">
                        <div class="hm-ser-cat-item-des-inr">
                          <a href="'.esc_url( get_term_link( $term ) ).'" class="overlay-link"></a>
                          <div>';
                            $icon_id = get_field('icon', $term, false); 
                            if( !empty($icon_id) ):
                              echo '<i>'.cbv_get_image_tag( $icon_id ).'</i>';
                            endif; 
                            printf('<strong>%s</strong>', $term->name);
                            if( !empty($term->description) ) echo wpautop($term->description);
                            echo '<a href="'.esc_url( get_term_link( $term ) ).'">
                              <svg class="next-arrow-black-svg" width="18" height="18" viewBox="0 0 18 18" fill="#FF2021">
                                <use xlink:href="#next-arrow-black-svg"></use>
                              </svg> 
                            </a>
                          </div>';
                        echo '</div>
                      </div>
                  </div>
                </div>';
                }
              echo "</div>";
              endif;
            }elseif( get_row_layout() == 'quote' ){
              $quoteIDs = get_sub_field('fc_quote');
              if( !empty($quoteIDs) ): 
                $fQuery = new WP_Query(array(
                'post_type' => 'quotes',
                'posts_per_page'=> -1,
                'post__in' => $quoteIDs
              ));
              if( $fQuery->have_posts() ):
              
              echo "<div class='dft-blockquote'><div class='dft-blockquote-inr'>";
              echo '<i>
                <svg class="quote-white-icon-svg" width="44" height="44" viewBox="0 0 44 44" fill="#ffff">
                  <use xlink:href="#quote-white-icon-svg"></use>
                </svg> 
              </i>';
              echo '<div class="dft-blockquote-slider  dftBlockquoteSlider">';
              while($fQuery->have_posts()): $fQuery->the_post();
              $fc_diensten = get_field('beschrijving');
              $naam = get_field('naam');
              $positie = get_field('positie');
              echo '<div class="dftBlockquoteSlideItem">';
              echo '<blockquote>';
              
              printf('%s', $fc_diensten);
              printf('<span>-%s, %s</span>', $naam, $positie);
              echo '</blockquote>';
              echo "</div>";
              endwhile;
              echo "</div></div></div>";
              endif; wp_reset_postdata();
              endif; 
            }elseif( get_row_layout() == 'usps' ){
               if( have_rows('fc_alle_usps') ):
                echo '<div class="dft-responsibility-grds-cntlr">
                  <div class="dft-responsibility-grds dftResponsibilityGrdsSlider">';
                    while( have_rows('fc_alle_usps') ) : the_row();
                      $icon = get_sub_field('icon');
                      $titel = get_sub_field('titel');
                    echo '<div class="dft-responsibility-grd-item"><div class="dft-responsibility-grd-item-inr mHc">';
                    if( !empty($icon) ): 
                      echo '<div class="dftrgi-icon mHc1">';
                        echo '<img src="'.$icon.'" alt="'.cbv_get_image_alt( $icon ).'">';
                      echo '</div>';
                      endif;
                    if( !empty($titel) ) printf('<strong class="dftrgi-title mHc2">%s</strong>', $titel);
                    echo '</div></div>';
                    endwhile;
              echo '</div></div>';
              endif;
            }elseif( get_row_layout() == 'cta' ){
               $cta_titel = get_sub_field('cta_titel');
               $cta_subtitel = get_sub_field('cta_subtitel');
               $cta_knop = get_sub_field('cta_knop');
                echo '<div class="dft-conversation-module">
                    <i>
                      <svg class="email-white-icon-svg" width="74" height="74" viewBox="0 0 74 74" fill="#ffffff">
                        <use xlink:href="#email-white-icon-svg"></use>
                      </svg> 
                    </i>';
                echo '<h2 class="dft-conversation-title">';   
                if( !empty($cta_titel) ) printf('<span>%s</span>', $cta_titel);
                if( !empty($cta_subtitel) ) printf('%s', $cta_subtitel);
                echo '</h2>';
                if( is_array( $cta_knop ) &&  !empty( $cta_knop['url'] ) ){
                      printf('<a href="%s" target="%s"><span>%s<i><svg class="btn-angle-icon-white-svg" width="14" height="14" viewBox="0 0 14 14" fill="#ffffff">
                            <use xlink:href="#btn-angle-icon-white-svg"></use>
                          </svg></i></span></a>', $cta_knop['url'], $cta_knop['target'], $cta_knop['title']); 
                  }
                echo '</div>';
            }elseif( get_row_layout() == 'promotions' ){
              $fc_promo = get_sub_field('fc_promotions');
              if( $fc_promo ):
              echo '<div class="dft-biggest-discounts-module">';
              echo '<span class="dft-left-angle">';
              echo '<img src="'.THEME_URI.'/assets/images/dft-left-angle.png">';
              echo '</span>';
              echo '<div class="dft-biggest-discounts-module-inr clearfix">';
              echo '<div class="dft-bdm-lft">';
              if( $fc_promo['titel'] ) printf('<span>%s</span>', $fc_promo['titel']);
              echo '</div>';
              echo '<div class="dft-bdm-rgt">';
              if( $fc_promo['promotion_text'] ) printf('<strong><span>-%s</span>%s</strong>', $fc_promo['percentage_waarde'], $fc_promo['promotion_text']);
              echo '</div>';
              echo '</div>';
              echo '</div>';
              endif;
            }elseif( get_row_layout() == 'downloads' ){
              $fc_dtitle = get_sub_field('fc_downloadtitle');
              $fc_downloads = get_sub_field('fc_downloads');
            echo '<div class="dft-downloads-module">';
            echo '<h3 class="dft-downloads-module-title">Downloads</h3>';
            echo '<div class="dft-download-items clearfix">';
              if( !empty( $fc_downloads ) ){
                $file = '#';
                foreach( $fc_downloads as $fcdownload ){
                  if( !empty($fcdownload['file']) ) $file = $fcdownload['file'];
                echo '<div class="dft-download-item">';
                echo '<div class="dft-download-item-inr mHc">';
                  echo '<a href="'.$file .'" class="overlay-link" download></a>';
                  echo '<i><img src="'.THEME_URI.'/assets/images/download-white-icon.svg"></i>';
                  if( !empty($fcdownload['titel']) ) printf('<strong>%s</strong>', $fcdownload['titel']);
                echo '</div>';
                echo '</div>';
                }
              }
            echo '</div></div><hr>';
            }elseif( get_row_layout() == 'afbeelding' ){
              $fc_afbeelding = get_sub_field('fc_afbeelding');
              if( !empty( $fc_afbeelding ) ){
                printf('<div class="dfp-plate-one-img-bx">%s</div>', cbv_get_image_tag($fc_afbeelding));
              }
            }elseif( get_row_layout() == 'horizontal_rule' ){
              $rheight = get_sub_field('fc_horizontal_rule');
              printf('<div class="dfhrule clearfix" style="height: %spx;"></div>', $rheight);
          
            }elseif( get_row_layout() == 'gap' ){
             $gap = get_sub_field('fc_gap');
             printf('<div class="gap-%s"></div>', $gap);
            }
          
           endwhile;?>
        </article>
      </div>
    </div>
  </div>
</section>
<?php get_template_part( 'templates/footer', 'top-2' ); ?>
<?php endwhile;  get_footer(); ?>
