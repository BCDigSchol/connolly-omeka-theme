
<?php
$pageTitle = __('Browse Content'); /*Updated browse page title to reflect navigation tab  */
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(array (
    array (
    'label' => __('Browse by Playlist Content'),
    'uri' => url('items/tags')
  ),
  array (
  'label' => __('Search Content'),
  'uri' => url('items/search')
),
array (
'label' => __('Browse Index'),
'uri' => url('references'),
)
    )); ?>
</nav>


<?php echo item_search_filters(); ?>

<?php echo pagination_links(); ?>

<?php if ($total_results > 0): ?>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Playlist')]='Dublin Core,Identifier';
/* Suppressing sort links that are not being used AK
$sortLinks[__('Date Added')] = 'added';*/
?>
<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>

<?php endif; ?>

<?php foreach (loop('items') as $item): ?>
<div class="item record">

<!--Added custom pagination script AK -->
<?php
if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']))
    {

        $searchlink = record_url('item').'?' . $_SERVER['QUERY_STRING'];

        echo '<h2><a href="'.$searchlink.'">'. metadata('item', array('Dublin Core','Title')).'</a></h2>';
    }

    else
    {
        echo '<h2>'.link_to_item(metadata('item', array('Dublin Core','Title')), array('class'=>'permalink')).'</h2>';
    }
?>
    <div class="item-meta">
    <?php if (metadata('item', 'has thumbnail')): ?>
    <div class="item-img">
        <?php echo link_to_item(item_image('square_thumbnail')); ?>
    </div>
    <?php endif; ?>

    <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
    <div class="item-description">
        <?php echo $description; ?>
    </div>
    <?php endif; ?>

    <?php if (metadata('item', 'has tags')): ?>
    <div class="tags"><p><strong>
      <?/*<?php echo __('Tags');?>*/ ?>Part of:</strong>
        <?php echo tag_string('items'); ?></p>
    </div>
    <?php endif; ?>

    <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

    </div><!-- end class="item-meta" -->
</div><!-- end class="item hentry" -->
<?php endforeach; ?>

<?php echo pagination_links(); ?>

<div id="outputs">
    <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
    <?php echo output_format_list(false); ?>
</div>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>
