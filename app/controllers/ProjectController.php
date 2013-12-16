<?php

class ProjectController extends \BaseController
{


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index($tags = '')
    {
        $directories_data = Menu::top(public_path('markdown'), '', $tags);
        $colors_possible  = Config::get('project.color_of_tags');

        return View::make('project.liste')
            ->with('colors_possible', $colors_possible)
            ->with('projects', $directories_data);

    }

    public function show($project_directory, $slug = 'index')
    {
        //
        $markdorwn = public_path('markdown') . DIRECTORY_SEPARATOR . $project_directory;

        if (File::isFile($markdorwn . DIRECTORY_SEPARATOR . $slug . '.md'))
        {
            $md = $project_directory . DIRECTORY_SEPARATOR . $slug;
        }
        else
        {
            App::abort(404);
        }

        return View::make('project.detail')
            ->with('content', Markdown::make($md));

    }

}