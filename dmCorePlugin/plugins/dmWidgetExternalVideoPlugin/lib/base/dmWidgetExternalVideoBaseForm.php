<?php

abstract class dmWidgetExternalVideoBaseForm extends dmWidgetPluginForm
{
  public function configure()
  {
    $this->widgetSchema['url'] = new sfWidgetFormInputText();
    $this->validatorSchema['url'] = new dmValidatorLinkUrl(array(
      'required' => true
    ));

    $this->widgetSchema['width'] = new sfWidgetFormInputText(array(), array('size' => 5));
    $this->validatorSchema['width'] = new dmValidatorCssSize(array(
      'required' => false
    ));

    $this->widgetSchema['height'] = new sfWidgetFormInputText(array(), array('size' => 5));
    $this->validatorSchema['height'] = new dmValidatorCssSize(array(
      'required' => false
    ));

    if(!$this->getDefault('width'))
    {
      $this->setDefault('width', 400);
    }
    if(!$this->getDefault('height'))
    {
      $this->setDefault('height', 300);
    }
    
    parent::configure();
  }

  protected function renderContent($attributes)
  {
    return $this->getHelper()->tag('ul.dm_form_elements',
      $this['url']->renderRow().
      $this->getHelper()->tag('li.dm_form_element.multi_inputs.thumbnail.clearfix',
        $this['width']->renderError().
        $this['height']->renderError().
        $this->getHelper()->tag('label', $this->__('Dimensions')).
        $this['width']->render().
        'x'.
        $this['height']->render()
      )
    ).
    '</ul>';
  }
}