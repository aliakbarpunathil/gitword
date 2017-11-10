<?php require( '../../../wp-load.php' );

if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
	
include(  dirname( __FILE__ ).'/header.php' );
global $wpdb;
$user_details=$wpdb->get_results("SELECT * from wp_profile_photo");
$bulletin=$wpdb->get_results("SELECT * from wp_bulletin");
?>

      <!-- HEADER -->  

    <section class="sub-banner newsection">
	    <div class="container">
	        <h2 class="title">Doctors List</h2>
			<ul class="breadcrumb">
				<li><a href="<?php echo get_home_url(); ?>">Home</a></li>
				<li>List</li>
			</ul>
		</div>
	</section>
   
 
	    <div class="container">

			<div class="row">
   

        	<div class="col-md-3" role="complementary">	
				<aside  id="aside" class="clearfix ">

                            <div class="header">
                                
                                <h2 class="title text-center">Members</h2>
                                <span class="arrow-down"></span>
                            </div>

                            <div class="widget clearfix">
                                <div class="eventform-con clearfix">
				<?php if ( is_super_admin() ) { ?>
                                <a href="<?php echo get_template_directory_uri(); ?>/user-new1.php">Add New Member</a>
				<?php } ?>
						
								<div class="">
											<div class="fielder-left"></div>
											<h4> <b>Bulletin Board</b> | <a href="<?php echo get_template_directory_uri() ?>/bulletin-add.php" >New Bullets</a></h4>
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
                            </div>


                </aside>
             </div>                  
				<div id="main" class="blog col-md-8" role="main">
					<?php 
					foreach($user_details as $user){ 
					 if(!($user->uname=="Ontash")){
					?>
					
						<article id="post-615" class="event-container clearfix post-615 post type-post status-publish format-standard has-post-thumbnail hentry category-meeting category-thoughts" role="article">

    <div class="event clearfix bg">
        <div class="eventsimg"><img src="<?php echo $user->pro_image;?>" alt="" width="100" height="100"></div>
        <div class="entry-content cf event-content">
           <h2 class="title"><a href="<?php bloginfo('template_directory');?>/personal-profile.php?uname=<?php echo $user->uname; ?>" title = "<?php echo $user->uname; ?>"><?php if($user->name) { echo $user->name; } else { echo $user->uname; } ?></a></h2>
           <p><b><?php echo $user->job_title ?></b></p> 
                  </div>
				  <?php 
				  
				  if(is_super_admin()){ 
				 
				  ?>
				  <a href="<?php echo get_template_directory_uri(); ?>/delete/delete_user.php?uname=<?php echo $user->uname; ?>"<button class="">Delete</button> | 	
				  <a href="<?php echo get_template_directory_uri(); ?>/user-new1.php?uname=<?php echo $user->uname; ?>"<button class="">Edit</button></a>
					<?php } ?>
    </div> 
</article>
		<?php }}?>			
						
					
						
					
					

				</div>

				
			</div>

		</div>
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
<?php include(  dirname( __FILE__ ).'/footer.php' );
?>