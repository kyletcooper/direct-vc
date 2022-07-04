<?php

namespace wrd;

if ($attrs['post']) {
    CustomPost::render_post_preview(get_post_style(get_post_type($attrs['post'])), false, $attrs['post']);
}
