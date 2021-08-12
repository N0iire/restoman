<?php
class Backup
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

    public function store()
    {
        $table_name = "pembayaran";
        $date = date("Y-m-d-H-i-s");
        $backup_file  = "percobaan$date.sql";
        $sql = "SELECT * INTO OUTFILE " . "'D:/" . "$backup_file'
            FIELDS 
            TERMINATED BY '-' 
            ENCLOSED BY '`'
        FROM $table_name";
        $retval = mysqli_query($this->db, $sql);
        if (!$retval) {
            return false;
        }
        // Input nama file backup ke db
        $sql2 = "INSERT INTO backup(name) VALUES('$backup_file')";
        $store = mysqli_query($this->db, $sql2);
        if (!$store) {
            return false;
        }
        return true;
    }

    public function get_backup()
    {
        $sql = "SELECT * FROM backup";
        $result = $this->db->query($sql);
        $backup = $result->fetch_all(MYSQLI_ASSOC);
        return $backup;
    }

    public function view_backup($id)
    {
        $sql = "SELECT * FROM backup WHERE id = '$id'";
        $result = $this->db->query($sql);
        $backup = $result->fetch_assoc();
        return $backup;
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM backup WHERE id = '$id'";
        $result = $this->db->query($sql);
        return $result;
    }

    public function restore()
    {
        $id = $this->db->escape_string($_POST['id']);
        $backup = $this->view_backup($id);
        $table_name = "pembayaran";
        $backup_file  = $backup['name'];
        $sql = "LOAD DATA INFILE 'D:/$backup_file'
            INTO TABLE $table_name
            FIELDS
        TERMINATED BY '-'
        ENCLOSED BY '`'";

        mysqli_select_db($this->db, 'restoman');
        $retval = mysqli_query($this->db, $sql);

        if (!$retval) {
            return false;
        }
        return true;
    }
}
