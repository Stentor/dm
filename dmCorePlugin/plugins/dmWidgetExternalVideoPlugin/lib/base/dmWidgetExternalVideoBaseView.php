<?php

abstract class dmWidgetExternalVideoBaseView extends dmWidgetPluginView
{
  protected
  $isIndexable = false;
  
  public function configure()
  {
    parent::configure();
    
    $this->addRequiredVar(array('url', 'width', 'height'));
  }
}