<?php namespace Distillerie\Libraries\Markdown;

use File;
use Config;


class Markdown {



    public function make($markdown)
    {


        $path = public_path(Config::get('markdown.path')).'/'.$markdown.'.'.Config::get('markdown.extension');


        if(File::isFile($path)){
            $parser = new MarkdownParser();
            $content =$parser->transformMarkdown(File::get($path));

            return $content;
        }

        return '';


    }



}