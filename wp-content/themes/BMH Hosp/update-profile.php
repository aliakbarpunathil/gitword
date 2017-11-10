<?php
require( '../../../wp-load.php' );
if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
}
global $wpdb;
$uname=$_POST['username'];



$upload_overrides = array( 'test_form' => false );

//$info = getimagesize($_FILES['file']['tmp_name']);
if ($_FILES['profileImage']['error'] === UPLOAD_ERR_OK) { 
if ($_FILES['profileImage']['size'] > 204800) { 
$redirect = add_query_arg( 'register', 'exceeded', wp_get_referer() );
wp_redirect( $redirect );
}
$file=$_FILES['profileImage'];
$movefile = wp_handle_upload( $file, $upload_overrides);
$url=$movefile['url'];

}
else if(!$wpdb->get_var("SELECT pro_image from wp_profile_photo WHERE uname='".$uname."'"))
	$url=get_home_url().'/wp-content/uploads/userphoto/avatar.jpg';

if ($_FILES['familyImage1']['error'] === UPLOAD_ERR_OK) { 
$file1=$_FILES['familyImage1'];
$movefile1 = wp_handle_upload( $file1, $upload_overrides);
$url1=$movefile1['url'];

}
if ($_FILES['familyImage2']['error'] === UPLOAD_ERR_OK) { 
$file2=$_FILES['familyImage2'];
$movefile2 = wp_handle_upload( $file2, $upload_overrides);
$url2=$movefile2['url'];

}
if ($_FILES['familyImage3']['error'] === UPLOAD_ERR_OK) { 
$file3=$_FILES['familyImage3'];
$movefile3 = wp_handle_upload( $file3, $upload_overrides);
$url3=$movefile3['url'];

}
if ($_FILES['familyImage4']['error'] === UPLOAD_ERR_OK) { 
$file4=$_FILES['familyImage4'];
$movefile4 = wp_handle_upload( $file4, $upload_overrides);
$url4=$movefile4['url'];

} 



$id=$wpdb->get_var("SELECT id from wp_profile_photo WHERE uname='".$uname."'");
if($id>0){

if($_POST['name'])
$token=$wpdb->update('wp_profile_photo', array(
	'name' => $_POST['name']
	),
	array( 'id' => $id ) 
);	
if($_POST['s_name'])
$token=$wpdb->update('wp_profile_photo', array(
	'spouse' => $_POST['s_name']
	),
	array( 'id' => $id ) 
);	
if($_POST['c_name'])
$token=$wpdb->update('wp_profile_photo', array(
	'children' => $_POST['c_name']
	),
	array( 'id' => $id ) 
);	
if($_POST['sex']){
if($_POST['sex'] == "M")
$sex=1;
elseif($_POST['sex'] == "F")
$sex=0;

$token=$wpdb->update('wp_profile_photo', array(
    'sex' => $sex
	),
	array( 'id' => $id ) 
);	
}
if(isset($url))
$token=$wpdb->update('wp_profile_photo', array(
	    'pro_image' => $url 
	),
	array( 'id' => $id ) 
);	
if($_POST['home_address'])
$token=$wpdb->update('wp_profile_photo', array(
    'address' => $_POST['home_address']
 
	),
	array( 'id' => $id ) 
);	
if($_POST['office_address'])
$token=$wpdb->update('wp_profile_photo', array(
   'o_address' => $_POST['office_address']
	),
	array( 'id' => $id ) 
);	
if($_POST['dob'])
$dob=date("Y-m-d", strtotime($_POST['dob']));
$token=$wpdb->update('wp_profile_photo', array(
    'dob' => $dob
	),
	array( 'id' => $id ) 
);	
if($_POST['phone'])
$token=$wpdb->update('wp_profile_photo', array(
 'phone' => $_POST['phone'] 
	),
	array( 'id' => $id ) 
);	
if($_POST['whatsapp'])
$token=$wpdb->update('wp_profile_photo', array(
    'whatsapp' => $_POST['whatsapp']
	),
	array( 'id' => $id ) 
);	
if($_POST['about'])
$token=$wpdb->update('wp_profile_photo', array(
   'about' => $_POST['about']
	),
	array( 'id' => $id ) 
);	
if(isset($url1 ))
$token=$wpdb->update('wp_profile_photo', array(
    'photo1' => $url1 
	),
	array( 'id' => $id ) 
);	
if(isset($url2 ))
$token=$wpdb->update('wp_profile_photo', array(
    'photo2' => $url2
	),
	array( 'id' => $id ) 
);	
if(isset($url3 ))
$token=$wpdb->update('wp_profile_photo', array(
    'photo3' => $url3 
	),
	array( 'id' => $id ) 
);	
if(isset($url4 ))
$token=$wpdb->update('wp_profile_photo', array(
	
    'photo4' => $url4
),
array( 'id' => $id, ) 
);
}
else
$token=$wpdb->insert('wp_profile_photo', array(
	'uname' => $uname,
  
	'name' => $_POST['name'],
	'spouse' => $_POST['s_name'],
	'children' => $_POST['c_name'],
    'sex' => $_POST['sex'],
    'pro_image' => $url, 
    'address' => $_POST['home_address'], 
    'o_address' => $_POST['office_address'], 
    'dob' => $_POST['dob'], 
    'phone' => $_POST['phone'], 
    'whatsapp' => $_POST['whatsapp'], 
    'about' => $_POST['about'], 
    'photo1' => $url1, 
    'photo2' => $url2, 
    'photo3' => $url3, 
    'photo4' => $url4,
));

if($token)
$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/personal-profile.php?uname='.$uname );
else
$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/personal-profile.php?uname='.$uname );

wp_redirect( $redirect );

?>