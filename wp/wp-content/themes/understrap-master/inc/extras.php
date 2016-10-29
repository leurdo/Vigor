<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function understrap_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'understrap_body_classes' );

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.

add_filter( 'body_class', 'adjust_body_class' );
function adjust_body_class( $classes ) {
 
    foreach ( $classes as $key => $value ) {
        if ( $value == 'tag' ) unset( $classes[ $key ] );
    }
 
    return $classes;
 
}

// Push AJAX url to frontend
add_action('wp_head','js_variables');
function js_variables(){
    $variables = array (
        'ajax_url' => admin_url('admin-ajax.php'),
    );
    echo '<script type="text/javascript">window.wp_data = '.json_encode($variables).';</script>';
}

add_action('wp_ajax_nopriv_work_ajax', 'work_ajax');
add_action('wp_ajax_work_ajax', 'work_ajax');

function work_ajax() {
    $id = intval( $_POST['id'] );

    $images = get_field('gallery', $id);
    $k = 0;

    $output = '<div class="row">

            <div class="col-md-6 work-modal-block work-modal-gallery">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner" role="listbox">';

    foreach( $images as $image ):
        $k++;
        $output .= sprintf(
            '<div class="carousel-item %1$s"> 
                <img src="%2$s" alt="%3$s" />
            </div>',
            ($k == 1 ? 'active' : ''),
            $image['sizes']['slide'],
            $image['sizes']['alt']
        );
    endforeach;

    $output .='    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="icon-prev" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="icon-next" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>';
    $output .= sprintf (
            '<div class="col-md-6 work-modal-block">
                <h3>%1$s</h3>
                <h4>%2$s</h4>
                <div class="works-modal-textblock">
                    <h5>Объем/ площадь</h5>
                    <p>%3$s</p>
                    <h5>Задача</h5>
                    <p>%4$s</p>
                    <h5>Решение</h5>
                    <p>%5$s</p>
                    <h5>Выгода для клиента</h5>
                    <p>%6$s</p>
                </div>
            </div>',
            get_the_title($id),
            get_field('subheader', $id),
            get_field('square', $id),
            get_field('задача', $id),
            get_field('решение', $id),
            get_field('выгода_для_клиента', $id)
        );

    $output .= '</div><!-- .row -->';

    echo $output;

    wp_die();
}

require_once(get_template_directory() . '/inc/Mobile_Detect.php');

function md_is_mobile() {

    $detect = new Mobile_Detect;

    if( $detect->isMobile() && !$detect->isTablet() ){
        return true;
    } else {
        return false;
    }

}