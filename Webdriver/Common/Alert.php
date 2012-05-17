<?php

namespace Webdriver\Common;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

use \Webdriver\Remote\Command;

/**
 * Description of Alert
 *
 * @author jupeter
 */
class Alert {

    /**
     * WebDriver instance
     * @var WebDriver
     */
    protected $driver;

    public function __construct($driver)
    {
        $this->driver = $driver;
    }
    
    public function text()
    {
        $result = $this->driver->execute(Command::$GET_ALERT_TEXT);
        return $result["value"];
    }
    
    public function dismiss()
    {
        $this->driver->execute(Command::$DISMISS_ALERT);
    }
    
    public function accept()
    {
        $this->driver->execute(Command::$ACCEPT_ALERT);
    }
    
    public function sendKeys($keysToSend)
    {
        $this->driver->execute(Command::$SET_ALERT_VALUE, array('text' => $keysToSend));
    }
}

?>
