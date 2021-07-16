<?php

class Menu
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
     * Get all menu from database
     * 
     * return $menu
     */
    public function get_all()
    {
        $sql1 = "Select * from menu";
        $result = $this->db->query($sql1);
        $menu = $result-> fetch_all(MYSQLI_ASSOC);
        return $menu;
    }
    

    // Get Unaccepted menus
    //return $menu_unacc[] 
    public function unacc()
    {
        $sql = "Select * from menu where persetujuan = 'N'";
        $result = $this->db->query($sql1);
        $menu_unacc = $result-> fetch_all(MYSQLI_ASSOC);
        return $menu_unacc;
    }
    // Get count menu from database
    // @return $menu[]


    public function get_count()
    {
        $sql1 = "SELECT COUNT(*) as jmlmenu FROM menu";
        $result = $this->db->query($sql1);
        $menu = $result->fetch_assoc();
        return $menu;
    }

    /**
     * @param $id_menu
     * 
     * @return $menu[]
     */
    public function view($id_menu)
    {
        $sql1 = "SELECT * FROM menu WHERE id_menu = '$id_menu'";
        $result = $this->db->query($sql1);
        $menu = $result->fetch_assoc();

        return $menu;
    }

    /**
     * Store menu to database 
     * @param $post
     * 
     * @return boolean
     */
    public function store($id)
    {
        $id_menu = $_POST['id_menu'];
        $id_pegawai = $_POST['id_pegawai'];
        $id_kategori = $_POST['id_kategori'];
        $nama_menu = $_POST['nama_menu'];
        $gambar
        $harga_menu = $_POST['harga_menu'];
        $stok = $_POST['stok'];
        if (empty($_POST['persetujuan'])) {
            $persetujuan = "N";
        } else {
            $persetujuan = $_POST['persetujuan'];
        }
        
        //SQL id menu (checking if menu already exists in database)
        $sql1 = "SELECT id_menu from menu
                WHERE id_menu = '$id_menu'";

        //Checking if the id_menu is available 
        $check = $this->db->query($sql1);
        $count_row = $check->num_rows;

        //If the id_menu is not in db then insert to kategori table 
        if ($count_row == 0){
            $sql2 = "INSERT INTO menu 
                     VALUES(
                            '$id_menu',
                            '$id_pegawai',
                            '$id_kategori',
                            '$nama_menu',
                            '$gambar',
                            '$harga',
                            '$stok',
                            '$persetujuan'
                            )";
            $result = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno() . "Data cannot inserted");
            return true;
        } else {
            return false;
        }
    }


    /**
     * Update kategori
     * @param $id_menu_before
     * 
     * @return boolean
     */
    public function update($id_menu_before)
    {
        $id_menu = $this->db->escape_string($_POST['id_menu']);
        $id_pegawai = $this->db->escape_string($_POST['id_pegawai']);
        $id_kategori = $this->db->escape_string(['id_kategori']);
        $nama_menu = $this->db->escape_string($_POST['nama_menu']);
        $gambar 
        $harga_menu = $this->db->escape_string($_POST['harga_menu']);
        $stok = $this->db->escape_string($_POST['stok']);
        if (empty($_POST['persetujuan'])) {
            $persetujuan = "N";
        } else {
            $persetujuan = $_POST['persetujuan'];
        }

        //SQL update menu
        $sql1 = "UPDATE menu SET 
                 id_menu = '$id_menu',
                 id_pegawai = '$id_pegawai',
                 id_kategori = '$id_kategori',
                 nama_menu = '$nama_menu',
                 gambar = '$gambar',
                 harga_menu = '$harga_menu',
                 stok = '$stok',
                 persetujuan = '$persetujuan'
                 where id_menu = '$id_menu_before'";
        
        $query = $this->db->query($sql1);
        $result = $query;
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Delete menu from database
     * 
     * @return boolean
     */
    public function destroy($id_menu)
    {
        $sql1 = "DELETE FROM menu WHERE id_menu = '$id_menu'";
        $query = $this->db->query($sql1);
        $result = $query;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}