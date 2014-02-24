<?php

class RouteTest extends TestCase
{


    public function testRouteProjectController()
    {
        $response = $this->action('GET', 'ProjectController@index');
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testRouteProjectControllerTags()
    {
        $response = $this->action('GET', 'ProjectController@index', array('tag' => 'laravel'));
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testRouteProjectControllerSitemap()
    {
        $response = $this->action('GET', 'ProjectController@sitemap');
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testRouteProjectControllerSearch()
    {
        $response = $this->action('GET', 'ProjectController@search', array('search' => 'laravel'));
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testRouteProjectControllerPrint()
    {
        $response = $this->action('GET', 'ProjectController@printProject', array('project_directory' => 'test'));
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testRouteProjectControllerShow()
    {
        $response = $this->action('GET', 'ProjectController@show', array('project_directory' => 'test', 'slug' => 'index'));
        $this->assertTrue($this->client->getResponse()->isOk());
    }


}