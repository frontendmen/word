<?php
function moj_motyw_enqueue_styles() {
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_style('moj-motyw-style', get_stylesheet_uri());
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '4.5.2', true);
    wp_enqueue_script('moj-motyw-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'moj_motyw_enqueue_styles');

function moj_motyw_setup() {
    // Dodaj obsługę dostosowywania
    require get_template_directory() . '/inc/customizer.php';
    
    // Dodaj obsługę widżetów
    require get_template_directory() . '/inc/widgets.php';
    
    // Inne ustawienia i obsługa motywu
}
add_action('after_setup_theme', 'moj_motyw_setup');

// add style.
function enqueue_custom_styles() {
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/scss/style.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

// register navbar
function register_custom_menu() {
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_custom_menu');

// add logo to customizer
function theme_custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 50, // Set the height of your logo
        'width'       => 150, // Set the width of your logo
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'theme_custom_logo_setup');

// add customizer 
function theme_customize_register($wp_customize) {
    // Logo settings
    $wp_customize->add_section('theme_logo_section', array(
        'title' => __('Logo', 'your-text-domain'),
        'priority' => 20,
    ));

    // Logo height
    $wp_customize->add_setting('theme_logo_height', array(
        'default' => '50', // Default height value
        'sanitize_callback' => 'absint', // Sanitize as an integer
    ));
    $wp_customize->add_control('theme_logo_height', array(
        'label' => __('Logo Height (px)', 'your-text-domain'),
        'section' => 'theme_logo_section',
        'type' => 'number',
    ));

    // Logo width
    $wp_customize->add_setting('theme_logo_width', array(
        'default' => '150', // Default width value
        'sanitize_callback' => 'absint', // Sanitize as an integer
    ));
    $wp_customize->add_control('theme_logo_width', array(
        'label' => __('Logo Width (px)', 'your-text-domain'),
        'section' => 'theme_logo_section',
        'type' => 'number',
    ));
}
add_action('customize_register', 'theme_customize_register');