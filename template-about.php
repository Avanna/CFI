<?php /*
  Template Name: about
 */ ?>

<?php get_header(); ?>

     <?php 


$bannerimg = get_post_meta(get_the_ID(), 'bannerimg', true);
$pagedescription = get_post_meta(get_the_ID(), 'pagedescription', true);
$sidebar = get_post_meta(get_the_ID(), 'sidebar', true);
$wmodulepage = get_post_meta(get_the_ID(), 'wmodulepage', true);

?>


    <div class="topModule clearfix">
        
            <?php get_template_part( 'content', 'page-top' ); ?>
        
            <?php if( $bannerimg) { ?>
                                             
                <div class="container headerImg">
            
                    <img alt="" src="<?php echo $bannerimg; ?>" />

                    <div id="header-info">
                        <h2 id="header-heading"><?php the_title(); ?></h2> 
                        
                        <p>
                            CFI seeks to bring churches, fellowships, organizations and individuals  together for worship, fellowship, support, education, training, accountability, sharing of ideas and resources for ministry and evangelism of the gospel of Jesus Christ.
                        </p>  
                    </div>
             
                </div>

            <?php } ?>
                        
             <div class="container pageContent clearfix">
            
             <?php if ($sidebar  == 'yes') { ?>
                 
                 <div class="twelve columns wsidebar">
                     
                     <?php } else { ?>
                 
                 <div>
                     
                         <?php } ?>
                     
                                       <?php
        if (have_posts ()) {

            while (have_posts ()) {

                (the_post());
        ?>



<?php the_content(); ?>


<?php }
        } else { ?>

            <div class="post box">
                <h3><?php _e('There is not post available.', 'localization'); ?></h3>

            </div>

<?php } ?>
                     
                 </div>
                 
                 <?php if ($sidebar == 'yes') { ?>
                 
                 <div class="four columns postSidebar">
        
          <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Pages")) ; ?>
        
    </div>  
                     <?php } ?>
                  
            
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
