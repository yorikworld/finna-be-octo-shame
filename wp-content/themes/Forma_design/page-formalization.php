<?php //if(!isset($_SESSION['product'])){ wp_redirect( home_url(),302 );}?>
<?php get_header();?>
        <div class="content">
            <div class="wrapper">
                <div class="page-all">
                    <div class="block-main formal">
                        <div class="prod-name">
                            <a class="forw" href="javascript:javascript:history.go(-1)"></a>
                            <span>Оформление заказа</span>
                        </div>
                        <div class="formalization">
                            <form method="post" action="<?php echo (get_permalink(114));?>">
                                <fieldset>
                                    <div class="two-col">
                                        <div class="left">
                                            <div class="box">
                                                <label for="">Ф.И.О.</label>
                                                <input name="finish-order[name]" value="" type="text" />
                                            </div>
                                            <div class="box">
                                                <label for="">Ваш e-mail:</label>
                                                <input name="finish-order[email]" type="text" />
                                            </div>
                                            <div class="box">
                                                <label for="">Телефон</label>
                                                <input name="finish-order[phone]" type="text" />
                                            </div>
                                            <div class="box">
                                                <label for="">Адрес</label>
                                                <input name="finish-order[address]" type="text" />
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="box">
                                                <p>Способ оплаты</p>
                                                <div class="position">
                                                     <input type="radio" name="finish-order[cash]" />
                                                     <label for="">Наличные курьеру</label>
                                                 </div>
                                                 <div class="position">
                                                     <input type="radio" name="finish-order[robocassa]" />
                                                     <label for="">Robokassa (visa, mastercard, yandex)</label>
                                                 </div>
                                            </div>
                                            <div class="box">
                                                <p>Способ доставки</p>
                                                <div class="position">
                                                     <input type="radio" name="finish-order[courier]" />
                                                     <label for="">Курьер</label>
                                                 </div>
                                                 <div class="position">
                                                     <input type="radio" name="finish-order[pickup]" />
                                                     <label for="">Самовывоз</label>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-send">
                                        <input class="finish-order" type="submit" value="" />
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hFooter"></div>
    <?php get_footer();?>