<?php
class WP_Persistent_Query_Strings
{
    public function __construct()
    {

        add_shortcode('sub', array($this, 'get_sub'));
        add_shortcode('sub2', array($this, 'get_sub'));

        $this->add_filters();

        add_filter('plugin_action_links_' . plugin_basename(WPPQS_FILE), array($this, 'add_settings_links'));
    }

    /**
     * Add a "Settings" link to the listing on the plugins page
     *
     * @since  1.0.0
     * @param  array $links Array of links passed in from WordPress core.
     * @return array $links Array of links modified by the function passed back to WordPress
     *
     */
    public function add_settings_links($links)
    {

        $settings_link = sprintf('<a href="options-general.php?page=wp-persistent-query-strings">%s</a>',
            esc_html__('Settings', 'wp-persistent-query-strings')
        );

        array_unshift($links, $settings_link);

        return $links;
    }

    // pass a param into here, for the default
    public function get_sub()
    {
        if (isset($_GET['sub'])) {
            return $_GET['sub'];
        } else {
            return 'demo';
        }
    }

    public function add_my_query_var($link)
    {
        if (isset($_GET['sub'])) {
            return add_query_arg('sub', $_GET['sub'], $link);
        } else {
            return $link;
        }
    }

    // This was added and used for divi pagination
    public function add_my_query_var2($link)
    {
        $str = substr($link, strpos($link, '/page') + 5);
        $url = "https://blog.onlinesalespro.com";
        return $url . "/page" . $str;
    }

    // public function plugin_add_settings_link($links)
    // {
    //     $settings_link = '<a href="options-general.php?page=wp-persistent-query-strings">' . __('Settings') . '</a>';
    //     array_push($links, $settings_link);
    //     return $links;
    // }

    public function add_filters()
    {

        add_filter('page_link', array($this, 'add_my_query_var'));
        add_filter('post_link', array($this, 'add_my_query_var'));
        add_filter('term_link', array($this, 'add_my_query_var'));
        add_filter('tag_link', array($this, 'add_my_query_var'));
        add_filter('category_link', array($this, 'add_my_query_var'));
        add_filter('post_type_link', array($this, 'add_my_query_var'));
        add_filter('attachment_link', array($this, 'add_my_query_var'));
        add_filter('year_link', array($this, 'add_my_query_var'));
        add_filter('month_link', array($this, 'add_my_query_var'));
        add_filter('day_link', array($this, 'add_my_query_var'));
        add_filter('search_link', array($this, 'add_my_query_var'));

        add_filter('feed_link', array($this, 'add_my_query_var'));
        add_filter('post_comments_feed_link', array($this, 'add_my_query_var'));
        add_filter('author_feed_link', array($this, 'add_my_query_var'));
        add_filter('category_feed_link', array($this, 'add_my_query_var'));
        add_filter('taxonomy_feed_link', array($this, 'add_my_query_var'));
        add_filter('search_feed_link', array($this, 'add_my_query_var'));

        add_filter('get_edit_tag_link', array($this, 'add_my_query_var'));
        add_filter('get_edit_post_link', array($this, 'add_my_query_var'));
        add_filter('get_delete_post_link', array($this, 'add_my_query_var'));
        add_filter('get_edit_comment_link', array($this, 'add_my_query_var'));
        add_filter('get_edit_bookmark_link', array($this, 'add_my_query_var'));

        add_filter('index_rel_link', array($this, 'add_my_query_var'));
        add_filter('parent_post_rel_link', array($this, 'add_my_query_var'));
        add_filter('previous_post_rel_link', array($this, 'add_my_query_var'));
        add_filter('next_post_rel_link', array($this, 'add_my_query_var'));
        add_filter('start_post_rel_link', array($this, 'add_my_query_var'));
        add_filter('end_post_rel_link', array($this, 'add_my_query_var'));

        add_filter('previous_post_link', array($this, 'add_my_query_var'));
        add_filter('next_post_link', array($this, 'add_my_query_var'));

        add_filter('get_pagenum_link', array($this, 'add_my_query_var2'));
        add_filter('get_comments_pagenum_link', array($this, 'add_my_query_var'));
        add_filter('shortcut_link', array($this, 'add_my_query_var'));
        add_filter('get_shortlink', array($this, 'add_my_query_var'));

        add_filter('home_url', array($this, 'add_my_query_var'));
        // // // The following caused issues with Divi
        // // // add_filter('site_url','add_my_query_var');
        // // // add_filter('admin_url','add_my_query_var');
        // // // add_filter('includes_url','add_my_query_var');
        // // // add_filter('content_url','add_my_query_var');
        // // // add_filter('plugins_url','add_my_query_var');

        add_filter('network_site_url', array($this, 'add_my_query_var'));
        add_filter('network_home_url', array($this, 'add_my_query_var'));
        add_filter('network_admin_url', array($this, 'add_my_query_var'));

    }

}
