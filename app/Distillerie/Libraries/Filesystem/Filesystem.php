<?php namespace Distillerie\Libraries\Filesystem;



class Filesystem extends \Illuminate\Filesystem\Filesystem{

    public function exists($path)
    {
        return file_exists($path);
    }
}
