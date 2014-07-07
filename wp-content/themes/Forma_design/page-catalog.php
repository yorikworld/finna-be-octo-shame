<?php
/*
Template Name: catalog
*/
get_header()?>
        <div class="content">
            <div class="wrapper">
                <div class="page-all">
                    <div class="sidebar">
                        <div class="box-sex">
                            <h3><a href="#">Женская</a></h3>
                            <ul>
                                <li><a href="#">весна</a></li>
                                <li><a href="#">осень</a></li>
                                <li><a href="#">зима</a></li>
                            </ul>
                        </div>
                        <div class="box-sex">
                            <h3><a href="#">Мужская</a></h3>
                            <ul>
                                <li><a href="#">весна</a></li>
                                <li><a href="#">осень</a></li>
                                <li><a href="#">зима</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    $args = array(
                        'orderby'       => 'term_group',
                        'order'         => 'ASC',
                        'hide_empty'    => false,
                        'exclude'       => array(),
                        'exclude_tree'  => array(),
                        'include'       => array(),
                        'number'        => '',
                        'fields'        => 'all',
                        'slug'          => '',
                        'parent'        => 0,
                        'hierarchical'  => true,
                        'child_of'      => 0,
                        'get'           => '',
                        'name__like'    => '',
                        'pad_counts'    => false,
                        'offset'        => '',
                        'search'        => '',
                        'cache_domain'  => 'core'
                    );
                    $args2 = array(
                        'orderby'       => 'term_group',
                        'order'         => 'ASC',
                        'hide_empty'    => false,
                        'exclude'       => array(),
                        'exclude_tree'  => array(),
                        'include'       => array(),
                        'number'        => '',
                        'fields'        => 'all',
                        'slug'          => '',
                        'parent'        => '',
                        'hierarchical'  => true,
                        'child_of'      => 0,
                        'get'           => '',
                        'name__like'    => '',
                        'pad_counts'    => false,
                        'offset'        => '',
                        'search'        => '',
                        'cache_domain'  => 'core'
                    );

                    $myterms = get_terms( 'genre', $args );
                    // $myterms = get_terms( 'post_tag', $args );
                    $i = 0;
                    foreach( $myterms as $term )
                    {
                        echo '<pre>';
//                        var_dump($term);
                       echo($term->name);
                        echo '</pre>';
                            $myterms2 = get_terms( 'genre', array("parent" => $term ->term_id));
                            foreach( $myterms2 as $term2 )
                            {
                                echo '<pre>';
                            echo($term->name);
                                echo '</pre>';
                            }
                        echo '</pre>';
//                        echo('<br>');
                    }
                    ?>


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