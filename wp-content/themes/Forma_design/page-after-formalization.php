<?php get_header();?>
<?php
if (isset($_POST['finish-order'])&&!empty($_POST['finish-order'])) {
    $makeorder = array();
    $makeorder['post_type'] = 'orders';
    $makeorder['post_title'] = $_POST['finish-order']['email'];
    $post_id = wp_insert_post( $makeorder, false );
    echo $post_id;
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