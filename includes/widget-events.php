<?php
/*
 * Plugin Name: DD Events Widget
 * Plugin URI: http://themeforest.net/user/DDStudios/portfolio
 * Description: A widget that displays recent events
 * Version: 1.0
 * Author: Dany Duchaine
 * Author URI: http://themeforest.net/user/DDStudios/
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'dd_events_widgets' );

/*
 * Register widget.
 */
function dd_events_widgets() {
	register_widget( 'DD_Event_Widget' );
}

/*
 * Widget class.
 */
class dd_event_widget extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function DD_Event_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'dd_event_widget', 'description' => __('A widget that displays your latest events.', 'localization') );

		 /* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'dd_event_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'dd_event_widget', __('DD Events Widget','localization'), $widget_ops, $control_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
                $title = apply_filters('widget_title', $instance['title'] );
		$description = $instance['description'];
		$postcount = $instance['postcount'];
                $viewall = $instance['viewall'];
	
		
              	/* Before widget (defined by themes). */
        echo $before_widget;
                
         
                
             
        	
        ?>


             <div class="eventsWidget">
     
                <div class="postDescription">
                    
                    <h4 style="margin-bottom: 0;"><?php echo $title ?></h4>
                    <span><?php echo $description ?></span>
                        
                </div>
                
                <ul class="postEvents clearfix">
                    
                          <?php
global $paged;


$arguments = array(
    'post_type' => 'events',
    'post_status' => 'publish',
    'paged' => $paged,
        'showposts' => $postcount,
);

$events_query = new WP_Query($arguments);


dd_set_query($events_query);

?>
                    
                        <?php if ($events_query->have_posts()) : while ($events_query->have_posts()) : $events_query->the_post(); ?>
                 
                    
                         <?php 

$thumbimg = get_post_meta(get_the_ID(), 'thumbimg', true);


?>
                       <li class="clearfix">
                        
                                           <?php if( $thumbimg) { ?>

                           
                               <div class="postNewsThumb">
                            
                             <a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo $thumbimg; ?>" /></a>
                            
                        </div>
                           
                             <div class="postEventsDetails">
                            
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
     
       
                        </div>
    
      <?php } else { ?>
                           
                             <div class="postEventsDetails" style="width: 100%;">
                            
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  
       
                        </div>
                    
                           <?php } ?>
                        
                      
                        
                    </li>
                    
                     <?php endwhile; ?>
<?php endif; ?>
                    
                            <?php if ($viewall != '') { ?>
                    
                  <a class="button-small rounded3 brown" href="<?php echo $viewall ?>">VIEW ALL EVENTS</a>
                    
                                <?php } ?>
                    
                </ul>
                    
             </div>

		<?php 

		
		
              	/* Before widget (defined by themes). */
        echo $after_widget;
                
         
		
	}

	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
                $instance['title'] = strip_tags( $new_instance['title'] );
		$instance['description'] = strip_tags( $new_instance['description'] );
		$instance['postcount'] = strip_tags( $new_instance['postcount'] );
                $instance['viewall'] = strip_tags( $new_instance['viewall'] );
		

		/* No need to strip tags for.. */

		return $instance;
	}
	
	/* ---------------------------- */
	/* ------- Widget Settings ------- */
	/* ---------------------------- */
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
                'title' => 'Recent Events',
                    'description' => 'Church Activities',
		'postcount' => '5',
				);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'localization') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

                <!-- Postcount: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e('Description', 'localization') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" value="<?php echo $instance['description']; ?>" />
		</p>
   
		<!-- Postcount: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of posts', 'localization') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</p>
                
                <!-- Postcount: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'viewall' ); ?>"><?php _e('"View All" button URL', 'localization') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'viewall' ); ?>" name="<?php echo $this->get_field_name( 'viewall' ); ?>" value="<?php echo $instance['viewall']; ?>" />
		</p>
		
		<!-- Tweettext: Text Input -->
				
	<?php
	}
}
?>