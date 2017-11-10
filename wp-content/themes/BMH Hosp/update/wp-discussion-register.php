<?php
require( '../../../wp-load.php' );

global $wpdb;
if($_POST['wp-submit']=='Add Topic')
{
$token1=$wpdb->insert('wp_discussion', array(
    'title' => $_POST['discussion_title'],
    'description' => $_POST['discussion_details'],
    'author' => get_current_user_id(),
));
}
elseif($_POST['wp-submit']=='Update Topic')
{

$token1=$wpdb->update('wp_discussion', array(
    'title' => $_POST['discussion_title'],
    'description' => $_POST['discussion_details']
),
array('ID' => $_POST['id'])
);
}

if($token1)
$redirect = add_query_arg( 'register', 'success', get_home_url().'/wp-content/themes/BMH%20Hosp/discussion-thread.php' );
else
$redirect = add_query_arg( 'register', 'fail', get_home_url().'/wp-content/themes/BMH%20Hosp/discussion-thread.php' );
wp_redirect( $redirect );
?>