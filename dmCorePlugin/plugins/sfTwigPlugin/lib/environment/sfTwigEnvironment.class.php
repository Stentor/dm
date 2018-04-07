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
 * Symfony specific Twig Environment.
 *
 * Enables the user to get sfContext without the getInstance method and later
 * on enable more symfony goodness
 *
 * @package    sfTwigPlugin
 * @subpackage environment
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class sfTwigEnvironment extends Twig_Environment
{
  /**
   * @var sfContext
   */
  protected $context = null;

  /**
   * @see Twig_Environment::__construct()
   */
  public function __construct(Twig_LoaderInterface $loader, array $options = array())
  {
    parent::__construct($loader, $options);

    $this->context = isset($options['sf_context']) && $options['sf_context'] instanceof sfContext ? $options['sf_context'] : sfContext::getInstance();
  }

  /**
   * Returns sfContext this can be used in filters.
   *
   * @return sfContext
   */
  public function getContext()
  {
    return $this->context;
  }
}
