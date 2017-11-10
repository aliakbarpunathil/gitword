<?php
require( '../../../wp-load.php' );
if( ! function_exists( 'wp_handle_upload' )) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
}
global $wpdb;
$contact_id=$wpdb->get_var("SELECT id FROM wp_contact WHERE event_id = '". $_POST['event_id']."'")
$upload_overrides = array( 'test_form' => false );
if ($_FILES['eventImage']['error'] === UPLOAD_ERR_OK) { 
$file=$_FILES['eventImage'];
$movefile = wp_handle_upload( $file, $upload_overrides);
$url=$movefile['url'];
}
if ($_FILES['upload_form']['error'] === UPLOAD_ERR_OK) { 
$file1=$_FILES['upload_form'];
$movefile1 = wp_handle_upload( $file1, $upload_overrides);
$url1=$movefile1['url'];
}

if($_POST['submit']=="Submit")
{
$token=$wpdb->insert('wp_posts', array(
    'post_title' => $_POST['event_name'],
    'post_content' => $_POST['description'],
    'guid' => $url, 
	'post_date' => date('Y-m-d H:i:s')
	
));

$token1=$wpdb->insert('wp_contact', array(
    'event_id' => $wpdb->insert_id,
    'contact_details' => $_POST['address'],
    'contact_num' => $_POST['contact'], 
	'form_upload' => $url1
));
if($token && $token1)
$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/content.php' );
else
$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/content.php' );
}
elseif($_POST['submit']=="Update")
{
if (($_FILES['eventImage']['error'] === UPLOAD_ERR_OK)&&($_FILES['upload_form']['error'] === UPLOAD_ERR_OK)) { 

$token2=$wpdb->update( 'wp_posts', 	array( 
		'post_title' => $_POST['event_name'],
		'post_content' => $_POST['description'],
		'guid' => $url, 
		'post_date' => date('Y-m-d H:i:s')
		
	), 
	array( 'ID' => $_POST['event_id'] ) 

);

$token3=$wpdb->update( 'wp_contact', array( 
		'contact_details' => $_POST['address'],
		 'contact_num' => $_POST['contact'],
		 'form_upload' => $url1
	), 
	array( 'ID' => $contact_id ) 

);

if($token2 && $token3)
$redirect = add_query_arg( 'update', 'success', get_template_directory_uri().'/content.php' );
else
$redirect = add_query_arg( 'update', 'fail', get_template_directory_uri().'/content.php' );
}
elseif (($_FILES['eventImage']['error'] ===UPLOAD_ERR_NO_FILE)&&($_FILES['upload_form']['error'] ===UPLOAD_ERR_NO_FILE)){

$token2=$wpdb->update( 'wp_posts', 	array( 
		'post_title' => $_POST['event_name'],
		'post_content' => $_POST['description'],
		'post_date' => date('Y-m-d H:i:s')
	), 
	array( 'ID' => $_POST['event_id'] ) 

);

$token3=$wpdb->update( 'wp_contact', array( 
		'contact_details' => $_POST['address'],
		 'contact_num' => $_POST['contact'] 
	), 
	array( 'ID' => $contact_id ) 

);

if($token2 && $token3)
$redirect = add_query_arg( 'update', 'success', get_template_directory_uri().'/content.php' );
else
$redirect = add_query_arg( 'update', 'fail', get_template_directory_uri().'/content.php' );
}
elseif ($_FILES['eventImage']['error'] ===UPLOAD_ERR_OK){

$token2=$wpdb->update( 'wp_posts', 	array( 
		'post_title' => $_POST['event_name'],
		'post_content' => $_POST['description'],
		'post_date' => date('Y-m-d H:i:s'),
		'guid' => $url
	), 
	array( 'ID' => $_POST['event_id'] ) 

);

$token3=$wpdb->update( 'wp_contact', array( 
		'contact_details' => $_POST['address'],
		 'contact_num' => $_POST['contact'] 
	), 
	array( 'ID' => $contact_id ) 

);

if($token2 && $token3)
$redirect = add_query_arg( 'update', 'success', get_template_directory_uri().'/content.php' );
else
$redirect = add_query_arg( 'update', 'fail', get_template_directory_uri().'/content.php' );
}
elseif ($_FILES['upload_form']['error'] ===UPLOAD_ERR_OK){

$token2=$wpdb->update( 'wp_posts', 	array( 
		'post_title' => $_POST['event_name'],
		'post_content' => $_POST['description'],
		'post_date' => date('Y-m-d H:i:s')

	), 
	array( 'ID' => $_POST['event_id'] ) 

);

$token3=$wpdb->update( 'wp_contact', array( 
		'contact_details' => $_POST['address'],
		 'contact_num' => $_POST['contact'], 
		  'form_upload' => $url1
	), 
	array( 'ID' => $contact_id ) 

);

if($token2 && $token3)
$redirect = add_query_arg( 'update', 'success', get_template_directory_uri().'/content.php' );
else
$redirect = add_query_arg( 'update', 'fail', get_template_directory_uri().'/content.php' );
}
}
wp_redirect( $redirect );
?>