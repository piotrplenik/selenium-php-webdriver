<?php

namespace Webdriver\Remote;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

use Webdriver\Remote\Connection;
use Webdriver\Common\Exceptions as WebDriverException;
use Webdriver\Common\By;
use Webdriver\Common\Alert;
use Webdriver\Remote\Error\ErrorHandler;

/**
 * Description of Webdriver
 *
 * @author jupeter
 */
class Webdriver {
    protected $commandExecutor;
    protected $sessionId = null;
    protected $capabilities = array();
    protected $errorHandler = ErrorHandler;
    
    
    public function __construct($commandExecutor='http://127.0.0.1:4444/wd/hub',
            $desiredCapabilities = null, $browserProfile = null)
    {
        if($desiredCapabilities == null)
        {
            throw new WebDriverException("Desired Capabilities can't be null");
        }
        if(!is_array($desiredCapabilities))
        {
            throw new WebDriverException("Desired Capabilities must be Array");
        }
        
        $this->commandExecutor = $commandExecutor;
        
        if(is_string($this->commandExecutor))
        {
            $this->commandExecutor = new Connection($this->commandExecutor);
        }
        
        $this->startClient();
        $this->startSession($desiredCapabilities, $browserProfile);
    }
    
    public function getName()
    {
        if(array_key_exists('browserName', $this->capabilities))
        {
            return $this->capabilities['browserName'];
        }
        
        throw new Exception('browserName not specified in session capabilities');
    }
    
    public function startClient()
    {
        
    }
    
    public function stopClient()
    {
        
    }
    
    //@todo
}

?>
