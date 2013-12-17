<?php namespace Distillerie\Libraries\Google;


use Request;

class Googlesearch
{

    public $uri_api = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0";
    public $type = 'site%3A';


    function __construct()
    {
        $this->type .= Request::getHost();
    }


    public function build($search)
    {

        $url = $this->uri_api . "&q=" . $this->type . '+' . urlencode($search);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $body = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($body);

        if (!empty($json) && !empty($json->responseData) && !empty($json->responseData->results))
        {
            return $json->responseData->results;
        }

        return array();

    }

}