<!doctype html>
<html lang="en" xml:lang="en">

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <title><?php bloginfo('name');
   echo ' | ';
   is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
   <meta name="description" content="">
   <meta name="keywords" content="">
   <!-- Facebook Meta Tags -->
   <meta property="og:url" content="<?php echo site_url(); ?>">
   <meta property="og:type" content="website">
   <meta property="og:title" content="<?php bloginfo('name');
   echo ' | ';
   is_front_page() ? bloginfo('description') : wp_title(''); ?>">
   <meta property="og:description" content="">
   <meta property="og:image" content="">
   <!-- Twitter Meta Tags -->
   <meta name="twitter:card" content="summary_large_image">
   <meta property="twitter:domain" content="">
   <meta property="twitter:url" content="<?php echo site_url(); ?>">
   <meta name="twitter:title" content="<?php bloginfo('name');
   echo ' | ';
   is_front_page() ? bloginfo('description') : wp_title(''); ?>">
   <meta name="twitter:description" content="">
   <meta name="twitter:image" content="">
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content">Skip to main content</a>

<header class="site-header" role="banner">
  <div class="container">

    <!-- Accessibility toolbar -->
    <div class="a11y-toolbar" aria-label="Accessibility tools">
      <button type="button" id="a11y-text-dec" aria-label="Decrease text size">A−</button>
      <button type="button" id="a11y-text-inc" aria-label="Increase text size">A+</button>

      <button type="button" id="a11y-read" aria-pressed="false" aria-label="Read this page aloud">
        Read aloud
      </button>

      <span id="a11y-status" class="screen-reader-text" aria-live="polite"></span>
    </div>

    <div class="header-row">
      <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
        <?php bloginfo('name'); ?>
      </a>

      <nav class="primary-nav" aria-label="Primary navigation">
        <?php
          wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'fallback_cb'    => false,
          ]);
        ?>
      </nav>
    </div>

  </div>
</header>
   
<?php
   // get_template_part('template-parts/default-blocks/header/block');
   get_template_part('template-parts/default-blocks/banner/block');
 ?>