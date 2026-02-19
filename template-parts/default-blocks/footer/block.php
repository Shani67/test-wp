<?php

// wp_enqueue_style('footer-css');

$css_path = get_template_directory() . '/assets/css/components/footer.css';
if (file_exists($css_path)) {
    echo '<style>';
    readfile($css_path);
    echo '</style>';
}
?>

