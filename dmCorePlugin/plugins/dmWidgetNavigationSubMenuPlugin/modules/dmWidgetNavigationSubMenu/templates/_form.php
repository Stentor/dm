<?php

echo

$form->renderGlobalErrors(),

_open('div.dm_widget_navigation_sub_menu_form'),

_tag('div#'.$baseTabId.'_options',
  _tag('ul.extended',
    $form['secure']->renderRow().
    $form['nofollow']->renderRow().
    $form['depth']->renderRow().
    $form['cssClass']->renderRow().
    $form['ulClass']->renderRow().
    $form['liClass']->renderRow().
    (isset($form['menuClass']) ? $form['menuClass']->renderRow() : '')
  )
),

_close('div'); //div.dm_tabbed_form
