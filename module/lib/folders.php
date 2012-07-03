<?php
$ans_pattern = "/[y,Y,yes,Yes,YES]/";
//
//create  folders
$module_folder = 'mod_'.strtolower($app['name_safe']).'/';
if(!is_dir($module_folder))
mkdir($module_folder,0700);
if(!file_exists($module_folder."index.html"))
	file_put_contents($module_folder."index.html",'');
if(!is_dir($module_folder.'tmpl'))
	mkdir($module_folder.'tmpl',0700);
if(!file_exists($module_folder.'tmpl'."/index.html"))
	file_put_contents($module_folder.'tmpl'."/index.html",'');
	



