<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>

<div class="footer" id="wrapper-footer">
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 footer-nav">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'container_class' => '',
                        'menu_class' => 'nav navbar-nav',
                        'fallback_cb' => '',
                        'menu_id' => 'footer-menu',
                        'walker' => new wp_bootstrap_navwalker()
                    )
                ); ?>

            </div>
        </div>

        <div class="row">

            <div class="col-md-3 footer-col">
                <div class="row">
                    <div class="col-sm-5 col-xs-6 col-md-12 footer-col-title">
                        <h3>Адрес</h3>
                    </div>
                    <div class="col-sm-7 col-xs-6 col-md-12">
                        <p><?php the_field('address', 2); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 footer-col">
                <div class="row">
                    <div class="col-sm-5 col-xs-6 col-md-12 footer-col-title">
                    <h3>Телефон</h3>
                    </div>
                    <div class="col-sm-7 col-xs-6 col-md-12">
                    <p><a href="tel:<?php the_field('tel', 2); ?>"><?php the_field('tel', 2); ?></a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 footer-col">
                <div class="row">
                    <div class="col-sm-5 col-xs-6 col-md-12 footer-col-title">
                    <h3>Почта</h3>
                    </div>
                    <div class="col-sm-7 col-xs-6 col-md-12">
                    <p><?php the_field('mail', 2); ?></p>
                    </div>
                </div>
            </div>

        </div><!-- row end -->
        
    </div><!-- container end -->
    
</div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = '8NCEnGtkxZ';var d=document;var w=window;function l(){
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->

</body>

</html>
