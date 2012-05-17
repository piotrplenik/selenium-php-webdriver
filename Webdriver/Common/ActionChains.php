<?php

namespace Webdriver\Common;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

use \Webdriver\Remote\Command;
use \Webdriver\Common\Keys;

/**
 * Description of ActionChains
 *
 * @author jupeter
 */
class ActionChains {
    
    /**
     * WebDriver instance
     * @var WebDriver
     */
    protected $driver;
    protected $actions = array();
    
    public function __construct($driver)
    {
        $this->driver = $driver;
    }
    
    public function click($onElement = null)
    {
        if($onElement != null)
        {
            $this->moveToElement($onElement);
        }
        
        $this->actions[] = $this->driver->execute(Command::$CLICK, array('button' => 0));
        
        return $this;
    }
    
    public function clickAndHold($onElement = null)
    {
        if($onElement != null)
        {
            $this->moveToElement($onElement);
        }
        
        $this->actions[] = $this->driver->execute(Command::$MOUSE_DOWN, array());
        
        return $this;
    }
    
    public function contextClick($onElement = null)
    {
        if($onElement != null)
        {
            $this->moveToElement($onElement);
        }
        
        $this->actions[] = $this->driver->execute(Command::$CLICK, array('button' => 2));
        
        return $this;
    }
    
    public function doubleClick($onElement = null)
    {
        if($onElement != null)
        {
            $this->moveToElement($onElement);
        }
        
        $this->actions[] = $this->driver->execute(Command::$DOUBLE_CLICK, array());
        
        return $this;
    }
    
    public function dragAndDrop($source, $target)
    {
        $this->clickAndHold($source);
        $this->release($target);
        return $this;
    }
    
    public function dragAndDropByOffset($source, $xoffset, $yoffset)
    {
        $this->clickAndHold($source);
        $this->moveByOffset($xoffset, $yoffset);
        $this->release($source);
        return $this;
    }
    
    public function keyDown($value, $element = null)
    {
        $typing = array();
        foreach($value as $val)
        {
            if($val instanceof Keys)
            {
                $typing[] = $val;
            }
            else
            {
                for($i=0;$i<strlen($val);$i++)
                {
                    $typing[] = $val[$i];
                }
            }
        }
        
        if($element != null)
        {
            $this->actions[] = $this->driver->execute(Command::$SEND_KEYS_TO_ACTIVE_ELEMENT, 
                    array('value' => $typing));
        }
        
        return $this;
    }
    
    public function keyUp($value, $element = null)
    {
        $this->keyDown($value, $element);
        return $this;
    }
    
    public function moveByOffset($xoffset, $yoffset)
    {
        $this->actions[] = $this->driver->execute(Command::$MOVE_TO, 
                    array('xoffset' => $xoffset, 'yoffset' => $yoffset));
        return $this;
    }
    
    public function moveToElement($toElement)
    {
        $this->actions[] = $this->driver->execute(Command::$MOVE_TO, 
                    array('element' => $toElement));
        return $this;
    }
    
    public function moveToElementWithOffset($toElement, $xoffset, $yoffset)
    {
        $this->actions[] = $this->driver->execute(Command::$MOVE_TO, 
                    array('element' => $toElement,
                        'xoffset' => $xoffset, 
                        'yoffset' => $yoffset));
        return $this;
    }
    
    public function release($onElement)
    {
        $this->moveToElement($onElement);
        
        $this->actions[] = $this->driver->execute(Command::$MOUSE_UP, array());
        return $this;
    }
    
    public function sendKeys($keysToSend)
    {
        $this->actions[] = $this->driver->switchToActiveElement()->sendKeys($keysToSend);
        return $this;
    }

    public function sendKeysToElement($element, $keysToSend)
    {
        $this->actions[] = $element->sendKeys($keysToSend);
        return $this;
    }
}

?>
