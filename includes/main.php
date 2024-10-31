<?php

/**
 * The core plugin class.
 *
 * @author     Thomas Wiradikusuma <t@probotdev.com>
 */
class PbdCsFaqChatbot
{
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     */
    protected $pbd_cs_faq_chatbot;

    /**
     * The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     */
    public function __construct()
    {
        $this->version = PBD_FAQ_CHATBOT_VERSION;
        $this->pbd_cs_faq_chatbot = 'ProBotDev Customer Support FAQ Chatbot';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies()
    {
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/public.php';

        $this->loader = new PbdCsFaqChatbotLoader();
    }

    private function set_locale()
    {
        $plugin_i18n = new PbdCsFaqChatbotI18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    private function define_admin_hooks()
    {
        $plugin_admin = new PbdCsFaqChatbotAdmin($this->get_pbd_cs_faq_chatbot(), $this->get_version());

        $this->loader->add_action('admin_init', $plugin_admin, 'init_menu');
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_menu');
    }

    private function define_public_hooks()
    {
        $plugin_public = new PbdCsFaqChatbotPublic($this->get_pbd_cs_faq_chatbot(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
        $this->loader->add_action('wp_footer', $plugin_public, 'load_widget');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     */
    public function get_pbd_cs_faq_chatbot()
    {
        return $this->pbd_cs_faq_chatbot;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }
}