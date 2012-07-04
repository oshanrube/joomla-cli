<?php
$filelist = unserialize(file_get_contents('lib/filedump.dat'));
foreach($filelist as $filename => $content) {
$filename = str_replace('helloworld',$app['name_safe_lower'],$filename);
$folder = 'com_'.$app['name_safe_lower'].'/'.dirname($filename);
if(in_array($folder,$accepted_folders)){
	$data = gzuncompress($content);
	//make head file
	$from 	= array('HelloWorld','Hello Wold','helloworld','HELLOWORLD','Hello World');
	$to 	= array($app['name_safe'],$app['name'],$app['name_safe_lower'],$app['name_safe_upper'],$app['name']);

	$filename = str_replace('helloworld',$app['name_safe_lower'],$filename);
	//$newFileList[$filename] = str_replace($from,$to,$data);
	file_put_contents('com_'.$app['name_safe_lower'].'/'.$filename,str_replace($from,$to,$data));
}

}
