<?php get_header(); ?>
    <link rel="stylesheet" href="<?php echo plugins_url(WP_SHUOSHUO_PLUGIN_NAME.'/style.css'); ?>">
    <div id="shuoshuo-container">
        <div id="single-shuoshuo">
            <?php while (have_posts()):
            the_post(); ?>
            <div class="single-content">
                <?php the_content(); ?>
            </div>
            <?php ?>
        </div>
        <?php if (comments_open()) comments_template('', true); ?>
        <?php endwhile; ?>
    </div>
<?php get_footer(); ?>