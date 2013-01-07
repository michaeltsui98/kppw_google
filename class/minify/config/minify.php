<?php defined('IN_KEKE') or die('No direct script access.');
global $_K;
ini_set('zlib.output_compression', '0');
$config =  array(
  'uploaderHoursBehind' => 0,
  'serveOptions' => array(
    'maxAge' => 1800,
    'bubbleCssImports' => false,
    'minApp' => array(
      'groupsOnly' => false,
      'allowDirs' => array(),
    ),
    'preserveComments' => true,
    'rewriteCssUris' => true,
    'currentDir' => false,
  ),
  'quiet' => false,
  'symlinks' => array(
    '/'.BASE_URL => (BASE_URL != '/'?S_ROOT:'/')
  ),
  'errorLogger' => true,
  'rewriteCssUris' => false,
  'allowDebugFlag' => false,
  'cachePath' => S_ROOT.'data/cache/minify',
  'documentRoot' => S_ROOT,
  'cacheFileLocking' => true,
  'groupsConfig' => array(
    'js' => array(//'//static/js/html5.js',
    		//'//static/js/jquery.js',
    		//'//lang/'.$_K['lang'].'/script/lang.js',
    		//'//static/js/keke.js',
    		//'//static/js/in.js'
    		),
    'css' => array('//static/css/reset.css',
    		'//static/css/base.css', 
    		'//static/css/box.css',
    		'//static/css/animate.css',
    		//'//static/css/layout/mobile.min.css',
    		//'//static/css/layout/720.min.css',
    		//'//static/css/layout/960.min.css',
    		//'//static/css/layout/1200.min.css',
    		//'//static/css/layout/1560.min.css',
    		//'//static/css/layout/fluid.min.css',
    		'//'.SKIN_PATH.'/css/common.css',
    		'//'.SKIN_PATH.'/theme/'.$_K['theme'].'/css/'.$_K['theme'].'_style.css',
    		),
   )
);
