<?php
/* Template Name: Portfolio Template */

get_header(); ?>

<div class="portfolio-wrapper" id="portfolio-wrapper">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php
        $uri = get_template_directory_uri();
        ?>

        <?php

        // WP_Query arguments
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $per_page = 9;
        $args = array (
            'post_type'              => array( 'work' ),
            'posts_per_page'         => $per_page,
            'paged' => $paged,
        );

        $args_u200 = array (
            'post_type'              => array( 'work' ),
            'posts_per_page'         => $per_page,
            'paged' => $paged,
            'works_cats'             => 'doma-do-200-kv-m',
        );

        $args_o200 = array (
            'post_type'              => array( 'work' ),
            'posts_per_page'         => $per_page,
            'paged' => $paged,
            'works_cats'             => 'doma-svyshe-200-kv-m',
        );

        $args_other = array (
            'post_type'              => array( 'work' ),
            'posts_per_page'         => $per_page,
            'paged' => $paged,
            'works_cats'             => 'drugie-obekty',
        );


//        echo '<pre>';
//        print_r($u_200);
        ?>


        <section id="works" class="works container">

            <div class="row">

                <div class="inner-page-header col-md-12">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>

                <ul class="nav nav-pills works-pills">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#defaults">Показать все</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#houses_under_200">Дома до 200 м2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill"  href="#houses_over_200" role="tab">Дома свыше 200 м2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#other_objects" role="tab">Другие объекты</a>
                    </li>
                </ul>

                <?php
                    $row_open = '<div class="row">';
                    $row_close = '</div>';
                    $i = 1;
                ?>

    <!-- Tab panes -->
    <div class="tab-content works-tab-content">
        <div class="tab-pane works-tab-pane active" id="defaults" role="tabpanel">
            <div id="defaults-wrapper">
                <?php $works1 = new WP_Query( $args ); ?>
                <?php while ( $works1->have_posts() ) {
                    $works1->the_post();

                    if ($i == 1 || $i % 3 == 1) echo $row_open;
                    ?>

                    <div class="col-md-4 works-tab-col">
                        <div class="works-tab-pane-block-wrapper">
                            <div class="works-tab-pane-block" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>);">
                                <div class="overlay">
                                    <a href="<?php the_permalink(); ?>" class="btn overlay-more">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                        <p><?php the_field('задача', get_the_ID()) ?></p>
                        <a class="works-tab-pane-more" href="<?php the_permalink(); ?>">Подробнее...</a>
                    </div>

                    <?php if ($i % 3 == 0) echo $row_close;
                    $i++;
                }
                if (function_exists('wp_pagenavi')) {
                    wp_pagenavi( array( 'query' => $works1 ) );
                }
                wp_reset_postdata();
            ?>
            </div>
        </div>
        <div class="tab-pane works-tab-pane" id="houses_under_200" role="tabpanel">
            <div id="houses_under_200-wrapper">
                <?php $works2 = new WP_Query( $args_u200 ); ?>
                <?php while ( $works2->have_posts() ) {
                    $works2->the_post();

                    if ($i == 1 || $i % 3 == 1) echo $row_open;
                    ?>

                    <div class="col-md-4 works-tab-col">
                        <div class="works-tab-pane-block-wrapper">
                            <div class="works-tab-pane-block" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>);">
                                <div class="overlay">
                                    <a href="<?php the_permalink(); ?>" class="btn overlay-more">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                        <p><?php the_field('задача', get_the_ID()) ?></p>
                        <a class="works-tab-pane-more" href="<?php the_permalink(); ?>">Подробнее...</a>
                    </div>

                    <?php if ($i % 3 == 0) echo $row_close;
                    $i++;
                }
                if (function_exists('wp_pagenavi')) {
                    wp_pagenavi( array( 'query' => $works2 ) );
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="tab-pane works-tab-pane" id="houses_over_200" role="tabpanel">
            <div id="houses_over_200-wrapper">
                <?php $works3 = new WP_Query( $args_o200 ); ?>
                <?php while ( $works3->have_posts() ) {
                    $works3->the_post();

                    if ($i == 1 || $i % 3 == 1) echo $row_open;
                    ?>

                    <div class="col-md-4 works-tab-col">
                        <div class="works-tab-pane-block-wrapper">
                            <div class="works-tab-pane-block" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>);">
                                <div class="overlay">
                                    <a href="<?php the_permalink(); ?>" class="btn overlay-more">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                        <p><?php the_field('задача', get_the_ID()) ?></p>
                        <a class="works-tab-pane-more" href="<?php the_permalink(); ?>">Подробнее...</a>
                    </div>

                    <?php if ($i % 3 == 0) echo $row_close;
                    $i++;
                }
                if (function_exists('wp_pagenavi')) {
                    wp_pagenavi( array( 'query' => $works3 ) );
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="tab-pane works-tab-pane" id="other_objects" role="tabpanel">
            <div id="other_objects-wrapper">
                <?php $works4 = new WP_Query( $args_other ); ?>
                <?php while ( $works4->have_posts() ) {
                    $works4->the_post();

                    if ($i == 1 || $i % 3 == 1) echo $row_open;
                    ?>

                    <div class="col-md-4 works-tab-col">
                        <div class="works-tab-pane-block-wrapper">
                            <div class="works-tab-pane-block" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>);">
                                <div class="overlay">
                                    <a href="<?php the_permalink(); ?>" class="btn overlay-more">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                        <p><?php the_field('задача', get_the_ID()) ?></p>
                        <a class="works-tab-pane-more" href="<?php the_permalink(); ?>">Подробнее...</a>
                    </div>

                    <?php if ($i % 3 == 0) echo $row_close;
                    $i++;
                }
                if (function_exists('wp_pagenavi')) {
                    wp_pagenavi( array( 'query' => $works4 ) );
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    </section>






        <div id="contacts" class="gray-bg yellow-ribbon">

        </div>



            <?php endwhile; // end of the loop. ?>



</div><!-- Wrapper end -->


<?php get_footer(); ?>