<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

 ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php
            $images = get_field('gallery');
            $i = 0;
            ?>

        <div class="row">

            <div class="col-md-6 work-modal-block work-modal-gallery">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner" role="listbox">
                        <?php foreach( $images as $image ): ?>
                        <div class="carousel-item <?php if ($i++ == 1) echo 'active'; ?>">
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
            <div class="col-md-6 work-modal-block">
                <h3><?php the_title(); ?></h3>
                <h4><?php the_field('subheader'); ?></h4>
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

        <?php endwhile; // end of the loop. ?>



                        





        



