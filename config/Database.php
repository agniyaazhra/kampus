<?php
class Database
{
    private $host = "192.168.1.3";
    private $db_name = "kampus";
    private $username = "agniya";
    private $password = "060600";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            http_response_code(500);
            die(json_encode(["message" => "Koneksi Gagal: " . $exception->getMessage()]));
        }

        return $this->conn;
    }
}
