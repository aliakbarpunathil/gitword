<style>
	footer{
	margin-top : 20px;
	}
</style>
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

    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js'></script>

 
    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/plugins/contact-form-7/includes/js/scripts.js'></script>

    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js'></script>
    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js'></script>

    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js'></script>
    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min.js'></script>

    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js'></script>

    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/themes/event/framework/required-functions/pix-like-me/js/like-me.js'></script>
    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-includes/js/comment-reply.min.js'></script>
    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/themes/event/library/js/scripts.js'></script>
    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/themes/event/library/js/plugins.js'></script>
    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/themes/event/library/js/main.js'></script>
    <script type='text/javascript' src='<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/plugins/js_composer/assets/js/js_composer_front.js'></script>

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
	
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/wp-content/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.min.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/wp-content/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.init.min.js'></script>
</body>
</html>