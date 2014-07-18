<?php
/**
 * Created by PhpStorm.
 * User: yorik
 * Date: 18.07.14
 * Time: 12:17
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
                        <?php $args = array(
                            'post_type' => 'products',
                        );?>
                        <?php $the_query = new WP_Query($args); ?>
                        <?php if ($the_query->have_posts()) {
                        while ($the_query->have_posts()) {
                        $the_query->the_post();?>

                        <?php if (has_post_thumbnail()) { ?>
                            <li><a href="<?php the_permalink(); ?>"><img
                                        src="/timthumb.php?src=<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>&w=177&h=288&a=tc"/></a>
                            </li>
                        <?php
                        }
                        else {?>
                        <li><a href="<?php the_permalink(); ?>"><img src="/timthumb.php?src=/wp-content/uploads/noimage.jpg&w=177&h=288&a=tc"/></a>

                            <?php }
                            }
                            }; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="hFooter"></div>
<?php get_footer()?>