<?php

use wrd\Component_Website;

new Component_Website([
    "url" => $attrs['url'],
    "small" => @$attrs['size'] == "small"
]);
