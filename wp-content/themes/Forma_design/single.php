<?php get_header();?>
        <div class="content">
            <div class="wrapper">
                <div class="page-all">
                    <div class="product-catalog">
                        <div class="photos-list">
                            <ul>
                                <li><img src="img/picpic.png" alt="" /></li>
                                <li><img src="img/picpic.png" alt="" /></li>
                                <li><img src="img/picpic.png" alt="" /></li>
                            </ul>
                        </div>
                        <div class="big-photo">
                            <script>
                                $("#img_01").elevateZoom();
                            </script>
                                <?php if ( have_posts() ) {
                                while ( have_posts() ) {
                                the_post();?>
                                <?php if ( has_post_thumbnail() ) {?>
                                 <img id="zoom" src="/timthumb.php?src=<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>&w=431&h=655&a=tc"
                                   data-zoom-image = "<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>" />
                                   <?php } else { ?>
                                        <img src="/timthumb.php?src=/wp-content/uploads/noimage.jpg&w=177&h=288&a=tc"/>
                                   <?php } ?>
                                   <?php } ?>
                                   <?php } ?>

                        </div>
                    </div>
                    <div class="product-info">
                        <div class="prod-name">
                            <a href="#" class="forw"></a>
                            <span>Футболка серая</span>
                        </div>
                        <div class="about-product">
                            <p>Элегантная футболка серого цвета, новинка осеннего сезона.</p>
                            <p>Состав: 100% хлопок</p>
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
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="amount">
                                <div class="change">
                                    <div class="all">Количество: <span>1</span></div>
                                    <div class="plus-minus">
                                        <a href="#"></a>
                                        <a href="#"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-price">3000 руб.</div>
                            <a href="#" class="to-basket"></a>
                            <ul class="product-social">
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hFooter"></div>
<?php get_footer();?>