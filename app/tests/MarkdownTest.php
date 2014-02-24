<?php

use Distillerie\Libraries\Markdown\Markdown;
use Distillerie\Libraries\Menu\Menu;
use Illuminate\Support\Facades\Config;


class MarkdownTest extends TestCase
{

    public function testTransform()
    {
        $parser = new Markdown();
        $this->assertEquals("<div class=\"page-header\"><h1>Test!</h1></div>\n", $parser->transform("# Test!"));
    }

    public function testMake()
    {
        $parser = new Markdown();

        $this->assertEquals("<p>Test unit</p>\n", $parser->make('test/index'));
    }

    public function testMakeWithoutPath()
    {
        $parser = new Markdown();
        $path   = public_path(Config::get('markdown.path')) . '/test/index';
        $this->assertEquals("<p>Test unit</p>\n", $parser->make($path, false));
    }


    public function testALl()
    {
        $parser     = new Markdown();
        $markdorwn  = public_path('markdown') . DIRECTORY_SEPARATOR . 'test';
        $menuObject = new Menu();
        $menu       = $menuObject->build($markdorwn, 0, public_path('markdown'));
        $this->assertEquals("<p>Test unit</p>\n<p>Test other</p>\n", $parser->all($menu));

    }
}