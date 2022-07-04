<?php

namespace wrd;

class Block
{
    const dir = "blocks";

    function __construct(array $opts)
    {
        $this->opts = $opts;

        $this->slug = @$opts['slug'] ?: sanitize_title(@$opts['name'], uniqid());

        $this->name = @$opts['name'] ?: __("Default Block Block", 'wrd');
        $this->description = @$opts['description'] ?: "";
        $this->icon = @$opts['icon'] ?: $this->get_block_directory_uri() . '/icon.png';
        $this->category = @$opts['category'] ?: __("WRD", 'wrd');

        $this->template = @$opts['template'] ?: $this->get_block_directory() . '/template.php';
        $this->style = @$opts['style'] ?: $this->get_block_directory_uri() . '/style.css';
        $this->script = @$opts['script'] ?: $this->get_block_directory_uri() . '/script.css';

        $this->settings = @$opts['settings'] ?: [];

        $this->builders = @$opts['builders'] ?: "all";

        // echo "<pre>";
        // var_dump($this);
        // echo "</pre><br><br>";

        add_action('init', [$this, 'setup_shortcode'], 0, 0);
        add_action('init', [$this, 'setup_vc'], 4, 0);
    }

    function get_block_directory()
    {
        return trailingslashit(DIRECT_VC_DIR) . static::dir . DIRECTORY_SEPARATOR . $this->slug;
    }

    function get_block_directory_uri()
    {
        return trailingslashit(DIRECT_VC_URI) . static::dir . DIRECTORY_SEPARATOR . $this->slug;
    }

    function get_settings($to)
    {
        $settings = [];

        foreach ($this->settings as $setting) {
            $value = $setting->convert($to);
            $key = null;

            if (array_key_exists("_key", $value)) {
                $key = $value["_key"];
                unset($value["_key"]);
            }

            if (array_key_exists("_value", $value)) {
                $value = $value["_value"];
            }

            if ($key) {
                $settings[$key] = $value;
            } else {
                $settings[] = $value;
            }
        }

        return $settings;
    }



    function render_shortcode($attrs = [], $content = null)
    {
        if (!file_exists($this->template)) {
            throw new \Exception("Block template missing: " . $this->template);
        }

        $attrs = shortcode_atts($this->get_settings("shortcode"), $attrs, $this->slug);

        ob_start();
        include $this->template;
        return ob_get_clean();
    }

    function setup_shortcode()
    {
        add_shortcode($this->slug, [$this, 'render_shortcode']);
    }



    function setup_vc()
    {
        if (!function_exists('vc_map')) return;

        vc_map([
            "name" => $this->name,
            "description" => $this->description,
            "icon" => $this->icon,
            "category" => $this->category,

            "base" => $this->slug,
            "front_enqueue_js" => $this->script,
            "front_enqueue_css" => $this->style,

            "params" => $this->get_settings("vc")
        ]);
    }
}

class Block_Setting
{
    function __construct(array $opts)
    {
        $this->opts = $opts;

        $this->slug = @$opts['slug'] ?: strtolower(sanitize_title(@$opts['name'], uniqid()));

        $this->name = @$opts['name'] ?: __("Default Setting Name", 'wrd');
        $this->description = @$opts['description'] ?: "";

        $this->type = @$opts['type'] ?: "text";
        $this->default = @$opts['default'] ?: "";
    }

    /**
     * Returns associative array of parameters. Indexes with the keys '_key' & '_value' may also be sent.
     */
    function convert($to)
    {
        switch ($to) {
            case "shortcode":
                return $this->to_shortcode();
                break;

            case "vc":
                return $this->to_vc();
                break;
        }
    }

    function get_type($editor)
    {
        $types = [
            "text" => [
                "vc" => "textfield",
                "gtb" => "string",
            ],

            "textarea" => [
                "vc" => "textarea",
                "gtb" => "string"
            ],

            "select" => [
                "vc" => "dropdown",
                "gtb" => "array"
            ],

            "image" => [
                "vc" => "attach_image",
                "gtb" => "string"
            ],

            "images" => [
                "vc" => "attach_images",
                "gtb" => "string"
            ],

            "color" => [
                "vc" => "colorpicker",
                "gtb" => "string"
            ],

            "posts" => [
                "vc" => "posts",
                "gtb" => "array",
            ],

            "checkbox" => [
                "vc" => "checkbox",
                "gtb" => "boolean"
            ]
        ];

        $type = $this->type;

        $ret = @$types[$type][$editor];

        if ($ret) {
            return $ret;
        }

        return @$types["text"][$editor];
    }

    function to_shortcode()
    {
        $def = $this->default;

        if (is_array($def)) {
            $def = $def[array_key_first($def)];
        }

        return [
            "_key" => $this->slug,
            "_value" => $def,
        ];
    }

    function to_vc()
    {
        $this->get_type("vc");

        return [
            "type" => $this->get_type("vc") ?: "textfield",
            "heading" => $this->name,
            "description" => $this->description,

            "param_name" => $this->slug,
            "value" => $this->default,

            "holder" => @$this->opts['holder'] ?: "",
            "dependency" => @$this->opts['dependency'] ?: [],

            "opts" => $this->opts
        ];
    }
}


function get_terms_opts($tax)
{
    $terms = get_terms([
        "taxonomy" => $tax
    ]);

    $opts = [
        __("None", 'wrd') => "0"
    ];

    foreach ($terms as $term) {
        $opts[$term->name] = $term->term_id;
    }

    return $opts;
}
