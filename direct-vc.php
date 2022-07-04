<?php

/**
 * Plugin Name: WPBakery Blocks - Direct Theme Extension
 * Plugin URI: https://webresultsdirect.com/
 * Description: Adds new blocks to WPBakery to work with Direct Theme
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Web Results Direct
 * Author URI: https://webresultsdirect.com/
 */

namespace wrd;


define('DIRECT_VC_PLUGIN', __FILE__);
define('DIRECT_VC_DIR', __DIR__);
define('DIRECT_VC_URI', plugin_dir_url(__FILE__));


add_action('init', function () {
    require_once DIRECT_VC_DIR . '/enqueue.php';
    require_once DIRECT_VC_DIR . '/params.php';
    require_once DIRECT_VC_DIR . '/block.class.php';
    require_once DIRECT_VC_DIR . '/loader.php';
}, -1);

add_action('vc_before_init', function () {
    vc_set_as_theme();
});
