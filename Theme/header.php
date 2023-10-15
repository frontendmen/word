<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head><link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container">
            <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo_height = '50'; // Set your desired height
        $logo_width = '50'; // Set your desired width

        if ($custom_logo_id) {
            $custom_logo_attr = array(
                'class' => 'custom-logo',
                'height' => $logo_height,
                'width' => $logo_width,
            );

            echo wp_get_attachment_image($custom_logo_id, 'full', false, $custom_logo_attr);
        } else {
            echo '<img src="' . esc_url(get_template_directory_uri() . '/path-to-default-logo.png') . '" alt="Your Logo" height="' . $logo_height . '" width="' . $logo_width . '" />';
        }
        ?>
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                  <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'menu_class' => 'header-menu-list', // Add a CSS class to the menu
                    ));
                   ?>
            </div>
        </nav>
    </header>