<?php
require( '../../../wp-load.php' );
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
include(  dirname( __FILE__ ).'/header.php' );
if(isset($_GET['id'])){
$event_id=$_GET['id'];
$update=1;
}
?>
<style>
.footer{
	position: relative;
    bottom: 0px;
    width: 100%;
	}
	.customMargin{
	position : relative;
	margin-top : 10px;
	
	}
</style>
 <section class="sub-banner newsection">
        <div class="container">
            <h2 class="title"><?php if(isset($_GET['id'])) {?> Edit Event <?php } else { ?> New Event Registration <?php } ?></h2>
            <ul class="breadcrumb" itemprop="breadcrumb">
                <li><a href="#">Home</a> </li>
                <li> <span class="current"><?php if(isset($_GET['id'])) {?> Edit Event <?php } else { ?> New Event Registration <?php } ?></span></li>
        </div>
        </div>
    </section>
<div class="wrap wpb_wrapper">
<br/>


<form method="post" class="validate" action="wp-event.php" enctype="multipart/form-data">

<input type="hidden" value="<?php echo $event_id; ?>" name="event_id">
<div class="pix-con clearfix wpb_row pix-row vc_row-fluid vc_custom_1425896317124 light normal bg-pos-rel pix-container">
<?php $contact_row = $wpdb->get_row('select contact_details, contact_num from wp_contact where event_id = '.$event_id);  ?>
	
<table class="form-table col-md-9">
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('Event Name'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="event_name" type="text" value="<?php echo get_the_title($event_id); ?>" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" required /></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="email"><?php _e('Event Description'); ?> </label></th>
		<td>
			<textarea name="description" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" rows="4" ><?php $content_post = get_post($event_id);
								$content = $content_post->post_content;
								echo stripslashes($content);
								
								?></textarea>
		</td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="email"><?php _e('Address'); ?> </label></th>
		<td><textarea name="address" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" rows="4" ><?php 	echo $contact_row->contact_details;?></textarea></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="email"><?php _e('Contact');  ?> </label></th>
		<td>
		<?php if(isset($_GET['id'])) {?>
		<input name="contact" type="number" id="mob" onblur="setLength()" value="<?php echo $contact_row->contact_num; ?>" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" />
		<?php } else { ?>
		<input name="contact" type="number" id="mob" onblur="setLength()" value="<?php echo $contact_row->contact_num; ?>" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" />
		<?php } ?>
		<label id="error_mob" style="color : red"> </label></td>
		
	</tr>
	
	<tr class="form-field form-required">
		<th scope="row">
		
		</th>
		<td>
		<?php if(isset($_GET['id'])){ ?>
		<img src="<?php echo $content_post->guid; ?>" width="300px" class=" customMargin " />
		<?php } ?>
		</td>
		
	</tr>
	<tr class="form-field">
		<th scope="row"><label for="first_name"><?php _e('Image') ?><span class="description"><?php _e('(required)'); ?></span> </label></th>
		<td>
		
		<input type="file" name="eventImage" id="fileToUpload" class=" customMargin " required>
		
		</td>
		
	</tr>
	
	
	


<tr>
<td>
</td>
<td>


<?php 
if(!$update)
submit_button( __( 'Submit' ), 'primary customMargin', 'submit', true ); 
else
submit_button( __( 'Update' ), 'primary customMargin', 'submit', true ); 
?>
</td>
</tr>
</table>
</div>
</form>

</div>
<script>

//document.getElementById('mob').value="";

function setLength(){
var l= document.getElementById('mob').value;
//var l= document.getElementById('mob1').value;
if((l.length<9)||(l.length>13)){
		document.getElementById('mob').value="";
		document.getElementById('error_mob').innerHTML="Enter a valid mobile number";
	}
	else
		document.getElementById('error_mob').innerHTML="";
		
if(!isNaN(miscCharge)){
		document.getElementById('mob').value="";
		document.getElementById('error_mob').innerHTML="Enter a valid mobile number";
}
}
</script>
<?php
include( ABSPATH . '/wp-content/themes/BMH Hosp/footer.php' );
?>