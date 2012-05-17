<?php

namespace Webdriver\Common\Exceptions;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exceptions
 *
 * @author jupeter
 */
class Exceptions extends Exception {
    
    protected $message;
    protected $screen;
    
    public function __construct($message = "", $screen = null)
    {
        $this->message = $message;
        $this->screen = $screen;
    }
    
    public function __toString()
    {
        $exception_message = print_r("Message: %s ", $this->message);
        if($this->screen != null)
        {
            $exception_message .= "; Screenshot: available via screen ";
        }
        
        return $exception_message;
    }
}

class ErrorInResponseException extends Exceptions {
    
    protected $response;
    
    public function __construct($response, $message)
    {
        $this->response = $response;
        parent::__construct($message);
    }
}

class InvalidSwitchToTargetException extends Exceptions {
    //The frame or window target to be switched doesn't exist.
}

class NoSuchFrameException extends InvalidSwitchToTargetException {
}

class NoSuchWindowException extends InvalidSwitchToTargetException {
}

class NoSuchElementException extends Exceptions {
}

class NoSuchAttributeException extends Exceptions {
}

class StaleElementReferenceException extends Exceptions {
}

class InvalidElementStateException extends Exceptions {
}

class NoAlertPresentException extends Exceptions {
}

class ElementNotVisibleException extends InvalidElementStateException {
}

class ElementNotSelectableException extends InvalidElementStateException {
}

class InvalidCookieDomainException extends Exceptions {
}

class UnableToSetCookieException extends Exceptions {
}

class RemoteDriverServerException extends Exceptions {
}

class TimeoutException extends Exceptions {
}

class UnexpectedTagNameException extends Exceptions {
}

class InvalidSelectiorException extends NoSuchElementException {
}

class ImeNotAvailableException extends Exceptions {
}

class ImeActivationFailedException extends Exceptions {
}


?>
