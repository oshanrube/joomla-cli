<?php
$app['name'] = '';
$app['author'] = '';
$app['description'] = '';

while(strlen($app['name']) < 2){
	echo "what is the name of the component?";
	$app['name'] = fgets(STDIN);
}
echo "Author Name : ";
$app['author'] = fgets(STDIN);

echo "Module Description : ";
$app['description'] = fgets(STDIN);

//make safe app name

$regex = array('#(\.){2,}#', '#[^A-Za-z0-9\.\_\- ]#', '#^\.#');
$app['name'] =  preg_replace($regex, '', $app['name']);
//remove spaces
$regex[] = '#\ #';
$app['name_safe'] = preg_replace($regex, '', $app['name']);
$app['name_safe_upper'] = strtoupper(preg_replace($regex, '', $app['name']));
$app['name_safe_lower'] = strtolower(preg_replace($regex, '', $app['name']));
