<?php 
if(have_posts()){
     $i = 0;
      while (have_posts()) {
         $i++;
         the_post();
         $title_product = get_the_title();
         $link_product = get_the_permalink();
         $price =get_field('price',get_the_ID());

         ?>
         <!--.wpb-col--> 
                                    <div class="wpb-col-4 wpb-last">
                                       <div class="wpb-item-price wpb-clearfix wpb-item-price-layout-big-image wow fadeInRight" style="animation-delay: 0.2s; visibility: visible; animation-name: fadeInRight;">
                                          <div class="wpb-item-price-image-container ">
                                           <a href="<?php echo $link_product; ?>" title="<?php echo $title_product; ?>" data-wpb-rel="item-price" rel="item-price">
                                           <?php 
                                                if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail('thumb-set');
                                                }
                                             ?>
                                             </a>
                                         </div>
                                          <!--.wpb-item-price-image-container-->
                                          <div class="wpb-item-price-text ">
                                             <div class="wpb-item-price-title-container">
                                                <div class="wpb-item-price-title">
                                                <?php echo $title_product; ?></div>
                                                <div class="wpb-item-price-dots"></div>
                                                <div class="wpb-item-price-price"><?php echo $price; ?></div>
                                             </div>
                                             <div class="wpb-clear"></div>
                                             <span class="wpb-item-price-content">
                                                 <?php the_excerpt(); ?>
                                             </span>
                                          </div>
                                          <!--.wpb-item-price-text-->
                                       </div>
                                       <!--.wpb-item-price-->
                                    </div>
                                    <!--.wpb-col-->
        

         <?php 
      }
   }
?>