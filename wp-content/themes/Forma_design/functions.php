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
            'taxonomies' => array('genre','section'),
        )
    );
}

add_action( 'init', 'products' ); // инициируем добавления типа

function look() { // создаем новый тип записи
    register_post_type( 'look', // указываем названия типа
        array(
            'labels' => array(
                'name' => __( 'look' ), // даем названия разделу для панели управления
                'singular_name' => __( 'look' ), // даем названия одной записи
                'add_new' => __('Добавить'),// далее полная русификация админ. панели
                'add_new_item' => __('Добавить look'),
                'edit_item' => __('Редактировать look'),
                'new_item' => __('Новый look'),
                'all_items' => __('Все look-и'),
                'view_item' => __('Просмотр look-а'),
                'search_items' => __('Поиск'),
                'not_found' => __('Нет look-ов'),
                'not_found_in_trash' => __('look-и не найдены'),
                'menu_name' => 'look'

            ),
            'public' => true,
            'menu_position' => 7, // указываем место в левой баковой панели
            'rewrite' => array('slug' => 'look'), // указываем slug для ссылок например: mysite/reviews/
            'supports' => array('title','editor','thumbnail'), // тут мы активируем поддержку миниатюр
        )
    );
}

add_action( 'init', 'look' ); // инициируем добавления типа

function orders() { // создаем новый тип записи
    register_post_type( 'orders', // указываем названия типа
        array(
            'labels' => array(
                'name' => __( 'Заказы' ), // даем названия разделу для панели управления
                'singular_name' => __( 'orders' ), // даем названия одной записи
                'add_new' => __('Добавить'),// далее полная русификация админ. панели
                'add_new_item' => __('Добавить заказ'),
                'edit_item' => __('Редактировать заказ'),
                'new_item' => __('Новый заказ'),
                'all_items' => __('Все заказы'),
                'view_item' => __('Просмотр заказа'),
                'search_items' => __('Поиск заказа'),
                'not_found' => __('Нет заказов'),
                'not_found_in_trash' => __('заказы не найдены'),
                'menu_name' => 'Заказы'

            ),
            'public' => true,
            'menu_position' => 8, // указываем место в левой баковой панели
            'rewrite' => array('slug' => 'orders'), // указываем slug для ссылок например: mysite/reviews/
            'supports' => array('title','thumbnail'), // тут мы активируем поддержку миниатюр
        )
    );
}

add_action( 'init', 'orders' ); // инициируем добавления типа


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

add_action( 'init', 'site_taxonomies', 0 );

function site_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Разделы сайта', 'taxonomy general name' ),
        'singular_name'     => _x( 'Разделы сайта', 'taxonomy singular name' ),
        'search_items'      => __( 'Поиск раздела' ),
        'all_items'         => __( 'Все разделы' ),
        'parent_item'       => __( 'Родительский раздел' ),
        'parent_item_colon' => __( 'Parent Genre:' ),
        'edit_item'         => __( 'Редактировать' ),
        'update_item'       => __( 'Обновить' ),
        'add_new_item'      => __( 'Добавить новый раздел' ),
        'new_item_name'     => __( 'Имя нового раздела' ),
        'menu_name'         => __( 'Разделы' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'section' )
    );

    register_taxonomy( 'section', array( 'book' ), $args );

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




function pre_save_post_action($post_id) {
    if($_POST['post_type'] == "products"){
    if($_POST['simple_fields_fieldgroups']['7']['1'] == null){
    echo "<script> alert('Заполените обязательное поле цвет'); javascript:history.go(-1) </script>"; die();}
    if($_POST['simple_fields_fieldgroups']['6']['2'] == null){
        echo "<script> alert('Заполените обязательное поле размер'); javascript:history.go(-1) </script>"; die();}
    }
}

add_action('pre_post_update', 'pre_save_post_action');



add_theme_support('post-thumbnails'); // поддержка миниатюр
set_post_thumbnail_size(288, 177, false);