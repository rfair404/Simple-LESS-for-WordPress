<?php
/*
* Plugin Name: Simple LESS
	author: Russell Fair
	url: http://q21.co/simple-less
	description: a simple way to use LESS in your theme.  Just activate this plugin and add a "theme.less" file to your theme's root and your off to the races. 
	plugin uri: http://q21.co/simple-less
*/

define('LE_VER', '002');
define('LE_TRANS_VER', '002');
define('LE_DIR', WP_PLUGIN_DIR.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)));
define('LE_URL', WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)));
define('LE_THEME_URL', get_stylesheet_directory_uri() );

//add_action('init', 'less_register_stuff');
//add_action('wp_print_scripts', 'less_enqueue_js');
//add_action('wp_print_styles', 'less_enqueue_css');
//we know, we're purposefully _doint_it_wrong for now. :-(


function less_register_stuff() {
	wp_register_script('lessjs', LE_URL . 'less-1.2.0.js', array(), LE_TRANS_VER, false);
	wp_register_style('lesscss', LE_URL .'style.less', array(), LE_TRANS_VER, 'all');
    
}

function less_enqueue_js() {
	wp_enqueue_script('lessjs');
}

function less_enqueue_css() {
	wp_enqueue_style('lesscss');
}

add_action('wp_head', 'less_js_old_way');
function less_js_old_way() {
//if you wonder why this code isn't sexy, it is because this is how Matt told me to do it till wp_enqueue_script supports rel tags ?>
<link rel="stylesheet/less" type="text/css" href="<?php echo LE_THEME_URL; ?>/theme.less">
<script src="<?php echo LE_URL; ?>less-1.2.0.min.js" type="text/javascript"></script>
<?php  }
?>
