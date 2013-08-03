<?php get_header(); ?>

    <?php 


$bannerimg = get_post_meta(get_the_ID(), 'bannerimg', true);
$sidebar = get_post_meta(get_the_ID(), 'sidebar', true);
$youtubevimeourl = get_post_meta(get_the_ID(), 'youtubevimeourl', true);
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
                                      <span><?php _e('By', 'localization'); ?> <?php the_author(); ?>   <?php echo get_the_term_list( get_the_ID(), 'videogallery_cats', '| in: ', ', ', '' )  ?>
                                     
                                     
                                 </div>
                            
                                       
                    
                </div>
                
                <div class="six columns">
                    
                    <?php get_search_form(); ?>
                    
                                        
                </div>
            
        </div>
             <div class="container pageContent clearfix">
            
                
                 <?php if ($sidebar  == 'yes') { ?>
                 
                 <div class="twelve columns wsidebar">
                     
                     <?php } else { ?>
                 
                 <div class="sixteen columns">
                     
                         <?php } ?>
                     
                                

                                       
                     
                             <?php if( $youtubevimeourl ) { ?>
                     
                     <div id="videoWrapper">
                     
                     <iframe id="player_1" src="<?php echo $youtubevimeourl ?>" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
    
                     </div>

 <?php } ?>
                     
                     
<?php the_content(); ?>

                        <?php comments_template(); ?>    

<?php }
        } else { ?>

            <div class="post box">
                <h3><?php _e('There is not post available.', 'localization'); ?></h3>

            </div>

<?php } ?>
                     
                 </div>
                     
                    <?php if ($sidebar  == 'yes') { ?>
                 
                 <div class="four columns postSidebar">
        
          <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Media")) ; ?>
        
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