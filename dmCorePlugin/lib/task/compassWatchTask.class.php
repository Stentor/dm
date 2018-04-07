<?php

class compassWatchTask extends sfBaseTask
{
  protected function configure()
  {
     // add your own arguments here
     $this->addArguments(array(
       new sfCommandArgument('theme', sfCommandArgument::REQUIRED, 'Theme to create'),
     ));

    $this->addOptions(array(
     
      // add your own options here
    ));

    $this->namespace        = 'compass';
    $this->name             = 'watch';
    $this->briefDescription = 'Change triggered automatic compilation of a compass project';
    $this->detailedDescription = <<<EOF
The [compass:watch|INFO] task does things.
Call it with:

  [php symfony compass:watch|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // add your code here
    echo shell_exec('compass watch '.dmOs::join(sfConfig::get('sf_web_dir'),$arguments['theme']).' &');
  }
}
