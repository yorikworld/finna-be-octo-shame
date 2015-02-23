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
    echo "<script> alert('Заполните обязательное поле цвет'); javascript:history.go(-1) </script>"; die();}
    if($_POST['simple_fields_fieldgroups']['6']['2'] == null){
        echo "<script> alert('Заполните обязательное поле размер'); javascript:history.go(-1) </script>"; die();}
    }
}

add_action('pre_post_update', 'pre_save_post_action');



/**
 * Вызываем класс на странице редактирования поста.
 */
function call_someClass() {
    new someClass();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'call_someClass' );
    add_action( 'load-post-new.php', 'call_someClass' );
//    add_action( 'admin_init', 'check_in_order', 1 );
}

/**
 * Код класса.
 */
class someClass {

    /**
     * Устанавливаем хуки в момент инициализации класса.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post', array( $this, 'save' ) );
    }

    /**
     * Добавляем дополнительный блок.
     */
    public function add_meta_box( $post_type ) {
        // Устанавливаем типы постов к которым будет добавлен блок
        $post_types = array('orders',);
        if ( in_array( $post_type, $post_types )) {
            add_meta_box(
                'some_meta_box_name'
                ,__( 'Заказ', 'myplugin_textdomain' )
                ,array( $this, 'render_meta_box_content' )
                ,$post_type
                ,'advanced'
                ,'high'
            );
        }
    }

    public function save( $post_id ) {

        /*
         * Нам нужно сделать проверку, чтобы убедится что запрос пришел с нашей страницы,
                 * потому что save_post может быть вызван еще где угодно.
         */

        // Проверяем установлен ли nonce.
        if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) )
            return $post_id;

        $nonce = $_POST['myplugin_inner_custom_box_nonce'];

        // Проверяем корректен ли nonce.
        if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) )
            return $post_id;

        // Если это автосохранение ничего не делаем.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return $post_id;

        // Проверяем права пользователя.
        if ( 'page' == $_POST['post_type'] ) {

            if ( ! current_user_can( 'edit_page', $post_id ) )
                return $post_id;

        } else {

            if ( ! current_user_can( 'edit_post', $post_id ) )
                return $post_id;
        }

        foreach($_POST['upd_product']['post'] as $key => $value){
            $var = array($key => array("color"=>$_POST['upd_product']['post'][$key]['color'], "size"=>$_POST['upd_product']['post'][$key]['size']));
            $json=json_encode($var);
            $_POST['upd_product']['post'][$json]=$_POST['upd_product']['post'][$key];
            unset($_POST['upd_product']['post'][$key]);
            echo $key;
        };
        update_post_meta( $post_id, 'order_meta_key', $_POST['upd_product']['post'] );
    }


    /**
     * Код дополнительного блока.
     *
     * @param WP_Post $post Объект поста.
     */
    public function render_meta_box_content($post)
    {

        wp_nonce_field('myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce');?>

        <script>
    jQuery( document ).ready(function() {
        jQuery(".delete_product").click(function(){
            jQuery(this).parents("ul.item_product").remove();
        });
    });

        </script>

        <?php $value = get_post_meta($post->ID, 'order_meta_key', true);
        foreach ($value as $key => $product) {
            $originalpost_id = $product['id'];
            $originalpost_color = $product['color'];
            $originalpost_size = $product['size'];
            $originalpost_count = $product['count'];
            $originalpost_price = simple_fields_fieldgroup("price", $product['id']);
            ?>
            <ul class="item_product" style="height: 200px;margin: 10px">
            <b><?php echo get_the_title($originalpost_id);?></b>
            <div style="float: left;margin-right: 10px ">
                <a href="<?php echo post_permalink($originalpost_id); ?>">
                    <img
                        src="/timthumb.php?src=<?php echo wp_get_attachment_url(get_post_thumbnail_id($originalpost_id)) ?
                            wp_get_attachment_url(get_post_thumbnail_id($originalpost_id)) :
                            "/wp-content/uploads/noimage.jpg";?>&w=120&h=196&a=tc"/></a>
            </div>
            <div>
                <div>
                    <p>Цвет: <select name="upd_product[post][<?php echo $originalpost_id ?>][color]">
                        <?php foreach (simple_fields_fieldgroup("color", $originalpost_id) as $color) { ?>
                            <?php if ($color == $originalpost_color) {
                                echo "<option selected='selected'> $color </option>";
                            } else {
                                echo "<option> $color </option>";
                            };
                        }; ?>
                    </select></p>
                </div>
                <div>
                    <p>Размер: <select name="upd_product[post][<?php echo $originalpost_id ?>][size]">
                        <?php foreach (simple_fields_fieldgroup("sizes_slug", $originalpost_id) as $size) { ?>
                            <?php if ($size == $originalpost_size) {
                                echo "<option selected='selected'> $size </option>";
                            } else {
                                echo "<option> $size </option>";
                            };
                        }; ?>
                    </select></p>
                </div>
                <div>
                    <p>Количество: <input type="text" name="upd_product[post][<?php echo $originalpost_id ?>][count]" value="<?php echo $originalpost_count; ?>" size="3" /> </p>
                    <input type="hidden" name="upd_product[post][<?php echo $originalpost_id ?>][id]" value="<?php echo $originalpost_id ?>" />
                    <p style="float: left;">Цена: <?php echo $originalpost_price; $summ_price = $summ_price + $originalpost_price * $originalpost_count;?></p>
                        <div>
                            <input disabled type="hidden" name="delete_from_order[post][<?php echo $originalpost_id ?>]" value="" />
                            <input disabled type="hidden" name="delete_from_order[post][<?php echo $originalpost_id ?>][color]" value="<?php echo $originalpost_color ?>" />
                            <input disabled type="hidden" name="delete_from_order[post][<?php echo $originalpost_id ?>][size]" value="<?php echo $originalpost_size ?>" />
                            <input disabled type="hidden" name="delete_from_order[order_id]" value="<?php echo $post->ID ?>" />
                            <button style="float: right" class="delete_product" >Удалить</button>
                        </div>

                </div>
            </div>

            </ul><?php

        };?>

        <div>
            <p><b>Общая сумма: <?php echo $summ_price; ?></b></p>
            <hr>
            <p><b>Информация о покупателе: </b></p>
            <p>Ф.И.О: <?php echo get_post_meta($post->ID, 'order_meta_name', true); ?></p>
            <p>E-mail: <?php echo get_post_meta($post->ID, 'order_meta_email', true); ?></p>
            <p>Телефон: <?php echo get_post_meta($post->ID, 'order_meta_phone', true); ?> </p>
            <p>Адресс: <?php echo get_post_meta($post->ID, 'order_meta_address', true); ?></p>
            <p>Способ оплаты: <?php if(get_post_meta($post->ID, 'order_meta_cash', true)){echo "Наличные";}
                elseif(get_post_meta($post->ID, 'order_meta_robocassa', true)){ echo "Робокосса";}
                else {echo "Неизвестно";};?></p>
            <p>Способ доставки: <?php if(get_post_meta($post->ID, 'order_meta_courier', true)){echo "Курьер";}
                elseif(get_post_meta($post->ID, 'order_meta_pickup', true)){ echo "Самовывоз";}
                else {echo "Неизвестно";};?></p>

        </div>
        <?php
    }
}



add_theme_support('post-thumbnails');
set_post_thumbnail_size(288, 177, false);