<?php

class Connection 
{
    public static $connection = false;

    public function __construct()
    {

    }

    public static function connect($config)
    {
        try 
        {
            if(!self::$connection)
            {
                $con = new PDO("mysql:host={$config['db']['server']};dbname={$config['db']['dbname']}", $config['db']['dbuser'], $config['db']['dbpass']);
                $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $con->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
                self::$connection = $con;
                return self::$connection;
            }
        }
        catch(\PDOException $e) 
        {
            echo $e->getMessage();
            exit;
        }
    }
}