<?php require( '../../../wp-load.php' );
include(  dirname( __FILE__ ).'/header.php' );
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
global $wpdb;
$discussion_id=$_GET['discussionId'];
$thread_details=$wpdb->get_results("SELECT * from wp_discussion_comments where discussion_id='".$discussion_id."'");
$threads=$wpdb->get_row("SELECT * from wp_discussion where id='".$discussion_id."'");

?>
<style>
.blog .event-container {
margin-bottom : 5px;
padding-bottom : 5px;
}
.wpcf7-submit{
align : left;
}
.pix-row{
padding-top : 1px;
padding-bottom : 1px;
}
.custom-height{
height : 100px;
}
.customleft{
padding-left : 0px; !important
}
.text-blue{
color: #0f0f0f;
}
.text-comment{
color: #c0c0c0;
}
.imageClass{
margin-top : 10%;
border-radius: 50%;
}

   
   .close{
   margin-right : 5px;
   margin-top : 0px;
   }

</style>
      <!-- HEADER -->  

    <section class="sub-banner newsection">
	    <div class="container">
	        <h2 class="title">Forum</h2><ul class="breadcrumb"><li><a href="<?php echo get_home_url(); ?>">Home</a></li><li>Discussion</li></ul></div>
	</section>
	
    <section class="events newsection">
 
	    <div class="container">
<h2 class="text-left"> <?php echo stripslashes($threads->title); ?>/ <a href="<?php echo get_template_directory_uri(); ?>/discussion-add.php?fid=<?php echo $discussion_id ?>" style="margin-right: 10px;">Edit</a></h2>	<br/>
					<p class="text-left"><?php echo stripslashes($threads->description); ?></p>
					<br/>
					<br/>
					<br/>
			<div class="row">

                                     
				<div id="main" class="blog col-md-12" role="main">
					<?php 
					if($thread_details){
					foreach($thread_details as $thread){ ?>
						<article id="post-615" class="event-container clearfix post-615 post type-post status-publish format-standard has-post-thumbnail hentry category-meeting category-thoughts" role="article">
						
						 <?php if((is_super_admin())||($threads->author==get_current_user_id())||($thread->author==get_current_user_id())){ ?>
					
						<a href="<?php  echo bloginfo('template_directory'); ?>/delete/delete_comments.php?id=<?php echo $thread->id; ?>&discussionId=<?php echo $thread->discussion_id; ?>" class="close">x</a>
					<?php
					}
					?>
   
   <div class="event clearfix bg">
     <div class="col-md-2">
	<img src="<?php echo $wpdb->get_var("select p.pro_image from wp_profile_photo p INNER JOIN wp_users u ON u.user_login=p.uname AND u.id='".$thread->comment_author."'") ?>" width=50% class="imageClass"> </img>
	  </div>
        <div class="entry-content cf event-content col-md-9">
        <p class="text-blue"> <u> <b> <?php echo $wpdb->get_var("select p.name from wp_profile_photo p INNER JOIN wp_users u ON u.user_login=p.uname AND u.id='".$thread->comment_author."'")  ?></b> </u></p>
           <p class="text-comment"><b><?php echo $thread->discussion_comment; ?></b></p> 
		   <p><?php 
		   $date1=date("F j, Y, g:i a",strtotime($thread->comment_date));
		   
		   $comment_date=new DateTime($date1);
		   echo $date1;
		   //date_default_timezone_set('Asia/Kolkata');
		  // $date2=date("F j, Y, g:i a");
		 //  $today = new DateTime('now');
		//   $diff=date_diff($today,$comment_date);
		//   echo $diff->format('posted %d days %h hours %i minutes ago');
		   ?>
                  </div>
 

    </div> 
</article>
	<?php } 
	}
	else
	{
	?>
	 <div class="col-md-9">
          
         <h3 class="title">No Comments</h3>
                  </div>
	 
	<?php
	}
	?>	
				
		
			
		<section id="post-75" class="clearfix post-75 page type-page status-publish hentry">

			<section itemprop="articleBody">
				<div class=" pix-row ">
				<div class="bg-pos-rel"><div class="pix-con clearfix">
		<div class="pix-container">
		
		
	<div class="vc_col-sm-9 customleft">
		<div class="wpb_wrapper">
			<div  >
<div class="screen-reader-response"></div>
<form name="" action="wp-comment-register.php" method="post" class="wpcf7-form" novalidate="novalidate">

	<input type="hidden" value="<?php echo $discussion_id; ?>" name="discussion_id">
   <textarea name="discussion_comment" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea custom-height" aria-invalid="false" required></textarea>
<p class="text-left"><input type="submit" value="Add Comment" class="wpcf7-submit align-left" /></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>
		</div> 
	</div> 



	</div></div></div></div>
			</section>

		</section>
				
					
						
					
						<nav class="pagination">
</nav>
					

				</div>

				
			</div>

		</div>
    </section>

		
<?php include(  dirname( __FILE__ ).'/footer.php' );
 ?>