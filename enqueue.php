<?php

add_action('admin_enqueue_scripts', function () {
    if (function_exists("vc_add_shortcode_param")) {
        // wp_enqueue_script('tagify', get_template_directory_uri() . '/lib/Tagify/tagify.min.js', '0.1', true);
        // wp_enqueue_script('wrd-editor', get_template_directory_uri() . '/assets/js/editor.js', ['wp-api', 'tagify'], '0.1', true);

        // wp_enqueue_style('tagify', get_template_directory_uri() . '/lib/Tagify/tagify.css');
        // wp_enqueue_style('wrd-editor', get_template_directory_uri() . '/assets/css/editor.css', ['tagify']);
    }
});
