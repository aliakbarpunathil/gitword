<?php
/**
 * New User Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 */
require( '../../../wp-load.php' );

include( ABSPATH . '/wp-content/themes/BMH Hosp/header.php' );

if(isset($_GET['uname']))
	$update=1;
global $wpdb;
	$fname=$wpdb->get_var("SELECT name from wp_profile_photo WHERE uname='".$_GET['uname']."'");
	$email=$wpdb->get_var("SELECT user_email from wp_users WHERE user_login='".$_GET['uname']."'");
?>
<div class="wrap wpb_wrapper">
<br/>
<h2 id="add-new-user" class="main-title title size-md col-md-9"><?php
if ( current_user_can( 'create_users' ) ) {
	_e( 'Add New User' );
} elseif ( current_user_can( 'promote_users' ) ) {
	_e( 'Add Existing User' );
} ?>
</h2>

<?php if ( isset($errors) && is_wp_error( $errors ) ) : ?>
	<div class="error">
		<ul>
		<?php
			foreach ( $errors->get_error_messages() as $err )
				echo "<li>$err</li>\n";
		?>
		</ul>
	</div>
<?php endif;

if ( ! empty( $messages ) ) {
	foreach ( $messages as $msg )
		echo '<div id="message" class="updated notice is-dismissible"><p>' . $msg . '</p></div>';
} ?>

<?php if ( isset($add_user_errors) && is_wp_error( $add_user_errors ) ) : ?>
	<div class="error">
		<?php
			foreach ( $add_user_errors->get_error_messages() as $message )
				echo "<p>$message</p>";
		?>
	</div>
<?php endif; ?>
<div id="ajax-response"></div>



<?php
 // is_multisite()

if ( current_user_can( 'create_users') ) {
?>

<form method="post" class="validate" action="<?php echo get_template_directory_uri(); ?>/wp-create-user.php">


<div class="pix-con clearfix wpb_row pix-row vc_row-fluid vc_custom_1425896317124 light normal bg-pos-rel pix-container">
<table class="form-table col-md-9">
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('Username'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="user_login" type="text" id="user_login" <?php if($update){ ?> value="<?php echo $_GET['uname']; ?>" disabled <?php } else { ?> required <?php } ?> class="wpcf7-form-control wpcf7-text" maxlength="60"  />
		<input type="hidden" value="<?php echo $_GET['uname']; ?>" name="uname">
		</td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="email"><?php _e('Email'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="email" type="email" id="email" value="<?php echo $email; ?>" class="wpcf7-form-control wpcf7-text" required /></td>
	</tr>

	<tr class="form-field">
		<th scope="row"><label for="first_name"><?php _e('First Name') ?> </label></th>
		<td><input name="first_name" type="text" id="first_name" value="<?php echo $fname; ?>" class="wpcf7-form-control wpcf7-text" required /></td>
	</tr>

	<tr class="form-field form-required user-pass1-wrap">
		<th scope="row">
		
		</th>
		<td>
			<input class="hidden" value=" " /><!-- #24364 workaround -->
		
			<div class="wp-pwd">
				<?php $initial_password = wp_generate_password( 10 ); 
				?>
				<span class="password-input-wrapper">
					<input type="hidden" name="pass1"  value="<?php echo $initial_password; ?>" />
				</span>
			
			</div>
		</td>
	</tr>

	<tr class="pw-weak" style="display:none">
		<th><?php _e( 'Confirm Password' ); ?></th>
		<td>
			<label>
				<input type="checkbox" name="pw_weak" class="pw-checkbox" checked />
				<?php _e( 'Confirm use of weak password' ); ?>
			</label>
		</td>
	</tr>
	<tr style="display:none">
		<th scope="row"><?php _e( 'Send User Notification' ) ?></th>
		<td>
			<input type="checkbox" name="send_user_notification" id="send_user_notification" value="0" <?php checked( $new_user_send_notification ); ?> />
			<label for="send_user_notification"><?php _e( 'Send the new user an email about their account.' ); ?></label>
		</td>
	</tr>

<?php if(get_current_user_id()==1){ ?>
	<tr class="form-field" >
		<th scope="row"><label for="role"><?php _e('Role'); ?></label></th>
		<td><select name="role" id="role">
			
				<option selected="selected" value="subscriber">Subscriber</option>
				
				<option value="administrator">Administrator</option>			
			</select>
		</td>
	</tr>
<?php } 
elseif(is_super_admin()){
?>
<tr class="form-field" style="display : none" >
		<th scope="row"><label for="role"><?php _e('Role'); ?></label></th>
		<td><select name="role" id="role">
			
				<option selected="selected" value="subscriber">Subscriber</option>
				
				
			</select>
		</td>
	</tr>
	<?php } ?>

<tr>
<td>
</td>
<td>
<?php echo '-'; ?>
</td>
</tr>
<tr>
<td>
</td>
<td>
<?php
/** This action is documented in wp-admin/user-new.php */
do_action( 'user_new_form', 'add-new-user' );
?>
<?php if($update){ ?>
<?php submit_button( __( 'Update User' ), 'primary', 'createuser', true, array( 'id' => 'createusersub' ) ); ?>
<?php } else { ?>
<?php submit_button( __( 'Add New User' ), 'primary', 'createuser', true, array( 'id' => 'createusersub' ) ); ?>
<?php } ?>
</td>
</tr>
</table>
</div>
</form>
<?php } // current_user_can('create_users') ?>
</div>

<?php
include( ABSPATH . '/wp-content/themes/BMH Hosp/footer.php' );
?>