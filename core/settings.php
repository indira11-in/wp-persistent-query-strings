<!-- coming soon -->

add_action('admin_menu', 'plugin_admin_add_page');
        function plugin_admin_add_page()
        {
            add_options_page('Custom Plugin Page', 'WP Persistent Query Strings', 'manage_options', 'wp-persistent-query-strings', 'plugin_options_page');
        }

        function plugin_options_page()
        {
            ?>
<div>
<h2>WP Persistent Query Strings</h2>
These settings are coming soon.
<form action="options.php" method="post">
<?php settings_fields('plugin_options');?>
<?php do_settings_sections('wp-persistent-query-strings');?>

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

        function plugin_add_settings_link($links)
        {
            $settings_link = '<a href="options-general.php?page=wp-persistent-query-strings">' . __('Settings') . '</a>';
            array_push($links, $settings_link);
            return $links;
        }
        $plugin = plugin_basename(__FILE__);
        add_filter("plugin_action_links_$plugin", 'plugin_add_settings_link');

        return true;