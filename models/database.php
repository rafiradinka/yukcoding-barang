<?php 
class Database {
    private $host;
    private $user;
    private $pass;
    private $db;
    public $conn;

    function __construct($host, $user, $pass, $db) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;

        // Membuat koneksi
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        // Memeriksa koneksi
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }
}
?>