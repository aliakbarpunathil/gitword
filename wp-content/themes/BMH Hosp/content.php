<?php require( '../../../wp-load.php' ); 
include(  dirname( __FILE__ ).'/header.php' );
global $wpdb;
$bulletin=$wpdb->get_results("SELECT * from wp_bulletin");
?>


      <!-- HEADER -->  
<style>
.content{
padding : 0px; !important
}
</style>
<section class="sub-banner newsection">
	    <div class="container">
	        <h2 class="title">Events</h2><ul class="breadcrumb" itemprop="breadcrumb"><li><a href="<?php echo get_home_url(); ?>">Home</a> </li><li><span class="current" >Events</span></li></div></div>
	</section>

	<section class="events  newsection">
 
		<div class="container">

			<div class="row">

				
				<div class="col-md-3" role="complementary">
				<aside  id="aside" class="clearfix">

                            <div class="header">
                                
                                <h2 class="title text-center">Events</h2>
                                <span class="arrow-down"></span>
                            </div>

                            <div class="widget clearfix">
                                <div class="eventform-con clearfix">
				<?php if ( is_super_admin() ) { ?>
                                <a href="<?php echo get_template_directory_uri(); ?>/event-new.php">Add New Event</a>
				<?php } ?>
				<?php if(is_user_logged_in()) { ?>
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
								<?php } ?>
                                </div>
                            </div>


                </aside></div>				
						<div class="col-md-9">

					<div class="fielder-left eventform-con  clearfix">

                        <form id="sort_form">

                            <input name="page_id" type="hidden" value="44">

                            <div class="form-input">
                                <div class="styled-select"><select name="sort_by" class="sortSubmit">
                                        <option value="0">Sort by: Default Sorting</option>
                                        <option value="event_title" >Event Title</option>
                                        <option value="event_date" >Event Date</option><option value="event_price" >Event Price</option></select>
                                </div>
                            </div>

                            <div class="form-input sort_method_con arrow-up-down">
                                <input name="sort_method" type="hidden" value="asc">
                                <a class="sort_method btn btn-solid btn-blue btn-md"><i class="fa fa-arrow-up"></i></a>
                            </div>

                            <div class="form-input">
                                <div class="styled-select">
                                    <select name="no_of_events" class="sortSubmit">
                                        <option value="10" selected>Show: 10 items / page</option>
                                        <option value="15" >Show: 15 items / page</option>
                                        <option value="20" >Show: 20 items / page</option>
                                    </select>
                                </div>
                            </div>

                            <noscript>

                                <div class="form-input arrow-up-down" id="event_sort_con">
                                    <button name="event_sort" value="1" type="submit" class="btn btn-md btn-pri">Sort</button>
                                </div>

                            </noscript>

                            <!-- Event Filter -->
                            <ul class="event-filter" id="sort_style_con">
                                <input name="sort_style" type="hidden" value="grid">



                                <li class="sort_style filter stylelist "><i class=" fa fa-th-list"></i></li>
                                <li class="sort_style filter stylegrid active"><i class=" fa fa-th"></i></li>
                            </ul>
                        </form>
                        
                    </div> 				
						

					<div class="grid-list event-container clearfix  itemgrid">
           				<div class="row">  
		           			

<?php
$j=0;
$args = array(
'post_type'=> 'post',
);

query_posts( $args );
 if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>


	
	<article id="post-10" class="event-container event-border col-md-4 clearfix post-10 pix_event type-pix_event status-publish has-post-thumbnail hentry pix_listings-business pix_listings-listing pix_listings-meeting" role="article">


    <div class="event clearfix bg" style="height:500px;">
<?php
//$attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image') );
?>
<div class="eventsimg">
<?php
$j++;
//foreach($attachments as $attach){
?>
        <img src="<?php echo get_the_guid(); ?>" alt=""  height="250" width="100%"/>
		<?php 
		
	//	}  
		?>
		</div>
		

        <div class="entry-content cf event-content">
           <h2 class="title"><a href="<?php if(is_user_logged_in()){ bloginfo('template_directory');?>/event-description.php?p=<?php the_ID(); } else { ?># <?php } ?>" title = "<?php the_title(); ?>"><?php the_title(); ?></a></h2>

           
            <p><?php $excerpt=stripslashes(the_excerpt());
			echo $excerpt; ?>...</p>  
			
<?php
if(is_user_logged_in()){
?>
             <a href="<?php bloginfo('template_directory');?>/event-description.php?p=<?php the_ID(); ?>" class="clearfix btn btn-solid btn-blue btn-md">Read More</a>
<?php } 
else{
?>
Please <a href="<?php echo get_home_url(); ?>/wp-login.php">login</a> to continue
<?php } ?>
        </div>
		
        <!--div class="three links clearfix">
                    <ul><li><a class="st_sharethis_large" displayText="ShareThis"><i class="icon fa fa-share"></i> Share</a></li><li><a href="#void" class="portfolio-icon pix-like-me " data-id="10"><i class="icon fa fa-heart"></i><span class="like-count">58</span></a></li><li><i class="icon fa fa-comment"></i>0</li></ul> 
                </div-->

    </div> 
</article>
<?php 
//if($j>5)
//	break;
endwhile; /* rewind or continue if all posts have been fetched */ ?>
   
<?php else : ?>
<?php endif; ?>
	
 	</div>

	</div>


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
<?php include 'footer.php'?>