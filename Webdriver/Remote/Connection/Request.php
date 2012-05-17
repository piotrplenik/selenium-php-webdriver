<?php

namespace Webdriver\Remote\Connection;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Request (curl implementation)
 *
 * @author jupeter
 */
class Request {

    protected $curl;
    protected $header = array();
    protected $method = null;
    protected $params = '';

    /**
     * Support to all HTTP request types.
     */
    public function __construct($url, $data = null, $method = null) {
        if ($method = null) {
            $method = (count($data) > 0) ? 'POST' : 'GET';
        } elseif ($method != 'POST' and $method != 'PUT') {
            $data = null;
        }

        $this->method = $method;
        
        $this->curl = curl_init($url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        
        if (count($data) > 0)
        {
            $this->params = json_encode($data);
        }
    }
    
    /**
     * Returns the HTTP method used by this request.
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
    
    public function addHeader($key, $value)
    {
        $header[$key] = $value;
    }

    public function execute()
    {
        $attributes = array();
        
        foreach($this->header as $key => $value)
        {
            $attributes = sprintf("%s = %s", $key, $value);
        }
        
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $attributes);
        
        if($this->method == 'POST')
        {
            curl_setopt($this->curl, CURLOPT_POST, true);
            if($params != '')
            {
                curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->params);
            }
        }
        elseif($this->method == 'DELETE')
        {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        }
        
        return curl_exec($this->curl);
    }
    
    public function getInfo()
    {
        return curl_getinfo($this->curl);
    }
    
    /**
     * Ger error message
     * 
     * @return <string|FALSE> Error message or FALSE
     */
    public function getError()
    {
         return curl_error($this->curl);
    }
    
    public function close()
    {
        curl_close($this->curl);
    }

}

?>
