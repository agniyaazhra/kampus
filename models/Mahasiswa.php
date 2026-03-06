<?php
class Mahasiswa
{
    private $conn;
    private $table_name = "mahasiswa";

    public $id;
    public $nama;
    public $npm;
    public $jurusan;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        // Perbaikan: Menambahkan spasi setelah FROM
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
        // Perbaikan: Menambahkan spasi setelah INTO
        $query = "INSERT INTO " . $this->table_name . " (npm, nama, jurusan) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute([$this->npm, $this->nama, $this->jurusan])) {
            return true;
        }
        return false;
    }

    public function update()
    {
        // Perbaikan: Menambahkan spasi setelah UPDATE dan SET
        $query = "UPDATE " . $this->table_name . " SET npm = ?, nama = ?, jurusan = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute([$this->npm, $this->nama, $this->jurusan, $this->id])) {
            return true;
        }
        return false;
    }

    public function delete()
    {
        // Perbaikan: Menambahkan spasi setelah FROM
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute([$this->id])) {
            return true;
        }
        return false;
    }
}
