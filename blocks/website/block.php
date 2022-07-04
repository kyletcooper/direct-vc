<?php

namespace wrd;

new Block([
    "slug" => "website",
    "name" => __("Website Preview", 'direct'),
    "description" => __("Add a block link to a webpage or PDF.", 'direct'),

    "settings" => [
        new Block_Setting([
            "slug" => "url",
            "name" => __("URL", 'direct'),
            "holder" => "span",
        ]),

        new Block_Setting([
            "slug" => "size",
            "name" => __("Size", 'direct'),

            "type" => "select",
            "default" => [
                __("Normal", 'direct') => "normal",
                __("Small", 'direct') => "small",
            ]
        ]),
    ],
]);
