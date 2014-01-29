<?php namespace Distillerie\Libraries\Menu;

use File;
use Config;

class Menu
{

    public function detail($project_selected)
    {
        $config_file = rtrim($project_selected, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . Config::get('project.file_configration');
        $config      = null;
        if (File::exists($config_file))
        {
            $config = json_decode(File::get($config_file));

            if (!empty($config))
            {
                $projet         = trim(str_replace(public_path('markdown'), '', $project_selected), DIRECTORY_SEPARATOR);
                $config->folder = $projet;

                $image = rtrim($project_selected, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . '' . $config->logo;
                if (File::exists($image))
                {
                    $config->image = base64_encode(File::get($image));
                }

            }
        }

        return $config;
    }

    public function top($path, $project_selected = '', $tag = '')
    {

        $directories      = File::directories($path);
        $directories_data = array();

        foreach ($directories as $k => $value)
        {
            $config_file = rtrim($value, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . '' . Config::get('project.file_configration');

            if (File::exists($config_file))
            {
                $config = json_decode(File::get($config_file));

                if (!empty($config))
                {
                    if (!empty($tag) && !empty($config->keywords))
                    {
                        if (!in_array($tag, $config->keywords))
                        {
                            continue;
                        }
                    }
                    $projet           = trim(str_replace(public_path('markdown'), '', $value), DIRECTORY_SEPARATOR);
                    $config->folder   = $projet;
                    $config->selected = ($projet == $project_selected) ? true : false;

                    $image = rtrim($value, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . '' . $config->logo;
                    if (File::exists($image))
                    {
                        $config->image = base64_encode(File::get($image));
                    }
                    $directories_data[] = $config;
                }
            }

        }

        return $directories_data;
    }

    public function build($directory, $depth = 0, $root = '')
    {

        $map  = File::directoryMap($directory, $depth);
        $map  = $this->removeUnwanted($map);
        $menu = !empty($map) ? $this->child($map, $directory, $root) : array();

        return $menu;

    }

    public function sitemap($directory, $depth = 0, $root = '')
    {
        $map  = File::directoryMap($directory, $depth);
        $map  = $this->removeUnwanted($map);
        $menu = !empty($map) ? $this->sitemapChild($map, $directory, $root) : array();

        return $menu;
    }

    public function generateHtml($menu, $uri = '', $depth = 0)
    {

        $class = ($depth == 0) ? Config::get('menu.classes_first_depth') : '';
        $class .= ' ' . Config::get('menu.default_class');
        $html = "<ul class='" . $class . "'>";

        foreach ($menu as $k => $v)
        {
            $active = ("/" . $uri == $v['uri']) ? Config::get('menu.active_class') : Config::get('menu.inactive_class');
            $html .= "<li class='" . $active . "'>";
            $html .= "<a href='" . $v['uri'] . "' >" . $v['name'] . "</a>";

            if (!empty($v['children']))
            {
                $html .= $this->generateHtml($v['children'], $uri, ($depth + 1));
            }

            $html .= "</li>";
        }

        $html .= "</ul>";

        return $html;
    }


    public function removeUnwanted($map)
    {
        $folders = Config::get('menu.exclude_folder');
        $files   = Config::get('menu.exclude_file');

        foreach ($folders as $k)
        {
            if (isset($map[$k]))
            {
                unset($map[$k]);
            }
        }


        foreach ($map as $k => $v)
        {

            if (is_string($v))
            {
                if (in_array($v, $files))
                {
                    unset($map[$k]);
                }
            }

        }

        return $map;
    }

    public function  child($map, $directory, $root)
    {
        $order = array();

        foreach ($map as $k => $v)
        {

            if (is_string($k))
            {
                $menu[] = array(
                    'dir'      => $k,
                    'name'     => $this->guessName($k, Config::get('menu.guess_separator')),
                    'children' => $this->child($v, $directory . '/' . $k, $root),
                    'dirpath'  => str_replace('/./', '/', $directory . '/' . $k . '/'),
                    'uri'      => "/" . ltrim(str_replace($root, '', $directory . '/' . $k), DIRECTORY_SEPARATOR)
                );

                continue;
            }

            // Order file
            if ($v == Config::get('menu.order_file'))
            {
                $order = $this->parseorder($directory . '/' . $v);

                continue;
            }

            //
            $removed = File::removeExtension($v);
            $uri     = str_replace($root, '', $directory . '/' . $removed);


            $menu[] = array(
                'file'     => $v,
                'name'     => $this->guessName($v, Config::get('menu.guess_separator')),
                'filepath' => str_replace('/./', '/', $directory . '/' . $v),
                'uri'      => "/" . ltrim($uri, DIRECTORY_SEPARATOR)
            );
        }

        $menu = $this->orderBy($menu, $order);

        return $menu;

    }

    public function  sitemapChild($map, $directory, $root)
    {
        $menu  = array();
        foreach ($map as $k => $v)
        {

            if (is_string($k))
            {
                $menu[] = "/" . ltrim(str_replace($root, '', $directory . '/' . $k), DIRECTORY_SEPARATOR);
                $menu   = array_merge($menu, $this->sitemapChild($v, $directory . '/' . $k, $root));
                continue;
            }

            $removed = File::removeExtension($v);
            $uri     = str_replace($root, '', $directory . '/' . $removed);
            $menu[]  = "/" . ltrim($uri, DIRECTORY_SEPARATOR);
        }
        return $menu;

    }


    public function orderBy($menu, $order)
    {
        if (empty($order))
        {

            foreach ($menu as $k => $item)
            {
                $file_name_without_extension = isset($item['file']) ? File::removeExtension($item['file']) : '';

                if (!empty($file_name_without_extension) && $file_name_without_extension == Config::get('project.default_file_in_folder'))
                {
                    unset($menu[$k]);
                    continue;
                }

            }

            return $menu;
        }

        $ordered_menu = array();

        foreach ($order as $file => $name)
        {

            $key_map = array_keys($order);

            foreach ($menu as $k => $item)
            {

                // Index
                $file_name_without_extension = isset($item['file']) ? File::removeExtension($item['file']) : '';

                if (!empty($file_name_without_extension) && $file_name_without_extension == Config::get('project.default_file_in_folder') && !in_array($file_name_without_extension, $key_map))
                {
                    unset($menu[$k]);
                    continue;
                }


                if (isset($item['file']) && File::removeExtension($item['file']) == $file)
                {
                    $item['name']   = $name;
                    $ordered_menu[] = $item;
                    unset($menu[$k]);
                    continue;
                }

                if (isset($item['dir']) && File::removeExtension($item['dir']) == $file)
                {
                    $item['name']   = $name;
                    $ordered_menu[] = $item;
                    unset($menu[$k]);
                }
            }
        }
        $ordered_menu = array_merge($ordered_menu, $menu);

        return $ordered_menu;
    }


    public function parseorder($orderfile)
    {

        if (!File::isFile($orderfile))
        {
            return array();
        }

        $order = trim(File::get($orderfile));
        $ord   = explode("\n", $order);

        $orders = array();
        foreach ($ord as $order_string)
        {
            $pieces = explode(Config::get('menu.order_separator'), $order_string);

            if (count($pieces) == 2)
            {
                $file = trim($pieces[0]);
                $name = trim($pieces[1]);
            }
            else
            {
                $file = $order_string;
                $name = $this->guessName($file, Config::get('menu.guess_separator'));
            }

            $orders[$file] = $name;
        }
        return $orders;
    }


    public function guessName($name, $separator = array())
    {

        $name = File::removeExtension($name);

        foreach ($separator as $sep)
        {
            $name = str_replace($sep, ' ', $name);
        }

        return ucwords($name);
    }


}
