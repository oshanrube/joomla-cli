<?php
$filelist = unserialize(file_get_contents('filedump.dat'));
foreach($filelist as $filename => $content) {

$folder = 'com_'.$app['name_safe_lower'].'/'.dirname($filename);
if(in_array($folder,$accepted_folders)){
	$data = gzuncompress($content);
	//make head file
	$from 	= array('HelloWorld','Hello Wold','helloworld','HELLOWORLD');
	$to 	= array($app['name_safe'],$app['name'],$app['name_safe_lower'],$app['name_safe_upper']);

	$filename = str_replace('helloworld',$app['name_safe_lower'],$filename);
	//$newFileList[$filename] = str_replace($from,$to,$data);
	file_put_contents('com_'.$app['name_safe_lower'].'/'.$filename,str_replace($from,$to,$data));
}

}
