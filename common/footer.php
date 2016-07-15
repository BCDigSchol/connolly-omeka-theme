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

        <p class="project">This website was created through a partnership with S&eacute;amus Connolly and the Boston College Libraries. All materials on this site may be freely shared and adapted according to the terms of the <a href="http://creativecommons.org/licenses/by-nc/4.0/" rel="license">Creative Commons Attribution-NonCommercial 4.0 International License</a>.</p>        

        <div class="footer-block">
            <a href="http://library.bc.edu/" target="_blank" title="The Boston College Libraries">
                <img style="border-width: 0;" src="http://library.bc.edu/connolly/themes/CustomTheme/img/bc_title.png" alt="Boston College Libraries" />
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

</body>

</html>
