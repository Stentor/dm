<?php

class compassCreategridimageTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
     $this->addArguments(array(
       new sfCommandArgument('theme', sfCommandArgument::REQUIRED, 'Theme'),
       new sfCommandArgument('columns', sfCommandArgument::REQUIRED, 'Theme'),
       new sfCommandArgument('size', sfCommandArgument::REQUIRED, 'Theme'),
       new sfCommandArgument('gutter', sfCommandArgument::REQUIRED, 'Theme'),
       new sfCommandArgument('baseline', sfCommandArgument::REQUIRED, 'Theme'),
     ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'compass';
    $this->name             = 'create-grid-image';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [compass:create-grid-image|INFO] task does things.
Call it with:

  [php symfony compass:create-grid-image|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    $theme=$arguments['theme'];
    $columns=$arguments['columns'];
    $size=$arguments['size'];
    $gutter=$arguments['gutter'];
    $baseline=$arguments['baseline'];
    
    echo shell_exec(sprintf('compass grid-img %s+%sx%s %s/grid/tile.png',$size,$gutter,$baseline,dmOs::join(sfConfig::get('sf_web_dir'),$theme)));
    $width=($size+$gutter)*$columns-$gutter;
    $height=$baseline*20;
    echo shell_exec(sprintf('convert %s  -set option:distort:viewport %sx%s -virtual-pixel Tile -filter point -distort SRT 0 +repage %s',dmOs::join(sfConfig::get('sf_web_dir'),$arguments['theme'],'grid','tile.png'),$width,$height,dmOs::join(sfConfig::get('sf_web_dir'),$arguments['theme'],'grid','grid.png')));
  }
}
