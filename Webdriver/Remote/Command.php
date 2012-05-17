<?php

namespace Webdriver\Remote;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Command
 *
 * @author jupeter
 */
class Command {
    
    # Keep in sync with org.openqa.selenium.remote.DriverCommand
    
    static $NEW_SESSION = "newSession";
    static $DELETE_SESSION = "deleteSession";
    static $CLOSE = "close";
    static $QUIT = "quit";
    static $GET = "get";
    static $GO_BACK = "goBack";
    static $GO_FORWARD = "goForward";
    static $REFRESH = "refresh";
    static $ADD_COOKIE = "addCookie";
    static $GET_COOKIE = "getCookie";
    static $GET_ALL_COOKIES = "getCookies";
    static $DELETE_COOKIE = "deleteCookie";
    static $DELETE_ALL_COOKIES = "deleteAllCookies";
    static $FIND_ELEMENT = "findElement";
    static $FIND_ELEMENTS = "findElements";
    static $FIND_CHILD_ELEMENT = "findChildElement";
    static $FIND_CHILD_ELEMENTS = "findChildElements";
    static $CLEAR_ELEMENT = "clearElement";
    static $CLICK_ELEMENT = "clickElement";
    static $HOVER_OVER_ELEMENT = "hoverOverElement";
    static $SEND_KEYS_TO_ELEMENT = "sendKeysToElement";
    static $SEND_KEYS_TO_ACTIVE_ELEMENT = "sendKeysToActiveElement";
    static $SUBMIT_ELEMENT = "submitElement";
    static $UPLOAD_FILE = "uploadFile";
    static $TOGGLE_ELEMENT = "toggleElement";
    static $GET_CURRENT_WINDOW_HANDLE = "getCurrentWindowHandle";
    static $GET_WINDOW_HANDLES = "getWindowHandles";
    static $GET_WINDOW_SIZE = "getWindowSize";
    static $GET_WINDOW_POSITION = "getWindowPosition";
    static $SET_WINDOW_SIZE = "setWindowSize";
    static $SET_WINDOW_POSITION = "setWindowPosition";
    static $SWITCH_TO_WINDOW = "switchToWindow";
    static $SWITCH_TO_FRAME = "switchToFrame";
    static $GET_ACTIVE_ELEMENT = "getActiveElement";
    static $GET_CURRENT_URL = "getCurrentUrl";
    static $GET_PAGE_SOURCE = "getPageSource";
    static $GET_TITLE = "getTitle";
    static $EXECUTE_SCRIPT = "executeScript";
    static $GET_SPEED = "getSpeed";
    static $SET_SPEED = "setSpeed";
    static $SET_BROWSER_VISIBLE = "setBrowserVisible";
    static $IS_BROWSER_VISIBLE = "isBrowserVisible";
    static $GET_ELEMENT_TEXT = "getElementText";
    static $GET_ELEMENT_VALUE = "getElementValue";
    static $GET_ELEMENT_TAG_NAME = "getElementTagName";
    static $SET_ELEMENT_SELECTED = "setElementSelected";
    static $DRAG_ELEMENT = "dragElement";
    static $IS_ELEMENT_SELECTED = "isElementSelected";
    static $IS_ELEMENT_ENABLED = "isElementEnabled";
    static $IS_ELEMENT_DISPLAYED = "isElementDisplayed";
    static $GET_ELEMENT_LOCATION = "getElementLocation";
    static $GET_ELEMENT_LOCATION_ONCE_SCROLLED_INTO_VIEW = array("getElementLocationOnceScrolledIntoView");
    static $GET_ELEMENT_SIZE = "getElementSize";
    static $GET_ELEMENT_ATTRIBUTE = "getElementAttribute";
    static $GET_ELEMENT_VALUE_OF_CSS_PROPERTY = "getElementValueOfCssProperty";
    static $ELEMENT_EQUALS = "elementEquals";
    static $SCREENSHOT = "screenshot";
    static $IMPLICIT_WAIT = "implicitlyWait";
    static $EXECUTE_ASYNC_SCRIPT = "executeAsyncScript";
    static $SET_SCRIPT_TIMEOUT = "setScriptTimeout";
    static $MAXIMIZE_WINDOW = "windowMaximize";

    # Alerts
    static $DISMISS_ALERT = "dismissAlert";
    static $ACCEPT_ALERT = "acceptAlert";
    static $SET_ALERT_VALUE = "setAlertValue";
    static $GET_ALERT_TEXT = "getAlertText";

    # Advanced user interactions
    static $CLICK = "mouseClick";
    static $DOUBLE_CLICK = "mouseDoubleClick";
    static $MOUSE_DOWN = "mouseButtonDown";
    static $MOUSE_UP = "mouseButtonUp";
    static $MOVE_TO = "mouseMoveTo";

    # Screen Orientation
    static $SET_SCREEN_ORIENTATION = "setScreenOrientation";
}

?>
