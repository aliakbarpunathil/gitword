<?php 
$body=sprintf( $message, get_option( 'blogname' ), home_url(), wp_specialchars_decode( translate_user_role( $role['name'] ) ), home_url( "/newbloguser/$newuser_key/" ) )
$to = 'aliakbarpunathil@gmail.com';
$subject="joining confirmation";
?>