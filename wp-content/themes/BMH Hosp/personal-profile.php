<?php
require( '../../../wp-load.php' );
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
include(  dirname( __FILE__ ).'/header.php' );
$uname=$_GET['uname'];
global $wpdb;
$user_details=$wpdb->get_row("SELECT * from wp_profile_photo WHERE uname='".$uname."'");
$email=$wpdb->get_var("SELECT user_email from wp_users WHERE user_login = '".$uname."'");
$id=$wpdb->get_var("SELECT id from wp_users WHERE user_login = '".$uname."'");

?>
<style>
.inf{
vertical-align : top;
}
.customheight{
height : 30px;
margin-top : 10px;
width : 100%;
color : black;
vertical-align : middle;
}



</style>
      <!-- Css -->
      <link href="./profile-view_files/bootstrap.css" rel="stylesheet" type="text/css" media="all">
      <link href="./profile-view_files/magnific-popup.css" type="text/css" rel="stylesheet" media="all">
      <link href="./profile-view_files/base.css" rel="stylesheet" type="text/css" media="all">
      <link href="./profile-view_files/main.css" rel="stylesheet" type="text/css" media="all">
      <!--Alternate styles-->
      <!--[if gte IE 9]>
      <link rel="stylesheet" type="text/css" href="css/ie9.css" />
      <![endif]-->
   
      <div id="wrapper" class="margLTop  margLBottom">
         <!--Container-->
         <div class="container">
            <div class="row ">
               <!--Left content-->
               <div class="col-md-3 nopr left-content">
                  <!--Header-->
                  <header id="header" style="border:solid #596371 2px">
                     <!--Main header-->
                    
                        <!--Profile image-->
                        <figure class="img-profile">
                           <img src="<?php if(!$user_details->pro_image){ echo get_home_url(); ?>/wp-content/uploads/userphoto/avatar.jpg <?php } else echo $user_details->pro_image; ?>" alt=""/>
                          
                        </figure>
                        <!--End profile image-->
                        <!--Main navigation-->
                        <!--End main navigation-->
                    
					 	<div class="bottom-header bgWhite ofsTSmall ofsBSmall tCenter">
					 <div class="block-content ">
                              <div class=" profile ">
                                 <h1 style="font-weight:700;font-size:18px;"><b><?php echo $user_details->name; ?></b></h1>
                                 <?php echo  $user_details->job_title; ?>
                              </div>
                              <!--Row-->	
                              <!--End row-->	
                           </div>
					
				</div>
				<?php if($uname==$current_user->user_login){ ?>
				<a href="<?php echo bloginfo('template_directory');?>/profile-edit.php"><button class="customheight" style="margin-top:0px;">Edit Profile</button></a>
				 
				<?php } ?>
				
                  </header>
                  <!--End  header-->
               </div>
               <!--End left content-->
               <!--Right content-->
               <div class="col-md-9 right-content" style="">
                  <!--About Tab-->
                  <section id="about" class="bgWhite ofsInBottom active" style="display: block;">
                     <!--About -->
                     <div class="about">
                         <div class="main-title" style="border-bottom:solid #f15b4e 2px">
                           <h1 style="font-size:18px;font-weight:700;color:#f15b4e;">Personal Details</h1>
                           <div class="divider" style="display:none">
                              <div class="zigzag large clearfix " data-svg-drawing="yes">
                                 <svg xml:space="preserve" viewBox="0 0 69.172 14.975" width="37" height="28" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                    <path d="M1.357,12.26 10.807,2.81 20.328,12.332
                                       29.781,2.879 39.223,12.321 48.754,2.79 58.286,12.321 67.815,2.793 " style="stroke-dasharray: 93.9851, 93.9851; stroke-dashoffset: 0;"></path>
                                 </svg>
                              </div>
                           </div>
                        </div>
                        <div class="content">
                           <!--Block content-->	
                          
                           <!--End block content-->	
                           <!--Block content-->	
						   
                           <div class="block-content">
                              <div class="info">
                                 <!--Row-->	
                                 <div class="row">
                                    <div class="col-md-6">
                                       <ul class="info-list clearfix">
                                          <li><span class="inf">Name </span>  <span class="value"><?php echo $user_details->name; ?></span></li>
											<li><span class="inf">Mobile</span>  <span class="value"><?php echo $user_details->phone; ?>	</span></li>     
											<li><span class="inf">Spouse</span>  <span class="value"><?php echo $user_details->spouse; ?>	</span></li>	
											<li><span class="inf">Sex</span>  <span class="value"><?php if($user_details->sex==1) echo "Male" ; else echo "Female"; ?></span></li>
                                        
                                        
										     
                                       </ul>
                                    </div>
                                    <div class="col-md-6">
                                       <ul class="info-list">
											<li><span class="inf">Email</span>  <span class="value"><?php echo $email; ?>	</span></li>      
											<li><span class="inf">Whatsapp</span>  <span class="value"><?php echo $user_details->whatsapp; ?>	</span></li>	
											<li><span class="inf">Date of birth</span>  <span class="value"> <?php echo date("F d, Y", strtotime($user_details->dob)); ?> </span></li>											
											<li><span class="inf">Children</span>  <span class="value"><?php echo $user_details->children; ?>	</span></li>										   
										   
                                       </ul>
                                    </div>
                                 </div>
								 <br/>
								  <div class="row">
                                    <div class="col-md-6">
                                       <ul class="info-list clearfix">
                                          <li><span class="inf">Home Address</span>  <span class="value"> <?php echo $user_details->address; ?></span></li>
                                              <li><span class="inf">About</span>  <span class="value"> <?php echo $user_details->about; ?></span></li>
                                       </ul>
                                    </div>
                                    <div class="col-md-6">
                                       <ul class="info-list">
                                       
                                           <li><span class="inf">Office Address</span>  <span class="value"> <?php echo $user_details->o_address; ?></span></li>
                                          
                                         
                                       </ul>
                                    </div>
                                 </div>
								 
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
				   
                  <!--About Tab-->
                  <!--End about tab-->
                  <!--Portfolio Tab-->
                  <section id="portfolio" class="bgWhite ofsInBottom active" style="display: block;">
                     <!--Portfolio -->
                     <div class="portfolio">
                        <!--Main title-->
                        <div class="main-title" style="border-bottom:solid #f15b4e 2px;">
                           <h1 style="font-weight:700;font-size:18px;color:#f15b4e">Family Photos</h1>
                           <div class="divider" style="display:none;">
                              <div class="zigzag large clearfix " data-svg-drawing="yes">
                                 <svg xml:space="preserve" viewBox="0 0 69.172 14.975" width="37" height="28" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                    <path d="M1.357,12.26 10.807,2.81 20.328,12.332
                                       29.781,2.879 39.223,12.321 48.754,2.79 58.286,12.321 67.815,2.793 " style="stroke-dasharray: 93.9851, 93.9851; stroke-dashoffset: 0;"></path>
                                 </svg>
                              </div>
                           </div>
                        </div>
                        <!--End main title-->
                        <!--Content-->	
                        <div class="content">
                           <!--Block content-->	
                           <div class="block-content ">
                              <!--Works-->
                              <div class="works">
                                 <!--Row-->	
                                
                                 <!--End row-->
                                 <!--Row-->
                                 <div class="row">
                                  
                                 <!--End row-->
                                 <!--Row-->	
                                 <div class="row">
                                    <ul class="work">
                                    <?php if($user_details->photo1){ ?>
                                       <li class="col-md-3">
                                          <!--Item-->	
                                          <div class="item web">
                                             <a class="box" href="<?php if($user_details->photo1){ echo $user_details->photo1; } else { echo "#"; } ?>">
                                                <div class="desc">
                                                   <h3 class="proj-desc">
                                                 Click to Enlarge
                                                      <span class="zigzag work clearfix " data-svg-drawing="yes">
                                                         <svg xml:space="preserve" viewBox="0 0 69.172 14.975" width="25" height="10" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                            <path d="M1.357,12.26 10.807,2.81 20.328,12.332
                                                               29.781,2.879 39.223,12.321 48.754,2.79 58.286,12.321 67.815,2.793 " style="stroke-dasharray: 93.9851, 93.9851; stroke-dashoffset: 0;"></path>
                                                         </svg>
                                                      </span>
                                                      <span><!--sub heading --></span>
                                                   </h3>
                                                </div>
                                                <img src="<?php if($user_details->photo1){ echo $user_details->photo1; } ?>" />
                                             </a>
                                          </div>
                                          <!--End item-->	
                                       </li>
									   <?php } ?>
									     <?php if($user_details->photo2){ ?>
                                       <li class="col-md-3">
                                          <!--Item-->	
                                          <div class="item graphic">
                                             <a class="box" href="<?php if($user_details->photo2){ echo $user_details->photo2; } else { echo "#"; } ?>">
                                                <div class="desc">
                                                   <h3 class="proj-desc">
                                                     Click to Enlarge
                                                      <span class="zigzag work clearfix " data-svg-drawing="yes">
                                                         <svg xml:space="preserve" viewBox="0 0 69.172 14.975" width="25" height="10" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                            <path d="M1.357,12.26 10.807,2.81 20.328,12.332
                                                               29.781,2.879 39.223,12.321 48.754,2.79 58.286,12.321 67.815,2.793 " style="stroke-dasharray: 93.9851, 93.9851; stroke-dashoffset: 0;"></path>
                                                         </svg>
                                                      </span>
                                                      <span><!--sub heading --></span>
                                                   </h3>
                                                </div>
                                                <img src="<?php if($user_details->photo2){ echo $user_details->photo2; } ?>">
                                             </a>
                                          </div>
                                          <!--End item-->	
                                       </li>
									      <?php } ?>
									     <?php if($user_details->photo3){ ?>
                                       <li class="col-md-3">
                                          <!--Item-->	
                                          <div class="item web">
                                             <a class="box" href="<?php if($user_details->photo3){ echo $user_details->photo3; } else { echo "#"; } ?>">
                                                <div class="desc">
                                                   <h3 class="proj-desc">
                                                     Click to Enlarge
                                                      <span class="zigzag work clearfix " data-svg-drawing="yes">
                                                         <svg xml:space="preserve" viewBox="0 0 69.172 14.975" width="25" height="10" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                            <path d="M1.357,12.26 10.807,2.81 20.328,12.332
                                                               29.781,2.879 39.223,12.321 48.754,2.79 58.286,12.321 67.815,2.793 " style="stroke-dasharray: 93.9851, 93.9851; stroke-dashoffset: 0;"></path>
                                                         </svg>
                                                      </span>
                                                      <span> <!--sub heading --></span>
                                                   </h3>
                                                </div>
                                                <img alt="" src="<?php if($user_details->photo3){ echo $user_details->photo3; } ?>">
                                             </a>
                                          </div>
                                          <!--End item-->	
                                       </li>
									      <?php } ?>
									     <?php if($user_details->photo4){ ?>
                                       <li class="col-md-3">
                                          <!--Item-->	
                                          <div class="item graphic">
                                             <a class="box" href="<?php if($user_details->photo4){ echo $user_details->photo4; } else { echo "#"; } ?>">
                                                <div class="desc">
                                                   <h3 class="proj-desc">
                                                     Click to Enlarge
                                                      <span class="zigzag work clearfix " data-svg-drawing="yes">
                                                         <svg xml:space="preserve" viewBox="0 0 69.172 14.975" width="25" height="10" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                            <path d="M1.357,12.26 10.807,2.81 20.328,12.332
                                                               29.781,2.879 39.223,12.321 48.754,2.79 58.286,12.321 67.815,2.793 " style="stroke-dasharray: 93.9851, 93.9851; stroke-dashoffset: 0;"></path>
                                                         </svg>
                                                      </span>
                                                      <span><!--sub heading --> </span>
                                                   </h3>
                                                </div>
                                                <img src="<?php if($user_details->photo1){ echo $user_details->photo4; } ?>">
                                             </a>
                                          </div>
									
                                          <!--End item-->	
                                       </li>
									   	    <?php } ?>
                                      </ul>
                                 </div>
                                 <!--End row-->
                              </div>
                              <!--End works-->
                            
                           </div>
                           <!--End block content-->
                        </div>
                        <!--End content-->
                        <!--Button-->
                     </div>
                     <!--End portfolio-->
                  </div></section>
				  
               </div>
			   
            </div>
         </div>
      </div>
	  



	   <script src="<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/profile-view_files/jquery-1.11.3.min.js.download" type="text/javascript"></script>
      <script src="<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/profile-view_files/owl.carousel.js.download" type="text/javascript"></script>
      <script src="<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/profile-view_files/jquery.magnific-popup.js.download" type="text/javascript"></script>
      <script src="<?php echo get_home_url(); ?>/wp-content/themes/BMH Hosp/profile-view_files/script.js.download" type="text/javascript"></script>
	
<?php include(  dirname( __FILE__ ).'/footer.php' ); ?>