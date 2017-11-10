<?php
require( '../../../wp-load.php' );
if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
}
global $wpdb;
$files=$wpdb->get_var("select image_location from wp_gallery where category='".$_GET['id']."'");
foreach($files as $file){
$location=explode('/',$file);
array_splice($location, 0, 4);
$image=implode ( '/' , $location );
$image=get_home_path().$image;
$delete=unlink($image);
}
if($delete)
	$token=$wpdb->delete( 'wp_gallery', array( 'category' => $_GET['id'])); 

	$token1=$wpdb->delete( 'wp_albums', array( 'id' => $_GET['id'])); 

if($token1)
	$redirect = add_query_arg( 'delete', 'success', get_template_directory_uri().'/album-view.php' );
else
	$redirect = add_query_arg( 'delete', 'fail', get_template_directory_uri().'/album-view.php' );
wp_redirect( $redirect );
?>