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
                                    <div id="messages_product_view">
                                    </div>
                                    <div class="product-view">
                                       <div class="uk-grid uk-grid-collapse" data-uk-grid-match="">
                                          <div class="uk-width-medium-2-5" style="min-height:979px;">
                                             <div class="product-img-box">
                                                <div class="product-image product-image-zoom">
                                                <?php 
                                                     the_post_thumbnail('large');
                                                 ?>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="uk-width-medium-3-5 product-content" style="min-height: 979px;">
                                             <div class="uk-panel-space">
                                                <div class="product-essential">
                                                   <form action="" method="post" id="product_addtocart_form" class="uk-form">
                                                      <input name="form_key" type="hidden" value="">
                                                      <div class="uk-hidden">
                                                         <input type="hidden" name="product" value="712">
                                                         <input type="hidden" name="related_product" id="related-products-field" value="">
                                                      </div>
                                                      <div class="product-shop">
                                                         <div class="uk-clearfix">
                                                            <div class="uk-visible-small uk-text-right">
                                                            </div>
                                                            <div class="uk-grid">
                                                               <div class="uk-width-medium-5-5">
                                                                  <div class="product-name">
                                                                     <h2>
                                                                        <?php 
                                                                          the_title(); ?>      
                                                                     </h2>
                                                                  </div>
                                                                  <div class="product-sku uk-margin-bottom">
                                                                     Code:
                                                                     <span class="product-sku">
                                                            <?php
                                                                $code =get_field('code',get_the_ID());
                                                                echo $code;
                                                             ?>
                                                                     </span>
                                                                  </div>
                                                                  <div class="clear"></div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="price-box ">
                                                            <span class="regular-price" id="product-price-712">
                                                            <span class="price">
                                                              <?php
                                                                 $price =get_field('price',get_the_ID());  
                                                                 echo $price.'&nbsp;VNĐ';
                                                               ?>
                                                                
                                                            </span> 
                                                          </span>
                                                         </div>
                                                         <span class="unit-of-measure price-unit uk-clearfix"> / Món</span>
                                                         <div class="description uk-margin-bottom">
                                                            <div class="std">
                                                                  <?php the_content(); ?>
                                                            </div>
                                                         </div>
                                                         <div class="add-to-box">
                                                            <div class="add-to-cart uk-grid uk-grid-collapse">
                                                               <div class="uk-width-large-4-10 uk-width-medium-1-2 uk-width-2-3 product-quantity">
                                                                  <label for="qty">
                                                                  Số lượng                </label>
                                                                  <input type="text" name="qty" id="qty" maxlength="12" value="1" title="SL" class="input-text qty uk-width-medium-1-4 uk-width-1-5 uk-text-center">
                                                                  <span class="unit-of-measure"> / Món</span>            
                                                               </div>
                                                               <button type="button" title="Bỏ vào giỏ hàng" id="product-addtocart-button" class="button btn-cart uk-button uk-width-large-6-10 uk-width-medium-1-2 uk-width-1-3 uk-position-relative" onclick="productAddToCartForm.submit(this)">
                                                               <i class="icon uk-display-inline-block"></i>
                                                               </button>
                                                            </div>
                                                         </div>
                                                         <div class="uk-margin-top product-detail-block uk-margin-large-bottom">
                                                            <div class="product-collateral accordion-tabs tabs product-detail-tab" data-uk-grid-match="">
                                                               <ul class="toggle-tabs uk-list" data-uk-grid-match="{target:'li'}"></ul>
                                                               <div class="clear"></div>
                                                               <dl id="collateral-tabs" class="collateral-tabs uk-margin-remove">
                                                               <dt class="tab online-order current"><span class="online-order-icon">ĐẶT HÀNG TRỰC TUYẾN</span></dt>
                                                                  <dd class="tab-container current">
                                                                     <div class="tab-content">
                                                                        <p>Đơn đặt hàng trực tuyến phải có tổng giá trị trên <strong>100,000 vnd</strong>.</p>
                                                                        <p>Để biết thêm thông tin đặt hàng trực tuyến, vui lòng xem <a title="Điều khoản và điều kiện" href="#" target="_blank">Điền Khoản và Điều Kiện</a></p>
                                                                        <p>Sản phẩm hiện không có sẵn để đặt hàng online, bạn vui lòng qua cửa hàng mua bánh hoặc gọi đến hotline &nbsp;090 754 6668 - 096 938 6611 để biết thêm thông tin</p>
                                                                     </div>
                                                                  </dd>
                                                                  <dt class="tab custom-order"><span class="custom-order-icon">ĐƠN ĐẶT HÀNG ĐẶC BIỆT</span></dt>
                                                                  <dd class="tab-container">
                                                                     <div class="tab-content uk-text-center">
                                                                        <p>Để đặt các loại bánh không có trên trang web, xin vui lòng liên hệ&nbsp;090 754 6668 - 096 938 6611</p>
                                                                     </div>
                                                                  </dd>
                                                                  <dt class="tab last free-delivery"><span class="free-delivery-icon">MIỄN PHÍ GIAO HÀNG</span></dt>
                                                                  <dd class="tab-container last free-delivery">
                                                                     <div class="tab-content">
                                                                        <p>Chỉ giao hàng trong Hà Nội</p>
                                                                        <p>(Giao hàng trong phạm vi 10km từ một trong các cửa hàng của chúng tôi, xin đọc <a title="Điều khoản giao hàng" href="#">Điều khoản giao hàng</a>)</p>
                                                                     </div>
                                                                  </dd>
                                                               </dl>
                                                            </div>
                                                         </div>
                                                         <div class="uk-margin">
                                                            
                                                            <!-- AddThis API Config -->
                                                            
                                                            <!-- AddThis Button END -->
                                                            <style>
                                                               #at3win #at3winheader h3 {
                                                               text-align:left !important;
                                                               }
                                                            </style>
                                                         </div>
                                                      </div>
                                                      <div class="clearer"></div>
                                                   </form>
                                                  
                                                </div>
                                                <div class="product-collateral">
                                                </div>
                                                <div class="product-categories">
                                                   Danh Mục:
                                                   <a href="http://www.thuhuongbakery.com.vn/chefs-thu-huong.html">Chef's Thu Huong</a>, <a href="http://www.thuhuongbakery.com.vn/chefs-thu-huong/san-pham-moi.html">Sản phẩm mới</a>, <a href="http://www.thuhuongbakery.com.vn/chefs-thu-huong/giang-sinh.html">Giáng sinh</a>, <a href="http://www.thuhuongbakery.com.vn/gato.html">Gato</a>, <a href="http://www.thuhuongbakery.com.vn/gato/banh-dac-biet.html">Bánh đặc biệt</a>, <a href="http://www.thuhuongbakery.com.vn/gato/banh-dac-biet/sour-cream-gato.html">Sour Cream</a>                    
                                                </div>
                                                <div id="reviews" class="product-review uk-margin-top">
                                                   <div class="box-collateral box-reviews" id="customer-reviews">
                                                      <div class="form-add">
                                                         <!--<p class="review-nologged" id="review-form">-->
                                                         <!--</p>-->
            
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="clear"></div>
                              </div>
 </div>
  <section class="wpb-section wpb-section-1-cols wpb-section-columns wpb-font-dark">
                              <div class="wpb-section-inner" style="padding-top:50px;padding-bottom:50px;">
                                 <div style="margin-top:0px;margin-bottom:0px;" class="wpb-row wpb-row-large-width">
                                    <?php 
                                    query_posts(
                                          array(
                                          	'post_type'=>'special-set',
                                            'posts_per_page'=>9
                                          )
                                    	);
                                    get_template_part('loop','set'); 

                                   wp_reset_query();
                                    ?>
                                    <div class="wpb-clearfix"></div>
                                 </div>
                              </div>
                              <!--.wpb-section-inner-->
                           </section>
<?php get_footer(); ?>
