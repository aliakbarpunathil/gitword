<?php
require( '../../../wp-load.php' );
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
include(  dirname( __FILE__ ).'/header.php' );
$results = $wpdb->get_results( 'SELECT * FROM wp_obituary');
  $bulletin=$wpdb->get_results("SELECT * from wp_bulletin");
?>
<style>
.obituary-add{
margin-bottom : 10px;
}
.text-50{
width : 49%;
}
.pix-row{
padding-top : 0px !important;
}
</style>
    <!-- HEADER -->
    <section class="sub-banner newsection">
        <div class="container">
            <h2 class="title">Obituary</h2>
            <ul class="breadcrumb" itemprop="breadcrumb">
                <li><a href="#">Home</a> </li>
                <li><span class="current">Obituary</span></li>
        </div>
        </div>
    </section>


        <section >      
			
            <div class="wpb_row pix-row vc_row-fluid vc_custom_1423473403130 light normal">
                <div class="bg-pos-rel">
                    <div class="pix-con clearfix">
                        <div class="pix-container">
						 	<div class="col-md-3" >	
				<aside  id="aside" class="clearfix ">

                            <div class="header">
                                
                                <h2 class="title text-center">OBITUARY</h2>
                                <span class="arrow-down"></span>
                            </div>

                            <div class="widget clearfix">
                                <div class="eventform-con clearfix">
								<?php if ( is_super_admin() ) { ?>
												<a href="<?php echo get_template_directory_uri(); ?>/orbituary.php">Add New Obituary</a>
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
                            <div class="col-md-8 wpb_column vc_column_container ">
                                <div class="wpb_wrapper">
									<div class="fielder-left"></div>
								
                                    <div class="wpb_row row speaker">
									<?php foreach($results as $result){ ?>
                                        <div class="col-md-4" style="margin-top:10px;">
                                            <div class="event bg" style="max-height:350px;">
                                                <div class="eventsimg">
                                                    <img src='<?php if($result->obituary_photo) { echo $result->obituary_photo; } else { echo get_home_url(); ?>/wp-content/uploads/userphoto/avatar.jpg <?php  } ?>' alt='' height="250px;" width="100%">
                                                </div>
                                                <div class="event-content">
                                                 <a href="<?php echo bloginfo('template_directory');  ?>/obituary-details.php?id=<?php echo $result->id; ?>">   <h2 class="title"><?php echo $result->obituary_name; ?></h2> </a>
                                                  <h5> <?php echo date("d-m-Y", strtotime($result->obituary_born)); ?> - <?php echo date("d-m-Y", strtotime($result->obituary_expired)); ?> </h5>
                                                    
                                                </div>                                                
                                            </div>
											<?php if(is_super_admin()){ ?>
											<form action="<?php echo bloginfo('template_directory') ?>/delete/delete_obituary.php" method="post">
												<input type="hidden" name="obituary_id" value="<?php echo $result->id; ?>">
												<button name="delete" type="submit" class="wpcf7-submit text-50" >Delete</button>
												<a href="<?php echo get_template_directory_uri() ?>/orbituary.php?id=<?php echo $result->id; ?>"><button name="edit" type="button" class="wpcf7-submit text-50" >Edit</button></a>
											</form>
											<?php } ?>
                                        </div>
								
										
										<?php } ?>
                                    </div>
                                </div>
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
