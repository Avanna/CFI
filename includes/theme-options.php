<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array(
      
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'header',
        'title'       => 'Header'
      ),
      array(
        'id'          => 'bodystyling',
        'title'       => 'Body Styling'
      ),
      array(
        'id'          => 'slidersettings',
        'title'       => 'Slider'
      ),
      array(
        'id'          => 'sliderbottom',
        'title'       => 'Slider (Bottom Part)'
      ),
      array(
        'id'          => 'wmodule',
        'title'       => 'Widgetized Module'
      ),
      array(
        'id'          => 'footer',
        'title'       => 'Footer'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'logo',
        'label'       => 'Logo',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'headercustombg',
        'label'       => 'Use Custom BG?',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'choice',
            'label'       => 'Make Your Choice',
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'headerbg',
        'label'       => 'Background',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'bodycustombg',
        'label'       => 'Use Custom BG?',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'bodystyling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'makechoice',
            'label'       => 'Make Your Choice',
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'bodybg',
        'label'       => 'Background',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'bodystyling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'linkscolor',
        'label'       => 'Links Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'bodystyling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'linkshovercolor',
        'label'       => 'Links Hover Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'bodystyling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'archiveimg',
        'label'       => 'Archives\'s Banner Img',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'bodystyling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tagline',
        'label'       => 'Tagline',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'slidersettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'taglinedescription',
        'label'       => 'Tagline Description',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'slidersettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'my_slider',
        'label'       => 'Slides',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'slidersettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 
          array(
            'id'          => 'title2',
            'label'       => 'SubTitle',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          array(
            'id'          => 'image',
            'label'       => 'Image',
            'desc'        => '',
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          array(
            'id'          => 'btntext',
            'label'       => 'Button Text',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          array(
            'id'          => 'btnurl',
            'label'       => 'Button URL',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          array(
            'id'          => 'btncolor',
            'label'       => 'Button Color',
            'desc'        => '',
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'choices'     => array( 
              array(
                'value'       => 'green',
                'label'       => 'Green',
                'src'         => ''
              ),
              array(
                'value'       => 'salmon',
                'label'       => 'Salmon',
                'src'         => ''
              ),
              array(
                'value'       => 'blue',
                'label'       => 'Blue',
                'src'         => ''
              ),
              array(
                'value'       => 'purple',
                'label'       => 'Purple',
                'src'         => ''
              ),
              array(
                'value'       => 'orange',
                'label'       => 'Orange',
                'src'         => ''
              ),
              array(
                'value'       => 'lightblue',
                'label'       => 'Light Blue',
                'src'         => ''
              ),
              array(
                'value'       => 'red',
                'label'       => 'Red',
                'src'         => ''
              ),
              array(
                'value'       => 'teal',
                'label'       => 'Teal',
                'src'         => ''
              ),
              array(
                'value'       => 'grey',
                'label'       => 'Grey',
                'src'         => ''
              ),
              array(
                'value'       => 'sand',
                'label'       => 'Sand',
                'src'         => ''
              ),
              array(
                'value'       => 'taupe',
                'label'       => 'Taupe',
                'src'         => ''
              ),
              array(
                'value'       => 'brown',
                'label'       => 'Brown',
                'src'         => ''
              ),
              array(
                'value'       => 'peach',
                'label'       => 'Peach',
                'src'         => ''
              )
            ),
          )
        )
      ),
      array(
        'id'          => 'leftcontent',
        'label'       => 'Left Content',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'sliderbottom',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'rightcontent',
        'label'       => 'Right Content',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'sliderbottom',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'wmodulehome',
        'label'       => 'Add The Widgetized Module On The Homepage?',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'wmodule',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'makeyourchoice',
            'label'       => 'Make Your Choice',
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'wmoduletop',
        'label'       => 'Display Top Part? (Next Event + Right Content)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'wmodule',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'makechoice',
            'label'       => 'Make Your Choice',
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'wmoduleevent',
        'label'       => 'Display Next Event?',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'wmodule',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'makeyourchoice',
            'label'       => 'Make Your Choice',
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'wmoduleright',
        'label'       => 'Right Content HTML',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'wmodule',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footercontent',
        'label'       => 'Footer Content',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footercustomgb',
        'label'       => 'Use Custom BG?',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'makechoice',
            'label'       => 'Make Your Choice',
            'src'         => ''
          ),
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footerbg',
        'label'       => 'Background',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'smallfooterleftcontent',
        'label'       => 'Small Footer Left Content',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'smallfooterrightcontent',
        'label'       => 'Small Footer Right Content',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )
    )
  );
   
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}