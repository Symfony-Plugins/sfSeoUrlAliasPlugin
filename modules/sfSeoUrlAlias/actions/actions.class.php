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

class sfSeoUrlAliasActions extends sfActions
{
    /**
     * Executes forward action
     * @param sfRequest $request A request object
     */

    public function executeForward(sfWebRequest $request)
    {
        $externalUrl = $request->getParameter('external_url');

        $sfSeoUrlAlias = new sfSeoUrlAlias($externalUrl);

        $internalUrl = $sfSeoUrlAlias->getInternalUrl();

        $module = $sfSeoUrlAlias->getModule();
        $method = $sfSeoUrlAlias->getMethod();
        $id     = $sfSeoUrlAlias->getId();

        $this->forward404Unless($module);
        $this->forward404Unless($method);

        if(!empty($id))
        {
           $this->getRequest()->setParameter('id', $id);
        }

        return $this->forward($module, $method);
    }
}
