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
            ->with('projects', $directories_data)
            ->nest('header', 'header.menu', array('projects' => $directories_data))
            ->nest('baseline', 'header.baseline');
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

        $menu = Menu::build($markdorwn, 0, public_path('markdown'));
        $html_menu = Menu::generate_html($menu, "/" . $project_directory . "/" . $slug);
        $directories_data = Menu::top(public_path('markdown'),$project_directory);

        if (File::isFile($markdorwn . DIRECTORY_SEPARATOR . $slug . '.md')) {
            $md = $project_directory . DIRECTORY_SEPARATOR . $slug;
        } else {
            $md = "404";
        }

        return View::make('project.detail')
            ->with('content', Markdown::make($md))
            ->nest('header', 'header.menu', array('projects' => $directories_data))
            ->nest('left', 'project.menu', array('menu' => $html_menu))
            ->nest('baseline', 'header.baseline');

    }


    public function getGist($slug)
    {
        $data['slug'] = trim($slug);

        $gistPath = str_replace('/', DIRECTORY_SEPARATOR, app_path() . '/' . Gist::$path . '/' . $data['slug'] . '.md');
        if (!File::exists($gistPath)) {
            return Redirect::to('/');
        }

        $markdownParser = new MarkdownParser();
        $data['gist'] = $markdownParser->transformMarkdown(File::get($gistPath));

        $this->layout->content = View::make('home.gist', $data);
    }

}