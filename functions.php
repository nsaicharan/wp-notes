<?php 

	function notes_files() {
		wp_enqueue_style( 'notes-styles', get_theme_file_uri( '/style.css' ), NULL, '0.1' );
	}
	add_action( 'wp_enqueue_scripts', 'notes_files' );

	// Notes Post Type
	function notes_post() {
		register_post_type( 'note', array(
			'supports' => array( 'title', 'editor' ),
			'menu_icon' => 'dashicons-welcome-write-blog',
			'show_ui' => true,
			'labels' => array(
				'name' => 'Notes',
				'add_new_item' => 'Add Note',
				'edit_item' => 'Edit Note',
				'all_item' => 'All Notes',
				'singular' => 'Note'
			)
		) );
	}
	add_action( 'init', 'notes_post' );
?>