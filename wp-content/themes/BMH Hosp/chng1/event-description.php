<?php require_once('../../../wp-blog-header.php'); 
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
?>	

 <?php $postId = $_GET['p']; 
$currentPost=get_post($postId);
global $wpdb;
$registered = $wpdb->get_row("select * from wp_event_register where user_id='".get_current_user_id()."' and event_id='".$postId."'");
$registeredUsers = $wpdb->get_results("select * from wp_event_register where event_id='".$postId."'");
$contact_row = $wpdb->get_row('select contact_details, contact_num from wp_contact where event_id = '.$postId); 
?>
<?php include 'header.php'?>
      <!-- HEADER -->  
	  <style>
	  h3{
	  font-weight : bold; !important
	  }
	  h4{
	  font-weight : bold; !important
	  }
	  .main-title{
	  padding : 0px; !important
	  }
	  .content{
		padding : 0px; !important
		}
		.margin{
			position : relative;
			margin-left : 10px;
		}
	  </style>
	 
		<link href="<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/wp-content/themes/event/library/css/bootstrap-modal.css" rel="stylesheet" />
<section class="sub-banner newsection">
	    <div class="container">
	        <h2 class="title"><?php echo get_the_title( $postId ); ?></h2><ul class="breadcrumb" itemprop="breadcrumb"><li><a href="<?php echo get_home_url(); ?>">Home</a> </li><li> <span class="current" ><?php echo get_the_title( $postId ); ?></span></li></div></div>
	</section>
	<div class="container newsection">
        <div class="row">

        	<div class="col-md-3" role="complementary">	<aside  id="aside" class="clearfix no-border-bottom">

                            <div class="header">
                                
                                <h2 class="title text-center">Contact</h2>
                                <span class="arrow-down"></span>
                            </div>

                            <div class="widget clearfix">
                                <div class="eventform-con clearfix">

                                
										<h4> <b><?php echo get_the_title( $postId ); ?></b></h4>
										<div class="fielder-left"></div>
									<?php echo $contact_row->contact_details."\n";?>
										<div class="fielder-left"></div>
										Phone : <?php echo $contact_row->contact_num;	?>
											
								
                                </div>
                            </div>


                </aside>
					 <div id="aside" class="sidebar style1">
                  <div class="wpb_wrapper">
			<!--div class="pix-map"><div class="map_api" id="map_canvas_804" style="width:100%; height:300px"></div></div-->
			
			<!--google map based on location -->
			
			
			 <div id="map" style="width:100%; height:300px"></div>
			 <input type="hidden" value="<?php echo $contact_row->contact_details; ?>" id="address" >
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: 11.2685374, lng: 75.781028}
        });
        var geocoder = new google.maps.Geocoder();

        
          geocodeAddress(geocoder, map);
      
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
           // alert('Geocode was not successful for the following reason: ' + status);
        
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu9iCjZe70hoP_CNAfS40JroUDsU9FgRM&callback=initMap">
    </script>
			
			<!--end google map based on location -->
			
			
			
			
			
			
			
			<!--script src="http://maps.googleapis.com/maps/api/js?key=&amp;sensor=false" type="text/javascript"></script>
			<script type="text/javascript">
   		 	function initialize804() {
	   			var myLatlng = new google.maps.LatLng(11.2685374,75.781028);
	   			var styles = [
	   			    {
	   			      stylers: [
	   			        { hue: "" },
	   			        { saturation: -20 }
	   			      ]
	   			    },{
	   			      featureType: "road",
	   			      elementType: "geometry",
	   			      stylers: [
	   			        { lightness: 100 },
	   			        { visibility: "simplified" }
	   			      ]
	   			    },{
	   			      featureType: "road",
	   			      elementType: "labels",
	   			      stylers: [
	   			        { visibility: "off" }
	   			      ]
	   			    }
	   			  ];  
	   			  
	   			var mapOptions = {
	   				center: myLatlng,
	   				zoom: 13,
	   				panControl: true,
	   				zoomControl: true,
	   				mapTypeControl: true,
	   				scaleControl: true,
	   				streetViewControl: true,
	   				overviewMapControl: true,
	   				mapTypeId: google.maps.MapTypeId.ROADMAP,
	   				styles: styles
	   			};
	   			var map = new google.maps.Map(document.getElementById("map_canvas_804"),
	   				mapOptions);
				var marker = new google.maps.Marker({
					position: myLatlng
				});

				marker.setMap(map);        
			}
			
			initialize804();

   		</script-->
		</div> 
                    
                  
    
                </div>	
			</div>            <!-- col-md-9 -->
            <div class="col-md-9">

				<!--div class="event-info"><p>This Event has been already started.</p></div-->
				<section class="event-detail newsection">
                    		<h2 class="main-title"><?php echo get_the_title( $postId ); ?></h2>
								<!--ul class="meta clearfix">
									<li class="date"><i class="icon fa fa-calendar"></i> 22 Dec 2016 to 28 Jan 2017</li>
									<li><i class="icon fa fa-home"></i> Auckland Bay City</li>
									<li><i class="icon fa fa-map-marker"></i> New York / United States</li>
								</ul-->
								<div class="eventsimg">
									<img src="<?php echo get_the_guid() ?>" alt="">
								</div><div class="sep event-detail-sep"></div>
							<h3 class="">Whats About</h3>
							<p><?php $content_post = get_post($postId);
								$content = $content_post->post_content;
								$content = apply_filters('the_content', $content);
								$content = str_replace(']]>', ']]&gt;', $content);
								echo stripslashes($content); ?>


