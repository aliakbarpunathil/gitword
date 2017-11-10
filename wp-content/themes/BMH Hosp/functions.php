<?php
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/* redirect users to front page after login    */

add_filter( 'wp_mail_from', function() {
    return 'admin@cmcbatch.com';
} );

function get_excerpt_by_id($post_id){
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 35; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '…');
        $the_excerpt = implode(' ', $words);
    endif;

    $the_excerpt = '<p>' . $the_excerpt . '</p>';

    return $the_excerpt;
}


// set the last login date 
add_action('wp_login','wpsnipp_set_last_login', 0, 2); 

function wpsnipp_set_last_login($login, $user) { 
$user = get_user_by('login',$login); 
$time = current_time( 'timestamp' ); 

$last_login = get_user_meta( $user->ID, '_last_login', 'true' ); 
if(!$last_login){ 
update_usermeta( $user->ID, '_last_login', $time ); 
}
else{ 
update_usermeta( $user->ID, '_last_login_prev', $last_login ); 
update_usermeta( $user->ID, '_last_login', $time ); 
} } 


// get last login date 
function wpsnipp_get_last_login($user_id,$prev=null){ 
$last_login = get_user_meta($user_id); 
$time = current_time( 'timestamp' ); 
if(isset($last_login['_last_login_prev'][0]) && $prev){ 
$last_login = get_user_meta($user_id, '_last_login_prev', 'true' ); 
}
else if(isset($last_login['_last_login'][0])){ 
$last_login = get_user_meta($user_id, '_last_login', 'true' );
 }else{
 return false;
// update_usermeta( $user_id, '_last_login', $time );
// $last_login = $last_login['_last_login'][0]; 
 }
 return $last_login; 
 }
?>
