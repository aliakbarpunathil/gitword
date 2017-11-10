<?php
/**
 * WordPress User Page
 *
 * Handles authentication, registering, resetting passwords, forgot password,
 * and other user handling.
 *
 * @package WordPress
 */

/** Make sure that the WordPress bootstrap has run before continuing. */
require( '../../../wp-load.php' );
/*if(is_user_logged_in())
{
?>
<script>window.location.href = "<?php echo get_home_url(); ?>";</script>
<?php
	}*/
?>
<!doctype html>

<!--[if lt IE 7]><html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="en" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="en" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Company Name</title>

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" href="wp-content/themes/event/library/images/apple-icon-touch.html">
    <link rel="icon" href="wp-content/themes/event/favicon.png">    
    <meta name="msapplication-TileColor" content="#f01d4f">
    <meta name="msapplication-TileImage" content="wp-content/themes/event/library/images/win8-tile-icon.html">

    <link rel="pingback" href="xmlrpc.php">

    <title>Company Name</title>
    <link rel="alternate" type="application/rss+xml" title="EventOn &raquo; Feed" href="feed/index.html" />
    <link rel="alternate" type="application/rss+xml" title="EventOn &raquo; Comments Feed" href="comments/feed/index.html" />
    <link rel="alternate" type="application/rss+xml" title="EventOn &raquo; Home3 Comments Feed" href="home3/feed/index.html" />

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
    <link rel='stylesheet' id='contact-form-7-css' href='wp-content/plugins/contact-form-7/includes/css/styles.css' type='text/css' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css' href='wp-content/plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
    <style id='rs-plugin-settings-inline-css' type='text/css'>
        .tp-caption a {
            color: #fff;
            text-shadow: none;
            -webkit-transition: all 0.2s ease-out;
            -moz-transition: all 0.2s ease-out;
            -o-transition: all 0.2s ease-out;
            -ms-transition: all 0.2s ease-out
        }
        
        .tp-caption a:hover {
            color: #ffa902
        }
    </style>
    <link rel='stylesheet' id='wpclef-main-css' href='wp-content/plugins/wpclef/assets/dist/css/main.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='eventon-theme-fonts-css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro%3A100%2C100italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic%2C&amp;subset=latin' type='text/css' media='all' />
    <link rel='stylesheet' id='js_composer_front-css' href='wp-content/plugins/js_composer/assets/css/js_composer.css' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css-css' href='wp-content/themes/event/library/css/font-awesome.css' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css-css' href='wp-content/themes/event/library/css/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='plugins-css-css' href='wp-content/themes/event/library/css/plugins.css' type='text/css' media='all' />
    <link rel='stylesheet' id='woo-css-css' href='wp-content/themes/event/library/css/woo.css' type='text/css' media='all' />
    <link rel='stylesheet' id='main-css-css' href='wp-content/themes/event/library/css/main.css' type='text/css' media='all' />
    <link rel='stylesheet' id='color-stylesheet-css' href='wp-content/themes/event/library/css/color-css/default.css' type='text/css' media='all' />
    <link rel='stylesheet' id='custom-css-css' href='wp-content/themes/event/library/css/custom_styles.css' type='text/css' media='all' />
    <link rel='stylesheet' id='googleFonts-css' href='http://fonts.googleapis.com/css?family=Lato%3A400%2C700%2C400italic%2C700italic' type='text/css' media='all' />
    <script type='text/javascript' src='wp-includes/js/jquery/jquery.js'></script>
    <script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js'></script>
    <script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js'></script>
    <script type='text/javascript' src='wp-content/themes/event/library/js/libs/modernizr.custom.min.js'></script>
    <link rel='canonical' href='index.html' />
    <link rel='shortlink' href='index.html' />
    <style type="text/css" data-type="vc_shortcodes-custom-css">
        .vc_custom_1423309851518 {
            padding-top: 70px !important;
            padding-bottom: 70px !important;
            background-image: url(wp-content/uploads/2014/12/light-1e5ba.jpg?id=450) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }
        
        .vc_custom_1417500238804 {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
            background-color: #735cb0 !important;
        }
        
        .vc_custom_1423313491995 {
            background-image: url(http://innwithemes.com/eventonwp/wp-content/uploads/2014/12/background-bg.png?id=26) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }
        
        .vc_custom_1423315608614 {
            padding-top: 80px !important;
            padding-bottom: 80px !important;
            background-image: url(http://innwithemes.com/eventonwp/wp-content/uploads/2014/12/background-bg.png?id=26) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }
    </style>

</head>

<body class="home page page-id-21 page-template-default wpb-js-composer js-comp-ver-4.4.2 vc_responsive">

    <header class="header-container">

        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="contact-details clearfix">
                            <li><i class="icon fa fa-paper-plane-o"></i><a href="http://innwithemes.com/cdn-cgi/l/email-protection#ac8cc5c2cac3ecd5c3d9dedfc5d8c982cfc3c1"><span class="__cf_email__" data-cfemail="20494e464f60594f5552534954450e434f4d">[email&#160;protected]</span><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script></a></li>
                            <li><i class="icon fa fa-phone"></i>+ (009) 123 4567</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-social">
                            <div class="social-icon">
                                <a href="#" class="facebook fa fa-facebook"></a>
                                <a href="#" class="twitter fa fa-twitter"></a>
                                <a href="#" class="googleplus fa fa-google-plus"></a>
                                <a href="#" class="linkedin fa fa-linkedin"></a>
                                <a href="#" class="flickr fa fa-flickr"></a>                                
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header affix clearfix">
            <div class="container">
                <div class="inner-header">
                    <h1> <a href="http://innwithemes.com/eventonwp" id="logo">EventOn</a></h1>
                    <div id="sb-search" class="sb-search">
                        <form role="search" method="get" action="http://innwithemes.com/eventonwp/">
                            <input class="sb-search-input" placeholder="Search" type="text" value="" name="s" id="s">
                            <input class="sb-search-submit" type="submit" id="searchsubmit" value="">
                            <span class="sb-icon-search"></span>
                        </form>
                    </div>

                    <div class="mobile-menu-icon">
                        <i class="fa fa-bars"></i>
                    </div>

                    <nav class="main-nav mobile-menu" role="navigation">
                        <ul id="menu-main-menu" class="nav top-nav cf">                           
                            <li id="menu-item-46" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-46 pix-submenu external"><a href="#">MENU ONE</a></li>
                            <li id="menu-item-55" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-55 pix-submenu external"><a href="#">MENU TWO</a></li>
                            <li id="menu-item-212" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-212 pix-submenu external"><a href="#">MENU THREE</a></li>
                            <li id="menu-item-119" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-119 pix-submenu external"><a href="#">MENU FOUR</a></li>
                            <li id="menu-item-185" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-185 pix-submenu external"><a href="#">MENU FIVE</a></li>
                        </ul>
                    </nav>
                    <!-- NAV -->
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER -->
    <!-- HEADER -->
    <section class="sub-banner newsection">
        <div class="container">
            <h2 class="title">Register</h2>
            <ul class="breadcrumb" itemprop="breadcrumb">
                <li><a href="index.html">Home</a> </li>
                <li><span class="current">Register</span></li>
        </div>
        </div>
    </section>

    <section id="post-75" class="clearfix post-75 page type-page status-publish hentry">

        <section itemprop="articleBody">
            <div class="wpb_row pix-row vc_row-fluid vc_custom_1425896317124 light normal">
                <div class="bg-pos-rel">
                    <div class="pix-con clearfix">
                        <div class="pix-container">
                            <div class="vc_col-sm-6 wpb_column vc_column_container ">
                                <div class="wpb_wrapper">
                                    <h2 class="main-title title   size-md" style="font-weight: 300; ">Register here...</h2>
                                    <div class="spacer" style="height: 30px"></div>
                                    <div class="wpcf7" id="wpcf7-f165-p75-o1" lang="en-US" dir="ltr">
                                       
                                        <!--form name="" action="http://innwithemes.com/eventonwp/contact/#wpcf7-f165-p75-o1" method="post" class="wpcf7-form" novalidate="novalidate"-->
                                        <form name="registerform" id="registerform" action="" method="post">
                                            <p>USER NAME									
                                                <br />
                                               
												<input type="text" name="username" id="user_name" size="20" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /> </p>
											 <p>FIRST NAME									
                                                <br />
                                                
												<input type="text" name="fname" id="first_name" size="20" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /> </p>
											 <p>LAST NAME									
                                                <br />
                                           
												<input type="text" name="lname" id="last_name" size="20" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /> </p>
												
											<p>EMAIL									
                                                <br />
                                                
												<input type="email" name="email" id="emial" size="20" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /> </p>
												
                                            <p>PASSWORD
                                                <br />
                                              
												<input type="password" name="pwd" id="user_pass" value="" size="20" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" />
												</p>
												
												
                                                <input type="submit" name="wp-submit" id="wp-submit" value="REGISTER" class="wpcf7-submit" />
												
                                            </p>
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="vc_col-sm-6 wpb_column vc_column_container ">
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>

    <footer class="footer col3" role="contentinfo">
        <div id="copyright">
            <div class="container">
                <div class="copyright row">
                    <div class="col-md-6">
                        <p>© 2017 <a href="#">Company Name</a> , All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="social-icon pull-right">
                            <a href="#" class="facebook fa fa-facebook"></a>
                            <a href="#" class="twitter fa fa-twitter"></a>
                            <a href="#" class="googleplus fa fa-google-plus"></a>
                            <a href="#" class="linkedin fa fa-linkedin"></a>
                            <a href="#" class="flickr fa fa-flickr"></a>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script type='text/javascript' src='wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js'></script>
    <!--script type='text/javascript'>
        /* <![CDATA[ */
        var _wpcf7 = {
            "loaderUrl": "http:\/\/localhost\/w\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif",
            "sending": "Sending ..."
        };
        /* ]]> */
    </script-->
    <!--script type='text/javascript' src='wp-content/plugins/contact-form-7/includes/js/scripts.js'></script-->
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wc_add_to_cart_params = {
            "ajax_url": "\/wordpress\/wp-admin\/admin-ajax.php",
            "ajax_loader_url": "\/\/innwithemes.com\/eventonwp\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif",
            "i18n_view_cart": "View Cart",
            "cart_url": "http:\/\/innwithemes.com\/eventonwp\/cart\/",
            "is_cart": "",
            "cart_redirect_after_add": "no"
        };
        var wc_add_to_cart_params = {
            "ajax_url": "\/wordpress\/wp-admin\/admin-ajax.php",
            "ajax_loader_url": "\/\/innwithemes.com\/eventonwp\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif",
            "i18n_view_cart": "View Cart",
            "cart_url": "http:\/\/innwithemes.com\/eventonwp\/cart\/",
            "is_cart": "",
            "cart_redirect_after_add": "no"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js'></script>
    <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var woocommerce_params = {
            "ajax_url": "\/wordpress\/wp-admin\/admin-ajax.php",
            "ajax_loader_url": "\/\/innwithemes.com\/eventonwp\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif"
        };
        var woocommerce_params = {
            "ajax_url": "\/wordpress\/wp-admin\/admin-ajax.php",
            "ajax_loader_url": "\/\/innwithemes.com\/eventonwp\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js'></script>
    <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min.js'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wc_cart_fragments_params = {
            "ajax_url": "\/wordpress\/wp-admin\/admin-ajax.php",
            "fragment_name": "wc_fragments"
        };
        var wc_cart_fragments_params = {
            "ajax_url": "\/wordpress\/wp-admin\/admin-ajax.php",
            "fragment_name": "wc_fragments"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var pixLike = {
            "ajaxurl": "http:\/\/innwithemes.com\/eventonwp\/wp-admin\/admin-ajax.php",
            "liked": "You already liked this!"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='wp-content/themes/event/framework/required-functions/pix-like-me/js/like-me.js'></script>
    <script type='text/javascript' src='wp-includes/js/comment-reply.min.js'></script>
    <script type='text/javascript' src='wp-content/themes/event/library/js/scripts.js'></script>
    <script type='text/javascript' src='wp-content/themes/event/library/js/plugins.js'></script>
    <script type='text/javascript' src='wp-content/themes/event/library/js/main.js'></script>
    <script type='text/javascript' src='wp-content/plugins/js_composer/assets/js/js_composer_front.js'></script>

    <script type="text/javascript">
        /* <![CDATA[ */
        (function(d, s, a, i, j, r, l, m, t) {
            try {
                l = d.getElementsByTagName('a');
                t = d.createElement('textarea');
                for (i = 0; l.length - i; i++) {
                    try {
                        a = l[i].href;
                        s = a.indexOf('/cdn-cgi/l/email-protection');
                        m = a.length;
                        if (a && s > -1 && m > 28) {
                            j = 28 + s;
                            s = '';
                            if (j < m) {
                                r = '0x' + a.substr(j, 2) | 0;
                                for (j += 2; j < m && a.charAt(j) != 'X'; j += 2) s += '%' + ('0' + ('0x' + a.substr(j, 2) ^ r).toString(16)).slice(-2);
                                j++;
                                s = decodeURIComponent(s) + a.substr(j, m - j)
                            }
                            t.innerHTML = s.replace(/</g, '&lt;').replace(/>/g, '&gt;');
                            l[i].href = 'mailto:' + t.value
                        }
                    } catch (e) {}
                }
            } catch (e) {}
        })(document); /* ]]> */
    </script>
</body>
</html>