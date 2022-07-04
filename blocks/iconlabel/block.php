<?php

namespace wrd;

new Block([
    "slug" => "iconlabel",
    "name" => __("Icon Label", 'direct'),
    "description" => __("Display a piece of text/a link next to an icon.", 'direct'),

    "settings" => [
        new Block_Setting([
            "name" => __("Label", 'direct'),
            "holder" => "span",
        ]),

        new Block_Setting([
            "name" => __("Icon", 'direct'),
            "description" => __("Icon font string from Material Design.", 'direct'),
        ]),

        new Block_Setting([
            "name" => __("URL", 'direct'),
        ]),
    ],
]);
