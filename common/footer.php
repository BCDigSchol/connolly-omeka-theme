</div><!-- end content -->

<footer role="contentinfo">

    <div id="footer-content" class="center-div">
        <?php if($footerText = get_theme_option('Footer Text')): ?>
        <div id="custom-footer-text">
            <p><?php echo get_theme_option('Footer Text'); ?></p>
        </div>
        <?php endif; ?>
        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
        <?php endif; ?>

        <!-- HARDCODED CUSTOM FOOTER -->

        <p class="project">
        <span style="float: left;"><a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" width="88" height="31" /></a></span>
        This website was created through a partnership with S&eacute;amus Connolly and the Boston College Libraries (2016). All materials on this site may be freely shared and adapted according to the terms of the <a href="http://creativecommons.org/licenses/by-nc/4.0/" rel="license">Creative Commons Attribution-NonCommercial 4.0 International License</a>.</p>

        <div class="footer-block">
            <a href="http://library.bc.edu/" target="_blank" title="The Boston College Libraries">
                <img style="border-width: 0;" src="/themes/CustomTheme/img/bc_title.png" alt="Boston College Libraries" width="194" height="73" />
            </a>

            <ul>
                <li><a href="mailto:burnsref@bc.edu" target="_blank" id="contact" class="mediablock"><span class="accessibility-text"Contact Us</span></a></li>
                <li><a href="https://twitter.com/bclibraries" target="_blank" id="twitter" class="mediablock"><span class="accessibility-text">Boston College Library's Twitter feed</span></a></li>
                <li><a href="https://www.facebook.com/bostoncollegelibraries/" target="_blank" id="facebook" class="mediablock"><span class="accessibility-text">Boston College Library's Facebook</span></a></li>
                <li><a href="https://soundcloud.com/connollymusiccollection" target="_blank" id="soundcloud" class="mediablock"><span class="accessibility-text">Seamus Connolly on SoundCloud</span></a></li>
            </ul>
        </div>

        <!-- END CUSTOM FOOTER-->

        <nav><?php echo public_nav_main()->setMaxDepth(0); ?></nav>
<br />
        <h6>Image Credit: The Killaloe Bridge and its thirteen arches inspired the name for the tune <a href="http://connollymusiccollection.bc.edu/document/590">"Thirteen Arches,"</a> composed by Séamus Connolly in memory of his father, Mick Connolly. Photograph by Séamus Connolly. <a href="http://connollymusiccollection.bc.edu/privacy-policy">Privacy Policy</a>. </h6>

        <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>

    </div><!-- end footer-content -->

     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>

</div>
<!-- END WRAPPER DIV FROM HEADER-->

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu();
        Berlin.dropDown();
    });
</script>

<!-- SCROLL TO TOP SCRIPT -->
<script>
    $(document).ready(function () {


        $('.scrollup').click(function () {
            $("html, body").animate({
                scrollTop: $('#content').offset().top
            }, 600);
            return false;
        });

    });
</script>

<script>
    $(document).ready(function () {

        $('#categories h3').each(function() {

            $(this).hover(
                function() {
                    $(this).siblings('.innerbox').addClass('innerboxhover');
                },

                function() {
                    $(this).siblings('.innerbox').removeClass('innerboxhover');
                }
            );
        });

        $('.innerbox').each(function() {

            $(this).hover(
                function() {
                    $(this).siblings('#categories h3').addClass('categoriesboxh3hover');
                },

                function() {
                    $(this).siblings('#categories h3').removeClass('categoriesboxh3hover');
                }
            );
        });
    });

</script>

</body>

</html>
