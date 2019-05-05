<?php

/**
 * This file index image dir and produce js file

 *
 * @category Array_Processing
 * @package  Pagepackage
 * @author   Display Name <vx@ice07.ru>
 * @license  NoLicense
 * @version  GIT: $Id$ In development. Very unstable.
 * @link     NoLink
 * 
 */

require 'commands/main_class.php';
$IMGDIR = 'img/';
$JSONPATH = 'json/';

$path = realpath($IMGDIR);
$Directory = new RecursiveDirectoryIterator($path);

// $filter = new MyRecursiveFilterIterator($Directory);

$Iterator = new RecursiveIteratorIterator($Directory);
$tool = new tool();

$files = array();
$pre = array();
foreach ($Iterator as $info) {
    if(!is_dir($info->getFilename())) {
        $pre['name'] = $info->getFilename();
        $pre['path'] = $info->getPathname();
        $pre['size'] = getimagesize($info->getPathname())[3] ;
        $width = explode(' ', getimagesize($info->getPathname())[3])[0];
        $pre['width'] = Tool::onlyDigits($width);
        $height = explode(' ', getimagesize($info->getPathname())[3])[1];
        $pre['height'] = Tool::onlyDigits($height);
        $pre['type'] = getimagesize($info->getPathname())['mime'] ;
        $files[] = $pre;
    }
}
$result=tool::bubblesort($files);
$jsonname = 'result.json';
$json = $JSONPATH.$jsonname;
$current = file_get_contents($json);
$current = json_encode($result);
file_put_contents($json, $current);

?>
