<?php
require( '../../../wp-load.php' );
global $wpdb;
$rows_affected=$wpdb->delete( 'wp_bulletin', array( 'ID' => $_GET['id'])); 
 if($rows_affected)
$redirect = add_query_arg( 'register', 'success', wp_get_referer() );
else
$redirect = add_query_arg( 'register', 'fail', wp_get_referer() );
wp_redirect( $redirect );
?>