<?php 
require( '../../../wp-load.php' );

include(  dirname( __FILE__ ).'/header.php' );
 ?>
    <!-- HEADER -->
      <!-- HEADER -->  <section class="sub-banner newsection">
	    <div class="container">
	        <h2 class="title">Bulk Mail</h2><ul class="breadcrumb" itemprop="breadcrumb"><li><a href="#">Home</a> </li><li><span class="current" >Bulk Mail</span></li></div></div>
	</section>
		
		<section id="post-75" class="clearfix post-75 page type-page status-publish hentry">

			<section >
				<div class=""><div class="bg-pos-rel"><div class="pix-con clearfix">
		<div class="pix-container">
		<div class="vc_col-sm-3">	</div> 
	<div class="vc_col-sm-6 wpb_column vc_column_container ">
		<div class="wpb_wrapper">
			<div class="spacer" style="height: 30px"></div>

<form name="" action="<?php echo get_template_directory_uri(); ?>/bulk_mail.php" method="post" >

<p>Subject<br />
   <input type="text" name="bulk_subject" value="" size="40" class=" wpcf7-text "   required /> </p>

<p>Body<br />
  <textarea name="bulk_body" cols="40" rows="10" class=" wpcf7-textarea"></textarea> </p>
<p><input type="submit" value="Send" class=" wpcf7-submit" /></p>
</form>
		</div> 
	</div> 




	</div></div></div></div>
			</section>

		</section>

	<?php include 'footer.php' ?>