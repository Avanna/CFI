<?php


add_action( 'init', 'create_post_type_sermons' );
add_action( 'init', 'create_post_taxonomies_sermons' );
function create_post_type_sermons() {
	register_post_type( 'sermons',
		array(
			'labels' => array(
				'name' => __( 'Sermons' ),
				'singular_name' => __( 'Sermons' )
			),
			'public' => true,
			'has_archive' => true,
                        'menu_position' => 5,
                        'supports' => array('title', 'author', 'thumbnail', 'editor', 'categories', 'comments'),
			'rewrite' => array( 'slug' => 'sermons_items', 'with_front' => true ),
                        'taxonomies' => array('post_tag') // this is IMPORTANT
		)
	);
}

//ADDS OUR testimonials CATEGORIES

	function create_post_taxonomies_sermons() {

		//testimonials Categories
		register_taxonomy(

			'sermons_cats',
			'sermons',
			array(

				'hierarchical' => true,
				'label' => 'Sermons Categories'

			)

		);

	}


?>
