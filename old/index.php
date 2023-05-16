<?php 
require_once 'core/conn.php';
  
require_once 'core/theme.php';
session_start();

$sql = mysqli_query($con, "SELECT * FROM  general");
            if 
            (mysqli_num_rows($sql) > 0){
              $web = mysqli_fetch_assoc($sql);
            }
            

?>
<!DOCTYPE html>
<html lang="en-US">
  
   
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   

   <head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Aila">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="author" content="HiBootstrap">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $web['name']?> | Buy Data, VTU Recharge, Bills Payment</title>

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="static/img/ms-icon-144x144.html">
    <meta name="theme-color" content="#6d14ae">

    <script src="../use.fontawesome.com/d3bea22ec6.js"></script>
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="static/gigabundle/bootstrap.css">
    <link rel="stylesheet" href="static/gigabundle/main.css">
    <script src="static/gigabundle/jquery-2.2.4.min.js"></script>
    <script src="static/gigabundle/main.js"></script>

    <meta name="msapplication-TileColor" content="#5230b0 ">
    <meta name="msapplication-TileImage" content="/static/img/bg.jpg">
    <meta itemprop="name" content="<?php echo $row['username']?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="/static/img/bg.jpg">
    <link rel="stylesheet" href="static/ogbam/w3.css">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="/static/img/bg.jpg">
    <meta name="twitter:title" content="<?php echo $row['username']?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta name="twitter:image:src" content="/static/img/bg.jpg">

    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="/static/img/bg.jpg">
    <meta property="og:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN."/>
    <meta property="og:site_name" content=""/>
    <meta property="og:url" content="https://">
    <meta property="og:type" content="website">

      <meta name='robots' content='max-image-preview:large' />
      <link rel='dns-prefetch' href='http://www.google.com/' />
      <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
      <link rel='dns-prefetch' href='http://s.w.org/' />
      <link rel="alternate" type="application/rss+xml" title="Apdash &raquo; Feed" href="feed/index.html" />
      <link rel="alternate" type="application/rss+xml" title="Apdash &raquo; Comments Feed" href="comments/feed/index.html" />
      <script type="text/javascript">
         window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/13.0.1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/13.0.1\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/apdash-wp.themetags.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.7.2"}};
         !function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode;p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0);e=i.toDataURL();return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(!p||!p.fillText)return!1;switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([55357,56424,8205,55356,57212],[55357,56424,8203,55356,57212])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(n=t.source||{}).concatemoji?c(n.concatemoji):n.wpemoji&&n.twemoji&&(c(n.twemoji),c(n.wpemoji)))}(window,document,window._wpemojiSettings);
      </script>
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
      <link rel='stylesheet' id='wp-block-library-css'  href='static/stylem/assets/wp-includes/css/dist/block-library/style.min9f319f31.css?ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='contact-form-7-css'  href='static/stylem/assets/wp-content/plugins/contact-form-7/includes/css/stylesc225c225.css?ver=5.4.1' type='text/css' media='all' />
      <link rel='stylesheet' id='apdash-style_main-css'  href='static/stylem/assets/wp-content/themes/apdash/style6e0e6e0e.css?ver=3.0.0' type='text/css' media='all' />
      <link rel='stylesheet' id='bootstrap-css'  href='static/stylem/assets/wp-content/themes/apdash/assets/css/bootstrap.min9f319f31.css?ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='font-awesome-five-css'  href='static/stylem/assets/wp-content/themes/apdash/assets/css/font-awesome9f319f31.css?ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='preloder-css'  href='static/stylem/assets/wp-content/themes/apdash/assets/css/loader.min9f319f31.css?ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='themify-css'  href='static/stylem/assets/wp-content/themes/apdash/assets/css/themify-icons9f319f31.css?ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='magnific-popup-css'  href='static/stylem/assets/wp-content/themes/apdash/assets/css/magnific-popup9f319f31.css?ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='animate-css-css'  href='static/stylem/assets/wp-content/themes/apdash/assets/css/animate9f319f31.css?ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='apdash-style-css'  href='static/stylem/assets/wp-content/themes/apdash/assets/css/app6e0e6e0e.css?ver=3.0.0' type='text/css' media='all' />
      <!-- <style id='apdash-style-inline-css' type='text/css'>
         #preloader {
         position: fixed;
         top: 0;
         left: 0;
         bottom: 0;
         right: 0;
         background-color: rgba(150,41,230,0.97);
         z-index: 9999999;
         }
         #loader {
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         }
         .element{ color: #ffbc00; }
      </style> -->
      <link rel='stylesheet' id='apdash-fonts-css'  href='https://fonts.googleapis.com/css?family=Montserrat%3A400%2C500%2C600%2C700%7CRoboto%3A300%2C400%2C500%2C600%2C700%2C800&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />
      <link rel='stylesheet' id='elementor-icons-css'  href='static/stylem/assets/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min21f921f9.css?ver=5.11.0' type='text/css' media='all' />
      <link rel='stylesheet' id='elementor-frontend-legacy-css'  href='static/stylem/assets/wp-content/plugins/elementor/assets/css/frontend-legacy.minee9aee9a.css?ver=3.2.2' type='text/css' media='all' />
      <link rel='stylesheet' id='elementor-frontend-css'  href='static/stylem/assets/wp-content/plugins/elementor/assets/css/frontend.minee9aee9a.css?ver=3.2.2' type='text/css' media='all' />
      <link rel='stylesheet' id='elementor-post-7-css'  href='static/stylem/assets/wp-content/uploads/elementor/css/post-73a263a26.css?ver=1619704119' type='text/css' media='all' />
      <link rel='stylesheet' id='themify-icons-css'  href='static/stylem/assets/wp-content/plugins/apdash-core/assets/vendors/themify-icon/themify-icons9f319f31.css?ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='bootstrap-slider-css'  href='static/stylem/assets/wp-content/plugins/apdash-core/assets/css/bootstrap-slider.min9f319f31.css?ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='elegant-icons-css'  href='static/stylem/assets/wp-content/plugins/apdash-core/assets/vendors/components-elegant-icons/css/elegant-icons.min9f319f31.css?ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='flaticon-css'  href='static/stylem/assets/wp-content/plugins/apdash-core/assets/vendors/components-elegant-icons/css/elegant-icons.min9f319f31.css?ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='elementor-global-css'  href='static/stylem/assets/wp-content/uploads/elementor/css/global3a263a26.css?ver=1619704119' type='text/css' media='all' />
      <link rel='stylesheet' id='elementor-post-8-css'  href='static/stylem/assets/wp-content/uploads/elementor/css/post-83a263a26.css?ver=1619704119' type='text/css' media='all' />
      <link rel='stylesheet' id='google-fonts-1-css'  href='static/stylem/https_/fonts.googleapis.com/css8ee2.html?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=auto&amp;ver=5.7.2' type='text/css' media='all' />
      <link rel='stylesheet' id='elementor-icons-shared-0-css'  href='static/stylem/assets/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min9e0b9e0b.css?ver=5.15.1' type='text/css' media='all' />
      <link rel='stylesheet' id='elementor-icons-fa-brands-css'  href='static/stylem/assets/wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min9e0b9e0b.css?ver=5.15.1' type='text/css' media='all' />
      <link rel='stylesheet' id='elementor-icons-fa-regular-css'  href='static/stylem/assets/wp-content/plugins/elementor/assets/lib/font-awesome/css/regular.min9e0b9e0b.css?ver=5.15.1' type='text/css' media='all' />
      <link rel='stylesheet' id='elementor-icons-fa-solid-css'  href='static/stylem/assets/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min9e0b9e0b.css?ver=5.15.1' type='text/css' media='all' />
      <script type='text/javascript' src='static/stylem/assets/wp-includes/js/jquery/jquery.min9d529d52.js?ver=3.5.1' id='jquery-core-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-includes/js/jquery/jquery-migrate.mind617d617.js?ver=3.3.2' id='jquery-migrate-js'></script>
      <link rel="https://api.w.org/" href="static/stylem/assets/wp-json/index.html" />
      <link rel="alternate" type="application/json" href="static/stylem/assets/wp-json/wp/v2/pages/8.html" />
      <link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db00db0.html?rsd" />
      <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="static/stylem/assets/wp-includes/wlwmanifest.xml" />
      <meta name="generator" content="WordPress 5.7.2" />
      <link rel="canonical" href="index-2.html" />
      <link rel='shortlink' href='index-2.html' />
      <link rel="alternate" type="application/json+oembed" href="static/stylem/assets/wp-json/oembed/1.0/embed5c315c31.json?url=https%3A%2F%2Fapdash-wp.themetags.com%2F" />
      <link rel="alternate" type="text/xml+oembed" href="static/stylem/assets/wp-json/oembed/1.0/embedcbe8cbe8.html?url=https%3A%2F%2Fapdash-wp.themetags.com%2F&amp;format=xml" />
      <script>
         /*<![CDATA[*/
         var tt_ajax_url = "static/stylem/assets/wp-admin/admin-ajax.html";
         /*]]>*/
      </script>
       
     
      <style type="text/css">.site-footer .footer-wrapper{padding-top:95px;padding-bottom:30px;}.page-header-bg{background-image:url(assets/wp-content/uploads/2020/10/page-header.html);background-position:center center;background-repeat:no-repeat;background-attachment:scroll;background-size:cover;}.page-header .overlay-bg{background-image:linear-gradient(to right,#4f1bc5,#7b17c5);background-color:#4f1bc5;}.single-post-header-bg{background-image:url(../apdash-wp.themetags.com/wp-content/uploads/2020/10/blog-banner.jpg);background-position:center center;background-repeat:no-repeat;background-attachment:fixed;background-size:cover;}.error_page{background-image:url(https://apdash-wp.themetags.com/wp-content/uploads/2020/10/cta-bg.jpg);background-position:center center;background-repeat:no-repeat;background-size:cover;}body{color:#696969;font-size:16px;line-height:26px;}h1{font-size:40px;}h2{font-size:32px;}h3{font-size:28px;}h4{font-size:24px;}h5{font-size:20px;}h6{font-size:16px;}</style>
      <style type="text/css">.site-footer .footer-wrapper{padding-top:195px;}</style>
   </head>
   <body class="home page-template page-template-elementor_header_footer page page-id-8 no-sidebar elementor-default elementor-template-full-width elementor-kit-7 elementor-page elementor-page-8">
      <div id="preloader">
         <div id="loader">
            <div class="loader-inner ball-pulse">
               <div></div>
               <div></div>
               <div></div>
            </div>
         </div>
         <!-- /#loader -->
      </div>
      <!-- /#preloader -->
      <div id="site-content" class="site">
         <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
         <header id="masthead" class="site-header header-1 header-width"  data-header-fixed="true"   data-mobile-menu-resolution="992">
            <div class="container">
               <div class="header-inner">
                  <nav id="site-navigation" class="main-nav">
                     <div class="site-logo">
                        <a href="#home" rel="home">
                        <img src="upload/<?=$web['image']?>"  width="300" 
     height="500" >
                        </a>
                     </div>
                     <div class="tt-hamburger" id="page-open-main-menu" tabindex="1">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                     </div>
                     <div class="main-nav-container canvas-menu-wrapper" id="mega-menu-wrap">
                        <div class="close-menu page-close-main-menu" id="page-close-main-menu">
                           <i class="ti-close"></i>
                        </div>
                        <div class="menu-wrapper">
                           <div class="menu-primary-menu-container">
                              <ul id="menu-primary-menu" class="site-main-menu">
                                 <li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item current-menu-ancestor current-menu-parent menu-item-has-children menu-item-17 menu-item current-menu-item current-menu-item">
                                    <a title="Home" href="#home">Home</a>
                                 </li>
                                 <li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-18 menu-item current-menu-item"><a title="About" href="#about">About</a></li>
                                 <li id="menu-item-19" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-19 menu-item current-menu-item"><a title="Feature" href="#feature">Services</a></li>
                                 <li id="menu-item-20" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-20 menu-item current-menu-item"><a title="Screenshots" href="#faqs">Testimonials</a></li>
                                 <li id="menu-item-21" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-21 menu-item current-menu-item"><a title="Pricing" href="#pricing">Pricing</a></li>
                                 
                                 <li id="menu-item-22" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-22 menu-item current-menu-item"><a title="Contact" href="login">Login</a></li>
                                 <li id="menu-item-22" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-22 menu-item current-menu-item"><a title="Contact" href="signup">Register</a></li>
                                 
                              </ul>
                           </div>
                        </div>
                        <!-- /.main-menu -->
                     </div>
                     <!-- #menu-wrapper -->
                  </nav>
                  <!-- #site-navigation -->
               </div>
               <!-- /.header-inner -->
            </div>
            <!-- /.container -->
         </header>
         <!-- #masthead -->

         <main id="main" class="site-main">
            <div data-elementor-type="wp-page" data-elementor-id="8" class="elementor elementor-8" data-elementor-settings="[]">
               <div class="elementor-inner">
                  <div class="elementor-section-wrap">
                     <section id="home" class="elementor-section elementor-top-section elementor-element elementor-element-c51c433 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="c51c433" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-no">
                           <div class="elementor-row">
                              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-cd8146f" data-id="cd8146f" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-97b0443 elementor-widget elementor-widget-tt-hero-static" data-id="97b0443" data-element_type="widget" data-widget_type="tt-hero-static.default">
                                          <div class="elementor-widget-container">
                                             <section class="banner banner_bg d-flex banner--one align-items-center">
                                                <div class="container h-100 pt-100">
                                                   <div class="row align-items-center h-100">
                                                      <div class="col-lg-6">
                                                         <div class="banner__content">
                                                            <h2 class="banner__title wow fadeInUp" data-wow-delay=".3s">
                                                            <span class="text_effect text_effect_left"><?php echo $web['name']?></span>                     
                                                            </h2>
                                                              <p class="mb-50" data-aos="fade-up" data-aos-delay="200">
                                    <?php echo $web['name']; ?> is a registered telecommunication company that provide voice or data transmission services, such as; Mobile Data, Cable Sub, Electric Bill, Airtime (VTU).
                                </p>
                                                           <!-------another section adex------>                   
                                                            <?php if(!isset( $_SESSION['name'])) { ?>
                                                               <div class="banner__btns">
                                                               <a href="login"  target="_blank"  rel="nofollow" class="tt-app-btn btn-fill btn-light wow fadeInUp" data-wow-delay=".7s">
                                                               <span class="btn-icon">
                                                               <i aria-hidden="true" class="fa fa-user"></i>                                </span>
                                                               <span class="btn-lebels">
                                                               <span class="sub">Merchant</span>
                                                               Login                               </span>
                                                               </a>
                                                               <a href="signup"  target="_blank"  rel="nofollow" class="tt-app-btn btn-light btn-outline wow fadeInUp" data-wow-delay=".7s">
                                                               <span class="btn-icon">
                                                               <i aria-hidden="true" class="fa fa-user-plus"></i>                                </span>
                                                               <span class="btn-lebels">
                                                               <span class="sub">New Here</span>
                                                               SignUp                             </span>
                                                               </a>
                                                               <?php } else { ?>
                                                                <a href="dashboard"  target="_blank"  rel="nofollow" class="tt-app-btn btn-light btn-outline wow fadeInUp" data-wow-delay=".7s">
                                                               <span class="btn-icon">
                                                               <i aria-hidden="true" class="fa fa-user-plus"></i>                                </span>
                                                               <span class="btn-lebels">
                                                               <span class="sub">move to</span>
                                                                  Dashboard                         </span>
                                                               </a><?php } ?>
                                                            </div>
                                                <div class="container h-100 pt-100">
         
                                                         </div>
                                                         
                                                      </div>
                                                      
                                                      <div class="col-lg-6">
                                                         <div class="banner__feature-image wow fadeInRight">
                                                            <img src="static/stylem/assets/wp-content/uploads/2020/10/iPhoneX.png" alt="" >
                                                         </div>
                                                         <!-- /.banner-feature-image -->
                                                      </div>
                                                      <!-- /.col-md-6 -->
                                                   </div>
                                                </div>
                                                <div class="banner__shape-top">
                                                   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 361.1 384.8" style="enable-background:new 0 0 361.1 384.8;" xml:space="preserve" class="injected-svg svg_img dark-color">
                                                      <path d="M53.1,266.7C19.3,178-41,79.1,41.6,50.1S287.7-59.6,293.8,77.5c6.1,137.1,137.8,238,15.6,288.9 S86.8,355.4,53.1,266.7z"></path>
                                                   </svg>
                                                </div>
                                                <div class="banner__shape-bottom">
                                                   <img src="static/stylem/assets/wp-content/plugins/apdash-core/modules/widgets/images/banner.png" alt="">
                                                </div>
                                             </section>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <section class="elementor-section elementor-top-section elementor-element elementor-element-0c9154b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="0c9154b" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                           <div class="elementor-row">
                              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7ee22da" data-id="7ee22da" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-8cd84df elementor-widget elementor-widget-apdash-heading" data-id="8cd84df" data-element_type="widget" data-widget_type="apdash-heading.default">
                                          <div class="elementor-widget-container">
                                             <div class="section-heading">
                                                <h2 class="section-title wow fadeInUp" data-wow-delay="0.3s">Why Choose Us</h2>
                                                <div class="description wow fadeInUp" data-wow-delay="0.5s">We serve customers base on love that continues to grow exponentially, offering transmission services that span various categories including Data subscription, cable sub, electric bill, Airtime(vtu), and much more. With a reliable customer support</div>
                                             </div>
                                          </div>
                                       </div>
                                       <section class="elementor-section elementor-inner-section elementor-element elementor-element-7c44008 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7c44008" data-element_type="section">
                                          <div class="elementor-container elementor-column-gap-default">
                                             <div class="elementor-row">
                                                <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-66a5215 elementor-invisible" data-id="66a5215" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInRight&quot;,&quot;animation_delay&quot;:500}">
                                                   <div class="elementor-column-wrap elementor-element-populated">
                                                      <div class="elementor-widget-wrap">
                                                         <div class="elementor-element elementor-element-b8a8deb elementor-widget elementor-widget-tt-icon-box" data-id="b8a8deb" data-element_type="widget" data-widget_type="tt-icon-box.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="tt-icon-box style-one">
                                                                  <div class="icon-container">
                                                                     <img src="static/stylem/assets/wp-content/uploads/2020/10/01.svg" alt="UI/UX Design">
                                                                  </div>
                                                                  <!-- /.icon-container -->
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                        Automated System
                                                                     </h4>
                                                                     <p class="description">
                                                                        Our service delivery and wallet funding is automated, your purchase are automated and get delivered to you at a blink of an eye.          
                                                                     </p>
                                                                  </div>
                                                               </div>
                                                               <!-- /.dt-icon-box -->		
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-13f20e0 elementor-invisible" data-id="13f20e0" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInRight&quot;,&quot;animation_delay&quot;:700}">
                                                   <div class="elementor-column-wrap elementor-element-populated">
                                                      <div class="elementor-widget-wrap">
                                                         <div class="elementor-element elementor-element-8d49c86 elementor-widget elementor-widget-tt-icon-box" data-id="8d49c86" data-element_type="widget" data-widget_type="tt-icon-box.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="tt-icon-box style-one">
                                                                  <div class="icon-container">
                                                                    <i class="fa fa-headphones" aria-hidden="true" style="font-size:70px;"></i>
                                                                     <!-- <img src="assets/wp-content/uploads/2020/10/03.svg" alt="Scalable"> -->
                                                                  </div>
                                                                  <!-- /.icon-container -->
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                       Costomer Support
                                                                     </h4>
                                                                     <p class="description">
                                                                        Our customers are premium to us, hence satisfying them is our top most priority. Our customer service is just a click away available 24/7.         
                                                                     </p>
                                                                  </div>
                                                               </div>
                                                               <!-- /.dt-icon-box -->		
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-53b6d69 elementor-invisible" data-id="53b6d69" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInRight&quot;,&quot;animation_delay&quot;:700}">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                       <div class="elementor-widget-wrap">
                                                          <div class="elementor-element elementor-element-d8ee063 elementor-widget elementor-widget-tt-icon-box" data-id="d8ee063" data-element_type="widget" data-widget_type="tt-icon-box.default">
                                                             <div class="elementor-widget-container">
                                                                <div class="tt-icon-box style-one">
                                                                   <div class="icon-container">
                                                                      <img src="static/stylem/assets/wp-content/uploads/2020/10/02.svg" alt="Responsive">
                                                                   </div>
                                                                   <!-- /.icon-container -->
                                                                   <div class="box-content">
                                                                      <h4 class="box-title">
                                                                         Reliable && Available
                                                                      </h4>
                                                                      <p class="description">
                                                                        We have a fully optimized platform for reliability and dependability. You get 100% value for any transaction you carry with us.        
                                                                      </p>
                                                                   </div>
                                                                </div>
                                                                <!-- /.dt-icon-box -->		
                                                             </div>
                                                          </div>
                                                       </div>
                                                    </div>
                                                 </div>
                                                <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-848e333 elementor-invisible" data-id="848e333" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInRight&quot;,&quot;animation_delay&quot;:1100}">
                                                   <div class="elementor-column-wrap elementor-element-populated">
                                                      <div class="elementor-widget-wrap">
                                                         <div class="elementor-element elementor-element-b667ff6 elementor-widget elementor-widget-tt-icon-box" data-id="b667ff6" data-element_type="widget" data-widget_type="tt-icon-box.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="tt-icon-box style-one">
                                                                  <div class="icon-container">
                                                                      <i class="fa fa-wallet" style="font-size:70px;"></i>
                                                                     <!-- <img src="assets/wp-content/uploads/2020/10/04.svg" alt="Customizable"> -->
                                                                  </div>
                                                                  <!-- /.icon-container -->
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                        E-wallet System
                                                                     </h4>
                                                                     <p class="description">
                                                                        Your e-wallet is the safest, easiest and fastest means of carrying out transactions with us. Your funds are secured with your e-wallet PIN and can be kept for you for as long as you want.      
                                                                     </p>
                                                                  </div>
                                                               </div>
                                                               <!-- /.dt-icon-box -->		
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </section>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <section class="elementor-section elementor-top-section elementor-element elementor-element-3bc1e72 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3bc1e72" data-element_type="section" id="about" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                           <div class="elementor-row">
                              <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-bacca4f" data-id="bacca4f" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-8e837f2 elementor-invisible elementor-widget elementor-widget-image" data-id="8e837f2" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;_animation_delay&quot;:300}" data-widget_type="image.default">
                                          <div class="elementor-widget-container">
                                             <div class="elementor-image">
                                                <img width="551" height="682" src="static/stylem/assets/wp-content/uploads/2020/10/apdash_img2.png" class="attachment-large size-large" alt="" loading="lazy" srcset="/static/stylem/assets/wp-content/uploads/2020/10/apdash_img2.png 551w, /static/stylem/assets/wp-content/uploads/2020/10/apdash_img2.png 242w" sizes="(max-width: 551px) 100vw, 551px" />														
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-a5ff064" data-id="a5ff064" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-eb7cddc elementor-widget elementor-widget-apdash-heading" data-id="eb7cddc" data-element_type="widget" data-widget_type="apdash-heading.default">
                                          <div class="elementor-widget-container">
                                             <div class="section-heading">
                                                <h2 class="section-title wow fadeInUp" data-wow-delay="0.3s">Our Core Values</h2>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="elementor-element elementor-element-f7abb3a elementor-invisible elementor-widget elementor-widget-tt-icon-box" data-id="f7abb3a" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="tt-icon-box.default">
                                          <div class="elementor-widget-container">
                                             <div class="tt-icon-box style-four icon-left">
                                                <div class="icon-container">
                                                   <i aria-hidden="true" class="fas fa-binoculars"></i>                            
                                                </div>
                                                <!-- /.icon-container -->
                                                <div class="box-content">
                                                   <h4 class="box-title">
                                                    Our Mission                                
                                                   </h4>
                                                   <p class="description">
                                                    To be an excellent service provider in the telecommunication industry. We seek avenues to add value to our customers and the entire Nigerian.           
                                                   </p>
                                                </div>
                                             </div>
                                             <!-- /.tt-icon-box -->		
                                          </div>
                                       </div>
                                       <div class="elementor-element elementor-element-197e51e elementor-invisible elementor-widget elementor-widget-tt-icon-box" data-id="197e51e" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:700}" data-widget_type="tt-icon-box.default">
                                          <div class="elementor-widget-container">
                                             <div class="tt-icon-box style-four icon-left">
                                                <div class="icon-container">
                                                   <i aria-hidden="true" class="fas fa-palette"></i>                            
                                                </div>
                                                <!-- /.icon-container -->
                                                <div class="box-content">
                                                   <h4 class="box-title">
                                                    Our Vision                                
                                                   </h4>
                                                   <p class="description">
                                                    To build a world class innovative organization that offers affordable and consistent excellent servicedelivery that meet vast Nigerian needs.            
                                                   </p>
                                                </div>
                                             </div>
                                             <!-- /.tt-icon-box -->		
                                          </div>
                                       </div>
                                       <div class="elementor-element elementor-element-8790ae1 elementor-invisible elementor-widget elementor-widget-tt-icon-box" data-id="8790ae1" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:900}" data-widget_type="tt-icon-box.default">
                                          <div class="elementor-widget-container">
                                             <div class="tt-icon-box style-four icon-left">
                                                <div class="icon-container">
                                                   <i aria-hidden="true" class="fas fa-gem"></i>                            
                                                </div>
                                                <!-- /.icon-container -->
                                                <div class="box-content">
                                                   <h4 class="box-title">
                                                      Easy Usage                                
                                                   </h4>
                                                   <p class="description">
                                                    At <?php echo $web['name'];?> Customer first. Therefore, we consistently seekavenues to make our partners and customers enjoy affordable and excellent delivery service at their comfort zone.            
                                                   </p>
                                                </div>
                                             </div>
                                             <!-- /.tt-icon-box -->		
                                          </div>
                                       </div>
                                       <div class="elementor-element elementor-element-c947f5f elementor-invisible elementor-widget elementor-widget-tt-button" data-id="c947f5f" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:1100}" data-widget_type="tt-button.default">
                                          <div class="elementor-widget-container">
                                             <div class="tt-btn-wrapper">
                                                <a href="login" class="tt-btn-link tt-btn btn-circle btn-md btn-outline">
                                                <span class="tt-btn-content-wrapper">
                                                <span class="tt-btn-text">Get Start Now</span>
                                                </span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <section class="elementor-section elementor-top-section elementor-element elementor-element-6087250 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6087250" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                           <div class="elementor-row">
                              <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-87cc807" data-id="87cc807" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-a312a51 elementor-widget elementor-widget-apdash-heading" data-id="a312a51" data-element_type="widget" data-widget_type="apdash-heading.default">
                                          <div class="elementor-widget-container">
                                             <div class="section-heading">
                                                <h2 class="section-title wow fadeInUp" data-wow-delay="0.3s">We Provide Awesome Services</h2>
                                                <div class="description wow fadeInUp" data-wow-delay="0.5s">We provide our services base values that continues to grow reppidly, offering dipensal of services that span various categories including Data subscription, cable sub, electric bill, Airtime top up and much more. Our range of services are designed to ensure optimum levels of convenience and customer satisfaction with the reseller options, other optimum services include our Affordable price guarantee, Automated, Reliability, dedicated customer service support and many other premium services. As we continue to expand the Platform, our scope of offerings will increase in variety, simplicity and conveniency, join us today and enjoy the increasing benefits.</div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="elementor-element elementor-element-de1653c elementor-invisible elementor-widget elementor-widget-tt-button" data-id="de1653c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:900}" data-widget_type="tt-button.default">
                                          <div class="elementor-widget-container">
                                             <div class="tt-btn-wrapper">
                                                <a href="login" class="tt-btn-link tt-btn btn-circle btn-md btn-outline">
                                                <span class="tt-btn-content-wrapper">
                                                <span class="tt-btn-text">Get Start Now</span>
                                                </span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-fb91323" data-id="fb91323" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-e656cb3 tt-svg-responsive elementor-invisible elementor-widget elementor-widget-image" data-id="e656cb3" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="image.default">
                                          <div class="elementor-widget-container">
                                             <div class="elementor-image">
                                                <img src="static/stylem/assets/wp-content/uploads/2020/10/apdash_img1.jpg" title="" alt="" style="border: 5px solid #6f42c1; border-radius: 20px 0 20px 0 ;" />														
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <section class="elementor-section elementor-top-section elementor-element elementor-element-df280b8 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="df280b8" data-element_type="section" id="feature" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                           <div class="elementor-row">
                              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-523389d" data-id="523389d" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-60f0b3d elementor-widget elementor-widget-apdash-heading" data-id="60f0b3d" data-element_type="widget" data-widget_type="apdash-heading.default">
                                          <div class="elementor-widget-container">
                                             <div class="section-heading">
                                                <h2 class=section-title wow fadeInUp" data-wow-delay="0.3s">Platform Services</h2>
                                                <div class="description wow fadeInUp" data-wow-delay="0.5s">Services we offer at <?php echo $web['name']; ?> are exceptional; <br> check them out.</div>
                                             </div>
                                          </div>
                                       </div>
                                       <section class="elementor-section elementor-inner-section elementor-element elementor-element-5edb84d elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5edb84d" data-element_type="section">
                                          <div class="elementor-container elementor-column-gap-default">
                                             <div class="elementor-row">
                                                <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-fdbb557" data-id="fdbb557" data-element_type="column">
                                                   <div class="elementor-column-wrap elementor-element-populated">
                                                      <div class="elementor-widget-wrap">
                                                         <div class="elementor-element elementor-element-3599024 elementor-invisible elementor-widget elementor-widget-tt-icon-box" data-id="3599024" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="tt-icon-box.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="tt-icon-box style-four icon-left">
                                                                  <div class="icon-container">
                                                                     <i class="ti-layout"></i>
                                                                  </div>
                                                                 
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                        BUY DATA                               
                                                                     </h4>
                                                                     <p class="description">
                                                                        Data subscription made quick, cheap and easy to buy at any time of the day.            
                                                                     </p>
                                                                  </div>
                                                               </div>
                                                               <!-- /.tt-icon-box -->		
                                                            </div>
                                                         </div>
                                                         <div class="elementor-element elementor-element-9cd9e26 elementor-invisible elementor-widget elementor-widget-tt-icon-box" data-id="9cd9e26" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:700}" data-widget_type="tt-icon-box.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="tt-icon-box style-four icon-left">
                                                                  <div class="icon-container">
                                                                     <i class="ti-mobile"></i>
                                                                  </div>
                                                                  <!-- /.icon-container -->
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                        AIRTIME TOPUP                                
                                                                     </h4>
                                                                     <p class="description">
                                                                        making online recharge has become very easy and safe. also any time of the day. </p>
                                                                  </div>
                                                               </div>
                                                               <!-- /.tt-icon-box -->		
                                                            </div>
                                                         </div>
                                                         <div class="elementor-element elementor-element-28ecf17 elementor-invisible elementor-widget elementor-widget-tt-icon-box" data-id="28ecf17" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:900}" data-widget_type="tt-icon-box.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="tt-icon-box style-four icon-left">
                                                                  <div class="icon-container">
                                                                     <i class="ti-desktop"></i>
                                                                  </div>
                                                                  <!-- /.icon-container -->
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                        CABLE SUBSCRIPTION                               
                                                                     </h4>
                                                                     <p class="description">
                                                                        Instant Activation of Cable subscription with favourable discount in prices.           
                                                                     </p>
                                                                  </div>
                                                               </div>
                                                               <!-- /.tt-icon-box -->		
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-66a755e" data-id="66a755e" data-element_type="column">
                                                   <div class="elementor-column-wrap elementor-element-populated">
                                                      <div class="elementor-widget-wrap">
                                                         <div class="elementor-element elementor-element-f86c67e elementor-invisible elementor-widget elementor-widget-tt-icon-box" data-id="f86c67e" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="tt-icon-box.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="tt-icon-box style-four icon-left">
                                                                  <div class="icon-container">
                                                                     <i class="ti-light-bulb"></i>
                                                                  </div>
                                                                  <!-- /.icon-container -->
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                        PAY UTILITY BILLS                           
                                                                     </h4>
                                                                     <p class="description">
                                                                        Start Enjoyin this very low rates utility bill payment for your electricity.         
                                                                     </p>
                                                                  </div>
                                                               </div>
                                                               <!-- /.tt-icon-box -->		
                                                            </div>
                                                         </div>
                                                         <div class="elementor-element elementor-element-77fad9c elementor-invisible elementor-widget elementor-widget-tt-icon-box" data-id="77fad9c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:700}" data-widget_type="tt-icon-box.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="tt-icon-box style-four icon-left">
                                                                  <div class="icon-container">
                                                                     <i class="ti-envelope"></i>
                                                                  </div>
                                                                  <!-- /.icon-container -->
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                        BULK SMS                             
                                                                     </h4>
                                                                     <p class="description">
                                                                        Making online reacharge cheap and easy to buy at all time of the day           
                                                                     </p>
                                                                  </div>
                                                               </div>
                                                               <!-- /.tt-icon-box -->		
                                                            </div>
                                                         </div>
                                                         <div class="elementor-element elementor-element-c9c99eb elementor-invisible elementor-widget elementor-widget-tt-icon-box" data-id="c9c99eb" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:900}" data-widget_type="tt-icon-box.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="tt-icon-box style-four icon-left">
                                                                  <div class="icon-container">
                                                                     <i class="ti-money"></i>
                                                                  </div>
                                                                  <!-- /.icon-container -->
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                        AIRTIME TO CASH                        
                                                                     </h4>
                                                                     <p class="description">
                                                                        Instant Activation of Cable subscription with favourable discount.          
                                                                     </p>
                                                                  </div>
                                                               </div>
                                                               <!-- /.tt-icon-box -->		
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-69a56f9" data-id="69a56f9" data-element_type="column">
                                                   <div class="elementor-column-wrap elementor-element-populated">
                                                      <div class="elementor-widget-wrap">
                                                         <div class="elementor-element elementor-element-b3f5fdb tt-image-responsive elementor-invisible elementor-widget elementor-widget-image" data-id="b3f5fdb" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="image.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="elementor-image">
                                                                  <img width="170" height="220" src="static/stylem/assets/wp-content/uploads/2020/10/app-mobile-image.png" class="attachment-large size-large" alt="" loading="lazy"  />														
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </section>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <section class="elementor-section elementor-top-section elementor-element elementor-element-bb3f3da elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bb3f3da" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                           <div class="elementor-row">
                              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c412957" data-id="c412957" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-c3f9c57 elementor-widget elementor-widget-apdash-heading" data-id="c3f9c57" data-element_type="widget" data-widget_type="apdash-heading.default">
                                          <div class="elementor-widget-container">
                                             <div class="section-heading">
                                                <h4 class="section-title wow fadeInUp" data-wow-delay="0.3s">Get Our Mobile App
                                                </h4>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                    <center> <section class="elementor-section elementor-top-section elementor-element elementor-element-18cefae elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="18cefae" data-element_type="section" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:500}">
                        <div class="elementor-container elementor-column-gap-default">
                           <div class="elementor-row">
                              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e925993" data-id="e925993" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-c51d321 elementor-widget elementor-widget-tt-icon-box" data-id="c51d321" data-element_type="widget" data-widget_type="tt-icon-box.default">
                                          <div class="elementor-widget-container">
                                             <div class="tt-icon-box style-three">
                                                <div class="icon-container">
                                                   <img src="static/stylem/assets/wp-content/uploads/2020/10/playstore.png" alt="Google Play">
                                                </div>
                                                <!-- /.icon-container -->
                                                
                                                <div class="box-content">
                                                   <h4 class="box-title">
                                                      Google Play                            
                                                   </h4>
                                                   <p class="description">
                                                      <?php echo $web ['mobile'];?>            
                                                   </p>
                                                   <a href="<?php echo $web['bmobile'];?>" target="_blank" rel="nofollow" class="tt-btn btn-outline btn-small btn-circle"><?php echo $web['nmobile'];?></a>
                                                </div>
                                             </div>
                                            
                                             <!-- /.dt-icon-box -->		
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                              
                           </div> 
                        </div>
                     </section></center>
                     <section class="elementor-section elementor-top-section elementor-element elementor-element-8d08143 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8d08143" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                           <div class="elementor-row">
                              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-542f0a2" data-id="542f0a2" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-10aaf19 elementor-widget elementor-widget-apdash-heading" data-id="10aaf19" data-element_type="widget" data-widget_type="apdash-heading.default">
                                          <div class="elementor-widget-container">
                                             <div class="section-heading">
                                                <h2 class="section-title wow fadeInUp" data-wow-delay="0.3s">Our Work Process</h2>
                                                <div class="description wow fadeInUp" data-wow-delay="0.5s">Simple steps on how to use our platform.</div>
                                             </div>
                                          </div>
                                       </div>
                                       <section class="elementor-section elementor-inner-section elementor-element elementor-element-443dec0 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="443dec0" data-element_type="section">
                                          <div class="elementor-container elementor-column-gap-default">
                                             <div class="elementor-row">
                                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-15c68e8" data-id="15c68e8" data-element_type="column">
                                                   <div class="elementor-column-wrap elementor-element-populated">
                                                      <div class="elementor-widget-wrap">
                                                         <div class="elementor-element elementor-element-e041a89 elementor-invisible elementor-widget elementor-widget-tt-process-box" data-id="e041a89" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="tt-process-box.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="tt-process-box box-align-left">
                                                                  <div class="icon-container">
                                                                     <i aria-hidden="true" class="fas fa-project-diagram"></i>            
                                                                  </div>
                                                                  <!-- /.icon-container -->
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                       Register
                                                                     </h4>
                                                                     <p class="description">
                                                                       Click <a href="signup">here</a> to register, in one click.          
                                                                     </p>
                                                                  </div>
                                                                  <svg x="0px" y="0px" width="312px" height="130px" class="left-border">
                                                                     <path class="dashed1" fill="none" stroke="rgb(95, 93, 93)" stroke-width="1" stroke-dasharray="1300" stroke-dashoffset="0" d="M3.121,2.028 C3.121,2.028 1.003,124.928 99.352,81.226 C99.352,81.226 272.319,21.200 310.000,127.338"></path>
                                                                     <path class="dashed2" fill="none" stroke="#ffffff" stroke-width="2" stroke-dasharray="6" stroke-dashoffset="1300" d="M3.121,2.028 C3.121,2.028 1.003,124.928 99.352,81.226 C99.352,81.226 272.319,21.200 310.000,127.338 "></path>
                                                                  </svg>
                                                               </div>
                                                               <!-- /.dt-icon-box -->
                                                               <div class="tt-process-box box-align-right">
                                                                  <div class="icon-container">
                                                                     <i aria-hidden="true" class="fas fa-credit-card"></i>            
                                                                  </div>
                                                                  <!-- /.icon-container -->
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                       Fund Wallet
                                                                     </h4>
                                                                     <p class="description">
                                                                       Credit your wallet with any of our convenient payment platform of your choice.             
                                                                     </p>
                                                                  </div>
                                                                  <svg x="0px" y="0px" width="312px" height="130px" class="right-border">
                                                                     <path class="dashed1" fill="none" stroke="rgb(95, 93, 93)" stroke-width="1" stroke-dasharray="1300" stroke-dashoffset="0" d="M311.000,0.997 C311.000,0.997 313.123,123.592 214.535,79.996 C214.535,79.996 41.149,20.122 3.377,125.996"></path>
                                                                     <path class="dashed2" fill="none" stroke="#ffffff" stroke-width="2" stroke-dasharray="6" stroke-dashoffset="1300" d="M311.000,0.997 C311.000,0.997 313.123,123.592 214.535,79.996 C214.535,79.996 41.149,20.122 3.377,125.996"></path>
                                                                  </svg>
                                                               </div>
                                                               <!-- /.dt-icon-box -->
                                                               <div class="tt-process-box box-align-left">
                                                                  <div class="icon-container">
                                                                     <i aria-hidden="true" class="fas fa-puzzle-piece"></i>            
                                                                  </div>
                                                                  <!-- /.icon-container -->
                                                                  <div class="box-content">
                                                                     <h4 class="box-title">
                                                                       Buy Services
                                                                     </h4>
                                                                     <p class="description">
                                                                        Buy any of our services with funds in your e-wallet any time any day. Your funds are safe with us.             
                                                                     </p>
                                                                  </div>
                                                                  <svg x="0px" y="0px" width="312px" height="130px" class="left-border">
                                                                     <path class="dashed1" fill="none" stroke="rgb(95, 93, 93)" stroke-width="1" stroke-dasharray="1300" stroke-dashoffset="0" d="M3.121,2.028 C3.121,2.028 1.003,124.928 99.352,81.226 C99.352,81.226 272.319,21.200 310.000,127.338"></path>
                                                                     <path class="dashed2" fill="none" stroke="#ffffff" stroke-width="2" stroke-dasharray="6" stroke-dashoffset="1300" d="M3.121,2.028 C3.121,2.028 1.003,124.928 99.352,81.226 C99.352,81.226 272.319,21.200 310.000,127.338 "></path>
                                                                  </svg>
                                                               </div>
                                                               <!-- /.dt-icon-box -->
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-b92e09d" data-id="b92e09d" data-element_type="column">
                                                   <div class="elementor-column-wrap elementor-element-populated">
                                                      <div class="elementor-widget-wrap">
                                                         <div class="elementor-element elementor-element-12d77cb tt-image-responsive elementor-invisible elementor-widget elementor-widget-image" data-id="12d77cb" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="image.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="elementor-image">
                                                                  <img width="850" height="1000" src="static/stylem/assets/wp-content/uploads/2020/10/app-mobile-image-3.png" class="attachment-full size-full" alt="" loading="lazy"/>														
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </section>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <section class="elementor-section elementor-top-section elementor-element elementor-element-c8f54c3 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c8f54c3" data-element_type="section" id="pricing">
                        <div class="elementor-container elementor-column-gap-default">
                           <div class="elementor-row">
                              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4c1d221" data-id="4c1d221" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-b98a9a7 elementor-widget elementor-widget-apdash-heading" data-id="b98a9a7" data-element_type="widget" data-widget_type="apdash-heading.default">
                                          <div class="elementor-widget-container">
                                             <div class="section-heading">
                                                <h2 class="section-title wow fadeInUp" data-wow-delay="0.3s">Our Flexible Price</h2>
                                                <div class="description wow fadeInUp" data-wow-delay="0.5s">No additional costs. What you see is what you pay for.</div>
                                             </div>
                                          </div>
                                       </div>
                                        <div class="elementor-element elementor-element-302c834 elementor-widget elementor-widget-tt-pricing-table-simple" data-id="302c834" data-element_type="widget" data-widget_type="tt-pricing-table-simple.default">
                                          <div class="elementor-widget-container">
                                             <div class="pricing">
                                                <div class="container">
                                                   <div class="tab-content priceing-tab">
                                                     
                                                      <!-- /.swicher-wrap -->
                                                      <div class="row advanced-pricing-table text-center justify-content-center">
                                                         <div class="col-lg-3 col-md-6 wow pixFadeUp" data-wow-dealy="0.4s">
                                                            <div class="pricing-table " id="pric-505-0">
                                                               <div class="table-feature-image">
                                                                  <img src="static/stylem/assets/mtn.jpg" alt=""  style="border-radius:50%;">
                                                               </div>
                                                               <?php 
                            $type="MTN";
                $query= "SELECT * FROM price  WHERE network='$type' ORDER BY price ASC"; 
                $result=mysqli_query($con,$query);
                while($mtn=mysqli_fetch_assoc($result)){
                    ?>
                                                               <table class="table">
                                                                <tbody>
                                                                  
                                                                  <tr style="">
                                                                    <td><?= ucfirst($mtn['name']);  ?></td>
                                                                    <td>&#8358;<?= ucfirst($mtn['price']);  ?></td>
                                                                    <td class="white-space-nowrap"><?= ucfirst($mtn['day']);  ?></td>
                                                                  </tr>
                                                                   <?php
                                                            }?>
                                          
                                                                </tbody>
                                                              </table>
                                                            </div>
                                                         </div>
                                                         <div class="col-lg-3 col-md-6 wow pixFadeUp" data-wow-dealy="0.4s">
                                                            <div class="pricing-table " id="pric-505-1">
                                                               <div class="table-feature-image">
                                                                  <img src="static/stylem/assets/glo.jpg" alt=""  style="border-radius:50%;">
                                                               </div>

                                                               <?php 
                            $typ="GLO";
                $query= "SELECT * FROM price  WHERE network='$typ' ORDER BY price ASC"; 
                $result=mysqli_query($con,$query);
                while($glo=mysqli_fetch_assoc($result)){
                    
                
                
                ?><table class="table">
                                                                  <tbody>
                                                                  
                                                              <tr style="">
                                                               
                                                              
                               <td><?= ucfirst($glo['name']);  ?></td>
                               <td>&#8358;<?= ucfirst($glo['price']);  ?></td>
                  <td class="white-space-nowrap"><?= ucfirst($glo['day']);  ?></td>
                                                              </tr>
                                                              <?php 
                                                          }; ?>
                                                              </tbody>
                                                              </table>
                                                            </div>
                                                            </div>
                                                  <div class="col-lg-3 col-md-6 wow pixFadeUp" data-wow-dealy="0.4s">
                                                            <div class="pricing-table " id="pric-505-2">
                                                               <div class="table-feature-image">
               <img src="static/stylem/assets/airtel.jpg" alt=""  style="border-radius:50%;">
                                                               </div>
                                                               <table class="table">
                                                                <tbody>
                                                                 <?php 
                            $types="AIRTEL";
                $query= "SELECT * FROM price  WHERE network='$types' ORDER BY price ASC"; 
                $result=mysqli_query($con,$query);
                while($airtel=mysqli_fetch_assoc($result)){
                    
                
                
                ?>  
                                                              <tr style="">
                                                                <td><?= ucfirst($airtel['name']);  ?></td>
                                                                <td>&#8358;<?= ucfirst($airtel['price']);  ?></td>
                                                                <td class="white-space-nowrap"><?= ucfirst($airtel['day']);  ?></td>
                                                              </tr>
                                                              <?php 
                                                            }; ?>
                                                              
                                                                </tbody>
                                                              </table>
                                                            </div>
                                                         </div>
                                                         <div class="col-lg-3 col-md-6 wow pixFadeUp" data-wow-dealy="0.4s">
                                                            <div class="pricing-table " id="pric-505-2">
                                                               <div class="table-feature-image">
                                                                  <img src="static/stylem/assets/9mobile.jpg" alt=""  style="border-radius:50%;  border: 1px solid rgb(9, 48, 19);">
                                                               </div>
                                                               <table class="table">
                                                                <tbody>
                                                                <?php 
                            $data="9MOBILE";
                $query= "SELECT * FROM price  WHERE network='$data' ORDER BY price ASC"; 
                $result=mysqli_query($con,$query);
                while($mobile=mysqli_fetch_assoc($result)){
                    
                
                
                ?>  
                                                              <tr style="">
                                                                <td><?= ucfirst($mobile['name']);  ?></td>
                                                                <td>&#8358;<?= ucfirst($mobile['price']);  ?></td>
                                                                <td class="white-space-nowrap"><?= ucfirst($mobile['day']);  ?></td>
                                                              </tr>
                                                              
                                                              <?php }; ?>
                                                                </tbody>
                                                              </table>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <!-- /.container -->
                                             </div>
                                             <!-- /.pricing -->   
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <section id="faqs" class="elementor-section elementor-top-section elementor-element elementor-element-e46488c elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="e46488c" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                           <div class="elementor-row">
                              <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-5704f49" data-id="5704f49" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-58ae2a2 elementor-widget elementor-widget-apdash-heading" data-id="58ae2a2" data-element_type="widget" data-widget_type="apdash-heading.default">
                                          <div class="elementor-widget-container">
                                             <div class="section-heading">
                                                <h2 class="section-title wow fadeInUp" data-wow-delay="0.3s">Testimonials</h2>
                                                <div class="description wow fadeInUp" data-wow-delay="0.5s">Hear from our esteemed and beloved customers.</div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-f44b068 elementor-invisible" data-id="f44b068" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;}">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-80d5624 elementor-widget elementor-widget-tt-testimonial" data-id="80d5624" data-element_type="widget" data-widget_type="tt-testimonial.default">
                                          <div class="elementor-widget-container">
                                             <div class="testimonial-wrapper">
                                                <div class="swiper-container tt-testimonial testimonial-style-1" data-testi="{&quot;loop&quot;:true,&quot;speed&quot;:700,&quot;autoplay&quot;:{&quot;delay&quot;:3000},&quot;pagination&quot;:{&quot;el&quot;:&quot;.swiper-pagination&quot;,&quot;clickable&quot;:true},&quot;spaceBetween&quot;:30}">
                                                   <div class="swiper-wrapper">
                                                      <div class="swiper-slide">
                                                         <div class="testimonial">
                                                            <div class="quote">
                                                               <i class="fas fa-quote-right"></i>
                                                            </div>
                                                            <div class="info-wrap">
                                                               <div class="avatar">
                                                                  <img loading="lazy" src="static/stylem/assets/wp-content/uploads/2020/10/3.jpg"
                                                                     alt="Mominul Islam" height="100"
                                                                     width="100">
                                                               </div>
                                                               <div class="bio-wrapper">
                                                                  <h4 class="name">ADEX DEVELOPER</h4>
                                                                  <span class="designation">Web Developer</span>
                                                               </div>
                                                            </div>
                                                            <div class="testimonial-content-inner">
                                                               <p>
                                                                  Best platform for reselling of vtu service i have ever seen. <br> thumbs up for them for their great services you can also contact 07013397088 fron your VTU website.                         
                                                               </p>
                                                            </div>
                                                            <!-- /.testimonial-cotent-inner -->
                                                         </div>
                                                      </div>
                                                      <!-- /.swiper-slide -->
                                                      
                                                       <?php 
                            
                $query= "SELECT * FROM rate  WHERE status=1 "; 
                $result=mysqli_query($con,$query);
                while($mtn=mysqli_fetch_assoc($result)){
                    
                
                
                ?>
                                                      <div class="swiper-slide">
                                                         <div class="testimonial">
                                                            <div class="quote">
                                                               <i class="fas fa-quote-right"></i>
                                                            </div>
                                                            <div class="info-wrap">
                                                               <div class="avatar">
                                                                  <img loading="lazy" src="theme/static/styling/images/avatar.png"
                                                                     alt="John Charles" height="100"
                                                                     width="100">
                                                               </div>
                                                               
                                                               
                                                               
                 <div class="bio-wrapper">
                                                                  <h4 class="name"><? echo $mtn['username'];?></h4>
                                                                  <span class="designation">from: <?php echo $web['name']; ?> </span>
                                                               </div>
                                                            </div>
                                                            <div class="testimonial-content-inner">
                                                               <p>
                                                               <? echo $mtn ['message']; ?>                                                         </p>
                                                               
                                                            </div>
                                                             
                                                            <!-- /.testimonial-cotent-inner -->
                                                         </div>
                                                      </div>
                                                      <?php } ?>
                                                      
                                                     
                                                      <!-- /.swiper-slide -->
                                                      
                                                <div class="swiper-pagination"></div>
                                             </div>
                                             <!-- /.testimonial-wrapper -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <section class="elementor-section elementor-top-section elementor-element elementor-element-cb81f87 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="cb81f87" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                           <div class="elementor-row">
                              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-55b8511" data-id="55b8511" data-element_type="column">
                                 <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-5f478b8 elementor-widget elementor-widget-tt-newsletter" data-id="5f478b8" data-element_type="widget" data-widget_type="tt-newsletter.default">
                                          <div class="elementor-widget-container">
                                             <div class="newsletter" id="newsletter">
                                                <div class="container">
                                                   <div class="row">
                                                      <div class="col-lg-7">
                                                         <div class="section-heading">
                                                            <h2 class="section-title">
                                                               Use Our API                               
                                                            </h2>
                                                            <h3 class="subtitle">Integrate our API on your website and still enjoy our premium services.</h3>
                                                         </div>
                                                         <!-- /.newsletter-content -->
                                                      </div>
                                                      <div class="col-lg-5">
                                                         <form action="#" method="post" class="newsletter-form wow pixFadeUp" data-apdash-form="newsletter-subscribe">
                                                            <!-- <input type="button" name="action" value="apdash_mailchimp_subscribe"> -->
                                                            <a href="documentation/index.html">
                                                            <div class="newsletter-inner form-row justify-content-center">
                                                              
                                                                <input type="button" name="email" class="form-control" id="newsletter-form-email" style="color: purple;"  value="Integrate now">
                                                                <button type="button" href="documentation/index.html" name="submit" id="newsletter-submit" class="newsletter-submit">
                                                                <i class="fas fa-paper-plane"></i>
                                                                <i class="fa fa-circle-o-notch fa-spin"></i>
                                                                </button>
                                                               
                                                            </div>
                                                        </a>
                                                            
                                                            <!-- /.form-result-->
                                                         </form>
                                                         <!-- /.newsletter-form -->
                                                      </div>
                                                   </div>
                                                   <!-- /.row -->
                                                </div>
                                                <!-- /.container -->
                                             </div>
                                             <!-- /.newsletter -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                  </div>
               </div>
            </div>
         </main>
         <!-- /#site-main -->
      </div>
      <!-- /#site-content -->
      <footer id="site_footer" class="site-footer">
         <div class="footer-wrapper">
            <div class="container">
               <aside class="widget-area row">
                  <div class="col-sm-6 col-lg-4">
                     <div id="apdash_widget_contact-2" class="widget apdash_widget about-widget_wrapper">
                                            <img src="upload/<?=$web['image']?>"  width="300" 
     height="500"  class="footer-logo" alt="">
                        <p class="about_text">Your reliable plug for virtual top up, data subscription, online payment and subscription system in Nigeria.</p>
                        <ul class="footer-social-link">
                           <li>
                              <a href="<?php echo $web['facebook'];?>">
                              <i class="ti-facebook"></i>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo $web['twitter'];?>">
                              <i class="ti-twitter-alt"></i>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo $web['intergram'];?>">
                              <i class="ti-instagram"></i>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo $web['youtube'];?>">
                              <i class="ti-youtube"></i>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                     <div id="nav_menu-2" class="widget apdash_widget widget_nav_menu">
                        <h3 class="widget-title">Services</h3>
                        <div class="menu-company-container">
                           <ul id="menu-company" class="menu">
                              <li id="menu-item-80" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-80"><a href="login">Data subscription</a></li>
                              <li id="menu-item-81" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-81"><a href="login">Airtime purchase</a></li>
                              <li id="menu-item-82" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-82"><a href="login">Cable subscription</a></li>
                              <li id="menu-item-83" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-83"><a href="login">Utility bill payment</a></li>
                              <li id="menu-item-84" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-84"><a href="login">Bulk sms</a></li>
                              <li id="menu-item-84" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-84"><a href="login">Airtime to cash</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                     <div id="nav_menu-3" class="widget apdash_widget widget_nav_menu">
                        <h3 class="widget-title">Contact</h3>
                        <div class="menu-resources-container">
                           <ul id="menu-resources" class="menu">
                              <li id="menu-item-85" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-85"><a href="#">Call: <strong><?php echo $web ['phone'];?></strong></a></li>
                              <li id="menu-item-86" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-86"><a href="#">Email: <strong><?php echo $web['email']?></strong></a></li>
                              <li id="menu-item-87" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-87"><a href="#">Adress: <strong><?php echo $web['address'];?> </strong></a></li>
                             
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-lg-2">
                     <div id="nav_menu-4" class="widget apdash_widget widget_nav_menu">
                        <h3 class="widget-title">Quick Links</h3>
                        <div class="menu-support-container">
                           <ul id="menu-support" class="menu">
                              <li id="menu-item-75" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-75"><a href="#home">Home</a></li>
                              <li id="menu-item-76" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a href="#about">About</a></li>
                              <li id="menu-item-77" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-77"><a href="#feature">Services</a></li>
                              <li id="menu-item-78" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-78"><a href="#faqs">Testimonials</a></li>
                              <li id="menu-item-79" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-79"><a href="#pricing">Pricing</a></li>
                              
                              <li id="menu-item-79" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-79"><a href="login">Login</a></li>
                              <li id="menu-item-79" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-79"><a href="signup">Register</a></li>
                              
                           </ul>
                        </div>
                     </div>
                  </div>
               </aside>
               <!-- .widget-area -->
            </div>
            <!-- .container -->
         </div>
         <!-- /.footer-wrapper -->
         <div class="site-info">
            <div class="container">
               <div class="site-info-wrapper">
                  <div class="copyright">
                     <p>
                        &copy; <?php echo $web['name'];?> - All Rights Reserved. <br> Developed by <a href="https://wa.me/2347013397088/">ADEX DEVELOPER</a>                
                     </p>
                  </div>
               </div>
               <!-- /.site-info-wrapper -->
            </div>
            <!-- /.container -->
         </div>
      </footer>
      <!-- #site-footer -->
      <script type='text/javascript' src='static/stylem/assets/wp-includes/js/dist/vendor/wp-polyfill.min89b189b1.js?ver=7.4.4' id='wp-polyfill-js'></script>
      <script type='text/javascript' id='wp-polyfill-js-after'>
         ( 'fetch' in window ) || document.write( '<script src="static/stylem/assets/wp-includes/js/dist/vendor/wp-polyfill-fetch.min6e0e6e0e.js?ver=3.0.0"></scr' + 'ipt>' );( document.contains ) || document.write( '<script src="assets/wp-includes/js/dist/vendor/wp-polyfill-node-contains.min2e002e00.html?ver=3.42.0"></scr' + 'ipt>' );( window.DOMRect ) || document.write( '<script src="assets/wp-includes/js/dist/vendor/wp-polyfill-dom-rect.min2e002e00.html?ver=3.42.0"></scr' + 'ipt>' );( window.URL && window.URL.prototype && window.URLSearchParams ) || document.write( '<script src="assets/wp-includes/js/dist/vendor/wp-polyfill-url.min5aed5aed.html?ver=3.6.4"></scr' + 'ipt>' );( window.FormData && window.FormData.prototype.keys ) || document.write( '<script src="assets/wp-includes/js/dist/vendor/wp-polyfill-formdata.mine9bde9bd.html?ver=3.0.12"></scr' + 'ipt>' );( Element.prototype.matches && Element.prototype.closest ) || document.write( '<script src="assets/wp-includes/js/dist/vendor/wp-polyfill-element-closest.min4c564c56.html?ver=2.0.2"></scr' + 'ipt>' );( 'objectFit' in document.documentElement.style ) || document.write( '<script src="assets/wp-includes/js/dist/vendor/wp-polyfill-object-fit.min531b531b.html?ver=2.3.4"></scr' + 'ipt>' );
      </script>
      <script type='text/javascript' id='contact-form-7-js-extra'>
         /* <![CDATA[ */
         var wpcf7 = {"api":{"root":"https:\/\/apdash-wp.themetags.com\/wp-json\/","namespace":"contact-form-7\/v1"}};
         /* ]]> */
      </script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/contact-form-7/includes/js/indexc225c225.js?ver=5.4.1' id='contact-form-7-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/themes/apdash/assets/js/bootstrap.min5b315b31.js?ver=4.3.1' id='bootstrap-js-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/themes/apdash/assets/js/isotope.pkgd.min48304830.js?ver=3.1.12' id='isotope-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/themes/apdash/assets/js/wow.min48304830.js?ver=3.1.12' id='wow-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/themes/apdash/assets/js/jquery.magnific-popup.min48304830.js?ver=3.1.12' id='magnefic-popup-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/themes/apdash/assets/js/header48304830.js?ver=3.1.12' id='header-js-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/apdash-core/assets/js/jquery.countdown324d324d.js?ver=3.1.0' id='countdown-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/themes/apdash/assets/js/app6e0e6e0e.js?ver=3.0.0' id='apdash-theme-js'></script>
      <script type='text/javascript' src='www.google.com/recaptcha/api60aa60aa.html?render=6LfgmUYaAAAAAHLNAOrIOzdcDNNjF-q7ILowgV_w&amp;ver=3.0' id='google-recaptcha-js'></script>
      <script type='text/javascript' id='wpcf7-recaptcha-js-extra'>
         /* <![CDATA[ */
         var wpcf7_recaptcha = {"sitekey":"6LfgmUYaAAAAAHLNAOrIOzdcDNNjF-q7ILowgV_w","actions":{"homepage":"homepage","contactform":"contactform"}};
         /* ]]> */
      </script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/contact-form-7/modules/recaptcha/indexc225c225.js?ver=5.4.1' id='wpcf7-recaptcha-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-includes/js/wp-embed.min9f319f31.js?ver=5.7.2' id='wp-embed-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/apdash-core/assets/js/countUp.min324d324d.js?ver=3.1.0' id='countUp-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/apdash-core/assets/js/jquery.appear324d324d.js?ver=3.1.0' id='appear-js-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/elementor/assets/js/webpack.runtime.minee9aee9a.js?ver=3.2.2' id='elementor-webpack-runtime-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/elementor/assets/js/frontend-modules.minee9aee9a.js?ver=3.2.2' id='elementor-frontend-modules-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da05da.js?ver=4.0.2' id='elementor-waypoints-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-includes/js/jquery/ui/core.min35d035d0.js?ver=1.12.1' id='jquery-ui-core-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/elementor/assets/lib/swiper/swiper.min48f548f5.js?ver=5.3.6' id='swiper-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/elementor/assets/lib/share-link/share-link.minee9aee9a.js?ver=3.2.2' id='share-link-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/elementor/assets/lib/dialog/dialog.mina288a288.js?ver=4.8.1' id='elementor-dialog-js'></script>
      <script type='text/javascript' id='elementor-frontend-js-before'>
         var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile","value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Extra","value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet","value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Extra","value":1365,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1620,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"direction":"min","is_enabled":false}}},"version":"3.2.2","is_static":false,"experimentalFeatures":[],"urls":{"assets":"https:\/\/apdash-wp.themetags.com\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":8,"title":"Apdash%20%E2%80%93%20App%20Landing%20Page%20Template","excerpt":"","featuredImage":false}};
      </script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/elementor/assets/js/frontend.minee9aee9a.js?ver=3.2.2' id='elementor-frontend-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/apdash-core/assets/js/elementor324d324d.js?ver=3.1.0' id='apdash-elementor-js'></script>
      <script type='text/javascript' src='static/stylem/assets/wp-content/plugins/elementor/assets/js/preloaded-modules.minee9aee9a.js?ver=3.2.2' id='preloaded-modules-js'></script>
   </body>

<script src="https://kit.fontawesome.com/61c94b4760.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
</html>

