<?php

namespace wrd;

new Block([
    "slug" => "example",
    "name" => __("Kyle's Block", 'direct'),
    "description" => __("Lorem ipsum dulcet et delores set.", 'direct'),

    "settings" => [
        new Block_Setting([
            "name" => __("Title", 'direct'),
            "holder" => "span",
        ]),
    ],
]);
