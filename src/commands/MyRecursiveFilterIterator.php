<?php

namespace App\commands;

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
