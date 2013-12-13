<?php

View::composer('header.menu', function ($view)
{
    $projects = Menu::top(public_path('markdown'), Request::segment(1));
    $view->with('projects', $projects);
});


View::composer('header.meta', function ($view)
{
    $project = Menu::detail(public_path('markdown').DIRECTORY_SEPARATOR. Request::segment(1));
    $view->with('project', $project);
});


View::composer('project.menu', function ($view)
{
    $markdorwn = public_path('markdown') . DIRECTORY_SEPARATOR . Request::segment(1);
    $menu      = Menu::build($markdorwn, 0, public_path('markdown'));
    $html_menu = Menu::generate_html($menu, Request::url());

    $view->with('menu', $html_menu);
});