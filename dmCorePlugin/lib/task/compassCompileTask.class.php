<?php

class compassCompileTask extends sfBaseTask
{
  protected function configure()
  {
     // add your own arguments here
     $this->addArguments(array(
       new sfCommandArgument('theme', sfCommandArgument::REQUIRED, 'Theme to compile'),
     ));

    $this->addOptions(array(
            // add your own options here
    ));

    $this->namespace        = 'compass';
    $this->name             = 'compile';
    $this->briefDescription = 'Compiles a compass project';
    $this->detailedDescription = <<<EOF
The [compass:compile|INFO] task does things.
Call it with:

  [php symfony compass:compile|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
        // add your code here
        echo shell_exec('compass compile '.dmOs::join(sfConfig::get('sf_web_dir'),$arguments['theme']));
  }
}
