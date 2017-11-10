<?php
require( '../../../wp-load.php' );

global $wpdb;
if($_POST['registerStatus']=="Register Online"){
$token1=$wpdb->insert('wp_event_register', array(
    'event_id' => $_POST['event_id'],
    'user_id' => $_POST['user_id'],
));
if($token1)
$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/event-description.php?p='.$_POST['event_id'] );
else
$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/event-description.php?p='.$_POST['event_id'] );
}
elseif($_POST['registerStatus']=="Unregister"){
$token=$wpdb->delete( 'wp_event_register', array( 'event_id' => $_POST['event_id'], 'user_id' => $_POST['user_id'])); 
if($token)
$redirect = add_query_arg( 'unregister', 'success', get_template_directory_uri().'/event-description.php?p='.$_POST['event_id']);
else
$redirect = add_query_arg( 'unregister', 'failed', get_template_directory_uri().'/event-description.php?p='.$_POST['event_id'] );
}
wp_redirect( $redirect );
?>