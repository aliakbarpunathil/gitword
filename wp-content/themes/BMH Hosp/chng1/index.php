<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage EventOn
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
    <!-- HEADER -->
<style>


.middle-home{
text-align : center;

}
.speakers .speaker .speaker-img{
max-width : 500px; !important
width : 500px ; !important
}
.speaker-content{
padding : 5px;
}

</style>
<?php
$postid = $wpdb->get_var("SELECT post_id FROM wp_hpage_event WHERE page = 'home'" );

?>
    <section id="post-21" class="clearfix post-21 page type-page status-publish hentry">

        <section itemprop="articleBody">
           <div class="wpb_row pix-row vc_row-fluid vc_custom_1423309851518 light normal" style="min-height:500px">
                <div class="bg-pos-rel">
                    <div class="pix-con clearfix">
                        <div class="pix-container">
                            <div class="vc_col-sm-12 wpb_column vc_column_container ">
                                <div class="wpb_wrapper">
                                    <h2 class="main-title title sub-title-con size-lg alignCenter" style="font-weight: 300;font-family: 'Dancing Script', cursive; ">About CMCBatch27?</h2>
                                    <p class="sub-title ">
									The year 1983, India created sporting history. The Indian cricket team won their first ever Prudential cup at the Lord's ... 

</br>Months later, a bunch of enthusiastic youngsters spurred on by their individual success in the entrance exam, entered the portals of Calicut Medical College, ready to face the gruelling challenge of the MBBS course. Little did they realise that this was a life changing event in their lives. 
They would face highs and lows in their academic and personal lives like never before. Each of this 200 + strong batch would emerge stronger and better individuals equipped to face the world as young doctors. They would leave the CMC campus as members of a family they had passionately accepted during their MBBS days - the Great 27th Batch!

</br>The 27th Batch family grew and still grows as the first members married, had children and now grandchildren. 
As a family, they face the challenges thrown at them ...some very painful..
As a family, they find solutions to these challenges.

</br>As a a family, they rejoice in their achievements!
Over the years, even though time has drifted them apart, each to their chosen haven...   
As a family they still cherish those moments of togetherness and take pride in being part of the Great 27th Batch!!
									</p>
									<div class="center-clock">
                                        <div class="countdown countdown-container container">
                                      
                                        </div>
                                    </div>
                                    <div class="spacer" style="height: 30px"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
             <div class="wpb_row pix-row vc_row-fluid vc_custom_1417500238804 dark normal" style="background-color:#307ef3">
                <div class="bg-pos-rel">
                    <div class="pix-con clearfix">
                        <div class="pix-container">
                            <div class="vc_col-sm-12 wpb_column vc_column_container ">
                                <div class="wpb_wrapper">
                                    <section class="eventform newsection">

                                        <div class="middle-home">
                                          
                                            <h2 class="title">CMCBatch 2017 - Get Ready for The Next Event</h2>
                                        </div>

                                        <div class="eventform-con">
                                           
                                        </div>

                                    </section>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
		
            <div class="wpb_row pix-row vc_row-fluid dark normal">
                <div class="bg-pos-rel">
                    <div class="pix-con clearfix">
                        <div class="pix-container">
                            <div class="vc_col-sm-12 wpb_column vc_column_container ">
                                <div class="wpb_wrapper">
                                    <div class="tabs event-tab upcoming-popular-tab">
                                        <ul class="clearfix">
                                            <li><a href="#tabs24178972">Upcoming Events</a></li>
                                            <li><a href="#tabs1832727709">Popular Events</a></li>
                                        </ul>
                                        <div id="tabs24178972"> 
											<div class="speakers">
												<div class="speaker clearfix">
												   <?php  if ( have_posts() ) : ?>
												<?php //while ( have_posts() ) : the_post(); 
												#$upc_post = get_post($postid);
												?>
													<div class="speaker-img"><img src="<?php echo get_the_guid($postid); ?>" alt=""></div>
													<div class="speaker-content">
													
													<h1 >	
														<a href="<?php if(is_user_logged_in()){ echo get_template_directory_uri();?>/event-description.php?p=<?php echo $postid; } else echo wp_login_url( get_template_directory_uri() .'/event-description.php?p='.$postid ); ?>"><?php echo get_the_title($postid); ?></a>
														</h1>
													
														<p><h3><?php stripslashes(get_the_excerpt($postid)); ?>Authoritatively repurpose cross-media technologies rather than front-end communities. Efficiently implement professional schema after diverse results.</h3></p>
														<?php if(is_user_logged_in()){ 
														$registered = $wpdb->get_row("select * from wp_event_register where user_id='".get_current_user_id()."' and event_id='".$postid."'");
														?>
														<form action="<?php echo get_template_directory_uri();?>/event-confirm.php" method="post">
														
														<a href="<?php echo get_template_directory_uri();?>/event-description.php?p=<?php echo $postid; ?>" class="btn btn-border btn-grey btn-md">Read More</a>
														
															<input type="hidden" value="<?php echo $postid; ?>" name="event_id">
															<a href="#" ><input type="submit" name="register" value="<?php if(!$registered) { ?>Register Online <?php } else { ?> Unregister <?php } ?>" class="btn btn-border btn-grey btn-md" style="background-color : whitesmoke;"> </a>
														</form>
														<?php }
														else {
														?>
															<a href="<?php echo wp_login_url( get_template_directory_uri() .'/event-description.php?p='. $postid ); ?>" class="btn btn-border btn-grey btn-md">Read More</a>
														<a href="<?php echo wp_login_url();   ?>" class="btn btn-border btn-grey btn-md">Login </a>
														<?php } ?>
													</div>
													<?php 
													//break;
													//endwhile; /* rewind or continue if all posts have been fetched */ ?>
													<?php  endif; ?>
												</div>
												
												</div>
											
											
                                        </div>
										<?php $i=1 ?>
                                        <div id="tabs1832727709">
                                            <div class="event-container">
                                                <div class="row">
												<?php 
											if ( have_posts() ) : ?>
												<?php while ( have_posts() ) : the_post(); 
												if($i==1)
												{
												$i++;
												continue;
												}
												else if($i>5)	
												 break;
												$i++;
												?>
                                                    <div class="col-md-3">
                                                        <div class="event bg">
                                                            <div class='eventsimg'><img src="<?php echo get_the_guid(); ?>" alt='' height="200px;"></div>
                                                            <div class="event-content">
                                                                <h3 class="title"><?php the_title(); ?></h3>
                                                                <p><?php stripslashes(the_excerpt()); ?>... [...] </p>
																<a href="<?php if(is_user_logged_in()){ echo get_template_directory_uri();?>/event-description.php?p=<?php echo get_the_ID(); } else echo wp_login_url( get_template_directory_uri() .'/event-description.php?p='. get_the_ID() ); ?>" class="btn btn-solid btn-blue btn-md">Read More</a></div>
                                                            
                                                        </div>
                                                    </div>
													<?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
													<?php endif; ?>
                                                  
                                                </div>
                                            </div>
                                        </div></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
                
        </section>

    </section>
	

<?php get_footer(); ?>