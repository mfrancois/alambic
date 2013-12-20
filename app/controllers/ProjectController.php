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
            ->with('tags', $tags)
            ->with('projects', $directories_data);

    }

    public function printProject($project_directory)
    {

        $path = public_path('markdown') . DIRECTORY_SEPARATOR . $project_directory;
        if (!File::isDirectory($path))
        {
            App::abort(404);
        }


        $markdorwn = public_path('markdown') . DIRECTORY_SEPARATOR . $project_directory;
        $menu      = Menu::build($markdorwn, 0, public_path('markdown'));

        return View::make('project.print')
            ->with('content', Markdown::all($menu));
    }

    public function show($project_directory, $slug = '')
    {
        if(empty($slug)){
            $slug = Config::get('project.default_file_in_folder');
        }
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

    public function sitemap()
    {
        $sitemap = App::make("sitemap");

        $directories_data = Menu::top(public_path('markdown'), '');

        foreach ($directories_data as $k => $v)
        {
            $markdorwn = public_path('markdown') . DIRECTORY_SEPARATOR . $v->folder;
            $menu      = Menu::sitemap($markdorwn, 0, public_path('markdown'));

            foreach ($menu as $k => $v)
            {
                $sitemap->add(URL::to($v), date('Y-m-d'), '0.9', 'monthly');
            }
        }


        return $sitemap->render('xml');
    }

    public function search(){
        $seach = Input::get('s');

        $googlesearch = App::make("googlesearch");
        $results = $googlesearch->build($seach);

        if(!empty($results)){

            foreach($results as $k=>$v){
                $results[$k] = (object)array(
                    'image'=>'',
                    'folder'=>$v->url,
                    'name'=>$v->title,
                    'description'=>$v->content,
                    'keywords'=>array()
                );
            }
        }

        return View::make('project.search')
                ->with('results', $results);

    }

}