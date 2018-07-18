<?php 

	function notes_files() {
		wp_enqueue_style( 'notes-styles', get_theme_file_uri( '/style.css' ), NULL, '0.1' );
	}
	add_action( 'wp_enqueue_scripts', 'notes_files' );
	
?>