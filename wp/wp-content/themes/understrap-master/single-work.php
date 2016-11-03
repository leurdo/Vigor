<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<section id="single-work" class="single-work container">

        <div class="row">

            <div class="inner-page-header col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <h1><?php the_title(); ?></h1>
                        <h4><?php the_field('subheader'); ?></h4>
                    </div>
                    <div class="col-md-7 text-md-right"><?php echo get_breadcrumbs(); ?></div>
                </div>

            </div>
        </div>


            <?php
            $images = get_field('gallery');
            $i = 0;
            ?>

        <div class="row">

            <div class="col-md-12 work-modal-block work-modal-gallery">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner" role="listbox">
                        <?php foreach( $images as $image ): ?>
                        <div class="carousel-item <?php if (++$i == 1) echo 'active'; ?>">
                            <img src="<?php echo $image['sizes']['slide']; ?>" alt="<?php echo $image['alt']; ?>" />
                        </div>
                        <?php endforeach; ?>

                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="icon-prev" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="icon-next" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-12 work-modal-block">

                <div class="works-modal-textblock">
                    <h5>Объем/ площадь</h5>
                    <p><?php the_field('square'); ?></p>
                    <h5>Задача</h5>
                    <p><?php the_field('задача'); ?></p>
                    <h5>Решение</h5>
                    <p><?php the_field('решение'); ?></p>
                    <h5>Выгода для клиента</h5>
                    <p><?php the_field('выгода_для_клиента'); ?></p>
                </div>
            </div>

        </div><!-- .row -->
        <div class="row contact-form">
            <h4 class="contact-form-title">Получить расчет стоимости инженерных систем на базе теплового насоса</h4>
            <?php echo do_shortcode('[contact-form-7 id="54"]'); ?>
        </div>

</section>

    <div id="contacts" class="gray-bg yellow-ribbon">

            </div>

        <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>



                        





        



