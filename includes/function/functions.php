<?php
/* 分页导航
/* -------------*/
function wp_shuoshuo_pagenavi($before = '', $after = '', $p = 2)
{
    if (is_singular()) return;
    global $wp_query, $paged;
    $max_page = $wp_query->max_num_pages;
    if ($max_page == 1)
        return;
    if (empty($paged))
        $paged = 1;
    // $before = "<span class='pg-item'><a href='".esc_html( get_pagenum_link( $i ) )."'>{$i}</a></span>";
    echo $before;
    if ($paged > 1)
        wp_shuoshuo_p_link($paged - 1, '上一页', '<span class="pg-item pg-nav-item pg-prev">', '上一页');
    if ($paged > $p + 1)
        wp_shuoshuo_p_link(1, '首页', '<span class="pg-item">', 1);
    for ($i = $paged - $p; $i <= $paged + $p; $i++) {
        if ($i > 0 && $i <= $max_page)
            $i == $paged ? print "<span class='pg-item pg-item-current'><span class='current'>{$i}</span></span>" : wp_shuoshuo_p_link($i, '', '<span class="pg-item">', $i);
    }
    if ($paged < $max_page - $p) wp_shuoshuo_p_link($max_page, '末页', '<span class="pg-item"> ... </span><span class="pg-item">', $max_page);
    if ($paged < $max_page) wp_shuoshuo_p_link($paged + 1, '下一页', '<span class="pg-item pg-nav-item pg-next">', '下一页');
    echo $after;
}

function wp_shuoshuo_p_link($i, $title = '', $linktype = '', $prevnext = '')
{
    if ($title == '') $title = "浏览第{$i}页";
    if ($linktype == '') {
        $linktext = $i;
    } else {
        $linktext = $linktype;
    }
    echo "{$linktext}<a href='", esc_html(get_pagenum_link($i)), "' title='{$title}' class='navbutton'>{$prevnext}</a></span>";
}