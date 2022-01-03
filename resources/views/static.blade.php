<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('constants.site_title','Tranxit') }}</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}"/>

    <link href="https://fonts.googleapis.com/css?family=Exo:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7cRoboto+Slab:400,700" rel="stylesheet">
    <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
     <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="asset/assets/css/plugins.min.css">
    <link rel="stylesheet" href="asset/assets/css/icons.min.css">
    <link rel="stylesheet" href="asset/assets/css/style.css">
    <link rel="stylesheet" href="asset/assets/css/color-schemer.css">

    <!-- RS5.4 Main Stylesheet -->
    <link rel="stylesheet" type="text/css" href="asset/assets/revolution/css/settings.css">
    <!-- RS5.4 Layers and Navigation Styles -->
    <link rel="stylesheet" type="text/css" href="asset/assets/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="asset/assets/revolution/css/navigation.css">
    <style type="text/css">
         .no-margin {
            margin: 0;
        }


/* Slider font */
@font-face {font-family: "Bookman Old Style"; src: url("asset/assets/fonts/slider-font/4267d8aa8711bb8c72cbefb26066c9e0.eot"); src: url("asset/assets/fonts/slider-font/4267d8aa8711bb8c72cbefb26066c9e0.eot?#iefix") format("embedded-opentype"), url("asset/assets/fonts/slider-font/4267d8aa8711bb8c72cbefb26066c9e0.woff2") format("woff2"), url("asset/assets/fonts/slider-font/4267d8aa8711bb8c72cbefb26066c9e0.woff") format("woff"), url("asset/assets/fonts/slider-font/4267d8aa8711bb8c72cbefb26066c9e0.ttf") format("truetype"), url("asset/assets/fonts/slider-font/4267d8aa8711bb8c72cbefb26066c9e0.svg#Bookman Old Style") format("svg"); }

    </style>
    <style>

    .header-top-area {
        background: #d30f1d;
     }

    .header-top p {
        color: #fff;
        margin-bottom: 0px;
        }

    span.cross-icon.pull-right i {  color: #fff; }

    span.cross-icon.pull-right i:hover {  cursor: pointer; }

    .fixedmenu { top: 0px; }

    </style>
</head>
<body>

      <!-- ====== Header Top Area ====== --> 
    <header class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-7 hidden-xs">
                    <div class="header-content-left">
                        <ul class="header-top-menu">
                            <li>
                                <a href="#" class="top-left-menu">
                                    <i class="fa fa-phone"></i>
                                    <span>Appel - (+221) {{ config('constants.contact_number', '')  }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:taxi@taxi.com" class="top-left-menu">
                                    <i class="fa fa-envelope"></i>
                                    <span>{{ config('constants.contact_email', '')  }}</span>
                                </a>                                 
                            </li>
                        </ul><!-- /.header-top-menu -->
                    </div><!-- /.header-content-left -->
                </div><!-- /.col-md-9 -->

                <div class="col-md-6 col-sm-5">
                    <div class="header-content-right">
                       <!--  <ul class="header-top-menu">
                            <li>
                                <a href="#" class="language">
                                    <i class="fa fa-language"></i>
                                    <span>Language</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="#">English</a></li>
                                    
                                </ul>
                            </li>
                        </ul> -->
                        <ul class="header-top-menu">
                            <!-- <li>
                                <a href="#" class="search-open">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li> -->
                            <li>
                                <a href="#" class="trigger-overlay">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.left-content -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </header><!-- /.head-area -->

    <!-- ======= Header Modal Area =======-->
    <div class="header-modal-area">
        <!-- Modal Search -->
        <div class="overlay overlay-scale">
            <button type="button" class="overlay-close">&#x2716;</button>
            <div class="overlay__content">
                <form id="search-form" class="search-form outer" action="#" method="post">
                    <div class="input-group">
                        <input type="text" class=" input--full" placeholder="search text here ..."> 
                    </div>
                    <button class="btn text-uppercase search-button">Search</button>
                </form>
            </div>
        </div>

        <div class="overlay-sidebar">
            <div class="author-area">
                <a href="#" class="closebtn">&times;</a>
                <div class="author-area-content">                
                    <div class="login-author">   
                        <div class="author-info">                    
                            <div class="author-image side-divme">
                                <img src="{{ config('constants.site_logo', asset('logo-black.png')) }}" class="side-logo" alt="logo"/>
                            </div><!-- /.author-image -->

                        </div><!-- /.author-info -->             
                        <div class="author-menu">
                            <ul class="yellow-color">
                                <li class="ham-1"><a href="{{ url('about_us') }}"><i class="fa fa-user-circle-o"></i>A propos de Nous</a></li>
                                <li class="ham-2"><a href="{{url('login')}}"><i class="fa fa-automobile"></i>Besoin Taxi / Tiak-Tiak?</a></li>
                                <li class="ham-3"><a href="{{url('provider/login')}}"><i class="fa fa-location-arrow"></i>Cherche Clients?</a></li>
                                <li class="ham-4"><a href="{{ url('privacy') }}"><i class="fa fa-area-chart"></i>Privacy Policy</a></li>
                                <li class="ham-5"><a href="{{ url('terms') }}"><i class="fa fa-envelope-open"></i>Termes & Conditions</a></li>
                            </ul>
                        </div><!-- /.author-menu -->
                    </div><!-- /.login-author -->
                </div><!-- /.author-area-content -->
            </div><!-- /.author-area -->
        </div><!-- /.overlay-sidebar -->
    </div><!-- /.header-modal-area -->

     <!-- ====== Header Nav Area ====== --> 
    <header class="header-nav-area">
        <div class="container">        
            <div class="row">
                <div class="col-md-3 col-sm-10 col-xs-10">
                    <div class="site-logo">
                        <a href="#"><img src="{{ config('constants.site_logo', asset('logo-black.png')) }}" alt="logo"/></a>
                    </div><!-- /.logo -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-9 col-sm-2 col-xs-2 pd-right-0">
                    <nav class="site-navigation top-navigation nav-style-one">
                        <div class="menu-wrapper">
                            <div class="menu-content">
                                <ul class="menu-list">
                                    <li>
                                        <a href="{{url('/')}}">Accueil</a>

                                    </li>
                                    <li>
                                        <a href="{{url('login')}}">Client</a>
                                    </li>
                                    <li>
                                        <a href="{{url('provider/login')}}">Chauffeur</a>
                                    </li>
                                    <li>
                                        <a href="./#app-block">Télécharger</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#">Contact</a>
                                    </li> -->
                                    <li>
                                    <a href="{{url('login')}}">Se Connecter</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/register') }}">S'Inscrire</a>
                                    </li>
                                </ul> <!-- /.menu-list -->
                            </div> <!-- /.menu-content-->
                        </div> <!-- /.menu-wrapper --> 
                    </nav><!-- /.site-navigation -->
                    <!--Mobile Main Menu-->
                    <div class="mobile-menu-main hidden-md hidden-lg">
                        <div class="menucontent overlaybg"> </div>
                        <div class="menuexpandermain slideRight">
                            <a id="navtoggole-main" class="animated-arrow slideLeft menuclose">
                                <span></span>
                            </a>
                        </div><!--/.menuexpandermain-->

                        <div id="mobile-main-nav" class="mb-navigation slideLeft">
                            <div class="menu-wrapper">
                                <div id="main-mobile-container" class="menu-content clearfix"></div>
                            </div>
                        </div><!--/#mobile-main-nav-->
                    </div><!--/.mobile-menu-main-->
                </div><!-- /.col-md-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </header><!-- /.header-bottom-area -->


<!-- <div class="row gray-section no-margin">
    <div class="container">
        <div class="content-block">
            <h2>{{ $title }}</h2>
            <div class="title-divider"></div>
            <p>{!! Setting::get($page) !!}</p>
        </div>
    </div>
</div> -->
<!-- ====== Page Header ====== -->
     <div class="page-header nevy-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">                
                    <h2 class="page-title">{{$title}}</h2>
                    <p class="page-description yellow-color">Know {{$title}}</p>        
                </div><!-- /.col-md-12 -->
            </div><!-- /.row-->
        </div><!-- /.container-fluid -->           
    </div>
    <div class="about-main-content">
        <div class="container">
            <div class="row">
     {!! Setting::get($page)  !!}
            </div>
        </div>
     </div>


    <!-- ====== App block ====== --> 
    <div class="app-block bg-gray-color" id="app-block">
        <div class="container-large-device">
            <div class="container">
                <div class="row tb">
                    <div class="col-md-6 tb-cell">
                        <div class="mobile-app-details">
                            <h4 class="top-subtitle">Gagnant-Gagnant</h4>
                            <h2 class="title red-color">Nos APP mobiles gratuites</h2>
                            <h3 class="subtitle">Rechercher AXYL dans Iphone & Android market places</h3>
                            <div class="app-location-link">
                                <a href="{{Setting::get('store_link_ios')}}">
                                    <img src="asset/assets/images/user-appstore.png" alt="mobile" style="height:60px;"/>
                                </a>
                                <a href="{{Setting::get('store_link_android')}}">
                                    <img src="asset/assets/images/user-playstore.png" alt="mobile" />
                                </a>
                            </div><!-- /.app-location-link -->
                            <div class="app-location-link">
                                <a href="{{Setting::get('provider_app_store_link')}}">
                                    <img src="asset/assets/images/provider-appstore.png" alt="mobile" style="height:60px;"/>
                                </a>
                                <a href="{{Setting::get('provider_play_store_link')}}">
                                    <img src="asset/assets/images/provider-playstore.png" alt="mobile" />
                                </a>
                            </div><!-- /.app-location-link -->
                        </div><!-- /.mobile-app-details -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 tb-cell">
                        <div class="app-mokeup">
                            <img src="asset/assets/images/mobile.png" alt="mobile" />
                        </div><!-- /.app-mokeup -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.container-large-device -->
    </div><!-- /.app-block -->



    <!-- ======footer area======= -->
    <div class="container footer-top-border">
        <div class="vehicle-multi-border yellow-black"></div><!-- /.vehicle-multi-border -->
    </div><!-- /.container -->

    <footer class="footer-block bg-black" style="background-image: url(vassets/images/footer-bg.png);">
        <div class="container">
            <!-- footer-top-block -->
            <div class="footer-top-block yellow-theme">            
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="widget widget_about">    
                            <h3 class="widget-title">
                                A propos de nous
                            </h3><!-- /.widget-title -->
                            <div class="widget-about-content">
                                <img src="{{ config('constants.site_logo', asset('logo-black.png')) }}" alt="logo" />
                                <p>Nous mettons en relation des chauffeurs de taxi et les clients. Nous sélectionnons les chauffeurs sur la base de critéres bien définis. Choisir un taxi AXYL, c'est choisir la sécurité.</p>
                                <a href="" class="button">Plus</a>
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget widget_about -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="widget widget_menu">
                            <h3 class="widget-title">
                                Liens utiles
                            </h3><!-- /.widget-title -->
                            <ul>
                                <li><a href="{{url('/')}}">Accueil</a></li>
                                <li><a href="{{url('login')}}">Prendre un Taxi</a></li>
                                <li><a href="{{ url('provider/login')}} ">Nos voitures</a></li>
                                <li><a href="{{url('login')}}">Réservation</a></li>
                            </ul> 
                        </div><!-- /.widget -->
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-4 col-sm-6">
                        <div class="widget widget_hot_contact">
                            <h3 class="widget-title">
                               Contact 
                            </h3><!-- /.widget-title -->
                            <ul>
                                <li><a href="#"><i class="fa fa-envelope"></i>{{ config('constants.contact_email', '')  }}</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>(+221) {{ config('constants.contact_number', '')  }}</a></li>
                                <li><a href="#"><i class="fa fa-map-marker"></i>Villa N° 41, HLM Grand Yoff, Dakar, Sénégal.</a></li>
                               <!--  <li><a href="#"><i class="fa fa-map-marker"></i>Level 8 & 9 | Olympia Teknos Park, No.28, SIDCO Industrial Estate, Guindy 600032, India. </a></li> -->
                            </ul> 
                        </div><!-- /.widget -->
                        <div class="widget widget_newsletter" style="display:none;">
                            <h3 class="widget-title">Subscribe</h3>
                            <form action="#" class="subscribes-newsletter" method="get">
                                <label>Subscribe to our Newsletters</label>
                                <div class="input-group">
                                    <input type="search" name="s" placeholder="Your email" class="form-controller">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">
                                                <span class="fa fa-paper-plane"></span>
                                        </button>
                                    </span>
                                </div><!-- /. input-group -->
                            </form><!-- /.subscribes-newsletter -->
                        </div><!-- /.widget -->
                    </div><!-- /.col-md-3 -->

                    <!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.footer-top-block -->


            <!-- footer-bottom-block -->
            <div class="footer-bottom-block">            
                <div class="row">
                     <div class="col-md-9">
                        <div class="bottom-content-left">

                            <p class="copyright">{{ config('constants.site_copyright', '&copy; '.date('Y').' Appoets') }} -  Tous Droits Réservés<a href="#"></a></p>

                            <!-- <p class="copyright">Copyright &copy; 2019 taxi  -  All Right Reserved <a href="#"></a></p> -->

                        </div><!-- /.bottom-top-content -->
                     </div><!-- /.col-md-9 -->
                     <div class="col-md-3">
                        <div class="bottom-content-right">
                            <div class="social-profile">
                                <span class="social-profole-title">Contactez nous:</span>
                                <!-- <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a> -->
                               <a target="_blank" href="https://api.whatsapp.com/send?l=en&amp;text=Hi!%20I%27m%20interested%20in%20one%20of%20your%20products%20at%20UberLikeApp&amp;phone=919384801116"><img src="{{asset('asset/assets/images/whatsapp-1.png')}}"></a>
                                <a href="skype:7cd9b44fcd1de184"><img src="{{asset('asset/assets/images/skype.png')}}"></a>
                                <!-- <a href="{{Setting::get('facebook_link')}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{Setting::get('twitter_link')}}"><i class="fa fa-twitter"></i></a> -->
                            </div><!-- /.social-profile -->
                        </div><!-- /.bottom-content-right -->
                     </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.footer-bottom-block -->
        </div><!-- /.container -->
    </footer><!-- /.footer-block -->

        </div><!-- /.container -->
    </footer><!-- /.footer-block -->


     <!-- All The JS Files
    ================================================== --> 
    <script src="asset/assets/js/plugins.min.js"></script>
    <script src="asset/assets/js/carrent.min.js"></script> <!-- main-js -->

    <!-- RS5.4 Core JS Files -->
    <script src="asset/assets/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="asset/assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="asset/assets/js/jquery.matchHeight-min.js"></script>
  <script type="text/javascript">
      $(function() {
      $('.equal-height').matchHeight({
      byRow: true,
      property: 'height'
      });
      });
    </script>
    <script>
        jQuery(document).ready(function() {
            var $sliderSelector = jQuery(".carrent-slider");
            $sliderSelector.revolution({
                sliderType: "standard",
                sliderLayout: "fullwidth",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "on",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "on",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "gyges",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: true,
                        tmp: '',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        }
                    }
                },
                responsiveLevels:[1400,1368,992,480],
                visibilityLevels:[1400,1368,992,480],
                gridwidth:[1400,1368,992,480],
                gridheight:[600,600,500,380],
                disableProgressBar:"on"
            });
        });
    </script>

    <!-- SLIDER REVOLUTION 5.4 EXTENSIONS  (Load Extensions only on Local File Systems! The following part can be removed on Server for On Demand Loading) -->
    <script src="asset/assets/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="asset/assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="asset/assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="asset/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="asset/assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="asset/assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="asset/assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="asset/assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
   
    @if(Setting::get('demo_mode', 0) == 1)
        <!-- Start of LiveChat (www.livechatinc.com) code -->
        <script type="text/javascript">
            window.__lc = window.__lc || {};
            window.__lc.license = 10555997;
            (function() {
                var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
                lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
            })();
        </script>
        <!-- End of LiveChat code -->
    @endif
</body>
</html>