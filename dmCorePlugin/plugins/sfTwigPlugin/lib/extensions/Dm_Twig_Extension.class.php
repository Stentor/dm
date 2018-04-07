<?php
sfContext::getInstance()->getConfiguration()->loadHelpers('Text');
sfContext::getInstance()->getConfiguration()->loadHelpers('Tag');
sfContext::getInstance()->getConfiguration()->loadHelpers('Asset');
class Dm_Twig_Extension extends Twig_Extension
{
  public function getGlobals()
  {
	try
	{
		return array(
      'dm' => sfContext::getInstance()->getHelper(),
      'layout' => sfContext::getInstance()->get('layout_helper'),
      'cultures' => sfConfig::get('dm_i18n_cultures'),
      'page' => sfContext::getInstance()->getPage()

    );
	}
	catch(Exception $e)
	{
		return array(
		'dm' => sfContext::getInstance()->getHelper(),
		//'layout' => sfContext::getInstance()->get('layout_helper'),
		);
	}
  }

  public function getFunctions()
  {
    return array(
      '__' => new Twig_Function_Function('__'),
      'isset' => new Twig_Function_Function('isset'),
      'include_partial' => new Twig_Function_Function('include_partial'),
      'addStylesheet' => new Twig_Function_Function('use_stylesheet'),
      'addJavascript' => new Twig_Function_Function('use_javascript'),
      'do_media_bar' => new Twig_Function_Method($this,'doMediaBar'),
      'do_edit_page' => new Twig_Function_Method($this,'doEditPage'),
      'do_new_page' => new Twig_Function_Method($this,'doNewPage'),
      'widget' => new Twig_Function_Function('dm_get_widget'),
      'mediaArray' => new Twig_Function_Function('media_array'),
      'facebook_tag' => new Twig_Function_Function('facebookTag'),
      'meta_tag' => new Twig_Function_Function('metaTag'),
      'short_url' => new Twig_Function_Function('short_url'),
      'icon_link' => new Twig_Function_Function('icon_link')
    );
  }

  public function getFilters()
  {

    return array(
      'markdown' => new Twig_Filter_Function('markdown'),
      'auto_link' => new Twig_Filter_Function('auto_link_text'),
      'cut_at_word' => new Twig_Filter_Function('cutAtWord'),

    );
  }

  public function doMediaBar($folder)
  {
	sfContext::getInstance()->getConfiguration()->loadHelpers('DmMedia');
	$parents = array();

	if (!$folder->getNode()->isRoot())
	{
		foreach($folder->getNode()->getAncestors() as $ancestor)
		{
			$parents[] = _tag("a#dmf".$ancestor->get('id'), $ancestor->get('name'));
		}
	}

	$parents[] = _tag("a#dmf".$folder->get('id'), $folder->get('name'));

	echo _tag('div.breadCrumb', implode(" &raquo; ", $parents));

	echo _open("ul.content.clearfix");

	if ($folder->getNode()->hasParent())
	{
		echo _tag("li.folder#dmf".$folder->getNode()->getParent()->get('id'), _media('dmCore/images/media/up.png')->size(64, 64));
	}
	else
	{
		echo _tag('li', _media('dmCore/images/media/up2.png')->size(64, 64));
	}

	if ($folders = $folder->getNode()->getChildren())
	{
		$arrFolders = array();
		foreach($folders as $f) {
			$arrFolders[$f->getName()] = $f;
		}

		ksort($arrFolders);

		foreach($arrFolders as $f)
		{
			echo _tag("li.folder#dmf".$f->get('id'),
			($f->isWritable() ? _media('dmCore/images/media/folder.png')->size(64, 64)
			: _media('dmCore/images/media/folder-locked.png')->size(64, 64)).
			_tag('span.name', media_wrap_text($f->get('name')))
		);
		}
	}

	foreach($folder->getMedias() as $f)
	{
		echo _open('li.file#dmm'.$f->get('id').'.'.$f->getMimeGroup());

		if($f->isImage())
		{
			echo _tag('span.image_background',
				array('style' => sprintf(
				'background: url("%s") top left no-repeat',
				_media($f)->size(128, 128)->quality(80)->getSrc(false)
			)),
				_tag("span.name", media_wrap_text(dmString::truncate($f->get('file'), 40)))
			);
		}
		else
		{
			echo media_file_image_tag($f).
			_tag("span.name", media_wrap_text(dmString::truncate($f->get('file'), 40)));
		}
		echo _close('li');
	}

	echo _close("ul");
  }