<p><br/>
							<h4 >Venue Details</h4>
							<p>
							<?php 
							echo $contact_row->contact_details."\n";?>
							<br/>
							<?php
							echo $contact_row->contact_num;
							?>
							
							<br/>
							<p>
							<?php if(is_super_admin()){ ?>
								<a href="<?php echo get_template_directory_uri(); ?>/delete/delete_event.php?id=<?php echo $postId; ?>"> <input type="button" name="delete_event" value="Delete" class="clearfix btn btn-solid btn-blue btn-md post-10"  ></a>
								<a href="<?php echo get_template_directory_uri(); ?>/event-new.php?id=<?php echo $postId; ?>"> <input type="button" name="edit_event" value="Edit" class="clearfix btn btn-solid btn-blue btn-md post-10"  ></a>
								<a href="<?php echo get_template_directory_uri(); ?>/wp-hpevent.php?postId=<?php echo $postId; ?>"> <input type="button" name="edit_event" value="Make Home Page Event" class="clearfix btn btn-solid btn-blue btn-md post-10" ></a>
							
							<?php } ?>
							
							<form action="event-confirm.php" method="post">
								<input type="hidden" value="<?php echo $postId; ?>" name="event_id">
								<input type="hidden" value="<?php echo get_current_user_id(); ?>" name="user_id">
								<input type="submit" name="register" value="<?php if(!$registered) { ?>Register Online <?php } else { ?> Unregister <?php } ?>" class="clearfix btn btn-solid btn-blue btn-md post-10"  data-toggle="modal" href="#responsive"/>
								<a href="<?php echo get_home_url(); ?>/wp-content/uploads/2017/test.doc" download="register"><input type="button" name="download" value="Download Form" class="clearfix btn btn-solid btn-blue btn-md post-10" /></a>
							</form>
							
							</p>
						
							
							
					<div class="social-icon">
						<a href="#" target="_blank" class="facebook fa fa-facebook"></a>
						<a href="#" target="_blank" class="twitter fa fa-twitter"></a>
						<a href="#" target="_blank" class="googleplus fa fa-google-plus"></a>
					</div></section>
					  <?php if(is_super_admin()){ ?>
					<section class="event-detail newsection">
					
						<h2>Registered Users</h2><br/>
						<?php echo count($registeredUsers); ?> user(s) registered for this event
							<div class="fielder-left"></div>
							<?php foreach($registeredUsers as $regUser) { 
							$user = $wpdb->get_row("select * from wp_profile_photo p INNER JOIN wp_users u ON p.uname=u.user_login AND u.id='".$regUser->user_id."'");
			
							?>
							
						<article id="post-615" class="event-container clearfix post-615 post type-post status-publish format-standard has-post-thumbnail hentry category-meeting category-thoughts" role="article">

						<div class="clearfix bg">
							<div class="eventsimg col-md-3"><img src="<?php echo $user->pro_image;?>" alt="" width="100" height="100" class="img-circle"></div>
							<div class="entry-content cf event-content">
							   <h2 class="title"><a href="<?php bloginfo('template_directory');?>/personal-profile.php?uname=<?php echo $user->uname; ?>" title = "<?php echo $user->uname; ?>"><?php if($user->name){ echo $user->name; } else {  echo $user->uname;} ?></a>/  <small> <?php echo $user->job_title ?></small></h2>
							 &#x1f4f1;<?php echo $user->phone;  echo $regUser->user_id; ?>	<span class="margin"><i class="fa fa-whatsapp" aria-hidden="true"><?php echo $user->whatsapp; ?></i></span>
									  </div>
									
									  <a href="<?php echo get_template_directory_uri(); ?>/unregister.php?uname=<?php echo $user->uname; ?>&pid=<?php echo $postId; ?>">Delete</a>
									
						</div> 
					</article>
					<?php } ?>
					</section>
						<?php } ?>
			</div>

			
		</div>
	</div>
	

	
  
<?php include 'footer.php'?>