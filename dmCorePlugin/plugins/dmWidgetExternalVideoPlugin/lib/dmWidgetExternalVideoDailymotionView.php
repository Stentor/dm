<?php

class dmWidgetExternalVideoDailymotionView extends dmWidgetExternalVideoBaseView
{

  protected function doRender()
  {
    $viewVars = $this->getViewVars();
    
    $url = $this->getSwfUrl($viewVars['url']);

    $width  = $viewVars['width'];
    $height = $viewVars['height'];

    return sprintf('<object width="%s" height="%s">
<param name="movie" value="%s"></param>
<param name="allowFullScreen" value="true"></param>
<param name="allowScriptAccess" value="always"></param>
<embed type="application/x-shockwave-flash" src="%s" width="%s" height="%s" allowfullscreen="true" allowscriptaccess="always"></embed>
</object>',
    $width, $height, $url, $url, $width, $height);
  }

  protected function getSwfUrl($url)
  {
    return str_replace('/video/', '/swf/video/', $url);
  }
}