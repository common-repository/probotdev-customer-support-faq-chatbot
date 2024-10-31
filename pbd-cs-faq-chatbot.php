<?php

/*
Plugin Name: ProBotDev Customer Support FAQ Chatbot
Plugin URI: https://probotdev.com/dialogflow-powered-customer-support-faq-chatbot-for-wordpress/
Description: Embed Facebook Messenger chatbot widget, powered by Dialogflow, for automated customer support and interactive FAQ.
Version: 0.0.1
Author: ProBotDev Sdn Bhd
Author URI: https://probotdev.com
License: GPLv2
Text Domain: pbd-cs-faq-chatbot
Domain Path: /languages
*/

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('PBD_FAQ_CHATBOT_VERSION', '0.0.1');

function activate_pbd_cs_faq_chatbot()
{
    require_once plugin_dir_path(__FILE__) . 'includes/activator.php';
    PbdCsFaqChatbotActivator::activate();
}

function deactivate_pbd_cs_faq_chatbot()
{
    require_once plugin_dir_path(__FILE__) . 'includes/deactivator.php';
    PbdCsFaqChatbotDeactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_pbd_cs_faq_chatbot');
register_deactivation_hook(__FILE__, 'deactivate_pbd_cs_faq_chatbot');

require plugin_dir_path(__FILE__) . 'includes/main.php';

function run_pbd_cs_faq_chatbot()
{
    $plugin = new PbdCsFaqChatbot();
    $plugin->run();
}

run_pbd_cs_faq_chatbot();