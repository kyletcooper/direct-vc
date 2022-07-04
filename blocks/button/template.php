<?php

namespace wrd;

new Component_Button([
    "type" => "link",
    "url" => $attrs['url'],
    "label" => $attrs['label'],
    "icon" => $attrs['icon'],
    "secondary" => $attrs['secondary']
]);
