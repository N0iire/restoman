<?php

class User
{
    public $db;
    public $word;
    public $ciphering = "AES-128-CTR";
    public $option = 0;
    // Non-NULL Initialization Vector for encryption
    public $encryption_iv = '1234567891011121';
    private $encryption_key = "r3st0manbuatans1";


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
    public function store($id, $nama, $password, $kategori)
    {
        $sql = "SELECT * FROM pegawai WHERE id_pegawai='$id'";

        // Checking if the id is available
        $check = $this->db->query($sql);
        $count_row = $check->num_rows;

        // If the id is not in db then insert to the table
        if ($count_row == 0) {
            $sql1 = "INSERT INTO pegawai SET id_pegawai='$id', nama_pegawai='$nama', password='$password', kategori_pegawai='$kategori'";
            $result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno() . "Data cannot inserted");
            // If result true then insert into kategori table
            if ($result) {
                return true; // insert is succes
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * View user
     * 
     * @param $id
     * @return $user
     */
    public function view($id)
    {
        $sql = "SELECT * FROM pegawai a WHERE a.id_pegawai = '$id'";
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
    public function update($id_before)
    {
        $id_pegawai = $this->db->escape_string($_POST['id_pegawai']);
        $nama = $this->db->escape_string($_POST['nama_pegawai']);
        $this->word = $this->db->escape_string($_POST['password']);
        $password = $this->encr();
        $kategori = $this->db->escape_string($_POST['kategori']);;

        // Checking if id_user is already taken
        $sql = "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'";
        $check = $this->db->query($sql);
        $count_row = $check->num_rows;

        if ($count_row == 0 || $id_before == $id_pegawai) {
            $sql1 = "UPDATE pegawai SET id_pegawai='$id_pegawai', nama_pegawai='$nama', password = '$password', kategori_pegawai = '$kategori'
                WHERE id_pegawai = '$id_before'
            ";
            $result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno() . "Data cannot updated");
            // If result true then insert into kategori table
            if ($result) {
                return true; // insert is succes
            } else {
                return false;
            }
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
        $sql = "SELECT id_pegawai FROM pegawai WHERE id_pegawai = '$id'
            AND password = '$password' AND kategori_pegawai = '$kategori'
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

    /**
     * Encrypting
     * 
     * @return string $encrypted
     */
    public function encr()
    {
        $encrypted = openssl_encrypt($this->word, $this->ciphering, $this->encryption_key, $this->option, $this->encryption_iv);

        return $encrypted;
    }

    /**
     * Decrypting
     * 
     * @return string $decrypted
     */
    public function decr()
    {
        $decrypted = openssl_decrypt($this->word, $this->ciphering, $this->encryption_key, $this->option, $this->encryption_iv);

        return $decrypted;
    }
}
