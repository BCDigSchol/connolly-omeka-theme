<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div id="primary">
    <h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>

    <div id="floatingwrapper">
      <div class="left">
          <!-- Items metadata -->
          <div id="item-metadata">
              <?php echo bcl_add_viaf_links(all_element_texts('item')); ?>
          </div>

      </div>


      <div class="right">


          <!--<h3><?php echo __('Files'); ?></h3>-->
          <div id="item-images">
               <?php echo files_for_item(['imageSize'=>'fullsize','linkAttributes'=>['target'=>'_blank']]); ?>
          </div>


<!--<h3><?php echo __('Note'); ?></h3>-->
          <div id="note" class="element">
            <div class="element-text"><?php echo metadata('item', array('Dublin Core','Type')); ?></div>
          </div>


          <?php if(metadata('item','Collection Name')): ?>
          <div id="collection" class="element">
            <h3><?php echo __('Song & Tune Type'); ?></h3>
            <div class="element-text"><?php echo bcl_link_to_browse_collection(get_collection_for_item());?></div>
          </div>
       <?php endif; ?>


         <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata('item','has tags')): ?>
    <div id="item-tags" class="element">
        <h3>Part of:</h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
    <?php endif;?>


          <!-- The following prints a citation for this item. -->
      <div id="item-citation" class="element">
          <h3><?php echo __('Citation'); ?></h3>
          <div class="element-text"><?php echo connolly_format_citations(metadata('item','citation',array('no_escape'=>true))); ?></div>
      </div>

      </div>
    </div>



       <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

<!--Added custom pagination script-->
    <ul class="item-pagination navigation">
      <li <?php custom_paging(); ?></li>
    </ul>

</div> <!-- End of Primary. -->

 <?php echo foot(); ?>
