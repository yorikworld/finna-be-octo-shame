<?php
get_header()?>
<?php if (have_posts()) : ?>
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
                        <?php while (have_posts()) : the_post(); ?>
                        <?php if ( has_post_thumbnail() )
                            { ?>
                                <?php $attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' =>'image') );?>
                                <?php foreach ( $attachments as $attachment_id => $attachment )
                                    {?>
                                    <li><?php echo ($attachment->post_name) ?><img src="/timthumb.php?src=<?php echo wp_get_attachment_url( $attachment_id, 'medium' );?>&w=177&h=288&a=tc"/></li>
                                    <?php } ?>
                      <?php } else
                                    {?>
                                        <li><img src="/timthumb.php?src=/wp-content/uploads/noimage.jpg&w=177&h=288&a=tc"/></li>
                              <?php } endwhile;     endif; ?>
                    </ul>
                    </div>












<!--                    <ul class="catalog">-->
<!--                        <li><a href="#"><img src="--><?php //echo get_bloginfo( 'stylesheet_directory') ?><!--/img/catalog-pic.png" height="288" width="177" alt="" /></a></li>-->
<!--                        <li><a href="#"><img src="--><?php //echo get_bloginfo( 'stylesheet_directory') ?><!--/img/catalog-pic2.png" height="288" width="177" alt="" /></a></li>-->
<!--                        <li><a href="#"><img src="--><?php //echo get_bloginfo( 'stylesheet_directory') ?><!--/img/catalog-pic.png" height="288" width="177" alt="" /></a></li>-->
<!--                        <li><a href="#"><img src="--><?php //echo get_bloginfo( 'stylesheet_directory') ?><!--/img/catalog-pic3.png" height="288" width="177" alt="" /></a></li>-->
<!--                        <li><a href="#"><img src="--><?php //echo get_bloginfo( 'stylesheet_directory') ?><!--/img/catalog-pic.png" height="288" width="177" alt="" /></a></li>-->
<!--                        <li><a href="#"><img src="--><?php //echo get_bloginfo( 'stylesheet_directory') ?><!--/img/catalog-pic2.png" height="288" width="177" alt="" /></a></li>-->
<!--                        <li><a href="#"><img src="--><?php //echo get_bloginfo( 'stylesheet_directory') ?><!--/img/catalog-pic3.png" height="288" width="177" alt="" /></a></li>-->
<!--                        <li><a href="#"><img src="--><?php //echo get_bloginfo( 'stylesheet_directory') ?><!--/img/catalog-pic.png" height="288" width="177" alt="" /></a></li>-->
<!--                        <li><a href="#"><img src="--><?php //echo get_bloginfo( 'stylesheet_directory') ?><!--/img/catalog-pic3.png" height="288" width="177" alt="" /></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
            </div>
        </div>
    </div>
    <div class="hFooter"></div>






<?php get_footer()?>