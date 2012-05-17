<?php

namespace Webdriver\Remote;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author jupeter
 */
class Connection {
    
    protected $url;
    
    public function __construct($remoteServerAddress)
    {
        if(!$parsedUrl = parse_url($remoteServerAddress))
        {
            throw new Exception('Could not get host: ' . $remoteServerAddress);
        }
        
        $this->url = $remoteServerAddress;
        
        $this->commands = array(
            Command::$NEW_SESSION => array('POST', '/session'),
            Command::$NEW_SESSION => array('POST', '/session'),
            Command::$QUIT => array('DELETE', '/session/$sessionId'),
            Command::$GET_CURRENT_WINDOW_HANDLE => array('GET', '/session/$sessionId/window_handle'),
            Command::$GET_WINDOW_HANDLES => array('GET', '/session/$sessionId/window_handles'),
            Command::$GET => array('POST', '/session/$sessionId/url'),
            Command::$GO_FORWARD => array('POST', '/session/$sessionId/forward'),
            Command::$GO_BACK => array('POST', '/session/$sessionId/back'),
            Command::$REFRESH => array('POST', '/session/$sessionId/refresh'),
            Command::$EXECUTE_SCRIPT => array('POST', '/session/$sessionId/execute'),
            Command::$GET_CURRENT_URL => array('GET', '/session/$sessionId/url'),
            Command::$GET_TITLE => array('GET', '/session/$sessionId/title'),
            Command::$GET_PAGE_SOURCE => array('GET', '/session/$sessionId/source'),
            Command::$SCREENSHOT => array('GET', '/session/$sessionId/screenshot'),
            Command::$SET_BROWSER_VISIBLE => array('POST', '/session/$sessionId/visible'),
            Command::$IS_BROWSER_VISIBLE => array('GET', '/session/$sessionId/visible'),
            Command::$FIND_ELEMENT => array('POST', '/session/$sessionId/element'),
            Command::$FIND_ELEMENTS => array('POST', '/session/$sessionId/elements'),
            Command::$GET_ACTIVE_ELEMENT => 
                array('POST', '/session/$sessionId/element/active'),
            Command::$FIND_CHILD_ELEMENT => 
                array('POST', '/session/$sessionId/element/$id/element'),
            Command::$FIND_CHILD_ELEMENTS => 
                array('POST', '/session/$sessionId/element/$id/elements'),
            Command::$CLICK_ELEMENT => 
                array('POST', '/session/$sessionId/element/$id/click'),
            Command::$CLEAR_ELEMENT => 
                array('POST', '/session/$sessionId/element/$id/clear'),
            Command::$SUBMIT_ELEMENT => 
                array('POST', '/session/$sessionId/element/$id/submit'),
            Command::$GET_ELEMENT_TEXT => 
                array('GET', '/session/$sessionId/element/$id/text'),
            Command::$SEND_KEYS_TO_ELEMENT => 
                array('POST', '/session/$sessionId/element/$id/value'),
            Command::$SEND_KEYS_TO_ACTIVE_ELEMENT => 
                array('POST', '/session/$sessionId/keys'),
            Command::$UPLOAD_FILE => array('POST', "/session/$sessionId/file"),
            Command::$GET_ELEMENT_VALUE => 
                array('GET', '/session/$sessionId/element/$id/value'),
            Command::$GET_ELEMENT_TAG_NAME => 
                array('GET', '/session/$sessionId/element/$id/name'),
            Command::$IS_ELEMENT_SELECTED => 
                array('GET', '/session/$sessionId/element/$id/selected'),
            Command::$SET_ELEMENT_SELECTED => 
                array('POST', '/session/$sessionId/element/$id/selected'),
            Command::$TOGGLE_ELEMENT => 
                array('POST', '/session/$sessionId/element/$id/toggle'),
            Command::$IS_ELEMENT_ENABLED => 
                array('GET', '/session/$sessionId/element/$id/enabled'),
            Command::$IS_ELEMENT_DISPLAYED => 
                array('GET', '/session/$sessionId/element/$id/displayed'),
            Command::$HOVER_OVER_ELEMENT => 
                array('POST', '/session/$sessionId/element/$id/hover'),
            Command::$GET_ELEMENT_LOCATION => 
                array('GET', '/session/$sessionId/element/$id/location'),
            Command::$GET_ELEMENT_LOCATION_ONCE_SCROLLED_INTO_VIEW => 
                array('GET', '/session/$sessionId/element/$id/location_in_view'),
            Command::$GET_ELEMENT_SIZE => 
                array('GET', '/session/$sessionId/element/$id/size'),
            Command::$GET_ELEMENT_ATTRIBUTE => 
                array('GET', '/session/$sessionId/element/$id/attribute/$name'),
            Command::$ELEMENT_EQUALS => 
                array('GET', '/session/$sessionId/element/$id/equals/$other'),
            Command::$GET_ALL_COOKIES => array('GET', '/session/$sessionId/cookie'),
            Command::$ADD_COOKIE => array('POST', '/session/$sessionId/cookie'),
            Command::$DELETE_ALL_COOKIES => 
                array('DELETE', '/session/$sessionId/cookie'),
            Command::$DELETE_COOKIE => 
                array('DELETE', '/session/$sessionId/cookie/$name'),
            Command::$SWITCH_TO_FRAME => array('POST', '/session/$sessionId/frame'),
            Command::$SWITCH_TO_WINDOW => array('POST', '/session/$sessionId/window'),
            Command::$CLOSE => array('DELETE', '/session/$sessionId/window'),
            Command::$DRAG_ELEMENT => 
                array('POST', '/session/$sessionId/element/$id/drag'),
            Command::$GET_SPEED => array('GET', '/session/$sessionId/speed'),
            Command::$SET_SPEED => array('POST', '/session/$sessionId/speed'),
            Command::$GET_ELEMENT_VALUE_OF_CSS_PROPERTY => 
                array('GET',  '/session/$sessionId/element/$id/css/$propertyName'),
            Command::$IMPLICIT_WAIT => 
                array('POST', '/session/$sessionId/timeouts/implicit_wait'),
            Command::$EXECUTE_ASYNC_SCRIPT => array('POST','/session/$sessionId/execute_async'),
            Command::$SET_SCRIPT_TIMEOUT => 
                array('POST', '/session/$sessionId/timeouts/async_script'),
            Command::$GET_ELEMENT_VALUE_OF_CSS_PROPERTY => 
                array('GET', '/session/$sessionId/element/$id/css/$propertyName'),
            Command::$DISMISS_ALERT => 
                array('POST', '/session/$sessionId/dismiss_alert'),
            Command::$ACCEPT_ALERT => 
                array('POST', '/session/$sessionId/accept_alert'),
            Command::$SET_ALERT_VALUE => 
                array('POST', '/session/$sessionId/alert_text'),
            Command::$GET_ALERT_TEXT => 
                array('GET', '/session/$sessionId/alert_text'),
            Command::$CLICK => 
                array('POST', '/session/$sessionId/click'),
            Command::$DOUBLE_CLICK => 
                array('POST', '/session/$sessionId/doubleclick'),
            Command::$MOUSE_DOWN => 
                array('POST', '/session/$sessionId/buttondown'),
            Command::$MOUSE_UP => 
                array('POST', '/session/$sessionId/buttonup'),
            Command::$MOVE_TO => 
                array('POST', '/session/$sessionId/moveto'),
            Command::$GET_WINDOW_SIZE => 
                array('GET', '/session/$sessionId/window/$windowHandle/size'),
            Command::$SET_WINDOW_SIZE => 
                array('POST', '/session/$sessionId/window/$windowHandle/size'),
            Command::$GET_WINDOW_POSITION => 
                array('GET', '/session/$sessionId/window/$windowHandle/position'),
            Command::$SET_WINDOW_POSITION => 
                array('POST', '/session/$sessionId/window/$windowHandle/position'),
            Command::$MAXIMIZE_WINDOW => 
                array('POST', '/session/$sessionId/window/$windowHandle/maximize'),
            Command::$SET_SCREEN_ORIENTATION => 
                array('POST', '/session/$sessionId/orientation'),
            Command::$GET_SCREEN_ORIENTATION => 
                array('GET', '/session/$sessionId/orientation'),
           );
    }
    
    public function execute($command, $params)
    {
        if(!array_key_exists($command, $this->commands))
        {
            throw new Exception('Unrecognised command ' . $command);
        }
        $command_info = $this->commands[$command];
    }
}

?>
