<?php

require_once(realpath(dirname(__FILE__).'/vendor').'/JsMinEnh.php');

class dmJsMinifier
{
  
  public static function transform($script)
  {
    $min=str_replace('\//','_PROTECT_REGEXP_',$script);
    $min=self::minify1($min);
    $min=str_replace('+++','+ ++', $min);
    $min=str_replace('-++','- ++', $min);
    $min=str_replace('+--','+ --', $min);
    $min=str_replace('---','- --', $min);
    //$min=str_replace('*/','* /', $min);
    $min=str_replace('_PROTECT_REGEXP_','\//',$min);
    

    return $min;
  }
  
  protected static function minify1($script)
  {
    $minifier = new JsMinEnh($script);
    return $minifier->minify();
  }
//  
//  protected static function minify2($script)
//  {
//    return JSMinPlus::minify($script);
//  }
  
}