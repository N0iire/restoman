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
        $id_pegawai = $_SESSION['id'];
        $id_meja = $this->db->escape_string($_POST['id_meja']);
        $atas_nama = $this->db->escape_string($_POST['pembeli']);
        $status = "N";

        $sql = "INSERT INTO pesanan(`id_pegawai`, `id_meja`, `atas_nama`, `status_pembayaran`)
                VALUES(
                    '$id_pegawai',
                    '$id_meja',
                    '$atas_nama',
                    '$status'
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

    /**
     * Get pesanan with inner join
     * 
     * @return $data
     */
    public function get_pesanan()
    {
        $sql = "SELECT a.id_pesanan, b.atas_nama, b.id_meja, sum(a.sub_total) as total FROM detail_pesanan a 
                INNER JOIN pesanan b ON a.id_pesanan = b.id_pesanan 
                WHERE b.status_pembayaran = 'N' GROUP BY a.id_pesanan ";
        $query = $this->db->query($sql);
        $result = $query->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    /**
     * Update status pembayaran
     * 
     * 
     */
    public function statusY($id)
    {
        $status_pembayaran = "Y";
        $sql = "UPDATE pesanan SET status_pembayaran = '$status_pembayaran' WHERE id_pesanan = '$id'";
        $result = $this->db->query($sql);

        return $result;
    }
}
