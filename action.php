<?php

// must be run within Dokuwiki
if (!defined('DOKU_INC')) {
    die();
}

class action_plugin_jsdelivr extends DokuWiki_Action_Plugin
{

    /**
     * Registers a callback function for a given event
     *
     * @param Doku_Event_Handler $controller DokuWiki's event controller object
     *
     * @return void
     */
    public function register(Doku_Event_Handler $controller)
    {
        $controller->register_hook('CONFUTIL_CDN_SELECT', 'BEFORE', $this, 'handle_confutil_cdn_select');

    }

    /**
     * [Custom event handler which performs action]
     *
     * Called for event:
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  [the parameters passed as fifth argument to register_hook() when this
     *                           handler was registered]
     *
     * @return void
     */
    public function handle_confutil_cdn_select(Doku_Event $event, $param)
    {
        $event->preventDefault();
        // global $conf;
        // $dev_string = $conf['compress'] ? '.min' : '';

        // add our jqm
        $event->data['src'][] = sprintf('https://cdn.jsdelivr.net/npm/jquery@%s/dist/jquery.min.js', $event->data['versions']['JQ_VERSION']);
        // $event->data['src'][] = sprintf('https://cdn.jsdelivr.net/npm/jquery-migrate@%s/dist/jquery-migrate.min.js', $event->data['versions']['JQM_VERSION']);
        $event->data['src'][] = sprintf('https://cdn.jsdelivr.net/npm/jquery-ui-dist@%s/jquery-ui.min.js', $event->data['versions']['JQUI_VERSION']);
    }
}
