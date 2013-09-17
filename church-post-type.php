<?php

add_action( 'init', 'create_churches' );

function create_churches() {
  $labels = array(
    'name' => _x('Churches', 'post type general name'),
    'singular_name' => _x('Church', 'post type singular name'),
    'add_new' => _x('Add New', 'Church'),
    'add_new_item' => __('Add New Church'),
    'edit_item' => __('Edit Church'),
    'new_item' => __('New Church'),
    'view_item' => __('View Church'),
    'search_items' => __('Search Churches'),
    'not_found' =>  __('No Churches found'),
    'not_found_in_trash' => __('No Churches found in Trash'),
    'parent_item_colon' => ''
  );

  $supports = array('title', 'editor','revisions', 'excerpt', 'thumbnail');

  register_post_type( 'church',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
      'rewrite' => array( 'slug' => 'member_churches', 'with_front' => true )
    )
  );
}

add_action('add_meta_boxes', 'ks_add_meta_boxes');

function ks_add_meta_boxes() {
	add_meta_box('church_meta_boxes', 'Church Information', 'church_meta_fields', 'church');
}

function church_meta_fields() {
	global $post;
	
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
	
	$street_add = '';
    if ( isset($_REQUEST['post']) ) {
        $street_add = get_post_meta($_REQUEST['post'],'street_add',true); 
    }
	
	$city = '';
	if ( isset($_REQUEST['post']) ) {
		$city = get_post_meta($_REQUEST['post'],'city',true);
	}

    $state = '';
    if ( isset($_REQUEST['post']) ) {
        $state = get_post_meta($_REQUEST['post'],'state',true); 
     }
	
	$zipcode = '';
	if ( isset($_REQUEST['post']) ) {
		$zipcode = get_post_meta($_REQUEST['post'],'zipcode',true);
	}
	
	$phone = '';
	if ( isset($_REQUEST['post']) ) {
		$phone = get_post_meta($_REQUEST['post'],'phone',true);
	}
	
	$pastor = '';
	if ( isset($_REQUEST['post']) ) {
		$pastor = get_post_meta($_REQUEST['post'],'pastor',true);
	}

  $scripture = '';
  if ( isset($_REQUEST['post']) ) {
    $scripture = get_post_meta($_REQUEST['post'],'scripture',true);
  }

  $website = '';
  if ( isset($_REQUEST['post']) ) {
    $website = get_post_meta($_REQUEST['post'],'website',true);
  }
	
?>
<div id="pharmacy_information">

<div>
<label for="street_add">Street Address</label>
<input id="street_add" class="widefat" name="street_add" value="<?php echo esc_attr($street_add); ?>" type="text">
</div>

<div>
<label for="city">City</label>
<input id="city" class="widefat" name="city" value="<?php echo esc_attr($city); ?>" type="text">
</div>

<div>
<label for="state">State</label>
<input id="state" class="widefat" name="state" value="<?php echo esc_attr($state); ?>" type="text">
</div>

<div>
<label for="phone">Phone Number</label>
<input id="phone" class="widefat" name="phone" value="<?php echo esc_attr($phone); ?>" type="text">
</div>

<div>
<label for="zipcode">Zip Code</label>
<input id="zipcode" class="widefat" name="zipcode" value="<?php echo esc_attr($zipcode); ?>" type="text">
</div>

<div>
<label for="pastor">Pastor</label>
<input id="pastor" class="widefat" name="pastor" value="<?php echo esc_attr($pastor); ?>" type="text">
</div>

<div>
<label for="website">Website</label>
<input id="website" class="widefat" name="website" value="<?php echo esc_attr($website); ?>" type="text">
</div>

<div>
<label for="scripture">Scripture</label>
<textarea id="scripture" class="widefat" name="scripture" type="text" ><?php echo esc_attr($scripture); ?></textarea>
</div>


</div>

<?php
}

add_action('save_post', 'save_church_info'); 
  
function save_church_info($postID){  
    global $post;  
    
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
		  return $postID;
	 }
	
	if ( is_admin() ) {

        if ( isset($_POST['street_add']) ) {
            update_post_meta($postID,'street_add',
                         $_POST['street_add']);
        }
		 
		    if ( isset($_POST['state']) ) {
            update_post_meta($postID,'state',
                                $_POST['state']);
        }

		    if ( isset($_POST['city']) ) {
            update_post_meta($postID,'city',
                                $_POST['city']);
        }	

		    if ( isset($_POST['phone']) ) {
            update_post_meta($postID,'phone',
                                $_POST['phone']);
        }
		
		    if ( isset($_POST['zipcode']) ) {
            update_post_meta($postID,'zipcode',
                                $_POST['zipcode']);
        }

		    if ( isset($_POST['pastor']) ) {
            update_post_meta($postID,'pastor',
                                $_POST['pastor']);
        }

        if ( isset($_POST['scripture']) ) {
            update_post_meta($postID,'scripture',
                                $_POST['scripture']);
        }

        if ( isset($_POST['website']) ) {
            update_post_meta($postID,'website',
                                $_POST['website']);
        }

    }
}
?>