<?php
 /*
  TEMPLATE NAME: Home
 */
 get_header();
  ?>

    <div class="wpb-section-inner menu-block" style="padding-top:50px;padding-bottom:50px;">
       <div style="margin-top:0px;margin-bottom:0px;" class="wpb-row wpb-row-large-width">
          
      <?php 
           $terms = get_terms(
                'type-menu',
                 array('hide_empty'=>0)
                
               );
           
           if($terms){
              foreach ($terms as $term) {
                 $name_term = $term->name;
                 $img_id = get_field('thumb_image','type-menu_'.$term->term_id);
                
                 $img_term = wp_get_attachment_image_src($img_id,'thumb-type-menu');
                 ?>
                 <div class="wpb-col-4 wpb-first">
                   <div class="wpb-text-block wow fadeInLeft">
                      <h2 class="h2title"><?php echo $name_term; ?></h2>
                   </div>
                   <div class="wpb-item-price wpb-clearfix wpb-item-price-layout-big-image wow fadeInLeft" style="">
                    <div class="wpb-item-price-image-container">
                      <img class="wpb-item-price-image" src="<?php echo $img_term[0]; ?>" alt="<?php echo $name_term; ?>"></div>
                    <?php 
                        $menus =get_posts(
                          array(
                           'post_type'=>'menus',
                           'posts_per_page'=>-1,
                           'tax_query' => array(
                              array(
                               'taxonomy' => 'type-menu',
                                'terms' =>array($term->term_id),
                                'field' => 'id'
                            )
                          )
                           
                        )
                      );

                    global $post;
                    if($menus){
                        foreach ($menus as $post) {
                           setup_postdata( $post);
                           $title = $post->post_title;
                           $link = get_permalink($post->ID);
                           $price = get_field('price',$post->ID);
                           
                           ?>
                           <!--.wpb-item-price-image-container-->
                            <div class="wpb-item-price-text ">
                               <div class="wpb-item-price-title-container">
                                  <div class="wpb-item-price-title"><a href="<?php echo $link; ?>">
                                  <?php echo $title; ?>
                                  </a>
                                  </div>
                                  <div class="wpb-item-price-dots"></div>
                                  <div class="wpb-item-price-price">$<?php echo $price; ?></div>
                               </div>
                               <div class="wpb-clear"></div>
                               <span class="wpb-item-price-content">
                                  <?php the_excerpt(); ?>   
                              </div>
                            <!--.wpb-item-price-text-->
                           <?php
                        }
                        wp_reset_postdata();

                    }

                    ?>


                   </div>
                   <!--.wpb-item-price-->
              </div>
          <!--.wpb-col--> 
                 <?php 
              }
              wp_reset_query();
           }
       ?>

      <div class="wpb-clearfix"></div>
       </div>
       
       <!-- <div class="seefullMenu">
          <a data-color="#ffbd3d" class="" href="#">SEE FULL MENU</a>
       </div> -->
    </div>
    <!--.wpb-section-inner-->
 </section>
