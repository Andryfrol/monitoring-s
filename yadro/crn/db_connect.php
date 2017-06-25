<?php
class database  {
    var $host = 'localhost';
    var $user = 'ce18538_monitor';
    var $pass = '5440';
    var $db = 'ce18538_monitor';
    var $myconn;
    var $port = 3305;

    function connect() {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db, $this->port);
        mysqli_set_charset($con, "utf8");
        if (!$con) {
            die('Could not connect to database!');
        } else {
            $this->myconn = $con;
            // echo 'Connection established!<br/>';
        }
        return $this->myconn;
    }
}

function clean($q) {
    $clear = trim($q);
    $clear = htmlspecialchars($clear);
    $clear = mysql_escape_string($clear);
    return $clear;
}
