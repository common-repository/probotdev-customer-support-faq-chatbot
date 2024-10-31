<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @author     Thomas Wiradikusuma <t@probotdev.com>
 */
class PbdCsFaqChatbotPublic
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
     * @param      string $pbd_cs_faq_chatbot The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($pbd_cs_faq_chatbot, $version)
    {
        $this->pbd_cs_faq_chatbot = $pbd_cs_faq_chatbot;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     */
    public function enqueue_styles()
    {
        wp_enqueue_style($this->pbd_cs_faq_chatbot, plugin_dir_url(__FILE__) . 'css/default.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script($this->pbd_cs_faq_chatbot, plugin_dir_url(__FILE__) . 'js/default.js', array(), $this->version, false);
    }

    /**
     * Load Facebook Messenger widget.
     */
    public function load_widget()
    {
        require plugin_dir_path(__FILE__) . 'partials/snippet.php';
    }
}