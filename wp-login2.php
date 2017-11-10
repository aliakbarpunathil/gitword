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
require( dirname(__FILE__) . '/wp-load.php' );
if(is_user_logged_in())
{
?>
<script>window.location.href = "<?php echo get_home_url(); ?>";</script>
<?php
	}
	include(  dirname( __FILE__ ).'/wp-content/themes/BMH Hosp/header.php' );
?>
    <!-- HEADER -->
    <!-- HEADER -->
    <section class="sub-banner newsection">
        <div class="container">
            <h2 class="title">Login</h2>
            <ul class="breadcrumb" itemprop="breadcrumb">
                <li><a href="index.html">Home</a> </li>
                <li><span class="current">Login</span></li>
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
                                    <h2 class="main-title title   size-md" style="font-weight: 300; ">Login here...</h2>
                                    <div class="spacer" style="height: 30px"></div>
                                    <div class="wpcf7" id="wpcf7-f165-p75-o1" lang="en-US" dir="ltr">
                                       
                                        <!--form name="" action="http://innwithemes.com/eventonwp/contact/#wpcf7-f165-p75-o1" method="post" class="wpcf7-form" novalidate="novalidate"-->
                                        <form name="loginform" id="loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
                                            <p>USER NAME									
                                                <br />
                                                <span class="wpcf7-form-control-wrap your-name">
												<input type="text" name="log" id="user_login" size="20" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span> </p>
                                            <p>PASSWORD
                                                <br />
                                                <span class="wpcf7-form-control-wrap your-email">
												<input type="password" name="pwd" id="user_pass" value="" size="20" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" /></span> </p>
												<?php
												do_action( 'login_form' );
												?>
												
                                                <input type="submit" name="wp-submit" id="wp-submit" value="LOGIN" class="wpcf7-submit" />
												<input type="hidden" name="testcookie" value="1" />
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
                        <p>© 2017 <a href="#">CMCBatch27</a> , All Rights Reserved.</p>
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