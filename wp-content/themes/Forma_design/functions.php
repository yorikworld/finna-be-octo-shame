<?php
/**
 * Created by PhpStorm.
 * User: yorik
 * Date: 26.06.14
 * Time: 20:32
 */
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}
register_nav_menus( array(
    'main_menu' => 'Главное меню',
    'footer_menu' => 'Нижнее меню'
) );
function theme_scripts() {
    global $wp_styles;
    global $wp_scripts;
    wp_enqueue_script( 'jquery_zoom', get_template_directory_uri() . '/js/jquery.elevatezoom.js"', array('jquery'), '1.0.0' );
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

function products() { // создаем новый тип записи
    register_post_type( 'products', // указываем названия типа
        array(
            'labels' => array(
                'name' => __( 'Продукты' ), // даем названия разделу для панели управления
                'singular_name' => __( 'Продукты' ), // даем названия одной записи
                'add_new' => __('Добавить'),// далее полная русификация админ. панели
                'add_new_item' => __('Добавить продукты'),
                'edit_item' => __('Редактировать продукт'),
                'new_item' => __('Новые продукты'),
                'all_items' => __('Все продукты'),
                'view_item' => __('Просмотр продуктов'),
                'search_items' => __('Поиск продуктов'),
                'not_found' => __('Нет продуктов'),
                'not_found_in_trash' => __('продукты не найдены'),
                'menu_name' => 'Продукты'

            ),
            'public' => true,
            'menu_position' => 6, // указываем место в левой баковой панели
            'rewrite' => array('slug' => 'products'), // указываем slug для ссылок например: mysite/reviews/
            'supports' => array('title','editor','thumbnail'), // тут мы активируем поддержку миниатюр
            'taxonomies' => array('genre'),
        )
    );
}

add_action( 'init', 'products' ); // инициируем добавления типа


// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_book_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_book_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Категории', 'taxonomy general name' ),
        'singular_name'     => _x( 'Категории', 'taxonomy singular name' ),
        'search_items'      => __( 'Поиск категории' ),
        'all_items'         => __( 'Все категории' ),
        'parent_item'       => __( 'Родительская категория' ),
        'parent_item_colon' => __( 'Parent Genre:' ),
        'edit_item'         => __( 'Редактировать' ),
        'update_item'       => __( 'Обновить' ),
        'add_new_item'      => __( 'Добавить новую категорию' ),
        'new_item_name'     => __( 'Имя новой категории' ),
        'menu_name'         => __( 'Категории' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' )
    );

    register_taxonomy( 'genre', array( 'book' ), $args );

}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function my_project_updated_send_email( $post_id ) {

    // If this is just a revision, don't send the email.
    if ( wp_is_post_revision( $post_id ) )
        return;
    if(!isset($_POST['simple_fields_fieldgroups']['7']['1']))
    echo "<script> alert('Заполените обязательное поле цвет'); window.location.reload() </script>";
    if(!isset($_POST['simple_fields_fieldgroups']['6']['2']))
    echo "<script> alert('Заполените обязательное поле размер'); window.location.reload() </script>";


    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

}

add_action( 'save_post', 'my_project_updated_send_email' );

add_theme_support('post-thumbnails'); // поддержка миниатюр
set_post_thumbnail_size(288, 177, false);