<?php
require( '../../../wp-load.php' );
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
include(  dirname( __FILE__ ).'/header.php' );

global $wpdb;
$images=$wpdb->get_results("select id,album_name from wp_albums");
$bulletin=$wpdb->get_results("SELECT * from wp_bulletin");
?>
<style>


.close{
color : black;
padding : 5px;

}

<style>
 /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}




/* The Close Button */
.modalclose {
    color: grey;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.modalclose:hover,
.modalclose:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    
   
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
	margin-bottom : 10px;
	margin-top	 : 10px;
}

.album{
	position : relative;
	
	margin-top : 20px;
	margin-right : 20px;
	 box-shadow: 10px 10px 5px #888888;
	 border-radius: 10px;
    height: 100px;
    background: #7eb4e9; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#7eb4e9, white); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#7eb4e9, white); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#7eb4e9, white); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#7eb4e9, white); /* Standard syntax (must be last) */
}
.center{
text-align : center;
height : 100%;
width : 100%;
font-weight : bold;
color : black;
padding-top : 40px;
}
</style>
      <!-- Css -->
 <section class="sub-banner newsection">
	    <div class="container">
	        <h2 class="title">Gallery</h2>
			<ul class="breadcrumb">
				<li><a href="<?php echo get_home_url(); ?>">Home</a></li>
				<li>Gallery</li>
			</ul>
		</div>
	</section>
   
    
         <!--Container-->
         <div class="container">
	
            <div class="row">
               <!--Left content-->
				
        	<div class="col-md-3" role="complementary">	
				<aside  id="aside" class="clearfix">

                            <div class="header">
                                
                                <h2 class="title text-center">Gallery</h2>
                                <span class="arrow-down"></span>
                            </div>

                            <div class="widget clearfix">
                                <div class="eventform-con clearfix">
				<?php if ( is_super_admin() ) { ?>
                                <a href="#" id="myBtn" >Create New Album</a>
				<?php } ?>
						
											<div class="fielder-left"></div>
											<h4> <b>Bulletin Board</b> | <a href="<?php echo get_template_directory_uri() ?>/bulletin-add.php" >New Bullets</a></h4>
										<script>
											var i=0;
											var t = [];
											var d = [];
										</script>
											<?php
											$i=0;
											foreach($bulletin as $bullet){
											$i++;
											?>
											<div class="fielder-left"></div>
											<script>
											i=i+1;
											 t[i]= "<?php echo $bullet->title; ?>";
											 d[i]= "<?php echo $bullet->description; ?>";
										
											</script>
											<a href="javascript:modalpopup(t[<?php echo $i; ?>],d[<?php echo $i; ?>]);" ><?php echo $bullet->title; ?></a>
											<?php } ?>
								
                                </div>
                            </div>


                </aside>
             </div> 
               <!--End left content-->
               <!--Right content-->
               <div class="col-md-8 " style="">
                  <!--About Tab-->
               
				   
                  <!--About Tab-->
                  <!--End about tab-->
                  <!--Portfolio Tab-->
                  <section id="portfolio" class="bgWhite ofsInBottom active" style="display: block;">
                     <!--Portfolio -->
                     <div class="portfolio">
                        <!--Main title-->
                       
                        <!--End main title-->
                        <!--Content-->	
                        <div class="content">
                           <!--Block content-->	
                           <div class="block-content ">
                              <!--Works-->
                              <div class="works">
                                
                                 <div class="row">
                                   
                                    <?php foreach($images as $image){ ?>
                                      
                                          <!--Item-->	
                                          <div class="album col-md-3">
										  <?php if(is_super_admin()){ ?>
											<a href="<?php echo get_template_directory_uri().'/wp-delete-album.php?id='.$image->id; ?>" class="close">&times;</a>
											<?php } ?>
											<a href="<?php echo get_template_directory_uri().'/gallery-view.php?id='.$image->id; ?>" >
											<div class="center">
                                          <?php  echo $image->album_name; ?>
										  </div>
										  </a>
                                          </div>
                                          <!--End item-->	
                                      
                                     <?php } ?>
                                         
                                      
                                 </div>
                                
                             
                              <!--End works-->
                              <div class="clearfix"></div>
                           </div>
                           <!--End block content-->
                        </div>
                        <!--End content-->
                      
                     </div>
                     <!--End portfolio-->
                  </div></section>
				  
               </div>
			   
            </div>
         </div>
     

<!-- Trigger/Open The Modal -->
<div id="myModal1" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width:40%; margin-top : 20%">
 
    <div class="modal-header">
      <span class="modalclose1">&times;</span>
      <h2><label id="b_title"></label></h2>
    </div>
	<br/>
    <div class="modal-body ">
	<label id="b_desc"></label>
	
    
		
		</div>
		<br/>
   

  </div>

</div>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width:40%; margin-top : 20%">
  <form action="<?php echo get_template_directory_uri().'/wp-album.php'; ?>" method="post">
    <div class="modal-header">
      <span class="modalclose1">&times;</span>
      <h2>Create New Album</h2>
    </div>
	<br/>
    <div class="modal-body ">
	
     <b>Album Name (required)</b><br />
		<span class="wpcf7-form-control-wrap your-name">
		<input type="text" name="album_name" value="" size="40" class="wpcf7-form-control wpcf7-text" required /></span> 
    </div><br/>
    <div class="modal-footer">
      <h3><button class=" wpcf7-submit" type="submit">Create</button></h3>
    </div>
	</form>
  </div>

</div>
<script>
// Get the modal
var modal1 = document.getElementById('myModal1');
var modal = document.getElementById('myModal');

// Get the button that opens the modal
//var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("modalclose1")[0];
var span = document.getElementsByClassName("modalclose1")[1];

// When the user clicks the button, open the modal 
function modalpopup(title, desc){
	
    modal1.style.display = "block";
	document.getElementById('b_title').innerHTML=title;
	document.getElementById('b_desc').innerHTML=desc;
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
    modal1.style.display = "none";
}
span.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
        modal.style.display = "none";
    }
}

</script>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("modalclose")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
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

</script>


	
<?php include(  dirname( __FILE__ ).'/footer.php' ); ?>