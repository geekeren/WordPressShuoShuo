<?php
/*
Plugin Name: Wordpress说说
Version: 0.0.1
Plugin URI: https://github.com/geekeren/WordPressShuoShuo
Author: 王柏元的的博客
Author URI: http://wangbaiyuan.cn
Description: Wordpress的写说说、微语插件。
*/
define('WP_SHUOSHUO_PLUGIN_DIR', WP_PLUGIN_DIR.'/'. dirname(plugin_basename(__FILE__)));
define('WP_SHUOSHUO_POST_TYPE', 'shuoshuo');
define('WP_SHUOSHUO_ROOT_PATH', basename(__DIR__));
define('WP_SHUOSHUO_PLUGIN_NAME', WP_SHUOSHUO_ROOT_PATH);
require_once(WP_SHUOSHUO_PLUGIN_DIR. '/init.php');
require_once(WP_SHUOSHUO_PLUGIN_DIR. '/includes/function/functions.php');
