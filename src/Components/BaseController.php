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
}
