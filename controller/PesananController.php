<?php

class Pesanan
{
    public $db;

    /**
     * Connection
     * 
     * Need to include model/db_config.php
     * When using this controller 
     */
    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }

    /**
     * Store pesanan to database 
     * 
     * @param $post
     * @return boolean
     */
    public function store()
    {
        $id_pegawai = $this->db->escape_string($_POST['id_pegawai']);
        $id_meja = $this->db->escape_string($_POST['id_meja']);
        $atas_nama = $this->db->escape_string($_POST['atas_nama']);

        $sql = "INSERT INTO pesanan(`id_pegawai`, `id_meja`, `atas_nama`)
                VALUES(
                    '$id_pegawai',
                    '$id_meja',
                    '$atas_nama'
                )";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");

        return $result;
    }

    /**
     * Get all data pesanan from database
     * 
     * @return $data
     */
    public function get_all()
    {
        $sql = "SELECT * FROM pesanan";
        $result = $this->db->query($sql);
        $pesanan = $result->fetch_all(MYSQLI_ASSOC);

        return $pesanan;
    }

    /**
     * Update data pesanan from database
     * 
     * @param $id
     * @return boolean
     */
    public function update($id_before)
    {
        $id_pegawai = $this->db->escape_string($_POST['id_pegawai']);
        $id_meja = $this->db->escape_string($_POST['id_meja']);
        $atas_nama = $this->db->escape_string($_POST['atas_nama']);

        $sql = "UPDATE pesanan 
                SET 
                    id_pegawai = '$id_pegawai',
                    id_meja = '$id_meja',
                    atas_nama = '$atas_nama'
                WHERE id_pesanan = '$id_before'
                ";
        $result = $this->db->query($sql);

        return $result;
    }

    /**
     * Delete pesanan
     * 
     * @param $id
     * @return boolean
     */
    public function destroy($id)
    {
        $sql = "DELETE FROM pesanan WHERE id_pesanan = '$id'";
        $query = $this->db->query($sql);
        $result = $query;

        return $result;
    }
}
