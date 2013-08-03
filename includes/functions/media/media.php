<?php


add_action( 'init', 'create_post_type_videogallery' );
add_action( 'init', 'create_post_taxonomies_videogallery' );
function create_post_type_videogallery() {
	register_post_type( 'videogallery',
		array(
			'labels' => array(
				'name' => __( 'Video/Gallery' ),
				'singular_name' => __( 'Video/Gallery' )
			),
			'public' => true,
			'has_archive' => true,
                        'menu_position' => 5,
                        'supports' => array('title', 'author', 'thumbnail', 'editor', 'categories', 'comments'),
			'rewrite' => array( 'slug' => 'videogallery_items', 'with_front' => true ),
                        'taxonomies' => array('post_tag') // this is IMPORTANT
		)
	);
}

//ADDS OUR testimonials CATEGORIES

	function create_post_taxonomies_videogallery() {

		//testimonials Categories
		register_taxonomy(

			'videogallery_cats',
			'videogallery',
			array(

				'hierarchical' => true,
				'label' => 'Video/Gallery Categories'

			)

		);

	}


?>
