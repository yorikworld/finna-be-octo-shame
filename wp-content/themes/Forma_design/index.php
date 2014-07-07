<?php get_header() ?>
    <div class="content">
        <div class="wrapper">
            <div class="top-slider">
                <ul>
                    <?php foreach (simple_fields_fieldgroup("slider_slug", 9) as $array) {
                        ?>
                        <li>
                            <img src="/timthumb.php?src=<?php echo $array['image_slug']['url'];?>&w=716&h=470&a=tc"/>
                            <h1><?php echo $array['title_slug'];?></h1>
                            <span class="season"><?php echo $array['season_slug'];?></span>
                            <a href="<?php echo $array['link_slug'];?>" class="look"></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <div class="pager"></div>
            </div>
            <div class="content-menu">
                <ul>
                    <li>
                        <div class="head-top">
                            <span>форма</span>
                        </div>
                        <a href="#"><img src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/photopic.png"
                                         height="342" width="211" alt=""/></a>
                    </li>
                    <li>
                        <div class="head-top">
                            <span>форма спорт</span>
                        </div>
                        <a href="#"><img src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/photopic.png"
                                         height="342" width="211" alt=""/></a>
                    </li>
                    <li>
                        <div class="head-top">
                            <span>look</span>
                        </div>
                        <a href="#"><img src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/photopic.png"
                                         height="342" width="211" alt=""/></a>
                    </li>
                    <li>
                        <div class="head-top">
                            <span>sale</span>
                        </div>
                        <a href="#"><img src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/photopic.png"
                                         height="342" width="211" alt=""/></a>
                    </li>
                </ul>
            </div>
            <div class="slogan">
                <div class="wrapper"><?php echo (simple_fields_fieldgroup('slogan',15));?></div>
            </div>
            <div class="vimeo">
                <div class="wrapper">
                    <div class="video">
                        <div class="head-top">
                            <span>look</span>
                        </div>
                        <div class="video-block">
                            <img src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/vimeo.png" height="332"
                                 width="592" alt=""/>
                        </div>
                    </div>
                    <div class="insta-twitter">
                        <div class="left-tw">
                            <div class="head-top">
                                <span>insta</span>
                            </div>
                            <div class="twitter"><p>Сегодня мы запускаем новую осеннюю сообщение из твиттера с ссылкой
                                    на фотографию <a href="#">instagram.com/p/e4_zWAnY/</a></p> 
                            </div>
                        </div>
                        <div class="insta">
                            <div class="head-top">
                                <span>look</span>
                            </div>
                            <img src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/insta.png" height="230"
                                 width="229" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hFooter"></div>
<?php get_footer() ?>