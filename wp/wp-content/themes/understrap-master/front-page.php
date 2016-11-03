<?php

get_header(); ?>

<div class="wrapper" id="page-wrapper">

    <section class="slider container-fluid">
        <?php putRevSlider("classicslider1") ?>
        <?php
        $button_labels = '';
        $i = 1;
        if(get_field('надписи_на_кнопке')):
            while(the_repeater_field('button_texts')):
                $text = get_sub_field('button_text');
                $font_size = get_sub_field('font_size');
                $button_labels .= 'data-label-'.$i.'="'.$text.'" ';
                $button_labels .= 'data-size-'.$i.'="'.$font_size.'" ';
                $i++;
            endwhile;
        endif;
        ?>
        <button class="slider-button" <?php echo $button_labels; ?> data-toggle="modal" data-target="#contactForm"></button>
    </section>

    <section class="modal fade" id="contactForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="<?php echo get_template_directory_uri() ?>/img/close.png" alt="close">
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Заполните данные</h4>
                </div>
                <div class="modal-divider"></div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <?php echo do_shortcode('[contact-form-7 id="54"]'); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php
        $uri = get_template_directory_uri();
        $check = '<img src="'.$uri.'/img/check.png" alt="">';
        $check_star = '<img src="'.$uri.'/img/check-star.png" alt="">';
        $check_2stars = '<img src="'.$uri.'/img/check-2stars.png" alt="">';
        ?>

    <div class="container"> 

        <div class="row">

            <section id="services" class="services col-lg-10 offset-lg-1 col-md-12">
                <h2>Наши услуги</h2>
                <h3>Все системы на базе одного теплового насоса</h3>
                <div class="services-image hidden-sm-down">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/services.jpg" alt="services">
                    <span class="left-top">вентиляция и кондиционирование</span>
                    <span class="right-top">отопление</span>
                    <span class="left-bottom">подогрев воды в бассейне</span>
                    <span class="right-bottom">горячее водоснабжение</span>
                </div>
                <div class="hidden-md-up services-mob">
                    <div class="row">
                        <div class="col-sm-6 col-xs-6 text-sm-center text-xs-center">
                            <p>вентиляция и кондиционирование</p>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/s1.png" alt="services">
                        </div>
                        <div class="col-sm-6 col-xs-6 text-sm-center text-xs-center">
                            <p>отопление</p>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/s2.png" alt="services">

                        </div>
                    </div>
                    <div class="row second-row">
                        <div class="col-sm-6 col-xs-6 text-sm-center text-xs-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/s3.png" alt="services">

                            <p>подогрев воды в бассейне</p>
                        </div>
                        <div class="col-sm-6 col-xs-6 text-sm-center text-xs-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/s4.png" alt="services">
                            <p>горячее водоснабжение</p>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </div> 

        <div class="gray-bg">


            <section class="divider col-md-12"></section>

            <section class="solutions container">
                <h2>Решения на базе тепловых насосов<br>применяются:</h2>
                <div class="solutions-block">
                    <?php
                    $i = 0;
                    $image_blocks = get_field('image_blocks');
                    ?>
                    <div class="row">
                        <?php
                        while($i <= 1) {
                            $image = $image_blocks[$i]['image'];
                            //print_r($image);
                            ?>
                            <div class="col-md-6 solutions-image-block">
                                <div class="solutions-image" style="background-image: url(<?php echo $image_blocks[$i]['image']['url'];?>);"></div>
                                <div class="solutions-caption">
                                    <h4 class="solutions-header">
                                        <?php echo $image_blocks[$i]['header']; ?>
                                    </h4>
                                    <h5 class="solutions-subheader">
                                        <?php echo $image_blocks[$i]['subheader']; ?>
                                    </h5>
                                </div>
                             </div>
                            <?php
                            $i++;
                        }
                            ?>
                    </div>
                    <div class="row">
                        <?php
                        while($i <= 4) {
                            $image = $image_blocks[$i]['image']; ?>

                            <div class="col-md-4 solutions-image-block">
                                <div class="solutions-image" style="background-image: url(<?php echo $image_blocks[$i]['image']['url'];?>);"></div>
                                <div class="solutions-caption">
                                    <h4 class="solutions-header">
                                        <?php echo $image_blocks[$i]['header']; ?>
                                    </h4>
                                    <h5 class="solutions-subheader">
                                        <?php echo $image_blocks[$i]['subheader']; ?>
                                    </h5>
                                </div>
                            </div>

                            <?php  $i++;
                        }
                        ?>
                    </div>

                </div>
            </section>

        </div>

        <section id="advantages" class="advantages container">
            <h2>ПРЕИМУЩЕСТВА</h2>
            <h3>инженерных систем на базе теплового насоса</h3>
            <div class="advantages-table row hidden-sm-down">
                <div class="col-md-9">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="gray">Тепловой насос</th>
                            <th>Электрический котел</th>
                            <th>Газовый котел</th>
                            <th>Твердотопливный котел</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Hизкая стоимость
                                тепловой энергии</th>
                            <td class="gray"><?php echo $check; ?></td>
                            <td>&mdash;</td>
                            <td><?php echo $check_2stars; ?></td>
                            <td>&mdash;</td>
                        </tr>
                        <tr>
                            <th scope="row">Автономность
                                подключения</th>
                            <td class="gray"><?php echo $check; ?></td>
                            <td>&mdash;</td>
                            <td>&mdash;</td>
                            <td>&mdash;</td>
                        </tr>
                        <tr>
                            <th scope="row">Экономия на
                                техобслуживании</th>
                            <td class="gray"><?php echo $check; ?></td>
                            <td>&mdash;</td>
                            <td>&mdash;</td>
                            <td>&mdash;</td>
                        </tr>
                        <tr>
                            <th scope="row">Пожаробезопасность
                            </th>
                            <td class="gray"><?php echo $check; ?></td>
                            <td><?php echo $check_star; ?></td>
                            <td>&mdash;</td>
                            <td>&mdash;</td>
                        </tr>
                        <tr>
                            <th scope="row">Долговечность
                            </th>
                            <td class="gray"><?php echo $check; ?></td>
                            <td>&mdash;</td>
                            <td>&mdash;</td>
                            <td>&mdash;</td>
                        </tr>
                        <tr class="last-row">
                            <th scope="row">Отсутствие вреда для здоровья человека и экологии
                            </th>
                            <td class="gray"><?php echo $check; ?></td>
                            <td><?php echo $check; ?></td>
                            <td>&mdash;</td>
                            <td>&mdash;</td>
                        </tr>
                        </tbody>
                    </table>

                    <p>*При соблюдении технологии монтажа электросети</p>
                    <p>**Цены на газ постоянно растут</p>
                </div>
                <div class="col-md-3">
                    <img src="<?php echo $uri; ?>/img/advantages.png" alt="">
                </div>
            </div>

            <div class="advantages-mob row hidden-md-up">
                <div class="col-md-12">
                    <ul class="advantages-ul">
                        <li>Hизкая стоимость тепловой энергии</li>
                        <li>Автономность подключения</li>
                        <li>Экономия на TO</li>
                        <li>Пожаробезопасность</li>
                        <li>Долговечность</li>
                        <li>Отсутствие вреда<br>для здоровья<br>человека и экологии</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="economy container">
            <h2>ЭКОНОМИЧНОСТЬ</h2>
            <h3>Сравнительный график ежемесячных затрат на отопление коттеджа 300 м2</h3>
            <div id="chart" class="hidden-sm-down">
                <ul id="bars">
                    <li><div data-percentage="17" class="bar green-bar"></div><span>Тепловой насос</span></li>
                    <li><div data-percentage="24" class="bar"></div><span>Магистральный газ</span></li>
                    <li><div data-percentage="72" class="bar"></div><span>Газгольдер</span></li>
                    <li><div data-percentage="91" class="bar"></div><span>Электричество</span></li>
                    <li><div data-percentage="103" class="bar"></div><span>Солярка</span></li>
                </ul>

                <ul id="numbers">
                    <li><span>20</span></li>
                    <li><span>15</span></li>
                    <li><span>10</span></li>
                    <li><span>5</span></li>
                </ul>
            </div>
            <div class="chart-sm hidden-md-up row">
                <div class="col-sm-6 col-xs-6 text-sm-right text-xs-right no-left-padding">
                    <ul class="bars-sm">
                        <li><span>Тепловой насос</span></li>
                        <li><span>Магистральный газ</span></li>
                        <li><span>Газгольдер</span></li>
                        <li><span>Электричество</span></li>
                        <li><span>Солярка</span></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-xs-6 text-sm-left text-xs-left no-paddings">
                    <img src="<?php echo $uri; ?>/img/bars-sm.png" alt="">
                    <ul class="bars-captions">
                        <li>5</li>
                        <li>10</li>
                        <li>15</li>
                        <li>20</li>
                    </ul>
                    <p>тыс.руб./мес.</p>
                </div>

            </div>

        </section>

        <section class="imageblock hidden-sm-down container-fluid" style="background-image: url(<?php the_field('imageblock_bg_image') ?>);">

        </section>
        <section class="imageblock hidden-md-up container-fluid" style="background-image: url(<?php the_field('imageblock_bg_sm_image') ?>);">

        </section>

        <section id="profit" class="profit container">
            <h2>ВАШИ ВЫГОДЫ</h2>
            <h3>при использовании систем с тепловым насосом</h3>
            <?php $i = 0;
            $image_blocks = get_field('profits_block'); ?>

            <div class="row">
                <?php
                while($i <= 3) {
                    $image = $image_blocks[$i]['image'];
                    //print_r($image);
                    ?>
                    <div class="col-md-3 profit-blocks">
                        <div class="row">
                            <div class="col-md-12 col-sm-4 col-xs-4">
                                <img src="<?php echo $image_blocks[$i]['image']['url'];?>" alt="<?php echo $image_blocks[$i]['image']['alt'];?>">
                            </div>
                            <div class="col-md-12 col-sm-8 col-xs-8">
                                <h4><?php echo $image_blocks[$i]['header']; ?></h4>
                                <h5><?php echo $image_blocks[$i]['subheader']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php  $i++;
                }
                ?>

            </div>
            <div class="profit-more hidden-sm-up">
                Смотреть ещё
            </div>
            <div class="row hidden-sm-down">
                <?php
                while($i <= 7) {
                    $image = $image_blocks[$i]['image'];
                    //print_r($image);
                    ?>
                    <div class="col-md-3 profit-blocks">
                        <div class="row">
                            <div class="col-md-12 col-sm-4 col-xs-4">
                                <img src="<?php echo $image_blocks[$i]['image']['url'];?>" alt="<?php echo $image_blocks[$i]['image']['alt'];?>">
                            </div>
                            <div class="col-md-12 col-sm-8 col-xs-8">
                                <h4><?php echo $image_blocks[$i]['header']; ?></h4>
                                <h5><?php echo $image_blocks[$i]['subheader']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php  $i++;
                }
                ?>

            </div>
        </section>

        <section class="calculations container" data-toggle="modal" data-target="#contactForm">
            <div class="calculations-wrapper">
                <div class="col-md-8 offset-md-2 hidden-sm-down calculations-block">
                    <img src="<?php echo $uri ?>/img/arrow-big.png" alt="">
                    <h2>РасCчитать стоимость</h2>
                    <h4>инженерных систем на базе теплового насоса</h4>
                    <h5>Наш менеджер свяжется с вами для расчета стоимости,<br>это займет не более 2 минут</h5>
                </div>
            </div>
            <button class="calculations-sm hidden-md-up">
                <strong>Рассчитать стоимость</strong><br>
                инженерных систем
            </button>
            <p class="hidden-md-up">Наш менеджер свяжется с вами для расчета стоимости, это займет не более 2 минут</p>
        </section>

        <div class="gray-bg">


            <section class="divider col-md-12"></section>

            <?php
            $defaults = get_field('default_panel');
            $under_200 = get_field('houses_under_200');
            $over_200 = get_field('houses_over_200');
            $other = get_field('other_objects');
            ?>

            <?php if(!md_is_mobile()) { ?>
            <section id="works" class="works container">
                <h2>Выполненные объекты</h2>
                <ul class="nav nav-tabs works-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#houses_under_200" role="tab">Дома до 200 м2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#houses_over_200" role="tab">Дома свыше 200 м2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#other_objects" role="tab">Другие объекты</a>
                    </li>
                </ul>

                <?php
                    $row_open = '<div class="row">';
                    $row_close = '</div>';
                    $i = 1;
                ?>

                <!-- Tab panes -->
                <div class="tab-content works-tab-content">
                    <div class="tab-pane works-tab-pane active" id="default" role="tabpanel">
                        <?php foreach ($defaults as $default) {

                            if ($i == 1 || $i % 3 == 1) echo $row_open;
                            ?>

                                <div class="col-md-4">
                                    <div class="works-tab-pane-block-wrapper">
                                        <div class="works-tab-pane-block" style="background-image: url(<?php echo get_the_post_thumbnail_url($default, 'large'); ?>);">
                                            <div class="overlay tab-overlay" data-id="<?php echo $default; ?>">
                                                <button data-id="<?php echo $default; ?>" class="btn overlay-more">Подробнее</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php if ($i % 3 == 0) echo $row_close;
                            $i++;
                        } ?>
                    </div>
                    <div class="tab-pane" id="houses_under_200" role="tabpanel">
                        <?php foreach ($under_200 as $under_200_1) {

                            if ($i == 1 || $i % 3 == 1) echo $row_open;
                            ?>

                            <div class="col-md-4">
                                <div class="works-tab-pane-block-wrapper">
                                    <div class="works-tab-pane-block" style="background-image: url(<?php echo get_the_post_thumbnail_url($under_200_1, 'large'); ?>);">
                                        <div class="overlay tab-overlay" data-id="<?php echo $under_200_1; ?>">
                                            <button data-id="<?php echo $under_200_1; ?>" class="btn overlay-more">Подробнее</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if ($i % 3 == 0) echo $row_close;
                            $i++;
                        } ?>
                    </div>
                    <div class="tab-pane" id="houses_over_200" role="tabpanel">
                        <?php foreach ($over_200 as $over_200_1) {

                            if ($i == 1 || $i % 3 == 1) echo $row_open;
                            ?>

                            <div class="col-md-4">
                                <div class="works-tab-pane-block-wrapper">
                                    <div class="works-tab-pane-block" style="background-image: url(<?php echo get_the_post_thumbnail_url($over_200_1, 'large'); ?>);">
                                        <div class="overlay tab-overlay" data-id="<?php echo $over_200_1; ?>">
                                            <button data-id="<?php echo $over_200_1; ?>" class="btn overlay-more">Подробнее</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if ($i % 3 == 0) echo $row_close;
                            $i++;
                        } ?>
                    </div>
                    <div class="tab-pane" id="other_objects" role="tabpanel">
                        <?php foreach ($other as $other_1) {

                            if ($i == 1 || $i % 3 == 1) echo $row_open;
                            ?>

                            <div class="col-md-4">
                                <div class="works-tab-pane-block-wrapper">
                                    <div class="works-tab-pane-block" style="background-image: url(<?php echo get_the_post_thumbnail_url($other_1, 'large'); ?>);">
                                        <div class="overlay tab-overlay" data-id="<?php echo $other_1; ?>">
                                            <button data-id="<?php echo $other_1; ?>" class="btn overlay-more">Подробнее</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if ($i % 3 == 0) echo $row_close;
                            $i++;
                        } ?>
                    </div>
                </div>
            </section>
            <?php } else { ?>
            <section class="works-sm">
            <?php
            $fields_array = [$under_200, $over_200, $other];
            $titles_array = ['Дома до 200 м2', 'Дома свыше 200 м2', 'Другие объекты'];
            $i = 0;
            ?>

            <?php while ($i <= 2) { ?>

            <div class="container works-sm-wrapper">
                <h3><?php echo $titles_array[$i]; ?></h3>
                <div class="works-sm-container">

                    <?php foreach ($fields_array[$i] as $work_id) { ?>

                        <div class="works-sm-block">
                            <img class="works-sm-block-img" src="<?php echo get_the_post_thumbnail_url($work_id, 'thumbnail'); ?>" data-remote="false" data-toggle="modal" data-target="#worksModal" data-id="<?php echo $work_id; ?>">
                        </div>
                    <?php } ?>
                </div>
            </div>

            <?php $i++;
            } ?>

            </section>
            <?php } ?>

        </div>

        <section id="schema" class="schema container hidden-lg-down">
            <h2>Схема нашей работы</h2>
            <div class="schema-wrapper">
                <div class="schema-wrapper-inner">
                    <div class="schema-block"><img class="schema-img" src="<?php echo $uri; ?>/img/schema-icon1.png" alt=""><h4>Проектирование систем</h4></div>
                    <div class="schema-block"><img class="schema-img" src="<?php echo $uri; ?>/img/schema-icon2.png" alt=""><h4>Подбор и поставка оборудования</h4></div>
                    <div class="schema-block"><img class="schema-img" src="<?php echo $uri; ?>/img/schema-icon3.png" alt=""><h4>Профессиональный монтаж</h4></div>
                    <div class="schema-block"><img src="<?php echo $uri; ?>/img/schema-icon4.png" alt=""><h4>Гарантийное и сервисное обслуживание</h4></div>
                </div>
                <div class="row">
                    <div class="col-md-12 schema-bottom">
                        <img src="<?php echo $uri; ?>/img/schema.png" alt="">
                        <h4>Поэтапная оплата</h4>
                    </div>
                </div>
            </div>
        </section>

        <section class="schema-sm container hidden-xl-up">
            <h2>Схема нашей работы</h2>
            <div class="row">
                <div class="schema-sm-wrapper col-lg-8 offset-lg-2">
                <div class="schema-sm-block"><img class="schema-img" src="<?php echo $uri; ?>/img/schema-icon1.png" alt=""><h4>Проектирование систем</h4></div>
                <div class="schema-sm-block"><img class="schema-img" src="<?php echo $uri; ?>/img/schema-icon2.png" alt=""><h4>Подбор и поставка оборудования</h4></div>
                <div class="schema-sm-block"><img class="schema-img" src="<?php echo $uri; ?>/img/schema-icon3.png" alt=""><h4>Профессиональный монтаж</h4></div>
                <div class="schema-sm-block"><img src="<?php echo $uri; ?>/img/schema-icon4.png" alt=""><h4>Гарантийное и сервисное обслуживание</h4></div>
            </div>
            </div>
        </section>

        <div class="yellow-bg">
            <section id="guarantees" class="comfort container">
            <h2>Почему стоит доверить ваш <span class="green">комфорт</span> экспертам Vigor Centre?</h2>
            <div class="row">
                <div class="col-lg-4 hidden-md-down">
                    <img src="<?php echo $uri; ?>/img/comfort-man.png" alt="">
                </div>
                <div class="col-lg-8">
                    <?php $comfort_list = get_field('bullets'); ?>
                    <ul class="comfort-list">
                        <?php foreach ($comfort_list as $bullet) { ?>
                        <li>
                            <h4 class="green"><?php echo $bullet['bullet_header']; ?></h4>
                            <p><?php echo $bullet['bullet']; ?></p>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </section>
        </div>

        <section id="testimonials" class="testimonials container">
            <h2>Что говорят клиенты?</h2>
            <?php $testimonials = get_field('testimonial'); ?>
            <div class="row testimonials-slider">
                <?php foreach ($testimonials as $testimonial) { ?>
                <div class="testimonials-block">
                    <div class="testimonials-name">
                        <p><strong><?php echo $testimonial['name']; ?></strong></p>
                        <p><?php echo $testimonial['position']; ?></p>
                    </div>
                    <div class="testimonials-text">
                        <p><?php echo $testimonial['testimonial']; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>

        <section class="calculations container" data-toggle="modal" data-target="#contactForm">
            <div class="calculations-wrapper">
                <div class="col-md-8 offset-md-2 hidden-sm-down calculations-block">
                    <img src="<?php echo $uri ?>/img/arrow-big.png" alt="">
                    <h2>РасCчитать стоимость</h2>
                    <h4>инженерных систем на базе теплового насоса</h4>
                    <h5>Наш менеджер свяжется с вами для расчета стоимости,<br>это займет не более 2 минут</h5>
                </div>
            </div>
            <button class="calculations-sm hidden-md-up">
                <strong>Рассчитать стоимость</strong><br>
                инженерных систем
            </button>
            <p class="hidden-md-up">Наш менеджер свяжется с вами для расчета стоимости, это займет не более 2 минут</p>
        </section>

        <div id="contacts" class="gray-bg yellow-ribbon">
            <?php if (wp_is_mobile()) { ?>
            <section class="map container">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=0bfUCYDMgAAuNeStQqeM8-p3qGgH0gxO&amp;width=100%&amp;height=200&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=false"></script>
            </section>
            <?php } else { ?>
        <section class="map container">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=0bfUCYDMgAAuNeStQqeM8-p3qGgH0gxO&amp;width=100%&amp;height=420&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=false"></script>
        </section>
        <?php } ?>

        </div>



            <?php endwhile; // end of the loop. ?>



</div><!-- Wrapper end -->

    <div class="modal fade" id="worksModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="<?php echo get_template_directory_uri() ?>/img/close.png" alt="close">
                    </button>
                </div>
                <div class="modal-body container-fluid">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="<?php echo get_template_directory_uri() ?>/img/close.png" alt="close">
                    </button>
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>