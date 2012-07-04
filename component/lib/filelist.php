<?php
$filelist = directoryToArray('com_helloworld',true,true,array('index.html'));
foreach($filelist as $file){
//get the file
$data = file_get_contents('com_helloworld/'.$file);
$data = gzcompress($data,9);
//filename
//$filename = str_replace(array('/','.'),array(''),$file);
//$folder = new stdClass();
//$folder->name = $file;
//$folder->data = $data;
$file_content[$file] = $data;
}

file_put_contents('filedump.dat',serialize($file_content));


function directoryToArray($directory, $recursive,$onlyFiles = false,$excludes = array(),$oriDirectory = '') {
	if($oriDirectory == '')
	$oriDirectory = $directory;
	$array_items = array();
	if ($handle = opendir($directory)) {
		while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					if (is_dir($directory. "/" . $file)) {
						if($recursive) {
								$array_items = array_merge($array_items, directoryToArray($directory. "/" . $file, $recursive,$onlyFiles,$excludes,$oriDirectory));
						}
						$file = $directory . "/" . $file;
					} else {
						if(!in_array($file,$excludes)){
							$file = $directory . "/" . $file;
							$array_items[] = str_replace($oriDirectory.'/', "", $file);
						}
					}
				}
		}
		closedir($handle);
	}
	return $array_items;
}
