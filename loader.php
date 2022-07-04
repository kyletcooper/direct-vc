<?php

namespace wrd;

if (function_exists("direct_version")) {
    $dirs = array_filter(glob(DIRECT_VC_DIR . '/blocks/*'), 'is_dir');

    foreach ($dirs as $dir) {
        if (file_exists("$dir/block.php")) {
            include_once "$dir/block.php";
        }
    }
}
