<?php get_header() ?>
<?php
$post = @(new WP_Query([
    'post_type' => 'page',
    'name' => 'blog',
    'numberposts' => 1,
]))->posts[0];
$content = apply_filters('the_content', @$post->post_content);
echo $content;
?>
<?php get_footer() ?>