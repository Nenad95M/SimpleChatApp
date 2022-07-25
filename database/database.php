<?php
//klasa cija je uloga da komunicira sa bazom
class Database
{
    private static $host = "localhost";
    private static $username = "Nenad";
    private static $password = "NenadMarkovic!1";
    private static $conn;

    //metoda za konekciju sa bazom,konekciju propustam kroz try catch blok
    public static function getConnection()
    {
        self::$conn = null;
        try {
            self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=chat", self::$username, self::$password);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return self::$conn;
    }

    public static function disconnect()
    {
        self::$conn = null;
    }
}
