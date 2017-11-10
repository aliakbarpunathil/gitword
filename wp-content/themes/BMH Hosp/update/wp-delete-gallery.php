<?php
require( '../../../wp-load.php' );
if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
}
global $wpdb;
$file=$wpdb->get_row("select image_location,category from wp_gallery where id='".$_GET['imgId']."'", ARRAY_N);

$location=explode('/',$file[0]);
array_splice($location, 0, 4);
$image=implode ( '/' , $location );
$image=get_home_path().$image;
echo $image;

$delete=unlink($image);

if($delete)
$token=$wpdb->delete( 'wp_gallery', array( 'id' => $_GET['imgId'])); 

if($token)
	$redirect = add_query_arg( 'delete', 'success', get_template_directory_uri().'/gallery-view.php?id='.$file[1] );
else
	$redirect = add_query_arg( 'delete', 'fail', get_template_directory_uri().'/gallery-view.php?id='.$file[1] );
wp_redirect( $redirect );
?>