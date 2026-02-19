<?php
/*
	Template Name: Home
*/
get_header();

// wp_enqueue_style('frontpage-css');
$css_path = get_template_directory() . '/assets/css/pages/frontpage.css';

	if (file_exists($css_path)) {
		echo '<style>';
		readfile($css_path);
		echo '</style>';
	}
?>

<?php
	get_footer();
?>

