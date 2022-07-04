<?php

namespace wrd;

$post_ids = explode(",", $attrs['posts']);

new Component_Collection([
    "posts" => WRD::ids_to_wp_posts($post_ids),

    "title" => $attrs['title'],
    "template" => $attrs['layout'],

    "footer" => [
        new Component_IconLabel([
            "icon" => $attrs['action-icon'],
            "label" => $attrs['action-label'],
            "url" => $attrs['action-url']
        ], false),

        new Component_IconLabel([
            "icon" => $attrs['link-icon'],
            "label" => $attrs['link-label'],
            "url" => $attrs['link-url'],
            "dir" => "right"
        ], false),
    ]
]);
