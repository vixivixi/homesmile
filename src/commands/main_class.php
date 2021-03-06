<?php

class Tool
{
    public function pre($str)
    {
        echo '<pre>';
        var_dump($str);
        echo '<pre>';
    }

    public function prex($str)
    {
        echo '<pre>';
        var_dump($str);
        echo '<pre>';
        exit();
    }

    public function onlyDigits($str)
    {
        $res = preg_replace("/[^0-9]/", "", $str);
        return $res;
    }

    public function bubblesort($arr)
    {

        $size = count($arr)-1;
        for ($i=0; $i<$size; $i++) {
            for ($j=0; $j<$size-$i; $j++) {
                $k = $j+1;
                if ($arr[$k]['width'] < $arr[$j]['width']) {
                    $temp = $arr[$k];
                    $arr[$k] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
        return $arr;
    }
}


class MyRecursiveFilterIterator extends \RecursiveFilterIterator
{

    public function accept()
    {
        $filename = $this->current()->getFilename();
        // Skip hidden files and directories.
        if ($name[0] === '.') {
            return false;
        }
        if ($this->isDir()) {
            // Only recurse into intended subdirectories.
            return $name === 'wanted_dirname';
        } else {
            // Only consume files of interest.
            return strpos($name, 'wanted_filename') === 0;
        }
    }

}
