<?php

namespace Webdriver\Remote\Connection;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Response
 * @todo Non implement yet
 *
 * @author jupeter
 */
class Response {
    
    public function __construct($fp, $code, $headers, $url)
    {
        $this->fp = $fp;
        $this->code = $code;
        $this->headers = $headers;
        $this->url = $url;
    }
    
    public function close()
    {
        
    }
}

?>
