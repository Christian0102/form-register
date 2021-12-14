<?php
/*  DB connection*/

class Db
{
    /**
     * Undocumented function
     *
     * @return instance of PDO
     */
    public static function getConnection()
    {
        /* Connect params file */
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        /*Init Connection*/
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        try {
            $db = new PDO($dsn, $params['user'], $params['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION);
            /*Set Encoding */
            $db->exec("set names utf8");

            return $db;
        } catch (PDOException $Exception) {
            throw new Exception($Exception->getMessage(), 500);
        }
    }
}
