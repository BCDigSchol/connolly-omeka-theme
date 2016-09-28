<?php

/**
 * @package     omeka
 * @subpackage  solr-search
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

$num_solr_results = count($results->response->docs);
$cleaned_query = html_escape($_GET['q']);

?>

<?php queue_css_file('results'); ?>
<?php echo head(array('title' => __('Search'))); ?>

    <!-- Applied facets. -->
    <div id="solr-applied-facets">

        <ul>

            <!-- Get the applied facets. -->
            <?php foreach (SolrSearch_Helpers_Facet::parseFacets() as $f): ?>
                <li>

                    <!-- Facet label. -->
                    <?php $label = SolrSearch_Helpers_Facet::keyToLabel($f[0]); ?>
                    <span class="applied-facet-label"><?php echo $label; ?></span> >
                    <span class="applied-facet-value"><?php echo $f[1]; ?></span>

                    <!-- Remove link. -->
                    <?php $url = SolrSearch_Helpers_Facet::removeFacet($f[0], $f[1]); ?>
                    (<a href="<?php echo $url; ?>">remove</a>)

                </li>
            <?php endforeach; ?>

        </ul>

    </div>


    <!-- Facets. -->
    <div id="solr-facets">

        <?php if ($num_solr_results): ?>
            <h2><?php echo __('Limit by:'); ?></h2>
        <?php endif; ?>

        <?php foreach ($results->facet_counts->facet_fields as $name => $facets): ?>

            <!-- Does the facet have any hits? -->
            <?php if (count(get_object_vars($facets))): ?>

                <!-- Facet label. -->
                <?php $label = SolrSearch_Helpers_Facet::keyToLabel($name); ?>

                <?php if ($label !== 'Result Type'): ?>

                    <?php $label === 'Collection' ? 'Type' : $collection; ?>

                    <strong><?php echo $label; ?></strong>

                    <ul>
                        <!-- Facets. -->
                        <?php foreach ($facets as $value => $count): ?>
                            <li class="<?php echo $value; ?>">

                                <!-- Facet URL. -->
                                <?php $url = SolrSearch_Helpers_Facet::addFacet($name, $value); ?>

                                <!-- Facet link. -->
                                <a href="<?php echo $url; ?>" class="facet-value">
                                    <?php echo $value; ?>
                                </a>

                                <!-- Facet count. -->
                                (<span class="facet-count"><?php echo $count; ?></span>)

                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            <?php endif; ?>

        <?php endforeach; ?>
    </div>


    <!-- Results. -->
    <div id="solr-results">

        <!-- Number found. -->
        <h2 id="num-found">
            <?php if ($num_solr_results > 0): ?>
                You searched for <em><?= $cleaned_query ?></em>.
                <?= $results->response->numFound; ?> result<?php if ($num_solr_results !== 1): ?>s<?php endif; ?> found.
            <?php else: ?>
                Your search did not return any results.
            <?php endif; ?>
        </h2>

        <?php foreach ($results->response->docs as $doc): ?>

            <!-- Document. -->
            <div class="result">

                <!-- Header. -->
                <div class="result-header">

                    <!-- Record URL. -->
                    <?php $url = SolrSearch_Helpers_View::getDocumentUrl($doc); ?>

                    <!-- Title. -->
                    <a href="<?php echo $url; ?>" class="result-title"><?php
                        $title = is_array($doc->title) ? $doc->title[0] : $doc->title;
                        if (empty($title)) {
                            $title = '<i>' . __('Untitled') . '</i>';
                        }
                        echo $title;
                        ?></a>

                </div>

                <!-- Highlighting. -->
                <?php if (get_option('solr_search_hl')): ?>
                    <ul class="hl">
                        <?php foreach ($results->highlighting->{$doc->id} as $field): ?>
                            <?php foreach ($field as $hl): ?>
                                <li class="snippet"><?php echo bcl_fix_snippet_text(strip_tags($hl, '<em>')); ?></li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </div>


<?php echo pagination_links(); ?>
<?php echo foot();
