<?php namespace Distillerie\Libraries\Markdown;

use File;
use Config;


class Markdown
{


    public function make($markdown, $no_path = true)
    {


        if ($no_path)
        {
            $path = public_path(Config::get('markdown.path')) . '/' . $markdown . '.' . Config::get('markdown.extension');
        }
        else
        {
            $path = $markdown . '.' . Config::get('markdown.extension');
        }


        if (File::isFile($path))
        {

            $parser  = new MarkdownParser();
            $content = $parser->transformMarkdown(File::get($path));

            return $content;
        }

        return '';


    }

    public function all($tab)
    {

        $content = '';
        foreach ($tab as $k => $v)
        {
            if (!empty($v['filepath']))
            {
                $content .= $this->make(File::removeExtension($v['filepath']),false);
            }
            else if ($v['dirpath'])
            {

                $content .= $this->make($v['dirpath'] . Config::get('project.default_file_in_folder'),false);
            }

            if (!empty($v['children']))
            {
                $content .= $this->all($v['children']);
            }
        }
        return $content;
    }


}