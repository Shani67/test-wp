<?php

// wp_enqueue_style('inner-banner-css');

$css_path = get_template_directory() . '/assets/css/components/inner-banner.css';
if (file_exists($css_path)) {
    echo '<style>';
    readfile($css_path);
    echo '</style>';
}

?>
