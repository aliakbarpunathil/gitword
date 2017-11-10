<?php 
require( '../../../wp-load.php' );

include(  dirname( __FILE__ ).'/header.php' );
 ?>
    <!-- HEADER -->
      <!-- HEADER -->  <section class="sub-banner newsection">
	    <div class="container">
	        <h2 class="title">Contact</h2><ul class="breadcrumb" itemprop="breadcrumb"><li><a href="#">Home</a> </li><li><span class="current" >Contact</span></li></div></div>
	</section>
		
		<section id="post-75" class="clearfix post-75 page type-page status-publish hentry">

			<section >
				<div class=""><div class="bg-pos-rel"><div class="pix-con clearfix">
		<div class="pix-container">
	<div class="vc_col-sm-6 wpb_column vc_column_container ">
		<div class="wpb_wrapper">
			<h2 class="main-title title   size-md" style="font-weight: 300; ">Get in Touch with Us</h2><div class="spacer" style="height: 30px"></div>

<form name="" action="<?php if(is_user_logged_in()){ echo get_template_directory_uri(); ?>/wp-contact.php <?php } else { echo "#"; } ?>" method="post" >

<p>Your Name (required)<br />
   <input type="text" name="your-name" value="" size="40" class=" wpcf7-text "   required /> </p>
<p>Your Email (required)<br />
   <input type="email" name="your-email" value="" size="40" class=" wpcf7-text " required /></p>
<p>Subject<br />
    <input type="text" name="your-subject" value="" size="40" class=" wpcf7-text" required /> </p>
<p>Your Message<br />
  <textarea name="your-message" cols="40" rows="10" class=" wpcf7-textarea"></textarea> </p>
<p><input type="submit" value="Send" class=" wpcf7-submit" /></p>
</form>
		</div> 
	</div> 

	<div class="vc_col-sm-6 wpb_column vc_column_container ">
		<div class="wpb_wrapper">
			<div class="pix-map"><div class="map_api" id="map_canvas_804" style="width:100%; height:300px"></div><div class="map-contact"><div class="contact-wrap"><div class="address-wrap"><p class="address">Please Contact us at :<br />
<br />
cmcbatch27@gmail.com</p></div></div></div></div><script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDu9iCjZe70hoP_CNAfS40JroUDsU9FgRM&callback=initMap" type="text/javascript"></script><script type="text/javascript">
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

   		</script>
		</div> 
	</div> 

	</div></div></div></div>
			</section>

		</section>

	<?php include 'footer.php' ?>