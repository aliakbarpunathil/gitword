<?php
require( '../../../wp-load.php' );
if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
}
global $wpdb;
//print_r($_FILES['files']);

$files  = rearray($_FILES['files']);

foreach($files as $input_file){
if ($input_file['error'] === UPLOAD_ERR_OK) { 
if ($input_file['size'] > 307200) { 
$redirect = add_query_arg( 'register', 'exceeded', wp_get_referer() );
wp_redirect( $redirect );
}

$upload_overrides = array( 'test_form' => false );
$file=$input_file;
$movefile = wp_handle_upload( $file, $upload_overrides);
$url=$movefile['url'];
}
elseif ($input_file['error'] === UPLOAD_ERR_NO_FILE) { 

}
$token=$wpdb->insert('wp_gallery', array(
    'user_id' => get_current_user_id(),
    'image_location' => $url,
	'category' => $_POST['album_id']
));
}

if($token)
	$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/gallery-view.php?id='.$_POST['album_id'] );
else
	$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/gallery-view.php?id='.$_POST['album_id'] );
wp_redirect( $redirect );

function rearray(&$file_post) {
	 $file_ary = array();
		$file_count = count($file_post['name']);
		$file_keys = array_keys($file_post);

		for ($i=0; $i<$file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
?>