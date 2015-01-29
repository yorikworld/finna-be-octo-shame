<?php get_header();?>
        <div class="content">
            <div class="wrapper">
                <div class="page-all">
                    <div class="contact-page two-col">
                        <div class="left">
                            <p> <?php foreach(simple_fields_fieldgroup('contact_phone', 70) as $phone){ ?>
                                Тел.: <?php echo $phone;?>  <br /> <?php }; ?>
                               <a href="#">перезвоните мне!</a>
                            </p>
                            <p><?php foreach(simple_fields_fieldgroup('contact_email', 70) as $email){echo $email;};?> </p>
                            <p><?php foreach(simple_fields_fieldgroup('contact_address', 70) as $address){echo $address;};?></p>
                            <ul>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                        <div class="right">
                            <div class="box">
                                <label for="">Ваше имя:</label>
                                <input type="text">
                            </div>
                            <div class="box">
                                <label for="">Ваш e-mail:</label>
                                <input type="text">
                            </div>
                            <div class="box">
                                <label for="">Сообщение:</label>
                                <textarea name="" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="box">
                                <input type="submit" />
                            </div>
                        </div>
                    </div>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10256.486592738522!2d36.228140666487015!3d50.00907509967848!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a0df949336e1%3A0xe2d4cabc8417ce58!2z0L_RgNC-0YHQvy4g0J_RgNCw0LLQtNC4LCA1LCDQpdCw0YDQutGW0LIsINCl0LDRgNC60ZbQstGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCDQo9C60YDQsNC40L3QsA!5e0!3m2!1sru!2sua!4v1422570240067" width="955" height="367" frameborder="0" style="border:0"></iframe>
                        <img src="<?php echo get_bloginfo('stylesheet_directory') ?>/img/map.png" height="367" width="955" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="hFooter"></div>
<?php get_footer();?>