<?php namespace Distillerie\Libraries\Filesystem;



class Filesystem extends \Illuminate\Filesystem\Filesystem{


    public function directoryMap($source_dir, $directory_depth = 0, $hidden = FALSE)
    {
        if ($fp = @opendir($source_dir))
        {
            $filedata	= array();
            $new_depth	= $directory_depth - 1;
            $source_dir	= rtrim($source_dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;

            while (FALSE !== ($file = readdir($fp)))
            {

                if ( ! trim($file, '.') OR ($hidden == FALSE && $file[0] == '.'))
                {
                    continue;
                }

                if (($directory_depth < 1 OR $new_depth > 0) && @is_dir($source_dir.$file))
                {
                    $filedata[$file] = $this->directoryMap($source_dir.$file.DIRECTORY_SEPARATOR, $new_depth, $hidden);
                }
                else
                {
                    $filedata[] = $file;
                }
            }

            closedir($fp);
            return $filedata;
        }

        return FALSE;
    }

    public function removeExtension($file)
    {
        $segs = explode('.', $file, 2);

        if (count($segs) > 1)
        {
            array_pop($segs);
            $file = implode('.', $segs);
        }

        return $file;
    }

}
