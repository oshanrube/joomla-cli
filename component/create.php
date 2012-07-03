<?php
//get variables
include('lib/variables.php');
//create folders
include('lib/folders.php');
//open the filelist
$filelist = unserialize(file_get_contents('filedump.dat'));
//create files
//site
include('lib/site.php');
//create XML
include('lib/starters.php');
