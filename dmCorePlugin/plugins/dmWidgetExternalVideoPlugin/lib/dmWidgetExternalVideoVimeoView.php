<?php

class dmWidgetExternalVideoVimeoView extends dmWidgetExternalVideoBaseView
{

  protected function doRender()
  {
    $viewVars = $this->getViewVars();
    
    $url = sprintf(
      'http://vimeo.com/moogaloop.swf?clip_id=%s&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1',
      $this->getIdFromUrl($viewVars['url'])
    );

    $width  = $viewVars['width'];
    $height = $viewVars['height'];

    return sprintf('<object width="%s" height="%s">
<param name="allowfullscreen" value="true" />
<param name="allowscriptaccess" value="always" />
<param name="movie" value="%s" />
<embed src="%s" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="%s" height="%s">
</embed>
</object>',
    $width, $height, $url, $url, $width, $height);
  }

  protected function getIdFromUrl($url)
  {
    return preg_replace('|^'.preg_quote('http://vimeo.com/', '|').'(\d+)$|', '$1', $url);
  }
}