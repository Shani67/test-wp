# test-wp

01. insert nav menu

<?php wp_nav_menu(
    array(
        'theme_location' => 'primary',
        'depth' => 2,
        'menu_class' => 'navbar-nav navbardropdown',
        'menu_id' => 'primary'
    )
); ?>

02. Get post from cpts

    <?php 
        $args = array(
            'post_type' => 'our_services',
            'posts_per_page' => -1, 
            'tax_query' => array(
                array(
                    'taxonomy' => 'types_of_services',
                    'field'    => 'slug',
                    'terms'    => 'work-capital-services', 
                ),
            ),
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) : 
    ?>
        <div class="wrap">
			<?php 
				while ($query->have_posts()) : $query->the_post();
					$service_main_title = get_the_title(get_the_ID());
					$service_title = get_field('service_title', get_the_ID());
					$service_single_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
			?>
            <div class="item">
            </div>
			<?php 
                $n++;
                endwhile; 
            ?>
        </div>
        <?php 
            wp_reset_postdata();
        endif; 
        ?>

03. 
