<?php  define ( "IN_KEKE", TRUE );

include 'app_boot.php';

//isset ( $_GET['m'] ) && $_GET['m'] == "user" and $do = "avatar";

$request = Request::factory ();
$_K ['control'] = $request->initial ()->controller ();
$_K ['action'] = $request->initial ()->action ();
$_K ['directory'] = $request->initial ()->directory ();

$_K['directory'] or $_K['directory'] = 'index';
 
Keke_lang::package_init ( $_K['directory'] );
// var_dump($_K['directory'],$_K ['control']);
Keke_lang::loadlang ( $_K ['control'] );


echo $request->execute();die;





