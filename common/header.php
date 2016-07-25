<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo prepare_title(implode(' &middot; ', $titleParts)); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>
    <!-- Stylesheets -->
    <?php
    queue_css_file(array('style'));

    echo head_css();
    ?>


    <script src="https://use.fontawesome.com/2f554b814c.js"></script>


    <!-- JavaScripts -->
    <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
    <?php queue_js_file('vendor/respond'); ?>
    <?php queue_js_file('vendor/jquery-accessibleMegaMenu'); ?>
    <?php queue_js_file('berlin'); ?>
    <?php queue_js_file('globals'); ?>
    <?php echo head_js(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>
    var element = document.getElementById(element_id);
    element.className += " " + newClassName;
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
        var $category = $('#categories h3');

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

</head>

 <?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>


    <div id="wrapper">
<!--DIV WILL END IN FOOTER-->

        <header role="banner">

          <div class="ribbon">
            <h1>Coming Fall 2016</h1>
          </div>

            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
              <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?>
                   <div id="search-container" role="search">
                      <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                      <?php echo search_form(array('show_advanced' => true)); ?>
                      <?php else: ?>
                      <?php echo search_form(); ?>
                      <?php endif; ?>
                    </div>
                      <div class="null">
                      <a href="#" class="scrollup" title="Scroll to content"><span class="arrow"></span>Jump to content</a>
                      </div>
              </div>

        </header>

        <div id="primary-nav" role="navigation">
             <?php
                  echo public_nav_main();
             ?>

            
         </div>
  
         <div id="mobile-nav" role="navigation" aria-label="<?php echo __('Mobile Navigation'); ?>">
             <?php
                  echo public_nav_main();
             ?>
         </div>
        
        <?php echo theme_header_image(); ?>
                       
    <div id="content" role="main" tabindex="-1">

<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
