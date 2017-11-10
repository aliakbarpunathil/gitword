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
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
/*if(is_user_logged_in())
{
?>
<script>window.location.href = "<?php echo get_home_url(); ?>";</script>
<?php
	}*/
include(  dirname( __FILE__ ).'/header.php' );


	?>
 <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/wp-content/datepicker/jquery-ui.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/wp-content/datepicker/style.css">
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
<?php
    $current_user = wp_get_current_user();
	global $wpdb;
	$pdetails=$wpdb->get_row("Select * FROM wp_profile_photo where uname='".$current_user->user_login."'")
	?>
    <section id="post-75" class="clearfix post-75 page type-page status-publish hentry">

        <section itemprop="articleBody">
            <div class="wpb_row pix-row vc_row-fluid vc_custom_1425896317124 light normal">
                <div class="bg-pos-rel">
                    <div class="pix-con clearfix">
                        <div class="pix-container">
                            <div class="vc_col-sm-6 wpb_column vc_column_container ">
                                <div class="wpb_wrapper">
                                    <h2 class="main-title title   size-md" style="font-weight: 300; ">Update Details...</h2>
                                    <div class="spacer" style="height: 30px"></div>
                                    <div class="wpcf7" id="wpcf7-f165-p75-o1" lang="en-US" dir="ltr">
                                       
                                        <!--form name="" action="http://innwithemes.com/eventonwp/contact/#wpcf7-f165-p75-o1" method="post" class="wpcf7-form" novalidate="novalidate"-->
                                        <form action="update-profile.php" method="post" enctype="multipart/form-data">
                                            <p>USER NAME									
                                                <br />
                                               
												<input type="text" name="username" id="user_name" value="<?php echo $current_user->user_login; ?>" size="20" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"  disabled/> </p>
												<input type="hidden" name="username" value="<?php echo $current_user->user_login; ?>" /> </p>
											 
											<p>NAME<span class="text-red">*</span>									
                                                <br />
                                               
												<input type="text" name="name" size="20" value="<?php echo $pdetails->name; ?>" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" required/> </p>											 
											
											<p>JOB TITLE									
                                                <br />
                                               
												<input type="text" name="job_title" size="20" value="<?php echo $pdetails->job_title; ?>" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"/> </p>											 
											
											<p>Spouse's Name									
                                                <br />
                                               
												<input type="text" name="s_name" size="20" value="<?php echo $pdetails->spouse; ?>" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"/> </p>											 
											
											<p>Children									
                                                <br />
                                               
												<input type="text" name="c_name" size="20" value="<?php echo $pdetails->children; ?>" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"/> </p>											 
											
											<p>Date of Birth(dd-mm-yyyy)<span class="text-red">*</span>						
                                                <br />
                                               <!--required aria-required="true" pattern="[0-3][0-9]-[0-3][0-9]-[1-2][0-9][0-9][0-9]-->
											   
											  <input type="text" name="dob" value="<?php echo date("d-m-Y", strtotime($pdetails->dob)); ?>" class="wpcf7-form-control wpcf7-text datepicker" required aria-required="true" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}">
												</p>
											
											 <p>Sex<span class="text-red">*</span>								
                                                <br />
                                               
												<input type="radio" name="sex" value="M" <?php if($pdetails->sex == 1){ ?> checked <?php } ?> > Male 
												<input type="radio" name="sex" value="F" <?php if($pdetails->sex == 0){ ?> checked <?php } ?>> Female  </p>
												
											 <p>Profile Photo
                                            <br/>
                                           <img src="<?php echo $pdetails->pro_image; ?>" id="profile_image1" width="150" height="150"/>
												<input type="file" name="profileImage" id="profile_image"/> 
												
												</p>
												
											<p>Home Address									
                                                <br />
                                                
												<textarea name="home_address" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"><?php echo $pdetails->address ;?> </textarea></p>
												
											<p>Office Address									
                                                <br />
                                                
												<textarea name="office_address" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"><?php echo $pdetails->o_address ;?> </textarea></p>
											
											<p>About									
                                                <br />
                                                
												<textarea name="about" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"><?php echo $pdetails->about ;?> </textarea></p>
												
                                            <p>Mobile<span class="text-red">*</span>
                                                <br />
                                              
												<input type="text" name="phone" value="<?php echo $pdetails->phone; ?>" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required " required aria-required="true" pattern="[0-9]{9,13}" title="Type a valid mobile number"/>
												</p>
											<p>Whatsapp Number
                                                <br />
                                              
												<input type="text" name="whatsapp" value="<?php echo $pdetails->whatsapp; ?>" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required" aria-required="true" pattern="[0-9]{9,13}" title="Type a valid mobile number" />
												</p>
												<div class="row">
												
												<div class="col-md-3">
											 <p>Family Photo 1
                                            <br/>
                                           <img src="<?php echo $pdetails->photo1; ?>" id="family_image1_thumb" width="150" height="150"/>
												<input type="file" name="familyImage1" id="family_image1" onchange="thumbnail();"/> 
												
												</p>
												</div>
												<div class="col-md-3">
												 <p>Family Photo 2
                                            <br/>
                                           <img src="<?php echo $pdetails->photo2; ?>" id="family_image2_thumb" width="150" height="150"/>
												<input type="file" name="familyImage2" id="family_image2" /> 
												
												</p>
												</div>
												<div class="col-md-3">
												 <p>Family Photo 3
                                            <br/>
                                           <img src="<?php echo $pdetails->photo3; ?>" id="family_image3_thumb" width="150" height="150"/>
												<input type="file" name="familyImage3" id="family_image3" /> 
												
												</p>
												</div>
												<div class="col-md-3">
												 <p>Family Photo 4
                                            <br/>
                                           <img src="<?php echo $pdetails->photo4; ?>" id="family_image4_thumb" width="150" height="150"/>
												<input type="file" name="familyImage4" id="family_image4" /> 
												
												</p>
												</div>
												
												</div>
												<br/>
                                                <input type="submit" name="wp-submit" value="Update" class="wpcf7-submit" />
												
                                           
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>

                          
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>

    <footer class="footer col3" role="contentinfo" style=" position : relative; bottom : 0px; width : 100% ;">
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
	
	<script>
	document.getElementById("profile_image").onchange = function thumbnail() {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById('profile_image1').src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};

document.getElementById("family_image1").onchange = function thumbnail() {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById('family_image1_thumb').src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};

document.getElementById("family_image2").onchange = function thumbnail() {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById('family_image2_thumb').src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};

document.getElementById("family_image3").onchange = function thumbnail() {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById('family_image3_thumb').src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};

document.getElementById("family_image4").onchange = function thumbnail() {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById('family_image4_thumb').src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
	</script>
</body>
</html>