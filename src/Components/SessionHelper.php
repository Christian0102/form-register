<?php

/**
 * 
 */


class SessionHelper
{

    /**
     * check when  User is Guest 
     *
     * @return boolean
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * @return array
     */

    public static function checkLogged()
    {

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /home/login");
    }
   /**
    * save userID to session
    *
    * @param integer $userId
    * @return void
    */
    public static function auth(int $userId)
    {

        $_SESSION['user'] = $userId;
    }

    /**
     * Set Flash Message 
     *
     * @param [type] $message
     * @return void
     */

    public static function setFlashMessage(string $message)
    {
        $_SESSION['flash'] = $message;
    }

    /**
     * delete flash message from session
     *
     * @return void
     */
    private static function deleteFlashMessage()
    {
        if (isset($_SESSION['flash'])) {
            unset($_SESSION['flash']);
            return true;
        }
        return false;
    }

    /**
     * rendering Flash Message
     *
     * @return void
     */
    public static function getFlashMessage()
    {
        echo $_SESSION['flash'];
        self::deleteFlashMessage();
        session_destroy();
    }
}
