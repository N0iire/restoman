<?php

class Detail_pesanan
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
     * Get all detail_pesanan from database
     * 
     * return $detail_pesanan
     */
    public function get_all()
    {
        $sql1 = "Select * from detail_pesanan";
        $result = $this->db->query($sql1);
        $detail_pesanan = $result->fetch_all(MYSQLI_ASSOC);
        return $detail_pesanan;
    }

    // Get count detail_pesanan from database
    // @return $detail_pesanan


    public function get_count()
    {
        $sql1 = "SELECT COUNT(*) as jml_detail_pesanan FROM detail_pesanan";
        $result = $this->db->query($sql1);
        $detail_pesanan = $result->fetch_assoc();
        return $detail_pesanan;
    }

    /**
     * @param $id_pesanan
     * 
     * @return $detail_pesanan
     */
    public function view($id_pesanan)
    {
        $sql1 = "SELECT a.id_pesanan, a.jumlah, a.sub_total, b.nama_menu FROM detail_pesanan a 
            INNER JOIN menu b ON a.id_menu = b.id_menu
            WHERE a.id_pesanan = '$id_pesanan'";
        $result = $this->db->query($sql1);
        $detail_pesanan = $result->fetch_all(MYSQLI_ASSOC);

        return $detail_pesanan;
    }

    /**
     * Store detail_pesanan to database 
     * @param $post
     * 
     * @return boolean
     */
    public function store($id_pesanan, $id_menu, $jumlah, $sub_total)
    {
        $sql2 = "INSERT INTO detail_pesanan
                     VALUES('$id_pesanan','$id_menu','$jumlah','$sub_total')";
        $result = mysqli_query($this->db, $sql2) or die(mysqli_connect_errno() . "Data cannot inserted");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
