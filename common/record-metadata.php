<?php if(isset(get_view()->item)): //check if this looks like an item show page ?>

<?php
//dig through the elements for display that are passed into this file
//put it all into a new array of just the elements we want
//this should let you collect the elements you want in the order you want
//follow this pattern to get more or change the order

$wantedElements = array();
/*$wantedElements[''] = $elementsForDisplay['Dublin Core']['Title'];*/
if(isset($elementsForDisplay['Item Type Metadata'])) {
}
/*$wantedElements ['Alternative Title'] = $elementsForDisplay['Dublin Core'] ['Alternative Title'];*/
$wantedElements [' '] = $elementsForDisplay['Dublin Core'] ['Has Part'];
$wantedElements['Story'] = $elementsForDisplay['Dublin Core']['Description'];
$wantedElements ['Creator'] = $elementsForDisplay ['Dublin Core'] ['Creator'];
$wantedElements ['Subject'] = $elementsForDisplay ['Dublin Core'] ['Subject'];
$wantedElements ['Publisher'] = $elementsForDisplay ['Dublin Core'] ['Publisher'];
$wantedElements ['View all items by'] = $elementsForDisplay ['Dublin Core'] ['Relation'];
$wantedElements ['Rights'] = $elementsForDisplay ['Dublin Core'] ['Rights'];
?>

<div class="element-set">
    <?php foreach ($wantedElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$elementName")); ?>" class="element">
        <h3><?php echo html_escape(__($elementName)); ?></h3>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->

<?php else: ?>

<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <h3><?php echo html_escape(__($elementName)); ?></h3>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach; ?>

<?php endif; ?>
