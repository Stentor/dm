<?php

class dmFrontActionTemplateGenerator extends dmFrontModuleGenerator
{

  public function execute()
  {
    $dir = dmOs::join($this->moduleDir, 'templates');

    if (!$this->filesystem->mkdir($dir))
    {
      $this->logError('can not create directory '.$dir);
    }

    $success = true;

    foreach($this->module->getComponents() as $component)
    {
      $file = dmOs::join($dir, '_'.$component->getKey().'.html');

      if(file_exists($file))
      {
        continue;
      }

      touch($file);

      $code = $this->getActionTemplate($component);

      $fileSuccess = file_put_contents($file, $code);
      $this->filesystem->chmod($file, 0777);
      
      if(!$fileSuccess)
      {
        $this->logError('can not write to '.dmProject::unrootify($file));
      }
      
      $success &= $fileSuccess;
    }

    return $success;
  }

  protected function getActionTemplate(dmModuleComponent $component)
  {
    switch($component->getType())
    {
      case 'list': return $this->getListActionTemplate($component); break;
      case 'show': return $this->getShowActionTemplate($component); break;
      case 'form': return $this->getFormActionTemplate($component); break;
      default:     return $this->getUserActionTemplate($component); break;
    }
  }

  protected function getListActionTemplate(dmModuleComponent $action)
  {
    $object = $this->module->getKey();
    $pager = $object.'Pager';
    $vars = $this->getVarsComment(array($pager));
    return "{# Vars: {$vars} #}

{{ {$pager}.renderNavigationTop() }}

<ul class=\"elements\">

{% for {$this->module->getKey()} in {$pager} %}

 <li class=\"element\">

    {{ ".($this->module->hasPage() ? "dm.link({$this->module->getKey()})" : "{$this->module->getKey()}")." }}

 </li>
 {% endfor %}
</ul>

 {{ {$pager}.renderNavigationBottom() }}";
  }

  protected function getShowActionTemplate(dmModuleComponent $action)
  {
    $object = '$'.$this->module->getKey();
    $vars = $this->getVarsComment(array($object));
    return "{# Vars: {$vars} #}

 {{ {$this->module->getKey()} }}";
  }

  protected function getFormActionTemplate(dmModuleComponent $action)
  {
    $vars = $this->getVarsComment(array('form'));
    return "{# Vars: {$vars} #}

{{ form }} ";
  }

  protected function getUserActionTemplate(dmModuleComponent $action)
  {
    return "<div>Edit me</div>
";
  }

  protected function getVarsComment($vars)
  {
    foreach($vars as $key => $name)
    {
      if ($name{0} !== '$')
      {
        $vars[$key] = '$'.$name;
      }
    }

    return implode(', ', $vars);
  }

}
