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
                            <form action="#">
                                <fieldset>
                                    <div class="two-col">
                                        <div class="left">
                                            <div class="box">
                                                <label for="">Ф.И.О.</label>
                                                <input type="text" />
                                            </div>
                                            <div class="box">
                                                <label for="">Ваш e-mail:</label>
                                                <input type="text" />
                                            </div>
                                            <div class="box">
                                                <label for="">Телефон</label>
                                                <input type="text" />
                                            </div>
                                            <div class="box">
                                                <label for="">Адрес</label>
                                                <input type="text" />
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="box">
                                                <p>Способ оплаты</p>
                                                <div class="position">
                                                     <input type="radio" name="money" />
                                                     <label for="">Наличные курьеру</label>
                                                 </div>
                                                 <div class="position">
                                                     <input type="radio" name="money" />
                                                     <label for="">Robokassa (visa, mastercard, yandex)</label>
                                                 </div>
                                            </div>
                                            <div class="box">
                                                <p>Способ доставки</p>
                                                <div class="position">
                                                     <input type="radio" name="howto" />
                                                     <label for="">Курьер</label>
                                                 </div>
                                                 <div class="position">
                                                     <input type="radio" name="howto" />
                                                     <label for="">Самовывоз</label>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-send">
                                        <input type="submit" value="" />
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