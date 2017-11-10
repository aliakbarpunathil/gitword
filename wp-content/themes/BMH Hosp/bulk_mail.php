<?php
require( '../../../wp-load.php' );
include( dirname( __FILE__ ) .'/cmcmail.php' );
global $wpdb;
$emails = $wpdb->get_col("SELECT user_email FROM wp_users ");
$subject = $_POST['bulk_subject'];
$body = $_POST['bulk_body'];
foreach($emails as $user_email){
cmcMailer( $user_email, $subject, $body );
}
wp_redirect(wp_get_referer());
?>