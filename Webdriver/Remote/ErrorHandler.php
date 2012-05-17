<?php

namespace Webdriver\Remote\Error;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

use Webdriver\Common\Exceptions\ElementNotSelectableException;
use Webdriver\Common\Exceptions\ElementNotVisibleException;
use Webdriver\Common\Exceptions\InvalidCookieDomainException;
use Webdriver\Common\Exceptions\InvalidElementStateException;
use Webdriver\Common\Exceptions\InvalidSelectiorException;
use Webdriver\Common\Exceptions\ImeNotAvailableException;
use Webdriver\Common\Exceptions\ImeActivationFailedException;
use Webdriver\Common\Exceptions\NoSuchElementException;
use Webdriver\Common\Exceptions\NoSuchFrameException;
use Webdriver\Common\Exceptions\NoSuchWindowException;
use Webdriver\Common\Exceptions\StaleElementReferenceException;
use Webdriver\Common\Exceptions\UnableToSetCookieException;
use Webdriver\Common\Exceptions\NoAlertPresentException;
use Webdriver\Common\Exceptions\ErrorInResponseException;
use Webdriver\Common\Exceptions\TimeoutException;
use Webdriver\Common\Exceptions\WebDriverException;

class ErrorCode {
     # Keep in sync with org.openqa.selenium.remote.ErrorCodes and errorcodes.h
     static $SUCCESS = 0;
     static $NO_SUCH_ELEMENT = 7;
     static $NO_SUCH_FRAME = 8;
     static $UNKNOWN_COMMAND = 9;
     static $STALE_ELEMENT_REFERENCE = 10;
     static $ELEMENT_NOT_VISIBLE = 11;
     static $INVALID_ELEMENT_STATE = 12;
     static $UNKNOWN_ERROR = 13;
     static $ELEMENT_IS_NOT_SELECTABLE = 15;
     static $JAVASCRIPT_ERROR = 17;
     static $XPATH_LOOKUP_ERROR = 19;
     static $TIMEOUT = 21;
     static $NO_SUCH_WINDOW = 23;
     static $INVALID_COOKIE_DOMAIN = 24;
     static $UNABLE_TO_SET_COOKIE = 25;
     static $UNEXPECTED_ALERT_OPEN = 26;
     static $NO_ALERT_OPEN = 27;
     static $SCRIPT_TIMEOUT = 28;
     static $INVALID_ELEMENT_COORDINATES = 29;
     static $IME_NOT_AVAILABLE = 30;
     static $IME_ENGINE_ACTIVATION_FAILED = 31;
     static $INVALID_SELECTOR = 32;
     static $MOVE_TARGET_OUT_OF_BOUNDS = 34;
     static $INVALID_XPATH_SELECTOR = 51;
     static $INVALID_XPATH_SELECTOR_RETURN_TYPER = 52;
     static $METHOD_NOT_ALLOWED = 405;
}

/**
 * Description of ErrorHandler
 *
 * @author jupeter
 */
class ErrorHandler {
     public function checkResponse($response) {
        $status = $response['status'];
        if($status == ErrorCode::$SUCCESS) return;
        
        $$exception_class = 'ErrorInResponseException';
        
        if($status == ErrorCode::$NO_SUCH_ELEMENT)
        {
            $exception_class = 'NoSuchElementException';
        }
        elseif ($status == ErrorCode::$NO_SUCH_FRAME)
        {
            $exception_class = 'NoSuchFrameException';
        }
        elseif ($status == ErrorCode::$NO_SUCH_WINDOW)
        {
            $exception_class = 'NoSuchWindowException';
        }
        elseif ($status == ErrorCode::$STALE_ELEMENT_REFERENCE)
        {
            $exception_class = 'StaleElementReferenceException';
        }
        elseif ($status == ErrorCode::$ELEMENT_NOT_VISIBLE)
        {
            $exception_class = 'ElementNotVisibleException';
        }
        elseif ($status == ErrorCode::$INVALID_ELEMENT_STATE)
        {
            $exception_class = 'WebDriverException';
        }
        elseif ($status == ErrorCode::$INVALID_SELECTOR 
                or $status == ErrorCode::$INVALID_XPATH_SELECTOR 
                or $status == ErrorCode::$INVALID_XPATH_SELECTOR_RETURN_TYPER)
        {
            $exception_class = 'InvalidSelectiorException';
        }
        elseif ($status == ErrorCode::$ELEMENT_IS_NOT_SELECTABLE)
        {
            $exception_class = 'ElementNotSelectableException';
        }
        elseif ($status == ErrorCode::$INVALID_COOKIE_DOMAIN)
        {
            $exception_class = 'WebDriverException';
        }
        elseif ($status == ErrorCode::$UNABLE_TO_SET_COOKIE)
        {
            $exception_class = 'WebDriverException';
        }
        elseif ($status == ErrorCode::$TIMEOUT)
        {
            $exception_class = 'TimeoutException';
        }
        elseif ($status == ErrorCode::$SCRIPT_TIMEOUT)
        {
            $exception_class = 'TimeoutException';
        }
        elseif ($status == ErrorCode::$UNKNOWN_ERROR)
        {
            $exception_class = 'WebDriverException';
        }
        elseif ($status == ErrorCode::$NO_ALERT_OPEN)
        {
            $exception_class = 'NoAlertPresentException';
        }
        elseif ($status == ErrorCode::$IME_NOT_AVAILABLE)
        {
            $exception_class = 'ImeNotAvailableException';
        }
        elseif ($status == ErrorCode::$IME_ENGINE_ACTIVATION_FAILED)
        {
            $exception_class = 'ImeActivationFailedException';
        }
        else
        {
            $exception_class = 'WebDriverException';
        }
        
        
        $value = $response['value'];
        if(is_string($value))
        {
            if($exception_class == 'ErrorInResponseException')
            {
                throw new $exception_class($response, $value);
            }
            throw new $exception_class($value);
        }

        $message = '';
        if(array_key_exists('message', $value))
        {
            $message = $value['message'];
        }
        $screen = null;
        if(array_key_exists('screen', $value))
        {
            $screen = $value['screen'];
        }
        
        if($exception_class == 'ErrorInResponseException')
        {
            throw new $exception_class($response, $message);
        }
        
        throw new $exception_class($message, $screen);
     }
     
     public function getValueOrDefault($obj, $key, $default)
     {
         return (array_key_exists($key, $obj)) ? $obj['key'] : $default;
     }
}

?>
