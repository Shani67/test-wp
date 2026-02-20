<?php

// wp_enqueue_style('home-banner-css');

    $css_path = get_template_directory() . '/assets/css/components/home-banner.css';

    if (file_exists($css_path)) {
        echo '<style>';
        readfile($css_path);
        echo '</style>';
    } 

?>

