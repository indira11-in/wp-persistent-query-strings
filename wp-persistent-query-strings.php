<?php
/**
 * Plugin Name: WP Persistent Query Strings
 * Plugin URI: http://www.github.com/joeyscarim
 * Description: Barebones and easy-to-edit Wordpress plugin for setting a persistent query string that can be displayed and used in links via shortcode
 * Version: 1.0
 * Author: Joey Scarim
 * Author URI: http://www.joeyscarim.com
 */

add_shortcode('sub', 'get_sub');
function get_sub()
{
    if ($_GET['sub']) {
        return $_GET['sub'];
    } else {
        return 'demo';
    }

}

add_shortcode('sub2', 'get_sub2');
function get_sub2()
{
    if ($_GET['sub']) {
        return $_GET['sub'];
    } else {
        return '2360';
    }

}

function add_my_query_var($link)
{
    $link = add_query_arg('sub', $_GET['sub'], $link);
    return $link;
}

// This was added and used for divi pagination
function add_my_query_var2($link)
{
    $str = substr($link, strpos($link, '/page') + 5);
    $url = "https://blog.onlinesalespro.com";
    return $url . "/page" . $str;
}

add_filter('page_link', 'add_my_query_var');
add_filter('post_link', 'add_my_query_var');
add_filter('term_link', 'add_my_query_var');
add_filter('tag_link', 'add_my_query_var');
add_filter('category_link', 'add_my_query_var');
add_filter('post_type_link', 'add_my_query_var');
add_filter('attachment_link', 'add_my_query_var');
add_filter('year_link', 'add_my_query_var');
add_filter('month_link', 'add_my_query_var');
add_filter('day_link', 'add_my_query_var');
add_filter('search_link', 'add_my_query_var');

add_filter('feed_link', 'add_my_query_var');
add_filter('post_comments_feed_link', 'add_my_query_var');
add_filter('author_feed_link', 'add_my_query_var');
add_filter('category_feed_link', 'add_my_query_var');
add_filter('taxonomy_feed_link', 'add_my_query_var');
add_filter('search_feed_link', 'add_my_query_var');

add_filter('get_edit_tag_link', 'add_my_query_var');
add_filter('get_edit_post_link', 'add_my_query_var');
add_filter('get_delete_post_link', 'add_my_query_var');
add_filter('get_edit_comment_link', 'add_my_query_var');
add_filter('get_edit_bookmark_link', 'add_my_query_var');

add_filter('index_rel_link', 'add_my_query_var');
add_filter('parent_post_rel_link', 'add_my_query_var');
add_filter('previous_post_rel_link', 'add_my_query_var');
add_filter('next_post_rel_link', 'add_my_query_var');
add_filter('start_post_rel_link', 'add_my_query_var');
add_filter('end_post_rel_link', 'add_my_query_var');

add_filter('previous_post_link', 'add_my_query_var');
add_filter('next_post_link', 'add_my_query_var');

add_filter('get_pagenum_link', 'add_my_query_var2');
add_filter('get_comments_pagenum_link', 'add_my_query_var');
add_filter('shortcut_link', 'add_my_query_var');
add_filter('get_shortlink', 'add_my_query_var');

add_filter('home_url', 'add_my_query_var');
// The following caused issues with Divi
// add_filter('site_url','add_my_query_var');
// add_filter('admin_url','add_my_query_var');
// add_filter('includes_url','add_my_query_var');
// add_filter('content_url','add_my_query_var');
// add_filter('plugins_url','add_my_query_var');

add_filter('network_site_url', 'add_my_query_var');
add_filter('network_home_url', 'add_my_query_var');
add_filter('network_admin_url', 'add_my_query_var');

add_action('admin_menu', 'plugin_admin_add_page');
function plugin_admin_add_page()
{
    add_options_page('Custom Plugin Page', 'WP Persistent Query Strings', 'manage_options', 'plugin', 'plugin_options_page');
}

function plugin_options_page()
{
    ?>
<div>
<h2>WP Persistent Query Strings</h2>
These settings are coming soon.
<form action="options.php" method="post">
<?php settings_fields('plugin_options');?>
<?php do_settings_sections('plugin');?>

<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes');?>" />
</form></div>

<?php
}?>

<?php
add_action('admin_init', 'plugin_admin_init');
function plugin_admin_init()
{
    register_setting('plugin_options', 'plugin_options', 'plugin_options_validate');
    add_settings_section('plugin_main', 'Main Settings', 'plugin_section_text', 'plugin');
    add_settings_field('plugin_text_string', 'Plugin Text Input', 'plugin_setting_string', 'plugin', 'plugin_main');
}
