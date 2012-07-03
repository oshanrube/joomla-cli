<?php
$data = gzuncompress($filelist['mod_helloworld.xml']);
$tags = array(
		'name' => $app['name'],
		'author' => $app['author'],
		'description' => $app['description']);
foreach($tags as $tag => $val){
	$data = preg_replace("/(<".$tag.">).*(<\/".$tag.">)/","$1".$val."$2",$data);
}
$data = str_replace($from,$to,$data);
file_put_contents($module_folder.'mod_'.strtolower($app['name_safe']).'.xml',$data);
