<?php

class dmColorboxBehaviorForm extends dmBehaviorBaseForm {
    
   protected $transition = array (
   'elastic' => 'Elastic',
   'fade' => 'Fade',
   'none' => 'None'
   );
    
    protected $theme = array(
    'theme1'=>'Theme 1',
    'theme2'=>'Theme 2',
    'theme3'=>'Theme 3',
    'theme4'=>'Theme 4',
    'theme5'=>'Theme 5',
    
    );
    public function configure() {
        $this->widgetSchema['inner_target'] = new sfWidgetFormInputText();
        $this->validatorSchema['inner_target'] = new sfValidatorString(array(
            'required' => true
        ));
       
       $this->widgetSchema['transition'] = new sfWidgetFormChoice(array(
            'choices'=>$this->getI18n()->translateArray($this->transition)
        ));
        $this->validatorSchema['transition'] = new sfValidatorChoice(array(
            'choices'=> array_keys($this->transition)
        ));
        
       $this->widgetSchema['speed'] = new sfWidgetFormInputText();
       $this->validatorSchema['speed'] = new sfValidatorPass(); 
       
       
       $this->widgetSchema['opacity'] = new sfWidgetFormInputText();
       $this->validatorSchema['opacity'] = new sfValidatorPass(); 
       
       $this->widgetSchema['rel'] = new sfWidgetFormInputText();
       $this->validatorSchema['rel'] = new sfValidatorPass(); 
       
        $this->widgetSchema['overlayClose'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['overlayClose'] = new sfValidatorBoolean();
        
        $this->widgetSchema['escKey'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['escKey'] = new sfValidatorBoolean();
        
        $this->widgetSchema['arrowKey'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['arrowKey'] = new sfValidatorBoolean();
        
        $this->widgetSchema['loop'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['loop'] = new sfValidatorBoolean();
        
       $this->widgetSchema['current'] = new sfWidgetFormInputText();
       $this->validatorSchema['current'] = new sfValidatorPass(); 
              
       $this->widgetSchema['previous'] = new sfWidgetFormInputText();
       $this->validatorSchema['previous'] = new sfValidatorPass(); 
              
       $this->widgetSchema['next'] = new sfWidgetFormInputText();
       $this->validatorSchema['next'] = new sfValidatorPass(); 
              
       $this->widgetSchema['close'] = new sfWidgetFormInputText();
       $this->validatorSchema['close'] = new sfValidatorPass(); 
       
        $this->widgetSchema['iframe'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['iframe'] = new sfValidatorBoolean();
		
		$this->widgetSchema['width'] = new sfWidgetFormInputText();
        $this->validatorSchema['width'] = new sfValidatorPass(); 

        
		$this->widgetSchema['height'] = new sfWidgetFormInputText();
        $this->validatorSchema['height'] = new sfValidatorPass(); 

        
		$this->widgetSchema['innerWidth'] = new sfWidgetFormInputText();
        $this->validatorSchema['innerWidth'] = new sfValidatorPass(); 

        
		$this->widgetSchema['innerHeight'] = new sfWidgetFormInputText();
        $this->validatorSchema['innerHeight'] = new sfValidatorPass(); 

        
		$this->widgetSchema['initialWidth'] = new sfWidgetFormInputText();
        $this->validatorSchema['initialWidth'] = new sfValidatorPass(); 

        
		$this->widgetSchema['initialHeight'] = new sfWidgetFormInputText();
        $this->validatorSchema['initialHeight'] = new sfValidatorPass(); 

        
		$this->widgetSchema['maxWidth'] = new sfWidgetFormInputText();
        $this->validatorSchema['maxWidth'] = new sfValidatorPass(); 

        
		$this->widgetSchema['maxHeight'] = new sfWidgetFormInputText();
        $this->validatorSchema['maxHeight'] = new sfValidatorPass(); 

        $this->widgetSchema['slideshow'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['slideshow'] = new sfValidatorBoolean();
		
        $this->widgetSchema['slideshowAuto'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['slideshowAuto'] = new sfValidatorBoolean();
		
		$this->widgetSchema['slideshowSpeed'] = new sfWidgetFormInputText();
        $this->validatorSchema['slideshowSpeed'] = new sfValidatorPass(); 
                          
		$this->widgetSchema['slideshowStart'] = new sfWidgetFormInputText();
        $this->validatorSchema['slideshowStart'] = new sfValidatorPass(); 
              
		$this->widgetSchema['slideshowStop'] = new sfWidgetFormInputText();
        $this->validatorSchema['slideshowStop'] = new sfValidatorPass(); 
        
/*
        $this->widgetSchema['use_themes'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['use_themes'] = new sfValidatorBoolean();
        
        $this->widgetSchema['theme'] = new sfWidgetFormChoice(array(
            'choices'=>$this->getI18n()->translateArray($this->theme)
        ));
        $this->validatorSchema['theme'] = new sfValidatorChoice(array(
            'choices'=> array_keys($this->theme)
        ));
*/
        
        $this->widgetSchema['onComplete'] = new sfWidgetFormTextArea();
        $this->validatorSchema['onComplete'] = new sfValidatorPass(); 
        
       
              
        if (!$this->getDefault('inner_target')) $this->setDefault ('inner_target', 'a');
        if (!$this->getDefault('opacity')) $this->setDefault ('opacity', '0.85');
        if (!$this->getDefault('speed')) $this->setDefault ('speed', '350');
        if (!$this->getDefault('current')) $this->setDefault ('current', 'image {current} of {total}');
        if (!$this->getDefault('previous')) $this->setDefault ('previous', 'previous');
        if (!$this->getDefault('next')) $this->setDefault ('next', 'next');
        if (!$this->getDefault('close')) $this->setDefault ('close', 'close');
        if (!$this->getDefault('initialWidth')) $this->setDefault ('initialWidth', '300');
        if (!$this->getDefault('initialHeight')) $this->setDefault ('initialHeight', '100');
        if (!$this->getDefault('slideshowStart')) $this->setDefault ('slideshowStart', 'start slideshow');
        if (!$this->getDefault('slideshowStop')) $this->setDefault ('slideshowStop', 'stop slideshow');
        if (!$this->getDefault('slideshowSpeed')) $this->setDefault ('slideshowSpeed', '2500');
        if (!$this->getDefault('onComplete')) $this->setDefault ('onComplete', '');
       
        
        
        parent::configure();
    }

    protected function renderContent($attributes)
    {
		return $this->getHelper()->renderPartial('dmColorboxBehavior', 'form', array(
		'form' => $this,
		'baseTabId' => 'dm_colorbox_behavior_'.$this->dmBehavior->get('id')
    ));
   }
  public function getStylesheets()
  {
    return array(
      'lib.ui-tabs',
    );
  }

  public function getJavascripts()
  {
    return array(
      'lib.ui-tabs',
      'core.tabForm',
      'dmColorboxBehaviorPlugin.form'
    );
  }
}
