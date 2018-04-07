<?php

class dmWidgetNavigationSubMenuView extends dmWidgetPluginView
{
  protected
  $isIndexable = false;

  public function configure()
  {
    parent::configure();

    $this->addRequiredVar(array('ulClass', 'liClass'));
  }

  protected function filterViewVars(array $vars = array())
  {
    $vars = parent::filterViewVars($vars);

    $menuClass = dmArray::get($vars, 'menuClass');

    $vars['menu'] = $this->getService('menu', $menuClass ? $menuClass : null)
    ->ulClass($vars['ulClass']);

    $menuItem = $vars['menu']
    ->addChild('', dmContext::getInstance()->getPage())
    ->secure(!empty($vars['secure']))
    ->liClass($vars['liClass'])
    ->addRecursiveChildren($vars['depth']);

    if(!empty($vars['no_follow']) && $menuItem->getLink())
    {
      $menuItem->getLink()->set('rel', 'nofollow');
    }

    unset($vars['items'], $vars['ulClass'], $vars['liClass']);

    return $vars;
  }

  protected function doRender()
  {
    if ($this->isCachable() && $cache = $this->getCache())
    {
      return $cache;
    }

    $vars = $this->getViewVars();

    $html = $vars['menu']->render();

    if ($this->isCachable())
    {
      $this->setCache($html);
    }

    return $html;
  }

}
