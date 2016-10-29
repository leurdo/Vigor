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

    var inview = new Waypoint.Inview({
        element: $('#bars')[0],

        entered: function(direction) {
            $(function(){
                $("#bars li .bar").each(function(key, bar){
                    var percentage = $(this).data('percentage');

                    $(this).animate({
                        'height':percentage+'%'
                    }, 1000);
                })
            })
        },

        exited: function(direction) {
            $("#bars li .bar").each(function(key, bar){

                $(this).css({
                    'height':0
                });
            })
        }
    });

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

    $('.overlay, .overlay-more').on('click', function(e) {
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
