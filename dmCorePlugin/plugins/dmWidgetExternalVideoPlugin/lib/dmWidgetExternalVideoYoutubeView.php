<?php

class dmWidgetExternalVideoYoutubeView extends dmWidgetExternalVideoBaseView
{

  protected function doRender()
  {
    $viewVars = $this->getViewVars();
    
    $url = sprintf('http://www.youtube.com/v/%s&fs=1', $this->getIdFromUrl($viewVars['url']));

    $width  = $viewVars['width'];
    $height = $viewVars['height'];

    return sprintf('<object width="%s" height="%s">
<param name="movie" value="%s"></param>
<param name="allowFullScreen" value="true"></param>
<param name="allowscriptaccess" value="always"></param>
<embed src="%s" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="%s" height="%s"></embed>
</object>',
    $width, $height, $url, $url, $width, $height);
  }

  protected function getIdFromUrl($url)
  {
    return preg_replace('|^'.preg_quote('http://www.youtube.com/watch?v=', '|').'(.+)$|', '$1', $url);
  }
}