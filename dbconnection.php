<?php

Class DBManager {

const hostname = "localhost";
const mysql_login = "activeap_wp1";
const mysql_password = "M#jhCx&Csq69)~5";
const database = "srilaprabhupadalila";
private $db;

public function getConnection() {
    
$this->db = mysql_connect(self::hostname, self::mysql_login, self::mysql_password);
if (! $this->db) {
die("Can't connect to mysql.");
} else {
if (!(mysql_select_db(self::database, $this->db))) {
die("Can't connect to db.");
}
}
}

public function closeConnection() {
mysql_close($this->db);
}

}
?>