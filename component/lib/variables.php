<?php
$app['name'] = '';
$app['author'] = 'Oshan Rube';
$app['author_email'] = 'oshanrube@gmail.com';
$app['author_url'] = 'http://about.me/oshanr';
$app['description'] = '';

while(strlen($app['name']) < 2){
	echo "what is the name of the component?";
	$app['name'] = fgets(STDIN);
}
echo "Author Name (".$app['author']."): ";
$input = fgets(STDIN);
if($input != ''){
	$app['author'] = $input; 
}

echo "Author Email (".$app['author_email']."): ";
$input = fgets(STDIN);
if($input != ''){
	$app['author_email'] = $input; 
}

echo "Author Website (".$app['author_url']."): ";
$input = fgets(STDIN);
if($input != ''){
	$app['author_url'] = $input; 
}

echo "component Description : ";
$app['description'] = fgets(STDIN);

//make safe app name

$regex = array('#(\.){2,}#', '#[^A-Za-z0-9\.\_\- ]#', '#^\.#');
$app['name'] =  preg_replace($regex, '', $app['name']);
//remove spaces
$regex[] = '#\ #';
$app['name_safe'] = preg_replace($regex, '', $app['name']);
$app['name_safe_upper'] = strtoupper(preg_replace($regex, '', $app['name']));
$app['name_safe_lower'] = strtolower(preg_replace($regex, '', $app['name']));
