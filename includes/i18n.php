<?php

/**
 * Define the internationalization functionality.
 *
 * @author     Thomas Wiradikusuma <t@probotdev.com>
 */
class PbdCsFaqChatbotI18n
{
    public function load_plugin_textdomain()
    {
        load_plugin_textdomain(
            'pbd-cs-faq-chatbot',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}