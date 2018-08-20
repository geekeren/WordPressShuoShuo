<?php
/*
Plugin Name: Wordpress说说
Version: 0.0.1
Plugin URI: http://wangbaiyuan.cn/by-shuoshuo-wp-plugin-release-feedback.html
Author: 王柏元的的博客
Author URI: http://wangbaiyuan.cn
Description: Wordpress的写说说、微语插件。
*/
define('WP_SHUOSHUO_PLUGIN_DIR', WP_PLUGIN_DIR.'/'. dirname(plugin_basename(__FILE__)));
define('WP_SHUOSHUO_POST_TYPE', 'shuoshuo');
define('WP_SHUOSHUO_PLUGIN_NAME', 'wp-shuoshuo');
require_once(WP_SHUOSHUO_PLUGIN_DIR. '/includes/function/init.php');
require_once(WP_SHUOSHUO_PLUGIN_DIR. '/includes/function/functions.php');