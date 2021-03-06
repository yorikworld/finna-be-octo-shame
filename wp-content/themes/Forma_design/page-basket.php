<?php get_header()?>
    <script>
        jQuery(document).ready(function($){
            $('.minus').click(function(){
               var count= $(this).parents('.change').children('#count').val();
                if(count!=1){
                    count--;
                }
                $(this).parents('.change').children('#count').val(count);
                $(this).parents('.change').find('#span').text(count);
            });
            $('.plus').click(function(){
                var count= $(this).parents('.change').children('#count').val();
                count++;
                $(this).parents('.change').children('#count').val(count);
                $(this).parents('.change').find('#span').text(count);
            });
        });
    </script>
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
                                <?php if (empty($_SESSION['product'])) {echo "Корзина пуста";} else { ?>
                                <?php foreach($_SESSION['product'] as $session){?>
                                    <?php $sum = $sum + simple_fields_fieldgroup("price", $session['id'])* $session['count']?>

                                <li>
                                    <div class="pic">
                                        <?php if (wp_get_attachment_url( get_post_thumbnail_id($session['id']))) {?>
                                        <a href="<?php echo get_permalink($session['id']); ?>"><img src="/timthumb.php?src=<?php echo wp_get_attachment_url( get_post_thumbnail_id($session['id']));?>&w=120&h=196&a=tc" /></a>
                                        <?php } else { ?>
                                        <a href="<?php echo get_permalink($session['id']); ?>"><img src="/timthumb.php?src=/wp-content/uploads/noimage.jpg&w=120&h=196&a=tc"/></a>
                                            <?php };?>
                                    </div>
                                    <div class="basket-info">
                                        <div class="top">
                                            <a href="<?php echo get_permalink($session['id']); ?>"><h4><?php if (get_the_title($session['id']) == "") {echo "Без названия";} else {echo get_the_title($session['id']);};?></h4></a>
                                            <span class="price"><?php if (simple_fields_fieldgroup("price", $session['id']) == "") {echo "0 грн";} else ?> Цена: <?php echo simple_fields_fieldgroup("price", $session['id']);?></span>
                                            <br><br>
                                            <span class="price"><?php if (simple_fields_fieldgroup("price", $session['id']) == "") {echo "0 грн";} else ?> Сумма: <?php echo simple_fields_fieldgroup("price", $session['id'])* $session['count'];?></span>
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
                                                               <select name="delete[<?php echo $session['id'] ?>][color]">
                                                                   <?php foreach (simple_fields_fieldgroup("color", $session['id']) as $color){ ?>
                                                                   <?php if ($color == $session['color']) {echo "<option selected='selected'> $color </option>"; $ses_color = $color;} else {?>
                                                                    <?php echo "<option> $color </option>";
                                                                       };
                                                                   }; ?>
                                                               </select>
                                                            </div>
                                                            <div class="select-box">
                                                               <label>Размер</label>
                                                                <select name="delete[<?php echo $session['id'] ?>][size]">
                                                                   <?php foreach (simple_fields_fieldgroup("sizes_slug", $session['id']) as $size){ ?>
                                                                       <?php if ($size == $session['size']) {echo "<option selected='selected'> $size </option>"; $ses_size = $size;} else {?>
                                                                           <?php echo "<option> $size </option>";
                                                                       };
                                                                   }; ?>
                                                               </select>
                                                            </div>
                                                            <div class="change">
                                                                <div class="all">Количество: <span id="span"><?php echo $session['count'] ?></span></div>
                                                                <input id="count" type = "hidden" name="product[<?php echo $session['id'] ?>][count]"  value="<?php echo $session['count']?>">
                                                                <div class="plus-minus">
                                                                    <a class="minus"></a>
                                                                    <a class="plus"></a>
                                                                </div>
                                                            </div>
                                                           </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <form method="post">
                                                <input type="hidden" name="delete[<?php echo $session['id']?>][color]" value="<?php echo $ses_color; ?>" />
                                                <input type="hidden" name="delete[<?php echo $session['id']?>][size]" value="<?php echo $ses_size; ?>" />
                                                <input type="hidden" name="delete[<?php echo $session['id']?>][count]" value="<?php echo $session['count']; ?>" />
                                                <input type="hidden" name="delete[<?php echo $session['id']?>][id]" value="<?php echo $session['id'] ?>" />
                                                <input type="hidden" name="id" value="<?php echo $session['id'] ?>" />
                                                <input type="submit" class="delete-product"  value="" />
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <?php };
                                };?>
                            </ul>
                            <div class="result">
                                <div class="summ">
                                    <p>Итого:</p>
                                  <p><span> <?php echo $sum;?></span></p>
                                </div>
                                <form method="post" action="<?php echo (get_permalink(108));?>">
                                <input type="submit" name="make-order" class="make-order" value="">
                                </form>
<!--                                <a href=""  class="make-order"></a>-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hFooter"></div>
<?php get_footer();?>