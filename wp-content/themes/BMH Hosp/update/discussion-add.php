<?php
/**
 * WordPress User Page
 *
 * Handles authentication, registering, resetting passwords, forgot password,
 * and other user handling.
 *
 * @package WordPress
 */

/** Make sure that the WordPress bootstrap has run before continuing. */
require( '../../../wp-load.php' );

 if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
  

include(  dirname( __FILE__ ).'/header.php' );
global $wpdb;
  $bulletin=$wpdb->get_results("SELECT * from wp_bulletin");
  
  if(isset($_GET['fid']))
	$forum_id=$_GET['fid'];
	
	$forum=$wpdb->get_row("SELECT * from wp_discussion WHERE id='".$forum_id."'");
	
	?>

 
		    <!-- HEADER -->
		<section id="post-75" class="clearfix post-75 page type-page status-publish hentry">

			<section itemprop="articleBody">
				<div class="wpb_row pix-row vc_row-fluid vc_custom_1425896317124 light normal">
				<div class="bg-pos-rel"><div class="pix-con clearfix">
		<div class="pix-container">
		<div class="vc_col-sm-3">
			<aside  id="aside" class="clearfix">

                                <div class="header">
                                
                                <h4 class=" text-center">Bulletin Board | <a href="<?php echo get_template_directory_uri() ?>/bulletin-add.php" >New Bullets</a></h4>
                                <span class="arrow-down"></span>
                            </div>

                            <div class="widget clearfix">
                                <div class="eventform-con clearfix">
								
					
											
											
				
										<script>
											var i=0;
											
											var t = [];
											var d = [];
											var id = [];
											
										</script>
											<?php
											$i=0;
											foreach($bulletin as $bullet){
											
											?>
											
											<div class="fielder-left"></div>
											<input type="hidden" class="tit" value="<?php echo $bullet->title; ?>">
											<input type="hidden" class="description" value="<?php echo $bullet->description; ?>">
											<input type="hidden" class="bid" value="<?php echo $bullet->id; ?>">
											<script>
											 t[i] = document.getElementsByClassName('tit')[i].value;
											 d[i] = document.getElementsByClassName('description')[i].value;
											 id[i] = document.getElementsByClassName('bid')[i].value;
											i=i+1;
											
											</script>
											
											<a href="javascript:modalpopup(t[<?php echo $i; ?>],d[<?php echo $i; ?>],id[<?php echo $i; ?>]);" ><?php echo $bullet->title; ?></a>  <?php if((is_super_admin())||($bullet->author==get_current_user_id())){ ?><a href="<?php echo get_template_directory_uri() ?>/bulletin-delete.php?id=<?php echo $bullet->id; ?>" class="float-right">&times;</a><?php } ?>
											<?php $i=$i+1;
											} ?>
											
									
					
									
								
                               
                                </div>
                            </div>


                </aside>
		</div>
	<div class="vc_col-sm-6 wpb_column vc_column_container ">
		<div class="wpb_wrapper">
			<div class="spacer" style="height: 30px"></div>
			

<form action="wp-discussion-register.php" method="post">

<p>
<p>Topic<br />
    <input type="text" name="discussion_title" value="<?php echo trim($forum->title); ?>" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"  required /> </p>
<p>Description<br />
    <textarea name="discussion_details" cols="40" rows="6" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false">
	<?php echo stripslashes(trim($forum->description)); ?>
	</textarea> </p>
	<input type="hidden" value="<?php echo $forum->id;  ?>" name="id">
<p>
 <?php if($forum_id){ ?>
	<input type="submit" value="Update Topic" name="wp-submit" class="wpcf7-submit" /></p>

 <?php } else { ?>
<input type="submit" value="Add Topic" name="wp-submit" class="wpcf7-submit" /></p>
<?php } ?>
</form>
		</div> 
	</div> 



	</div></div></div></div>
			</section>

		</section>
 <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width:40%; margin-top : 20%">
 
    <div class="modal-header">
      <span class="modalclose1">&times;</span>
      <h2><label id="b_title"></label></h2>
    </div>
	<br/>
    <div class="modal-body ">
	<label id="b_desc"></label>
	<input type="hidden" name="bid" id="b_id">
	
  
		
		</div>
		<br/>
		<div class="row">
		<div class="col-md-9">
		</div>
			<div class="col-md-2">
					<?php if((is_super_admin())||($bullet->author==get_current_user_id())){ ?>
				<button class="wpcf7-submit" onclick="javascript:edit();" >Edit</button>
			<?php } ?>
			</div>
		</div>
<br/>
</div>
</div>

		 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
//var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("modalclose1")[0];

// When the user clicks the button, open the modal 
function modalpopup(title, desc, id){
	
    modal.style.display = "block";

	document.getElementById('b_title').innerHTML=title;
	document.getElementById('b_desc').innerHTML=desc;
	document.getElementById('b_id').value=id;
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function edit(){
	location.href="<?php echo get_template_directory_uri() ?>"+"/bulletin-add.php?id="+document.getElementById('b_id').value;
}
</script>	
<?php include(  dirname( __FILE__ ).'/footer.php' ); ?>