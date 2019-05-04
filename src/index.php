<?php
/**
 * @param  string sorting images via width size;
 */
require 'lib/main_class.php';
$path = realpath('img/');
$Directory = new RecursiveDirectoryIterator($path);
// $filter = new MyRecursiveFilterIterator($Directory);
$Iterator = new RecursiveIteratorIterator($Directory);

$files = array();
$pre = array();
foreach ($Iterator as $info) {
    if(!is_dir($info->getFilename())) {
        $pre['name']=$info->getFilename();
        $pre['path']=$info->getPathname();
        $pre['size']= getimagesize($info->getPathname())[3] ;
        $pre['width'] = onlyDigits(explode(' ', getimagesize($info->getPathname())[3])[0]);
        $pre['height'] = onlyDigits(explode(' ', getimagesize($info->getPathname())[3])[1]);
        $pre['type']= getimagesize($info->getPathname())['mime'] ;
        $files[] = $pre;
    }
}
$result=bubblesort($files);
//pre(json_encode($result));
$json = 'json/result.json';
$current = file_get_contents($json);
$current = json_encode($result);
file_put_contents($json, $current);


// pre($result);



// var_dump($Directory);
// var_dump($files);
// echo('repo');
//
?>
