<?php
/*
Template Name: catalog
*/
get_header()?>
        <div class="content">
            <div class="wrapper">
                <div class="page-all">
                    <div class="sidebar">
                        <?php $hiterms = get_terms("genre", array("orderby" => "id", "parent" => 0, "hide_empty" => false)); ?>
                        <?php foreach ($hiterms as $key => $hiterm) : ?>
                            <div class="box-sex">
                                <h3><a href="<?php echo get_term_link( $hiterm, "genre");?>"><?php echo $hiterm->name; ?></a></h3>
                                <?php $loterms = get_terms("genre", array("orderby" => "slug", "parent" => $hiterm->term_id, "hide_empty" => false)); ?>
                                <?php if ($loterms) : ?>
                                    <ul>
                                        <?php foreach ($loterms as $key => $loterm) : ?>
                                            <li><a href="<?php echo get_term_link( $loterm, "genre");?>"><?php echo $loterm->name; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="content-main">
                        <ul class="catalog">
                            <li><a href="#"><img src="<?php echo get_bloginfo( 'stylesheet_directory') ?>/img/catalog-pic.png" height="288" width="177" alt="" /></a></li>
                            <li><a href="#"><img src="<?php echo get_bloginfo( 'stylesheet_directory') ?>/img/catalog-pic2.png" height="288" width="177" alt="" /></a></li>
                            <li><a href="#"><img src="<?php echo get_bloginfo( 'stylesheet_directory') ?>/img/catalog-pic.png" height="288" width="177" alt="" /></a></li>
                            <li><a href="#"><img src="<?php echo get_bloginfo( 'stylesheet_directory') ?>/img/catalog-pic3.png" height="288" width="177" alt="" /></a></li>
                            <li><a href="#"><img src="<?php echo get_bloginfo( 'stylesheet_directory') ?>/img/catalog-pic.png" height="288" width="177" alt="" /></a></li>
                            <li><a href="#"><img src="<?php echo get_bloginfo( 'stylesheet_directory') ?>/img/catalog-pic2.png" height="288" width="177" alt="" /></a></li>
                            <li><a href="#"><img src="<?php echo get_bloginfo( 'stylesheet_directory') ?>/img/catalog-pic3.png" height="288" width="177" alt="" /></a></li>
                            <li><a href="#"><img src="<?php echo get_bloginfo( 'stylesheet_directory') ?>/img/catalog-pic.png" height="288" width="177" alt="" /></a></li>
                            <li><a href="#"><img src="<?php echo get_bloginfo( 'stylesheet_directory') ?>/img/catalog-pic3.png" height="288" width="177" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="hFooter"></div>
<?php get_footer()?>