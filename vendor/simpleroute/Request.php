<?php

    class Request{
        public $params;
        public $body;
        public $files;
        public $headers;
        public $controll;

        public function __construct($body, $params, $headers, $controll)
        {
            //$this->params = json_decode(json_encode($this->decodeUrlData($params)));
            $this->params = json_decode(json_encode($params));
            $this->body = json_decode(json_encode($body));
            $this->files = json_decode(json_encode($_FILES));
            $this->headers = json_decode(json_encode($headers));
            $this->controll = json_decode(json_encode($controll));

        }

       /* private function decodeUrlData($params){
            $newArray = array();
            foreach ($params as $key => $value) {
                $newArray[$key] = urldecode($value);
            }
            return $newArray;
        }*/
    }
