<?php /*
  Template Name: Latest Sermons
 */ ?>

<?php get_header(); ?>

       <?php 


$bannerimg = get_post_meta(get_the_ID(), 'bannerimg', true);
$pagedescription = get_post_meta(get_the_ID(), 'pagedescription', true);
$wmodulepage = get_post_meta(get_the_ID(), 'wmodulepage', true);

?>


    <div class="topModule clearfix">

        
              <?php if( $bannerimg) { ?>
                                             
                         <div class="container headerImg">
            
            <img alt="" src="<?php echo $bannerimg; ?>" />
                
        </div>

                                <?php } ?>
                        
       
     
              <div class="container pageTitle">
            
                <div class="ten columns">
                    
                    <h1><?php the_title(); ?></h1>
                    
                                   <?php if( $pagedescription) { ?>
                        
                        <h2><?php echo $pagedescription; ?></h2>
                        
                                    <?php } else { ?>
                        
                        <style>
                            
                            .tagline h1, .pageTitle h1 {
                                margin-top: 18px;
                            }
                            
                        </style>
                        
                        <?php } ?>
                    
                    
                </div>
                
                <div class="six columns">
                    
                    <?php get_search_form(); ?>
                    
                                        
                </div>
            
        </div>
             <div class="container pageContent clearfix">
            
                 <ul class="postList sermon-list clearfix">
                     
                    <?php
global $paged;


$arguments = array(
    'post_type' => 'sermons',
    'post_status' => 'publish',
    'paged' => $paged
);

$sermons_query = new WP_Query($arguments);

dd_set_query($sermons_query);

?>
                     
                       <?php if ($sermons_query->have_posts()) : while ($sermons_query->have_posts()) : $sermons_query->the_post(); ?>
  
<li>
   
    
          
              <?php 

$thumbimg = get_post_meta(get_the_ID(), 'thumbimg', true);
$sermonmp3 = get_post_meta(get_the_ID(), 'sermonmp3', true);
$sermonogg = get_post_meta(get_the_ID(), 'sermonogg', true);


?>

       
    <?php if( $thumbimg) { ?>
    
      <div class="postListThumb">
                             
        <a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo $thumbimg; ?>" /></a>
                             
    </div>
    


      <div class="postListDetails">
          
              <?php } else { ?> <div class="postListDetails"> <?php } ?>

                             <div class="postListMeta">

                                     <div class="postEventsDate">
                                     
                                     <span class="month"><?php the_time('M') ?></span>
                                     <span class="day"><?php the_time('jS') ?></span>
                                
                                 </div>
                                 
                                 <div class="postListTitle">
                                     
                                      <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    <span><?php _e('By', 'localization'); ?> <?php the_author(); ?>   <?php echo get_the_term_list( get_the_ID(), 'sermons_cats', '| in: ', ', ', '' )  ?>
                                      
                                     
                                 </div>
                            
                             </div>
                             
                             <div class="postListExcerpt">
                                 
                                <?php the_excerpt(); ?>
                                 <a class="button-small rounded3 brown" href="<?php the_permalink(); ?>"><?php _e('CONTINUE READING', 'localization'); ?></a>
                                 
                                 <?php if (($sermonmp3) or ($sermonogg))  { ?>
                                 
                                   <a style="margin-left: 10px;" class="button-small audioBtn rounded3 teal" href="<?php the_permalink(); ?>">AUDIO VERSION AVAILABLE!</a>
                                 
                                         <?php } ?>
                                 
                             </div>
                             
                         </div>
    
  
  </li>
   

      <?php endwhile; ?>
                    
                

<?php endif; ?>
                     
                 </ul>

                 
        <?php
                            kriesi_pagination();

                            dd_restore_query();
?>                  
                 
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

    