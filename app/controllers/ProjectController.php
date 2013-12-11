<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $directories = File::directories(app_path('markdown'));
        dd($directories);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($project_directory,$slug='')
	{
		//
        var_dump($project_directory);
        var_dump($slug);
        exit;
	}


    public function getGist($slug)
    {
        $data['slug'] = trim($slug);

        $gistPath = str_replace('/', DIRECTORY_SEPARATOR, app_path() .'/' . Gist::$path . '/' . $data['slug'] . '.md');
        if ( ! File::exists($gistPath))
        {
            return Redirect::to('/');
        }

        $markdownParser = new MarkdownParser();
        $data['gist']   = $markdownParser->transformMarkdown(File::get($gistPath));

        $this->layout->content = View::make('home.gist', $data);
    }

}