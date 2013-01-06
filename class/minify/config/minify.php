<?php defined('IN_KEKE') or die('No direct script access.');

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
    //'js' => array('///js/html5.js','//js/common.js'),
    // 'css' => array('//css/file1.css', '//css/file2.css'),
   )
);
