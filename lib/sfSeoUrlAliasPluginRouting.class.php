<?php

/**
 * @package    sfSeoUrlAliasPlugin
 * @author     (c) 2009 Marcin Mazurek <m.mazurek [at] consaltex.pl>
 * @version    0.9
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

class sfSeoUrlAliasPluginRouting
{
    /**
     * Add routing rules
     * @param $event sfEvent The symfony event manager
     */

    static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
    {
        $routing = $event->getSubject();
        $route_restriction = sfConfig::get('app_sf_seo_url_alias_route_restriction', '^([A-Za-z0-9\_\-\+,])+(\.)+([a-zA-Z0-9\-\_\.\+,])+$');

        /**
         * add plug-in routing rules on top of the existing ones
         */

        $routing->prependRoute('seo_url_alias', new sfRoute('/:external_url', array(
            'module' => 'sfSeoUrlAlias',
            'action' => 'forward'
            ), array(
                'external_url' => $route_restriction
                )));
    }
}