<?php
class BxSliderBehaviorView extends dmBehaviorBaseView 
{
    public function configure() {
       //parent::configure();
    }

    protected function filterBehaviorVars(array $vars = array()) {
        $vars = parent::filterBehaviorVars($vars);   
        return $vars;
    }
    
    public function getJavascripts() {
        return array_merge(
            parent::getJavascripts(),            
            array(
                'BxSliderBehaviorPlugin.easing',
                'BxSliderBehaviorPlugin.vids',
                'BxSliderBehaviorPlugin.slider',                
                'BxSliderBehaviorPlugin.launch'
            )
        );
    }     
    public function getStylesheets() {
        return array_merge(
            parent::getStylesheets(),            
            array(
                //'BxSliderBehaviorPlugin.style'
            )
        );
    }     
}
