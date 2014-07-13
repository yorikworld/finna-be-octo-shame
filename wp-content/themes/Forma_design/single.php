<?php get_header();?>
        <div class="content">
            <div class="wrapper">
                <div class="page-all">
                    <div class="product-catalog">
                        <div class="photos-list">
                            <ul>
                                <?php foreach (simple_fields_fieldgroup("preview_slug", $post->ID) as $preview){ ?>
                                    <?php if ($preview['is_image']){ ?>
                                        <?php echo '<li><img src="/timthumb.php?src=' . $preview['image_src']['full']['0'] . '&w=120&h=196&a=tc" alt="" /></li>'; ?>
                                    <?php } else { ?>
                                        <?php echo '<li><img src="/timthumb.php?src=/wp-content/uploads/noimage.jpg&w=120&h=196&a=tc" alt="" /></li>'; ?>
                                    <?php } ?>
                                <?php } ?>
<!--                               --><?php //var_dump($preview);?>
                            </ul>
                        </div>
                        <div class="big-photo">

                                <?php if ( have_posts() ) {
                                while ( have_posts() ) {
                                the_post();?>
                                <?php if ( has_post_thumbnail() ) {?>
                                 <img id="zoom" src="/timthumb.php?src=<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>&w=431&h=655&a=tc"
                                   data-zoom-image ="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>" />
                                   <?php } else { ?>
                                        <img src="/timthumb.php?src=/wp-content/uploads/noimage.jpg&w=177&h=288&a=tc"/>
                                   <?php } ?>
                                   <?php } ?>
                                   <?php } ?>
                            <script>
                                $("#zoom").elevateZoom({ zoomType	 : "inner", cursor: "crosshair" });
                            </script>
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