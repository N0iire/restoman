<?php

class Pembayaran
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
     * Store pembayaran to the database
     * 
     * @return boolean
     */
    public function store()
    {
        $id_pesanan = $this->db->escape_string($_POST['id_pesanan']);
        $id_pegawai = $this->db->escape_string($_POST['id_pegawai']);
        $total_transaksi = $this->db->escape_string($_POST['total_transaksi']);
        $tgl = date('Y-m-d');

        $sql = "INSERT INTO pembayaran VALUES(
            '$id_pesanan',
            '$id_pegawai',
            '$total_transaksi',
            '$tgl'
        )";

        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");

        return $result;
    }

    /**
     * Get view all data pembayaran
     * 
     * @return $bayar
     */
    public function get_all_bayar()
    {
        $sql1 = "SELECT ps.id_pesanan, ps.atas_nama, ps.id_meja, pb.total_transaksi, pb.tgl_transaksi
                 FROM pembayaran pb inner join pesanan ps
                 on pb.id_pesanan = ps.id_pesanan
                 WHERE MONTH(pb.tgl_transaksi) = MONTH(now())
                 order by pb.id_pesanan asc";
        $result = $this->db->query($sql1);
        $pembayaran = $result->fetch_all(MYSQLI_ASSOC);

        return $pembayaran;
    }

    /**
     * @param $id_pesanan
     * 
     * @return $tgl_transaksi
     */
    public function view($id_pesanan)
    {
        $sql2 = "SELECT YEAR(tgl_transaksi) AS thn, DATE_FORMAT(tgl_transaksi, '%m') AS bln, DATE_FORMAT(tgl_transaksi, '%d') AS tgl FROM pembayaran 
            WHERE id_pesanan = '$id_pesanan'";
        $result = $this->db->query($sql2);
        $pembayaran = $result->fetch_all(MYSQLI_ASSOC);

        return $pembayaran;
    }

    // Get count menu from database
    // @return $menu1[]


    public function get_sum()
    {
        $sql3 = "SELECT sum(total_transaksi) as pendapatan, count(*) as jml_transaksi FROM pembayaran";
        $result = $this->db->query($sql3);
        $pembayaran = $result->fetch_assoc();
        return $pembayaran;
    }
}
