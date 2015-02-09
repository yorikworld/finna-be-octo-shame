<?php get_header();?>
<?php
if (isset($_POST['finish-order'])&&!empty($_POST['finish-order'])) {
    $order = array();
    $order['post_type'] = 'orders';
    $order['post_title'] = $_POST['finish-order']['email'];
    $order['post_status'] = 'publish';
    $post_id = wp_insert_post( $order, false );
    $i=0;
    foreach ( $_SESSION['product'] as $kay => $value){
        update_post_meta( $post_id, 'order_meta_color_'.$i, $value['color']);
        update_post_meta( $post_id, 'order_meta_size_'.$i, $value['size']);
        update_post_meta( $post_id, 'order_meta_count_'.$i, $value['count']);
        update_post_meta( $post_id, 'order_meta_id_'.$i, $value['id']);
        update_post_meta( $post_id, 'order_meta_price_'.$i, simple_fields_fieldgroup("price", $value['id']));
        $i++;
    };
    update_post_meta( $post_id, 'order_meta_name', $_POST['finish-order']['name']);
    update_post_meta( $post_id, 'order_meta_email', $_POST['finish-order']['email']);
    update_post_meta( $post_id, 'order_meta_phone', $_POST['finish-order']['phone']);
    update_post_meta( $post_id, 'order_meta_address', $_POST['finish-order']['address']);
    update_post_meta( $post_id, 'order_meta_cash', $_POST['finish-order']['cash']);
    update_post_meta( $post_id, 'order_meta_robocassa', $_POST['finish-order']['robocassa']);
};
?>
        <div class="content">
            <div class="wrapper">
                <div class="page-all">
                    <div class="thanks">
                        <p><span>Спасибо за заказ!</span></p>
                        <p>Мы свяжемся с вами в ближайшее время.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="hFooter"></div>
<?php get_footer();?>