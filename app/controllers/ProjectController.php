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
        $directories = File::directories(app_path('markdown'));

        $directories_data = array();

        foreach ($directories as $k => $value) {
            $config_file = rtrim($value, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . '' . Config::get('project.file_configration');

            if (File::exists($config_file)) {
                $config = json_decode(File::get($config_file));

                if (!empty($config)) {
                    $projet = trim(str_replace(app_path('markdown'),'',$value),DIRECTORY_SEPARATOR);
                    $config->folder = $projet;

                    $image = rtrim($value, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . '' .$config->logo;
                    if (File::exists($image)) {
                        $config->image = base64_encode(File::get($image));
                    }
                    $directories_data[] = $config;
                }
            }

        }

        return View::make('project.liste')->with('projects',$directories_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($project_directory, $slug = '')
    {
        //
        var_dump($project_directory);
        var_dump($slug);
        exit;
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