<?php get_header(); ?>
<div class="productDetail ">                           
   <div class="wpb-row wpb-row-large-width">
         <div class="breadcrumbs">
          <div class="uk-container uk-container-center">
           <?php if(function_exists('bcn_display'))
                     {
                       bcn_display();
                     }

                   ?>
              </div>
                                 </div>
                                 <div class="uk-container uk-container-center uk-margin">
                                    <?php
                                       if(have_posts()){
                                           the_post();
                                           the_content();

                                       }
                                     ?>
                                 </div>
                                 <div class="clear"></div>
                              </div>
 </div>
 
<?php get_footer(); ?>
