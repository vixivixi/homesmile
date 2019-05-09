<?php

namespace App;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * Class Bootstrap
 *
 * @package App
 */

class Bootstrap
{

    var $realpathimg, $pathjson;

    public function __construct($IMGDIR, $JSONPATH)
    {

        if(is_dir(__DIR__.'/'.$IMGDIR))
            $this->realpathimg=(realpath(__DIR__.'/'.$IMGDIR));
        else echo $IMGDIR.' is not a folder';

        if(is_dir(__DIR__.'/'.$JSONPATH))
                $this->pathjson=(__DIR__.'/'.$JSONPATH);
            else echo $JSONPATH.'this is not a folder';
    }

    /**
     * @param $IMGDIR - great
     * @param $JSONPATH - great
     */
    public function run()
    {

        $path = $this->realpathimg;
        $Directory = new RecursiveDirectoryIterator($path);
        $Iterator = new RecursiveIteratorIterator($Directory);
        $tool = new commands\Tool();

        $files = array();
        $pre = array();
        foreach ($Iterator as $info) {
            if(!is_dir($info->getFilename())) {
                $pre['name'] = $info->getFilename();
                $pre['path'] = $info->getPathname();
                $pre['size'] = getimagesize($info->getPathname())[3] ;
                $width = explode(' ', getimagesize($info->getPathname())[3])[0];
                $pre['width'] = $tool::onlyDigits($width);
                $height = explode(' ', getimagesize($info->getPathname())[3])[1];
                $pre['height'] = $tool::onlyDigits($height);
                $pre['type'] = getimagesize($info->getPathname())['mime'] ;
                $files[] = $pre;
            }
        }
        $result=$tool::bubblesort($files);
        $jsonname = 'result.json';
        $json = $this->pathjson.$jsonname;
        //$current = file_get_contents($json);
        $current = json_encode($result);
        file_put_contents($json, $current);
        echo 'WELL DONE';
        return true;
    }
}
