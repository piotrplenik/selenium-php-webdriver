<?php

namespace Webdriver\Common;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DesiredCapabilities
 *
 * @author jupeter
 */
class DesiredCapabilities {

      static $FIREFOX = array( "browserName" => "firefox",
                "version" => "",
                "platform" => "ANY",
                "javascriptEnabled" => True );

      static $INTERNETEXPLORER = array( "browserName" => "internet explorer",
                        "version" => "",
                        "platform" => "WINDOWS",
                        "javascriptEnabled" => True );

      static $CHROME = array("browserName" => "chrome",
                        "version" => "",
                        "platform" => "ANY",
                        "javascriptEnabled" => True );
      static $OPERA = array("browserName" => "opera",
                        "version" => "",
                        "platform" => "ANY");

      static $HTMLUNIT = array("browserName" => "htmlunit",
                        "version" => "",
                        "platform" => "ANY" );
                        
      static $HTMLUNITWITHJS = array("browserName" => "htmlunit",
                        "version" => "firefox",
                        "platform" => "ANY",
                        "javascriptEnabled" => True );

      static $IPHONE = array("browserName" => "iPhone",
                        "version" => "",
                        "platform" => "MAC",
                        "javascriptEnabled" => True );
    
      static $IPAD = array("browserName" => "iPad",
                        "version" => "",
                        "platform" => "MAC",
                        "javascriptEnabled" => True );
    
      static $ANDROID = array("browserName" => "android",
                        "version" => "",
                        "platform" => "ANDROID",
                        "javascriptEnabled" => True );
    
}

?>
