<?php get_header(); ?>
<title>
  <?php wp_title('|', true, 'right');
  bloginfo('name');
  $paged = get_query_var('paged');
  if ($paged > 1) printf(' - 第 %s 页 ', $paged);
  ?>

</title>
<link rel="stylesheet" href="<?php echo plugins_url(WP_SHUOSHUO_PLUGIN_NAME . '/style.css'); ?>">
<div class="shuoshuo_main_content">
  <div class="shuoshuo_container">
    <?php while (have_posts()): the_post(); ?>
      <div class="shuoshuo_list">
        <?php if (!get_post_format()) {
          $format = 'standard';
        } else {
          $format = get_post_format();
        } ?>
        <li class="shuoshuo_item">
          <div class="shuoshuo_meta">
            <div class="shuoshuo_time bg6">
<span class="day">

<?php the_time('j'); ?></span>
              <span class="month">

<?php the_time('n月'); ?></span>
            </div>
          </div>
          <div class="shuoshuo_content bor3 bg">
            <b class="shuoshuo_quote_before c_tx3"
               style="background: url(<?php echo plugins_url('wp_by_shuoshuo/image/before.png'); ?>) no-repeat;">

              “</b>
            <div class="shuoshuo_detail">
              <?php the_content(); ?>
            </div>
            <span class="shuoshuo_more">

<a href="<?php the_permalink(); ?>#comments" target="_blank" title="评论"><i class="fa fa-comments"></i>评论 </a>

<a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>"><i class="fa fa-eye"></i>详情</a>

</span>
            <b class="shuoshuo_quote_after c_tx3"
               style="background: url(<?php echo plugins_url('wp_by_shuoshuo/image/after.png'); ?>) no-repeat;">

              ”</b>
          </div>
        </li>
        <div class="clear"></div>
      </div>
    <?php endwhile; ?>
    <div class="clear"></div>
    <div class="pagination">
      <?php wp_shuoshuo_pagenavi(); ?>
    </div>
  </div>
  <div class="shuoshuo_sidebar">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
