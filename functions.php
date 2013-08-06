<?php

include('church-post-type.php');

/*
* Include OptionTree plugin for theme options.
*/

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_true' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

global $options;
$options = get_option('option_tree');

/**
 * Required: include OptionTree.
 */
include_once( get_template_directory() . '/option-tree/ot-loader.php' );



// Page Navigation

function kriesi_pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<ul class='pagination clearfix'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a class='button-small brown rounded3' href='".get_pagenum_link(1)."'>&laquo;</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<a class='button-small brown rounded3' href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><span class='button-small brown rounded3 current' style='background: #352C22;'>".$i."</span></li>":"<li><a class='button-small brown rounded3' href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li><a class='button-small brown rounded3' href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a class='button-small brown rounded3' href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
         echo "</ul>\n";
     }
}

// Custom menu 


add_theme_support('nav-menus');

register_nav_menu('main_menu', 'Main Menu');

function display_home2() {
    echo '<ul class="clearfix">
		';
    wp_list_pages('title_li=&depth=3');
    echo '</nav>';
}

class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<span class="title">';
           $append = '</span>';
           $description  = ! empty( $item->description ) ? '<span class="description">'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}



// Post Thumbnails

  add_theme_support( 'post-thumbnails' ); 
 
add_theme_support('automatic-feed-links');
// Ready for theme localisation
load_theme_textdomain('localization');

include("includes/metaboxes/metaboxes.php");
require_once TEMPLATEPATH . '/includes/comment-list.php';

/* ==OTHER FUNCTION === */

function ddTimthumb($img, $width, $height) {

    return get_template_directory_uri() . '/includes/timthumb.php?q=100&amp;zc=1&amp;src=' . $img . '&amp;w=' . $width . '&amp;h=' . $height;
}


// Registering our sidebar


if (function_exists('register_sidebar')) {
register_sidebar(array(
'name' => 'Pages',
'before_widget' => '<li class="widget"><div id="%1$s" class="%2$s">',
'after_widget' => '</div></li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
}

if (function_exists('register_sidebar')) {
register_sidebar(array(
'name' => 'Single Event',
'before_widget' => '<li class="widget"><div id="%1$s" class="%2$s">',
'after_widget' => '</div></li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
}
if (function_exists('register_sidebar')) {
register_sidebar(array(
'name' => 'Single Sermon',
'before_widget' => '<li class="widget"><div id="%1$s" class="%2$s">',
'after_widget' => '</div></li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
}
if (function_exists('register_sidebar')) {
register_sidebar(array(
'name' => 'Single Media',
'before_widget' => '<li class="widget"><div id="%1$s" class="%2$s">',
'after_widget' => '</div></li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
}
if (function_exists('register_sidebar')) {
register_sidebar(array(
'name' => 'Single Blog Post',
'before_widget' => '<li class="widget"><div id="%1$s" class="%2$s">',
'after_widget' => '</div></li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
}

if (function_exists('register_sidebar')) {
register_sidebar(array(
'name' => 'Widgetized Module',
'before_widget' => '<li class="four columns widget"><div id="%1$s" class="%2$s">',
'after_widget' => '</div></li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
}


if (function_exists('register_sidebar')) {
register_sidebar(array(
'name' => 'Blog',
'before_widget' => '<li class="widget"><div id="%1$s" class="%2$s">',
'after_widget' => '</div></li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
}




// Set custom query + Take it off + Related Post

function dd_set_query($custom_query=null) { global $wp_query, $wp_query_old, $post, $orig_post;

	$wp_query_old = $wp_query;

	$wp_query = $custom_query;

	$orig_post = $post;

}

function dd_restore_query() {  global $wp_query, $wp_query_old, $post, $orig_post;

	$wp_query = $wp_query_old;

	$post = $orig_post;

	setup_postdata($post);

}



include('includes/functions/sermons/sermons.php');
include('includes/functions/media/media.php');
include('includes/functions/events/events.php');






function cdfScripts() {

 
    wp_register_script('script', get_template_directory_uri() . '/js/script.js');

    wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js');
  
    wp_register_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js');
 
    wp_register_script('easing', get_template_directory_uri() . '/js/hoverIntent.js');
    
    wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js');
    
    wp_register_script('jPlayer', get_template_directory_uri() . '/js/jPlayer/js/jquery.jplayer.min.js');
        wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js');
    
    //enqueues our scripts. let's enqueue jquery first to just make sure its loaded first in any case

    wp_enqueue_script('jquery');
    wp_enqueue_script('script');

    wp_enqueue_script('prettyPhoto');
    wp_enqueue_script('jPlayer');
    wp_enqueue_script('hoverIntent');
    wp_enqueue_script('superfish');
    wp_enqueue_script('flexslider');
     wp_enqueue_script('fitvids');

  
  
}

add_action('wp_enqueue_scripts', 'cdfScripts');

add_post_type_support( 'sermons', 'excerpt' );
add_post_type_support( 'events', 'excerpt' );
add_post_type_support( 'videogallery', 'excerpt' );

include("includes/widget-events.php");
include("includes/widget-sermons.php");
include("includes/widget-media.php");
include("includes/widget-news.php");
include("includes/theme-options.php");
include_once("includes/tgn-meta-boxes.php");

//Google Maps Shortcode
function fn_googleMaps($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "src" => ''
   ), $atts));
   return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe>';
}
add_shortcode("googlemap", "fn_googleMaps");

function ks_excerpt($limit = 25) {
  
  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 

  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

  echo '<p>'.$excerpt.'</p>';
}
