<?php
require( '../../../wp-load.php' );
if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
}
global $wpdb;
if ($_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) { 
$upload_overrides = array( 'test_form' => false );
$file=$_FILES['fileToUpload'];
$movefile = wp_handle_upload( $file, $upload_overrides);
$url=$movefile['url'];
}
elseif($_FILES['fileToUpload']['error'] === UPLOAD_ERR_NO_FILE) { 
if($_POST['update']==1){
$url=$wpdb->get_var("SELECT obituary_photo where id = '".$_POST['id']."'");
}
$url="";
}

if($_POST['update']==0){
$token=$wpdb->insert('wp_obituary', array(
    'obituary_name' => $_POST['orbituary_name'],
    'obituary_born' => date("Y-m-d", strtotime($_POST['orbituary_born_date'])),
    'obituary_expired' => date("Y-m-d", strtotime($_POST['orbituary_expired_date'])),
    'obituary_description' => $_POST['description'],
    'obituary_photo' => $url
));
}
else
$token=$wpdb->update('wp_obituary', array(
    'obituary_name' => $_POST['orbituary_name'],
    'obituary_born' => date("Y-m-d", strtotime($_POST['orbituary_born_date'])),
    'obituary_expired' => date("Y-m-d", strtotime($_POST['orbituary_expired_date'])),
    'obituary_description' => $_POST['description'],
    'obituary_photo' => $url 
),
array(
  'ID' => $_POST['id']
)
);
if($token)
$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/obituary.php' );
else
$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/obituary.php' );
wp_redirect( $redirect );
?>