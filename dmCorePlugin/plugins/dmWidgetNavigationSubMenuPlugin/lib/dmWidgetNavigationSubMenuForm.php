<?php

class dmWidgetNavigationSubMenuForm extends dmWidgetPluginForm
{

  public function configure()
  {
    $this->widgetSchema['secure']      = new sfWidgetFormInputCheckbox(array(
      'label' => 'Requires authentication'
    ));
    $this->validatorSchema['secure'] = new sfValidatorPass();

    $this->widgetSchema['nofollow']      = new sfWidgetFormInputCheckbox(array(
      'label' => 'No follow'
    ));
    $this->validatorSchema['nofollow'] = new sfValidatorPass();

    $this->widgetSchema['depth']      = new sfWidgetFormSelect(array(
      'label' => 'Depth',
      'choices' => array(0 => '-',1,2,3,4,5,6,7,8,9),
    ));
    $this->validatorSchema['depth'] = new sfValidatorPass();

    parent::configure();

    $this->widgetSchema['ulClass']      = new sfWidgetFormInputText(array(
      'label' => 'UL CSS class'
    ));
    $this->validatorSchema['ulClass']   = new dmValidatorCssClasses(array('required' => false));

    $this->widgetSchema['liClass']      = new sfWidgetFormInputText(array(
      'label' => 'LI CSS class'
    ));
    $this->validatorSchema['liClass']   = new dmValidatorCssClasses(array('required' => false));

    if($this->getService('user')->can('system'))
    {
      $this->widgetSchema['menuClass']      = new sfWidgetFormInputText(array(
        'label' => 'Menu PHP class'
      ));
      $this->validatorSchema['menuClass']   = new dmValidatorPhpClass(array(
        'required' => false,
        'implements' => 'dmMenu'
      ));

      $this->widgetSchema->setHelp('menuClass', sprintf('PHP Class used to render the menu (default: %s)',
        $this->getServiceContainer()->getParameter('menu.class')
      ));
    }
  }

  public function getStylesheets()
  {
    return array(
      'lib.ui-tabs',
      'dmWidgetNavigationSubMenuPlugin.form'
    );
  }

  public function getJavascripts()
  {
    return array(
      'lib.ui-tabs',
      'core.tabForm',
      'dmWidgetNavigationSubMenuPlugin.form'
    );
  }

  protected function renderContent($attributes)
  {
    return $this->getHelper()->renderPartial('dmWidgetNavigationSubMenu', 'form', array(
      'form' => $this,
      'baseTabId' => 'dm_widget_navigation_sub_menu'.$this->dmWidget->get('id')
    ));
  }

}
