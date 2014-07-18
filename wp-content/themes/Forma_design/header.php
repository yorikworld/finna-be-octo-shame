<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>forma</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="keywords" />
    <meta name="description" content="description" />
    <?php wp_head(); ?>
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
                    <p class="head">корзина</p>
                    <p><strong>3</strong> товаров</p>
                    <p><strong>10500</strong> руб.</p>
                </div>
                <ul class="language">
                    <li><a href="#">En</a></li>
                    <li><a href="#">Rus</a></li>
                </ul>
            </div>
        </div>
    </div>