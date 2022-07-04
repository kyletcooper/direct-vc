<?php

namespace wrd;

new Block([
    "slug" => "post-preview",
    "name" => __("Post Preview", 'direct'),
    "description" => __("Show a snippet of a post that links of to the full page.", 'direct'),

    "settings" => [
        new Block_Setting([
            "type" => "posts",
            "posttype" => "any",
            "max" => 1,

            "slug" => "post",
            "name" => __("Post", 'direct'),
        ]),
    ],
]);
