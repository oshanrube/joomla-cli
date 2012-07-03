<?php
//get variables
include('lib/variables.php');
//create folders
include('lib/folders.php');
//open the filelist
$filelist = unserialize(file_get_contents('lib/filedump.dat'));
//create files
//site
include('lib/site.php');
//create XML
include('lib/starters.php');

echo 'zip -r mod_'.strtolower($app['name_safe']).'.zip mod_'.strtolower($app['name_safe'])."\n";
