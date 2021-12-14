<?php

abstract class BaseController
{
    protected $view;


    public static function checkLogged()
    {

        $userId = SessionHelper::checkLogged();

        $user = User::getUserById($userId);
        if (is_array($user)) {
            return true;
        }

        die('Access denied');
    }



    protected function redirect(string $uri)
    {
        header("Location: {$uri}");
    }

    protected function checkCSRF()
    {

        $abosluteUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $tags = get_meta_tags($abosluteUrl);
        
        if($tags['csrf'] != $_SESSION['csrf_token']) {
            unset($$_SESSION['csrf_token']);
            die('CSRF token validation failed');
        }
    }
}
