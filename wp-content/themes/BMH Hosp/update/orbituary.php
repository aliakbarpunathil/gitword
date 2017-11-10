<?php
require( '../../../wp-load.php' );
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
include(  dirname( __FILE__ ).'/header.php' );
if(isset($_GET['id']))
{
$obituary_id=$_GET['id'];
global $wpdb;
$obituary_details=$wpdb->get_row("Select * from wp_obituary where id='".$obituary_id."'");
}
?>
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/wp-content/datepicker/jquery-ui.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/wp-content/datepicker/style.css">
<div class="wrap wpb_wrapper">


<div   lang="en-US" dir="ltr">
<form method="post" action="wp-obituary.php" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $obituary_id; ?>" name="id">
<input type="hidden" value="<?php if($obituary_details) echo '1'; else echo '0'; ?>" name="update">

<div class="pix-con clearfix wpb_row pix-row vc_row-fluid vc_custom_1425896317124 light normal bg-pos-rel pix-container">
<div class="col-md-9">
	<div class="col-md-4">
	
		Name*
		</div>
			<div class="col-md-8">
		<input name="orbituary_name" type="text" value="<?php if($obituary_details) echo $obituary_details->obituary_name; ?>" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" required />
		</div>
		<div class="col-md-4">
	
		Born on(dd-mm-yyyy)*
		</div>
			<div class="col-md-8">
			<input type="text" name="orbituary_born_date" value="<?php if($obituary_details) echo date("d-m-Y", strtotime($obituary_details->obituary_born)); ?>" class="wpcf7-form-control wpcf7-text datepicker" required aria-required="true" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}">
		
		</div>
		<div class="col-md-4">
	
		Expired(dd-mm-yyyy)* 
		</div>
			<div class="col-md-8">
			<input type="text" name="orbituary_expired_date" value="<?php if($obituary_details) echo date("d-m-Y", strtotime($obituary_details->obituary_expired)); ?>" class="wpcf7-form-control wpcf7-text datepicker" required aria-required="true" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}">
		
		</div>
		
	<div class="col-md-4">
	
		Description
		</div>
			<div class="col-md-8">
		<textarea name="description" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" rows="4" ><?php if($obituary_details) echo $obituary_details->obituary_description; ?></textarea>
	</div>

	<div class="col-md-4">
	
		Photo
		</div>
		<div class="col-md-8">
		<?php if(isset($obituary_details)) { ?>
		<img src="<?php echo $obituary_details->obituary_photo; ?>"  width="100" height="100">
		<input type="hidden" value="<?php echo $obituary_details->obituary_photo; ?>" name="o_photo">
		<?php } ?>
		<input type="file" name="fileToUpload" id="fileToUpload">
		
		</div>
	
	

<div class="col-md-4">
	
	
		</div>
			<div class="col-md-8">
<br/>

<input type="submit" value="<?php if($obituary_details) echo "Update"; else echo "Add Obituary"; ?>" name="submit" class="wpcf7-form-control wpcf7-submit">
</div>
</div>
</div>
</form>

</div>
</div>

<?php
//include( ABSPATH . '/wp-content/themes/BMH Hosp/footer.php' );
include(  dirname( __FILE__ ).'/footer.php' );
?>