<?php 

	function notes_files() {
		wp_enqueue_style( 'site-styles', get_theme_file_uri( '/style.css' ), NULL, '0.1' );
		wp_enqueue_script( 'site-scripts', get_theme_file_uri( '/js/scripts-dist.js' ), NULL, 1.0, true );
		wp_localize_script( 'site-scripts', 'siteData', array(
			'rootURL' => get_site_url(),
			'nonce' => wp_create_nonce( 'wp_rest' )
		) );
	}
	add_action( 'wp_enqueue_scripts', 'notes_files' );

	// Notes Post Type
	function notes_post() {
		register_post_type( 'note', array(
			'supports' => array( 'title', 'editor' ),
			'menu_icon' => 'dashicons-welcome-write-blog',
			'show_ui' => true,
			'show_in_rest' => true,
			'public' => false,
			'labels' => array(
				'name' => 'Notes',
				'add_new_item' => 'Add Note',
				'edit_item' => 'Edit Note',
				'all_items' => 'All Notes',
				'singular_name' => 'Note'
			)
		) );
	}
	add_action( 'init', 'notes_post' );
?>