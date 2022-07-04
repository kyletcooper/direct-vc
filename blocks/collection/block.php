<?php

namespace wrd;

new Block([
    "slug" => "collection",
    "name" => __("Post Preview Collection", 'direct'),
    "description" => "Showcase a group of chosen posts",

    "settings" => [
        new Block_Setting([
            "name" => __("Title", 'direct'),
            "holder" => "span",
        ]),


        new Block_Setting([
            "type" => "posts",
            "posttype" => "any",
            "max" => 20,

            "slug" => "posts",
            "name" => __("Posts", 'direct'),
        ]),


        new Block_Setting([
            "name" => __("Layout", 'direct'),
            "type" => "select",
            "default" => array_flip(Component_Collection::get_layouts())
        ]),



        new Block_Setting([
            "name" => __("Action Label", 'direct'),
        ]),

        new Block_Setting([
            "name" => __("Action URL", 'direct'),
        ]),

        new Block_Setting([
            "name" => __("Action Icon", 'direct'),
            "description" => __("Icon font string from Material Design.", 'direct'),
        ]),



        new Block_Setting([
            "name" => __("Link Label", 'direct'),
        ]),

        new Block_Setting([
            "name" => __("Link URL", 'direct'),
        ]),

        new Block_Setting([
            "name" => __("Link Icon", 'direct'),
            "description" => __("Icon font string from Material Design.", 'direct'),
        ]),
    ]
]);
