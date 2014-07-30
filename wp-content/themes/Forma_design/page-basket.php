<?php get_header()?>
        <div class="content">
            <div class="wrapper">
                <div class="page-all">
                    <div class="block-main basket-block">
                        <div class="prod-name">
                            <a class="forw" href="javascript:javascript:history.go(-1)"></a>
                            <span>Корзина</span>
                        </div>
                        <div class="basket-list">
                            <ul>
                                <?php $sum = 0; ?>
                                <?php foreach($_SESSION['product'] as $session){?>
                                    <?php $sum = $sum + simple_fields_fieldgroup("price", $session['id'])?>

                                <li>
                                    <div class="pic">
                                        <?php if (wp_get_attachment_url( get_post_thumbnail_id($session['id']))) {?>
                                        <img src="/timthumb.php?src=<?php echo wp_get_attachment_url( get_post_thumbnail_id($session['id']));?>&w=120&h=196&a=tc" />
                                        <?php } else { ?>
                                          <img src="/timthumb.php?src=/wp-content/uploads/noimage.jpg&w=120&h=196&a=tc"/>
                                            <?php };?>
                                    </div>
                                    <div class="basket-info">
                                        <div class="top">
                                            <h4><?php if (get_the_title($session['id']) == "") {echo "Без названия";} else {echo get_the_title($session['id']);};?></h4>
                                            <span class="price"><?php if (simple_fields_fieldgroup("price", $session['id']) == "") {echo "0 грн";} else echo simple_fields_fieldgroup("price", $session['id']);?></span>
                                        </div>
                                        <?php $thetitle = get_post_field('post_content', $session['id']); ?>
                                        <?php $getlength = strlen($thetitle);?>
                                        <?php $thelength = 150;?>
                                        <?php ?>
                                        <p><?php echo substr($thetitle, 0, $thelength);?>
                                           <?php if ($getlength > $thelength) echo "...";?></p>
                                        <div class="bottom">
                                            <div class="change-parameters">
                                                <form action="#">
                                                    <fieldset>
                                                        <div class="line">
                                                            <div class="select-box">
                                                               <label>Цвет:</label>
                                                               <select>
                                                                   <option>Белый</option>
                                                                   <option>Серый</option>
                                                                   <option>Черный</option>
                                                               </select>
                                                            </div>
                                                            <div class="select-box">
                                                               <label>Размер</label>
                                                               <select>
                                                                   <option>40</option>
                                                                   <option>42</option>
                                                                   <option>44</option>
                                                               </select>
                                                            </div>
                                                            <div class="change">
                                                                <div class="all">Количество: <span>1</span></div>
                                                                <div class="plus-minus">
                                                                    <a href="#"></a>
                                                                    <a href="#"></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <span class="delete-product"></span>
                                        </div>
                                    </div>
                                </li>
                                <?php };?>
                            </ul>
                            <div class="result">
                                <div class="summ">
                                    <p>Итого:</p>
                                  <p><span> <?php echo $sum;?></span></p>
                                </div>
                                <a href="#" class="make-order"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hFooter"></div>
<?php get_footer();?>