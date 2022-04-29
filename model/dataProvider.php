<?php
class DataProvider {
    private static $localhost = "localhost";
    private static $username = "admin";
    private static $pass = "vf/5OT4Wi0.4A-mz";
    private static $db = "qlttn";
    // private static $connection = mysqli_connect(self::$localhost, self::$username, self::$pass, self::$db);

    public static function executeSQL($query) {
        $connection = mysqli_connect(self::$localhost, self::$username, self::$pass, self::$db);
        $resultSql = mysqli_query($connection, $query);
        return $resultSql;
    }

}
?>