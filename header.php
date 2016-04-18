<!DOCTYPE html>
<html>
   <head>
      <!-- Meta Tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo BlOG_NAME; ?>  <?php wp_title("-",true); ?></title>
      <base href="<?php echo HOME_URL; ?>/">
      <style type="text/css">
         img.wp-smiley,
         img.emoji {
         display: inline !important;
         border: none !important;
         box-shadow: none !important;
         height: 1em !important;
         width: 1em !important;
         margin: 0 .07em !important;
         vertical-align: -0.1em !important;
         background: none !important;
         padding: 0 !important;
         }
      </style>
      <link rel='stylesheet' id='dashicons-css'  href='<?php echo TEMPLATE_PATH; ?>/css/dashicons.min.css?ver=4.4.2' type='text/css' media='all' />
      <link rel='stylesheet' id='swipebox-css'  href='<?php echo TEMPLATE_PATH; ?>/css/swipebox.min.css?ver=1.3.0' type='text/css' media='all' />
      <link rel='stylesheet' id='animate-css-css'  href='<?php echo TEMPLATE_PATH; ?>/css/animate.min.css?ver=3.3.0' type='text/css' media='all' />
      <link rel='stylesheet' id='flexslider-css'  href='<?php echo TEMPLATE_PATH; ?>/css/flexslider.min.css?ver=2.5.0' type='text/css' media='all' />
      <link rel='stylesheet' id='owlcarousel-css'  href='<?php echo TEMPLATE_PATH; ?>/css/owl.carousel.min.css?ver=2.0.0' type='text/css' media='all' />
      <link rel='stylesheet' id='wpb-icon-pack-css'  href='<?php echo TEMPLATE_PATH; ?>/css/icon-pack.min.css?ver=1.1.5' type='text/css' media='all' />
      <link rel='stylesheet' id='wpb-styles-css'  href='<?php echo TEMPLATE_PATH; ?>/css/app.css?ver=1.1.5' type='text/css' media='all' />
      <link rel='stylesheet' id='normalize-css'  href='<?php echo TEMPLATE_PATH; ?>/css/normalize.min.css?ver=3.0.0' type='text/css' media='all' />
      <link rel='stylesheet' id='bite-style-css'  href='<?php echo TEMPLATE_PATH; ?>/css/main.css?ver=1.1.5' type='text/css' media='all' />
      <link rel='stylesheet' id='bite-default-css'  href='<?php echo TEMPLATE_PATH; ?>/style.css' type='text/css' media='all' />
      <link rel='stylesheet' id='contact-form-7-css'  href='<?php echo TEMPLATE_PATH; ?>/css/styles.css' type='text/css' media='all' />
      <link rel='stylesheet' id='wolf-twitter-css'  href='<?php echo TEMPLATE_PATH; ?>/css/twitter.min.css?ver=2.0.9' type='text/css' media='all' />
      <link rel='stylesheet' id='wolf-gram-css'  href='<?php echo TEMPLATE_PATH; ?>/css/instagram.css?ver=1.4.3' type='text/css' media='all' />
      <link rel='stylesheet' id='wpb-restaurant-css'  href='<?php echo TEMPLATE_PATH; ?>/css/wpb-restaurant.css?ver=1.0.0' type='text/css' media='all' />
      <link rel='stylesheet' id='wolf-gram-css'  href='<?php echo TEMPLATE_PATH; ?>/css/reset.css?ver=1.4.3' type='text/css' media='all' />
      <link rel='stylesheet' href='<?php echo TEMPLATE_PATH; ?>/css/home.css' type='text/css' media='all' />
      <link rel='stylesheet'  href='<?php echo TEMPLATE_PATH; ?>/css/datepicker.css?ver=1.4.3' type='text/css' media='all' />
      <link rel='stylesheet'  href='<?php echo TEMPLATE_PATH; ?>/css/latoja.datepicker.css' type='text/css' media='all' />
      <link rel='stylesheet'  href='<?php echo TEMPLATE_PATH; ?>/css/slick.min.css' type='text/css' media='all' />

      <link rel='stylesheet'  href='<?php echo TEMPLATE_PATH; ?>/css/filter.css' type='text/css' media='all' />

      <link rel='stylesheet' id='wolftheme-theme-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,700|Oswald:400,700|Alex+Brush|Noto+Serif:400,700&#038;subset=latin,latin-ext' type='text/css' media='all' />
      <script type='text/javascript' src='<?php echo TEMPLATE_PATH; ?>/js/jquery.js?ver=1.11.3'></script>
      <script type='text/javascript' src='<?php echo TEMPLATE_PATH; ?>/js/slick.min.js?ver=1.2.1'></script>
      <script type='text/javascript' src='<?php echo TEMPLATE_PATH; ?>/js/slick.js?ver=1.2.1'></script>
      <script type='text/javascript' src='<?php echo TEMPLATE_PATH; ?>/js/jquery-migrate.min.js?ver=1.2.1'></script>
   
      <link rel='stylesheet' id='bite-default-css'  href='<?php echo TEMPLATE_PATH; ?>/css/responsive/w800.css?ver=1.1.5' type='text/css' media='all' />

      <link href="<?php echo TEMPLATE_PATH; ?>/css/index.css" type="text/css"/>
      <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
   <link rel="shortcut icon" href="<?php
        if ( function_exists( 'get_field' ) ) {
          $favicon_src = get_field( 'favicon_src','option' );
          echo $favicon_src;
        }
         ?>">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <?php wp_head(); ?>  

   </head>
   <body class="home page page-id-2 page-template-default wolf-page-builder bite wolf skin-light albums-columns-4 albums-padding-yes discography-columns-4 discography-padding-yes videos-padding-yes videos-columns-3 shop-padding-yes shop-columns-4 has-wpb no-hero sticky-menu menu-layout-centered menu-width-boxed menu-transparent post-hide-title-area">
      <div id="top"></div>
      <div id="loading-overlay">
         <div id="loader">
            <div class="loader5"></div>
         </div>
         <!-- #loader -->
      </div>
      <!-- #loading-overlay -->
      <div id="navbar-mobile-container">
         <div id="navbar-mobile" class="navbar clearfix">
            <nav id="site-navigation-primary-mobile" class="navigation main-navigation clearfix">
               <div class="menu-main-menu-left-container">
                  <ul id="menu-main-menu-left" class="nav-menu-mobile dropdown">
                     <li id="menu-item-104" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item menu-item-104 sub-menu-dark menu-item-icon-before"><a href="#"><span class="menu-item-inner">Trang Chủ</span></a></li>
                     <li id="menu-item-71" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-71 sub-menu-dark menu-item-icon-before">
                        <a href="#"><span class="menu-item-inner">Giới thiệu</span></a>
                     </li>
                     <li id="menu-item-106" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-106 sub-menu-dark menu-item-icon-before"><a href="#"><span class="menu-item-inner">Thực đơn</span></a></li>
                  </ul>
               </div>
               <div class="menu-main-menu-right-container">
                  <ul id="menu-main-menu-right" class="nav-menu-mobile dropdown">
                     <li id="menu-item-107" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-107 sub-menu-dark menu-item-icon-before">
                        <a href="#"><span class="menu-item-inner">Special sets</span></a>
                        
                     </li>
                     <li id="menu-item-137" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-137 sub-menu-dark menu-item-icon-before">
                        <a href="#"><span class="menu-item-inner">Liên hệ</span></a>
                        
                     </li>
                     <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-115 button-style sub-menu-dark menu-item-icon-before">
                     <a href="#" class="ordernow"><span class="menu-item-inner"><i class="fa line-icon-truck"></i>Đặt bàn</span></a></li>
                  </ul>
               </div>
            </nav>
            <!-- #site-navigation-primary -->
         </div>
         <!-- #navbar-mobile -->
      </div>
      <!-- #navbar-mobile-container -->
      <div class="site-container">
         <div class="uk-clearfix uk-top">
            <div class="uk-float-left">
               <div class="hot-line uk-display-inline-block">
                  <span class="label">Hotline</span>
                  <strong>
                  <?php
                       if ( function_exists( 'get_field' ) ) {
                                 $hotline = get_field( 'hotline','option' );
                      
                      }
                    
                     ?>
                  <a href="tel:<?php echo $hotline; ?> " class="uk-text-danger">
                   <?php echo $hotline; ?>                        

                  </a>
                  </strong>
               </div>
            </div>
            <div class="uk-float-right header-right">
               <form id="search_mini_form" action="<?php echo HOME_URL; ?>" method="get" class="uk-display-inline-block">
                  <div class="form-search uk-search">
                     <input id="search" type="search" name="q" value="" class="input-text uk-search-field" placeholder="TÌM KIẾM" maxlength="128" autocomplete="off">
                     <button type="submit" title="Tìm kiếm" class="uk-hidden">
                        <!--<i class="uk-icon-search"></i>-->
                     </button>
                  </div>
                  <div id="search_autocomplete" class="search-autocomplete uk-hidden-small" style="display: none;"></div>
                  
               </form>
               <div class="account-cart-wrapper uk-display-inline-block">
                  <a href="#" data-target-element="#header-account" class="skip-link skip-account">
                     <span class="icon"></span>
                     <span class="label">Tài khoản của tôi</span>
                     <div class="close-icon uk-float-right uk-display-inline-block uk-invisible"></div>
                  </a>
               </div>
               <!-- Cart -->
               <div class="header-minicart uk-display-inline-block">
                  
                  <div id="header-cart" class="block block-cart skip-content uk-hidden-small">
                     <div class="minicart-wrapper">
                        <div class="message-content">
                           <div class="minicart-message minicart-error-message"></div>
                           <div class="minicart-message minicart-success-message"></div>
                        </div>
                        
                        <div class="bottom-cart-phone">
                           <div class="mini-header-phone uk-text-right">
                              Hotline: <a class="mini-create-phone" href="tel:<?php echo $hotline; ?>"><?php echo $hotline; ?></a>            
                           </div>
                           <a class="cart-link uk-display-block uk-text-center" href="#">
                           Xem giỏ hàng            </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="header-account" class="skip-content ">
            <div class="block block-login">
              <?php echo do_shortcode('[userpro template=login]'); ?>
               
            </div>
         </div>
         <div id="page" class="hfeed site pusher">
            <div id="page-content">
               <header id="masthead" class="site-header clearfix">
                  <div class="overlay"></div>
                  <div id="navbar-container" class="clearfix">
                     <div class="wrap">
                        <div id="navbar-left" class="navbar clearfix">
                           <nav class="site-navigation-primary navigation main-navigation clearfix">
                              <div class="menu-main-menu-left-container">
                                 <ul id="menu-main-menu-left-1" class="nav-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item menu-item-104 sub-menu-dark menu-item-icon-before">
                                    <a href="<?php echo HOME_URL; ?>"><span class="menu-item-inner">Trang Chủ</span></a></li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-71 sub-menu-dark menu-item-icon-before">
                                       <a href="<?php echo HOME_URL; ?>/gioi-thieu"><span class="menu-item-inner">Giới thiệu</span></a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-106 sub-menu-dark menu-item-icon-before"><a href="<?php echo HOME_URL; ?>/menu"><span class="menu-item-inner">Thực đơn</span></a></li>
                                 </ul>
                              </div>
                           </nav>
                           <!-- #site-navigation-primary -->
                        </div>
                        <!-- #navbar -->
                  <div class="logo-container">
                     <div class="logo">
                     <?php
                          if ( function_exists( 'get_field' ) ) {
                                  $logo = get_field( 'logo_src','option' );
                                  
                           }
                      ?>
                     <a href="<?php echo HOME_URL; ?>" rel="home">
                       <span class="logo-img-inner">
                         <img src="<?php echo $logo; ?>" alt="logo-light" class="logo-img logo-light">
                         
                        </span>
                     </a>
                           </div>
                           <!-- .logo -->
                        </div>
                        <!-- .logo-container -->         
                        <div id="navbar-right" class="navbar clearfix">
                           <nav class="site-navigation-primary navigation main-navigation clearfix">
                              <div class="menu-main-menu-right-container">
                                 <ul id="menu-main-menu-right-1" class="nav-menu">
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-107 sub-menu-dark menu-item-icon-before menu-item-has-children">
                                       <a href="<?php echo HOME_URL; ?>/special-sets"><span class="menu-item-inner">Special sets</span></a>
                                       <ul class="sub-menu">
                                          <li><a href="#">SASHIMI SETS</a></li>
                                          <li><a href="#">SUSHI SETS</a></li>
                                          <li><a href="#">TERIYAKI SETS</a></li>
                                          <li><a href="#">LUNCH SETS</a></li>
                                          <li><a href="#">DINNER SETS</a></li>
                                          <li><a href="#">BENTO SETS</a></li>
                                          <li><a href="#">PARTY TRAYS</a></li>
                                          <li><a href="#">HAPPY HOURS SETS</a></li>
                                       </ul>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-137 sub-menu-dark menu-item-icon-before">
                                       <a href="<?php echo HOME_URL; ?>/lien-he"><span class="menu-item-inner">Liên hệ</span></a>
                                       
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-115 button-style sub-menu-dark menu-item-icon-before"><a href="#" class="ordernow"><span class="menu-item-inner"><i class="fa line-icon-truck"></i>Đặt bàn</span></a></li>
                                 </ul>
                              </div>
                           </nav>
                           <!-- #site-navigation-primary -->
                        </div>
                        <!-- #navbar -->
                        
                           
                     </div>
                     <!-- .wrap -->
                  </div>
                  <!-- #navbar-container -->
                  <div id="mobile-bar">

                     <div class="logo-container">
                        <div class="logo">
                           <a href="<?php echo HOME_URL; ?>" rel="home">
                              <span class="logo-img-inner">
                              <img src="<?php echo $logo; ?>" alt="logo-light" class="logo-img logo-light">
                              </span>
                           </a>
                        </div>
                        <!-- .logo -->
                     </div>
                     <!-- .logo-container -->         
                     <div id="toggle"></div>
                     <!-- #toggle -->
                  </div>
                  <!-- #mobile-bar -->
                  <section class="post-header-container">
                     <div class="post-header-inner">
                        <div class="post-header text-center">
                           <div class="wrap intro">
                              <div class="post-title-container">
                                 <h1 class="post-title">Home</h1>
                              </div>
                              <!--.post-title-container-->
                           </div>
                           <!--.wrap.intro-->
                        </div>
                        <!--.post-header -->
                     </div>
                     <!--.post-header-inner -->
                  </section>
                  <a id="scroll-down" class="scroll" href="#main"></a>
               </header>
               <!-- #masthead -->
               <div id="main" class="site-main clearfix">
                  <div class="site-wrapper">
                     <div id="wpb-container">
                        <div id="wpb-content" role="main">
                        <?php if(is_home() || is_front_page()){ ?>
                          <div id="slick">
                            <div>   
                          <div class="img--holder" style="background-image: url(<?php echo TEMPLATE_PATH; ?>/images/slide.jpg);"></div>
                          </div>
                          <div>
                          <div class="img--holder" style="background-image: url(<?php echo TEMPLATE_PATH; ?>/images/slide.jpg);"></div>
                           </div>
                         </div>
                         <?php }else{ ?>
                            <section style="background-image: url(<?php echo TEMPLATE_PATH; ?>/images/bg.jpg);" class="wpb-section wpb-section-1-cols wpb-section-columns wpb-font-light wpb-section-parallax" data-section-index="0" data-top="0"><div class="wpb-section-overlay" style="background-color:#000000;opacity:0.4;"></div><div class="wpb-section-inner" style="padding-top:200px;padding-bottom:150px;"><div class="wpb-row wpb-row-standard-width"><div class=""><h2 style="line-height: 1; font-weight: 700; letter-spacing: 0px; text-transform: none; font-size: 32px;" class="wpb-fittext wpb-text-center wpb-clearfix" data-max-font-size="32"></h2></div><!--.wpb-col--></div><!--.wpb-row-->
                           </div><!--.wpb-section-inner-->
                           </section>
                         <?php } ?> 
                        </div>
                           <!-- /#slick -->
                           
                           <!--.wpb-section-->
                           <section class="wpb-section wpb-section-1-cols wpb-section-columns wpb-font-dark">

                              <div class="orderBox">
                                 <div class="ordergroup">
                            <form method="post" action="">
                                    <div class="order_slide1">
                                       <div class="restaurant">
                                         <p> Họ tên </p>
                                         <input type="text" value="" name="username" placeholder="Họ và tên">
                                       </div>
                                       <div class="calendar">
                                         <p> Thời gian </p>
                                         <input id="date-picker-1" type="text" class="date-picker ll-skin-latoja" name="order-date" value="">
                                       </div>
                                       <div class="time">
                                         <p> Giờ </p>
                                         <select name="order-time" id="time_order"><option value="10 : 00">10 : 00</option><option value="10 : 30">10 : 30</option><option value="11 : 00">11 : 00</option><option value="11 : 30">11 : 30</option><option value="12 : 00">12 : 00</option><option value="12 : 30">12 : 30</option><option value="13 : 00">13 : 00</option><option value="13 : 30">13 : 30</option><option value="14 : 00">14 : 00</option><option value="14 : 30">14 : 30</option><option value="15 : 00">15 : 00</option><option value="15 : 30">15 : 30</option><option value="16 : 00">16 : 00</option><option value="16 : 30">16 : 30</option><option value="17 : 00">17 : 00</option><option value="17 : 30">17 : 30</option><option value="18 : 00">18 : 00</option><option value="18 : 30">18 : 30</option><option value="19 : 00">19 : 00</option><option value="19 : 30">19 : 30</option><option value="20 : 00">20 : 00</option><option value="20 : 30">20 : 30</option><option value="21 : 00">21 : 00</option><option value="21 : 30">21 : 30</option><option value="22 : 00">22 : 00</option><option value="22 : 30">22 : 30</option></select>
                                       </div>
                                       <div class="mumberparty">
                                         <p> Số người </p>
                                         <select name="order-people">
                                           <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option>                <option value="15+">15+</option>
                                         </select>
                                       </div>
                                       <div class="button_request" id="contactbtn"> 
                                          <p>&nbsp;</p>
                                          <?php
                                            if(is_user_logged_in ()){
                                                $user_ID = get_current_user_id();
                                              ?>
                                               <input type="hidden" value="<?php echo $user_ID; ?>" name="user_id"></input>
                                                <?php 
                                                  wp_nonce_field( 'order-table', 'order' );
                                                ?>
                                                <input type="submit" class="btn" name="order" value="Đặt bàn"> 
                                            <?php 
                                            }else{
                                              ?>
                                              <a href="#" data-target-element="#header-account" class="btn skip-link">Đặt bàn</a> 
                                              <?php 
                                            }
                                           ?>
                                          
                                       </div>
                                       <div class="clear"></div>
                                     </div>
                                 </form>
                                 </div>
                              </div>