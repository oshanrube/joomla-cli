<?php
$data = gzuncompress($filelist['helloworld.xml']);
$tags = array(
		'name' => 'COM_'.$app['name_safe_upper'],
		'creationDate' => date('F Y'),
		'author' => $app['author'],
		'authorEmail' => $app['author_email'],
		'authorUrl' => $app['author_url'],
		'description' => $app['description']);
foreach($tags as $tag => $val){
	$data = preg_replace("/(<".$tag.">).*(<\/".$tag.">)/","$1".$val."$2",$data);
}
$data = str_replace($from,$to,$data);
echo $data;
