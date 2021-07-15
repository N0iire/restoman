<?php

class User
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
     * Storing User to Pegawai and their Kategori table
     * 
     * @param $id_kasir, $nama_kasir, $password
     * @return boolean
     */
    public function store($id, $nama, $kategori, $password, $another)
    {
        $password = md5($password);
        $sql = "SELECT * FROM pegawai WHERE id_pegawai='$id'";

        // Checking if the id is available
        $check = $this->db->query($sql);
        $count_row = $check->num_rows;

        // If the id is not in db then insert to the table
        if ($count_row == 0) {
            $sql1 = "INSERT INTO pegawai SET id_pegawai='$id', nama_kasir='$nama', password='$password'";
            $result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno() . "Data cannot inserted");
            // If result true then insert into kategori table
            if ($result) {
                $sql2 = "INSERT INTO $kategori VALUES('$another')";
                $result2 = mysqli_query($this->db, $sql2);
                // If result true then return true
                if ($result2) {
                    return true; // insert is success
                } else {
                    return false; // insert is failed
                }
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * View user
     * 
     * @param $id, $kategori
     * @return $user
     */
    public function view($id, $kategori)
    {
        $sql = "SELECT * FROM pegawai a INNER JOIN 
            $kategori b WHERE a.id_pegawai = '$id' 
            AND b.id_pegawai = '$id'";
        $result = $this->db->query($sql);
        $user = $result->fetch_assoc();

        return $user;
    }

    /**
     * Get all user
     * 
     * @return $users
     */
    public function get_all()
    {
        $sql = "SELECT * FROM pegawai";
        $result = $this->db->query($sql);
        $users = $result->fetch_all(MYSQLI_ASSOC);

        return $users;
    }

    /**
     * Update user
     * 
     * @param $id_before, $kategori
     * @return boolean;
     */
    public function update($id_before, $kategori, $i)
    {
        $id_pegawai = $this->db->escape_string($_POST['id_pegawai']);
        $nama = $this->db->escape_string($_POST['nama']);
        $another = $this->db->escape_string($_POST[$i]);
        $kategori = $kategori;

        // Checking if id_user is already taken
        $sql = "SELECT * FROM pegawai WHERE id_kasir='$id_pegawai'";
        $check = $this->db->query($sql);
        $count_row = $check->num_rows;

        if ($count_row == 0) {
            $sql1 = "UPDATE pegawai SET id_pegawai='$id_pegawai', nama_pegawai='$nama'
                WHERE id_pegawai = $id_before
            ";
            $result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno() . "Data cannot updated");
            // If result true then insert into kategori table
            if ($result) {
                $sql2 = "UPDATE $kategori SET $i = '$another' 
                    WHERE id_pegawai = $id_before
                ";
                $result2 = mysqli_query($this->db, $sql2);
                // If result true then return true
                if ($result2) {
                    return true; // insert is success
                } else {
                    return false; // insert is failed
                }
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete User
     * 
     * @param $id
     * @return boolean
     */
    public function destroy($id)
    {
        $sql1 = "DELETE FROM pegawai WHERE id_pegawai = '$id'";
        $query = $this->db->query($sql1);
        $result = $query;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Login
     * 
     * @param $id, $password, $kategori
     * @return boolean
     */
    public function login($id, $password, $kategori)
    {
        $password = md5($password);
        $sql = "SELECT id_pegawai FROM pegawai WHERE id_pegawai = '$id'
            AND password = '$password'
        ";
        $result = $this->db->query($sql);
        $user = $result->fetch_assoc();
        $count_row = $result->num_rows;

        if ($count_row == 1) {
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id_pegawai'];
            $_SESSION['kategori_p'] = $kategori;
            $_SESSION['login_time_stamp'] = time();

            return true;
        } else {
            return false;
        }
    }

    /**
     * Start the session login
     * 
     * @return $_SESSION['login']
     */
    public function get_session()
    {
        return $_SESSION['login'];
    }

    /**
     * Logout
     * 
     * @return true
     */
    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
        return true;
    }
}
