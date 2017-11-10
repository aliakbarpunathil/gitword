<?php require( '../../../wp-load.php' );
if(!is_user_logged_in()){ 
 include(  dirname( __FILE__ ).'/404.php' );
die;
	}
include(  dirname( __FILE__ ).'/header.php' );
global $wpdb;
if(isset($_GET['id']))
	$obituary_details=$wpdb->get_row("Select * FROM wp_obituary where id='".$_GET['id']."'");
?>
<style>
.TopBar
{
height : 26px;
width : 28px;
background-color : #801212;
float : left;
margin-top : 6px;
margin-left : -15px; !important
padding-left : 0px; !important
position : relative;
}
.Divider{
	clear: both;
    border-bottom: 1px solid #cccccc;
    padding-top: 15px;
    margin: 0 28px 0 35px;
}
.PremiumObit{
	position: relative;
    margin-left: 15px;
    margin-top: 15px;
    float: left;
	background-color : white;
	}
.ObituaryName{
position: relative;
padding-left : 15px;
margin-left : 15px;
margin-top : 20px;
}
.head{
margin-top : 10px;
}
.ObitBody{
margin-top : 10px;
}
.obituary_img{
border-radius : 5px;
}
.ObitLeftColumn{
	float: left;
    margin-top: 8%;
    margin-left: 5.343511450381679%;
    margin-right: 1.526717557251908%;
    margin-bottom: 3%;
	}
.desc{
position : relative;
margin-top : 20px;
}
.padding-bottom{
position : relative;
margin-bottom : 20px;
}
</style>
<div class="row padding-bottom desc">
<div class="col-md-3">
</div>
<div class="PremiumObit col-md-6" >
              <div class="head">                
                <div class="TopBar"></div>
                
                
                
        	  
				
                    <div class="ObituaryName">
                      <h1> <div class="upperCaseName" >
						<span itemprop="givenName"><?php echo $obituary_details->obituary_name; ?></span> </div>
						</h1>
                    
                       
                     
                    </div>
                    
                    
                
			
              </div>
              <div class="Divider"></div>

                <div class="ObitBody row">
                   
                    <div class="ObitLeftColumn col-md-3">
                        <div class="ObitPhoto">
                            <img class="obituary_img" src="<?php echo $obituary_details->obituary_photo ?>" alt="<?php echo $obituary_details->obituary_name; ?>" width="100%" >
                        </div>
                        
                        <div class="Clear"></div>
                        
                    </div>
					
				
				
                    <div class="col-md-8 desc">
						<div class="col-md-3 desc">
						
							<b>Born on     </b><br/><br/>
							<b>Expired on  </b><br/><br/>
							<b>Description </b>
						</div>
						<div class="col-md-8 desc">
						
							<b>   :<?php echo $obituary_details->obituary_born; ?> </b><br/><br/>
							<b> :<?php echo $obituary_details->obituary_expired; ?> </b><br/><br/>
							<b> :<?php echo $obituary_details->obituary_description; ?> </b><br/><br/>
						</div>
					</div>
                    
                    <div class="Clear"></div>
                   
                
              


</div>
</div>
</div>

<?php include(  dirname( __FILE__ ).'/footer.php' ); ?>
           