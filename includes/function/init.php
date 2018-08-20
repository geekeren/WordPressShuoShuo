<?php
function register_shuoshuo()
{
    $labels = array('name' => '说说',
        'singular_name' => '说说',
        'add_new' => '发表说说',
        'add_new_item' => '发表说说',
        'edit_item' => '编辑说说',
        'new_item' => '新说说',
        'view_item' => '查看说说',
        'search_items' => '搜索说说',
        'not_found' => '暂无说说',
        'not_found_in_trash' => '没有已遗弃的说说',
        'parent_item_colon' => '', 'menu_name' => '说说');
    $args = array('labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => ['post', 'custom_css'],
        'has_archive' => true, 'hierarchical' => false,
        'menu_position' => null, 'supports' => array('editor', 'author', 'title', 'comments'));
    register_post_type('shuoshuo', $args);
}

//注册重写规则
function register_shuoshuo_rewrite_rule()
{
    add_rewrite_rule('^shuoshuo$', 'index.php?post_type=shuoshuo', 'top');
}

function shuoshuo_archive_template($single)
{
    global $wp_query, $post;
    if (isShuoShuo($post)) {
        if (file_exists(WP_SHUOSHUO_PLUGIN_DIR . '/includes/template/archive-shuoshuo.php')) {
            return WP_SHUOSHUO_PLUGIN_DIR . '/includes/template/archive-shuoshuo.php';
        }
    }
    return $single;

}

function shuoshuo_single_template($single)
{
    global $wp_query, $post;
    if (isShuoShuo($post)) {
        if (file_exists(WP_SHUOSHUO_PLUGIN_DIR . '/includes/template/single-shuoshuo.php')) {
            return WP_SHUOSHUO_PLUGIN_DIR . '/includes/template/single-shuoshuo.php';
        }
    }
    return $single;

}

function isShuoShuo($post)
{
    global $paged, $page, $post;
    return $post->post_type == WP_SHUOSHUO_POST_TYPE;
}

function remove_element_from_array($arr, $element)
{
    echo 'dddd'.var_dump($arr);
//    $new_arr = array();
//    foreach ($arr as $value) {
//        if ($value == $element) {
//            continue;
//        } else {
//            $new_arr[] = $value;
//        }
//    }
//    return $new_arr;
}

function my_home_category($query)
{
    global $post;
    if (!isShuoShuo($post)) {
        $query->set('post_type', remove_element_from_array($query->get('post_type'), WP_SHUOSHUO_POST_TYPE));
    }
}

//add_action('pre_get_posts', 'my_home_category');

/* Filter the single_template with our custom function*/
add_filter('archive_template', 'shuoshuo_archive_template');
add_filter('single_template', 'shuoshuo_single_template');

add_action('init', 'register_shuoshuo');
add_action('init', 'register_shuoshuo_rewrite_rule');
?>