<?php get_header(); ?>

     <?php 


$bannerimg = get_post_meta(get_the_ID(), 'bannerimg', true);
$sidebar = get_post_meta(get_the_ID(), 'sidebar', true);
$wmodulepage = get_post_meta(get_the_ID(), 'wmodulepage', true);

?>


               <?php
        if (have_posts ()) {

            while (have_posts ()) {

                (the_post());
        ?>

    <div class="topModule clearfix">

        
              <?php if( $bannerimg) { ?>
                                             
                         <div class="container headerImg">
            
            <img alt="" src="<?php echo $bannerimg; ?>" />
                
        </div>

                                <?php } ?>
                        
       
       
     
            <div class="container pageTitle">
            
                <div class="ten columns">
                    
                      <div class="postEventsDate">
                                     
                                     <span class="month"><?php the_time('M') ?></span>
                                     <span class="day"><?php the_time('jS') ?></span>
                                
                                 </div>
                                 
                                  <div class="postListTitle">
                                     
                                      <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                     <span><?php _e('By', 'localization'); ?> <?php the_author(); ?>   <?php echo get_the_term_list( get_the_ID(), 'sermons_cats', '| in: ', ', ', '' )  ?>
                                         
                                           
                                         
                                     </span>
   
   
                                     
                                 </div>
                            
                                       
                    
                </div>
                
                <div class="six columns">
                    
                    <?php get_search_form(); ?>
                    
                                        
                </div>
            
        </div>
             <div class="container pageContent clearfix">
            
                
                 <?php if ($sidebar == 'yes') { ?>
                 
                 <div class="twelve columns wsidebar">
                     
                     <?php } else { ?>
                 
                 <div class="sixteen columns">
                     
                         <?php } ?>
                     
                        

                           <?php 


$sermonmp3 = get_post_meta(get_the_ID(), 'sermonmp3', true);
$sermonogg = get_post_meta(get_the_ID(), 'sermonogg', true);

?>

       
   <?php if (($sermonmp3) or ($sermonogg))  { ?>

                     <div id="snappy-light-video-player-skin jplayer-container" class="player-container">

                      
			<!-- Video Container -->
			<div class="jp-jplayer jp-jplayer-video" id="jplayer"></div>

			<!-- Control Interface -->
			<div class="jp-interface" id="jp-interface">

				<!-- Controls -->
				<div class="jp-controls">
					<a href="#" class="jp-play jp-button" tabindex="1"></a>
					<a href="#" class="jp-pause jp-button" tabindex="1"></a>
					<span class="divider"></span>
				</div>

				<!-- Progress Bar -->
				<div class="jp-progress-container">
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar">
								<div class="bullet">
									<div class="jp-current-time">
									</div>
								</div>
							</div>
						</div>
					</div>
					<span class="divider"></span>
				</div>

				<!-- Volume Bar -->
				<div class="jp-volume-bar-container">
					<a href="#" class="jp-mute" tabindex="1"></a>
					<a href="#" class="jp-unmute" tabindex="1"></a>
					<div class="jp-volume-bar">
						<div class="jp-volume-bar-value">
							<div class="bullet"></div>
						</div>
					</div>
					<span class="divider"></span>
				</div>

				<div class="jp-full-screen-container">
					<a href="#" class="jp-full-screen jp-button" tabindex="1"></a>
					<a href="#" class="jp-restore-screen jp-button" tabindex="1"></a>
				</div>

			</div>
                        

		</div>
                     
                         <script>
                
                jQuery(document).ready(function(){

	jQuery("#jplayer").jPlayer({
		ready: function(){
			jQuery(this).jPlayer("setMedia", {
                            
                                             <?php if ($sermonmp3) { ?>
                                                         
					mp3:"<?php echo $sermonmp3; ?>",
                                        
                                                <?php } ?>
                                                    
                                                                             <?php if  ($sermonogg) { ?>
					oga:"<?php echo $sermonogg; ?>"
                                        
                                                <?php } ?>
                                                    
                                                    
                                   
                                        
                                        
                                 
			});
		},
		size: {
		    width: "500px",
		    height: "281px"
		},
		volume: '0.5',
		backgroundColor: "#000000",
		swfPath: "<?php echo get_template_directory_uri(); ?>/js/jPlayer/js/",
		cssSelectorAncestor: ".player-container",
		supplied: "m4a,oga,mp3",
		solution: "html, flash",
		currentTime: '.jp-current-time',
                wmode:'window'
	});

	jQuery('.jp-progress-container').hover(function(){
		var current_time = jQuery(this).find('.jp-current-time');
		current_time.stop().show().animate({opacity: 1}, 300);
	}, function(){
		var current_time = jQuery(this).find('.jp-current-time');
		current_time.stop().animate({opacity: 0}, 150, function(){ jQuery(this).hide(); });
	});
	
});
                    
                </script>
                     
                             
                     
<div class="postCustomInfo">
                         
   
    
                          <div class="postCustomInfoThumb">
                             
                             <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/widgets/audioIcon.png" />
                             
                         </div>
    
      
                         
                         <div class="postCustomInfoDetails">
                             
                           <span>Audio Version Available</span>
                             <?php if (($sermonmp3) or ($sermonogg))  { ?>
                           <a class="button-small audioBtn rounded3 teal showMp3" target="blank" href="#">LISTEN AUDIO VERSION</a>
                           
                                       <?php } ?>
                         </div>
   
                                 

                     </div>

                         <?php }  ?>
<?php the_content(); ?>

                        <?php comments_template(); ?>    

<?php }
        } else { ?>

            <div class="post box">
                <h3><?php _e('There is not post available.', 'localization'); ?></h3>

            </div>

<?php } ?>
                     
                 </div>
                     
                      <?php if ($sidebar == 'yes') { ?>
                 
                 <div class="four columns postSidebar">
        
          <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Sermon")) ; ?>
        
    </div>  
                     <?php } ?>
                  
            
        </div>
          
    </div>
        
    </div>


  <?php if ( $wmodulepage == 'yes') { ?>
    

        <?php if (ot_get_option('wmoduletop') == 'yes') {  ?>

<div class="infoModule clearfix">
        
        <div class="container">
            
            
                <?php if (ot_get_option('wmoduleevent') == 'yes') { ?>
            
            
                <?php
global $paged;


$arguments = array(
    'post_type' => 'events',
    'post_status' => 'publish',
    'paged' => $paged,
    'showposts' => 1
);

$events_query = new WP_Query($arguments);

dd_set_query($events_query);

?>
                     
                       <?php if ($events_query->have_posts()) : while ($events_query->have_posts()) : $events_query->the_post(); ?>
            
            <div class="eight columns nextEvent clearfix">
                
                   <?php 

$thumbimg = get_post_meta(get_the_ID(), 'thumbimg', true);
$facebookurl = get_post_meta(get_the_ID(), 'facebookurl', true);


?>
                
                        <?php if( $thumbimg ) { ?>
    
                
                 <div class="nextEventThumb">
                            
                            <a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo $thumbimg; ?>" /></a>
                            
                        </div>
                
                        <?php } ?>
                
                <div class="nextEventInfo">
                    
                    <h3>NEXT EVENT :</h3>
                    <h4><?php the_title(); ?></h4>
                  
                    
                            <a class="button-small rounded3 brown" href="<?php the_permalink(); ?>"><?php _e('CONTINUE READING', 'localization'); ?></a>
                                 
                                    <?php if( $facebookurl ) { ?>
                        
                                 <span class="or">OR</span>
                                 <a class="button-small facebookBtn rounded3 blue" target="blank" href="<?php echo $facebookurl; ?>">SEE FACEBOOK PAGE</a>
                                 
                  
                        
                                    <?php } ?>
                        
                     
                                 
                    
                </div>
                
            </div>
            
            
            
                <?php endwhile; ?>
                    
                

<?php endif; ?>
            
                    <?php } ?>
                     
            
            <div class="eight columns churchInfo">
                
                        <?php echo ot_get_option('wmoduleright') ?>
                
            </div>
            
        </div>
        
    </div>

                <?php } ?>

<div class="postsModule clearfix">
                      
        <div class="container postsModuleLists">
            
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Widgetized Module")) ; ?>
                           
                
        </div>     
        
    </div>

    
            <?php } ?>
             

<?php get_footer(); ?>

