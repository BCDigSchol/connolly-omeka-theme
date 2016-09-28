<?php echo $this->form('search-form', $options['form_attributes']); ?>
<?php echo $this->formText('query', $_GET['q'], array('title' => __('Search'))); ?>
<?php if ($options['show_advanced']): ?>
    <div id="advanced-form" class="search-instructions">
        Search using:
        <ul>
            <li>Keyword
            <li>AND, OR, NOT: <code>Jigs NOT Armagh</code>
            <li>Quotation marks: <code>"Jerry o'sullivan"</code>
            <li>Wildcard character * <code>Redican*</code>
        </ul>
    </div>
<?php else: ?>
    <?php echo $this->formHidden('query_type', $filters['query_type']); ?>
    <?php foreach ($filters['record_types'] as $type): ?>
        <?php echo $this->formHidden('record_types[]', $type); ?>
    <?php endforeach; ?>
<?php endif; ?>
<?php echo $this->formButton('submit_search', $options['submit_value'], array('type' => 'submit')); ?>
</form>
