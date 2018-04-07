<?php

class dmColorboxBehaviorView extends dmBehaviorBaseView {
    
    public function configure() {
        
    }

    protected function filterBehaviorVars(array $vars = array()) {
        $vars = parent::filterBehaviorVars($vars);   
        
        if(dmConfig::get('colorbox_use_theme'))
        {
			$this->addStylesheet(array('dmColorboxBehaviorPlugin.'.dmConfig::get('colorbox_theme')));
		}     
        return $vars;
    }
    
    public function getJavascripts() {
        return array_merge(
            parent::getJavascripts(),            
            array(
                'lib.colorbox',                
                'dmColorboxBehaviorPlugin.launch'
            )
        );
    }     
}
