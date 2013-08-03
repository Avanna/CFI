<?php


add_action( 'init', 'create_post_type_events' );
add_action( 'init', 'create_post_taxonomies_events' );
function create_post_type_events() {
	register_post_type( 'events',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Events' )
			),
			'public' => true,
			'has_archive' => true,
                        'menu_position' => 5,
                        'supports' => array('title', 'author', 'thumbnail', 'editor', 'categories', 'comments'),
			'rewrite' => array( 'slug' => 'events_items', 'with_front' => true ),
                        'taxonomies' => array('post_tag') // this is IMPORTANT
		)
	);
}

//ADDS OUR testimonials CATEGORIES

	function create_post_taxonomies_events() {

		//testimonials Categories
		register_taxonomy(

			'events_cats',
			'events',
			array(

				'hierarchical' => true,
				'label' => 'Envents Categories'

			)

		);

	}


?>
