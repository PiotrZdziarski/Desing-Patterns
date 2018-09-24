<?php

namespace Singleton;

class Database
{

    public static $instance;

    /**
     * @return static
     */
    public static function getInstance()
    {
        if (!isset(Database::$instance))
            Database::$instance = new Database();

        return Database::$instance;
    }


    private function __construct()
    {
        //private
    }


    /**
     * @return string
     */
    public function query()
    {
        return "SELECT * FROM some_table";
    }
}

class DB{}



