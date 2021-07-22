<?php

class Meja
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
     * Get all meja from database
     * 
     * return $meja[]
     */
    public function get_all()
    {
        $sql1 = "Select * from meja";
        $result = $this->db->query($sql1);
        $meja = $result->fetch_all(MYSQLI_ASSOC);
        return $meja;
    }

    /**
     * get avalable meja
     * 
     * @return $meja[]
     */
    public function get_available()
    {
        $sql1 = "select * from meja where status_ketersediaan = 'Y'";
        $result = $this->db->query($sql1);
        $meja = $result->fetch_all(MYSQLI_ASSOC);
        return $meja;
    }

    /**
     * Get count meja from database
     * 
     * @return $meja[]
     */

    public function get_count()
    {
        $sql1 = "SELECT COUNT(*) as jmlmeja FROM meja";
        $result = $this->db->query($sql1);
        $meja = $result->fetch_assoc();
        return $meja;
    }

    /**
     * @param $id_meja
     * 
     * @return $meja
     */
    public function view($id_meja)
    {
        $sql1 = "SELECT * FROM meja WHERE id_meja = '$id_meja'";
        $result = $this->db->query($sql1);
        $meja = $result->fetch_assoc();

        return $meja;
    }

    /**
     * Store meja to database 
     * @param $post
     * 
     * @return boolean
     */
    public function store()
    {
        $id_meja = $this->db->escape_string($_POST['id_meja']);
        $total_pelanggan = $this->db->escape_string($_POST['total_pelanggan']);
        if (empty($_POST['status_ketersediaan'])) {
            $status_ketersediaan = "N";
        } else {
            $status_ketersediaan = "Y";
        }

        //SQL id meja 
        $sql1 = "SELECT id_meja from meja
                WHERE id_meja = '$id_meja'";

        //Checking if the id_meja is available 
        $check = $this->db->query($sql1);
        $count_row = $check->num_rows;

        //If the id_meja is not in db then insert to meja table 
        if ($count_row == 0) {
            $sql2 = "INSERT INTO meja 
                     VALUES('$id_meja','$total_pelanggan','$status_ketersediaan')";
            $result = mysqli_query($this->db, $sql2) or die(mysqli_connect_errno() . "Data cannot inserted");
            return true;
        } else {
            return false;
        }
    }


    /**
     * Update meja
     * @param $id_meja
     * 
     * @return boolean
     */
    public function update($id_meja_before)
    {
        $id_meja = $_POST['id_meja'];

        if (empty($_POST['status_ketersediaan'])) {
            $status_ketersediaan = "N";
        } else {
            $status_ketersediaan = "Y";
        }

        $sql1 = "UPDATE meja SET 
                 id_meja = '$id_meja',
                 status_ketersediaan = '$status_ketersediaan'
                 where id_meja = '$id_meja_before'";

        $query = $this->db->query($sql1);
        $result = $query;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete meja from database
     * 
     * @return boolean
     */
    public function destroy($id_meja)
    {
        $sql1 = "DELETE FROM meja WHERE id_meja = '$id_meja'";
        $query = $this->db->query($sql1);
        $result = $query;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
