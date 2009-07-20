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

$this->dispatcher->connect('routing.load_configuration', array(
  'sfSeoUrlAliasPluginRouting',
  'listenToRoutingLoadConfigurationEvent'));