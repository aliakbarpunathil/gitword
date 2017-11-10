<?php require( '../../../wp-load.php' );
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
   include(  dirname( __FILE__ ).'/header.php' );
   global $wpdb;
   $threads=$wpdb->get_results("SELECT * from wp_discussion");
  $bulletin=$wpdb->get_results("SELECT * from wp_bulletin");
   ?>
   <style>
   
   .close{
   margin-right : 5px;
   margin-top : 0px;
   }
   .text-black{
   color : black;
   }
   </style>
<!-- HEADER -->  
<section class="sub-banner newsection">
   <div class="container">
      <h2 class="title">Forum</h2>
      <ul class="breadcrumb">
         <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
         <li>Discussion</li>
      </ul>
   </div>
</section>
<section class="events ">
   <div class="container">
      <div class="row">
	  	<div class="col-md-3" >	
				<aside  id="aside" class="clearfix ">

                            <div class="header">
                                
                                <h2 class="title text-center">FORUM</h2>
                                <span class="arrow-down"></span>
                            </div>

                            <div class="widget clearfix">
                                <div class="eventform-con clearfix">
				<?php if ( is_user_logged_in() ) { ?>
                                <a href="<?php echo get_template_directory_uri(); ?>/discussion-add.php">Add New Topic</a>
				<?php } ?>
						<div class="">
											<div class="fielder-left"></div>
											<h4> <b>Bulletin Board</b> | <a href="<?php echo get_template_directory_uri() ?>/bulletin-add.php" >New Bullets</a></h4>
										<script>
											var i=0;
											
											var t = [];
											var d = [];
											var id = [];
											var uname = [];
											
										</script>
											<?php
											$i=0;
											foreach($bulletin as $bullet){
											
											?>
											
											<div class="fielder-left"></div>
											<input type="hidden" class="tit" value="<?php echo $bullet->title; ?>">
											<input type="hidden" class="description" value="<?php echo $bullet->description; ?>">
											<input type="hidden" class="bid" value="<?php echo $bullet->id; ?>">
											<input type="hidden" class="unm" value="<?php echo $wpdb->get_var("select p.name from wp_profile_photo p JOIN wp_users u ON p.uname=u.user_login WHERE u.id='".$bullet->author."'"); ?>">
											<script>
											 t[i] = document.getElementsByClassName('tit')[i].value;
											 d[i] = document.getElementsByClassName('description')[i].value;
											 id[i] = document.getElementsByClassName('bid')[i].value;
											 uname[i] = document.getElementsByClassName('unm')[i].value;
											i=i+1;
											
											</script>
											
											<a href="javascript:modalpopup(t[<?php echo $i; ?>],d[<?php echo $i; ?>],id[<?php echo $i; ?>],uname[<?php echo $i; ?>]);" ><?php echo $bullet->title; ?></a>  <?php if((is_super_admin())||($bullet->author==get_current_user_id())){ ?><a href="<?php echo get_template_directory_uri() ?>/bulletin-delete.php?id=<?php echo $bullet->id; ?>" class="float-right">&times;</a><?php } ?>
											<?php $i=$i+1;
											} ?>
											
									
								
                                </div>
                                </div>
                            </div>


                </aside>
                   </div>   
         <div id="main" class="blog col-md-8" role="main">
		 <?php if($threads){
					foreach($threads as $thread){
					?>
            <article id="post-615" class="event-container clearfix post-615 post type-post status-publish format-standard has-post-thumbnail hentry category-meeting category-thoughts" role="article">
               <div class="event clearfix bg">
			    <?php if((is_super_admin())||($threads->author==get_current_user_id())||($thread->author==get_current_user_id())){ ?>
			   <a href="<?php  echo bloginfo('template_directory'); ?>/delete/delete_thread.php?discussionId=<?php echo $thread->id; ?>" class="close">x</a>
				<?php } ?>
				<?php $u_details = $wpdb->get_row("select p.pro_image,p.uname,p.name from wp_profile_photo p JOIN wp_users u ON p.uname=u.user_login WHERE u.id='".$thread->author."'"); ?>
				<div class="col-md-2" style="padding-left:0px;">
					<img src="<?php echo $u_details->pro_image ?>" width="100%"/>
				</div>
				<a href ="<?php echo bloginfo('template_directory'); ?>/personal-profile.php?uname=<?php echo $u_details->uname; ?>" title = "<?php echo $u_details->uname; ?>" style="float : left;"><u><?php if($u_details->name) { echo $u_details->name; } else { echo $u_details->uname; } ?> </u></a>
				<a href="<?php echo bloginfo('template_directory'); ?>/discussion-single.php?discussionId=<?php echo $thread->id; ?>" title = " <?php echo $thread->title; ?> ">
                  <div class="entry-content cf event-content col-md-10">
                     <h2 class="title">
						<?php echo stripslashes($thread->title); ?></h2>
                     <p><b class="text-black"><?php echo stripslashes($thread->description); ?></b></p>
					 <p style="float:right; font-size : 20px; font-weight : bold;"><a href="<?php echo bloginfo('template_directory'); ?>/discussion-single.php?discussionId=<?php echo $thread->id; ?>" title = " <?php echo $thread->title; ?> "><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $wpdb->get_var("SELECT COUNT(*) from wp_discussion_comments where discussion_id='".$thread->id."'"); ?> comments</a></p>
                  </div>
				  </a>
               </div>
            </article>
			<?php } 
			}
			else {
			?>
			  <h2 class="title">No Active Discussions</h2>
			<?php } ?>
			 
            <nav class="pagination"></nav>
         </div>
      </div>
   </div>
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
function modalpopup(title, desc, id, uname){
	
    modal.style.display = "block";

	document.getElementById('b_title').innerHTML=title;
	document.getElementById('b_desc').innerHTML=desc+"<br/> -"+uname;
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