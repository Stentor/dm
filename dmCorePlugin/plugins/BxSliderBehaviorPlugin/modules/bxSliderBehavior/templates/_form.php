<?php
echo $form->renderGlobalErrors();

echo _open('div.dm_tabbed_form');
    echo _open('ul.tabs');
        echo _tag('li', _link('#'.$baseTabId.'_basic')->text(__('Basic')));
        echo _tag('li', _link('#'.$baseTabId.'_advanced')->text(__('Advanced')));
        echo _tag('li', _link('#'.$baseTabId.'_touch')->text(__('Touch')));
        echo _tag('li', _link('#'.$baseTabId.'_pager')->text(__('Pager')));
        echo _tag('li', _link('#'.$baseTabId.'_controls')->text(__('Controls')));
        echo _tag('li', _link('#'.$baseTabId.'_auto')->text(__('Auto')));
        echo _tag('li', _link('#'.$baseTabId.'_carrousel')->text(__('Carrousel')));
    echo _close('ul');

    echo _open('div#'.$baseTabId.'_basic');
    echo _tag('li.dm_form_element.fx.clearfix',$form['inner_target']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['dm_behavior_enabled']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['slideSelector']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['mode']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['infiniteLoop']->label()->field()->error());       
        echo _tag('li.dm_form_element.fx.clearfix',$form['speed']->label()->field()->error());        
        echo _tag('li.dm_form_element.fx.clearfix',$form['randomStart']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['captions']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['ticker']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['tickerHover']->label()->field()->error());         
    echo _close('div');

    echo _open('div#'.$baseTabId.'_advanced');
        echo _tag('li.dm_form_element.fx.clearfix',$form['hideControlOnEnd']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['easing']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['slideMargin']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['startSlide']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['adaptiveHeight']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['adaptiveHeightSpeed']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['video']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['useCSS']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['preloadImages']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['responsive']->label()->field()->error());
    echo _close('div');

    echo _open('div#'.$baseTabId.'_touch');
        echo _tag('li.dm_form_element.fx.clearfix',$form['touchEnabled']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['swipeThreshold']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['oneToOneTouch']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['preventDefaultSwipeX']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['preventDefaultSwipeY']->label()->field()->error());
    echo _close('div');
    echo _open('div#'.$baseTabId.'_pager');
        echo _tag('li.dm_form_element.fx.clearfix',$form['pager']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['pagerType']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['pagerShortSeparator']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['pagerSelector']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['buildPager']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['pagerCustom']->label()->field()->error());
    echo _close('div');
    echo _open('div#'.$baseTabId.'_controls');
        echo _tag('li.dm_form_element.fx.clearfix',$form['controls']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['nextText']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['prevText']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['nextSelector']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['prevSelector']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['autoControls']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['stopText']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['startText']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['autoControlsCombine']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['autoControlsSelector']->label()->field()->error());
    echo _close('div');
    echo _open('div#'.$baseTabId.'_auto');
        echo _tag('li.dm_form_element.fx.clearfix',$form['auto']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['pause']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['autoStart']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['autoDirection']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['autoHover']->label()->field()->error());
        echo _tag('li.dm_form_element.fx.clearfix',$form['autoDelay']->label()->field()->error());
        
    echo _close('div');
    echo _open('div#'.$baseTabId.'_carrousel');
       echo _tag('li.dm_form_element.fx.clearfix',$form['minSlides']->label()->field()->error());
       echo _tag('li.dm_form_element.fx.clearfix',$form['maxSlides']->label()->field()->error());
       echo _tag('li.dm_form_element.fx.clearfix',$form['moveSlides']->label()->field()->error());
       echo _tag('li.dm_form_element.fx.clearfix',$form['slideWidth']->label()->field()->error());
    echo _close('div');

echo _close('div');


