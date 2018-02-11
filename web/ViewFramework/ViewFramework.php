<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewFramework
 *
 * @author gydo194
 */

defined("VIEW_404_PAGE_NAME") || define("VIEW_404_PAGE_NAME","404");
defined("VIEW_UNAUTH_PAGE_NAME") || define("VIEW_UNAUTH_PAGE_NAME","unauth");
defined("VIEW_LOGIN_PAGE_NAME") || define("VIEW_LOGIN_PAGE_NAME","login");


class ViewFramework {

    //put your code here
    private static $pages = array();

    public static function addPage(string $name, Action $page) {
        self::$pages[$name] = $page;
    }

    public static function getPage(string $name) {
        return self::$pages[$name];
    }

    public static function hasPage(string $name) {
        return array_key_exists($name, self::$pages);
    }

    /*
      public static function render(string $name) {
      if(self::hasPage($name)) {
      try {
      self::getPage($name)->invoke();
      } catch (PageRenderException $ex) {
      error_log("ViewFramework::render(): caught PageRenderException.");
      return false;
      }
      } else {
      echo "page does not exist";
      }
      }
     */

    private static function render(string $name) {
        try {
            self::getPage($name)->invoke();
        } catch (PageRenderException $ex) {
            error_log("ViewFramework::render(): caught PageRenderException.");
            return false;
        } catch(AccessViolationException $ae) {
            self::handleUnauthorised();
        }
        return true;
    }
   
    
    

    public static function renderPage(string $page) {
        if(self::hasPage($page)) {
            //self::getPage($page)->invoke();
            self::render($page);
        } else {
            self::renderNotFoundPage();
        }
    }
    
    
    
    private static function handleUnauthorised() {
       // echo "handleUnauthorised():".UserController::isLoggedIn();
        if(UserController::isLoggedIn()) { //the only line in this file depending on another file
            self::renderUnauthorisedPage();
        } else {
            if(!session_id()) {
                //no session mode; don't say anything
                return;
            }
            self::renderLoginPage();
        }
    }
    
    
    
    
    
    

    private static function renderNotFoundPage() {
        if (self::hasPage(VIEW_404_PAGE_NAME)) {
            self::render(VIEW_404_PAGE_NAME);
        }
        else {
            echo "404";
        }
    }
    
    
     private static function renderUnauthorisedPage() {
        if (self::hasPage(VIEW_UNAUTH_PAGE_NAME)) {
            self::render(VIEW_UNAUTH_PAGE_NAME);
        }
        else {
            echo "Unauthorised";
        }
    }
    
     private static function renderLoginPage() {
        if (self::hasPage(VIEW_LOGIN_PAGE_NAME)) {
            self::render(VIEW_LOGIN_PAGE_NAME);
        }
        else {
            echo "Please log in.";
        }
    }

}
