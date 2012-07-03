<?php
$ans_pattern = "/[y,Y,yes,Yes,YES]/";
//ask which folders are needed
$accepted_categories = array('admin','site');
$accepted_folders = array();
//
echo "DO you want to generate full file structure? \n";
if(preg_match($ans_pattern,fgets(STDIN))){
	$accepted_categories[] = 'admin-data';
	$accepted_categories[] = 'admin-language';
	$accepted_categories[] = 'language';
	$accepted_categories[] = 'media';
	$accepted_categories[] = 'site-language';
} else {
echo "which of the following components do you need? (y/yes)\n";
echo "administrator database handle : ";
if(preg_match($ans_pattern,fgets(STDIN)))
$accepted_categories[] = 'admin-data';

echo "administrator language files : ";
if(preg_match($ans_pattern,fgets(STDIN)))
$accepted_categories[] = 'admin-language';

echo "generic language files : ";
if(preg_match($ans_pattern,fgets(STDIN)))
$accepted_categories[] = 'language';

echo "media files : ";
if(preg_match($ans_pattern,fgets(STDIN)))
$accepted_categories[] = 'media';

echo "site langauge files : ";
if(preg_match($ans_pattern,fgets(STDIN)))
$accepted_categories[] = 'site-language';
}
//create the folder
$folders['media'] = array("media","media/images","media/css");
$folders['admin'] = array("admin",
	"admin/models","admin/models/fields","admin/models/forms","admin/models/rules",
	"admin/helpers","admin/controllers",
	"admin/views","admin/views/helloworlds","admin/views/helloworlds/tmpl","admin/views/helloworld","admin/views/helloworld/tmpl");
$folders['admin-data'] 		= array("admin/tables",
	"admin/sql","admin/sql/updates","admin/sql/updates/mysql");
$folders['admin-language'] 	= array("admin/language","admin/language/en-GB");
$folders['language']	 	= array("language","language/en-GB");

$folders['site'] 		= array("site",
	"site/models","site/models/forms",
	"site/controllers",
	"site/views","site/views/updhelloworld","site/views/updhelloworld/tmpl","site/views/helloworld","site/views/helloworld/tmpl");
$folders['site-language'] 	= array("site/language","site/language/en-GB");
//create  folders
mkdir('com_'.strtolower($app['name_safe']),0700);
foreach($folders as $category => $items){
	if(in_array($category, $accepted_categories)){
		foreach($items as $folderName){
			$folderName = 'com_'.strtolower($app['name_safe']).'/'.$folderName;
			$folderName = str_replace('helloworld',$app['name_safe_lower'],$folderName);
			if(!is_dir($folderName))
			mkdir($folderName,0700);
			if(!file_exists($folderName."/index.html"))
			file_put_contents($folderName."/index.html",'');
			//collect accepted folder list
			$accepted_folders[] = $folderName;
		}
	}
}



