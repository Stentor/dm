<?php
echo $form->renderGlobalErrors();

echo _open('div.dm_tabbed_form');
	echo _open('ul.tabs');
		echo _tag('li', _link('#'.$baseTabId.'_basic')->text(__('Basic')));
		echo _tag('li', _link('#'.$baseTabId.'_interaction')->text(__('Interaction')));
		echo _tag('li', _link('#'.$baseTabId.'_customization')->text(__('Customization')));
		echo _tag('li', _link('#'.$baseTabId.'_callbacks')->text(__('Callbacks')));
		echo _tag('li', _link('#'.$baseTabId.'_dimensions')->text(__('Dimensions')));
		echo _tag('li', _link('#'.$baseTabId.'_slideshow')->text(__('Slide Show')));
/*
		echo _tag('li', _link('#'.$baseTabId.'_appearance')->text(__('Appearance')));
*/
	echo _close('ul');
	echo _open('div#'.$baseTabId.'_basic');
		echo _tag('li.dm_form_element.fx.clearfix',$form['inner_target']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['transition']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['speed']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['opacity']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['rel']->label()->field()->error());
		
		echo _tag('li.dm_form_element.fx.clearfix',$form['dm_behavior_enabled']->label()->field()->error());
	echo _close('div');
	echo _open('div#'.$baseTabId.'_interaction');
		echo _tag('li.dm_form_element.fx.clearfix',$form['overlayClose']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['escKey']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['arrowKey']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['loop']->label()->field()->error());
	echo _close('div');
	echo _open('div#'.$baseTabId.'_customization');
		echo _tag('li.dm_form_element.fx.clearfix',$form['current']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['previous']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['next']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['close']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['iframe']->label()->field()->error());
	echo _close('div');
	echo _open('div#'.$baseTabId.'_callbacks');
		echo _tag('li.dm_form_element.fx.clearfix',$form['onComplete']->label()->field()->error());
	echo _close('div');
	
	echo _open('div#'.$baseTabId.'_dimensions');
		echo _tag('li.dm_form_element.fx.clearfix',$form['width']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['height']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['innerWidth']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['innerHeight']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['initialWidth']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['initialHeight']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['maxWidth']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['maxHeight']->label()->field()->error());
	echo _close('div');
	echo _open('div#'.$baseTabId.'_slideshow');
		echo _tag('li.dm_form_element.fx.clearfix',$form['slideshow']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['slideshowAuto']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['slideshowSpeed']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['slideshowStart']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['slideshowStop']->label()->field()->error());
	echo _close('div');
/*
	echo _open('div#'.$baseTabId.'_appearance');
		echo _tag('li.dm_form_element.fx.clearfix',$form['use_themes']->label()->field()->error());
		echo _tag('li.dm_form_element.fx.clearfix',$form['theme']->label()->field()->error());
	echo _close('div');
*/
echo _close('div');


