<!--Updated Jun 15, 2016 AK-->
<?php
function custom_paging()
{
//Starts a conditional statement that determines a search has been run
    if (isset($_SERVER['QUERY_STRING'])) {

        // Sets the current item ID to the variable $current
        $current = metadata('item', 'id');

        //Break the query into an array
        parse_str($_SERVER['QUERY_STRING'], $queryarray);

        //Items don't need the page level
        unset($queryarray['page']);

        $itemIds = array();
        $list = array();
        if (isset($queryarray['query'])) {
            //We only want to browse previous and next for Items
            $queryarray['record_types'] = array('Item');
            //Get an array of the texts from the query.
            $textlist = get_db()->getTable('SearchText')->findBy($queryarray);
            //Loop through the texts ans populate the ids and records.
            foreach ($textlist as $value) {
                $itemIds[] = $value->record_id;
                $record = get_record_by_id($value['record_type'], $value['record_id']);
                $list[] = $record;
            }
        } elseif (isset($queryarray['advanced'])) {
            if (!array_key_exists('sort_field', $queryarray)) {
                $queryarray['sort_field'] = 'added';
                $queryarray['sort_dir'] = 'd';
            }
            //Get an array of the items from the query.
            $list = get_db()->getTable('Item')->findBy($queryarray);
            foreach ($list as $value) {
                $itemIds[] = $value->id;
                $list[] = $value;
            }
        } //Browsing all items in general
        else {
            if (!array_key_exists('sort_field', $queryarray)) {
                $queryarray['sort_field'] = 'added';
                $queryarray['sort_dir'] = 'd';
            }
            $list = get_db()->getTable('Item')->findBy($queryarray);
            foreach ($list as $value) {
                $itemIds[] = $value->id;
            }
        }

        //Update the query string without the page and with the sort_fields
        $updatedquery = http_build_query($queryarray);
        $updatedquery = preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', $updatedquery);

        // Find where we currently are in the result set
        $key = array_search($current, $itemIds);

        // If we aren't at the beginning, print a Previous link
        if ($key > 0) {
            $previousItem = $list[$key - 1];
            $previousUrl = record_url($previousItem, 'show') . '?' . $updatedquery;
            $text = __('&larr; Previous Item');
            echo '<li id="previous-item" class="previous"><a href="' . html_escape(
                    $previousUrl
                ) . '">' . $text . '</a></li>';
        }

        // If we aren't at the end, print a Next link
        if ($key >= 0 && $key < (count($list) - 1)) {
            $nextItem = $list[$key + 1];
            $nextUrl = record_url($nextItem, 'show') . '?' . $updatedquery;
            $text = __("Next Item &rarr;");
            echo '<li id="next-item" class="next"><a href="' . html_escape($nextUrl) . '">' . $text . '</a></li>';
        }
    } else {
        // If a search was not run, then the normal next/previous navigation is displayed.
        echo '<li id="previous-item" class="previous">' . link_to_previous_item_show() . '</li>';
        echo '<li id="next-item" class="next">' . link_to_next_item_show() . '</li>';
    }
}

function connolly_format_citations($citation_string)
{
    $citation_string = strip_viaf($citation_string);
    $citation_string = reverse_articles($citation_string);
    return $citation_string;
}

function reverse_articles($citation_string)
{
    $citation_string = preg_replace('/&#8220;(.*), (The|A|An)(,| \/)/', '&#8220;$2 $1$3', $citation_string);
    return $citation_string;
}

// Remove VIAF IDs
function strip_viaf($citation_string)
{
    return preg_replace('/ \d{8,12}/', '', $citation_string);
}

function bcl_link_to_browse_collection(Collection $collection)
{
    $name = metadata($collection, array('Dublin Core', 'Title'));
    return link_to_items_browse($name, ['collection' => $collection->id]);
}

// The Solr search handles snippets poorly. This function fixes some of that.
function bcl_fix_snippet_text($snippet_text)
{
    // HTML entities at the end of snippets aren't completed.
    $snippet_text = preg_replace('/&lsquo$/u','‘',$snippet_text);
    $snippet_text = preg_replace('/&rsquo$/u','’',$snippet_text);

    // Punctuation at the start of a snippet looks dumb.
    $snippet_text = ltrim($snippet_text,'.,; ');

    // Only add ellipses if they really should be there.
    if (! preg_match('/^[A-Z]/u',$snippet_text)) {
        $snippet_text = "...$snippet_text";
    }
    if (! preg_match('/[\.]$/u', $snippet_text)) {
        $snippet_text = "$snippet_text...";
    }

    return $snippet_text;
}