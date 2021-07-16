<?php

class Kategori 
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
     * Get all kategori from database
     * 
     * return $kategori
     */
    public function get_all()
    {
        $sql1 = "Select * from kategori";
        $result = $this->db->query($sql1);
        $kategori = $result-> fetch_all(MYSQLI_ASSOC);
        return $kategori;
    }

    // Get count kategori from database
    // @return $kategori


    public function get_count()
    {
        $sql1 = "SELECT COUNT(*) as jmlkategori FROM kategori";
        $result = $this->db->query($sql1);
        $kategori = $result->fetch_assoc();
        return $kategori;
    }

    /**
     * @param $id_kategori
     * 
     * @return $kategori
     */
    public function view($id_kategori)
    {
        $sql1 = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
        $result = $this->db->query($sql1);
        $kategori = $result->fetch_assoc();

        return $kategori;
    }

    /**
     * Store kategori to database 
     * @param $post
     * 
     * @return boolean
     */
    public function store()
    {
        $id_kategori = $_POST['id_kategori'];
        $nama_kategori = $_POST['nama_kategori'];
        
        //SQL id kategori
        $sql1 = "SELECT id_kategori from kategori
                WHERE id_kategori = '$id_kategori'";

        //Checking if the id_kategori is available 
        $check = $this->db->query($sql1);
        $count_row = $check->num_rows;

        //If the id_kategori is not in db then insert to kategori table 
        if ($count_row == 0){
            $sql2 = "INSERT INTO kategori 
                     VALUES('$id_kategori','$nama_kategori')";
            $result = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno() . "Data cannot inserted");
            return true;
        } else {
            return false;
        }
    }


    /**
     * Update kategori
     * @param $id_kategori
     * 
     * @return boolean
     */
    public function update($id_kategori_before)
    {
        $id_kategori = $_POST['id_kategori'];
        $nama_kategori = $_POST['nama_kategori'];

        $sql1 = "UPDATE kategori SET 
                 id_kategori = '$id_kategori',
                 nama_kategori = '$nama_kategori'
                 where id_kategori = '$id_kategori_before'";
        
        $query = $this->db->query($sql1);
        $result = $query;
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Delete kategori from database
     * 
     * @return boolean
     */
    public function destroy($id_kategori)
    {
        $sql1 = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
        $query = $this->db->query($sql1);
        $result = $query;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}