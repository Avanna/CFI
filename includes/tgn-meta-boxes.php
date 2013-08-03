<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', '_custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $my_meta_box2 = array(
    'id'          => 'my_meta_box2',
    'title'       => 'Post Options',
    'desc'        => '',
    'pages'       => array( 'events', 'post', 'sermons'),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      
       array(
        'label'       => 'Thumbnail Image (200px / 200px Optimal)',
        'id'          => 'thumbimg',
        'type'        => 'upload',
        'desc'        => '',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      )   

  	)
  );
  
    $my_meta_box3 = array(
    'id'          => 'my_meta_box3',
    'title'       => 'Pages Options',
    'desc'        => '',
    'pages'       => array( 'page', 'events', 'post', 'sermons', 'videogallery'),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      
      
       array(
        'label'       => 'Image Banner (1030px / 125px Optimal)',
        'id'          => 'bannerimg',
        'type'        => 'upload',
        'desc'        => '',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      ),

	  array(
       'label'       => 'Allow Sidebar On This Page? (No effect on "Events/News/Sermons/Media" page template.)',
        'id'          => 'sidebar',
        'type'        => 'radio',
    
        'choices'     => array(
		array(
            'label'       => 'Make Your Choice :',
            'value'       => 'choice'
          ),
          array(
            'label'       => 'Yes',
            'value'       => 'yes'
          ),
          array(
            'label'       => 'No',
            'value'       => 'no'
          )
        ),
        'std'         => 'choice',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      ),
        array(
        'label'       => 'Allow Widgetized Module On This Page?',
        'id'          => 'wmodulepage',
        'type'        => 'radio',
        'desc'        => '',
        'choices'     => array(
           array(
            'label'       => 'Make Your Choice',
            'value'       => 'choice'
          ),
          array(
            'label'       => 'Yes',
            'value'       => 'yes'
          ),
          array(
            'label'       => 'No',
            'value'       => 'no'
          )
        ),
        'std'         => 'choice',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      ),

  	)
  );
    
       $my_meta_box4 = array(
    'id'          => 'my_meta_box4',
    'title'       => 'Pages Options',
    'desc'        => '',
    'pages'       => array( 'page'),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      
         array(
        'label'       => 'Page Description',
        'id'          => 'pagedescription',
        'type'        => 'text',
        'desc'        => '',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      )

  	)
  );
       
            $my_meta_box5 = array(
    'id'          => 'my_meta_box5',
    'title'       => 'Sermons Options',
    'desc'        => '',
    'pages'       => array( 'sermons'),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      
         array(
        'label'       => 'Sermon MP3 URL (Both MP3 and OGG are required)',
        'id'          => 'sermonmp3',
        'type'        => 'text',
        'desc'        => '',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      ),
         array(
        'label'       => 'Sermon OGG URL (Both MP3 and OGG are required)',
        'id'          => 'sermonogg',
        'type'        => 'text',
        'desc'        => '',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      )

  	)
  );
                 $my_meta_box6 = array(
    'id'          => 'my_meta_box6',
    'title'       => 'Events Options',
    'desc'        => '',
    'pages'       => array( 'events'),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      
         array(
        'label'       => 'Event Facebook Page URL',
        'id'          => 'facebookurl',
        'type'        => 'text',
        'desc'        => '',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      ),
         array(
        'label'       => 'Event Location',
        'id'          => 'location',
        'type'        => 'text',
        'desc'        => '',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      ),
        array(
        'label'       => 'Event Date',
        'id'          => 'date',
        'type'        => 'text',
        'desc'        => '',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      ),
        array(
        'label'       => 'Event Time',
        'id'          => 'time',
        'type'        => 'text',
        'desc'        => '',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      ),
        array(
        'label'       => 'Event Price',
        'id'          => 'price',
        'type'        => 'text',
        'desc'        => '',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      )

  	)
  );
                 
                      $my_meta_box7 = array(
    'id'          => 'my_meta_box7',
    'title'       => 'Video/Gallery Options',
    'desc'        => '',
    'pages'       => array( 'videogallery'),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      
       
     
        array(
        'label'       => 'Video YouTube or Vimeo URL',
        'id'          => 'youtubevimeourl',
        'type'        => 'text',
        'desc'        => '',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      ),
       array(
        'label'       => 'Is this post an image gallery?',
        'id'          => 'imggallery',
        'type'        => 'radio',
        'desc'        => '',
        'choices'     => array(
            array(
            'label'       => 'Make your choice',
            'value'       => 'choice'
          ),
          array(
            'label'       => 'Yes',
            'value'       => 'yes'
          ),
          array(
            'label'       => 'No',
            'value'       => 'no'
          )
        ),
        'std'         => 'choice',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'miscellaneous'
      )

  	)
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */

  ot_register_meta_box( $my_meta_box2 );
  ot_register_meta_box( $my_meta_box3 );
  ot_register_meta_box( $my_meta_box4 );
  ot_register_meta_box( $my_meta_box5 );
  ot_register_meta_box( $my_meta_box6 );
  ot_register_meta_box( $my_meta_box7 );

}