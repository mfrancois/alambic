<?php

View::composer('header.menu', function ($view)
{
    $uri = Request::segment(1);
    if ($uri != null)
    {
        $projects         = Menu::top(public_path('markdown'), Request::segment(1));
        $selected_project = false;
        foreach ($projects as $k => $v)
        {
            if ($v->selected)
            {
                $selected_project = $v;
                break;
            }
        }
    }
    else
    {
        $selected_project = false;
        $projects         = array();
    }

    $view->with('selected_project', $selected_project)
         ->with('projects', $projects);
});


View::composer('header.meta', function ($view)
{
    $uri = Request::segment(1);
    if ($uri != null)
    {
        $project = Menu::detail(public_path('markdown') . DIRECTORY_SEPARATOR . Request::segment(1));
    }
    else
    {
        $project = array();
    }

    $view->with('project', $project);
});


View::composer('project.menu', function ($view)
{
    $markdorwn = public_path('markdown') . DIRECTORY_SEPARATOR . Request::segment(1);
    $menu      = Menu::build($markdorwn, 0, public_path('markdown'));
    $path      = Request::segment(2);

    if ($path == '')
    {
        $path = Request::segment(1) . '/index';
    }
    else
    {
        $path = Request::path();
    }
    $html_menu = Menu::generate_html($menu, $path);

    $view->with('menu', $html_menu);
});


App::missing(function ($exception)
{
    return Response::view('errors.missing', array(), 404);
});