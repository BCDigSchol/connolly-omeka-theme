<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div class="intro">
  <p>The Séamus Connolly Collection of Irish Music presents traditional tunes collected by Séamus Connolly over the past 14 years as the Sullivan Family Artist-in-Residence at Boston College. It includes 334 audio recordings featuring more than 130 musicians with accompanying stories, transcriptions, and introductory essays. The online collection can be searched or browsed and includes playlists that can also be accessed via <a href="https://soundcloud.com/connollymusiccollection/">SoundCloud</a>. This project was a partnership between Séamus Connolly and the Boston College Libraries.</p>
</div>

<div id="categories">

    <a href="http://connollymusiccollection.bc.edu/items/browse?sort_field=Dublin+Core%2CIdentifier" id="box" class="gray">
        <h3>Browse Content</h3>
        <span class="innerbox boat"></span>
    </a>

    <a href="http://connollymusiccollection.bc.edu/collections/browse?sort_field=Dublin+Core%2CTitle" id="box" class="gray">
        <h3>Browse By Tune Type</h3>
        <span class="innerbox hill"></span>
    </a>

    <a href="http://connollymusiccollection.bc.edu/exhibits/show/essays/essay-connolly" id="box" class="gray end">
        <h3>Essays</h3>
        <span class="innerbox sky"></span>
    </a>

    <a href="http://connollymusiccollection.bc.edu/exhibits/show/playlists" id="box" class="gray">
        <h3>Playlists</h3>
        <span class="innerbox rainbow"></span>
    </a>

    <a href="http://connollymusiccollection.bc.edu/about" id="box" class="gray">
        <h3>About</h3>
        <span class="innerbox road"></span>
    </a>

    <a href="http://connollymusiccollection.bc.edu/references" id="box" class="gray end">
        <h3>Index</h3>
        <span class="innerbox church"></span>
    </a>

</div>

<div id="auto_content">

    <div id="primary">

        <?php if ($homepageText = get_theme_option('Homepage Text')): ?>

        <p><?php echo $homepageText; ?></p>
        <?php endif; ?>

        <?php if (get_theme_option('Display Featured Item') == 1): ?>
        <!-- Featured Item -->
        <div id="featured-item" class="featured">
            <h2><?php echo __('Featured Content'); ?></h2>
            <?php echo random_featured_items(2); ?>
        </div><!--end featured-item-->
        <?php endif; ?>

        <?php if (get_theme_option('Display Featured Collection')): ?>
        <!-- Featured Collection -->
        <div id="featured-collection" class="featured">
            <h2><?php echo __('Featured Collection'); ?></h2>
            <?php echo random_featured_collection(); ?>
        </div><!-- end featured collection -->
        <?php endif; ?>

        <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
        <!-- Featured Exhibit -->
        <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
        <?php endif; ?>

    </div>
    <!-- end primary -->

    <div id="secondary">
        <?php
        $recentItems = get_theme_option('Homepage Recent Items');
        if ($recentItems === null || $recentItems === ''):
            $recentItems = 3;
        else:
            $recentItems = (int) $recentItems;
        endif;
        if ($recentItems):
        ?>
        <div id="recent-items">
            <h2><?php echo __('Recently Added Items'); ?></h2>
            <?php echo recent_items($recentItems); ?>
            <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
        </div><!--end recent-items -->
        <?php endif; ?>

        <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

    </div>
    <!-- end secondary -->
</div>

<?php echo foot(); ?>
