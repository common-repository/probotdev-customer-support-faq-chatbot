<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @author     Thomas Wiradikusuma <t@probotdev.com>
 */
class PbdCsFaqChatbotAdmin
{
    /**
     * The ID of this plugin.
     */
    private $pbd_cs_faq_chatbot;

    /**
     * The version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param      string $pbd_cs_faq_chatbot The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($pbd_cs_faq_chatbot, $version)
    {
        $this->pbd_cs_faq_chatbot = $pbd_cs_faq_chatbot;
        $this->version = $version;
    }

    /**
     * Initialize the menu for the admin area.
     */
    public function init_menu()
    {
        register_setting('pbd_cs_faq_chatbot', 'pbd_cs_faq_chatbot', 'validate');
        add_settings_section('pbd_cs_faq_chatbot_section_facebook', 'Facebook Settings', array($this, 'section_facebook_fyi'), 'general');
        add_settings_field('pbd_cs_faq_chatbot_page_id', 'Page Id', array($this, 'field_page_id'), 'general', 'pbd_cs_faq_chatbot_section_facebook');
    }

    function section_facebook_fyi()
    {
        echo '<p></p>';
    }

    function field_page_id()
    {
        $options = get_option('pbd_cs_faq_chatbot');

        echo "<input id='pbd_cs_faq_chatbot_page_id' name='pbd_cs_faq_chatbot[page_id]' size='30' type='text' value='{$options['page_id']}' />";
    }

    function validate($input)
    {
        $options = get_option('pbd_cs_faq_chatbot');
        $options['page_id'] = trim($input['page_id']);

        return $options;
    }

    /**
     * Register the menu for the admin area.
     */
    public function add_menu()
    {
        add_options_page('ProBotDev Customer Support FAQ Chatbot', 'ProBotDev Chatbot', 'manage_options', 'pbd-cs-faq-chatbot', array($this, 'page_options'));
    }

    function page_options()
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        } else {
            require plugin_dir_path(__FILE__) . 'partials/settings.php';
        }
    }
}