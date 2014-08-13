<?php get_header();?>
<?php

//unset($_SESSION['product']);
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
//if (!isset($_SESSION)){
//    session_start();
//    $_SESSION[$post->ID] = 0;
//    var_dump($_SESSION);
//}
//else {};
?>
        <div class="content">
            <div class="wrapper">
                <div class="page-all">
                    <div class="product-catalog">
                        <div class="photos-list">
                            <ul>
                                <?php foreach (simple_fields_fieldgroup("preview_slug", $post->ID) as $preview){ ?>
                                    <?php if ($preview['is_image']){ ?>
                                        <?php echo '<li><a href = " '. $preview['image_src']['full']['0'] .' "> <img src="/timthumb.php?src=' . $preview['image_src']['full']['0'] . '&w=120&h=196&a=tc" alt="" /></li>'; ?>
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
                            <a href="javascript:javascript:history.go(-1)" class="forw"></a>
                            <span><?php if (get_the_title($post->id) == "") { echo "Без названия";} else {echo the_title();}; ?></span>
                        </div>
                        <div class="about-product">
                            <?php echo content(80)?>
                            <form method="post">
                                <div class="change-parameters">
                                        <fieldset>
                                            <div class="line">
                                                <div class="select-box">
                                                   <label>Цвет:</label>
                                                   <select name="product[<?php echo $post->ID ?>][color]">
                                                       <?php $color = 1; foreach (simple_fields_fieldgroup("color", $post->ID) as $color){ ?>
                                                       <option><?php if($color !== 1) {echo $color;} else {echo "Н/Д";}; }; ?></option>
                                                   </select>
                                                </div>
                                                <div class="select-box">
                                                   <label>Размер</label>
                                                   <select name="product[<?php echo $post->ID ?>][size]" >
                                                       <?php foreach (simple_fields_fieldgroup("sizes_slug", $post->ID) as $size){ ?>
                                                           <option><?php echo $size; }; ?></option>
                                                   </select>
                                                </div>
                                            </div>
                                        </fieldset>
                                </div>
                                <div class="amount">
                                    <div class="change">
                                        <div class="all">Количество: <span id="span" >1</span></div>

                                        <input id="count" type = "hidden" name="product[<?php echo $post->ID ?>][count]"  value="1">
                                        <div class="plus-minus">
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
                                <div class="product-price"><?php if (simple_fields_fieldgroup("price", $post->ID) == "") {echo "0 грн";} else {echo simple_fields_fieldgroup("price", $post->ID);};   ?></div>
                                <input type="hidden" name="id" value="<?php echo $post->ID ?>" />
                                <input type="hidden" name="product[<?php echo $post->ID ?>][id]" value="<?php echo $post->ID ?>" />
                                <input type="submit"  class="to-basket" value="" />
                            </form>

                            <?php $follow = simple_fields_fieldgroup("follow", 60);?>
                            <ul class="product-social">
                                <li><a href="<?php echo $follow['vk_slug']?>"></a></li>
                                <li><a href="<?php echo $follow['facebook_slug']?>"></a></li>
                                <li><a href="<?php echo $follow['twitter_slug']?>"></a></li>
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