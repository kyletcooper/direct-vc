<?php

namespace wrd;

new Block([
    "slug" => "button",
    "name" => __("Button", 'direct'),
    "description" => __("Add a clear call to action link.", 'direct'),

    "settings" => [
        new Block_Setting([
            "name" => __("Label", 'direct'),
            "holder" => "span",
        ]),

        new Block_Setting([
            "name" => __("URL", 'direct'),
            "holder" => "span",
        ]),

        new Block_Setting([
            "name" => __("Icon", 'direct'),
            "description" => __("Icon font string from Material Design.", 'direct'),
        ]),

        new Block_Setting([
            "name" => __("Secondary", 'direct'),
            "type" => "checkbox",
        ]),
    ],
]);
