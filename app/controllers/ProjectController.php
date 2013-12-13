<?php

class ProjectController extends \BaseController
{


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $directories_data = Menu::top(public_path('markdown'));

        return View::make('project.liste')
            ->with('projects', $directories_data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
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
            $md = "404";
        }

        return View::make('project.detail')
            ->with('content', Markdown::make($md));

    }

}