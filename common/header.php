<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<html prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="author" content="Boston College Libraries; Séamus Connolly">
    <meta name="keywords" content="Séamus Connolly, Irish Traditional Music, Boston College Libraries, Digital Scholarship">
    <meta property="og:tag" content="Séamus Connolly, Irish Traditional Music, Boston College Libraries, Digital Scholarship">
    <meta property="og:title" content="Séamus Connolly Collection of Irish Music">
    <meta property="og:description" content="The Boston College Libraries are delighted to present The Séamus Connolly Collection of Irish Music. This digital collection features traditional tunes and songs collected by master fiddle player Séamus Connolly, Sullivan Family Artist-in-Residence in Irish Music at Boston College (2004 to 2015) and National Heritage Fellow (2013). Freely available, the collection offers over 330 audio recordings featuring more than 130 musicians via SoundCloud, with accompanying stories, transcriptions, and introductory essays.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://connollymusiccollection.bc.edu/">
    <meta property="og:image" content="https://github.com/BCDigSchol/connolly-omeka-theme/blob/master/img/DSCF0016-Connolly-175-ppi.jpg">

    <?php endif; ?>

    <link href="//fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>
    <!-- Stylesheets -->
    <?php
    queue_css_file(array('style'));

    echo head_css();
    ?>


    <script src="//use.fontawesome.com/2f554b814c.js"></script>

    <!-- Icons -->
    <link rel="icon" href="/themes/CustomTheme/img/favicon.ico" type="image/x-icon" / >

    <!-- JavaScripts -->
    <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
    <?php queue_js_file('vendor/respond'); ?>
    <?php queue_js_file('vendor/jquery-accessibleMegaMenu'); ?>
    <?php queue_js_file('berlin'); ?>
    <?php queue_js_file('globals'); ?>
    <?php echo head_js(); ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-76427417-2', 'auto');
        ga('send', 'pageview');
    </script>

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
                      <a href="#content" class="scrollup" title="Scroll to content"><span class="arrow"></span>Jump to content</a>
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
