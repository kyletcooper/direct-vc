<?php

if (!function_exists("vc_add_shortcode_param")) {
    return;
}


function direct_vc_param_posts($settings, $value)
{
    ob_start();


    $posttype = @$settings['opts']['posttype'] ?: "false";
    $max = @$settings['opts']['max'] ?: -1;

    $values = explode(",", $value);

    $posts = get_posts([
        "post_type" => $posttype,
        "posts_per_page" => "250",
        "orderby" => ["type", "title"]
    ]);

    $seen_post_types = [];

?>
    <div>
        <select <?php echo ($max > 1) ? "multiple" : ""; ?> name="<?php echo esc_attr($settings['param_name']) ?>" class="wpb_vc_param_value wrd_posts_param">

            <?php foreach ($posts as $post) : ?>

                <?php if (!in_array($post->post_type, $seen_post_types)) : ?>

                    <option disabled>
                        <?php echo (get_post_type_object($post->post_type))->label; ?>
                    </option>

                    <?php $seen_post_types[] = $post->post_type; ?>

                <?php endif; ?>

                <option value="<?php echo $post->ID ?>" <?php if (in_array($post->ID, $values)) echo "selected" ?>>
                    <?php echo str_repeat("&nbsp;", 4) . $post->post_title ?>
                </option>

            <?php endforeach; ?>

        </select>
    </div>
<?php

    return ob_get_clean();
}
vc_add_shortcode_param('posts', 'direct_vc_param_posts');

add_action('vc_edit_form_fields_after_render', function () {
    echo  '<script>initTagify();</script>';
}, 9);
