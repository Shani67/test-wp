<?php

/*
	Includes
*/
include_once('inc/enqueue-plugins.php');

/*
	Register custom Navigation Walker
*/
function register_navwalker()
{
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

/*
	Bootstrap 5 Nav walter modifier
*/
add_filter('nav_menu_link_attributes', 'bootstrap5_dropdown_fix');
function bootstrap5_dropdown_fix($atts)
{
	if (array_key_exists('data-toggle', $atts)) {
		unset($atts['data-toggle']);
		$atts['data-bs-toggle'] = 'dropdown';
	}
	return $atts;
}

function enqueue_venobox() {
    wp_enqueue_style( 'venobox-css', 'https://unpkg.com/venobox/dist/venobox.min.css', array(), null );
    wp_enqueue_script( 'venobox-js', 'https://unpkg.com/venobox/dist/venobox.min.js', array(), null, true );

    wp_add_inline_script( 'venobox-js', "
        document.addEventListener('DOMContentLoaded', function () {
            new VenoBox({ selector: '.venobox' });
        });
    " );
}
add_action( 'wp_enqueue_scripts', 'enqueue_venobox' );


function custom_resources()
{

	wp_register_style('global-css', get_template_directory_uri() . '/assets/css/abstract/global.css');
	wp_register_style('common-css', get_template_directory_uri() . '/assets/css/abstract/common.css');
	wp_register_style('colors-css', get_template_directory_uri() . '/assets/css/abstract/colors.css');
	wp_register_style('fancybox', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.css');

	wp_enqueue_style('bootstrap-css');
	wp_enqueue_style('global-css');
	wp_enqueue_style('common-css');
	wp_enqueue_style('colors-css');
	wp_enqueue_style('fancybox');

	wp_register_script('bootstrap-js', get_template_directory_uri() . '/plugins/bootstrap/bootstrap.bundle.min.js', array('jquery'), '1.1', true);
	wp_register_script('site-js', get_template_directory_uri() . '/assets/js/site.js', array('jquery'), '1.1', true);
	wp_register_script('fancybox', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.js', array('jquery'), '1.1', true);

	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js');
	wp_enqueue_script('site-js');
	wp_enqueue_script('fancybox');

}
add_action('wp_enqueue_scripts', 'custom_resources');

//add style.php to head 
function dynamic_images_stylesheet()
{
	$custom_css = file_get_contents(get_template_directory() . '/assets/css/custom.php');
	wp_add_inline_style('style-css', $custom_css);
}
add_action('wp_head', 'dynamic_images_stylesheet');

if (!function_exists('custom_setup')) {
	function custom_setup()
	{
		// title tag
		add_theme_support('title-tag');

		// post thumbnails
		add_theme_support('post-thumbnails');


		// register nav menus
		register_nav_menus(array(
			'primary' => __('Main Menu', 'custom'),
			'footer' => __('Footer Menu', 'custom'),
			'mobile' => __('Mobile Menu', 'custom')
		));
	}
}

add_action('after_setup_theme', 'custom_setup');

/*
Lazy-loading Images
*/
function enqueue_lazyload_scripts()
{
	wp_enqueue_script('lazysizes', get_template_directory_uri() . '/plugins/lazyload/lazysizes.min.js', [], null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_lazyload_scripts');

/**
 * Get image alt text, fallback to image title if alt is not available
 */
function get_image_alt_or_title($image)
{
	if (empty($image) || !isset($image['ID'])) {
		return '';
	}

	$alt = get_post_meta($image['ID'], '_wp_attachment_image_alt', true);

	return $alt ? $alt : $image['title'];
}

/**
 * Convert Images to Webp and Compress
 */
function webp_image_url($image_url){
    if (empty($image_url) || preg_match('/\.webp$/i', $image_url))
        return $image_url;

    $upload_dir = wp_upload_dir();
    $image_path = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], $image_url);
    $webp_path = preg_replace('/\.(jpe?g|png)$/i', '.webp', $image_path);
    $webp_url = preg_replace('/\.(jpe?g|png)$/i', '.webp', $image_url);

    if (!preg_match('/\.(jpe?g|png)$/i', $image_url))
        return $image_url;

    if (!file_exists($webp_path) && file_exists($image_path)) {
        @ini_set('memory_limit', '256M');
        $ext = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));

        switch ($ext) {
            case 'jpg':
            case 'jpeg':
                $image = @imagecreatefromjpeg($image_path);
                break;
            case 'png':
                $image = @imagecreatefrompng($image_path);
                if ($image) {
                    imagepalettetotruecolor($image);
                    imagealphablending($image, false);
                    imagesavealpha($image, true);
                }
                break;
            default:
                return $image_url;
        }

        if ($image) {
            imagewebp($image, $webp_path, 80);
            imagedestroy($image);
        }
    }
    return file_exists($webp_path) ? $webp_url : $image_url;
}

dd_action('wp_dashboard_setup', 'add_lighthouse_dashboard_widget');

// Breadcrum 

function the_breadcrumb() {

	$url = site_url();
	
    $sep =   ' / ';


    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        // bloginfo('name');
        echo '</a>';
		echo ' | ';

// If the current page is a single post, show its title with the separator

// 	if (is_singular('rooms_suites')) {
// 		echo '<a href="';
// 		echo get_option('home');
// 		echo '/rooms">';
// 		echo 'Rooms';
// 		echo '</a>';
// 		echo '  <svg xmlns="http://www.w3.org/2000/svg" width="5" height="4" viewBox="0 0 5 4" fill="none">
//   <circle cx="2.5" cy="2" r="2" fill="#D5CABC"/>
// </svg>  ';
// 	}
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.

        $term = get_queried_object();
        // var_dump($term);
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } 
            // else {
            //     _e( 'Blog Archives', 'text_domain' );
            // }
        }   
        if(is_tax()){
            _e( $term->name );
        }
	// If the current page is a single post, show its title with the separator
		if(is_single()){
			echo '';
			// echo $sep;
			the_title();
		}

	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

		if (is_page()) {

			global $post;

			// If page has parent
			if ($post->post_parent) {

				$parent_id = $post->post_parent;
				$breadcrumbs = [];

				// Collect all parents
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a>';
					$parent_id = $page->post_parent;
				}

				// Reverse order
				$breadcrumbs = array_reverse($breadcrumbs);

				// Output parent items with separator
				echo implode(' | ', $breadcrumbs);

				echo ' | ';
			}

			// 🔥 CURRENT PAGE TITLE as <span>
			echo '<span>' . get_the_title() . '</span>';
		}

        echo '</div>';
    }
}
