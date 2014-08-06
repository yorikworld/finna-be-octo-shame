<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>forma</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="keywords" />
    <meta name="description" content="description" />
    <?php wp_head();
    session_start();
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    if(isset($_POST['product'])&&!empty($_POST['product'])){
        $product= $_POST['product'];
        unset($product[$_POST['id']]['count']);
        unset($product[$_POST['id']]['id']);

        $_SESSION['product'][json_encode($product)]=$_POST['product'][$_POST['id']];


    };
    if (isset($_POST['delete'])&&!empty($_POST['delete'])) {
        $delete = $_POST['delete'];
        unset($delete[$_POST['id']]['count']);
        unset($delete[$_POST['id']]['id']);
    print($_SESSION['product']['id'][json_encode($delete)]);
    }
//unset($_SESSION['product']);
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    ?>
</head>
<body>
<div class="page">
    <div class="header">
        <div class="wrapper">
            <div class="logo-block">
                <a id="logo" href="/"></a>
                <div class="phone">
                    <?php echo (simple_fields_fieldgroup('telephone',7));?>
                    </div>
            </div>
            <div class="menu-area">
                <ul class="main-menu">
                    <li class="active"><a href="<?php echo (get_permalink(13));?>">Форма</a></li>
                    <li><a href="<?php echo (get_permalink(61));?>">Форма спорт</a></li>
                    <li><a href="<?php echo (get_permalink(64));?>">Аксессуары</a></li>
                    <li><a href="<?php echo (get_permalink(66));?>">Sale</a></li>
                    <li><a href="<?php echo (get_permalink(68));?>">О нас</a></li>
                    <li><a href="<?php echo (get_permalink(70));?>">Контакты</a></li>
                </ul>
                <div class="basket">
                    <p class="head"><a href="<?php echo (get_permalink(73));?>">корзина</a></p>
                    <?php $basket = 0;?>
                    <?php foreach($_SESSION['product'] as $session){?>
                    <?php $basket++?>
                    <?php };?>
                    <p><strong><?php echo $basket; ?></strong> товаров</p>
                    <?php $sum = 0;?>
                    <?php foreach($_SESSION['product'] as $sessionprice){?>
                    <?php $sum = $sum + simple_fields_fieldgroup("price", $sessionprice['id']) * $sessionprice['count']?>
                    <?php };?>
                    <p><strong><?php echo $sum; ?></strong> руб.</p>
                </div>
                <ul class="language">
                    <li><a href="#">En</a></li>
                    <li><a href="#">Rus</a></li>
                </ul>
            </div>
        </div>
    </div>