<!--.wpb-section-->
                           <section  style="background-position:center center;background-repeat:no-repeat;-webkit-background-size: 100%; -o-background-size: 100%; -moz-background-size: 100%; background-size: 100%;-webkit-background-size: cover; -o-background-size: cover; background-size: cover;" class="intro-block wpb-section wpb-section-1-cols wpb-section-columns wpb-font-dark">
                              <div class="wpb-section-inner">
                                 <div class="wpb-row wpb-row-standard-width">
                                    <div class="">
                                       <div class="wpb-text-block wow fadeIn">
                                         <?php 
                                            if(have_posts()){
                                               the_post();
                                               the_content();
                                            }
                                         ?>
                                       </div>
                                    </div>
                                    <!--.wpb-col-->
                                 </div>
                                 <!--.wpb-row-->
                              </div>
                              <!--.wpb-section-inner-->
                           </section>
                           <!--.wpb-section-->
                           <section style="background-position:center center;background-repeat:no-repeat;-webkit-background-size: 100%; -o-background-size: 100%; -moz-background-size: 100%; background-size: 100%;-webkit-background-size: cover; -o-background-size: cover; background-size: cover;" class=" wpb-section wpb-section-2-cols wpb-section-blocks">
                              <div class="wpb-section-inner">
                                 <div class="wpb-blocks-wrapper">
                                    <div class="wpb-block wpb-block-media wpb-font-dark" style="">
                                       <div class='wpb-video-bg-container videobg'>
                                          
                                          <div class="wpb-video-bg-overlay"></div>
                                       </div>
                                       <div class="wpb-block-content">
                                          <div class="wpb-block-inner">
                                             <div class="wpb-clear" style="height:500px;"></div>
                                          </div>
                                          <!-- .wpb-block-inner -->
                                       </div>
                                       <!-- .wpb-block-content -->
                                    </div>
                                    <!-- .wpb-block --> 
                                    <div class="wpb-block wpb-block-text wpb-font-light" style="background-image:url();background-position:center center;background-repeat:repeat;">
                                       <div class="wpb-block-content about-block">
                                          <div class="wpb-block-inner">
                                             <div class="wpb-text-block wow fadeInRightBig">
                                                
                                            <?php 
                                                $intro = get_page_by_path('gioi-thieu');
                                                if($intro){

                                                   $intro_title= $intro->post_title;
                                                   $intro_link =get_permalink($intro->ID);
                                                   $intro_content =$intro->post_content;
                                                }
                                            ?>
                                                <h2 class="h2title">
                                                  <?php echo $intro_title; ?>
                                                </h2>
                                                <p><?php echo $intro_content; ?></p>
                                             </div>
                                             <div class="wpb-button-container wow fadeInUp wpb-text-left" style="animation-delay:0.4s;-webkit-animation-delay:0.4s;"><span class="wpb-button-inner"><a data-color-hover="#c38000" class="ab_button wpb-button wpb-icon-before wpb-medium wpb-flat" href="
                                             <?php echo $intro_link; ?>">MORE INFOS</a></span> </div>
                                          </div>
                                          <!-- .wpb-block-inner -->
                                       </div>
                                       <!-- .wpb-block-content -->
                                    </div>
                                    <!-- .wpb-block -->
                                 </div>
                                 <!--.wpb-blocks-wrapper-->
                              </div>
                              <!--.wpb-section-inner-->
                           </section>
                           <!--.wpb-section-->
                           <section style="background-image:url(<?php echo TEMPLATE_PATH; ?>/images/q-bg.jpg);background-position:center center;background-repeat:no-repeat;-webkit-background-size: 100%; -o-background-size: cover; -moz-background-size: cover; background-size: cover;-webkit-background-size: cover; -o-background-size: cover; background-size: cover;" class="wpb-section wpb-section-1-cols wpb-section-columns wpb-font-light wpb-section-parallax quality-block">
                              <div class="wpb-section-inner">
                                 <div class="text-block wpb-row wpb-row-large-width">
                                    <div class="">
                                       <h4 style="line-height:1;font-weight:700;letter-spacing:0px;font-family:Alex Brush;text-transform:none;" class="wpb-fittext wpb-text-center wpb-clearfix wow fadeIn" data-max-font-size="86">Quality &amp; Delicious Food since 1993</h4>
                                    </div>
                                    <!--.wpb-col-->
                                 </div>
                                 <!--.wpb-row-->
                              </div>
                              <!--.wpb-section-inner-->
                           </section>
                           <!--.wpb-section-->
                           <section class="whole-block wpb-section wpb-section-1-cols wpb-section-columns wpb-font-dark">
                              <div class="wpb-section-inner" style="padding-top:50px;padding-bottom:50px;">
                                 <div class="wpb-row wpb-row-standard-width">
                                    <div class="">
                                       <div class="wpb-text-block wow fadeIn">
                                          <h4 style="text-align: center;">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</h4>
                                       </div>
                                    </div>
                                    <!--.wpb-col-->
                                 </div>
                                 <!--.wpb-row-->
                              </div>
                              <!--.wpb-section-inner-->
                           </section>
                           <!--.wpb-section-->
                           <section class="wpb-section wpb-section-1-cols wpb-section-columns wpb-font-dark">
                              <div class="wpb-section-inner" style="padding-top:0px;padding-bottom:0px;">
                                 <div class="wpb-row wpb-row-full-width">
                                    <div class="cd-main-content wpb-images-gallery">
                                       <h3 class="center title">Menus</h3>
                                       <div class="cd-tab-filter-wrapper menuFitler">
                                          <div class="cd-tab-filter">
                                            
                                          </div> <!-- cd-tab-filter -->
                                       </div> <!-- cd-tab-filter-wrapper -->

                                       <style scoped> .wpb-images-gallery .wpb-block { float: left; width: 33.32%;}</style>


                                          <div class="wpb-images-gallery wpb-clearfix wpb-simple-gallery wpb-hover-scale-to-greyscale">
                                          <section class="cd-gallery">
                                            <?php 
                                        query_posts('post_type=special-set&posts_per_page=9');  
                                               if(have_posts()){
                                                 echo '<ul>';
                                                 $i = 0;
                                                  while (have_posts()) {
                                                     $i++;
                                                     the_post();
                                                     $title_product = get_the_title();
                                                     $link_product = get_the_permalink();

                                                     ?>
                                                    <li class="mix product-1 check1 radio2 option3 wpb-block">
                                                     <a href="<?php echo $link_product; ?>" class="wpb-image-inner">
                                                     <?php 
                                                        if ( has_post_thumbnail() ) {
                                                            the_post_thumbnail('thumb-set');
                                                        }
                                                     ?>
                                                     </a></li>
                                                 
                                                     <?php 
                                                  }

                                                  echo '</ul>';
                                               }
                                               wp_reset_query();
                                            ?>

                                          </section> <!-- cd-gallery -->
                                       </div>
                                       <!--.wpb-simple-gallery-->
                                    </div>
                                    <!--.wpb-col-->
                                 </div>
                                 <!--.wpb-row-->
                              </div>
                              <!--.wpb-section-inner-->
                           </section>
                           <!--.wpb-section-->
                           <section style="background-position:center center;background-repeat:no-repeat;-webkit-background-size: cover; -o-background-size: cover; -moz-background-size: cover; background-size: cover;-webkit-background-size: cover; -o-background-size: cover; background-size: cover;" class="wpb-section wpb-section-1-cols wpb-section-columns wpb-font-dark enjoy-block">
                              <div class="wpb-section-inner">
                                 <div class="wpb-row wpb-row-standard-width">
                                    <div class="">
                                       <div class="wpb-text-block wow fadeInUp">
                                          <h2 class="h1 center" style="text-align: center;">Enjoy our homemade Specials with your choice of a glass of Vine or a Beer.</h2>
                                          <h3 style="text-align: center;">$15 per person</h3>
                                          <h4 style="text-align: center;">Every Friday, 12-4pm</h4>
                                       </div>
                                    </div>
                                    <!--.wpb-col-->
                                 </div>
                                 <!--.wpb-row-->
                              </div>
                              <!--.wpb-section-inner-->
                           </section>
                           <!--.wpb-section-->
                           <section style="background-image:url(<?php echo TEMPLATE_PATH; ?>/images/bgvideo.jpg);background-position:center center;background-repeat:no-repeat;-webkit-background-size: cover; -o-background-size: cover; -moz-background-size: cover; background-size: cover;-webkit-background-size: cover; -o-background-size: cover; background-size: cover;" class="video-block2 wpb-section wpb-section-1-cols wpb-section-columns wpb-font-light">
                              <div class="wpb-section-overlay" style="background-color:#000000;opacity:0.4;"></div>
                              <div class="wpb-section-inner" style="padding-top:120px;padding-bottom:120px;">
                                 <div class="wpb-row wpb-row-standard-width">
                                    <div class="">
                                       <div class="wpb-video-opener wpb-video-opener-align-center"><a href="https://vimeo.com/15306847" class="wpb-video-lightbox"><img src="<?php echo TEMPLATE_PATH; ?>/images/play.png" alt="video-opener-play-button" class="wpb-video-opener-default-image"></a></div>
                                       <!-- .wpb-video-opener -->
                                       <div class="wpb-text-block">
                                          <h2 style="text-align: center;">Watch Our Video</h2>
                                       </div>
                                    </div>
                                    <!--.wpb-col-->
                                 </div>
                                 <!--.wpb-row-->
                              </div>
                              <!--.wpb-section-inner-->
                           </section>
                           <!--.wpb-section-->
<?php get_footer(); ?> 

    