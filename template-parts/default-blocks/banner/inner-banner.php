<?php

// wp_enqueue_style('inner-banner-css');

$css_path = get_template_directory() . '/assets/css/components/inner-banner.css';
if (file_exists($css_path)) {
    echo '<style>';
    readfile($css_path);
    echo '</style>';
}

?>

<?php 
    $banner_image_desktop = get_field('banner_image_desktop');
    $banner_image_tab    = get_field('banner_image_tab');
    $banner_image_mobile = get_field('banner_image_mobile');
    $banner_title = get_field('banner_title');
    $banner_description = get_field('banner_description');
?>

<section class="inner-banner">
    <div class="inner-wrapper">
        <div class="image-wrap">
            <picture>
                <?php if ($banner_image_mobile): ?>
                <source srcset="<?php echo esc_url(webp_image_url($banner_image_mobile['url'])); ?>"
                        media="(max-width: 600px)">
                <?php endif; ?>

                <?php if ($banner_image_tab): ?>
                <source srcset="<?php echo esc_url(webp_image_url($banner_image_tab['url'])); ?>"
                        media="(min-width: 601px) and (max-width: 991px)">
                <?php endif; ?>

                <?php if ($banner_image_desktop): ?>
                <source srcset="<?php echo esc_url(webp_image_url($banner_image_desktop['url'])); ?>"
                        media="(min-width: 992px)">
                <?php endif; ?>

                <img src="<?php echo esc_url(webp_image_url(
                    $banner_image_mobile['url'] 
                    ?: $banner_image_tab['url'] 
                    ?: $banner_image_desktop['url']
                )); ?>" class="img-responsive" alt="Alternative text" title="Image title">
            </picture>
        </div>
        <div class="detail-wrap">
            <h1 class="title primary-font f40 lh40 lsn2 xl-f80 xl-lh80 xl-lsn4 fw4 text-primary js-scroll fade-in-bottom"><?php echo $banner_title; ?></h1>
            <div class="breadcrumb secondary-font f14 lh20 xl-f25 xl-lh30 fw3 uppercase text-center d-flex justify-content-center align-items-center text-primary js-scroll fade-in-bottom"><?php the_breadcrumb(); ?></div>
            <div class="para secondary-font f14 lh27 xl-f18 xl-lh30 xl-ls1_08 fw4 text-primary js-scroll fade-in-bottom"><?php echo $banner_description; ?></div>
        </div>
    </div>
</section>