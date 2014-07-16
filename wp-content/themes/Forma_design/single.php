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

                            <script>
                                $("#zoom").elevateZoom({ zoomType	 : "inner", cursor: "crosshair" });
                            </script>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="prod-name">
                            <a href="<?php echo (get_permalink(13));?>" class="forw"></a>
                            <span><?php if (get_the_title($post->id) == "") { echo "Без названия";} else {echo the_title();}; ?></span>
                        </div>
                        <div class="about-product">
                            <?php echo content(80)?>
                            <div class="change-parameters">
                                <form action="#">
                                    <fieldset>
                                        <div class="line">
                                            <div class="select-box">
                                               <label>Цвет:</label>
                                               <select>
                                                   <?php foreach (simple_fields_fieldgroup("color", $post->ID) as $color){ ?>
<!--                                                       --><?php //var_dump($color)?>
<!--                                                   <option>--><?php //echo $color; ?><!--</option>-->
                                                   <?php }; ?>
                                               </select>
                                            </div>
                                            <div class="select-box">
                                               <label>Размер</label>
                                               <select>
                                                   <?php foreach (simple_fields_fieldgroup("sizes_slug", $post->ID) as $size){ ?>
                                                       <option><?php echo $size; ?></option>
                                                   <?php }; ?>
                                               </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="amount">
                                <div class="change">

                                    <div class="all">Количество: <span id="span" >1</span></div>
                                    <input id="count" type = "hidden" name="checkout[167][count]"  value="1">
                                    <div class="plus-minus">
<!--                                        <input type="button" value="+" id="plus" onClick = "doPlus();" />-->
                                        <a class="minus" onClick = "doMinus();" ></a>
                                        <a class="plus" onClick = "doPlus();" ></a>
                                    </div>
                                </div>
                                <script>
                                    function doMinus(){
                                        if(document.getElementById("count").value > 1){
                                            document.getElementById("count").value = --document.getElementById("count").value;
                                            document.getElementById("span").textContent=document.getElementById("count").value;
                                        }
                                    }

                                    function doPlus(){
                                        document.getElementById("count").value = ++document.getElementById("count").value;
                                        document.getElementById("span").textContent=document.getElementById("count").value;
                                    }
                                </script>
                            </div>
                            <div class="product-price"><?php echo simple_fields_fieldgroup("price", $post->ID);  ?></div>
                            <a href="#" class="to-basket"></a>
                            <ul class="product-social">
                                <li><a href="1"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="hFooter"></div>
<?php get_footer();?>