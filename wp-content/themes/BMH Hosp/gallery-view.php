<?php
require( '../../../wp-load.php' );
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
include(  dirname( __FILE__ ).'/header.php' );

global $wpdb;
$images=$wpdb->get_results("select id,image_location from wp_gallery where category = '".$_GET['id']."'");

?>
<style>
#uploadFile{
	background-color : grey;
	padding : 10px;
}

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

.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
.dropfiles{
width : 100%;
height : 150px;
background-color : #bfbfbf;
border-radius: 1px;
margin-top : 10px;


}
.padding10{
margin-top : 10px;
margin-left : -30px;
}
.box{
margin-top : 12px;

}
.box label{
	font-size: 1.25em;
    font-weight: 700;
    color: white;
    display: inline-block;
}
.close{
border: 2px solid black;
padding : 1px;
font-size : 12px;
display : none;
}
.images:hover .close{
display : block;
margin-right : 2px;
margin-top : 0px;
 
}
.fileContainer {
    overflow: hidden;
    position: relative;
	background-color : violet	;
	color : black !important;
	padding : 5px;
	border-radius : 10px;
}

.fileContainer [type=file] {
    cursor: inherit;
    display: block;
    font-size: 999px;
    filter: alpha(opacity=0);
    min-height: 100%;
    min-width: 100%;
    opacity: 0;
    position: absolute;
    right: 0;
    text-align: right;
    top: 0;
}
#uploadFile:hover{
cursor:pointer;
}
</style>
      <!-- Css -->

      
     
      <link href="./profile-view_files/base.css" rel="stylesheet" type="text/css" media="all">
      <link href="./profile-view_files/main.css" rel="stylesheet" type="text/css" media="all">
  
      <div id="wrapper" class="  ">
         <!--Container-->
         <div class="container">
			<div class="row text-center dropfiles">
				<form class="box" method="post" action="<?php echo get_template_directory_uri();?>/wp-gallery.php" enctype="multipart/form-data" >
					<input type="hidden" value="<?php echo $_GET['id']; ?>" name="album_id">
					<input type="file" name="files[]" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
					<label for="file" id="uploadFile"><b>Click here to Choose a file</b> <i class="fa fa-upload" aria-hidden="true"></i></label>					
					<label id="filecount"> </label>
						<br/><label style="font-size : 12px;">(Max File Size : 300 KB)</label>
					
					<!--label class="fileContainer">
						Click here to trigger the file uploader!
						<input type="file" name="files" />
					</label-->

					<br/> <br/>
				<input type="submit" name="upload" value="UPLOAD" class="wpcf7-submit">
				</form>
			</div>
            <div class="row padding10">
               <!--Left content-->
       
               <!--End left content-->
               <!--Right content-->
               <div class="col-md-12 " style="">
                  <!--About Tab-->
               
				   
                  <!--About Tab-->
                  <!--End about tab-->
                  <!--Portfolio Tab-->
                  <section id="portfolio" class="bgWhite ofsInBottom active" style="display: block;">
                     <!--Portfolio -->
                     <div class="portfolio">
                        <!--Main title-->
                        <div class="main-title" style="border-bottom:solid #307ef3 3px;">
                           <h1 style="font-weight:700;font-size:18px;">Gallery</h1>
                           <div class="divider" style="display:none">
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
                              
                                  
                                 <!--End row-->
                                 <!--Row-->	
                                 <div class="row">
                                    <ul class="work">
                                    <?php foreach($images as $image){ ?>
                                       <li class="col-md-3">
                                          <!--Item-->	
                                          <div class="item web images">
										  <?php if(is_super_admin()){ ?>
											<a href="<?php echo get_template_directory_uri().'/wp-delete-gallery.php?imgId='.$image->id; ?>" class="close">x</a>
											<?php } ?>
                                             <a itemprop="image" class="woocommerce-main-image zoom box" data-rel="prettyPhoto" href="<?php  echo $image->image_location; ?>">
                                                
                                                <img class="attachment-shop_single wp-post-image" width="250" alt="" src="<?php echo $image->image_location; ?>">
                                             </a>
                                          </div>
                                          <!--End item-->	
                                       </li>
                                     <?php } ?>
                                          <!--End item-->	
                                       </li>
                                      </ul>
                                 </div>
                                 <!--End row-->
                             
                              <!--End works-->
                              <div class="clearfix"></div>
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
<script>
document.getElementById('file').onchange = function () {
 // alert(this.value.replace(/.*[\/\\]/, ''));
  document.getElementById('filecount').innerHTML = this.files.length+" file(s) selected";
 
};

</script>
	
<?php include(  dirname( __FILE__ ).'/footer.php' ); ?>