  public function doNewPage($form,$parentSlugsJson,$transliterationJson)
  {
	  echo _open('div.dm.dm_page_add');

echo _tag('div.form',

  $form->open('.dm_form.list.little').

  _tag('ul.dm_form_elements',
    $form['parent_id']->renderRow().
    $form['name']->renderRow().
    $form['slug']->renderRow().
    $form['dm_layout_id']->renderRow()
  ).
  sprintf(
      '<div class="actions">
        <div class="actions_part clearfix">
          %s
          %s
        </div>
      </div>',
      sprintf('<a class="cancel dm close_dialog dm button fleft">%s</a>', __('Cancel')),
      sprintf('<input type="submit" class="submit and_save green fright" name="and_save" value="%s" />', __('Save'))
    ).

  $form->close()
);

echo _tag('div.parent_slugs.none', $parentSlugsJson);

echo _tag('div.transliteration.none', $transliterationJson);

echo _close('div');
  }
  public function doEditPage($page,$form,$deletePageLink)
  {

if($page->hasRecord())
{
  $linkToPage = sprintf("_link($%s)", $page->dmModule->getKey());
}
else
{
  $linkToPage = sprintf("_link('%s/%s')", $page->module, $page->action);
}

echo _tag('div.dm.dm_page_edit_wrap',

  $form->open('.dm_form.list.little').
  $form['id'].

  _tag('div.dm.dm_page_edit.dm_tabbed_form',

    _tag('ul.tabs',
      _tag('li', _link('#dm_page_edit_seo')->text(__('Seo'))).
      _tag('li', _link('#dm_page_edit_integration')->text(__('Integration'))).
      _tag('li', _link('#dm_page_edit_publication')->text(__('Publication')))
    ).

    _tag('div#dm_page_edit_seo',
      _tag('ul.dm_form_elements',
        $form['slug']->renderRow().
        $form['name']->renderRow().
        $form['title']->renderRow().
        $form['h1']->renderRow().
        $form['description']->renderRow().
        (isset($form['keywords']) ? $form['keywords']->renderRow() : '')
      )
    ).

    _tag('div#dm_page_edit_integration',
      _tag('ul.dm_form_elements',
        (isset($form['parent_id']) ? $form['parent_id']->renderRow() : '').
        $form['dm_layout_id']->renderRow().
        $form['module']->renderRow().
        $form['action']->renderRow().
        _tag('p.dm_help.s16.s16_help',
          __('Link to this page:').
          ' '.
          _tag('strong', $linkToPage)
        )
      )
    ).
    _tag('div#dm_page_edit_publication',
      _tag('ul.dm_form_elements',
        $form['is_active']->renderRow().
        $form['is_secure']->renderRow().
        _tag('li.dm_form_element.credentials.clearfix'.($page->isSecure ? '' : '.none'),
          $form['credentials']->label()->field()->error()
        ).
        $form['is_indexable']->renderRow()
      )
    )
  ).

  sprintf(
    '<div class="actions clearfix">%s%s%s</div>',
    sprintf('<a class="cancel dm close_dialog button fleft">%s</a>', __('Cancel')),
    $deletePageLink ? _link('+/dmPage/delete')->param('id', $page->get('id'))->set('.dm.delete.button.red.ml10.left.dm_js_confirm')->text(__('Delete'))->title(__('Delete this page')) : '',
    sprintf('<input type="submit" class="submit and_save green fright" name="and_save" value="%s" />', __('Save'))
  ).

  sprintf("<div class='dm_seo_max_lengths %s'></div>",
    json_encode(sfConfig::get('dm_seo_truncate', array()))
  ).

  $form->close()
);

  }



  public function getName()
  {
    return 'dm';
  }
}
  function media_array($medias)
  {
    $result=array();
    foreach($medias as $media)
    {
      $result[]=array('id'=>$media->id,'alt'=>$media->getLegend(),'link'=>'');
    }

    return $result;
  }

function facebookTag($tag, $value)
{
  sfContext::getInstance()->get('response')->addOgTag($tag, $value, true, false);
}

function metaTag($tag, $value)
{
  sfContext::getInstance()->get('response')->addMeta($tag, $value, true, false);
}

function short_url($long_url)
{
  echo dmContext::getInstance()->getServiceContainer()->getService('bit_ly_api')->shorten($long_url);
}

function cutAtWord($string, $num_word)
{
  $words=str_word_count($string, 1, '.,;:?!*-áéíóúÁÉÍÓÚñÑ');

  return implode(array_slice($words, 0, $num_word),' ').' &hellip;';
}
function icon_link($url, $title, $icon, $svg=true)
{
  return _link($url)->text(_media($icon)->inline_svg($svg))->title($title);
}

