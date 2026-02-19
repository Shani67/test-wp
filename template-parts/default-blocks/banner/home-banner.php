<?php

// wp_enqueue_style('home-banner-css');

    $css_path = get_template_directory() . '/assets/css/components/home-banner.css';

    if (file_exists($css_path)) {
        echo '<style>';
        readfile($css_path);
        echo '</style>';
    } 

?>

<?php
    $home_banner_listing = get_field("home_banner_listing");
?>

<section class="home-banner">
    <div class="inner-wrapper">
        <div class="banner-listing">
            <?php
                foreach($home_banner_listing as $banner_item):
                    $video_url					= $banner_item["video_url"];
                    $main_title				= $banner_item["main_title"];
                    $content				= $banner_item["content"];
            ?>
            <div class="banner-item">
                <div class="video-wrapper">
                    <?php if($video_url): ?>
                        <div class="main">
                            <a data-fancybox data-type="video" href="<?php echo esc_url($video_url); ?>" class="icon-inner td-none">
                                <video class="Video-item" playsinline autoplay muted loop id="emarkVideo" src="<?php echo esc_url($video_url); ?>"></video>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="detail-wrapper">
                    <div class="title-wrap js-scroll fade-in-bottom">
                        <h2 class="main-title primary-font f40 lh40 lsn2 xl-f80 xl-lh80 xl-lsn4 fw4 text-primary "><?php echo ($main_title); ?></h2>
                        <p class="content secondary-font f14 lh20 ls0_84 xl-f25 xl-lh30 xl-ls1_5 fw3 text-primary uppercase "><?php echo ($content); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>