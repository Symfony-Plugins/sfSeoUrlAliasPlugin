<?php

/**
 * @package    sfSeoUrlAliasPlugin
 * @author     (c) 2009 Marcin Mazurek <m.mazurek [at] consaltex.pl>
 * @version    0.9
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Usage: $externalUrl = "contact-us.html" *
 *        $sfSeoUrlAlias = new sfSeoUrlAlias($externalUrl); *
 *        $module = $sfSeoUrlAlias->getModule();
 *        $method = $sfSeoUrlAlias->getMethod(); *
 *        return $this->forward($module, $method);
 */

class sfSeoUrlAlias
{
    private $externalUrl = null;
    private $internalUrl = null;
    private $method      = null;
    private $module      = null;
    private $id          = null;
    private $config      = null;

    public function __construct($str)
    {
        $this->loadConfiguration();
        $this->setExternalUrl($str);
        $obj = $this->getObject();

        if(!empty($obj))
        {
          $url = $obj->getInternalUrl();
          $this->setInternalUrl($url);
          $this->generate();
        }
    }

    public function setExternalUrl($str)
    {
        $this->externalUrl = $str;
    }

    private function setInternalUrl($str)
    {
        $this->internalUrl = $str;
    }

    private function setMethod($str)
    {
        $this->method = $str;
    }

    private function setId($str)
    {
        $this->id = $str;
    }

    private function setModule($str)
    {
        $this->module = $str;
    }

    public function getModule()
    {
        return $this->module;
    }

    public function getExternalUrl()
    {
        return $this->externalUrl;
    }

    public function getInternalUrl()
    {
        return $this->internalUrl;
    }

    public function getMethod()
    {
        if(empty($this->method))
        {
           return $this->getConfig('deafault_method');
        }
        else
        {
           return $this->method;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    private function generate()
    {
        $url = $this->getInternalUrl();
        $expl = explode($this->getConfig('delimeter'), $url);
        $count = count($expl);

        /*
         * if count is 3 then
         * first param is a module name
         * second param is a method name
         * third param is a id number
         */

        if($count == 3)
        {
            $this->setModule($expl[0]);
            $this->setMethod($expl[1]);
            $this->setId($expl[2]);
        }
        /*
         * if count is 2 then
         * first param is a module name
         * second param is a method name
         */
        elseif($count == 2)
        {
            $this->setModule($expl[0]);
            $this->setMethod($expl[1]);
        }
    }

    private function getObject()
    {
        $url = $this->getExternalUrl();

        $c = new Criteria();
        $c->add(sfSeoUrlFriendlyPeer::EXTERNAL_URL, $url, Criteria::EQUAL);
        $obj = sfSeoUrlFriendlyPeer::doSelectOne($c);

        if(!empty($obj))
        {
            return $obj;
        }
        else
        {
            return false;
        }
    }

    private function loadConfiguration()
    {
        $this->config['delimeter']       =  sfConfig::get('app_sf_seo_url_alias_delimeter', '/');

        return true;
    }

    private function getConfig($str)
    {
        if(!empty($this->config[$str]))
        {
            return $this->config[$str];
        }
        else
        {
            return false;
        }

    }
}
