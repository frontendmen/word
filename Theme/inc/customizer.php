<?php
/**
 * Obsługa dostosowywania motywu WordPress
 *
 * @package MojeMotyw
 */

function moje_motyw_customize_register( $wp_customize ) {
    // Sekcja dostosowywania
    $wp_customize->add_section( 'moje_motyw_theme_options', array(
        'title'    => 'Opcje motywu',
        'priority' => 200,
    ) );

    // Opcja koloru tła
    $wp_customize->add_setting( 'background_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
        'label'    => 'Kolor tła',
        'section'  => 'moje_motyw_theme_options',
        'settings' => 'background_color',
    ) ) );

    // Opcja nagłówka
    $wp_customize->add_setting( 'header_text', array(
        'default'           => 'Nagłówek Motywu',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'header_text', array(
        'label'    => 'Tekst nagłówka',
        'section'  => 'moje_motyw_theme_options',
        'settings' => 'header_text',
    ) );

    // Inne opcje dostosowywania

}
add_action( 'customize_register', 'moje_motyw_customize_register' );

// Stylizacja CSS na podstawie opcji dostosowywania
function moje_motyw_customize_css() {
    $background_color = get_theme_mod( 'background_color', '#ffffff' );
    $header_text = get_theme_mod( 'header_text', 'Nagłówek Motywu' );

    $custom_css = "
        body {
            background-color: $background_color;
        }
        .site-header {
            background-color: $background_color;
        }
        .site-header h1 {
            color: $header_text;
        }
    ";

    wp_add_inline_style( 'moj-motyw-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'moje_motyw_customize_css' );