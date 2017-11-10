<?php require_once('../../../wp-blog-header.php'); 
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
include 'header.php';
?>	



<section class="sub-banner newsection">
	    <div class="container">
	        <h2 class="title"><?php echo get_the_title( $postId ); ?></h2><ul class="breadcrumb" itemprop="breadcrumb"><li><a href="#">Home</a> </li><li> <span class="current" ><?php echo get_the_title( $postId ); ?></span></li></div></div>
	</section>
	<div class="container newsection">
        <div class="row">

        	<div class="col-md-3" role="complementary"><aside  id="aside" class="clearfix no-border-bottom">

                            <div class="header">
                                
                                <h2 class="title text-center">Contact</h2>
                                <span class="arrow-down"></span>
                            </div>

                            <div class="widget clearfix">
                                <div class="eventform-con clearfix">

                                
										<h4> <b>CMC - Batch Twenty Seven</b></h4>
										<div class="fielder-left"></div>
										<br/>Near Calicut Medical College,<br/>
										Calicut Medical College PO,<br/>
										Calicut - 7
										<div class="fielder-left"></div>
										Phone : 
											<div class="fielder-left"></div>
										Whatsapp : 
											<div class="fielder-left"></div>
										email : 
											<div class="fielder-left"></div>
										website : <br/>
								
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
			</div>    
			 <div class="col-md-9">

				<!--div class="event-info"><p>This Event has been already started.</p></div-->
				<section class="event-detail newsection">
				<?php if(is_user_logged_in()) {?>
				<h2> Are you sure you want to<?php if(trim($_POST['register']) == "Register Online"){ ?> register <?php } else { ?> Unregister <?php } ?> for this event?</h2>
				<br/>
				<form action="wp-event-register.php" method="post">
				<input type="hidden" value="<?php echo $_POST['event_id']; ?>" name="event_id">
				<input type="hidden" value="<?php echo get_current_user_id(); ?>" name="user_id">
				<input type="hidden" value="<?php echo trim($_POST['register']); ?>" name="registerStatus">
			
				
					 <input type="submit" name="register" value="YES" class="clearfix btn btn-solid btn-blue btn-md post-10" />
					<a href="<?php echo get_home_url(); ?>"><input type="button" name="reset" value="NO" class="clearfix btn btn-solid btn-blue btn-md post-10"></a>
				</form>
			<?php }
			else {
			?>
			<h3> Please<a href="<?php echo get_home_url(); ?>/wp-login2.php"> Login </a> to Continue </h3>
			<?php } ?>
			</section>
</div>
</div>
</div>


<?php 
include 'footer.php';
?>