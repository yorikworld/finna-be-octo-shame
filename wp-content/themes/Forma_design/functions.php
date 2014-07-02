<?php
/**
 * Created by PhpStorm.
 * User: yorik
 * Date: 26.06.14
 * Time: 20:32
 */
function theme_scripts() {
    global $wp_styles;
    global $wp_scripts;
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.9.1.min.js"', array('jquery'), '1.0.0' );
    wp_enqueue_script( 'jquery.cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js"', array('jquery'), '1.0.0' );
    wp_enqueue_script( 'formstyler', get_template_directory_uri() . '/js/jquery.formstyler.min.js"', array('jquery'), '1.0.0' );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js"', array('jquery'), '1.0.0' );
    wp_enqueue_style( 'style', get_bloginfo('stylesheet_directory')."/css/style.css" );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

function load_fonts() {
    global $wp_styles;
    unset($wp_styles->registered['open-sans']);
    wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300');
    wp_enqueue_style( 'googleFonts');

}

add_action('wp_print_styles', 'load_fonts');

function create_post_type() { // создаем новый тип записи
    register_post_type( 'settings', // указываем названия типа
        array(
            'labels' => array(
                'name' => __( 'Настройки' ), // даем названия разделу для панели управления
                'singular_name' => __( 'Настройки' ), // даем названия одной записи
                'add_new' => __('Добавить'),// далее полная русификация админ. панели
                'add_new_item' => __('Добавить настройки'),
                'edit_item' => __('Редактировать настройки'),
                'new_item' => __('Новые настройки'),
                'all_items' => __('Все настройки'),
                'view_item' => __('Просмотр настроек'),
                'search_items' => __('Поиск настроек'),
                'not_found' => __('Нет настроек'),
                'not_found_in_trash' => __('настройки не найдены'),
                'menu_name' => 'Настройки сайта'
            ),
            'public' => true,
            'menu_position' => 5, // указываем место в левой баковой панели
            'rewrite' => array('slug' => 'settings'), // указываем slug для ссылок например: mysite/reviews/
            'supports' => array('title') // тут мы активируем поддержку миниатюр
        )
    );
}

add_action( 'init', 'create_post_type' ); // инициируем добавления типа