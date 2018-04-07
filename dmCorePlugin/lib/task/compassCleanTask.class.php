<?php

class compassCleanTask extends sfBaseTask
{
  protected function configure()
  {
    $this->addArguments(array(
       new sfCommandArgument('theme', sfCommandArgument::REQUIRED, 'Theme to clean'),
     ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'compass';
    $this->name             = 'clean';
    $this->briefDescription = 'Cleans a compass project';
    $this->detailedDescription = <<<EOF
The [compass:clean|INFO] task does things.
Call it with:

  [php symfony compass:clean|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // add your code here
    echo shell_exec('compass clean web/'.$arguments['theme']);
  }
}
