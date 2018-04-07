<?php

class compassCreateTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    $this->addArguments(array(
       new sfCommandArgument('theme', sfCommandArgument::REQUIRED, 'Theme to create'),
       new sfCommandArgument('template', sfCommandArgument::OPTIONAL, 'Compass template to use.'),
     ));

    $this->addOptions(array(
           // add your own options here
    ));

    $this->namespace        = 'compass';
    $this->name             = 'create';
    $this->briefDescription = 'Creates a compass project in a Diem theme.';
    $this->detailedDescription = <<<EOF
The [compass:create|INFO] task does things.
Call it with:

  [php symfony compass:create|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
        // add your code here
        $compass=dmOs::join(sfConfig::get('dm_core_dir'), 'data/compass');
        $command='compass create '.dmOs::join(sfConfig::get('sf_web_dir'),$arguments['theme']).' -r susy -u susy -r sassy-math -u sassy-math -r sass-globbing --css-dir=css -L '.$compass;
        if (!empty($arguments['template']))
        {
			$command.=' --using '.$arguments['template'];
		}
		echo shell_exec($command);
  }
}
