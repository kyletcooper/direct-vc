<?php

use wrd\Component_Tags;

$tags = explode(",", $attrs['tags']);

foreach ($tags as $i => $tag) {
    $tags[$i] = trim($tag);

    if (strlen($tags[$i]) < 1) {
        unset($tags[$i]);
    }
}

new Component_Tags([
    "tags" => $tags
]);
