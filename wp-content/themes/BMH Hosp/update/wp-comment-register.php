<?php
require( '../../../wp-load.php' );

global $wpdb;


$token1=$wpdb->insert('wp_discussion_comments', array(
    'discussion_comment' => $_POST['discussion_comment'],
    'discussion_id' => $_POST['discussion_id'],
    'comment_author' => get_current_user_id(),
));


if($token1)
$redirect = add_query_arg( 'register', 'success', get_home_url().'/wp-content/themes/BMH%20Hosp/discussion-single.php?discussionId='.$_POST['discussion_id'] );
else
$redirect = add_query_arg( 'register', 'fail', get_home_url().'/wp-content/themes/BMH%20Hosp/discussion-single.php?discussionId='.$_POST['discussion_id'] );
wp_redirect( $redirect );
?>