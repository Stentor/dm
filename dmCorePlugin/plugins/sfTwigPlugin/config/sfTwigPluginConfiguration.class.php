<?php

/*
 * This file is part of the sfTwigPlugin package.
 *
 * (c) Henrik Bjornskov <henrik@bearwoods.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfTwigPlugin configuration.
 * 
 * @package    sfTwigPlugin
 * @subpackage config
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 * @author     Kris Wallsmith <kris.wallsmith@symfony-project.com>
 */
class sfTwigPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '0.1.4-DEV';
    
  /**
   * @see sfPluginConfiguration
   */
  public function configure()
  {
    require_once sfConfig::get('sf_twig_lib_dir', dirname(__FILE__).'/../lib/vendor/Twig/lib').'/Twig/Autoloader.php';
    Twig_Autoloader::register();
  }
}
