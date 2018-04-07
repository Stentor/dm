<?php

class bxSliderBehaviorForm extends dmBehaviorBaseForm {
    
  protected $modes = array (
   'horizontal' => 'Horizontal',
   'vertical' => 'Vertical',
   'fade' => 'Fade'
   );
   
  protected $preloads = array(
    'all' => 'All',
    'visible' => 'Visible'
    );

  protected $pagerTypes = array(
      'full' => 'Full',
      'short' => 'Short'
    );
  protected $autoDirections = array(
    'next' => 'Next',
    'prev' => 'Prev'
    );

    public function configure() {

      /*$this->widgetSchema['inner_target'] = new sfWidgetFormInputText();
        $this->validatorSchema['inner_target'] = new sfValidatorString(array(
            'required' => true
        ));
       
       $this->widgetSchema['transition'] = new sfWidgetFormChoice(array(
            'choices'=>$this->getI18n()->translateArray($this->transition)
        ));*/

// GENERAL OPTIONS

  $this->widgetSchema['inner_target'] = new sfWidgetFormInputText();
        $this->validatorSchema['inner_target'] = new sfValidatorPass();   
        
  $this->widgetSchema['mode'] = new sfWidgetFormChoice(array(
            'choices'=>$this->getI18n()->translateArray($this->modes)
        ));
  $this->validatorSchema['mode'] = new sfValidatorChoice(array(
            'choices'=> array_keys($this->modes)
        ));

  $this->widgetSchema['slideSelector'] = new sfWidgetFormInputText();
  $this->validatorSchema['slideSelector'] = new sfValidatorPass();   
  
  $this->widgetSchema['infiniteLoop'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['infiniteLoop'] = new sfValidatorBoolean();
    
  $this->widgetSchema['hideControlOnEnd'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['hideControlOnEnd'] = new sfValidatorBoolean();
    
  $this->widgetSchema['speed'] = new sfWidgetFormInputText();
  $this->validatorSchema['speed'] = new sfValidatorPass();
    
  $this->widgetSchema['easing'] = new sfWidgetFormInputText();
  $this->validatorSchema['easing'] = new sfValidatorPass();

  $this->widgetSchema['slideMargin'] = new sfWidgetFormInputText();
  $this->validatorSchema['slideMargin'] = new sfValidatorPass();


  $this->widgetSchema['startSlide'] = new sfWidgetFormInputText();
  $this->validatorSchema['startSlide'] = new sfValidatorPass();
    
  $this->widgetSchema['randomStart'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['randomStart'] = new sfValidatorBoolean();

  $this->widgetSchema['captions'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['captions'] = new sfValidatorBoolean();

  $this->widgetSchema['ticker'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['ticker'] = new sfValidatorBoolean();
    
  $this->widgetSchema['tickerHover'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['tickerHover'] = new sfValidatorBoolean();

  $this->widgetSchema['adaptiveHeight'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['adaptiveHeight'] = new sfValidatorBoolean();
  
  $this->widgetSchema['adaptiveHeightSpeed'] = new sfWidgetFormInputText();
  $this->validatorSchema['adaptiveHeightSpeed'] = new sfValidatorPass();
  

  $this->widgetSchema['video'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['video'] = new sfValidatorBoolean();
   
  $this->widgetSchema['useCSS'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['useCSS'] = new sfValidatorBoolean();

  $this->widgetSchema['preloadImages'] = new sfWidgetFormChoice(array(
            'choices'=>$this->getI18n()->translateArray($this->preloads)
        ));
  $this->validatorSchema['preloadImages'] = new sfValidatorChoice(array(
            'choices'=> array_keys($this->preloads)
        ));

  $this->widgetSchema['responsive'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['responsive'] = new sfValidatorBoolean();
  


    // TOUCH


  $this->widgetSchema['touchEnabled'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['touchEnabled'] = new sfValidatorBoolean();

  $this->widgetSchema['swipeThreshold'] = new sfWidgetFormInputText();
  $this->validatorSchema['swipeThreshold'] = new sfValidatorPass();
    
  $this->widgetSchema['oneToOneTouch'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['oneToOneTouch'] = new sfValidatorBoolean();

  $this->widgetSchema['preventDefaultSwipeX'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['preventDefaultSwipeX'] = new sfValidatorBoolean();
  
  $this->widgetSchema['preventDefaultSwipeY'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['preventDefaultSwipeY'] = new sfValidatorBoolean();

    // PAGER
  $this->widgetSchema['pager'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['pager'] = new sfValidatorBoolean();

  $this->widgetSchema['pagerType'] = new sfWidgetFormChoice(array(
            'choices'=>$this->getI18n()->translateArray($this->pagerTypes)
        ));
  $this->validatorSchema['pagerType'] = new sfValidatorChoice(array(
            'choices'=> array_keys($this->pagerTypes)
        ));
    
  $this->widgetSchema['pagerShortSeparator'] = new sfWidgetFormInputText();
  $this->validatorSchema['pagerShortSeparator'] = new sfValidatorPass();

  $this->widgetSchema['pagerSelector'] = new sfWidgetFormInputText();
  $this->validatorSchema['pagerSelector'] = new sfValidatorPass();

  $this->widgetSchema['buildPager'] = new sfWidgetFormInputText();
  $this->validatorSchema['buildPager'] = new sfValidatorPass();

  $this->widgetSchema['pagerCustom'] = new sfWidgetFormInputText();
  $this->validatorSchema['pagerCustom'] = new sfValidatorPass();
    

    // CONTROLS
  $this->widgetSchema['controls'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['controls'] = new sfValidatorBoolean();

  $this->widgetSchema['nextText'] = new sfWidgetFormInputText();
  $this->validatorSchema['nextText'] = new sfValidatorPass();

  $this->widgetSchema['prevText'] = new sfWidgetFormInputText();
  $this->validatorSchema['prevText'] = new sfValidatorPass();

  $this->widgetSchema['nextSelector'] = new sfWidgetFormInputText();
  $this->validatorSchema['nextSelector'] = new sfValidatorPass();

  $this->widgetSchema['prevSelector'] = new sfWidgetFormInputText();
  $this->validatorSchema['prevSelector'] = new sfValidatorPass();
  
  $this->widgetSchema['autoControls'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['autoControls'] = new sfValidatorBoolean();

  $this->widgetSchema['startText'] = new sfWidgetFormInputText();
  $this->validatorSchema['startText'] = new sfValidatorPass();

  $this->widgetSchema['stopText'] = new sfWidgetFormInputText();
  $this->validatorSchema['stopText'] = new sfValidatorPass();
  
  $this->widgetSchema['autoControlsCombine'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['autoControlsCombine'] = new sfValidatorBoolean();

  $this->widgetSchema['autoControlsSelector'] = new sfWidgetFormInputText();
  $this->validatorSchema['autoControlsSelector'] = new sfValidatorPass();
  

    // AUTO
  $this->widgetSchema['auto'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['auto'] = new sfValidatorBoolean();

  $this->widgetSchema['pause'] = new sfWidgetFormInputText();
  $this->validatorSchema['pause'] = new sfValidatorPass();

  $this->widgetSchema['autoStart'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['autoStart'] = new sfValidatorBoolean();

  $this->widgetSchema['autoDirection'] = new sfWidgetFormChoice(array(
            'choices'=>$this->getI18n()->translateArray($this->autoDirections)
        ));
  $this->validatorSchema['autoDirection'] = new sfValidatorChoice(array(
            'choices'=> array_keys($this->autoDirections)
        ));
  
  $this->widgetSchema['autoHover'] = new sfWidgetFormInputCheckbox();
  $this->validatorSchema['autoHover'] = new sfValidatorBoolean();

  $this->widgetSchema['autoDelay'] = new sfWidgetFormInputText();
  $this->validatorSchema['autoDelay'] = new sfValidatorPass();


    // CAROUSEL
  $this->widgetSchema['minSlides'] = new sfWidgetFormInputText();
  $this->validatorSchema['minSlides'] = new sfValidatorPass();

  $this->widgetSchema['maxSlides'] = new sfWidgetFormInputText();
  $this->validatorSchema['maxSlides'] = new sfValidatorPass();

  $this->widgetSchema['moveSlides'] = new sfWidgetFormInputText();
  $this->validatorSchema['moveSlides'] = new sfValidatorPass();

  $this->widgetSchema['slideWidth'] = new sfWidgetFormInputText();
  $this->validatorSchema['slideWidth'] = new sfValidatorPass();



  if (!$this->getDefault('mode')) $this->setDefault ('mode', 'horizontal');
  if (!$this->getDefault('slideSelector')) $this->setDefault ('slideSelector', '');
  if (!$this->getDefault('infiniteLoop')) $this->setDefault ('infiniteLoop', true);
  if (!$this->getDefault('hideControlOnEnd')) $this->setDefault ('hideControlOnEnd', false);
  if (!$this->getDefault('speed')) $this->setDefault ('speed', '500');
  if (!$this->getDefault('easing')) $this->setDefault ('easing', '');
  if (!$this->getDefault('slideMargin')) $this->setDefault ('slideMargin', '0');
  if (!$this->getDefault('startSlide')) $this->setDefault ('startSlide', '0');
  if (!$this->getDefault('randomStart')) $this->setDefault ('randomStart', false);
  if (!$this->getDefault('captions')) $this->setDefault ('captions', false);
  if (!$this->getDefault('ticker')) $this->setDefault ('ticker', false);
  if (!$this->getDefault('tickerHover')) $this->setDefault ('tickerHover', false);
  if (!$this->getDefault('adaptiveHeight')) $this->setDefault ('adaptiveHeight', false);
  if (!$this->getDefault('adaptiveHeightSpeed')) $this->setDefault ('adaptiveHeightSpeed', '500');
  if (!$this->getDefault('video')) $this->setDefault ('video', false);
  if (!$this->getDefault('useCSS')) $this->setDefault ('useCSS', true);
  if (!$this->getDefault('preloadImages')) $this->setDefault ('preloadImages', 'visible');
  if (!$this->getDefault('responsive')) $this->setDefault ('responsive', true);

  if (!$this->getDefault('touchEnabled')) $this->setDefault ('touchEnabled', true);
  if (!$this->getDefault('swipeThreshold')) $this->setDefault ('swipeThreshold', '50');
  if (!$this->getDefault('preventDefaultSwipeX')) $this->setDefault ('preventDefaultSwipeX', true);
  if (!$this->getDefault('preventDefaultSwipeY')) $this->setDefault ('preventDefaultSwipeY', false);

  if (!$this->getDefault('pager')) $this->setDefault ('pager', true);
  if (!$this->getDefault('pagerType')) $this->setDefault ('pagerType', 'full');
  if (!$this->getDefault('pagerShortSeparator')) $this->setDefault ('pagerShortSeparator', ' / ');
  if (!$this->getDefault('pagerSelector')) $this->setDefault ('pagerSelector', '');
  if (!$this->getDefault('buildPager')) $this->setDefault ('buildPager', '');
  if (!$this->getDefault('pagerCustom')) $this->setDefault ('pagerCustom', '');

  if (!$this->getDefault('controls')) $this->setDefault ('controls', true);
  if (!$this->getDefault('nextText')) $this->setDefault ('nextText', 'Next');
  if (!$this->getDefault('prevText')) $this->setDefault ('prevText', 'Prev');
  if (!$this->getDefault('nextSelector')) $this->setDefault ('nextSelector', '');
  if (!$this->getDefault('prevSelector')) $this->setDefault ('prevSelector', '');
  if (!$this->getDefault('autoControls')) $this->setDefault ('autoControls', false);
  if (!$this->getDefault('startText')) $this->setDefault ('startText', 'Start');
  if (!$this->getDefault('stopText')) $this->setDefault ('stopText', 'Stop');
  if (!$this->getDefault('autoControlsCombine')) $this->setDefault ('autoControlsCombine', false);
  if (!$this->getDefault('autoControlsSelector')) $this->setDefault ('autoControlsSelector', '');
  if (!$this->getDefault('auto')) $this->setDefault ('auto', false);
  if (!$this->getDefault('pause')) $this->setDefault ('pause', '4000');
  if (!$this->getDefault('autoStart')) $this->setDefault ('autoStart', true);
  if (!$this->getDefault('autoDirection')) $this->setDefault ('autoDirection', 'next');
  if (!$this->getDefault('autoHover')) $this->setDefault ('autoHover', false);
  if (!$this->getDefault('autoDelay')) $this->setDefault ('autoDelay', '0');

  if (!$this->getDefault('minSlides')) $this->setDefault ('minSlides', '1');
  if (!$this->getDefault('maxSlides')) $this->setDefault ('maxSlides', '1');
  if (!$this->getDefault('moveSlides')) $this->setDefault ('moveSlides', '0');
  if (!$this->getDefault('slideWidth')) $this->setDefault ('slideWidth', '0');
  
        
        parent::configure();
    }

  protected function renderContent($attributes)
    {
    return $this->getHelper()->renderPartial('bxSliderBehavior', 'form', array(
    'form' => $this,
    'baseTabId' => 'bx_slider_behavior_'.$this->dmBehavior->get('id')
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
      'BxSliderBehaviorPlugin.form'
    );
  }
}
