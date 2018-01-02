<?php
function tours_post_type(){
	$labels = array(
			'name' 				=> __('Sản phẩm'),
			'singular_name' 	=> __('Sản phẩm'),
			'menu_name'			=> __('Sản phẩm'),
			'name_admin_bar' 	=> __('Sản phẩm'),
			'add_new'			=> __('Thêm sản phẩm'),
			'add_new_item'		=> __('Thêm sản phẩm'),
			'search_items' 		=> __('Tìm kiếm Sản phẩm'),
			'not_found'			=> __('No Sản phẩm found.'),
			'not_found_in_trash'=> __('No Sản phẩm found in Trash'),
			'all_items'			=> __('Tất sản phẩm'),
			'view_item' 		=> __('Xem sản phẩm'),
			'edit_item'			=> __('Sửa sản phẩm'),
	);
	$args = array(
			'labels'               => $labels,
			'description'          => 'Custom Post',
			'public'               => true,
			'hierarchical'         => true,
			'show_in_nav_menus'    => true, //public
			'show_in_admin_bar'    => true, //public
			'menu_position'        => 5,
			//'menu_icon'            => 'dashicons-location-alt',
			'capability_type'      => 'post',
			'supports'             => array('title', 'thumbnail', 'editor', 'excerpt'),
			//'taxonomies'           => array('menu-category'),
			'has_archive'          => true,
			//'query_var' 		   => 'cruise',
			'rewrite'              => array('slug'=>'san-pham'),
			'_edit_link'           => 'post.php?post=%d',
	);
	register_post_type('product',$args);
}
add_action('init', 'tours_post_type');

/* Custom Taxonomy */
function tour_taxonomy(){
	$labels = array(
			'name'				=> 'Danh mục sản phẩm',
			'singular' 			=> 'Danh mục sản phẩm',
			'menu_name'			=> 'Danh mục sản phẩm',
			'edit_item'			=> 'Edit danh mục sản phẩm',
			'update_item'		=> 'Update danh mục sản phẩm',
			'add_new_item'		=> 'Add new danh mục sản phẩm',
			'search_items'		=> 'Search danh mục sản phẩm',
			'popular_items'		=> 'Danh mục sản phẩm are using',
			'separate_items_with_commas' => 'Separate tags with commas 123',
			'choose_from_most_used' => 'Choose from the most used tags 123',
			'not_found'			=> 'No menu category found',
	);
	$args = array(
			'labels' 				=> $labels,
			'public'				=> true,
			'show_tagcloud'			=> true,
			'hierarchical'			=> true,
			'show_admin_column'		=> false,
			'query_var'				=> true,
			'rewrite'				=> array('slug' => 'danh-muc'),
	);
	register_taxonomy('product-category', 'product', $args);
}
add_action('init', 'tour_taxonomy');