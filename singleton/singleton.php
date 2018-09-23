<?php

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

$db = Database::getInstance();
$db2 = Database::getInstance();
$db3 = Database::getInstance();
echo $db->query();

echo var_dump($db);
echo var_dump($db2);
echo var_dump($db3);

$dbPublic = new DB();
$dbPublic2 = new DB();
$dbPublic3 = new DB();

echo var_dump($dbPublic);
echo var_dump($dbPublic2);
echo var_dump($dbPublic3);



