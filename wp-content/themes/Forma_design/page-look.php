<?php get_header()?>
        <div class="content">
            <div class="wrapper">
                <div class="page-all">
                    <div class="block-main basket-block">
                        <div class="prod-name">
                            <a class="forw" href="javascript:javascript:history.go(-1)"></a>
                            <span>look</span>
                        </div>
                        <div>
                            <ul>
<?php foreach (simple_fields_values("look_slug",simple_fields_value('look_select_slug',99)) as $look){
$thumb = wp_get_attachment_url(get_post_thumbnail_id($look['id']))?>
<a href="<?php echo $look['permalink']; ?>"><img src="/timthumb.php?src=<?php echo $thumb ? $thumb : "/wp-content/uploads/noimage.jpg";?>&w=211&h=343&a=tc"/></a>
<?php
};
?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hFooter"></div>
<?php get_footer();?>