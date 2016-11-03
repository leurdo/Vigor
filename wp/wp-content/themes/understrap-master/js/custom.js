(function($) {

    //Set button labels when slides change

    jQuery('#rev_slider_2_1').bind('revolution.slide.onloaded', function(event) {
        $button1 = $('.slider-button');
        var buttonText1 = $button1.data('label-1'),
            buttonSize1 = $button1.data('size-1');
        $button1.text(buttonText1);
        $button1.css({'font-size': buttonSize1 + 'px'});
    });

        jQuery('#rev_slider_2_1').bind('revolution.slide.onchange', function(event, data) {
            var currentSlide = data.slideIndex,
                $button = $('.slider-button');
                buttonText = $button.data('label-'+currentSlide);
                buttonSize = $button.data('size-'+currentSlide);


            if (buttonText) {
                $button.text(buttonText);
            } else {
                $button.text('Заказать расчет теплопотерь и проект котельной');
            }

            if (buttonSize) {
                $button.css({'font-size': buttonSize + 'px'});
            }

        });

    //Animated bar chart

    if ($('#bars').length) {
        var inview = new Waypoint.Inview({
            element: $('#bars')[0],

            entered: function (direction) {
                $(function () {
                    $("#bars li .bar").each(function (key, bar) {
                        var percentage = $(this).data('percentage');

                        $(this).animate({
                            'height': percentage + '%'
                        }, 1000);
                    })
                })
            },

            exited: function (direction) {
                $("#bars li .bar").each(function (key, bar) {

                    $(this).css({
                        'height': 0
                    });
                })
            }
        });
    }

    var sticky = new Waypoint.Sticky({
        element: $('.navbar')[0],
        wrapper: false
    });

    $('.profit-more').on('click', function() {
        var $this = $(this);

        $this.closest('section').find('.hidden-sm-down').removeClass('hidden-sm-down');
        $this.addClass('hidden-sm-down');

    });

    // Fill modal with content from link href
    $("#worksModal").on("show.bs.modal", function(e) {
        var link = $(e.relatedTarget);




    });

    $("#worksModal").on("hide.bs.modal", function(e) {
        $("#worksModal").find(".modal-body").html('');
    });

    // Slick for Works tabs

    $('.works-sm-container').slick({
        centerMode: true,
        centerPadding: '80px',
        slidesToShow: 1
    });

    $('.schema-sm-wrapper').slick({
        arrows: true,
        infinite: false,
        slidesToShow: 1,
        mobileFirst: true,

        responsive: [
            {
                breakpoint: 480,
                infinite: false,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]


    });

    //On after slide change
    $('.schema-sm-wrapper').on('afterChange', function(event, slick, currentSlide, nextSlide){

    });

    $('.testimonials-slider').slick({
        arrows: true,
        infinite: true,
        slidesToShow: 1
        //adaptiveHeight: true
    });

    $(document).ready(function() {


        $('a[href^="#"]').on('click', function (event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top
                }, 1000);
            }
        });
    });

    $('.overlay.tab-overlay, .tab-overlay .overlay-more').on('click', function(e) {
        //e.stopPropagation();
        var id = $(this).data('id');

        $.ajax({
            type: "POST",
            dataType: "html",
            url: window.wp_data.ajax_url,
            data: {
                'id': id,
                'action': 'work_ajax'
            },
            success: function(data){

                $("#worksModal").find(".modal-body").html(data);

            },
            error : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });

        $('#worksModal').modal();
    });

    function closeModal() {
        $('#contactForm').toggle();
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }

    $(".wpcf7").on('wpcf7:mailsent', function(event){

        setTimeout(function(){ closeModal(); }, 3000);
    });

    $(".wpcf7").on('wpcf7:mailfailed', function(event){

        setTimeout(function(){ closeModal(); }, 3000);
    });

})(jQuery);

(function($) {

    /*
     *  new_map
     *
     *  This function will render a Google Map onto the selected jQuery element
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$el (jQuery element)
     *  @return	n/a
     */

    function new_map( $el ) {

        // var
        var $markers = $el.find('.marker');


        // vars
        var args = {
            zoom		: 16,
            center		: new google.maps.LatLng(0, 0),
            mapTypeId	: google.maps.MapTypeId.ROADMAP
        };


        // create map
        var map = new google.maps.Map( $el[0], args);


        // add a markers reference
        map.markers = [];


        // add markers
        $markers.each(function(){

            add_marker( $(this), map );

        });


        // center map
        center_map( map );


        // return
        return map;

    }

    /*
     *  add_marker
     *
     *  This function will add a marker to the selected Google Map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$marker (jQuery element)
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function add_marker( $marker, map ) {

        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

        // create marker
        var marker = new google.maps.Marker({
            position	: latlng,
            map			: map
        });

        // add to array
        map.markers.push( marker );

        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content		: $marker.html()
            });

            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function() {

                infowindow.open( map, marker );

            });
        }

    }

    /*
     *  center_map
     *
     *  This function will center the map, showing all markers attached to this map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function center_map( map ) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each( map.markers, function( i, marker ){

            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

            bounds.extend( latlng );

        });

        // only 1 marker?
        if( map.markers.length == 1 )
        {
            // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 16 );
        }
        else
        {
            // fit to bounds
            map.fitBounds( bounds );
        }

    }

    /*
     *  document ready
     *
     *  This function will render each map when the document is ready (page has loaded)
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	5.0.0
     *
     *  @param	n/a
     *  @return	n/a
     */
// global var
    var map = null;

    $(document).ready(function(){

        $('.acf-map').each(function(){

            // create map
            map = new_map( $(this) );

        });

    });

    // Portfolio ajax pagination

    $('.wp-pagenavi a').live('click', function(e) {
        e.preventDefault();

        var $this = $(this),
            link = $this.attr('href'),
            tab = $this.closest('.tab-pane').attr('id'),
            newTab = link + ' #' + tab + '-wrapper';

        $this.closest('.tab-pane').html('Загрузка...').load(newTab);

     });

})(jQuery);

