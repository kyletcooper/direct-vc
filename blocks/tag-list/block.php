<?php

namespace wrd;

new Block([
    "slug" => "tag-list",
    "name" => __("Tags List", 'direct'),
    "description" => __("Add chips for keywords.", 'direct'),

    "settings" => [
        new Block_Setting([
            "slug" => "tags",
            "name" => __("Tags", 'direct'),
            "description" => __("Comma seperated tags.", 'direct'),
            "holder" => "span",
        ]),
    ],
]);
