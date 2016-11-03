<?php
/* Template Name: Contacts Template */

get_header(); ?>

<div class="wrapper" id="page-wrapper">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php
        $uri = get_template_directory_uri();
        ?>

    <section class="container inner-page">

        <div class="row">

            <div class="inner-page-header col-md-12">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="map col-md-12">
                <?php
                $location = get_field('map_msk');

                if( !empty($location) ):
                    ?>
                    <div class="acf-map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row contacts-main">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h2>Москва</h2>
                <?php the_field('main_contact'); ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <h2>Обратная связь</h2>
                <?php echo do_shortcode('[contact-form-7 id="270" title="Contact form contacts page"]'); ?>
            </div>
        </div>

        <div class="row contacts-main">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h2>Санкт-Петербург</h2>
                <?php the_field('second_contact'); ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 hidden-xs-down">
                <?php
                $location = get_field('map_spb');

                if( !empty($location) ):
                    ?>
                    <div class="acf-map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h2>Самара</h2>
                <?php the_field('third_contact'); ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 hidden-xs-down">
                <?php
                $location = get_field('map_sm');

                if( !empty($location) ):
                    ?>
                    <div class="acf-map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </section>



        <div id="contacts" class="gray-bg yellow-ribbon">

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